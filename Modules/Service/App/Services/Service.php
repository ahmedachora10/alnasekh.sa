<?php

namespace Modules\Service\App\Services;

use App\Contracts\Actions\AllAction;
use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTOInterface;
use App\Services\UploadFileService;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\App\DTOs\ServiceActionDTO;
use Modules\Service\App\Models\Service as ModelsService;

class Service implements UpdateAction, StoreAction, DeleteAction, PaginateAction, AllAction, FindAction {
    public function __construct(protected ModelsService $model, protected UploadFileService $uploadFileService) {}
    /**
     * @param ServiceActionDTO $dto
     * @return ModelsService
     */
    public function store(DTOInterface $dto): ModelsService
    {

        return $this->model->create(
            $dto->toArray()
            + ['image' => $this->uploadFileService->store($dto->image, 'images/services')]
        );
    }

    /**
     * @param ServiceActionDTO $dto
     * @return ModelsService
     */
    public function update(Model $model, DTOInterface $dto): ModelsService
    {
        $data = $dto->toArray();
        if ($dto->image)
            $data['image'] = $this->uploadFileService->update($dto->image, $model->image, 'images/services');

        $model->update($data);
        return $model;
    }

    public function paginate(int $count = 12): Paginator
    {
        return $this->model->paginate(setting('pagination') ?? $count);
    }

    public function all(array $columns = ['*']): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all($columns);
    }

    public function find(int $id): ModelsService|null
    {
        return $this->model->find($id);
    }

    public function delete(int $id): bool
    {
        $model = $this->find($id);

        if(!$model) return false;

        $this->uploadFileService->delete($model->image);

        return $model->delete();
    }
}
