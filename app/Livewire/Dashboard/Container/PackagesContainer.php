<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class PackagesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.packages-container', [
            'packages' => Package::paginate(setting('pagination') ?? 8)
        ]);
    }
}