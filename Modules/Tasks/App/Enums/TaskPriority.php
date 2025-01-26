<?php

namespace Modules\Tasks\App\Enums;

use App\Traits\HasLabel;

enum TaskPriority:int {
    use HasLabel;
    case Urgent_And_Important = 1;
    case Urgent_And_Not_Important = 2;
    case Important_And_Not_Urgent = 3;
    case Not_Important_And_Not_Urgent = 4;

    public function name() {
        return match ($this) {
            self::Urgent_And_Important => __($this->label()),
            self::Urgent_And_Not_Important => __($this->label()),
            self::Important_And_Not_Urgent => __($this->label()),
            self::Not_Important_And_Not_Urgent => __($this->label()),
        };
    }
    public function color() {
        return match ($this) {
            self::Urgent_And_Important => 'danger',
            self::Urgent_And_Not_Important => 'warning',
            self::Important_And_Not_Urgent => 'info',
            self::Not_Important_And_Not_Urgent => 'secondary',
        };
    }
}