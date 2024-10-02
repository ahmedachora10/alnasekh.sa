<?php

namespace Modules\Tasks\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromLivewireRequest;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;
use App\Models\User;
use Carbon\Carbon;
use Modules\Tasks\App\Enums\TaskStatus;

class TaskActionDTO implements DTOInterface, FromWebRequest, FromLivewireRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly ?User $assignedTo = null,
        public readonly ?Carbon $assignedAt = null,
        public readonly ?Carbon $dueDate = null,
        // public readonly TaskStatus $status = TaskStatus::Pending,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->dueDate,
            'assigned_to' => $this->assignedTo?->id,
            'assigned_at' => $this->assignedAt,
            // 'status' => $this->status->value,
        ];
    }

    public static function fromWebRequest(\Illuminate\Foundation\Http\FormRequest $request): static
    {
        return new self(
            name: $request->validated('name'),
            description: $request->validated('description'),
            assignedTo: null,
            assignedAt: null,
            dueDate: $request->validated('due_date'),
            // status: TaskStatus::tryFrom($request->validated('status')) ?? self::$status,
        );
    }

    public static function fromLivewireRequest(array $data): static {
        $employee = User::find($data['assigned_to']);
        return new self(
            name: $data['name'],
            description: $data['description'],
            assignedTo: $employee,
            assignedAt: $employee instanceof User ? now() : null,
            dueDate: now()->parse($data['due_date']),
            // status: TaskStatus::tryFrom($data['status']) ?? TaskStatus::Pending,

        );
    }
}