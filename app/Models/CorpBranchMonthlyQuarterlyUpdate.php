<?php

namespace App\Models;

use App\Traits\DeleteNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CorpBranchMonthlyQuarterlyUpdate extends Pivot
{
    use HasFactory, DeleteNotification;

    protected $table = 'branch_monthly_quarterly';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

    public $timestamps = true;

    // public $incrementing = true;

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }

    public function monthlyQuarterlyUpdate() : BelongsTo {
        return $this->belongsTo(MonthlyQuarterlyUpdate::class, 'monthly_quarterly_update_id');
    }
}