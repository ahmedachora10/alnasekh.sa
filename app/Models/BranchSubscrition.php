<?php

namespace App\Models;

use App\Enums\PlatformsSubscriptionType;
use App\Enums\Status;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\SetStatusAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchSubscrition extends Model
{
    use HasFactory, ModelBasicAttributeValue, SetStatusAttribute;

    protected $fillable = [
        'corp_branch_id',
        'subscription_type',
        'type',
        'status',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'subscription_type' => PlatformsSubscriptionType::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => Status::class
    ];

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }
}