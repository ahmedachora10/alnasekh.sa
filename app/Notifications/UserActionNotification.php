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
        if($this->corp->send_reminder == true && ($this->email !== null || $this->email != '')) {
            Mail::to($this->email)->send(new SendReminderEmail($this->corp->name, $this->corp->administrator_name, $this->data['email_title']));
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
