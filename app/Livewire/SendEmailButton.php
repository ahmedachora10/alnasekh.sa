<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class SendEmailButton extends Component
{

    public function send() {
        Artisan::call('email:send', [
                'email' => 'ahmed.achora@gmail.com',
                'name' => 'منشأة احمد العالمي',
                'administrator_name' => 'AhmedACH',
                '--title' => 'ahme alamin name',
            ]);
    }

    public function render()
    {
        return view('livewire.send-email-button');
    }
}