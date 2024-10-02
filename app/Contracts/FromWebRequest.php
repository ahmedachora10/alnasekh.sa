<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface FromWebRequest {
    public static function fromWebRequest(FormRequest $request) : static;
}