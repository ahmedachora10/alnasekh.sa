<?php

namespace Modules\Wallet\App\Services;

use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\FindByColumnAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTOInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Wallet\App\DTO\PointsWalletActionDTO;
use Modules\Wallet\App\DTO\TransactionActionDTO;
use Modules\Wallet\App\DTO\WalletActionDTO;
use Modules\Wallet\App\Enums\TransactionStatus;
use Modules\Wallet\App\Enums\TransactionType;
use Modules\Wallet\App\Models\Wallet;

final class WalletService implements FindAction, StoreAction, UpdateAction {
    public function __construct(
        private Wallet $model,
        protected PointsWalletService $pointsWalletService,
        protected TransactionService $transactionService,
    ) {}

    /**
     * @param WalletActionDTO $dto
     * @return Wallet
     */
    public function update(Model $model, DTOInterface $dto): Wallet
    {
        $model->update($dto->toArray());

        return $model;
    }
    /**
     * @param WalletActionDTO $dto
     * @return Wallet
     */
    public function store(DTOInterface $dto): Wallet
    {
        return DB::transaction(function () use($dto) {
            $model = $this->model->forUser($dto->userId)->first() ?? $this->model->create($dto->toArray());

            $this->pointsWalletService->store(
                new PointsWalletActionDTO(
                    userId: $model->user_id,
                    points: $this->pointsWalletService->convertBalanceToPoints($model->banance)
                )
            );

            // $this->transactionService->store(
            //     dto: new TransactionActionDTO(
            //         userId: $dto->userId,
            //         type: TransactionType::Deposit,
            //         amount: $dto->balance,
            //         points: $this->pointsWalletService->convertBalanceToPoints($dto->balance),
            //         status: TransactionStatus::Completed
            //     )
            // );

            return $model;
        });
    }

    public function find(int $id): Wallet|null
    {
        return $this->model->find($id);
    }

    /**
     * @param WalletActionDTO $dto
     * @return int|null
     */
    public function increment(DTOInterface $dto): int|null {
        return DB::transaction(function () use($dto) {
            $model = $this->model->forUser($dto->userId)->first();

            if(!$model) return null;

            $model->increment('balance', $dto->balance);

            $this->transactionService->store(
                dto: new TransactionActionDTO(
                    userId: $dto->userId,
                    type: TransactionType::Deposit,
                    amount: $dto->balance,
                    points: $this->pointsWalletService->convertBalanceToPoints($dto->balance),
                    status: TransactionStatus::Completed
                )
            );

            return $this->pointsWalletService->increment(new PointsWalletActionDTO($dto->userId, $dto->balance));
        });

    }
    /**
     * @param WalletActionDTO $dto
     * @return int|null
     */
    public function decrement(DTOInterface $dto): int|null {
        return DB::transaction(function () use($dto) {
                $this->transactionService->store(
                    dto: new TransactionActionDTO(
                        userId: $dto->userId,
                        type: TransactionType::Withdraw,
                        amount: $dto->balance,
                        status: TransactionStatus::Completed
                    )
                );
            return $this->model->forUser($dto->userId)->first()?->decrement('balance', $dto->balance);
        });
    }
    public function forUser(int $userId): Wallet|null {
        return $this->model->forUser($userId)->first();
    }
    public function convertPointsToBalance(PointsWalletActionDTO $dto) {
        return DB::transaction(function () use($dto) {
            $userWallet = $this->forUser($dto->userId);

            if (!$userWallet || $dto->points === 0)
                return false;

            $amount = $this->pointsWalletService->pointsToBalanceRate($dto->points);

            $userWallet->increment('balance', $amount);

            $this->pointsWalletService->decrement($dto);

            $this->transactionService->store(
                    dto: new TransactionActionDTO(
                        userId: $dto->userId,
                        type: TransactionType::ConvertPoints,
                        amount: $amount,
                        points: $dto->points,
                        status: TransactionStatus::Completed
                    )
                );

            return true;
        });

    }
}