<?php

namespace App\Console;

use App\Enums\Status;
use App\Models\BranchCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscrition;
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
        $schedule->call(function () {
            $admins = User::whereHasRole('admin')->get();

            // Corps
            foreach (Corp::with('user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend($item->id, $item->end_date, Corp::class)) {
                    continue;
                }

                $notification = new UserActionNotification([
                    'title' => 'المنشاة - ' . $item->name,
                    'content' => $status->name(),
                    'icon' => $status->icon(),
                    'color' => $status->color(),
                    'id' => $item->id,
                    'end_date' => $item->end_date,
                    'model' => Corp::class,
                    'link' => route('corps.show', $item)
                ]);

                $item->user->notify($notification);

                Notification::send($admins, $notification);
            }

            // Records
            foreach (BranchRecord::with('branch.corp.user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend($item->id, $item->end_date, BranchRecord::class)) {
                    continue;
                }

                $notification = new UserActionNotification([
                    'title' => 'السجلات - ' . $item->branch->name,
                    'content' => $status->name(),
                    'icon' => $status->icon(),
                    'color' => $status->color(),
                    'id' => $item->id,
                    'end_date' => $item->end_date,
                    'model' => BranchRecord::class,
                    'link' => route('branches.show', $item->branch)
                ]);

                $item->branch->corp->user->notify($notification);

                Notification::send($admins, $notification);
            }

            // Subscriptions
            foreach (BranchSubscrition::with('branch.corp.user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                    $item->id, $item->end_date, BranchSubscrition::class
                )) {
                    continue;
                }

                $notification = new UserActionNotification([
                    'title' => 'الاشتراكات - ' . $item->branch->name,
                    'content' => $status->name(),
                    'icon' => $status->icon(),
                    'color' => $status->color(),
                    'id' => $item->id,
                    'end_date' => $item->end_date,
                    'model' => BranchSubscrition::class,
                    'link' => route('branches.show', $item->branch)
                ]);

                $item->branch->corp->user->notify($notification);

                Notification::send($admins, $notification);
            }

            // Certificates
            foreach (BranchCertificate::with('branch.corp.user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                    $item->id, $item->end_date, BranchCertificate::class
                )) {
                    continue;
                }

                $notification = new UserActionNotification([
                    'title' => 'التراخيص - ' . $item->branch->name,
                    'content' => $status->name(),
                    'icon' => $status->icon(),
                    'color' => $status->color(),
                    'id' => $item->id,
                    'end_date' => $item->end_date,
                    'model' => BranchCertificate::class,
                    'link' => route('branches.show', $item->branch)
                ]);

                $item->branch->corp->user->notify($notification);

                Notification::send($admins, $notification);
            }

            // Certificates
            foreach (CorpBranchRegistry::with('branch.corp.user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                    $item->id, $item->end_date, CorpBranchRegistry::class
                )) {
                    continue;
                }

                $notification = new UserActionNotification([
                    'title' => 'التراخيص - ' . $item->branch->name,
                    'content' => $status->name(),
                    'icon' => $status->icon(),
                    'color' => $status->color(),
                    'id' => $item->id,
                    'end_date' => $item->end_date,
                    'model' => CorpBranchRegistry::class,
                    'link' => route('branches.show', $item->branch)
                ]);

                $item->branch->corp->user->notify($notification);

                Notification::send($admins, $notification);
            }

            dd('done');

            // Monthly And Quarterly Updates
            foreach (CorpBranchMonthlyQuarterlyUpdate::with('branch.corp.user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                    $item->id, $item->end_date, CorpBranchMonthlyQuarterlyUpdate::class
                )) {
                    continue;
                }

                $notification = new UserActionNotification([
                    'title' => 'التحديثات الشهرية والربع سنوية - ' . $item->branch->name,
                    'content' => $status->name(),
                    'icon' => $status->icon(),
                    'color' => $status->color(),
                    'id' => $item->id,
                    'end_date' => $item->end_date,
                    'model' => CorpBranchMonthlyQuarterlyUpdate::class,
                    'link' => route('branches.show', $item->branch)
                ]);

                $item->branch->corp->user->notify($notification);

                Notification::send($admins, $notification);
            }

            // Employees
            foreach (BranchEmployee::with('branch.corp.user')->get() as $item) {
                $status = status_handler($item->end_date);
                if(!in_array($status, [Status::DEFAULT, Status::VALID]) && !$this->notificationAlreadySend(
                    $item->id, $item->end_date, BranchEmployee::class
                )) {
                    $notification = new UserActionNotification([
                        'title' => 'نهاية عقد الاقامة',
                        'content' => $status->name(),
                        'icon' => $status->icon(),
                        'color' => $status->color(),
                        'id' => $item->id,
                        'end_date' => $item->end_date,
                        'model' => BranchEmployee::class,
                        'link' => route('branches.show', $item->branch)
                    ]);

                    $item->branch->corp->user->notify($notification);

                    Notification::send($admins, $notification);
                }

                $status = status_handler($item->business_card_end_date);
                if(!in_array($status, [Status::DEFAULT, Status::VALID]) && !$this->notificationAlreadySend(
                    $item->id, $item->business_card_end_date, BranchEmployee::class, 'business_card_end_date'
                )) {
                    $notification = new UserActionNotification([
                        'title' => 'نهاية كرت العمل',
                        'content' => $status->name(),
                        'icon' => $status->icon(),
                        'color' => $status->color(),
                        'id' => $item->id,
                        'business_card_end_date' => $item->business_card_end_date,
                        'model' => BranchEmployee::class,
                        'link' => route('branches.show', $item->branch)
                    ]);

                    $item->branch->corp->user->notify($notification);

                    Notification::send($admins, $notification);
                }

                $status = status_handler($item->contract_end_date);
                if(!in_array($status, [Status::DEFAULT, Status::VALID]) && !$this->notificationAlreadySend(
                    $item->id, $item->contract_end_date, BranchEmployee::class, 'contract_end_date'
                )) {
                    $notification = new UserActionNotification([
                        'title' => 'نهاية الاقامة',
                        'content' => $status->name(),
                        'icon' => $status->icon(),
                        'color' => $status->color(),
                        'id' => $item->id,
                        'contract_end_date' => $item->contract_end_date,
                        'model' => BranchEmployee::class,
                        'link' => route('branches.show', $item->branch)
                    ]);

                    $item->branch->corp->user->notify($notification);

                    Notification::send($admins, $notification);
                }
            }
        })->everyMinute();
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