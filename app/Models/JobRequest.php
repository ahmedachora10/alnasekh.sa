<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class JobRequest extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'specialization',
        'years_of_experience',
        'excerpt',
        'job',
        'job_city',
        'cv',
    ];

    public function attachments() : HasMany {
        return $this->hasMany(JobAttachment::class);
    }

    public function jobPost() : BelongsTo {
        return $this->belongsTo(JobPost::class, 'job');
    }

    public function jobCity() : BelongsTo {
        return $this->belongsTo(JobCity::class, 'job_city');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'email' => $this->email,
            // 'phone' => $this->phone,
            // 'age' => $this->age,
            'specialization' => $this->specialization,
        ];
    }
}