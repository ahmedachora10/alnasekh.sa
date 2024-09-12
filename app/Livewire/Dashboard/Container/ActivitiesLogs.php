<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\ActivityLog;
use Livewire\Component;
use Livewire\WithPagination;

class ActivitiesLogs extends Component
{
    use WithPagination;
    public function delete(ActivityLog $activityLog) {
        $activityLog->delete();
        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
    }
    public function render()
    {
        return view('livewire.dashboard.container.activities-logs', [
            'activities' => ActivityLog::with('user')->latest()->paginate(setting('pagination'))
        ]);
    }
}
