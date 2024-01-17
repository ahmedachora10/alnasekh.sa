<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class SubscribePackageRequest extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'package_id',
        'company_name',
        'administrator_name',
        'commercial_registration_number',
        'company_activity',
        'phone',
        'email',
        'company_size',
        'number_of_resident_employees',
        'number_of_suadi_employees',
        'total_employees',
        'company_headquarters',
        'company_type',
        'company_city',
        'number_of_branches',
    ];

    public function package() : BelongsTo {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function toSearchableArray()
    {
        return [
            'company_name' => $this->company_name,
            'administrator_name' => $this->administrator_name,
            'commercial_registration_number' => $this->commercial_registration_number,
            'company_activity' => $this->company_activity,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}