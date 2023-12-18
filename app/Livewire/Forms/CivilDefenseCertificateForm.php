<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CivilDefenseCertificateForm extends Form
{
    #[Rule('required|integer')]
    public string $permit = '';

    #[Rule('required|integer')]
    public string $ministry_of_interior_number = '';

    #[Rule('required|date')]
    public string $start_date = '';

    #[Rule('required|date|after:start_date')]
    public string $end_date = '';
}