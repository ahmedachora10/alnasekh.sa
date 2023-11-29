<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HealthCardForm extends Form
{
    #[Rule('required|numeric')]
    public string $certificate_number = '';

    #[Rule('required|date')]
    public string $start_date = '';

    #[Rule('required|date|after:start_date')]
    public string $end_date = '';
}