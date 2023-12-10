<?php

namespace App\Livewire\Dashboard;

use App\Models\Corp;
use Livewire\Component;
use Livewire\WithPagination;

class CorpsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public ?Corp $corpModel = null;

    public function mount($title = null) {
        $this->corpModel = Corp::first();
    }

    public function export(Corp $corp) {
        $target = '#ExportHasBranchesBranchModal';

        if($corp->doesnt_has_branches) {
            $target = '#ExportDoesntHasBanchesModal';
        }

        $this->dispatch('open-modal', target: $target);
        $this->corpModel = $corp;
        $this->dispatch('set-corp', corp: $corp);
    }

    public function render()
    {
        return view('livewire.dashboard.corps-container', [
            'corps' => Corp::with('user')->paginate(setting('pagination') ?? 8)
        ]);
    }
}