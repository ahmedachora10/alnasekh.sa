<?php

namespace App\Console;

use App\Enums\Status;
use App\Jobs\DateReminder;
use App\Models\BranchCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\CorpBranchRegistry;
use App\Models\Registry;
use App\Models\User;
use App\Notifications\UserActionNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {})->everyMinute();
        $schedule->job(new DateReminder)->everyThirtySeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    private function notificationAlreadySend($id, $date, $model, $columnName = 'end_date') {
        return DB::table('notifications')->whereJsonContains('data->id', $id)
                ->whereJsonContains("data->".$columnName, $date)
                ->whereJsonContains('data->model', $model)
                ->first();
    }
}
