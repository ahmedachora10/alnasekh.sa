<?php

namespace App\View\Components\Dashboard\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardWidget extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = '',
        public int|float $total = 0,
        public string $icon = 'bx bx-check-double',
        public string $color = 'secondary',
        public bool $last = false,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cards.card-widget');
    }
}