<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Wallet extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $image = '',
        public ?string $title = null,
        public float|int $amount = 0,
        public string $currency = 'ر.س'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.wallet');
    }
}