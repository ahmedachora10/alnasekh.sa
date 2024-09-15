<?php

namespace App\Models;

use App\Enums\ActivityLogType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'activity_type', 'content', 'logable_id', 'logable_type', 'corp_id'];

    protected $casts = [
        'activity_type' => ActivityLogType::class
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    public function logable() : MorphTo
    {
        return $this->morphTo();
    }
}
