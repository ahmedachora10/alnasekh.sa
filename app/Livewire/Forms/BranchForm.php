<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BranchForm extends Form
{
    #[Rule('required|string')]
    public string $name = '';

    #[Rule('required|numeric')]
    public ?string $registration_number = '';

    #[Rule('nullable|string')]
    public string $address = '';
}
