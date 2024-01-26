<?php

namespace App\Livewire\Dashboard\Container;

use App\Models\SubscribePackageRequest;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribePackageRequestsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public ?SubscribePackageRequest $request = null;

    public string $search = '';

    public function mount() {
        if(auth()->user()->hasRole('admin')) {
            auth()->user()->unreadnotifications()->whereJsonContains('data->model',SubscribePackageRequest::class)?->update(['read_at' => now()]);
        }
    }

    public function delete(SubscribePackageRequest $request) {
        $request->delete();
        session()->put('success', trans('message.delete'));

        $this->dispatch('refresh-alert');
    }

    public function details(SubscribePackageRequest $request) {
        $this->request = $request;
        $this->dispatch('open-modal', target: '#details');
    }

    public function render()
    {
        return view('livewire.dashboard.container.subscribe-package-requests-container', [
            'requests' => SubscribePackageRequest::search($this->search)
            ->query(fn(Builder $query) => $query->with('package'))
            ->paginate(setting('pagination') ?? 8)
        ]);
    }
}