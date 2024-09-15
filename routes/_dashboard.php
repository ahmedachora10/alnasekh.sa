<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CorpController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\HeadlineTranslationController;
use App\Http\Controllers\Admin\JobCityController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MonthlyQuarterlyUpdateController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Admin\OurServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\RegistryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Branch\StoreCertificate;
use App\Livewire\Dashboard\Branch\StoreCivilDefenseCertificate;
use App\Livewire\Dashboard\Branch\StoreEmployee;
use App\Livewire\Dashboard\Branch\StoreMonthlyQuarterlyUpdate;
use App\Livewire\Dashboard\Branch\StoreRecord;
use App\Livewire\Dashboard\Branch\StoreRegistry;
use App\Livewire\Dashboard\Branch\StoreSubscription;
use App\Livewire\Dashboard\Container\ActivitiesLogs;
use App\Livewire\Dashboard\Container\BranchRegistriesContainer;
use App\Livewire\Dashboard\Container\ContactUsContainer;
use App\Livewire\Dashboard\Container\EmployeesContainer;
use App\Livewire\Dashboard\Container\JobRequestsContainer;
use App\Livewire\Dashboard\Container\NotificationsContainer;
use App\Livewire\Dashboard\Container\SubscribePackageRequestsContainer;
use App\Livewire\Dashboard\Container\SubscribersContainer;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function ()
{
    Route::controller(SettingController::class)
    ->prefix('settings')->name('settings.')
    ->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::get('activities', ActivitiesLogs::class)->name('activitylogs');

    Route::get('ministries', function () {
        return view('admin.ministries');
    })->name('ministries.index');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('verified')->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class)->only('index', 'destroy');

    Route::get('corps/{branch}/rquirements', [CorpController::class, 'requirements'])->name('corps.requirements');
    Route::resource('corps', CorpController::class)->parameter('corps', 'corp');

    Route::resource('monthly-quarterly-update', MonthlyQuarterlyUpdateController::class)
    ->parameter('monthly_quarterly_update', 'monthlyQuarterlyUpdate')->except('show');

    Route::resource('registries', RegistryController::class)->except('show');

    Route::controller(BranchController::class)
    ->prefix('corp/branches')->name('branches.')
    ->group(function () {
        Route::get('{corp}', 'index')->name('index');
        Route::get('{branch}/show', 'show')->name('show');
    });

    Route::get('copr/branches/record/{branch}', StoreRecord::class)->name('branches.record.store');
    Route::get('copr/branches/certificate/{branch}', StoreCertificate::class)->name('branches.certificate.store');
    Route::get('copr/branches/civil-defense-permit/{branch}', StoreCivilDefenseCertificate::class)->name('branches.civil_defense_permit.store');
    Route::get('copr/branches/subscription/{branch}', StoreSubscription::class)->name('branches.subscription.store');
    Route::get('copr/branches/monthly-quarterly-updates/{branch}', StoreMonthlyQuarterlyUpdate::class)->name('branches.monthly-quarterly-update.store');
    Route::get('copr/branches/employees/{branch}', EmployeesContainer::class)->name('branches.employees.store');
    Route::get('copr/branches/registries/{branch}', BranchRegistriesContainer::class)->name('branches.registries.store');

    Route::controller(ExportController::class)
    ->prefix('export')
    ->name('export.')
    ->group(function () {
        Route::get('corps/{corp?}', 'corps')->name('corps.all');
        Route::get('employees/{corp}', 'employees')->name('corps.employees');
        Route::get('branches/{corp}', 'branches')->name('corps.branches');
        Route::get('monthly-quarterly-updates/{corp}', 'monthlyQuarterlyMonthly')->name('corps.monthly-quarterly-update');
        Route::get('subscriptions/{corp}', 'subscriptions')->name('corps.subscriptions');
        Route::get('records/{corp}', 'records')->name('corps.records');
        Route::get('certificates/{corp}', 'certificates')->name('corps.certificates');
        Route::get('registries/{corp}', 'registries')->name('corps.registries');
        Route::get('reports/{corp}', 'reports')->name('corps.reports');
    });

    Route::get('notifications', NotificationsContainer::class)->name('users.notifications');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('sliders', SliderController::class);
    Route::resource('our-services', OurServiceController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('our-clients', OurClientController::class);
    Route::get('subscribers', SubscribersContainer::class)->name('subscribers.index');
    Route::resource('translation', HeadlineTranslationController::class)->only(['index', 'update'])->parameter('translation', 'headlineTranslation');
    Route::get('contact-us', ContactUsContainer::class)->name('contact-us.index');
    Route::resource('statistics', StatisticController::class);
    Route::get('job-requests', JobRequestsContainer::class)->name('job-requests.index');
    Route::resource('requests/jobs', JobPostController::class);//->parameter('translation', 'headlineTranslation');
    Route::resource('job-cities', JobCityController::class);
    Route::resource('reviews', ReviewController::class)->only(['index', 'destroy']);
    Route::resource('services', ServiceController::class);
    Route::get('subscribe-package-requests', SubscribePackageRequestsContainer::class)->name('packages.requests');
});
