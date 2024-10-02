<?php

namespace Modules\Tasks\App\Enums;
use App\Traits\HasLabel;

enum TaskStatus:int {
    use HasLabel;
    case Pending = 1;
    case InReview = 2;
    case Done = 3;

    public function color() {
        return match ($this) {
            self::Pending => 'warning',
            self::InReview => 'info',
            self::Done => 'primary',
        };
    }
}