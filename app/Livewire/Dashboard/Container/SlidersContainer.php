<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class SlidersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.sliders-container', [
            'sliders' => Slider::paginate(setting('pagination') ?? 8)
        ]);
    }
}