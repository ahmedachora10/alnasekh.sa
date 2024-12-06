<?php

namespace Modules\User\Livewire\Container;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\App\Models\Client;
use Modules\User\App\Services\ClientService;

class Clients extends Component
{
    use WithPagination;
    public string $search = '';

    public function switch(Client $client) {
        $client->update(['blocked' => !$client->blocked]);
        session()->put('success', trans('message.update'));
        $this->dispatch('refresh-alert');
    }

    public function render()
    {
        return view('user::livewire.container.clients', [
            'clients' => app()->make(ClientService::class, ['search' => $this->search])->paginate()
        ]);
    }
}