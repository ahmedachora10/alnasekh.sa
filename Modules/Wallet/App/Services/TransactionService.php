<?php

namespace Modules\Wallet\App\Services;

use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTOInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\Wallet\App\DTO\PointsWalletActionDTO;
use Modules\Wallet\App\DTO\TransactionActionDTO;
use Modules\Wallet\App\Models\PointWallet;
use Modules\Wallet\App\Models\Transaction;

final class TransactionService implements FindAction, StoreAction, UpdateAction {
    public function __construct(private Transaction $model) {}

    /**
     * @param TransactionActionDTO $dto
     * @return PointWallet
     */
    public function update(Model $model, DTOInterface $dto): Transaction
    {
        $model->update($dto->toArray());

        return $model;
    }
    /**
     * @param PointsWalletActionDTO $dto
     * @return Transaction
     */
    public function store(DTOInterface $dto): Transaction
    {
        return $this->model->create($dto->toArray());
    }

    public function find(int $id): Transaction|null
    {
        return $this->model->find($id);
    }
}