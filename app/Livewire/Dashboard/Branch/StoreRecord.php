<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\RecordForm;
use App\Models\BranchRecord;
use App\Models\CorpBranch;
use Livewire\Component;

class StoreRecord extends Component
{
    public RecordForm $form;

    public CorpBranch $branch;

    public BranchRecord $record;

    public string $company_name = '';

    public string $registration_number = '';

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->record = new BranchRecord;
        $this->company_name = $branch->name;
        $this->registration_number = $branch->registration_number;
    }

    public function save() {
        $this->validate();

        if($this->record && $this->record?->id === null) {
            $this->store();
            return redirect()->route('branches.certificate.store', $this->branch)->with('success', trans('message.create'));
        } else {
            $this->update();
        }

        $this->form->reset();
    }

    public function store() {
        if($this->branch->record()->count() > 0) {
            return $this->branch->record;
        }

        $record = $this->branch->record()->create($this->form->all());
        return $record;
    }

    public function update() {
        $record = $this->record->update($this->form->all());
        $this->record = new BranchRecord;

        return $record;
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-record');
    }
}