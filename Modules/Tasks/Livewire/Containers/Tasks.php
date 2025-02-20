<?php

namespace Modules\Tasks\Livewire\Containers;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Tasks\App\Enums\TaskStatus;
use Modules\Tasks\App\Models\Task;
use Modules\Tasks\App\Services\TaskService;

class Tasks extends Component
{
    use WithPagination;

    public array $columns = [];
    public bool $admin = false;

    public function mount() {
        $this->admin = Auth::user()->hasRole('admin');
        $this->columns = ['name', 'status'];

        if($this->admin) {
            array_push($this->columns, 'employee', 'due date');
        }
    }

    public function openAssignUserModal(Task $task) {
        $this->dispatch('set-model', model: $task);
        $this->dispatch('open-modal', target: '#assign-a-user-to-task');
    }

    #[On('refresh-tasks')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function switchStatus(Task $task) {
        app(TaskService::class)->switchStatus($task);
    }

    public function render()
    {
        return view('tasks::livewire.containers.tasks', [
            'tasks' => app()->make(TaskService::class)->paginate()
        ]);
    }
}
