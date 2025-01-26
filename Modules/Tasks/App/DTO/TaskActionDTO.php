<?php

namespace Modules\Tasks\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromLivewireRequest;
use App\Contracts\ToArray;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Tasks\App\Enums\TaskPriority;
use Modules\Tasks\App\Enums\TaskStatus;

class TaskActionDTO implements DTOInterface, FromLivewireRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly ?User $assignedTo = null,
        public readonly ?Carbon $assignedAt = null,
        public readonly ?Carbon $startDate,
        public readonly ?Carbon $endDate,
        public readonly TaskPriority $priority,
        public readonly array $attachments = [],
        public readonly ?User $creator = null,
        public readonly bool $relatedToCorp = false
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'assigned_to' => $this->assignedTo?->id,
            'assigned_at' => $this->assignedAt,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'created_by' => $this->creator?->id,
            'priority' => $this->priority->value,
            'status' => TaskStatus::Pending->value,
            'from_corp' => $this->relatedToCorp,
        ];
    }

    // public static function fromWebRequest(\Illuminate\Foundation\Http\FormRequest $request): static
    // {
    //     return new self(
    //         name: $request->validated('name'),
    //         description: $request->validated('description'),
    //         assignedTo: null,
    //         assignedAt: null,
    //         dueDate: $request->validated('due_date'),
    //         // status: TaskStatus::tryFrom($request->validated('status')) ?? self::$status,
    //     );
    // }

    public static function fromLivewireRequest(array $data): static {
        $employee = User::find($data['assigned_to']);
        return new self(
            name: $data['name'],
            description: $data['description'],
            assignedTo: $employee,
            assignedAt: $employee instanceof User ? now() : null,
            startDate: now()->parse($data['start_date']),
            endDate: now()->parse($data['end_date']),
            priority: TaskPriority::tryFrom($data['priority']) ?? TaskPriority::Not_Important_And_Not_Urgent,
            attachments: $data['attachments'] ?? [],
            creator: User::find(Auth::id())
        );
    }
}