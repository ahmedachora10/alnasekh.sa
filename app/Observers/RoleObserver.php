<?php

namespace App\Observers;

use App\Models\Role;
use Illuminate\Support\Facades\Cache;

class RoleObserver
{
    public function updated(Role $role) {
        Cache::forget('user-permissions');
    }

    public function deleted(Role $role) {
        Cache::forget('user-permissions');
    }
}
