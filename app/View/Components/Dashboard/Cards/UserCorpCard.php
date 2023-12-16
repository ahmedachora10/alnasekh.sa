<?php

namespace App\View\Components\Dashboard\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserCorpCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = '',
        public string $image = '',
        public string $startDate = '',
        public string $endDate = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cards.user-corp-card');
    }
}