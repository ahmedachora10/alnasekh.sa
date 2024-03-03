<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends Model
{
    use HasFactory;

    protected $fillable =  ['ministry_id', 'name'];

    public function ministry() : BelongsTo {
        return $this->belongsTo(Ministry::class, 'ministry_id');
    }

    public function missions() : HasMany {
        return $this->hasMany(Mission::class);
    }
}
