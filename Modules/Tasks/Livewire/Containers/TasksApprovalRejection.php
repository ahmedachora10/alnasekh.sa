<?php

namespace Modules\Tasks\Livewire\Containers;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Tasks\App\Enums\UserTaskStatus;
use Modules\Tasks\App\Models\UserTask;
use Modules\Tasks\App\Services\TaskService;

class TasksApprovalRejection extends Component
{
    use WithPagination;

    public bool $isAdmin = false;
    public bool $open = false;
    public bool $showReason = false;
    public ?int $taskId = null;
    #[Validate('required|string|min:3')]
    public string $comment = '';

    public function mount() {
        $this->isAdmin = Auth::user()->hasRole('admin');
    }

    public function accept(UserTask $userTask) {
        app(TaskService::class)->approvalOrReject($userTask, UserTaskStatus::Accepted);
    }
    public function reason(string $reason) {
        $this->comment = $reason;

        $this->showReason = true;
    }
    public function commentForm(int $taskId) {
        $this->taskId = $taskId;
        $this->open = true;
    }

    public function reject(UserTask $userTask) {
        $this->validate();
        app(TaskService::class)->approvalOrReject(
            userTask: $userTask,
            status: UserTaskStatus::Rejected,
            reason: $this->comment
        );

        $this->reset('open', 'taskId');
    }

    public function render()
    {
        return view('tasks::livewire.containers.tasks-approval-rejection', [
            'items' => UserTask::with(['employee', 'task'])
                    ->when(
                        value: !$this->isAdmin,
                        callback: fn($query) => $query->where('user_id', Auth::id())
                    )->when(
                        value: $this->isAdmin,
                        callback: fn($query) => $query->fromEmployee()
                    )
                    ->orderBy('status')
                    ->paginate(9)
        ]);
    }
}