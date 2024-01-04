<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobRequest extends Model
{
    use HasFactory;

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
}