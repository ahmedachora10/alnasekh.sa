<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['title', 'title_en', 'delay', 'image', 'image_en', 'sort'];

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

    public function getGetThumbnailAttribute() {
        $imageArExists = $this->image != null && Storage::disk('public')->exists($this->image);
        $imageEnExists = $this->image_en != null && Storage::disk('public')->exists($this->image_en);

        $imageAr = $imageArExists ? $this->thumbnail : 'storage/'.$this->image_en;
        $imageEn = $imageEnExists ? 'storage/'.$this->image_en : $this->thumbnail;

        return app()->getLocale() === 'en' ? $imageEn : $imageAr;
    }
}
