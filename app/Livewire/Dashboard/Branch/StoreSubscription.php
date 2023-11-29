<?php

namespace App\Livewire\Dashboard\Branch;

use App\Enums\PlatformsSubscriptionType;
use App\Livewire\Forms\SubscriptionForm;
use App\Models\BranchSubscrition;
use App\Models\CorpBranch;
use Livewire\Component;

class StoreSubscription extends Component
{
    public SubscriptionForm $form;

    public CorpBranch $branch;

    public BranchSubscrition $subscription;

    public array $subscriptionTypes = [];
    public PlatformsSubscriptionType $selectedType;

    public string $company_name = '';
    public string $registration_number = '';

    public bool $allSubscriptionsAdded = false;

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->subscription = new BranchSubscrition;
        $this->company_name = $branch->name;
        $this->registration_number = $branch->registration_number;

        $this->subscriptionTypes = PlatformsSubscriptionType::cases();

        $this->allSubscriptionsAdded = $this->branch->subscriptions()->count() === 4;

        if($type = $this->branch?->subscriptions()?->latest()?->first()) {
            $this->selectedType = $type->subscription_type;
            $this->selectedType = $this->getNextSubscriptionType();
        } else {
            $this->selectedType = PlatformsSubscriptionType::K;
        }
    }

    public function edit(BranchSubscrition $subscription) {
        $this->dispatch('open-modal');
        $this->subscription = $subscription;

        $this->form->type = $subscription->type;
        $this->form->status = $subscription->status;
        $this->form->start_date = $subscription->date('start_date');
        $this->form->end_date = $subscription->date('end_date');
    }

    public function save() {
        $this->validate();

        if($this->allSubscriptionsAdded) {
            return $this->redirectTo();
        }

        if($this->branch->subscriptions()->firstWhere('subscription_type', $this->selectedType->value) && !$this->allSubscriptionsAdded) {
            session()->put('success', trans('message.exists'));
            return $this->dispatch('refresh-alert');
        }

        $this->store();

        $this->allSubscriptionsAdded = $this->branch->subscriptions()->count() === 4;

        $this->dispatch('refresh-alert');
    }

    public function redirectTo() {
        return redirect()->route('branches.monthly-quarterly-update.store', $this->branch)->with('success', trans('message.create'));
    }

    private function store() {
        $subscription = $this->branch->subscriptions()->create($this->form->all() + ['subscription_type' => $this->selectedType]);

        $this->selectedType = $this->getNextSubscriptionType();

        session()->put('success', trans('message.create'));

        $this->form->reset();

        return $subscription;
    }

    public function udpate() {
        $this->subscription->update($this->form->all());
        session()->put('success', trans('message.update'));

        $this->subscription = new BranchSubscrition;
        $this->form->reset();

        $this->dispatch('close-modal');
        $this->dispatch('refresh-alert');
    }

    private function getNextSubscriptionType() : PlatformsSubscriptionType {
        $nextcollect = collect($this->subscriptionTypes)->skip($this->selectedType->value)->first();

        return $nextcollect ?? PlatformsSubscriptionType::SA;
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-subscription');
    }
}
