<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function switchStatus(Review $review) {
        $review->update(['status' => !$review->status]);
        session()->put('success', trans('message.update'));
        $this->dispatch('refresh-alert');
    }

    public function render()
    {
        return view('livewire.dashboard.container.reviews-container', [
            'reviews' => Review::paginate(setting('pagination') ?? 8)
        ]);
    }
}