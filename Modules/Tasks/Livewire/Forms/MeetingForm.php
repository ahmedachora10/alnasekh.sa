<?php

namespace Modules\Tasks\Livewire\Forms;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\Tasks\App\Enums\TaskPriority;

class MeetingForm extends Form
{
    #[Rule('required|string')]
    public string $title = '';

    #[Rule('required|string')]
    public string $description = '';

    #[Rule('required|exists:users,id', as: 'الموظفين')]
    public ?array $invited = [];

    #[Rule('required|date')]
    public ?string $date = null;
}