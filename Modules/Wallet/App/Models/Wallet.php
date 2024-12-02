<?php

namespace Modules\Wallet\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Wallet\Database\factories\WalletFactory;

class Wallet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'balance'];

    public function scopeForUser(Builder $builder, int $userId) {
        $builder->where('user_id', $userId);
    }

    public function client(): HasOne {
        return $this->hasOne(User::class);
    }

    // protected static function newFactory(): WalletFactory
    // {
    //     //return WalletFactory::new();
    // }
}