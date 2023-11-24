<?php

namespace App\Models;

use App\Enums\HasBranches;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'administrator_name',
        'phone',
        'email',
        'commercial_registration_number',
        'start_date',
        'end_date',
        'has_branches',
    ];

    protected $casts = [
        'has_branches' => HasBranches::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}
