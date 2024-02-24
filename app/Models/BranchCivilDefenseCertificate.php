<?php

namespace App\Models;

use App\Enums\Status;
use App\Models\Interfaces\ObservationColumnsInterface;
use App\Traits\DeleteNotification;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\SetStatusAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchCivilDefenseCertificate extends Model implements ObservationColumnsInterface
{
    use HasFactory, ModelBasicAttributeValue, DeleteNotification;

    protected $fillable = [
        'corp_branch_id',
        'permit',
        'ministry_of_interior_number',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }

    public function observationColumns(): array
    {
        return ['end_date'];
    }
}