<?php

namespace App\Livewire;

use App\Livewire\Forms\SubscribePackageRequestForm;
use App\Models\Package;
use App\Models\SubscribePackageRequest;
use App\Models\User;
use App\Notifications\ClientActionNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class StoreSubscribePackageRequest extends Component
{
    public SubscribePackageRequestForm $form;

    public Package $package;

    public $isDefaultPackage = false;

    public function mount(Package $package) {
        $this->package = $package;

        $this->isDefaultPackage = $package->yearly_price == 0;
    }

    public function save() {

        if($this->isDefaultPackage) {
            $fields = $this->form->only([
                'company_name',
                'administrator_name',
                'email',
                'phone',
                'company_type',
                'company_activity'
            ]);

            $rules = $this->form->getRules();
            $rules = array_diff_key($rules, array_diff_key($rules, $fields));

            $this->form->validate($rules);

        } else {
            $fields = $this->form->all();
            $this->validate();
        }


        $this->package->subscribeRequests()->create($fields);

        Notification::send(User::whereHasRole('admin')->get(), new ClientActionNotification([
            'title' => '',
            'content' => '',
            'model' => SubscribePackageRequest::class,
        ]));

        session()->flash('success', trans('message.create'));
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.store-subscribe-package-request');
    }
}
