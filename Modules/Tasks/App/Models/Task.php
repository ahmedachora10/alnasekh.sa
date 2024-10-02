<?php

namespace Modules\Tasks\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Tasks\App\Enums\TaskStatus;
use Modules\Tasks\Database\factories\TaskFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'assigned_to',
        'assigned_at',
        'due_date',
        'status'
    ];

    protected $casts = [
        'due_date' => 'date',
        'status' => TaskStatus::class
    ];

    public function employee() : BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
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
}