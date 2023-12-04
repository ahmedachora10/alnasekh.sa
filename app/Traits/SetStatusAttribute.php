<?php

namespace App\Traits;

use App\Enums\Status;
use Carbon\Carbon;

trait SetStatusAttribute {
    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->status = status_handler($model->end_date);
        });

        static::updating(function ($model) {
            $model->status = status_handler($model->end_date);
        });
    }
}
