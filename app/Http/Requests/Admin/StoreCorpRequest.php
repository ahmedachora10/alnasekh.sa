<?php

namespace App\Http\Requests\Admin;

use App\Enums\HasBranches;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreCorpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'administrator_name'  => 'required|string',
            'phone'  => 'required|string',
            'email'  => 'required|email',
            'commercial_registration_number'  => 'required|numeric',
            'start_date'  => 'required|date',
            'end_date'  => 'required|date|after:start_date',
            'has_branches'  => ['required', new Enum(HasBranches::class)],
            'image' => ['required', 'image'],
            'send_reminder' => ['sometimes', 'boolean'],
        ];
    }
}