<?php

namespace App\Livewire\Dashboard;

use App\Models\Corp;
use App\Models\CorpBranch;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BranchesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Corp $corp;
    public ?string $targetStep = '';

    public $theme;

    public $search = '';

    public function mount($corp, $theme = 'branches-container') {
        $this->corp = $corp;
        $this->targetStep = request('target');
        $this->theme = $theme;
    }

    #[On('refresh-branches')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.'.$this->theme, [
            'branches' => CorpBranch::search($this->search)
            ->query(fn(Builder $query) => $query->with(['corp', 'record', 'certificate', 'civilDefenseCertificate', 'subscriptions', 'monthlyQuarterlyUpdates', 'registries', 'employees'])->where('corp_id', $this->corp->id))
            ->paginate(setting('pagination') ?? 8)
        ]);
    }
}