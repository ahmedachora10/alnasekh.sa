<?php

namespace App\Models;

use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchCertificate extends Model
{
    use HasFactory, ModelBasicAttributeValue;

    protected $fillable = [
        'corp_branch_id',
        'certificate_number',
        'type',
        'status',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class);
    }
}