<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CorpBranchMonthlyQuarterlyUpdate extends Pivot
{
    // use HasFactory;

    protected $table = 'branch_monthly_quarterly';
}