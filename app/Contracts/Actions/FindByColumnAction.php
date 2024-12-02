<?php

namespace App\Contracts\Actions;

use Illuminate\Database\Eloquent\Model;

interface FindByColumnAction {
    public function findByColumn(string $column, mixed $value): Model|null;
}