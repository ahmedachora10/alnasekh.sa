<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EntityForm extends Form
{
    #[Validate('required|exists:ministries,id')]
    public ?int $ministry_id = null;

    #[Validate('required|string')]
    public ?string $name = null;
}