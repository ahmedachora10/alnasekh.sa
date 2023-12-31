<?php

namespace App\Notifications;

use App\Mail\SendReminderEmail;
use App\Models\Corp;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class UserActionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public array $data,
        public ?string $email = null,
        public ?Corp $corp = null
    )
    {
        if($this->email !== null || $this->email != '') {
            Mail::to('suliman@isbd5.com')->queue(new SendReminderEmail($this->corp, $this->data['email_title']));
            // 'suliman@isbd5.com'
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->data;
    }
}