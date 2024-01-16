<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['title', 'title_en', 'image', 'yearly_price', 'properties', 'properties_en', 'sort'];

    protected $casts = [
        'properties' => 'array',
        'properties_en' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Package $model) {
            $model->update(['sort' => $model->id]);
        });
    }

    public function getGetTitleAttribute() {
        return app()->getLocale() === 'en' ? $this->title_en : $this->title;
    }

    public function getGetPropertiesAttribute() {
        return app()->getLocale() === 'en' ? $this->properties_en : $this->properties;
    }
}