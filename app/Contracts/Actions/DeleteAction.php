<?php

namespace App\Contracts\Actions;

interface DeleteAction {
    public function delete(int $id): bool;
}