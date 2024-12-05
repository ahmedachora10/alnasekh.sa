<?php

namespace Modules\User\App\Models;

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
    ];

    // protected static function newFactory(): ClientFactory
    // {
    //     //return ClientFactory::new();
    // }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}