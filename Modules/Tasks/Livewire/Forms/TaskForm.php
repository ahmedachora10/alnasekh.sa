<?php

namespace Modules\Tasks\Livewire\Forms;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Tasks\App\Enums\TaskPriority;

class TaskForm extends Form
{
    #[Rule('required|string')]
    public string $name = '';

    #[Rule('required|string')]
    public string $description = '';

    #[Rule('nullable|exists:users,id')]
    public ?int $assigned_to = null;

    #[Rule('required|date')]
    public ?string $start_date = null;

    #[Rule('required|date|after:start_date')]
    public ?string $end_date = null;

    #[Rule('nullable|date')]
    public ?string $assigned_at = null;

    #[Rule(['required', new Enum(TaskPriority::class)])]
    public ?int $priority = null;

    #[Validate([
        'attachments' => 'array',
        'attachments.*.path' => ['nullable', 'string', 'ends_with:.jpg,.png,.webp,.jpeg,.png,.pdf,.docx'],
    ])]
    public array $attachments = [];

}