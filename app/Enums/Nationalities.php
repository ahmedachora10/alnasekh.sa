<?php

namespace App\Enums;

enum Nationalities:int {
    case SAUDIA = 1;
    case FOREIGNER = 2;

    public function name() {
        return match ($this) {
            self::SAUDIA => 'سعودي',
            self::FOREIGNER => 'أجنبي',
        };
    }
}