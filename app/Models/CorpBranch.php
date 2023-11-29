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
        return $this->belongsToMany(MonthlyQuarterlyUpdate::class, 'branch_monthly_quarterly', 'corp_branch_id', 'monthly_quarterly_update_id')
        ->as('updates')->withPivot(['date'])->withTimestamps();
    }

    public function registries(): BelongsToMany {
        return $this->belongsToMany(Registry::class, 'corp_branch_registry', 'corp_branch_id', 'registry_id',)->as('registry')->withPivot([
            'commercial_registration_number', 'start_date', 'end_date'
        ])->withTimestamps();
    }

    public function employees(): HasMany {
        return $this->hasMany(BranchEmployee::class);
    }

    // public function updates() : HasMany {
    //     return $this->hasMany(CorpMonthlyUpdate::class, 'corp_branch_id');
    // }
}