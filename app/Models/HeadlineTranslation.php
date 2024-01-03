<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadlineTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'title_en',
        'subtitle',
        'subtitle_en',
        'description',
        'description_en',
    ];

    protected $append = [];

    public function getGetTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title;
    }

    public function getGetSubtitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->subtitle_en : $this->subtitle;
    }

    public function getGetDescriptionAttribute()
    {
        return app()->getLocale() == 'en' ? $this->description_en : $this->description;
    }
}