<?php

namespace App\Livewire\Dashboard\Branch;

use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\MonthlyQuarterlyUpdate;
use App\Observers\DeleteNotificationObserver;
use App\Traits\Livewire\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UpdateMonthlyQuarterlyUpdate extends Component
{
    use Message;

    public ?CorpBranch $branch = null;

    #[Rule('required|date')]
    public $date;
    public $pivotId;


    #[On('edit-branch-monthly-quarterly-update')]
    public function edit(array $update) {

        $pivot = CorpBranchMonthlyQuarterlyUpdate::where([
            ['corp_branch_id', '=', $update['corp_branch_id']],
            ['monthly_quarterly_update_id', '=', $update['monthly_quarterly_update_id']],
            ['date', '=', $update['date']],
        ])->whereDate('updated_at', '=', Carbon::parse($update['updated_at'])->format('Y-m-d'))->first();

        $this->date = now()->parse($pivot?->date)?->format('Y-m-d');

        $this->pivotId = $pivot?->id;

        $this->dispatch('open-modal', target: '#updateMonthlyQuarterlyForm');
    }

    public function update() {
        $this->validate();

        $update = CorpBranchMonthlyQuarterlyUpdate::find($this->pivotId);
        $oldDate = $update->date;
        $update?->update(['date' => $this->date]);
        $update->fireUpdatedEvent($oldDate);

        // DB::table('notifications')
        //     ->whereJsonContains("data->id", $update->id)
        //     ->whereJsonDoesntContain("data->date", 'date')
        //     ->whereJsonContains('data->model', $update::class)?->delete();

        $this->fireMessage();

        $this->dispatch('refresh-dashboard');
        $this->dispatch('close-modal', target: '#updateMonthlyQuarterlyForm');
        $this->dispatch('open-modal', target: '#createCorpReportModal');
    }

    #[On('delete-monthly-quarterly-from-branch')]
    public function delete($id) {
        DB::transaction(function () use($id) {
            // $this->branch->monthlyQuarterlyUpdates()->detach($id);

            if(
                $removedItemId = CorpBranchMonthlyQuarterlyUpdate::where('monthly_quarterly_update_id', $id)
                    ->where('corp_branch_id', $this->branch->id)
                    ->first()
            ) {
                DB::table('notifications')
                ->whereJsonContains("data->id", $removedItemId->id)
                ->whereJsonContains('data->model', MonthlyQuarterlyUpdate::class)?->delete();

                $removedItemId->delete();

                session()->put('success', trans('message.delete'));
                $this->dispatch('refresh-alert');
                $this->dispatch('refresh-dashboard');
            }

        });
    }

    public function render()
    {
        return view('livewire.dashboard.branch.update-monthly-quarterly-update');
    }
}
