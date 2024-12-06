<?php

namespace Modules\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $this->prepareUniqueFields('email')],
            'phone' => ['required', 'numeric', $this->prepareUniqueFields('phone')],
            'city' => ['required', 'string', 'max:255'],
            'registration_at' => ['required', 'date'],
        ];
    }

    private function prepareUniqueFields(string $field) {
        return $this->isMethod('put') ?
        Rule::unique('clients', $field)->ignore($this->route('client'))
        : 'unique:clients,'.$field;
    }
}