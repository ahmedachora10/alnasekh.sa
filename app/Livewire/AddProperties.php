<?php

namespace App\Livewire;

use Livewire\Component;

class AddProperties extends Component
{
    public array $properties = [];

    public string $property = '';

    public function add() {
        array_push($this->properties, $this->property);
        $this->reset('property');
    }

    public function remove(string $property) {

        $index = array_search($property, $this->properties);

        if($index !== false) {
            array_splice($this->properties, $index, 1);
        }
    }

    public function render()
    {
        return view('livewire.add-properties');
    }
}