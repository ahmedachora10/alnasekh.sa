<?php

namespace App\Livewire\Dashboard\Container;

use App\Livewire\Forms\MissionForm;
use App\Models\Mission;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MissionsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public MissionForm $form;

    public ?Mission $mission = null;

    public bool $open = false;

    public function save() {
        $this->validate();

        if($this->mission === null) {
            $message = $this->store();
        } else {
            $message = $this->update();
        }

        $this->form->reset('content');

        session()->put('success', $message);
        $this->dispatch('refresh-alert');
    }

    public function store() {
        Mission::create($this->form->all());

        return trans('message.create');
    }

    public function update() {
        $this->mission->update($this->form->all());
        $this->reset('mission');
        return trans('message.update');
    }

    public function delete(Mission $mission) {
        $mission->delete();

        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
        $this->dispatch('refresh-missions');
    }

    public function edit(Mission $mission) {
        $this->mission = $mission;
        $this->form->content = $mission->content;
        $this->form->entity_id = $mission->entity_id;
        $this->open = true;
    }

    #[On('mission-action')]
    public function switchForm(int $entityId) {
        $this->form->entity_id = $entityId;
        $this->open = true;
    }

    #[On('refresh-missions')]
    public function refresh() {
        $this->dispatch('$refresh');
    }
    public function render()
    {
        return view('livewire.dashboard.container.missions-container', [
            'missions' => Mission::paginate(setting('pagination') ?? 8)
        ]);
    }
}
