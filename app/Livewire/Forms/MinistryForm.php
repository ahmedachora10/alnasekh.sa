<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MinistryForm extends Form
{
    #[Validate('required|string')]
    public ?string $name = null;
}