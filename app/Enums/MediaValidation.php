<?php

namespace App\Enums;

use Modules\Tasks\App\Models\Task;

enum MediaValidation:string {
    case Task = Task::class;

    public function rules() : array {
        return match ($this) {
            self::Task => ['required', 'file', 'mimes:jpg,png,webp,jpeg,png,pdf,docx'],
            default => []
        };
    }
    public function destination() : string {
        return match ($this) {
            self::Task => 'docs/tasks',
            default => 'docs'
        };
    }
}
