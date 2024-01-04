<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['job_request_id', 'file'];

    public function jobRequest() : BelongsTo {
        return $this->belongsTo(JobRequest::class, 'job_request_id');
    }
}