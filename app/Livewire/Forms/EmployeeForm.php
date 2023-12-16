<?php

namespace App\Livewire\Forms;

use App\Enums\Nationalities;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    #[Rule('required')]
    public ?Nationalities $nationality = null;

    #[Rule('required|string')]
    public string $name = '';

    #[Rule('required|numeric')]
    public string $resident_number = '';

    #[Rule('required|date')]
    public string $start_date = '';

    #[Rule('required|date|after:start_date')]
    public string $end_date = '';

    #[Rule('required|date')]
    public string $business_card_start_date = '';

    #[Rule('required|date|after:business_card_start_date')]
    public string $business_card_end_date = '';

    #[Rule('required|date')]
    public string $contract_start_date = '';

    #[Rule('required|date|after:contract_start_date')]
    public string $contract_end_date = '';
}