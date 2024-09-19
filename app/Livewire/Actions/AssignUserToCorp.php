<?php

namespace App\Livewire\Actions;

use App\Models\Corp;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class AssignUserToCorp extends Component
{
    public ?Corp $corp = null;

    #[On('set-corp')]
    public function setCorp(Corp $corp) {
        $this->corp = $corp;
    }
    public function assign(User $user) {

        if ($user->id === $this->corp->user_id)
            return false;

        $this->corp->update(['user_id' => $user->id]);
        session()->put('success', 'تم تعيين ' . $user->name . ' لادارة المنشأة ' . $this->corp->name);
        $this->dispatch('refresh-alert');
        $this->dispatch('close-modal', target: '#assign-a-user-to-crop');
        $this->dispatch('refresh-corps');
    }
    public function render()
    {
        return view('livewire.actions.assign-user-to-corp', [
            'users' => User::with('roles')
            // ->where('id', '<>', auth()->id())
            ->get()
        ]);
    }
}