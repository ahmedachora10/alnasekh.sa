<?php

namespace Modules\Tasks\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Modules\Tasks\App\Enums\UserTaskStatus;

class ApprovalStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $taskName , public UserTaskStatus $status, public ?string $reason = null)
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
        $status = $this->status === UserTaskStatus::Accepted ? 'قبول' : 'رفض بسبب ' . $this->reason;
        return (new MailMessage)
            ->subject("حالة مهمة : {$this->taskName}")
            ->markdown('tasks::mails.approval-task-status', ['status' => $status, 'taskName' => $this->taskName]);
            // ->line("حالة المهمة : {$this->taskName}")
            // ->action('Notification Action', 'https://laravel.com')
            // ->line("تم {$status} المهمة {$this->taskName}")
            // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public static function toArray($notifiable): array
    {
        return [];
    }
}