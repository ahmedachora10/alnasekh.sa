<?php

namespace Modules\Tasks\App\Notifications;

use App\Enums\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Tasks\App\Models\Meeting;

class EmployeeMeetingInvitation extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Meeting $meeting)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.' . $this->meeting->title)
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'title' => $this->meeting->title,
            'description' => $this->meeting->description,
            'date' => $this->meeting->date->format('Y-m-d H:i'),
        ];
    }

    public static function render($notifiable) {
        return view('notifications.meeting', ['notification' => $notifiable]);
    }
}