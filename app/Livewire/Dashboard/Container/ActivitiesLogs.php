<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\ActivityLog;
use App\Models\Corp;
use App\Models\CorpBranch;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ActivitiesLogs extends Component
{
    use WithPagination;

    public ?CorpBranch $branch = null;

    public function delete(Activity $activity) {
        $activity->delete();
        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
    }
    public function render()
    {
        return view('livewire.dashboard.container.activities-logs', [
            'activities' => Activity::with('causer')
            ->when(
                value: $this->branch,
                callback: fn($query) => $query->where('properties->custom->corp_id', $this->branch->corp_id)
                ->where('properties->custom->branch_id', $this->branch->id)
            )
            ->latest()->paginate(setting('pagination'))
        ]);
    }
}
