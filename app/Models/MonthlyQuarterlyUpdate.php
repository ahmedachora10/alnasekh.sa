<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MonthlyQuarterlyUpdate extends Model
{
    use HasFactory;

    protected $fillable = ['entity_name', 'mission'];

    public function corps(): BelongsToMany {
        return $this->belongsToMany(CorpBranch::class)
        ->as('updates')->withPivot(['date'])->withTimestamps();
    }
}
