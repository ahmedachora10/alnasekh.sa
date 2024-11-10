<?php

namespace Modules\Tasks\Livewire\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Tasks\App\Models\Task;

class AssignUserTo extends Component
{
    use WithPagination;
    public ?Task $model = null;
    public string $columnName = 'user_id';
    public function currentEmployee(int $userId): bool {
        return $this->model?->{$this->columnName} == $userId;
    }
    #[On('set-model')]
    public function setModel(Task $model) {
        $this->model = $model;
    }
    public function assign(User $user) {

        if ($user->id === $this->model?->{$this->columnName})
            return false;

        $this->model?->update([$this->columnName => $user->id, 'assigned_at' => now()]);
        session()->put('success', 'تم تعيين ' . $user->name . '  للمهمة ' . $this->model->name);
        $this->dispatch('refresh-alert');
        $this->dispatch('close-modal', target: '#assign-a-user-to-task');
        $this->dispatch('refresh-tasks');
    }
    public function render()
    {
        return view('tasks::livewire.actions.assign-user-to', [
            'users' => User::with('roles')->paginate(10)
        ]);
    }
}