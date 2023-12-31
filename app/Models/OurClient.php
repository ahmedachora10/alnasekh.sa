<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    use HasFactory, ThumbnailModelAttribute;

    protected $fillable = ['company_name', 'company_name_en', 'image', 'link'];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'en' ? $this->company_name_en : $this->company_name;
    }

}