<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\ActivityLog;
use App\Models\BranchCertificate;
use App\Models\BranchCivilDefenseCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\CorpBranchRegistry;
use App\Models\EmployeeHealthCardPaper;
use App\Models\EmployeeMedicalInsurance;
use App\Models\Registry;
use Livewire\Component;
use Livewire\WithPagination;

class ActivitiesLogs extends Component
{
    use WithPagination;

    public ?int $corpId = null;

    public function delete(ActivityLog $activityLog) {
        $activityLog->delete();
        session()->put('success', trans('message.delete'));
        $this->dispatch('refresh-alert');
    }
    public function render()
    {
        return view('livewire.dashboard.container.activities-logs', [
            'activities' => ActivityLog::latest()
            ->when($this->corpId === null, fn($query) => $query->with('user'))
            ->when(
                value: $this->corpId,
                callback: fn($query) => $query->where('logable_id', $this->corpId)
                ->whereIn('logable_type', [
                    Corp::class,
                    CorpBranch::class,
                    BranchRecord::class,
                    BranchCertificate::class,
                    BranchSubscription::class,
                    BranchCivilDefenseCertificate::class,
                    BranchEmployee::class,
                    EmployeeHealthCardPaper::class,
                    EmployeeMedicalInsurance::class,
                    CorpBranchMonthlyQuarterlyUpdate::class,
                    CorpBranchRegistry::class,
                    Registry::class,
                ])
            )
            ->latest()->paginate(setting('pagination'))
        ]);
    }
}