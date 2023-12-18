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
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function makeItRead($notification) {
        if(!isset($notification['id'])) return false;

        DB::table('notifications')->where('id', $notification['id'])->update(['read_at' => now()]);
    }

    public function destroy($notificationId) {
        dd($notificationId);
        DB::table('notifications')->where('id', $notificationId)?->delete();
    }

    public function render()
    {
        if($this->theme == 'card') {
            $notify = auth()->user()->notifications()
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
                'notifications' => auth()->user()->unreadNotifications()->latest()->paginate(10),
                'unreadNotifications' => auth()->user()->unreadNotifications()->count()
            ]);
        }
    }
}