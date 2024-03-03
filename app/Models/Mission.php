<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = ['entity_id', 'content'];

    public function ministry() : BelongsTo {
        return $this->belongsTo(Entity::class, 'entity_id');
    }
}
