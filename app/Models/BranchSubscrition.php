<?php

namespace App\Models;

use App\Enums\PlatformsSubscriptionType;
use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchSubscrition extends Model
{
    use HasFactory, ModelBasicAttributeValue;

    protected $fillable = [
        'subscription_type',
        'type',
        'status',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'subscription_type' => PlatformsSubscriptionType::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class);
    }
}