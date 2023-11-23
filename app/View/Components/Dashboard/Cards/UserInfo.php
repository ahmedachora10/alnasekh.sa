<?php

namespace App\View\Components\Dashboard\Cards;

use Illuminate\View\Component;

class UserInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $title = null, public $description = null, public $statistics = null, public $color = 'primary', public $count = null, public $icon = 'bx bx-user' )
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
        return view('components.dashboard.cards.user-info');
    }
}