<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicalInsuranceForm extends Form
{
    #[Rule('required|string')]
    public string $company = '';

    #[Rule('required|string')]
    public string $policy = '';

    #[Rule('required|string')]
    public string $type = '';

    #[Rule('required|date')]
    public string $start_date = '';

    #[Rule('required|date|after:start_date')]
    public string $end_date = '';
}