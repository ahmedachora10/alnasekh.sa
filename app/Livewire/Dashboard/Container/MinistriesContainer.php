<?php

namespace App\Livewire\Dashboard\Container;

use App\Livewire\Forms\MinistryForm;
use App\Models\Ministry;
use Livewire\Component;
use Livewire\WithPagination;

class MinistriesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public MinistryForm $form;

    public ?Ministry $ministry = null;

    public bool $open = false;

    public function save() {
        $this->validate();

        if($this->ministry === null) {
            $message = $this->store();
        } else {
            $message = $this->update();
        }

        $this->form->reset();

        session()->put('success', $message);
        $this->dispatch('refresh-alert');
    }

    public function store() {
        Ministry::create($this->form->all());

        return trans('message.create');
    }

    public function update() {
        $this->ministry->update($this->form->all());
        $this->reset('ministry');
        return trans('message.update');
    }

    public function delete(Ministry $ministry) {
        $ministry->delete();

        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
        $this->dispatch('refresh-entities');
    }

    public function edit(Ministry $ministry) {
        $this->ministry = $ministry;
        $this->form->name = $ministry->name;
        $this->open = true;
    }

    public function switchForm() {
        $this->open = !$this->open;
    }

    public function render()
    {
        return view('livewire.dashboard.container.ministries-container', [
            'ministries' => Ministry::paginate(setting('pagination') ?? 8)
        ]);
    }
}