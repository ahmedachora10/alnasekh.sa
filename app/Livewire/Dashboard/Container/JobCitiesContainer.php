<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\JobCity;
use Livewire\Component;
use Livewire\WithPagination;

class JobCitiesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.job-cities-container', [
            'jobCities' => JobCity::paginate(setting('pagination') ?? 8)
        ]);
    }
}