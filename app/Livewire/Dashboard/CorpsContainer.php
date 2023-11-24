<?php

namespace App\Livewire\Dashboard;

use App\Models\Corp;
use Livewire\Component;
use Livewire\WithPagination;

class CorpsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.corps-container', [
            'corps' => Corp::paginate(setting('pagination') ?? 8)
        ]);
    }
}
