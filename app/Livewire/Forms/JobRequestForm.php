<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Ramsey\Uuid\Type\Integer;

class JobRequestForm extends Form
{
    #[Rule('required|string')]
    public string $name = '';

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required|numeric')]
    public string $phone = '';

    #[Rule('required|integer')]
    public ?int $age = null;

    #[Rule('required|string')]
    public string $specialization = '';

    #[Rule('required|integer')]
    public ?int $years_of_experience = null;

    #[Rule('required|string')]
    public string $excerpt = '';

    #[Rule('required|integer|exists:job_posts,id')]
    public string $job = '';

    #[Rule('required|exists:job_cities,id')]
    public string $job_city = '';

    #[Rule('required|file')]
    public $cv = null;
}