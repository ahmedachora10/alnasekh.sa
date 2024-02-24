<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\MedicalInsuranceForm;
use App\Models\BranchEmployee;
use App\Models\EmployeeMedicalInsurance;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreMedicalInsurance extends Component
{

    public MedicalInsuranceForm $form;

    public BranchEmployee $employee;

    public function save() {
        $this->validate();

        if($this->employee->medicalInsurance) {
            // $this->employee->medicalInsurance()->update($this->form->all());
            EmployeeMedicalInsurance::firstWhere('branch_employee_id', $this->employee->id)->update($this->form->all());

            session()->put('success', trans('message.update'));
        } else {
            $this->employee->medicalInsurance()->create($this->form->all());
            session()->put('success', trans('message.create'));
        }

        $this->dispatch('refresh-employees');
        $this->dispatch('close-modal');
        $this->dispatch('refresh-alert');
    }

    #[On('create-update-medical-insurance')]
    public function newOrUpdate(BranchEmployee $employee) {
        $this->employee = $employee;

        if($this->employee->medicalInsurance) {
            $this->edit();
        } else {
            $this->create();
        }

        $this->dispatch('open-modal', target:'#branchEmployeeMedicalInsuranceFormModal');
    }

    private function edit() {
        $insurance = $this->employee->medicalInsurance;
        $this->form->company = $insurance->company;
        $this->form->policy = $insurance->policy;
        $this->form->type = $insurance->type;
        $this->form->start_date = $insurance->date('start_date');
        $this->form->end_date = $insurance->date('end_date');
    }

    private function create() {
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-medical-insurance');
    }
}