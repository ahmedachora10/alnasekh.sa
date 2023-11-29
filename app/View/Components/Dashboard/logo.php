<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Logo extends Component
{
    public $image = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image = '')
    {
        $this->image = $image ?? asset(str_replace('public/', 'storage/', setting('logo')));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.logo', ['image' => $this->image]);
    }
}
