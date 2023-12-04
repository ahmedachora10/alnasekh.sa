<?php

namespace App\Livewire\Dashboard\Branch;

use App\Models\CorpBranch;
use App\Traits\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UpdateEmployee extends Component
{
    use Message, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public CorpBranch $branch;

    #[On('refresh-employees')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.update-employee', [
            'employees' => $this->branch->employees()->paginate(setting('pagination') ?? 8)
        ]);
    }
}