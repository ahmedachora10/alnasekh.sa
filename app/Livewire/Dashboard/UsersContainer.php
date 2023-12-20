<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class UsersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        return view('livewire.dashboard.users-container', [
            'users' => User::search($this->search)
            ->query(fn (Builder $query) => $query->with('roles')->where('id', '<>', auth()->id())->latest())
            ->paginate(setting('pagination') ?? 8)
        ]);
    }
}