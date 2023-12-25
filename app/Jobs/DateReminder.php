<?php

namespace App\Jobs;

use App\Enums\Status;
use App\Models\BranchCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\CorpBranchRegistry;
use App\Models\EmployeeHealthCardPaper;
use App\Models\EmployeeMedicalInsurance;
use App\Models\User;
use App\Notifications\UserActionNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DateReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $admins = User::whereHasRole('admin')->get();

        // Corps
        foreach (Corp::with('user')->get() as $item) {
            $status = status_handler($item->end_date);
            if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend($item->id, $item->end_date, Corp::class)) {
                continue;
            }

            // $notification = new UserActionNotification([
            //     'title' => 'المنشأة ' . $status->name(),
            //     'content' => $status->name(),
            //     'image' => asset($item->thumbnail),
            //     'icon' => $status->icon(),
            //     'color' => $status->color(),
            //     'id' => $item->id,
            //     'end_date' => $item->end_date,
            //     'model' => Corp::class,
            //     'link' => route('corps.show', $item)
            // ], $item->email);

            $notification = $this->sendNotification($item->id, $status, $item->email, $item, $item->thumbnail, [
                'title' => 'المنشأة ' . $status->name(),
                'content' => $item->name,
                'owner' => $item->administrator_name,
                'end_date' => $item->end_date,
                'model' => Corp::class,
                'link' => route('corps.edit', $item)
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

            // $notification = new UserActionNotification([
            //     'title' => 'السجلات - ' . $item->branch->name,
            //     'content' => $status->name(),
            //     'icon' => $status->icon(),
            //     'color' => $status->color(),
            //     'id' => $item->id,
            //     'end_date' => $item->end_date,
            //     'model' => BranchRecord::class,
            //     'link' => route('branches.show', $item->branch)
            // ], $item->branch->corp->email);

            $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                'title' => 'السجل ' . $status->name(),
                'content' => $item->branch->corp->name,
                'owner' => $item->branch->corp->administrator_name,
                'end_date' => $item->end_date,
                'model' => BranchRecord::class,
                'link' => route('branches.show', $item->branch)
            ]);

            $item->branch->corp->user->notify($notification);

            Notification::send($admins, $notification);
        }

        // Subscriptions
        foreach (BranchSubscription::with('branch.corp.user')->get() as $item) {
            $status = status_handler($item->end_date);
            if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                $item->id, $item->end_date, BranchSubscription::class
            )) {
                continue;
            }

            // $notification = new UserActionNotification([
            //     'title' => 'الاشتراكات - ' . $item->branch->name,
            //     'content' => $status->name(),
            //     'icon' => $status->icon(),
            //     'color' => $status->color(),
            //     'id' => $item->id,
            //     'end_date' => $item->end_date,
            //     'model' => BranchSubscription::class,
            //     'link' => route('branches.show', $item->branch)
            // ], $item->branch->corp->email);

            $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                'title' => 'السجل ' . $status->name(),
                'content' => $item->branch->corp->name,
                'owner' => $item->branch->corp->administrator_name,
                'end_date' => $item->end_date,
                'model' => BranchSubscription::class,
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

            // $notification = new UserActionNotification([
            //     'title' => 'التراخيص - ' . $item->branch->name,
            //     'content' => $status->name(),
            //     'icon' => $status->icon(),
            //     'color' => $status->color(),
            //     'id' => $item->id,
            //     'end_date' => $item->end_date,
            //     'model' => BranchCertificate::class,
            //     'link' => route('branches.show', $item->branch)
            // ], $item->branch->corp->email);

            $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                'title' => 'الترخيص ' . $status->name(),
                'content' => $item->branch->corp->name,
                'owner' => $item->branch->corp->administrator_name,
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

            // $notification = new UserActionNotification([
            //     'title' => 'التراخيص - ' . $item->branch->name,
            //     'content' => $status->name(),
            //     'icon' => $status->icon(),
            //     'color' => $status->color(),
            //     'id' => $item->id,
            //     'end_date' => $item->end_date,
            //     'model' => CorpBranchRegistry::class,
            //     'link' => route('branches.show', $item->branch)
            // ], $item->branch->corp->email);

            $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                'title' => 'الترخيص ' . $status->name(),
                'content' => $item->branch->corp->name,
                'owner' => $item->branch->corp->administrator_name,
                'end_date' => $item->end_date,
                'model' => CorpBranchRegistry::class,
                'link' => route('branches.show', $item->branch)
            ]);

            $item->branch->corp->user->notify($notification);

            Notification::send($admins, $notification);
        }

        // Monthly And Quarterly Updates
        // foreach (CorpBranchMonthlyQuarterlyUpdate::with('branch.corp.user')->get() as $item) {
        //     $status = status_handler($item->end_date);
        //     if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
        //         $item->id, $item->date, CorpBranchMonthlyQuarterlyUpdate::class
        //     )) {
        //         continue;
        //     }

        //     // $notification = new UserActionNotification([
        //     //     'title' => 'التحديثات الشهرية والربع سنوية - ' . $item->branch->name,
        //     //     'content' => $status->name(),
        //     //     'icon' => $status->icon(),
        //     //     'color' => $status->color(),
        //     //     'id' => $item->id,
        //     //     'end_date' => $item->end_date,
        //     //     'model' => CorpBranchMonthlyQuarterlyUpdate::class,
        //     //     'link' => route('branches.show', $item->branch)
        //     // ], $item->branch->corp->email);

        //     $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
        //         'title' => 'التحديثات الشهرية والربع سنوية ' . $status->name(),
        //         'content' => $item->branch->corp->name,
        //         'owner' => $item->branch->corp->administrator_name,
        //         'date' => $item->date,
        //         'model' => CorpBranchMonthlyQuarterlyUpdate::class,
        //         'link' => route('branches.show', $item->branch)
        //     ]);

        //     $item->branch->corp->user->notify($notification);

        //     Notification::send($admins, $notification);
        // }

        // Employees
        foreach (BranchEmployee::with('branch.corp.user')->get() as $item) {
            $status = status_handler($item->end_date);
            if(!in_array($status, [Status::DEFAULT, Status::VALID]) && !$this->notificationAlreadySend(
                $item->id, $item->end_date, BranchEmployee::class
            )) {
                // $notification = new UserActionNotification([
                //     'title' => 'نهاية عقد الاقامة',
                //     'content' => $status->name(),
                //     'icon' => $status->icon(),
                //     'color' => $status->color(),
                //     'id' => $item->id,
                //     'end_date' => $item->end_date,
                //     'model' => BranchEmployee::class,
                //     'link' => route('branches.show', $item->branch)
                // ], $item->branch->corp->email);

                $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                    'title' => 'عقد الاقامة ' . $status->name(),
                    'content' => $item->branch->corp->name,
                    'owner' => $item->branch->corp->administrator_name,
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
                // $notification = new UserActionNotification([
                //     'title' => 'نهاية كرت العمل',
                //     'content' => $status->name(),
                //     'icon' => $status->icon(),
                //     'color' => $status->color(),
                //     'id' => $item->id,
                //     'business_card_end_date' => $item->business_card_end_date,
                //     'model' => BranchEmployee::class,
                //     'link' => route('branches.show', $item->branch)
                // ], $item->branch->corp->email);

                $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                    'title' => 'كرت العمل ' . $status->name(),
                    'content' => $item->branch->corp->name,
                    'owner' => $item->branch->corp->administrator_name,
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
                // $notification = new UserActionNotification([
                //     'title' => 'نهاية الاقامة',
                //     'content' => $status->name(),
                //     'icon' => $status->icon(),
                //     'color' => $status->color(),
                //     'id' => $item->id,
                //     'contract_end_date' => $item->contract_end_date,
                //     'model' => BranchEmployee::class,
                //     'link' => route('branches.show', $item->branch)
                // ], $item->branch->corp->email);

                $notification = $this->sendNotification($item->id, $status, $item->branch->corp->email,$item->branch->corp, $item->branch->corp->thumbnail, [
                    'title' => 'الاقامة ' . $status->name(),
                    'content' => $item->branch->corp->name,
                    'owner' => $item->branch->corp->administrator_name,
                    'contract_end_date' => $item->contract_end_date,
                    'model' => BranchEmployee::class,
                    'link' => route('branches.show', $item->employee->branch)
                ]);

                $item->branch->corp->user->notify($notification);

                Notification::send($admins, $notification);
            }
        }

        // Medical Insurance
        foreach (EmployeeMedicalInsurance::with('employee.branch.corp.user')->get() as $item) {
            $status = status_handler($item->end_date);
            if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                $item->id, $item->end_date, EmployeeMedicalInsurance::class
            )) {
                continue;
            }

            // dd($item->employee->branch->corp->email);

            $notification = $this->sendNotification($item->id, $status, $item->employee->branch->corp->email, $item->employee->branch->corp, $item->employee->branch->corp->thumbnail, [
                'title' => 'التأمين الطبي ' . $status->name(),
                'content' => $item->employee->branch->corp->name,
                'owner' => $item->employee->branch->corp->administrator_name,
                'end_date' => $item->end_date,
                'model' => EmployeeMedicalInsurance::class,
                'link' => route('branches.show', $item->employee->branch)
            ]);

            $item->employee->branch->corp->user->notify($notification);

            Notification::send($admins, $notification);
        }

        // Health Card Paper
        foreach (EmployeeHealthCardPaper::with('employee.branch.corp.user')->get() as $item) {
            $status = status_handler($item->end_date);
            if(in_array($status, [Status::DEFAULT, Status::VALID]) || $this->notificationAlreadySend(
                $item->id, $item->end_date, EmployeeHealthCardPaper::class
            )) {
                continue;
            }

            $notification = $this->sendNotification($item->id, $status, $item->employee->branch->corp->email, $item->employee->branch->corp, $item->employee->branch->corp->thumbnail, [
                'title' => 'الكرت الصحي ' . $status->name(),
                'content' => $item->employee->branch->corp->name,
                'owner' => $item->employee->branch->corp->administrator_name,
                'end_date' => $item->end_date,
                'model' => EmployeeHealthCardPaper::class,
                'link' => route('branches.show', $item->employee->branch)
            ]);

            $item->employee->branch->corp->user->notify($notification);

            Notification::send($admins, $notification);
        }
    }

    private function notificationAlreadySend($id, $date, $model, $columnName = 'end_date') {
        return DB::table('notifications')->whereJsonContains('data->id', $id)
                ->whereJsonContains("data->".$columnName, $date)
                ->whereJsonContains('data->model', $model)
                ->first();
    }

    private function sendNotification($id, $status, $email, $corp, $image = '', array $data = []) {
        return new UserActionNotification(array_merge($data, [
                'id' => $id,
                'image' => !empty($image) ? asset($image) : '',
                'icon' => $status->icon(),
                'color' => $status->color(),
            ]), $email, $corp);
    }
}
