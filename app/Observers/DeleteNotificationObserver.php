<?php

namespace App\Observers;
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
                DB::table('notifications')
                    ->whereJsonContains(
                        column: "data->id",
                        value: $model->id
                    )
                    ->whereJsonContains(
                        column: "data->{$column}",
                        value: now()->parse($model->getOriginal($column))->format('Y-m-d')
                    )
                    ->whereJsonContains(
                        column: 'data->model',
                        value: $this->modelName ?? $model::class
                    )?->delete();
            }
        }
    }

    public function delete(Model|Pivot $model) {
        DB::table('notifications')
            ->whereJsonContains(
                column: "data->id",
                value: $model->id
            )
            ->whereJsonContains(
                column: 'data->model',
                value: $this->modelName ?? $model::class
            )
            ?->delete();
    }
}
