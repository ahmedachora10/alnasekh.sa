<?php

namespace App\Http\Requests\Admin;

use App\Services\UploadFileService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'roles' => ['required', 'array'],
            'roles.*' => ['required', 'int', 'exists:roles,id'],
            // 'status' => ['required', 'integer', Rule::enum(Status::class)],
            'avatar' => ['sometimes', 'image']
        ];
    }
}