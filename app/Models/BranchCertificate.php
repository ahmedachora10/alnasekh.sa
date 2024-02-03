<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\DeleteNotification;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\SetStatusAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchCertificate extends Model
{
    use HasFactory, ModelBasicAttributeValue, SetStatusAttribute, DeleteNotification;

    protected $fillable = [
        'corp_branch_id',
        'certificate_number',
        'type',
        'status',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => Status::class
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }
}
