<?php

namespace App\View\Components\Dashboard\Sidebar;

use Illuminate\View\Component;

class Link extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $link = 'javascript:viod(0)', public $icon = '', public $title = null, public bool $hasSubMenu = false)
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
        return view('components.dashboard.sidebar.link');
    }
}