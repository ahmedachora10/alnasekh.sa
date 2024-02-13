<?php

namespace App\Console\Commands;

use App\Mail\SendReminderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    protected $signature = 'email:send {email : The email address to send the email to} {name : The subject of the email} {administrator_name : the name of owner} {--title= : The body of the email}';

    protected $description = 'Send a custom email with specified parameters';

    public function handle()
    {
        $email = $this->argument('email');
        $name = $this->argument('name');
        $administrator_name = $this->argument('administrator_name');
        $title = $this->option('title');

        // dd($title, $name, $email, $administrator_name);

        // Send email using Laravel Mail class
        Mail::to($email)->send(new SendReminderEmail($name, $administrator_name, $title));


        $this->info("Email sent successfully to $email");
    }
}
