<?php

namespace Modules\Wallet\App\Services;

use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTOInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Wallet\App\DTO\PointsWalletActionDTO;
use Modules\Wallet\App\Models\PointWallet;

final class PointsWalletService implements FindAction, StoreAction, UpdateAction {
    public function __construct(private PointWallet $model) {}

    /**
     * @param PointsWalletActionDTO $dto
     * @return PointWallet
     */
    public function update(Model $model, DTOInterface $dto): PointWallet
    {
        $model->update($dto->toArray());

        return $model;
    }
    /**
     * @param PointsWalletActionDTO $dto
     * @return PointWallet
     */
    public function store(DTOInterface $dto): PointWallet
    {
        return $this->forUser($dto->userId) ?? $this->model->create($dto->toArray());
    }

    public function find(int $id): PointWallet|null
    {
        return $this->model->find($id);
    }

    /**
     * @param PointsWalletActionDTO $dto
     * @return int
     */
    public function increment(DTOInterface $dto): int|null {
        return $this->model->forUser($dto->userId)->first()?->increment('points', $this->convertBalanceToPoints($dto->points));
    }
    /**
     * @param PointsWalletActionDTO $dto
     * @return int
     */
    public function decrement(DTOInterface $dto): int|null {
        return $this->model->forUser($dto->userId)->first()?->decrement('points', $dto->points);
    }

    public function convertBalanceToPoints(?float $balance) : float {
        return ($balance ?? 0) / (setting('points_conversion_rate') ??  0);
    }
    public function pointsToBalanceRate(?float $points) : float {
        return ($points ?? 0) * (setting('balance_conversion_rate') ??  0);
    }
    public function forUser(int $userId): PointWallet|null {
        return $this->model->forUser($userId)->first();
    }
}