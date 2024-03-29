<?php

namespace App\Livewire\Dashboard\Container;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class NotificationsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $theme = 'card';

    public array $filters = ['read', 'unread'];

    public string $filterBy = 'unread';

    public function makeItAllRead() {
        auth()->user()->unreadNotifications()->where('type', 'App\Notifications\UserActionNotification')->update(['read_at' => now()]);
    }

    public function makeItRead($notification) {
        if(!isset($notification['id']) && !isset($notification['data']['id'])) return false;

        $data = $notification['data'];
        DB::table('notifications')
        ->whereJsonContains('data->id', $data['id'])
        ->whereJsonContains('data->model', $data['model'])
        ->update(['read_at' => now()]);
    }

    public function delete($notification) {
        if(!isset($notification['id']) && !isset($notification['data']['id'])) return false;

        $data = $notification['data'];

            DB::table('notifications')
            ->whereJsonContains('data->id', $data['id'])
            ->whereJsonContains('data->model', $data['model'])
            ?->delete();

            session()->put('success', trans('message.delete'));
            $this->dispatch('refresh-alert');

    }

    public function render()
    {
        if($this->theme == 'card') {
            $notify = auth()->user()->notifications()
            ->where('type', 'App\Notifications\UserActionNotification')
            ->when($this->filterBy === $this->filters[0], function ($query) {
                $query->whereNotNull('read_at');
            })->when($this->filterBy === $this->filters[1], function ($query) {
                $query->whereNull('read_at');
            });

            return view('livewire.dashboard.container.notifications-container2', [
            'notifications' => $notify->paginate(10)
            ])->layout('layouts.app');
        } else {
            return view('livewire.dashboard.container.notifications-container', [
                'notifications' => auth()->user()->unreadNotifications()->where('type', 'App\Notifications\UserActionNotification')->latest()->paginate(10),
                'unreadNotifications' => auth()->user()->unreadNotifications()->where('type', 'App\Notifications\UserActionNotification')->count()
            ]);
        }
    }
}
