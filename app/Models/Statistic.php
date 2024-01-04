<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['image', 'title', 'title_en', 'statistic'];

    public function getGetTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title;
    }
}