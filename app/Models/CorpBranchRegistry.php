<?php

namespace App\Models;

use App\Models\Interfaces\ObservationColumnsInterface;
use App\Traits\LogActivityTabForCorp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;

class CorpBranchRegistry extends Pivot implements ObservationColumnsInterface
{
    use HasFactory;
    use LogsActivity, LogActivityTabForCorp;

    protected $table = 'corp_branch_registry';
    protected $fillable = [
        'corp_branch_id',
        'registry_id',
        'commercial_registration_number',
        'registry_number',
        'registry_number',
        'start_date',
        'end_date',
    ];
    protected $primaryKey = 'id';
    public $incrementing = true;

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
