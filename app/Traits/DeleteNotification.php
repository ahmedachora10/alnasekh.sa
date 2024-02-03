<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait DeleteNotification {
    public static function deleteNotification() {
        static::deleted(fn(Model $model) => DB::table('notifications')
        ->whereJsonContains("data->id", $model->id)
        ->whereJsonContains('data->model', self::class)?->delete());
    }
}