<?php

namespace App\Contracts\Actions;

use App\Contracts\DTOInterface;
use Illuminate\Database\Eloquent\Model;

interface UpdateAction {
    public function update(Model $model, DTOInterface $dto) : Model;
}