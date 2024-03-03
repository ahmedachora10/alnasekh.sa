<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CorpReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'corp_id',
        'ministry',
        'entity',
        'mission',
    ];

    public function corp() : BelongsTo {
        return $this->belongsTo(Corp::class, 'corp_id');
    }

    public function ministryModel() : BelongsTo {
        return $this->belongsTo(Ministry::class, 'ministry');
    }

    public function entityModel() : BelongsTo {
        return $this->belongsTo(Entity::class, 'entity');
    }

    public function missionModel() : BelongsTo {
        return $this->belongsTo(Mission::class, 'mission');
    }
}