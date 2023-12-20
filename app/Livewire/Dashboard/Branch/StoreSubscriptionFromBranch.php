<?php

namespace App\Livewire\Dashboard\Branch;

use App\Enums\PlatformsSubscriptionType;
use App\Livewire\Forms\SubscriptionForm;
use App\Models\CorpBranch;
use Livewire\Component;

class StoreSubscriptionFromBranch extends Component
{
    public SubscriptionForm $form;

    public CorpBranch $branch;

    public string $company_name = '';
    public string $registration_number = '';

    public array $subscriptionTypes = [];
    public array $savedSubscriptions = [];

    public ?int $selected = null;

    public function mount(CorpBranch $branch) {
        $this->branch = $branch;
        $this->company_name = $branch->name;
        $this->registration_number = $branch->registration_number;

        $this->subscriptionTypes = PlatformsSubscriptionType::cases();
    }

    public function selectStep(int $type) {
        $this->selected = $type;
    }

    public function save() {
        $this->validate();

        if($this->selected === null) {
            session()->flash('selected', 'اختر احد الاشتراكات المتاحة أول');
        }

        $this->branch->subscriptions()->create($this->form->all() + ['subscription_type' => $this->selected]);

        session()->put('success', trans('message.create'));

        $this->form->reset();
        $this->reset('selected');

        $this->dispatch('refresh-alert');
        $this->dispatch('$refresh');
        $this->dispatch('refresh-dashboard');
    }

    public function render()
    {
        $this->savedSubscriptions = $this->branch->subscriptions()->pluck('subscription_type')->toArray();
        return view('livewire.dashboard.branch.store-subscription-from-branch');
    }
}