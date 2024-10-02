<?php

namespace App\Contracts;

interface FromLivewireRequest {
    public static function fromLivewireRequest(array $data) : static;
}