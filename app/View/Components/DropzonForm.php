<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropzonForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $fileName = 'attachment',
        public ?string $content = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropzon-form');
    }
}
