<?php

namespace App\Jobs;

use App\Enums\ActivityLogType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Enums\Status;
use App\Models\BranchCertificate;
use App\Models\BranchCivilDefenseCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Models\CorpBranch;
use App\Models\EmployeeHealthCardPaper;
use App\Models\EmployeeMedicalInsurance;
use App\Models\MonthlyQuarterlyUpdate;
use App\Models\Registry;
use App\Models\User;
use App\Notifications\UserActionNotification;
use App\Observers\ActivityLogsObserver;
use App\Services\WhatsappService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Modules\Tasks\App\DTO\TaskActionDTO;
use Modules\Tasks\App\Enums\TaskPriority;
use Modules\Tasks\App\Models\Task;
use Modules\Tasks\App\Services\TaskService;

class DateReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $notifications;
    private array $updatedNotifications = [];

    private Corp $corp;
    private CorpBranch $corpBranch;
    private BranchEmployee $employee;

    /**
     * Create a new job instance.
     */
    public function __construct() {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::transaction(function () {

            // Get all Users that have an Admin role
            $admins = User::whereHasRole('admin')->get();

            // Get all notifications
            $this->getAllNotifications();

            $corps = Corp::with(['user', 'branches' => function ($query) {
                $query->with([
                    'record',
                    'certificate',
                    'civilDefenseCertificate',
                    'subscriptions',
                    'registries',
                    'monthlyQuarterlyUpdates',
                    'employees' => function ($q) {
                        $q->with(['medicalInsurance', 'healthCardPaper']);
                    }
                ]);
            }])->where('send_reminder', 1)->get();

            $notifications = [];

            foreach ($corps as $corp) {
                if (!$this->checkItemStatusNotification($corp)) {
                    $notifications[] = $this->prepareNotificationData($corp);
                }

                $this->corp = $corp;

                $corpBranches = $corp->branches;

                foreach ($corpBranches as $branch) {

                    $this->corpBranch = $branch;

                    $record = $branch->record;

                    if ($record && !$this->checkItemStatusNotification($record)) {
                        $notifications[] = $this->prepareNotificationData($record, $corp, branch: $branch);
                    }

                    $certificate = $branch->certificate;

                    if ($certificate && !$this->checkItemStatusNotification($certificate)) {
                        $notifications[] = $this->prepareNotificationData($certificate, $corp, branch: $branch);
                    }

                    $civilDefenseCertificate = $branch->civilDefenseCertificate;

                    if ($civilDefenseCertificate && !$this->checkItemStatusNotification($civilDefenseCertificate)) {
                        $notifications[] = $this->prepareNotificationData($civilDefenseCertificate, $corp, branch: $branch);
                    }

                    $employees = $branch->employees;

                    foreach ($employees as $employee) {

                        $this->employee = $employee;

                        if ($employee && !$this->checkItemStatusNotification($employee)) {
                            $notifications[] = $this->prepareNotificationData($employee, $corp, branch: $branch);
                        }

                        if ($employee && !$this->checkItemStatusNotification($employee, 'business_card_end_date')) {
                            $notifications[] = $this->prepareNotificationData($employee, $corp, 'business_card_end_date', $branch);
                        }

                        if ($employee && !$this->checkItemStatusNotification($employee, 'contract_end_date')) {
                            $notifications[] = $this->prepareNotificationData($employee, $corp, 'contract_end_date', $branch);
                        }

                        $healthCard = $employee->healthCardPaper;

                        if ($healthCard && !$this->checkItemStatusNotification($healthCard)) {
                            $notifications[] = $this->prepareNotificationData($healthCard, $corp, branch: $branch);
                        }

                        $medicalInsurance = $employee->medicalInsurance;

                        if ($medicalInsurance && !$this->checkItemStatusNotification($medicalInsurance)) {
                            $notifications[] = $this->prepareNotificationData($medicalInsurance, $corp, branch: $branch);
                        }
                    }

                    $subscriptions = $branch->subscriptions;


                    foreach ($subscriptions as $subscription) {
                        if (!$this->checkItemStatusNotification($subscription)) {
                            $notifications[] = $this->prepareNotificationData($subscription, $corp, branch: $branch);
                        }
                    }

                    $monthlyAndQuarterlyUpdates = $branch->monthlyQuarterlyUpdates;

                    foreach ($monthlyAndQuarterlyUpdates as $item) {
                        if (!$this->checkItemStatusNotification($item->updates, 'date', MonthlyQuarterlyUpdate::class)) {
                            $notifications[] = $this->prepareNotificationData($item, $corp, 'date', $branch);
                        }
                    }

                    $registries = $branch->registries;

                    foreach ($registries as $registry) {
                        if (!$this->checkItemStatusNotification($registry->registry, className: Registry::class)) {
                            $notifications[] = $this->prepareNotificationData($registry, $corp, 'end_date', $branch);
                        }
                    }
                }
            }

            $tasks = [];
            $notifications = collect($notifications)->chunk(10);

            $notifications->each(function ($notificationChunks) use ($admins, &$tasks) {

                $notificationChunks->each(function ($notification) use ($admins, &$tasks) {

                    $corp = $notification['corp'];
                    $user = $corp->user;

                    $peraperNotification = $this->sendNotification($notification);

                    if ($admins->where('id', $user->id)->count() < 1) {
                        $user->notify($peraperNotification);
                    }

                    // Send a Whatsapp message to owner
                    // $this->sendToWhatsapp($corp, $notification['email_title']);

                    Notification::send($admins, $peraperNotification);


                    $tasks[] = (new TaskActionDTO(
                        name: $notification['title'],
                        description: $notification['email_title'] . ' - ' . $notification['content'],
                        assignedTo: $user,
                        assignedAt: now(),
                        startDate: now(),
                        endDate: now()->addMonth(),
                        priority: TaskPriority::Urgent_And_Important,
                        creator: $user,
                        relatedToCorp: true
                    ));

                    sleep(1);
                });
            });

            // Delete all existing notifications
            $this->deleteAllExistingNotifications();
            // make array empty again
            $this->updatedNotifications = [];

            // Task::insert($tasks);

            $taskService = app(TaskService::class);

            /** @var TaskActionDTO $task */
            foreach($tasks as $task)
            {
                $taskService->store($task);
                sleep(1);
            }

        });
    }
    private function prepareNotificationData($item, $parentItem = null, $columnName = 'end_date', $branch = null)
    {
        $id = $item->id;
        $columnValue = $item->{$columnName};
        $corp = $parentItem !== null ? $parentItem : $item;
        $className = get_class($item);

        if ($className === MonthlyQuarterlyUpdate::class) {
            $id = $item->updates->id;
            $columnValue = $item->updates->{$columnName};
        } elseif ($className === Registry::class) {
            $id = $item->registry->id;
            $columnValue = $item->registry->{$columnName};
        }

        $status = status_handler($columnValue);

        $this->notificationExists(item: $item, className: $className, columnName: $columnName);

        return [
            'id' => $id,
            'image' => !empty($corp->thumbnail) ? asset($corp->thumbnail) : '',
            'icon' => $status->icon(),
            'color' => $status->color(),
            'title' => $this->getNotificationTitle($item, $status->name(), $columnName), // . ' للمنشأة ' . $this->corp->name,
            'content' => $this->corp->name, //$this->($item, $columnName), //$item?->name,
            'owner' => $corp->administrator_name,
            $columnName => now()->parse($columnValue)->format('Y-m-d'),
            'model' => get_class($item),
            'link' => $this->getNotificationLink($item, $branch),
            'email_title' => $this->getEmailTitle($item, $status->name(), $columnName),
            'corp' => $corp,
        ];
    }
    private function getNotificationTitle($item, string $status, $columnName)
    {
        return match (get_class($item)) {
            Corp::class => 'المنشأة ' . $status,
            BranchRecord::class => 'السجل ' . $status,
            BranchCivilDefenseCertificate::class => 'تصريح الدفاع المدني ' . $status,
            BranchSubscription::class => 'اشتراك "' . $item->subscription_type->name() . '" ' . $status,
            BranchCertificate::class => 'الترخيص ' . $status,
            Registry::class => $item->name . ' ' . $status,
            MonthlyQuarterlyUpdate::class => 'التحديثات الشهرية والربع سنوية "' . $item->entity_name . '" ' . $status,
            BranchEmployee::class => $this->getNotificationTitleForEmployee($columnName) . ' للموظف "' . $this->employee->name . '" ' . $status,
            EmployeeMedicalInsurance::class => 'التأمين الطبي للموظف ' . $this->employee->name . '" ' . $status,
            EmployeeHealthCardPaper::class => 'الكرت الصحي للموظف "' . $this->employee->name . '" ' . $status,
            default => '',
        };
    }
    private function getPrepareContent($item, $columnName): string
    {
        return match (get_class($item)) {
            Corp::class => 'المنشأة ' . $item->name,
            BranchRecord::class => 'السجل  ' . $this->corpBranch->name,
            BranchCivilDefenseCertificate::class => 'تصريح الدفاع المدني رقم ' . $item->ministry_of_interior_number,
            BranchSubscription::class => 'اشتراك ' . $item->subscription_type->name(),
            BranchCertificate::class => 'الترخيص رقم ' . $item->certificate_number,
            Registry::class => 'الترخيص ' . $item->name,
            MonthlyQuarterlyUpdate::class => 'التحديثات الشهرية والربع سنوية ' . $item->entity_name,
            BranchEmployee::class => $this->getNotificationTitleForEmployee($columnName),
            EmployeeMedicalInsurance::class => 'التأمين الطبي',
            EmployeeHealthCardPaper::class => 'الكرت الصحي',
            default => '',
        };
    }
    private function getNotificationTitleForEmployee($columnName): string
    {
        return match ($columnName) {
            'end_date' => 'عقد الاقامة',
            'business_card_end_date' =>  'كرت العمل',
            'contract_end_date' => 'الاقامة',
        };
    }
    private function getNotificationLink($item, $branch): string
    {
        if (get_class($item) === Corp::class) {
            return route('corps.edit', $item);
        }

        return route('branches.show', $branch);
    }
    private function getEmailTitle($item, string $status, $columnName, $customValue = ''): string
    {
        return match (get_class($item)) {
            Corp::class => 'الاشتراك في منصة ' . setting('app_name') . ' ' . $status,
            BranchRecord::class => 'السجل رقم ' . $this->corpBranch->registration_number . ' ' . $status,
            BranchCivilDefenseCertificate::class => 'تصريح الدفاع المدني رقم ' . $item->ministry_of_interior_number . ' ' . $status,
            BranchSubscription::class => 'اشتراك ' . $item->subscription_type->name() . ' ' . $status,
            BranchCertificate::class => 'الترخيص رقم ' . $item->certificate_number . ' ' . $status,
            Registry::class => 'الترخيص ' . $item->name . ' رقم ' . $item->registry->registry_number ?? ' - ' . ' ' . $status,
            MonthlyQuarterlyUpdate::class => 'التحديثات الشهرية والربع سنوية  "' . $item->entity_name . '" ' . $status,
            BranchEmployee::class => $this->getNotificationTitleForEmployee($columnName) . ' للموظف ' . $item->name . ' ' . $status,
            EmployeeMedicalInsurance::class => 'التأمين الطبي للموظف ' . $this->employee?->name . ' ' . $status,
            EmployeeHealthCardPaper::class => 'الكرت الصحي للموظف ' . $this->employee?->name . ' ' . $status,
            default => '',
        };
    }
    private function sendNotification($data): UserActionNotification
    {
        $corp = $data['corp'];
        unset($data['corp']);

        return new UserActionNotification($data, $corp->email, $corp);
    }
    private function getAllNotifications(): void
    {
        $this->notifications = DB::table('notifications')->get();
    }
    private function notificationsFilter($item, $columnName, $className): bool
    {
        $className = $className !== null ? $className : get_class($item);

        return $this->notifications->filter(function ($notification) use ($item, $columnName, $className) {
            $data = json_decode($notification->data, true);
            return (isset($data['id']) && $data['id'] == $item->id) &&
                (isset($data['model']) && $data['model'] == $className) &&
                (isset($data[$columnName]) && now()->parse($data[$columnName])->format('Y-m-d') == now()->parse($item->{$columnName})->format('Y-m-d'));
        })->count() > 0;
    }
    private function getStatus($item, $columnName): bool
    {
        $status = status_handler($item->{$columnName});
        return in_array($status, [Status::DEFAULT, Status::VALID]);
    }
    private function checkItemStatusNotification($item, $columnName = 'end_date', $className = null): bool
    {
        return $this->getStatus($item, $columnName) || $this->notificationsFilter($item, $columnName, $className);
    }
    private function sendToWhatsapp(Corp $corp, string $message = '')
    {
        activity('send-whatsapp')
            ->withProperties(['custom' => ['corp_id' => $corp->id]])
            ->event(ActivityLogType::Whatsapp->value)
            ->log(ActivityLogType::Whatsapp->content($corp));

        return SendWhatsappMessages::dispatch($corp->phone, $message);
    }
    private function notificationExists(Model|Pivot $item, string $className, string $columnName): void
    {
        $notification = $this->notifications->filter(function ($notification) use ($item, $className, $columnName) {
            $data = json_decode($notification->data, true);
            return (isset($data['id']) && $data['id'] == $item->id) && (isset($data['model']) && $data['model'] == $className) && (isset($data[$columnName]) && now()->parse($data[$columnName])->format('Y-m-d') != now()->parse($item->{$columnName})->format('Y-m-d'));
        });

        if ($notification->count() > 0) {
            $notification->pluck(value: 'id')->each(fn($item) => $this->updatedNotifications[] = $item);
        }
    }

    private function deleteAllExistingNotifications(): bool
    {
        if (count($this->updatedNotifications) < 1)
            return false;

        return DB::table('notifications')->whereIn('id', $this->updatedNotifications)->delete();
    }
}