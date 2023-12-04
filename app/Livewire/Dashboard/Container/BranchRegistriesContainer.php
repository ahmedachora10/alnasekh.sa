<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\CorpBranch;
use App\Models\Registry;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class BranchRegistriesContainer extends Component
{

    public CorpBranch $branch;

    public Collection $registries;

    #[Rule('required|integer')]
    public $registryId;

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->registries = Registry::all();
    }

    public function create() {
        $this->validate();
        $this->dispatch('create-branch-registry', registryId: $this->registryId);
    }

    #[On('refresh-branch-registries')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.container.branch-registries-container', [
            'savedRegistries' => collect($this->branch->registries)
        ]);
    }
}
