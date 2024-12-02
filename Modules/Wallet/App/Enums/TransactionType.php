<?php

namespace Modules\Wallet\App\Enums;

use App\Traits\HasLabel;

enum TransactionType:int {
    use HasLabel;
    case Deposit = 1;
    case Withdraw = 2;
    case ConvertPoints = 3;
}