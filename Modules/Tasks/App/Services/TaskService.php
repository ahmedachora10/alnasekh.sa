<?php


namespace Modules\Tasks\App\Services;

use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\DTOInterface;
use App\Models\User;
use Modules\Tasks\App\DTO\TaskActionDTO;
use Modules\Tasks\App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\Tasks\App\Contracts\CalendarEvent;
use Modules\Tasks\App\Enums\TaskStatus;
use Modules\Tasks\App\Enums\UserTaskStatus;
use Modules\Tasks\App\Models\UserTask;
use Modules\Tasks\App\Notifications\ApprovalStatusNotification;
use Modules\Tasks\App\Notifications\EmployeeTaskAssignmentNotification;

class TaskService implements StoreAction, UpdateAction, DeleteAction, PaginateAction, FindAction, CalendarEvent {

    public function __construct(protected Task $model) {}
    /**
     * @param TaskActionDTO $dto
     * @return Task
     */
    public function store(DTOInterface $dto): Task
    {
        return DB::transaction(function() use($dto) {
            $task = $this->model->create($dto->toArray());

            $isEmployee = $dto->creator?->hasRole('employee');
            $newEmployeeNotification = new EmployeeTaskAssignmentNotification($task);

            if ($dto->assignedTo)
                $task->userTaskStatus()->create([
                    'user_id' => $dto->assignedTo->id,
                    'from' => $isEmployee ? 'employee' : '',
                    'status' => $dto->relatedToCorp ? UserTaskStatus::Accepted->value : UserTaskStatus::Pending->value
                ]);

                $sendTo = !$isEmployee || $dto->relatedToCorp ? $dto->assignedTo : User::whereHasRole('admin')->get();
                Notification::send($sendTo, $newEmployeeNotification);

            collect($dto->attachments)->each(fn($file) => $task->addMediaFromDisk($file)->toMediaCollection('tasks'));

            return $task;
        });
    }

    /**
     * @param TaskActionDTO $dto
     * @return Task
     */
    public function update(Model $model, DTOInterface $dto): Task
    {
        return DB::transaction(function () use($model, $dto) {
            $model->update($dto->toArray());

            $userTaskStatus = $model->userTaskStatus;

            if ($dto->assignedTo && $model->assigned_to !== $dto->assignedTo->id) {
                if(!$userTaskStatus) {
                    $model->userTaskStatus()
                        ->create(['user_id' => $dto->assignedTo->id]);
                } elseif ($userTaskStatus && $model->assigned_to != $dto->assignedTo->id) {
                    $model->userTaskStatus()
                        ->where('user_id', $model->assigned_to)
                        ->update(['status' => UserTaskStatus::Rejected->value]);
                    $model->userTaskStatus()
                        ->create(['user_id' => $dto->assignedTo->id]);
                }
                // TODO: Implement better solution later
                $dto->assignedTo->notify(new EmployeeTaskAssignmentNotification($model));
            }

            return $model;
        });
    }
    public function paginate(int $count = 12): Paginator
    {
        $ownerId = Auth::id();
        return $this->model->with(['employee', 'userTaskCompleted'])
        ->when(
            value: !auth()->user()->hasRole('admin'),
            callback: fn($query) =>
                $query->where('assigned_to', $ownerId)
                    ->orWhere('created_by', $ownerId)
        )
        ->orderBy('status')
        ->orderByDesc('id')
        ->paginate($count);
    }
    public function find(int $id): Task|null
    {
        return $this->model->find($id);
    }
    public function delete(int $id): bool
    {
        return $this->find($id)?->delete() ?? false;
    }
    public function switchStatus(Task $task): Task {
        return DB::transaction(function () use ($task) {

            if (!$task->userTaskCompleted && $task->status === TaskStatus::Done)
                return $task;

            $status = TaskStatus::tryFrom($task->status->value > 2 ? 1 : $task->status->value + 1);
            $task->status = $status;

            if ($status === TaskStatus::Done) {
                $task->completed = now();
                // TODO: send an email when task going done
                // notify_admin(new ApprovalStatusNotification();
            }

            $task->save();

            return $task;
        });
    }
    public function approvalOrReject(UserTask $userTask, UserTaskStatus $status, ?string $reason = null): UserTask {

        if($userTask->status === UserTaskStatus::Pending) {
            $userTask->update(['status' => $status->value, 'comment' => $reason]);
            $task = $userTask->task;
            $employee = $task->employee;
            $notification = new ApprovalStatusNotification($task->name,$status, $reason);

            if($status === UserTaskStatus::Rejected)
                $task->update(['assigned_to' => null, 'assigned_at' => null]);

            if($employee?->id === Auth::id())
                notify_admin($notification);
            else
                notify_user($employee, $notification);
        }

        return $userTask;
    }
    public function calendarEvents(string $startDate, string $endDate):Collection {
        return $this->model
            ->whereHas('userTaskCompleted')
            ->whereBetween('start_date', [$startDate, $endDate])
            ->when(
                !Auth::user()->hasRole('admin'),
                fn($query) => $query->where('assigned_to', Auth::id())
            )
            ->get(['id', 'name', 'start_date', 'end_date', 'status']);
    }

    public function assignEmployee(Task $task, User $user) {
        return DB::transaction(function () use ($task, $user) {
            if ($user->id === $task->assigned_to)
                return false;

            $task->update(['assigned_to' => $user->id, 'assigned_at' => now()]);

            $task->userTaskStatus()?->update(['status' => UserTaskStatus::Rejected->value]);

            $task->userTaskStatus()
                ->create(['user_id' => $user->id]);

            $user->notify(new EmployeeTaskAssignmentNotification($task));

            return true;
        });
    }

    public function checkCorpTaskStatus() {
        return $this->model
            ->where('from_corp', true)
            ->whereNot('status', TaskStatus::Done->value)
            ->update(['start_date' => now(), 'end_date' => now()->addDay()]);
    }

}