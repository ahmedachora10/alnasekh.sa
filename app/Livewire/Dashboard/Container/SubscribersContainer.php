<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount() {
        if(auth()->user()->hasRole('admin')) {
            auth()->user()->unreadnotifications()->whereJsonContains('data->model',Subscriber::class)?->update(['read_at' => now()]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.container.subscribers-container', [
            'subscribers' => Subscriber::paginate(setting('pagination') ?? 8)
        ]);
    }
}