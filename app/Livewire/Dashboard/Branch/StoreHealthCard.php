<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\HealthCardForm;
use App\Models\BranchEmployee;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreHealthCard extends Component
{

    public HealthCardForm $form;

    public BranchEmployee $employee;

    public function save() {
        $this->validate();

        if($this->employee->healthCardPaper) {
            $this->employee->healthCardPaper()->update($this->form->all());
            session()->put('success', trans('message.update'));
        } else {
            $this->employee->healthCardPaper()->create($this->form->all());
            session()->put('success', trans('message.create'));
        }

        $this->dispatch('refresh-employees');
        $this->dispatch('close-modal');
        $this->dispatch('refresh-alert');
        $this->form->reset();
    }

    #[On('create-update-health-card')]
    public function newOrUpdate(BranchEmployee $employee) {
        $this->employee = $employee;

        if($this->employee->healthCardPaper) {
            $this->edit();
        } else {
            $this->create();
        }

        $this->dispatch('open-modal', target:'#branchEmployeeHealthCardFormModal');
    }

    private function edit() {
        $insurance = $this->employee->healthCardPaper;
        $this->form->certificate_number = $insurance->certificate_number;
        $this->form->start_date = $insurance->date('start_date');
        $this->form->end_date = $insurance->date('end_date');
    }

    private function create() {
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-health-card');
    }
}