<?php

namespace App\Models;

use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Registry extends Model
{
    use HasFactory, ModelBasicAttributeValue;

    protected $fillable = ['name'];

    public function branches(): BelongsToMany {
        return $this->belongsToMany(CorpBranch::class, 'corp_branch_registry', 'registry_id', 'corp_branch_id')->as('registry')->withPivot([
            'commercial_registration_number', 'start_date', 'end_date'
        ])->withTimestamps();
    }
}