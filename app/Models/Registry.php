<?php

namespace App\Models;

use App\Traits\ModelBasicAttributeValue;
use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Registry extends Model
{
    use HasFactory, ModelBasicAttributeValue, ThumbnailModelAttribute, Searchable;

    protected $fillable = ['name', 'image'];

    public function branches(): BelongsToMany {
        return $this->belongsToMany(CorpBranch::class, 'corp_branch_registry', 'registry_id', 'corp_branch_id')->as('registry')->withPivot([
            'registry_number', 'commercial_registration_number', 'start_date', 'end_date'
        ])->withTimestamps();
    }

    public function toSearchableArray()
    {
        return ['name' => $this->name];
    }
}