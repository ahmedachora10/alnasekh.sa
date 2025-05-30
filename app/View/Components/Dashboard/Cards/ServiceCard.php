<?php

namespace App\View\Components\Dashboard\Cards;

use Modules\Service\App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?Service $service = null
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cards.service-card');
    }
}
