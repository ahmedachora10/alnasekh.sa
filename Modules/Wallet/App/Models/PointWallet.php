<?php

namespace Modules\Wallet\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\User\App\Models\Client;
use Modules\Wallet\Database\factories\PointWalletFactory;

class PointWallet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['client_id', 'points'];

    public function scopeForClient(Builder $builder, int $userId) {
        $builder->where('client_id', $userId);
    }

    public function client() : HasOne
    {
        return $this->hasOne(Client::class);
    }

    // protected static function newFactory(): PointWalletFactory
    // {
    //     //return PointWalletFactory::new();
    // }
}