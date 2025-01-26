<?php

namespace Modules\Tasks\App\Enums;

use App\Traits\HasLabel;

enum UserTaskStatus:int {
    use HasLabel;
    case Pending = 1;
    case Accepted = 2;
    case Rejected = 3;

    public function color() {
        return match ($this) {
            self::Pending => 'warning',
            self::Accepted => 'primary',
            self::Rejected => 'danger',
        };
    }
}