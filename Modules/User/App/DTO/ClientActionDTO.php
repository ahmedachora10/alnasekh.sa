<?php

namespace Modules\User\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class ClientActionDTO implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $city,
        public readonly Carbon $registrationAt,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'registration_at' => $this->registrationAt,
        ];
    }

    public static function fromWebRequest(\Illuminate\Foundation\Http\FormRequest $request): static
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            phone: $request->validated('phone'),
            city: $request->validated('city'),
            registrationAt: Carbon::parse($request->validated('registration_at')),
        );
    }
}