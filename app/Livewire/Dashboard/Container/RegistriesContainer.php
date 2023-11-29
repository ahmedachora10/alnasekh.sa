<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Registry;
use Livewire\Component;
use Livewire\WithPagination;

class RegistriesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.registries-container', [
            'data' => Registry::paginate(setting('pagination') ?? 8)
        ]);
    }
}