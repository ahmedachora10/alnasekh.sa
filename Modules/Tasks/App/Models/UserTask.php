<?php

namespace Modules\Tasks\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Tasks\App\Enums\UserTaskStatus;
use Modules\Tasks\Database\factories\UserTaskFactory;

class UserTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'comment',
        'status',
        'from',
    ];

    public $casts = [
        'status' => UserTaskStatus::class
    ];

    public function scopeFromEmployee(Builder $builder) {
        $builder->where('from', 'employee');
    }

    public function accepted() : Attribute {
        return Attribute::make(
            get: fn() => $this->status === UserTaskStatus::Accepted
        );
    }

    public function pending() : Attribute {
        return Attribute::make(
            get: fn() => $this->status === UserTaskStatus::Pending
        );
    }
    public function rejected() : Attribute {
        return Attribute::make(
            get: fn() => $this->status === UserTaskStatus::Rejected
        );
    }
    public function employee(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function task(): BelongsTo {
        return $this->belongsTo(Task::class, 'task_id');
    }
}