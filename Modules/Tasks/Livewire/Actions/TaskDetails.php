<?php

namespace Modules\Tasks\Livewire\Actions;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Tasks\App\Models\Task;

class TaskDetails extends Component
{
    public ?Task $task = null;

    public static $modal = '#task-details-action';

    #[On('task-details-action')]
    public function setModel(Task $task) {
        $this->task = $task;
        $this->dispatch('open-modal', target: self::$modal);
    }
    public function render()
    {
        return view('tasks::livewire.actions.task-details');
    }
}