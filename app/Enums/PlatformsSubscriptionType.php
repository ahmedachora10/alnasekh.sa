<?php

namespace App\Enums;

enum PlatformsSubscriptionType:int {
    case K = 1;
    case M = 2;
    case S = 3;
    case SA = 4;

    public function name() {
        return match ($this) {
            self::K => 'قوى',
            self::M => 'مدد',
            self::S => 'سبل',
            self::SA => 'الغرفة التجارية',
        };
    }
}