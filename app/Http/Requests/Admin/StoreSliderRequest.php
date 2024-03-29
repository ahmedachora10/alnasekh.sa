<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'title_en' => ['nullable', 'string'],
            'delay' => ['nullable', 'integer'],
            'delay_en' => ['nullable', 'integer'],
            'image' => strtolower($this->method()) == 'put' ? 'nullable|image' : 'required|image',
            'image_en' => strtolower($this->method()) == 'put' ? 'nullable|image' : 'required|image',
        ];
    }
}
