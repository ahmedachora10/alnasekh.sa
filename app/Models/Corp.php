<?php

namespace App\Models;

use App\Enums\HasBranches;
use App\Traits\ModelBasicAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Corp extends Model
{
    use HasFactory, ModelBasicAttributeValue;

    protected $fillable = [
        'user_id',
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Corp $model) {
            $model->user_id = auth()->id();
        });
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function getDoesntHasBranchesAttribute() {
        return $this->has_branches === HasBranches::No;
    }

    public function branches() : HasMany | HasOne {
        if($this->has_branches == HasBranches::Yes) {
            return $this->hasMany(CorpBranch::class);
        }

        return $this->hasOne(CorpBranch::class);
    }

}