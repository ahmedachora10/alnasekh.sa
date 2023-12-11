<?php

namespace App\View\Components\Dashboard\Tables;

use Illuminate\View\Component;

class Table1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $title = null,
        public $createAction = null,
        public $columns = [],
        public $actions = null,
        public $withActions = true,
        public $withId = true,
        public $responsive = true,
        public $translate = true,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.tables.table1');
    }
}