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

    public function makeItAllRead() {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function destroy($notificationId) {
        dd($notificationId);
        DB::table('notifications')->where('id', $notificationId)?->delete();
    }

    public function render()
    {
        if($this->theme == 'card') {
            return view('livewire.dashboard.container.notifications-container2', [
            'notifications' => auth()->user()->notifications()->latest()->paginate(10)
            ])->layout('layouts.app');
        } else {
            return view('livewire.dashboard.container.notifications-container', [
                'notifications' => auth()->user()->notifications()->latest()->paginate(10),
                'unreadNotifications' => auth()->user()->unreadNotifications()->count()
            ]);
        }
    }
}