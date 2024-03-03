<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\CivilDefenseCertificateForm;
use App\Models\BranchCivilDefenseCertificate;
use App\Traits\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateCivilDefenseCertificate extends Component
{
    use Message;

    public CivilDefenseCertificateForm $form;

    public ?BranchCivilDefenseCertificate $certificate = null;

    #[On('edit-branch-civil-defense-permit')]
    public function edit(BranchCivilDefenseCertificate $certificate) {

        $this->certificate = $certificate;

        $this->form->permit = $certificate->permit;
        $this->form->ministry_of_interior_number = $certificate->ministry_of_interior_number;
        $this->form->start_date = $certificate->date('start_date');
        $this->form->end_date = $certificate->date('end_date');

        $this->dispatch('open-modal', target: '#updateCivilDefenseCertificateForm');
    }

    public function update() {
        $this->validate();

        $this->certificate->update($this->form->all());

        $this->fireMessage();

        $this->dispatch('refresh-dashboard');
        $this->dispatch('close-modal', target: '#updateCivilDefenseCertificateForm');
        $this->dispatch('open-modal', target: '#createCorpReportModal');
    }


    public function render()
    {
        return view('livewire.dashboard.branch.update-civil-defense-certificate');
    }
}
