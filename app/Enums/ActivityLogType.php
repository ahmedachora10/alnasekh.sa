<?php

namespace App\Enums;

use App\Models\Corp;

enum ActivityLogType:string {
    case Create = 'Create';
    case Update = 'Update';
    case Delete = 'Delete';
    case Login = 'Login';

    public function name() {
        return match ($this) {
            self::Create => 'الاضافة',
            self::Update => 'التحديث',
            self::Delete => 'الحذف',
            self::Login => 'الدخول على الحساب',
        };
    }

    public function color() {
        return match ($this) {
            self::Create => 'primary',
            self::Update => 'info',
            self::Delete => 'danger',
            self::Login => 'warning',
        };
    }

    public function content(string $title): string {
        return match ($this) {
            self::Create => 'تم اضافة ' . $title,
            self::Update => 'تم تحديث ' . $title,
            self::Delete => 'تم حذف ' . $title,
            self::Login => 'تم تسجيل الدخول من طرف ' . $title,
        };
    }
}