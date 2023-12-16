<?php

namespace App\Models;

use App\Enums\HasBranches;
use App\Traits\ModelBasicAttributeValue;
use App\Traits\ThumbnailModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Corp extends Model
{
    use HasFactory, ModelBasicAttributeValue, ThumbnailModelAttribute;

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

    public function reports() : HasMany {
        return $this->hasMany(CorpReport::class);
    }

    // public function getThumbnailAttribute() {
    //     return $this->image != null && Storage::disk('public')->exists($this->image) ? 'storage/'.$this->image : 'https://th.bing.com/th/id/OIP.g1K70P37u_RLgGQe4Ii5RQHaHa?w=192&h=192&c=7&r=0&o=5&dpr=1.3&pid=1.7';
    // }

}