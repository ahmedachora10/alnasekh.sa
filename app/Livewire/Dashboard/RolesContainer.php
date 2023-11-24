<?php

namespace App\Livewire\Dashboard;

use App\Models\Role;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RolesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    #[On('refresh-roles')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.roles-container', [
            'roles' => Role::with('users')->get()
        ]);
    }
}