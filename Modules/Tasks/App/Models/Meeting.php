<?php

namespace Modules\Tasks\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Tasks\Database\factories\MeetingFactory;

class Meeting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'created_by',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function invited(): BelongsToMany {
        return $this->belongsToMany(User::class, 'meeting_user', 'meeting_id', 'user_id');
    }
}
