<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReportForm extends Form
{
    #[Rule('required|string')]
    public ?string $ministry;

    #[Rule('required|string')]
    public ?string $entity;

    #[Rule('required|string')]
    public ?string $mission;
}