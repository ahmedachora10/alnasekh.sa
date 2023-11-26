<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\MonthlyQuarterlyUpdate;
use Livewire\Component;
use Livewire\WithPagination;

class MonthlyQuarterlyContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.monthly-quarterly-container', [
            'data' => MonthlyQuarterlyUpdate::paginate(setting('pagination') ?? 8)
        ]);
    }
}