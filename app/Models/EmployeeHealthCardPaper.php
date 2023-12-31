<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\SetStatusAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeHealthCardPaper extends Model
{
    use HasFactory, ModelBasicAttributeValue, SetStatusAttribute;

    protected $fillable = [
        'branch_employee_id',
        'certificate_number',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => Status::class
    ];

    public function employee() : BelongsTo {
        return $this->belongsTo(BranchEmployee::class, 'branch_employee_id');
    }
}