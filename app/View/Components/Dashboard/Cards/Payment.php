<?php

namespace App\View\Components\Dashboard\Cards;

use Illuminate\View\Component;

class Payment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $title, public $amount = 0, public $icon = 'assets/img/icons/unicons/briefcase.png', public $options = null)
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
        return view('components.dashboard.cards.payment');
    }
}