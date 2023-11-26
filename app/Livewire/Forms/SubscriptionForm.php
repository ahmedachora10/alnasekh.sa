<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SubscriptionForm extends Form
{
    #[Rule('nullable|string')]
    public string $type = '';

    #[Rule('nullable|string')]
    public string $status = '';

    #[Rule('required|date')]
    public string $start_date = '';

    #[Rule('required|date|after:start_date')]
    public string $end_date = '';
}