<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.subscribers-container', [
            'subscribers' => Subscriber::paginate(setting('pagination') ?? 8)
        ]);
    }
}