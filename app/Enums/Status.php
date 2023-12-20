<?php

namespace App\Enums;

enum Status: int {
    case VALID = 1;
    case ALMOST_FINISHED = 2;
    case FINISHED = 3;
    case DEFAULT = 0;

    public function name() {
        return match ($this) {
            self::VALID => trans('common.valid'),
            self::ALMOST_FINISHED => trans('common.almost finished'),
            self::FINISHED => trans('common.finished'),
            self::DEFAULT => trans('common.unknown'),
            default =>  trans('common.unknown'),
        };
    }

    public function color() {
        return match ($this) {
            self::VALID => 'primary',
            self::ALMOST_FINISHED => 'warning',
            self::FINISHED => 'danger',
            self::DEFAULT => '',
            default => '',
        };
    }

    public function icon() {
        return match ($this) {
            self::VALID => 'bx bx-bell-ring',
            self::ALMOST_FINISHED => 'bx bx-bell text-warning',
            self::FINISHED => 'bx bxs-bell-ring text-danger',
            self::DEFAULT => '',
            default => '',
        };
    }
}