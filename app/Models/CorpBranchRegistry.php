<?php

namespace App\Models;

use App\Traits\DeleteNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CorpBranchRegistry extends Model
{
    use HasFactory, DeleteNotification;

    protected $table = 'corp_branch_registry';

    // protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::deleteNotification();
    }

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }

    public function registry() : BelongsTo {
        return $this->belongsTo(Registry::class, 'registry_id');
    }
}
