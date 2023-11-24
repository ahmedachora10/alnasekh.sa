<?php


namespace App\Enums;

enum HasBranches:int {
    case No = 0;
    case Yes = 1;

    public function name() {
        return match ($this) {
            self::Yes => trans('common.yes'),
            self::No => trans('common.no'),
            default => '',
        };
    }

    public function color() {
        return match ($this) {
            self::Yes => 'primary',
            self::No => 'secondary',
        };
    }

    public static function values() {
        $values = [];

        foreach (self::cases() as $obj) {
            $values[] = $obj->value;
        }

        return $values;
    }
}