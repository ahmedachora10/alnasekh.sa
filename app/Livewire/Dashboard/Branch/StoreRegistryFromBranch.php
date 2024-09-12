<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\RegistryForm;
use App\Models\CorpBranch;
use App\Models\CorpBranchRegistry;
use App\Models\Registry;
use App\Observers\ActivityLogsObserver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreRegistryFromBranch extends Component
{
    public RegistryForm $form;

    public CorpBranch $branch;

    public Collection $registries;

    public $registryId;

    public function mount($branch) {
        $this->branch = $branch;
        $this->form->commercial_registration_number = $branch->corp->commercial_registration_number;

        $this->registries = Registry::all();
    }

    public function save() {
        $this->validate();

        DB::transaction(function () {
            $this->branch->registries()->attach($this->registryId, $this->form->all());

            (new ActivityLogsObserver(CorpBranchRegistry::class))
            ->created(
                model: $this->branch->registries()->latest()->first()
            );

            session()->put('success', trans('message.create'));

            $this->dispatch('refresh-alert');
            $this->dispatch('refresh-dashboard');
            $this->dispatch('close-modal');

            $this->form->reset('start_date', 'end_date');
            $this->dispatch('open-modal', target: '#createCorpReportModal');
        });
    }

    #[On('refresh-store-registry-from-branch')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-registry-from-branch', [
            'savedRegistries' => $this->branch->registries()->pluck('registry_id')->toArray()
        ]);
    }
}