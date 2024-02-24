<?php

namespace App\Models;

use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class MonthlyQuarterlyUpdate extends Model
{
    use HasFactory, ThumbnailModelAttribute, Searchable;

    protected $fillable = ['entity_name', 'mission', 'image'];

    public function branches(): BelongsToMany {
        return $this->belongsToMany(CorpBranch::class, 'branch_monthly_quarterly', 'monthly_quarterly_update_id', 'corp_branch_id')
        ->as('updates')->withPivot(['date'])->withTimestamps();
    }

    public function toSearchableArray()
    {
        return [
            'entity_name' => $this->entity_name,
            'mission' => $this->mission
        ];
    }
}