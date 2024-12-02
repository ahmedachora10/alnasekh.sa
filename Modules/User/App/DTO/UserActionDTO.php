<?php

namespace Modules\User\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;
use Illuminate\Http\UploadedFile;

class UserActionDTO implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly array $roles = [],
        public readonly ?string $password = null,
        public readonly ?UploadedFile $avatar = null,
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
            password: $request->validated('password'),
            roles: $request->validated('roles'),
            avatar: $request->validated('avatar'),
        );
    }
}