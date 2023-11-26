<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\CertificateForm;
use App\Models\BranchCertificate;
use App\Models\CorpBranch;
use Livewire\Component;

class StoreCertificate extends Component
{
    public CertificateForm $form;

    public CorpBranch $branch;

    public BranchCertificate $certificate;

    public string $company_name = '';

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->certificate = new BranchCertificate;
        $this->company_name = $branch->name;
    }

    public function save() {
        $this->validate();

        if($this->certificate && $this->certificate?->id === null) {
            $this->store();
            return redirect()->route('branches.subscription.store', $this->branch)->with('success', trans('message.create'));
        } else {
            $this->update();
        }

        $this->form->reset();
    }

    public function store() {
        if($this->branch->certificate()->count() > 0) {
            return $this->branch->certificate;
        }

        $certificate = $this->branch->certificate()->create($this->form->all());
        return $certificate;
    }

    public function update() {
        $certificate = $this->certificate->update($this->form->all());
        $this->certificate = new BranchCertificate;
        return $certificate;
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-certificate');
    }
}