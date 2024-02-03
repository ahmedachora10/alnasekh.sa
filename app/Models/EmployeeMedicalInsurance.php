<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\DeleteNotification;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\SetStatusAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeMedicalInsurance extends Model
{
    use HasFactory, ModelBasicAttributeValue, SetStatusAttribute, DeleteNotification;

    protected $fillable = [
        'branch_employee_id',
        'company',
        'policy',
        'type',
        'start_date',
        'end_date',
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => Status::class
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

    public function employee() : BelongsTo {
        return $this->belongsTo(BranchEmployee::class, 'branch_employee_id');
    }
}
