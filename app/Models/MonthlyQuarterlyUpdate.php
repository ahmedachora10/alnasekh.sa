<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MonthlyQuarterlyUpdate extends Model
{
    use HasFactory;

    protected $fillable = ['entity_name', 'mission'];

    public function branches(): BelongsToMany {
        return $this->belongsToMany(CorpBranch::class, 'branch_monthly_quarterly', 'corp_branch_id', 'monthly_quarterly_update_id')
        ->as('updates')->withPivot(['date'])->withTimestamps();
    }
}