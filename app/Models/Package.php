<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['title', 'image', 'yearly_price', 'properties', 'sort'];

    protected $casts = [
        'properties' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Package $model) {
            $model->update(['sort' => $model->id]);
        });
    }
}