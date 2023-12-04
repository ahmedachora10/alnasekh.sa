<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\RecordForm;
use App\Models\BranchRecord;
use App\Traits\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateRecord extends Component
{
    use Message;

    public RecordForm $form;

    public BranchRecord $record;

    #[On('edit-branch-record')]
    public function edit(BranchRecord $record) {

        $this->record = $record;

        $this->form->type = $record->type;
        $this->form->start_date = $record->date('start_date');
        $this->form->end_date = $record->date('end_date');

        $this->dispatch('open-modal', target: '#updateRecordForm');
    }

    public function update() {
        $this->validate();

        $this->record->update($this->form->all());

        $this->fireMessage();

        $this->dispatch('refresh-dashboard');
        $this->dispatch('close-modal', target: '#updateRecordForm');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.update-record');
    }
}