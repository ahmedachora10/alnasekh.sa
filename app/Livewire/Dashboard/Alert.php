<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;

class Alert extends Component
{

    public string $key = 'success';

    public string $value = '';

    public string $color = 'primary';

    #[On('refresh-alert')]
    public function refresh() {
        $this->dispatch('$refresh');

        $this->value = session($this->key);

        if(session()->has($this->key)) {
            session()->remove($this->key);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.alert');
    }
}
