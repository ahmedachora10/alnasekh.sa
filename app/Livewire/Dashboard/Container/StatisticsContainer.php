<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Statistic;
use Livewire\Component;
use Livewire\WithPagination;

class StatisticsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.statistics-container', [
            'statistics' => Statistic::paginate(setting('pagination') ?? 8)
        ]);
    }
}