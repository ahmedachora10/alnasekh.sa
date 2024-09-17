<?php

namespace App\Notifications;

use App\Enums\ActivityLogType;
use App\Mail\SendReminderEmail;
use App\Models\Corp;
use App\Models\User;
use App\Observers\ActivityLogsObserver;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Artisan;
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
        activity('send-email')
            ->event(ActivityLogType::Email->value)
            ->log(ActivityLogType::Email->content($this->corp));

            Mail::to($this->email)->queue(new SendReminderEmail($this->corp->name, $this->corp->administrator_name, $this->data['email_title']));
            // 'suliman@isbd5.com'
            // Artisan::call('email:send', [
            //     'email' => $this->email,
            //     'name' => $this->corp->name,
            //     'administrator_name' => $this->corp->administrator_name,
            //     '--title' => $this->data['email_title'],
            // ]);
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