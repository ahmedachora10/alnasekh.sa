<?php

namespace App\Traits;

trait HasLabel {
    public function label() : string
    {
        return __(str($this->name)
            ->title()
            ->headline()->value());
    }
}