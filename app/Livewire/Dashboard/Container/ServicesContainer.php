<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.services-container', [
            'services' => Service::paginate(setting('pagination') ?? 8)
        ]);
    }
}