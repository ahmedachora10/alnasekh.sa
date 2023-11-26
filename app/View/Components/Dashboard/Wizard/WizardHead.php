<?php

namespace App\View\Components\Dashboard\Wizard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WizardHead extends Component
{
    public $steps;
    /**
     * Create a new component instance.
     */
    public function __construct(array $steps = [], public string $current = '')
    {
        $steps = count($steps) > 0 ? $steps : $this->default();
        $jsonString = json_encode($steps);
        $steps = json_decode($jsonString);

        $this->steps = collect($steps);
    }

    private function default() {
        return [
            ['target' => 'corps', 'title' => trans('wizard.corp'), 'subtitle' => trans('wizard.add corp')],
            ['target' => 'branches', 'title' => trans('wizard.branches'), 'subtitle' => trans('wizard.add branch')],
            ['target' => 'records', 'title' => trans('wizard.records'), 'subtitle' => trans('wizard.add record')],
            ['target' => 'certificates', 'title' => trans('wizard.certificates'), 'subtitle' => trans('wizard.add certificate')],
            ['target' => 'subscriptions', 'title' => trans('wizard.subscriptions'), 'subtitle' => trans('wizard.add subscription')],

            ['target' => 'monthly_updates', 'title' => trans('wizard.monthly updates'), 'subtitle' => trans('wizard.add monthly updates')],
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