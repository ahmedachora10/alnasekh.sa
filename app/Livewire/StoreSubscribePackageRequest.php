<?php

namespace App\Livewire;

use App\Livewire\Forms\SubscribePackageRequestForm;
use App\Models\Package;
use App\Models\SubscribePackageRequest;
use Livewire\Component;

class StoreSubscribePackageRequest extends Component
{
    public SubscribePackageRequestForm $form;

    public Package $package;

    public function mount(Package $package) {
        $this->package = $package;
    }

    public function save() {
        $this->validate();

        $this->package->subscribeRequests()->create($this->form->all());

        session()->flash('success', trans('message.create'));
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.store-subscribe-package-request');
    }
}