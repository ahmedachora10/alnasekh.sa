<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\ReportForm;
use App\Models\Corp;
use App\Models\CorpReport;
use App\Models\Entity;
use App\Models\Ministry;
use App\Models\Mission;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreReport extends Component
{
    public ReportForm $form;

    public Corp $corp;

    public ?CorpReport $report = null;

    public $ministries = [];

    public function mount() {
        $this->ministries = Ministry::all();
    }

    public function save() {
        $this->validate();
        if($this->report === null) {
            $this->store();
        } else {
            $this->update();
        }

        $this->form->reset();
        $this->dispatch('refresh-corp-reports');
        $this->dispatch('refresh-alert');
        $this->dispatch('close-modal');
        $this->reset('report');
    }

    #[On('edit-corp-report')]
    public function edit(CorpReport $report) {
        $this->report = $report;
        $this->form->fill($report);
    }

    #[On('delete-corp-report')]
    public function delete(CorpReport $report) {
        $report->delete();
        session()->put('success', trans('message.delete'));

        $this->dispatch('refresh-corp-reports');
        $this->dispatch('refresh-alert');
    }

    private function store() {
        $report = $this->corp->reports()->create($this->form->all());
        session()->put('success', trans('message.update'));
    }

    private function update() {
        $this->report->update($this->form->all());
        session()->put('success', trans('message.update'));
    }

    public function render()
    {
        return view('livewire.dashboard.store-report', [
            'entities' => Entity::where('ministry_id', $this->form?->ministry)->get(),
            'missions' => Mission::where('entity_id', $this->form?->entity)->get(),
        ]);
    }
}