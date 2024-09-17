<?php

namespace App\Traits;

use App\Enums\ActivityLogType;
use Spatie\Activitylog\LogOptions;

trait LogActivityOptions {
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            // ->logAll()
            ->setDescriptionForEvent(
                callback: fn(string $eventName): string|null => ActivityLogType::tryFrom(strtolower($eventName)
            )?->content(model: $this));
    }
}