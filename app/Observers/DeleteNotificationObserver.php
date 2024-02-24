<?php

namespace App\Observers;

use App\Enums\Status;
use App\Models\Interfaces\ObservationColumnsInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class DeleteNotificationObserver
{
    public function __construct(protected ?string $modelName = null) {}

    public function updated(Model|Pivot $model) {
        if($model instanceof ObservationColumnsInterface && $model->isDirty($model->observationColumns())) {
            $updatedColumns = array_keys($model->getDirty());
            unset($updatedColumns[count($updatedColumns) - 1]);

            foreach($updatedColumns as $column) {
                // if(in_array(status_handler($model->getOriginal($column)),[Status::ALMOST_FINISHED, Status::FINISHED])) {
                DB::table('notifications')
                ->whereJsonContains("data->id", $model->id)
                ->whereJsonContains("data->{$column}", now()->parse($model->getOriginal($column))->format('Y-m-d'))
                ->whereJsonContains('data->model', $this->modelName ?? $model::class)?->delete();
                // }
            }
        }
    }
}