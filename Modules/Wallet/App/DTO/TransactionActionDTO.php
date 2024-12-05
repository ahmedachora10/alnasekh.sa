<?php

namespace Modules\Wallet\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;
use Modules\Wallet\App\Enums\TransactionStatus;
use Modules\Wallet\App\Enums\TransactionType;

class TransactionActionDTO implements DTOInterface, ToArray {
    public function __construct(
        public readonly int $userId,
        public readonly TransactionType $type,
        public readonly float $points = 0,
        public readonly float $amount = 0,
        public readonly TransactionStatus $status = TransactionStatus::Pending,
    ) {}

    public function toArray(): array
    {
        return [
            'client_id' => $this->userId,
            'points' => $this->points,
            'amount' => $this->amount,
            'type' => $this->type->value,
            'status' => $this->status->value,
        ];
    }
}