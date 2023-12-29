<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\OurService;
use Livewire\Component;
use Livewire\WithPagination;

class OurServicesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.our-services-container', [
            'services' => OurService::paginate(setting('pagination') ?? 8)
        ]);
    }
}