<?php

namespace App\Livewire\Dashboard;

use App\Models\Corp;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BranchesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Corp $corp;
    public ?string $targetStep = '';

    public function mount($corp) {
        $this->corp = $corp;
        $this->targetStep = request('target');
    }

    #[On('refresh-branches')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.branches-container', [
            'branches' => $this->corp->branches()->paginate(setting('pagination') ?? 8)
        ]);
    }
}
