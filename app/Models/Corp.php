<?php

namespace App\Models;

use App\Enums\HasBranches;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Corp extends Model
{
    use HasFactory, ModelBasicAttributeValue, ThumbnailModelAttribute, Searchable;

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'administrator_name',
        'phone',
        'email',
        'commercial_registration_number',
        'start_date',
        'end_date',
        'has_branches',
        'send_reminder',
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

    public function getCorpHasBranchesAttribute() {
        return $this->has_branches === HasBranches::Yes;
    }

    public function branches() : HasMany {
        return $this->hasMany(CorpBranch::class);
    }

    public function branch() : HasOne {
        return $this->hasOne(CorpBranch::class);
    }

    public function reports() : HasMany {
        return $this->hasMany(CorpReport::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'administrator_name' => $this->administrator_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'commercial_registration_number' => $this->commercial_registration_number,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}