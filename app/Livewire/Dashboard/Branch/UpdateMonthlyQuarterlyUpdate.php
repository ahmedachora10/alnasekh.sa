<?php

namespace App\Livewire\Dashboard\Branch;

use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\MonthlyQuarterlyUpdate;
use App\Traits\Livewire\Message;
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
            ['updated_at', '=', $update['updated_at']],
        ])->first();

        $this->date = now()->parse($pivot->date)->format('Y-m-d');

        $this->pivotId = $pivot->id;

        $this->dispatch('open-modal', target: '#updateMonthlyQuarterlyForm');
    }

    public function update() {
        $this->validate();

        CorpBranchMonthlyQuarterlyUpdate::find($this->pivotId)?->update(['date' => $this->date]);

        $this->fireMessage();

        $this->dispatch('refresh-dashboard');
        $this->dispatch('close-modal', target: '#updateMonthlyQuarterlyForm');
    }

    public function render()
    {
        return view('livewire.dashboard.branch.update-monthly-quarterly-update');
    }
}