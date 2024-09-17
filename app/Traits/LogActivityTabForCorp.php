<?php

namespace App\Traits;

use App\Enums\ActivityLogType;
use Spatie\Activitylog\Models\Activity;

trait LogActivityTabForCorp {
    use LogActivityOptions;
    public function tapActivity(Activity $activity, string $eventName)
    {
        $existingProperties = $activity->properties ?? collect();
        $activity->properties = $existingProperties->merge([
            'custom' => ActivityLogType::getCorpBranchIds($this)
        ]);
    }
}