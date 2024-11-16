<?php

namespace App\Livewire\Dashboard\Container;

use Modules\Service\App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Service\App\Services\Service as ServicesService;

class ServicesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.services-container', [
            'services' => app()->make(ServicesService::class)->all()
        ]);
    }
}
