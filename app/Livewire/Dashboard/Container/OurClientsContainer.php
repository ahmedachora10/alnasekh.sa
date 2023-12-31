<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\OurClient;
use Livewire\Component;
use Livewire\WithPagination;

class OurClientsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.our-clients-container', [
            'clients' => OurClient::paginate(setting('pagination') ?? 8)
        ]);
    }
}