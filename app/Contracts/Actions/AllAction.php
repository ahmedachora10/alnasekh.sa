<?php

namespace App\Contracts\Actions;

use Illuminate\Database\Eloquent\Collection;

interface AllAction {
    public function all(array $columns = ['*']): Collection;
}