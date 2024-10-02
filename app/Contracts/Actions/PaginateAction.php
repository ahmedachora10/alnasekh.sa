<?php

namespace App\Contracts\Actions;

use Illuminate\Contracts\Pagination\Paginator;

interface PaginateAction {
    public function paginate(int $count = 10): Paginator;
}