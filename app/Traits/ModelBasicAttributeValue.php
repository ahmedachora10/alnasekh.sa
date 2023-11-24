<?php

namespace App\Traits;

trait ModelBasicAttributeValue {
    public function date($attribute) {
        return $this->attributes[$attribute];
    }
}