<?php

namespace Modules\Tasks\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Modules\Tasks\App\Emails\EmployeeTaskAssignmentEmail;
use Modules\Tasks\App\Models\Task;

class EmployeeTaskAssignmentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct( public Task $task )
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
    public function toMail($notifiable): mixed
    {
        return (new EmployeeTaskAssignmentEmail($this->task))
            ->subject('تعيين مهمة جديدة')
            ->to($this->task->creator)
            ->markdown('tasks::mails.employee-task-assignment');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'name' => $this->task->name,
            'description' => $this->task->description,
            'status' => $this->task->status?->label(),
            'start' => $this->task->start_date->format('Y-m-d H:i'),
            'end' => $this->task->end_date->format('Y-m-d H:i'),
            'priority' => $this->task->priority->label(),
        ];
    }

    public static function render($notifiable = null) {
        return view('notifications.task', [
            'notification' => $notifiable
        ]);
    }
}