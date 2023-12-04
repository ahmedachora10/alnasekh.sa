<?php

namespace App\Traits\Livewire;

trait Message {
    public function fireMessage($eventName = 'update', $key = 'success') {
        session()->put($key, trans('message.'.$eventName));
        $this->dispatch('refresh-alert');
    }
}