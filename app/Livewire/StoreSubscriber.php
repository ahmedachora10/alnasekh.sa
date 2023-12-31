<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StoreSubscriber extends Component
{
    #[Rule('required|numeric')]
    public string $phone;

    public function save() {
        Subscriber::create($this->validate());
        $this->reset();

        session()->flash('success', trans('message.create'));
    }


    public function render()
    {
        return view('livewire.store-subscriber');
    }
}