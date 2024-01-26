<?php

namespace App\Livewire;

use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\ClientActionNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StoreSubscriber extends Component
{
    #[Rule('required|numeric')]
    public string $phone;

    public function save() {
        Subscriber::create($this->validate());
        $this->reset();

        Notification::send(User::whereHasRole('admin')->get(), new ClientActionNotification([
            'title' => '',
            'content' => '',
            'model' => Subscriber::class,
        ]));

        session()->flash('success', trans('message.create'));
    }


    public function render()
    {
        return view('livewire.store-subscriber');
    }
}