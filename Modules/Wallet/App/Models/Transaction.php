<?php

namespace Modules\Wallet\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\App\Models\Client;
use Modules\Wallet\App\Enums\TransactionStatus;
use Modules\Wallet\App\Enums\TransactionType;
use Modules\Wallet\Database\factories\TransactionFactory;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['client_id', 'type', 'amount', 'points', 'status'];

    protected $casts = [
        'type' => TransactionType::class,
        'status' => TransactionStatus::class
    ];

    public function client() : BelongsTo {
        return $this->belongsTo(Client::class);
    }

    public function getPriceAttribute() {
        return $this->points > 0 ? $this->points : $this->amount;
    }

    // protected static function newFactory(): TransactionFactory
    // {
    //     //return TransactionFactory::new();
    // }
}