<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.users-container', [
            'users' => User::with('roles')->where('id', '<>', auth()->id())->latest()->paginate(setting('pagination') ?? 8)
        ]);
    }
}