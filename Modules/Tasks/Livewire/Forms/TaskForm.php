<?php

namespace Modules\Tasks\Livewire\Forms;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Form;

class TaskForm extends Form
{
    #[Rule('required|string')]
    public string $name = '';

    #[Rule('required|string')]
    public string $description = '';

    #[Rule('nullable|exists:users,id')]
    public ?int $assigned_to = null;

    #[Rule('required|date')]
    public ?string $due_date = null;

    #[Rule('nullable|date')]
    public ?string $assigned_at = null;
    // #[Rule('nullable|status')]
    // public ?TaskForm $status = null;
}