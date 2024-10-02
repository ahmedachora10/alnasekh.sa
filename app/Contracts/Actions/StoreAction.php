<?php

namespace App\Contracts\Actions;

use App\Contracts\DTOInterface;
use Illuminate\Database\Eloquent\Model;

interface StoreAction {
    public function store(DTOInterface $dto) : Model;
}