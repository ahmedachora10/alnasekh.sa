<?php

namespace App\View\Components\Dashboard\Cards;

use Illuminate\View\Component;

class CardImage1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $image = null, public $title = null, public $description = null)
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
        return view('components.dashboard.cards.card-image1');
    }
}