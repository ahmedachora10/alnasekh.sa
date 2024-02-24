<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\RegistryForm;
use App\Models\CorpBranch;
use App\Models\CorpBranchRegistry;
use App\Models\Registry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreRegistry extends Component
{
    public RegistryForm $form;

    public CorpBranch $branch;

    public $registryId;
    public Registry $registry;

    public function mount($branch) {
        $this->branch = $branch;
        $this->registry = new Registry;
        $this->form->commercial_registration_number = $branch->corp->commercial_registration_number;
    }

    public function save() {
        $this->validate();

        if($this->registryId && $this->registry && $this->registry?->id === null) {
            $this->store();
        } else {
            $this->update();
        }

        $this->dispatch('refresh-alert');
        $this->dispatch('close-modal');
        $this->dispatch('refresh-branch-registries');

        $this->form->reset('start_date', 'end_date');
    }

    #[On('create-branch-registry')]
    public function create(int $registryId) {
        $this->registryId = $registryId;
        $this->form->reset('start_date', 'end_date', 'registry_number');
        $this->dispatch('open-modal', target: '#branchRegistryFormModal');
    }

    #[On('edit-branch-registry')]
    public function edit(Registry $registry) {
        $registry = $this->branch->registries->find($registry->id);

        $this->registry = $registry;
        $this->form->registry_number = $registry->registry->registry_number;
        $this->form->start_date = $this->parseDate($registry->registry->start_date);
        $this->form->end_date = $this->parseDate($registry->registry->end_date);

        $this->dispatch('open-modal', target: '#branchRegistryFormModal');
    }

    private function parseDate($date) {
        return $date ? Carbon::parse($date)->format('Y-m-d') : null;
    }

    private function store() {
        $this->branch->registries()->attach($this->registryId, $this->form->all());
        session()->put('success', trans('message.create'));
    }

    private function update() {
        // $this->branch->registries()->updateExistingPivot($this->registry->id, $this->form->all());


        $registry = CorpBranchRegistry::where('registry_id', $this->registry->id)
                    ->where('corp_branch_id', $this->branch->id)->first();
        $oldEndDate = $registry->end_date;

        $registry->update($this->form->all());
        $registry->fireUpdatedEvent($oldEndDate);
        // if($registry) {
        //     DB::table('notifications')
        //         ->whereJsonContains("data->id", $registry->id)
        //         ->whereJsonDoesntContain("data->date", 'date')
        //         ->whereJsonContains('data->model', $registry::class)?->delete();
        // }

        session()->put('success', trans('message.update'));
        $this->dispatch('refresh-dashboard');
    }

    #[On('delete-branch-registry')]
    public function delete(Registry $registry) {
        DB::transaction(function () use($registry) {

            // $this->branch->registries()->detach($registry->id);

            if(
                $removedItemId = CorpBranchRegistry::where('registry_id', $registry->id)
                    ->where('corp_branch_id', $this->branch->id)
                    ->first()
            ) {
                DB::table('notifications')
                ->whereJsonContains("data->id", $removedItemId->id)
                ->whereJsonContains('data->model', Registry::class)?->delete();

                $removedItemId->delete();

                session()->put('success', trans('message.delete'));

                $this->dispatch('refresh-alert');
                $this->dispatch('refresh-branch-registries');

                $this->dispatch('refresh-store-registry-from-branch');
                $this->dispatch('refresh-dashboard');
            }

        });

    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-registry');
    }
}