<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\CorpBranch;
use Livewire\Attributes\On;
use Livewire\Component;

class DashboardContainer extends Component
{
    public CorpBranch $branch;

    #[On('refresh-dashboard')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.container.dashboard-container');
    }
}