<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['title', 'title_en', 'delay', 'image', 'sort'];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Slider $model) {
            $model->update(['sort' => $model->id]);
        });
    }

    public function getGetTitleAttribute() {
        return app()->getLocale() === 'en' ? $this->title_en : $this->title;
    }
}
