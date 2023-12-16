<?php

namespace App\Models;

use App\Enums\Nationalities;
use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BranchEmployee extends Model
{
    use HasFactory, ModelBasicAttributeValue;

    protected $fillable = [
        'corp_id',
        'corp_branch_id',
        'name',
        'nationality',
        'resident_number',
        'start_date',
        'end_date',
        'business_card_start_date',
        'business_card_end_date',
        'contract_start_date',
        'contract_end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'business_card_start_date' => 'datetime',
        'business_card_end_date' => 'datetime',
        'contract_start_date' => 'datetime',
        'contract_end_date' => 'datetime',
        'nationality' => Nationalities::class
    ];

    public function branch():BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }

    public function medicalInsurance(): HasOne {
        return $this->hasOne(EmployeeMedicalInsurance::class);
    }

    public function healthCardPaper(): HasOne {
        return $this->hasOne(EmployeeHealthCardPaper::class);
    }

    // public function branches() : HasMany {
    //     return $this->hasMany(CorpBranch::class);
    // }
}