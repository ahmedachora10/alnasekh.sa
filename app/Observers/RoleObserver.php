<?php

namespace App\Observers;

use App\Models\Role;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class RoleObserver
{
    public function updated(Role $role) {
        // Cache::forget('user-permissions');
        Artisan::call('optimize:clear');
    }

    public function deleted(Role $role) {
        // Cache::forget('user-permissions');
        Artisan::call('optimize:clear');
    }
}