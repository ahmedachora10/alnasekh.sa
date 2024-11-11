<?php

namespace Modules\Service\App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Modules\Service\Database\factories\ServiceRequestFactory;

class ServiceRequest extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'service_id',
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

    public function service() : BelongsTo {
        return $this->belongsTo(Service::class, 'service_id');
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

    // protected static function newFactory(): ServiceRequestFactory
    // {
    //     //return ServiceRequestFactory::new();
    // }
}