<?php

namespace Modules\Wallet\App\Enums;

use App\Traits\HasLabel;

enum TransactionStatus:int {
    use HasLabel;
    case Pending = 1;
    case Completed = 2;
    case Failed = 3;
}