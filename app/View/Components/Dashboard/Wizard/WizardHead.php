<?php

namespace App\View\Components\Dashboard\Wizard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WizardHead extends Component
{
    public $steps;
    public $branch;
    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $branch,
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
            ['target' => 'corps', 'title' => trans('wizard.corp'), 'subtitle' => trans('wizard.add corp')],
        ];

        if($this->branch) {
            $steps = array_merge($steps, $this->branches());
        } else {
            $steps[] = ['target' => 'registries', 'title' => trans('wizard.registries'), 'subtitle' => trans('wizard.add registry')];
        }

        $lastSteps = [
            ['target' => 'subscriptions', 'title' => trans('wizard.subscriptions'), 'subtitle' => trans('wizard.add subscription')],
            ['target' => 'monthly_quarterly_updates', 'title' => trans('wizard.monthly quarterly updates'), 'subtitle' => trans('wizard.add monthly quarterly updates')],
            ['target' => 'employees', 'title' => trans('wizard.employees'), 'subtitle' => trans('wizard.add employee')],
        ];

        return array_merge($steps, $lastSteps);
    }

    private function branches() {
        return [
            ['target' => 'branches', 'title' => trans('wizard.branches'), 'subtitle' => trans('wizard.add branch')],
            ['target' => 'records', 'title' => trans('wizard.records'), 'subtitle' => trans('wizard.add record')],
            ['target' => 'certificates', 'title' => trans('wizard.certificates'), 'subtitle' => trans('wizard.add certificate')],
            ['target' => 'civil_defense_permit', 'title' => trans('wizard.civil defense permit'), 'subtitle' => trans('wizard.add civil defense permit')],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.wizard.wizard-head');
    }
}