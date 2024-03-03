<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\CertificateForm;
use App\Models\BranchCertificate;
use App\Traits\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateCertificate extends Component
{
    use Message;

    public CertificateForm $form;

    public ?BranchCertificate $certificate = null;


    #[On('edit-branch-certificate')]
    public function edit(BranchCertificate $certificate) {

        $this->certificate = $certificate;

        $this->form->certificate_number = $certificate->certificate_number;
        $this->form->type = $certificate->type;
        $this->form->start_date = $certificate->date('start_date');
        $this->form->end_date = $certificate->date('end_date');

        $this->dispatch('open-modal', target: '#updateCertificateForm');
    }

    public function update() {
        $this->validate();

        $this->certificate->update($this->form->all());

        $this->fireMessage();

        $this->dispatch('refresh-dashboard');
        $this->dispatch('close-modal', target: '#updateCertificateForm');
        $this->dispatch('open-modal', target: '#createCorpReportModal');
    }


    public function render()
    {
        return view('livewire.dashboard.branch.update-certificate');
    }
}
