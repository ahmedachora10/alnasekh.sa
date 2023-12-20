<?php

namespace App\Livewire\Dashboard\Branch;

use App\Models\BranchEmployee;
use App\Models\CorpBranch;
use App\Traits\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UpdateEmployee extends Component
{
    use Message, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public CorpBranch $branch;

    public $search = '';

    #[On('refresh-employees')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    #[On('open-medical-insurance-modal')]
    public function createInsuranceMidecal(int $employee) {
        $this->dispatch('create-update-medical-insurance', employee: BranchEmployee::find($employee));
        $this->dispatch('open-modal', target: '#branchEmployeeMedicalInsuranceFormModal');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.update-employee', [
            'employees' => BranchEmployee::search($this->search)->where('corp_branch_id', $this->branch->id)->paginate(setting('pagination') ?? 8)
        ]);
    }
}