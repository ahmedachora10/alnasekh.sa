<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\BranchEmployee;
use App\Models\CorpBranch;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public CorpBranch $branch;

    public bool $next = false;

    public $search = '';

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
    }

    #[On('refresh-employees')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    private function readyToNextStep() {
        $this->next = !$this->branch->employees()->doesntHave('medicalInsurance')->exists();
    }

    public function render()
    {
        $this->readyToNextStep();
        return view('livewire.dashboard.container.employees-container', [
            'employees' => BranchEmployee::search($this->search)->where('corp_branch_id', $this->branch->id)->paginate(setting('pagination') ?? 8), //$this->branch->employees()->search($this->search)->paginate(setting('pagination') ?? 8)
        ]);
    }
}