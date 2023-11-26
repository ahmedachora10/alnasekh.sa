<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\BranchForm;
use App\Models\Corp;
use App\Models\CorpBranch;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StoreBranch extends Component
{

    public Corp $corp;

    public CorpBranch $branch;

    public BranchForm $form;

    public function mount() {
        $this->branch = new CorpBranch;
    }

    public function save() {
        $this->validate();
        if($this->branch && $this->branch?->id === null) {
            $this->store();
        } else {
            $this->update();
        }

        $this->form->reset();
        $this->dispatch('refresh-branches');
        $this->dispatch('refresh-alert');
        $this->dispatch('close-modal');
    }

    #[On('edit-branch')]
    public function edit(CorpBranch $branch) {
        $this->branch = $branch;
        $this->form->name = $branch->name;
        $this->form->registration_number = $branch->registration_number;
        $this->form->address = $branch->address;
    }

    #[On('delete-branch')]
    public function delete(CorpBranch $branch) {
        $branch->delete();
        session()->put('success', trans('message.delete'));

        $this->dispatch('refresh-branches');
        $this->dispatch('refresh-alert');
    }

    private function store() {
        $branch = $this->corp->branches()->create($this->form->all());
        redirect()->route('branches.record.store', $branch)->with('success', trans('message.create'));
    }

    private function update() {
        $this->branch->update($this->form->all());
        session()->put('success', trans('message.update'));
        $this->branch = new CorpBranch;
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-branch');
    }
}