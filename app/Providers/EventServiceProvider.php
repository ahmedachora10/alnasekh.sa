<?php

namespace App\Providers;

use App\Models\BranchCertificate;
use App\Models\BranchCivilDefenseCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\CorpBranchRegistry;
use App\Models\EmployeeHealthCardPaper;
use App\Models\EmployeeMedicalInsurance;
use App\Models\MonthlyQuarterlyUpdate;
use App\Models\Role;
use App\Observers\ActivityLogsObserver;
use App\Observers\DeleteNotificationObserver;
use App\Observers\RoleObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        Role::class => [RoleObserver::class],
        Corp::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        BranchSubscription::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        BranchEmployee::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        BranchRecord::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        BranchRecord::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        BranchCertificate::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        BranchCivilDefenseCertificate::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        EmployeeMedicalInsurance::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        EmployeeHealthCardPaper::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        EmployeeHealthCardPaper::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
        CorpBranchRegistry::class => [DeleteNotificationObserver::class, ActivityLogsObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
