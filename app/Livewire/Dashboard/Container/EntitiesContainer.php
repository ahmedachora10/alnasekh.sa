<?php

namespace App\Livewire\Dashboard\Container;

use App\Livewire\Forms\EntityForm;
use App\Models\Entity;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EntitiesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public EntityForm $form;

    public ?Entity $entity = null;

    public bool $open = false;

    public function save() {
        $this->validate();

        if($this->entity === null) {
            $message = $this->store();
        } else {
            $message = $this->update();
        }

        $this->form->reset('name');

        session()->put('success', $message);
        $this->dispatch('refresh-alert');
    }

    public function store() {
        Entity::create($this->form->all());

        return trans('message.create');
    }

    public function update() {
        $this->entity->update($this->form->all());
        $this->reset('entity');
        return trans('message.update');
    }

    public function delete(Entity $entity) {
        $entity->delete();

        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
        $this->dispatch('refresh-missions');
    }

    public function edit(Entity $entity) {
        $this->entity = $entity;
        $this->form->name = $entity->name;
        $this->form->ministry_id = $entity->ministry_id;
        $this->open = true;
    }

    #[On('entity-action')]
    public function switchForm(int $ministryId) {
        $this->form->ministry_id = $ministryId;
        $this->open = true;
    }

    #[On('refresh-entities')]
    public function refresh() {
        $this->dispatch('$refresh');
        $this->dispatch('refresh-missions');
    }

    public function render()
    {
        return view('livewire.dashboard.container.entities-container', [
            'entities' => Entity::paginate(setting('pagination') ?? 8)
        ]);
    }
}