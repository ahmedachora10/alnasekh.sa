<?php

namespace Modules\Tasks\App\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Tasks\App\Models\Task;

class EmployeeTaskAssignmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct( public Task $task )
    {}

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->view('tasks::mails.employee-task-assignment');
    }
}