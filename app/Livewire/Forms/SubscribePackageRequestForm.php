<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SubscribePackageRequestForm extends Form
{
    // #[Rule('required|integer|exists:packages,id')]
    // public ?int $package_id = null;

    #[Rule('required|string')]
    public ?string $company_name = null;

    #[Rule('required|string')]
    public ?string $administrator_name = null;

    #[Rule('required|integer')]
    public ?int $commercial_registration_number = null;

    #[Rule('required|string')]
    public ?string $company_activity = null;

    #[Rule('required|integer')]
    public ?int $phone = null;

    #[Rule('required|email')]
    public ?string $email = null;

    #[Rule('required|string')]
    public ?string $company_size = null;

    #[Rule('required|integer')]
    public ?int $number_of_resident_employees = null;

    #[Rule('required|integer')]
    public ?int $number_of_suadi_employees = null;

    #[Rule('required|integer')]
    public ?int $total_employees = null;

    #[Rule('required|string')]
    public ?string $company_headquarters = null;

    #[Rule('required|string')]
    public ?string $company_type = null;

    #[Rule('required|string')]
    public ?string $company_city = null;

    #[Rule('required|integer')]
    public ?int $number_of_branches = null;

}