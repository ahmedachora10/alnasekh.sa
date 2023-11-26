<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorpBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'corp_id' => 'required|integer|existis:corps,id',
            'name' => 'required|string|min:3',
            'registration_number' => 'required|numeric',
            'address' => 'nullable|string'
        ];
    }
}