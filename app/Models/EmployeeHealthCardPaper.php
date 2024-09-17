<?php

namespace App\Models;

use App\Enums\Status;
use App\Models\Interfaces\ObservationColumnsInterface;
use App\Traits\DeleteNotification;
use App\Traits\LogActivityTabForCorp;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\SetStatusAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;

class EmployeeHealthCardPaper extends Model implements ObservationColumnsInterface
{
    use HasFactory, ModelBasicAttributeValue, SetStatusAttribute, DeleteNotification;
    use LogsActivity, LogActivityTabForCorp;

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

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

    public function employee() : BelongsTo {
        return $this->belongsTo(BranchEmployee::class, 'branch_employee_id');
    }

    public function observationColumns(): array
    {
        return [
            'end_date',
        ];
    }
}