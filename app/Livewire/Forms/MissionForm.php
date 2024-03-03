<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MissionForm extends Form
{
    #[Validate('required|exists:entities,id')]
    public ?int $entity_id = null;

    #[Validate('required|string')]
    public ?string $content = null;
}