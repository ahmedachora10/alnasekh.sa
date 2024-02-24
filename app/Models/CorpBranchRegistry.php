<?php

namespace App\Models;

use App\Models\Interfaces\ObservationColumnsInterface;
use App\Observers\DeleteNotificationObserver;
use App\Traits\DeleteNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class CorpBranchRegistry extends Pivot implements ObservationColumnsInterface
{
    use HasFactory;

    protected $table = 'corp_branch_registry';

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }

    public function registry() : BelongsTo {
        return $this->belongsTo(Registry::class, 'registry_id');
    }

    public function delete()
    {
        DB::table('notifications')
        ->whereJsonContains("data->id", $this->id)
        ->whereJsonContains('data->model', registry::class)?->delete();

        return parent::delete();
    }

    public function fireUpdatedEvent($date) {
        if($this instanceof ObservationColumnsInterface && $this->end_date !== $date) {
            DB::table('notifications')
            ->whereJsonContains("data->id", $this->id)
            ->whereJsonContains("data->end_date", now()->parse($date)->format('Y-m-d'))
            ->whereJsonContains('data->model', Registry::class)?->delete();
        }
    }

    public function observationColumns(): array
    {
        return [
            'end_date'
        ];
    }
}