<?php

namespace App\View\Components\Dashboard\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Role extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $users)
    {
        //
    }

    public function totalUsers() {
        $count = count($this->users);
        return match ($count) {
            0 => 'لا يوجد مستخدمين',
            1 => 'المجموع مستخدم واحد',
            2 => 'المجموع  مستخدمين',
            default => "المجموع $count مستخدمين",
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cards.role');
    }
}