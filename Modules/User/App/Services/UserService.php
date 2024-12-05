<?php

namespace Modules\User\App\Services;

use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTOInterface;
use App\Models\User;
use App\Services\UploadFileService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\App\DTO\UserActionDTO;
use Modules\Wallet\App\DTO\WalletActionDTO;
use Modules\Wallet\App\Models\PointWallet;
use Modules\Wallet\App\Models\Wallet;
use Modules\Wallet\App\Services\PointsWalletService;
use Modules\Wallet\App\Services\WalletService;

final class UserService implements FindAction, StoreAction, UpdateAction, DeleteAction {

    const STORAGE_FOLDER = 'images/users';
    public function __construct(
        private User $model,
        protected UploadFileService $fileService
    ) {}

    /**
     * @param UserActionDTO $dto
     * @param User $model
     * @return User
     */
    public function update(Model $model, DTOInterface $dto): User
    {
        $data = $dto->toArray();

        if($dto->password)
            $data['password'] = Hash::make($dto->password);

        if($dto->avatar)
            $data['avatar'] = $this->fileService->store($dto->avatar,self::STORAGE_FOLDER);

        $model->update($data);

        $model->syncRoles($dto->roles);

        return $model;
    }
    /**
     * @param UserActionDTO $dto
     * @return User
     */
    public function store(DTOInterface $dto): User
    {
        $data = $dto->toArray();

        $data['password'] = Hash::make($dto->password);

        if($dto->avatar)
            $data['avatar'] = $this->fileService->store($dto->avatar,self::STORAGE_FOLDER);

        $user = $this->model->create($data);

        $user->addRoles($dto->roles);

        return $user;
    }

    public function find(int $id): User|null
    {
        return $this->model->find($id);
    }
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $model =  $this->find($id);

            if(!$model) return false;

            $this->fileService->delete($model->avatar);

            return $model->delete();
        });
    }
}