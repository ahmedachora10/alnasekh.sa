<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CorpBranch extends Model
{
    use HasFactory;

    protected $fillable = ['corp_id', 'name', 'registration_number', 'address'];

    public function corp() : BelongsTo {
        return $this->belongsTo(Corp::class);
    }

    public function record(): HasOne {
        return $this->hasOne(BranchRecord::class);
    }

    public function certificate(): HasOne {
        return $this->hasOne(BranchCertificate::class);
    }

    public function subscriptions(): HasMany {
        return $this->hasMany(BranchSubscrition::class);
    }

    public function monthlyQuarterlyUpdates(): BelongsToMany {
        return $this->belongsToMany(MonthlyQuarterlyUpdate::class)
        ->as('updates')->withPivot(['date'])->withTimestamps();
    }

    // public function employees(): HasMany {
    //     return $this->hasMany(CorpEmployee::class);
    // }

    // public function updates() : HasMany {
    //     return $this->hasMany(CorpMonthlyUpdate::class, 'corp_branch_id');
    // }
}
