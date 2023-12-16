<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = strtolower($this->method());
        return $method === 'put' ? $this->updateRules() : $this->storeRules();
    }

    private function storeRules() {
        return [
            'name' => ['required', 'string', 'unique:registries,name'],
            'image' => 'required|image',
        ];
    }

    private function updateRules() {
        return [
            'name' => ['required', 'string', Rule::unique('registries', 'name')->ignore($this->route('registry'))],
            'image' => 'nullable|image',
        ];
    }
}