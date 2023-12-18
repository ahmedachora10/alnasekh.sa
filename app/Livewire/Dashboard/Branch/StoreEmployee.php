<?php

namespace App\Livewire\Dashboard\Branch;

use App\Enums\Nationalities;
use App\Livewire\Forms\EmployeeForm;
use App\Models\BranchEmployee;
use App\Models\CorpBranch;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreEmployee extends Component
{
    public EmployeeForm $form;

    public CorpBranch $branch;

    public BranchEmployee $employee;


    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->employee = new BranchEmployee;
        $this->form->nationality = Nationalities::SAUDIA;
    }

    public function save() {
        $this->validate();

        if($this->employee && $this->employee->id !== null) {
            $this->update();
        } else {
            $this->store();
        }

        $this->dispatch('close-modal');
        $this->dispatch('refresh-alert');
        $this->dispatch('refresh-employees');
        $this->form->reset();
    }

    private function store() {
        $employee = $this->branch->employees()->create($this->form->all());
        session()->put('success', trans('message.create'));

        $this->dispatch('open-medical-insurance-modal', employee: $employee->id);
    }

    private function update() {
        $this->employee->update($this->form->all());
        session()->put('success', trans('message.update'));
        $this->employee = new BranchEmployee;
    }

    #[On('reset-employee-form')]
    public function resetForm() {
        $this->form->reset();
    }

    #[On('edit-employee')]
    public function edit(BranchEmployee $employee) {
        $this->dispatch('open-modal', target: '#branchEmployeeFormModal');
        $this->form->name = $employee->name;
        $this->form->nationality = $employee->nationality;
        $this->form->resident_number = $employee->resident_number;
        $this->form->start_date = $employee->date('start_date');
        $this->form->end_date = $employee->date('end_date');
        $this->form->business_card_start_date = $employee->date('business_card_start_date');
        $this->form->business_card_end_date = $employee->date('business_card_end_date');
        $this->form->contract_start_date = $employee->date('contract_start_date');
        $this->form->contract_end_date = $employee->date('contract_end_date');

        $this->employee = $employee;
    }

    #[On('delete-employee')]
    public function delete(BranchEmployee $employee) {
        $employee->delete();
        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
        $this->dispatch('refresh-employees');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-employee', [
            'employees' => $this->branch->employees()->paginate(setting('pagination') ?? 8)
        ]);
    }
}