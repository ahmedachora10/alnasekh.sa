<?php

namespace Modules\Tasks\Livewire\Containers;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Tasks\App\Services\MeetingService;

class Meetings extends Component
{
    use WithPagination;


    #[On('refresh-meetings')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('tasks::livewire.containers.meetings', [
            'meetings' => app(MeetingService::class)->paginate()
        ]);
    }
}