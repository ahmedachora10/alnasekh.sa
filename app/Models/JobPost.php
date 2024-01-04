<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPost extends Model
{
    use HasFactory;

    public $fillable = ['title', 'title_en'];

    public function getGetTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title;
    }

    public function jobs() : HasMany {
        return $this->hasMany(JobRequest::class);
    }
}