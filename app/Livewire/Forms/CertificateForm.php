<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CertificateForm extends Form
{
    #[Rule('required|integer')]
    public string $certificate_number = '';

    #[Rule('nullable|string')]
    public string $type = '';

    #[Rule('required|date')]
    public string $start_date = '';

    #[Rule('required|date|after:start_date')]
    public string $end_date = '';
}