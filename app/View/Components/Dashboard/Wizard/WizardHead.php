<?php

namespace App\View\Components\Dashboard\Wizard;

use App\Models\CorpBranch;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WizardHead extends Component
{
    public $steps;
    public ?CorpBranch $branch;
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?CorpBranch $branch,
        public string $current = '',
        public int $countOfSteps = 6,
    )
    {
        $this->branch = $branch;
        $steps = $this->default();
        $jsonString = json_encode($steps);
        $steps = json_decode($jsonString);

        $this->steps = collect($steps);
    }

    private function default() {

        $steps = [
            ['target' => 'corps', 'routeName' => 'corps.edit', 'title' => trans('wizard.corp'), 'subtitle' => trans('wizard.add corp')],
        ];

        if(!$this->branch?->corp?->doesnt_has_branches) {
            $steps = array_merge($steps, $this->branches());
        } else {
            $steps[] = ['target' => 'registries', 'routeName' => 'branches.registries.store', 'title' => trans('wizard.registries'), 'subtitle' => trans('wizard.add registry')];
        }

        $lastSteps = [
            ['target' => 'subscriptions', 'routeName' => 'branches.subscription.store', 'title' => trans('wizard.subscriptions'), 'subtitle' => trans('wizard.add subscription')],
            ['target' => 'monthly_quarterly_updates', 'routeName' => 'branches.monthly-quarterly-update.store', 'title' => trans('wizard.monthly quarterly updates'), 'subtitle' => trans('wizard.add monthly quarterly updates')],
            ['target' => 'employees', 'routeName' => 'branches.employees.store', 'title' => trans('wizard.employees'), 'subtitle' => trans('wizard.add employee')],
        ];

        return array_merge($steps, $lastSteps);
    }

    private function branches() {
        return [
            ['target' => 'branches', 'routeName' => 'branches.index', 'title' => trans('wizard.branches'), 'subtitle' => trans('wizard.add branch')],
            ['target' => 'records', 'routeName' => 'branches.record.store', 'title' => trans('wizard.records'), 'subtitle' => trans('wizard.add record')],
            ['target' => 'certificates','routeName' => 'branches.certificate.store', 'title' => trans('wizard.certificates'), 'subtitle' => trans('wizard.add certificate')],
            ['target' => 'civil_defense_permit', 'routeName' => 'branches.civil_defense_permit.store', 'title' => trans('wizard.civil defense permit'), 'subtitle' => trans('wizard.add civil defense permit')],
        ];
    }

    public function checkRouteName($routeName) {
        if (!$this->branch)
            return '#!';
        $param = in_array($routeName, ['branches.index', 'corps.edit']) ? $this->branch->corp_id : $this->branch->id;
        return route($routeName, $param);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.wizard.wizard-head');
    }
}