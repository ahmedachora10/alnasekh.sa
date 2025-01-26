<?php

namespace Modules\Tasks\App\Services;

use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\Tasks\App\Contracts\CalendarEvent;
use Modules\Tasks\App\DTO\MeetingActionDTO;
use Modules\Tasks\App\Models\Meeting;
use Modules\Tasks\App\Notifications\EmployeeMeetingInvitation;

class MeetingService implements StoreAction, UpdateAction, DeleteAction, PaginateAction, CalendarEvent {
    public function __construct(private Meeting $model) {}

    /**
     * @param MeetingActionDTO $dto
     * @return \Modules\Tasks\App\Models\Meeting
     */
    public function store(\App\Contracts\DTOInterface $dto): Meeting {
        return DB::transaction(function () use($dto){
            $meeting = $this->model->create($dto->toArray());

            // dd($meeting, $meeting->invited(), array_map(fn($id) => ['user_id' => $id] , $dto->invited));

            DB::table('meeting_user')->insert(
                array_map(fn($id) => ['user_id' => $id, 'meeting_id' => $meeting->id], $dto->invited)
            );
            // $meeting->invited()->insert(array_map(fn($id) => ['user_id' => $id], $dto->invited));
            // ->createMany(array_values(array_map(fn($id) => ['user_id' => $id] , $dto->invited)));

            Notification::send(
                notifiables: User::find($dto->invited),
                notification: new EmployeeMeetingInvitation($meeting)
            );

            return $meeting;
        });
    }
    /**
     * @param Meeting $model
     * @param MeetingActionDTO $dto
     * @return Meeting
     */
    public function update(\Illuminate\Database\Eloquent\Model $model, \App\Contracts\DTOInterface $dto): Meeting {
        return DB::transaction(function () use ($model, $dto) {
            $model->update($dto->toArray());

            $existingInvited = $model->invited()->pluck('user_id');

            $newInvited = collect($dto->invited);

            // Find users to remove (existing but not in the new list)
            $usersToRemove = $existingInvited->diff($newInvited);
            $model->invited()->whereIn('user_id', $usersToRemove)->delete();

            // Find users to add (new ones that don't exist in the current list)
            $usersToAdd = $newInvited->diff($existingInvited);

            $model->invited()->createMany($usersToAdd->map(fn($id) => ['user_id' => $id]));

            Notification::send(
                notifiables: $usersToAdd->pluck('user_id'),
                notification: new EmployeeMeetingInvitation($model)
            );

            return $model;
        });
    }

    public function paginate(int $count = 10): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->model
        ->when(
            value: !Auth::user()->hasRole('admin'),
            callback: fn($query) => $query->whereHas(
                    relation: 'invited',
                    callback: fn($query) => $query->where('user_id', Auth::id())
                )
            )
        ->paginate($count);
    }

    public function calendarEvents(string $startDate, string $endDate):Collection {
        return $this->model
            ->whereBetween('date', [$startDate, $endDate])
            ->when(
                value: !Auth::user()->hasRole('admin'),
                callback: fn($query) => $query->whereHas(
                        relation: 'invited',
                        callback: fn($q) => $q->where('user_id', Auth::id())
                    )
            )
            ->get(['id', 'title as name', 'date']);
    }

    public function delete(int $id): bool {
        return $this->model->find($id)?->delete();
    }

}
