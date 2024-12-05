<?php

namespace Modules\User\Livewire\Container;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\App\Services\ClientService;

class Clients extends Component
{
    use WithPagination;
    public string $search = '';

    public function render()
    {
        return view('user::livewire.container.clients', [
            'clients' => app()->make(ClientService::class, ['search' => $this->search])->paginate()
        ]);
    }
}