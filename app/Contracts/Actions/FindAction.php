<?php

namespace App\Contracts\Actions;

use Illuminate\Database\Eloquent\Model;

interface FindAction {
    public function find(int $id): Model|null;
}