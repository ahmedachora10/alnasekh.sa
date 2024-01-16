<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['title', 'title_en', 'image', 'description', 'description_en', 'sort'];

    protected static function boot()
    {
        parent::boot();

        static::created(function (OurService $model) {
            $model->update(['sort' => $model->id]);
        });
    }

    public function getGetTitleAttribute() {
        return app()->getLocale() === 'en' ? $this->title_en : $this->title;
    }

    public function getGetDescriptionAttribute() {
        return app()->getLocale() === 'en' ? $this->description_en : $this->description;
    }
}