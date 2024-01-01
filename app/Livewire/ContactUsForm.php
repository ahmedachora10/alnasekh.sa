<?php

namespace App\Livewire;

use App\Models\ContactUs;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ContactUsForm extends Component
{
    #[Rule('required|string')]
    public string $name;

    #[Rule('required|email')]
    public string $email;

    #[Rule('required|numeric')]
    public string $phone;

    #[Rule('required|string')]
    public string $subject;

    #[Rule('required|string')]
    public string $message;

    public function save() {
        ContactUs::create($this->validate());
        session()->flash('success', trans('message.create'));
        $this->reset();
    }


    public function render()
    {
        return view('livewire.contact-us-form');
    }
}