<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface FromApiRequest {
    public function fromApiRequest(FormRequest $request) : static;
}