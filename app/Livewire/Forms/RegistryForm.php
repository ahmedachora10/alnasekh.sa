<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegistryForm extends Form
{
    #[Rule('required|numeric')]
    public string $commercial_registration_number = '';

    #[Rule('required|date')]
    public $start_date;

    #[Rule('required|date|after:start_date')]
    public $end_date;
}