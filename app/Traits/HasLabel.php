<?php

namespace App\Traits;

trait HasLabel {
    public function label() : string
    {
        return str($this->name)
            ->title()
            ->headline();
    }
}