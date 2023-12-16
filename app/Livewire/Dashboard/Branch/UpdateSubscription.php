<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\BranchSubscription;
use App\Traits\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateSubscription extends Component
{
    use Message;

    public SubscriptionForm $form;

    public ?BranchSubscription $subscription = null;

    #[On('edit-dashboard-branch-subscription')]
    public function edit(BranchSubscription $subscription) {
        $this->subscription = $subscription;

        $this->form->type = $subscription->type;
        $this->form->status = $subscription->status;
        $this->form->start_date = $subscription->date('start_date');
        $this->form->end_date = $subscription->date('end_date');

        $this->dispatch('open-modal', target: '#updateSubscriptoinModal');
    }

    public function update() {
        $this->validate();

        $this->subscription->update($this->form->all());

        $this->dispatch('refresh-dashboard');
        $this->dispatch('close-modal', target: '#updateSubscriptoinModal');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.update-subscription');
    }
}
