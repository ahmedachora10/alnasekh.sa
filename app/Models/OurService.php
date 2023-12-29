<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['title', 'image', 'description', 'sort'];

    protected static function boot()
    {
        parent::boot();

        static::created(function (OurService $model) {
            $model->update(['sort' => $model->id]);
        });
    }
}