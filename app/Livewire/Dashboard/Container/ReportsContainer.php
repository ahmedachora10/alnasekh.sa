<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Corp;
use App\Models\CorpReport;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ReportsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public ?Corp $corp = null;


    #[On('refresh-corp-reports')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.container.reports-container', [
            'reports' => CorpReport::where('corp_id', $this->corp->id)->paginate(setting('pagination') ?? 8)
        ]);
    }
}