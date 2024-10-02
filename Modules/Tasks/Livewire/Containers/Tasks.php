<?php

namespace Modules\Tasks\Livewire\Containers;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Tasks\App\Enums\TaskStatus;
use Modules\Tasks\App\Models\Task;
use Modules\Tasks\App\Services\TaskService;

class Tasks extends Component
{
    use WithPagination;

    public function openAssignUserModal(Task $task) {
        $this->dispatch('set-model', model: $task);
        $this->dispatch('open-modal', target: '#assign-a-user-to-task');
    }

    #[On('refresh-tasks')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function switchStatus(Task $task) {
        $task->update(['status' => TaskStatus::tryFrom($task->status->value > 2 ? 1 : $task->status->value + 1)]);
    }

    public function render()
    {
        return view('tasks::livewire.containers.tasks', [
            'tasks' => app()->make(TaskService::class)->paginate()
        ]);
    }
}
