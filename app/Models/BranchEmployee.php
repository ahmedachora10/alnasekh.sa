<?php

namespace App\Models;

use App\Enums\Nationalities;
use App\Traits\DeleteNotification;
use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class BranchEmployee extends Model
{
    use HasFactory, ModelBasicAttributeValue, Searchable, DeleteNotification;

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

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

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

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'nationality' => $this->nationality,
            'resident_number' => $this->resident_number,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'business_card_start_date' => $this->business_card_start_date,
            'business_card_end_date' => $this->business_card_end_date,
            'contract_start_date' => $this->contract_start_date,
            'contract_end_date' => $this->contract_end_date,
        ];
    }

    public function delete()
    {
        return DB::transaction(function () {
            $employeeId = $this->id;
            EmployeeHealthCardPaper::firstWhere('branch_employee_id', $employeeId)?->delete();
            EmployeeMedicalInsurance::firstWhere('branch_employee_id', $employeeId)?->delete();

        return parent::delete();
        });
    }
}