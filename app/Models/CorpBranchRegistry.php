<?php

namespace App\Models;

use App\Traits\DeleteNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class CorpBranchRegistry extends Model
{
    use HasFactory;

    protected $table = 'corp_branch_registry';

    public function branch() : BelongsTo {
        return $this->belongsTo(CorpBranch::class, 'corp_branch_id');
    }

    public function registry() : BelongsTo {
        return $this->belongsTo(Registry::class, 'registry_id');
    }

    public function delete()
    {
        DB::table('notifications')
        ->whereJsonContains("data->id", $this->id)
        ->whereJsonContains('data->model', registry::class)?->delete();

        return parent::delete();
    }
}
