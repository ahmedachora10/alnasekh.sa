<?php

namespace App\Enums;

enum PlatformsSubscriptionType:int {
    case K = 1;
    case M = 2;
    case S = 3;
    case SA = 4;
    case AB = 5;
    case DB = 6;

    public function name() {
        return match ($this) {
            self::K => 'قوى',
            self::M => 'مدد',
            self::S => 'سبل',
            self::SA => 'الغرفة التجارية',
            self::AB => 'ابشر - مقيم',
            self::DB => 'اعتماد',
        };
    }

    public function thumbnail() {
        return match ($this) {
            // self::K => 'قوى',
            // self::M => 'مدد',
            // self::S => 'سبل',
            // self::SA => 'الغرفة التجارية',
            // self::AB => 'ابشر - مقيم',
            default => 'https://th.bing.com/th/id/OIP.g1K70P37u_RLgGQe4Ii5RQHaHa?w=192&h=192&c=7&r=0&o=5&dpr=1.3&pid=1.7'
        };
    }
}
