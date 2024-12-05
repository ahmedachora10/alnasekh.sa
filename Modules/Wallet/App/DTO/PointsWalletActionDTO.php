<?php

namespace Modules\Wallet\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;

class PointsWalletActionDTO implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly int $userId,
        public readonly float $points = 0,
    ) {}

    public function toArray(): array
    {
        return [
            'client_id' => $this->userId,
            'points' => $this->points,
        ];
    }

    public static function fromWebRequest(\Illuminate\Foundation\Http\FormRequest $request): static
    {
        return new self(
            userId: $request->validated('client_id'),
            points: $request->validated('points'),
        );
    }
}