<?php

namespace Modules\Tasks\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarEventsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date',
        ];
    }
}