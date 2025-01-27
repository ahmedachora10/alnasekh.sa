<?php

namespace Modules\Tasks\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Tasks\App\Enums\TaskPriority;
use Modules\Tasks\App\Enums\TaskStatus;
use Modules\Tasks\App\Enums\UserTaskStatus;
use Modules\Tasks\App\Observers\TaskObserver;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'created_by',
        'name',
        'description',
        'assigned_to',
        'assigned_at',
        'start_date',
        'end_date',
        'priority',
        'completed',
        'status',
        'from_corp'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'completed' => 'datetime',
        'priority' => TaskPriority::class,
        'status' => TaskStatus::class,
        'from_corp' => 'boolean'
    ];

    public function done(): Attribute {
        return Attribute::make(
            get: fn() => $this->status === TaskStatus::Done
        );
    }

    public function attachments(): Attribute {
        return Attribute::make(
            get: fn() => $this->getMedia('tasks')
                    ->map(
                    fn($media) => ['id' => $media->id ,'name' => $media->file_name, 'url' => $media?->getUrl()]
                    )
        );
    }

    public function userTaskStatus(): HasMany {
        return $this->hasMany(UserTask::class);
    }
    public function userTaskCompleted(): HasOne {
        return $this->hasOne(UserTask::class)->where('status', UserTaskStatus::Accepted->value);
    }
    public function employee() : BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function scopePending(Builder $builder) {
        $builder->where('status', TaskStatus::Pending->value);
    }
    public function scopeInReview(Builder $builder) {
        $builder->where('status', TaskStatus::InReview->value);
    }
    public function scopeDone(Builder $builder) {
        $builder->where('status', TaskStatus::Done->value);
    }
    public function getDoneAttribute(): bool {
        return $this->completed !== null;
    }
}