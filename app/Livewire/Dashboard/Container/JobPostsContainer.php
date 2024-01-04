<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\JobPost;
use Livewire\Component;
use Livewire\WithPagination;

class JobPostsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.container.job-posts-container', [
            'jobs' => JobPost::paginate(setting('pagination') ?? 8)
        ]);
    }
}