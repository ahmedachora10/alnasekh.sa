<?php

namespace Modules\Service\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Service\App\Models\ServiceRequest;

class RequestsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public ?ServiceRequest $request = null;

    public string $search = '';

    public function mount() {
        if(auth()->user()->hasRole('admin')) {
            auth()->user()->unreadnotifications()->whereJsonContains('data->model',ServiceRequest::class)?->update(['read_at' => now()]);
        }
    }

    public function delete(ServiceRequest $request) {
        $request->delete();
        session()->put('success', trans('message.delete'));

        $this->dispatch('refresh-alert');
    }

    public function details(ServiceRequest $request) {
        $this->request = $request;
        $this->dispatch('open-modal', target: '#details');
    }
    public function render()
    {
        return view('service::livewire.requests-container', [
            'requests' => ServiceRequest::search($this->search)
            ->query(fn(Builder $query) => $query->with('service'))
            ->paginate(setting('pagination') ?? 8)
        ]);
    }
}
