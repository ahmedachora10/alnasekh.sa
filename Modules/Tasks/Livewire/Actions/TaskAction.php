<?php

namespace Modules\Tasks\Livewire\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Tasks\App\DTO\TaskActionDTO;
use Modules\Tasks\App\Enums\TaskPriority;
use Modules\Tasks\App\Models\Task;
use Modules\Tasks\App\Services\TaskService;
use Modules\Tasks\Livewire\Forms\TaskForm;

class TaskAction extends Component
{
    public TaskForm $form;
    public ?Task $task = null;
    public bool $isAdmin = false;
    public string $refreshEventName = 'refresh-tasks';
    public static string $modal = '#task-action';

    public Collection|array $users = [];
    /**
     * @var array<TaskPriority> $priority
     */
    public array $priority;

    public function mount()
    {
        $this->isAdmin = Auth::user()->hasRole('admin');
        $this->users = $this->isAdmin ? User::whereHasRole('employee')->get() : [];
        $this->priority = TaskPriority::cases();
    }

    #[On('edit-task-action')]
    public function edit(Task $task)
    {
        $this->task = $task;
        $this->form->fill($task->only(['name', 'description', 'assigned_to']) + [
            'start_date' => $task->start_date?->format('Y-m-d H:i'),
            'end_date' => $task->end_date?->format('Y-m-d H:i'),
            'priority' => $task->priority?->value,
        ]);
        $this->dispatch('open-modal', target: self::$modal);
    }
    #[On('delete-task-action')]
    public function delete(Task $task)
    {
        $taskName = $task->name;
        if (!app()->make(TaskService::class)->delete($task->id))
            return false;

        $this->dispatch($this->refreshEventName);
        session()->put('success', 'تم حذف المهمة ' . $taskName);
        $this->dispatch('refresh-alert');
    }
    public function store()
    {
        app()->make(TaskService::class)->store(
            TaskActionDTO::fromLivewireRequest($this->form->all())
        );
    }
    public function update()
    {
        app()->make(TaskService::class)->update(
            $this->task,
            TaskActionDTO::fromLivewireRequest($this->form->all())
        );
    }
    public function save()
    {
        $this->validate();

        if(!$this->isAdmin)
            $this->form->fill(['assigned_to' => Auth::id()]);

        if (!$this->task) {
            $this->store();
            $message = 'تم اضافة المهمة بنجاح';
        } else {
            $this->update();
            $message = 'تم تحديث المهمة بنجاح';
        }

        $this->dispatch($this->refreshEventName);
        $this->dispatch('close-modal', target: self::$modal);
        session()->put('success', $message);
        $this->dispatch('refresh-alert');
        $this->form->reset();
    }
    public function render()
    {
        return view('tasks::livewire.actions.task-action');
    }
}
