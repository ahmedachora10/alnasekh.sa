<?php

namespace Modules\User\App\Services;

use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTOInterface;
use App\Models\User;
use App\Services\UploadFileService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\App\DTO\ClientActionDTO;
use Modules\User\App\DTO\UserActionDTO;
use Modules\User\App\Models\Client;
use Modules\Wallet\App\DTO\WalletActionDTO;
use Modules\Wallet\App\Models\PointWallet;
use Modules\Wallet\App\Models\Wallet;
use Modules\Wallet\App\Services\PointsWalletService;
use Modules\Wallet\App\Services\WalletService;

final class ClientService implements FindAction, StoreAction, UpdateAction, DeleteAction, PaginateAction {

    const STORAGE_FOLDER = 'images/users';
    public function __construct(
        private Client $model,
        private WalletService $walletService,
        private PointsWalletService $pointsWalletService,
        protected UploadFileService $fileService,
        public string $search = ''
    ) {}

    /**
     * @param ClientActionDTO $dto
     * @param Client $model
     * @return Client
     */
    public function update(Model $model, DTOInterface $dto): Client
    {
        $model->update($dto->toArray());

        $this->walletService->store(
            dto: new WalletActionDTO(userId: $model->id)
        );

        return $model;
    }
    /**
     * @param ClientActionDTO $dto
     * @return Client
     */
    public function store(DTOInterface $dto): Client
    {
        return DB::transaction(function () use ($dto) {
            $client = $this->model->create($dto->toArray());

            $this->walletService->store(
                dto: new WalletActionDTO(userId: $client->id)
            );

            return $client;
        });
    }

    public function find(int $id): Client|null
    {
        return $this->model->find($id);
    }
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $model =  $this->find($id);

            if(!$model) return false;

            $this->wallet($id)?->delete();
            $this->piontsWallet($id)?->delete();

            return $model->delete();
        });
    }

    public function paginate(int $count = 10): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->model
        ->search($this->search)
        ->paginate($count);
    }
    public function wallet(int $userId): Wallet|null {
        return $this->walletService->forClient($userId);
    }
    public function piontsWallet(int $userId): PointWallet|null {
        return $this->pointsWalletService->forClient($userId);
    }
}