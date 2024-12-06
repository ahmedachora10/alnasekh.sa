<?php

namespace Modules\User\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Modules\User\Database\factories\ClientFactory;

class Client extends Model
{
    use HasFactory, Searchable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'city',
        'phone',
        'registration_at',
        'blocked',
    ];
    protected $casts = [
        'registration_at' => 'date'
    ];

    public function getBlockedTextAttribute() {
        return $this->blocked == true ? 'محظور' : 'فعال';
    }
    public function getCanUseWalletAttribute() {
        return $this->blocked == false && !Carbon::parse($this->registration_at)->addYear()->isPast();
    }


    // protected static function newFactory(): ClientFactory
    // {
    //     //return ClientFactory::new();
    // }



    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}