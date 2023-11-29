<?php

namespace App\Models;

use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeMedicalInsurance extends Model
{
    use HasFactory, ModelBasicAttributeValue;

    protected $fillable = [
        'branch_employee_id',
        'company',
        'policy',
        'type',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function employee() : BelongsTo {
        return $this->belongsTo(BranchEmployee::class);
    }
}