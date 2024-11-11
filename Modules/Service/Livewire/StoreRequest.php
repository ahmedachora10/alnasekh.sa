<?php

namespace Modules\Service\Livewire;

use App\Livewire\Forms\SubscribePackageRequestForm;
use App\Models\Service;
use App\Models\User;
use App\Notifications\ClientActionNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Modules\Service\App\Models\ServiceRequest;

class StoreRequest extends Component
{
    public SubscribePackageRequestForm $form;

    public Service $service;

    public function save() {
        $this->validate();

        $this->service->requests()->create($this->form->all());

        Notification::send(User::whereHasRole('admin')->get(), new ClientActionNotification([
            'title' => 'طلب اشتراك',
            'content' => 'طلب اشتراك في خدمة ' . $this->service->get_name,
            'model' => ServiceRequest::class,
        ]));

        session()->flash('success', trans('message.create'));
        $this->form->reset();
    }

    public function render()
    {
        return view('service::livewire.store-request');
    }
}