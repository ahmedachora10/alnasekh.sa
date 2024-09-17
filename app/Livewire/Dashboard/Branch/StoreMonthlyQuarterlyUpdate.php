<?php

namespace App\Livewire\Dashboard\Branch;

use App\Enums\ActivityLogType;
use App\Livewire\Forms\MonthlyQuarterlyUpdateForm;
use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\MonthlyQuarterlyUpdate;
use App\Models\User;
use App\Observers\ActivityLogsObserver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreMonthlyQuarterlyUpdate extends Component
{
    public MonthlyQuarterlyUpdateForm $form;

    public CorpBranch $branch;

    public MonthlyQuarterlyUpdate $monthlyQuarterlyUpdate;

    public Collection $getAllMonthlyQuarterlyUpdate;

    public array $checkedElements = [];

    public bool $createMode = true;

    public $date = null;

    public function mount(CorpBranch $branch) {
        $this->getAllMonthlyQuarterlyUpdate = MonthlyQuarterlyUpdate::all();
        $this->branch = $branch;
        $this->monthlyQuarterlyUpdate = new MonthlyQuarterlyUpdate;
        $this->checkedElements = $this->existingMonthlyQuarterlyUpdates()->pluck('monthly_quarterly_update_id')->toArray();
    }

    public function switchElement(MonthlyQuarterlyUpdate $monthlyQuarterlyUpdate) {

        if(!$this->date && !in_array($monthlyQuarterlyUpdate->id, $this->checkedElements)) {
            session()->flash('date', 'الرجاء ادخال التاريخ أولا');
            return false;
        }

        $id = $monthlyQuarterlyUpdate->id;
        $index = array_search($monthlyQuarterlyUpdate->id, $this->checkedElements);

        if ($index !== false) {
            array_splice($this->checkedElements, $index, 1);
            return $this->delete($id);
        }

        array_push($this->checkedElements, $id);
        $this->save($id);
    }

    private function existingMonthlyQuarterlyUpdates() {
        return $this->branch->monthlyQuarterlyUpdates();
    }

    private function save($monthlyQuarterlyUpdate) {
        DB::transaction(function () use ($monthlyQuarterlyUpdate) {
            CorpBranchMonthlyQuarterlyUpdate::create([
                'corp_branch_id' => $this->branch->id,
                'monthly_quarterly_update_id' => $monthlyQuarterlyUpdate,
                'date' => $this->date
            ]);

            session()->put('success', trans('message.create'));
            $this->reset('date');
            $this->dispatch('refresh-alert');
            $this->dispatch('refresh-dashboard');

            $this->dispatch('open-modal', target: '#createCorpReportModal');
        });
    }

    private function delete($monthlyQuarterlyUpdate): void {

        CorpBranchMonthlyQuarterlyUpdate::firstWhere([
            ['corp_branch_id', $this->branch->id],
            ['monthly_quarterly_update_id', $monthlyQuarterlyUpdate]
        ])?->delete();

        session()->put('success', trans('message.delete'));
        $this->reset('date');
        $this->dispatch('refresh-alert');
    }

    #[On('refresh-monthly-quarterly-update')]
    public function refresh() {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.store-monthly-quarterly-update', [
            'savedRecords' => collect($this->existingMonthlyQuarterlyUpdates()->get())
        ]);
    }
}
