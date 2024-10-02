<?php


namespace Modules\Tasks\App\Services;

use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\FindAction;
use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\DTOInterface;
use Modules\Tasks\App\DTO\TaskActionDTO;
use Modules\Tasks\App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;

class TaskService implements StoreAction, UpdateAction, DeleteAction, PaginateAction, FindAction {

    public function __construct(protected Task $model) {}
    /**
     * @param TaskActionDTO $dto
     * @return Task
     */
    public function store(DTOInterface $dto): Task
    {
        return $this->model->create($dto->toArray());
    }

    /**
     * @param TaskActionDTO $dto
     * @return Task
     */
    public function update(Model $model, DTOInterface $dto): Task
    {
        $model->update($dto->toArray());
        return $model;
    }

    public function paginate(int $count = 12): Paginator
    {
        return $this->model->with(['employee'])->when(
            value: !auth()->user()->hasRole('admin'),
            callback: fn($query) => $query->where('assigned_to', auth()->id())
        )->paginate($count);
    }

    public function find(int $id): Task|null
    {
        return $this->model->find($id);
    }

    public function delete(int $id): bool
    {
        return $this->find($id)?->delete() ?? false;
    }

}