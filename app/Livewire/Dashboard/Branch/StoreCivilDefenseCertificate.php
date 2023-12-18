<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\CivilDefenseCertificateForm;
use App\Models\BranchCivilDefenseCertificate;
use App\Models\CorpBranch;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StoreCivilDefenseCertificate extends Component
{
    public CivilDefenseCertificateForm $form;

    public CorpBranch $branch;

    public ?BranchCivilDefenseCertificate $certificate = null;

    public string $company_name = '';

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->company_name = $branch->corp->name;
    }

    public function save() {
        $this->validate();

        if($this->certificate === null) {
            $this->store();
        } else {
            $this->update();
        }

        $this->form->reset();
        return redirect()->route('branches.subscription.store', $this->branch)->with('success', trans('message.create'));
    }

    public function store() {
        if($this->branch->civilDefenseCertificate()->count() > 0) {
            return $this->branch->certificate;
        }

        $certificate = $this->branch->civilDefenseCertificate()->create($this->form->all());
        return $certificate;
    }

    public function update() {
        $certificate = $this->certificate->update($this->form->all());
        $this->certificate = null;
        return $certificate;
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-civil-defense-certificate');
    }
}