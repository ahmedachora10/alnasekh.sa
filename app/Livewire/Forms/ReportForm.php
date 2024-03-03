<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReportForm extends Form
{
    #[Rule('required|integer|exists:ministries,id')]
    public ?string $ministry = null;

    #[Rule('required|integer|exists:entities,id')]
    public ?string $entity = null;

    #[Rule('required|integer|exists:missions,id')]
    public ?string $mission = null;
}
