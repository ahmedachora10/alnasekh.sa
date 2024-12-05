<?php

namespace Modules\User\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;
use Illuminate\Http\UploadedFile;

class ClientActionDTO implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly string $email = '',
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    public static function fromWebRequest(\Illuminate\Foundation\Http\FormRequest $request): static
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
        );
    }
}