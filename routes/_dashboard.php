<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CorpController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MonthlyQuarterlyUpdateController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Livewire\Dashboard\Branch\StoreCertificate;
use App\Livewire\Dashboard\Branch\StoreRecord;
use App\Livewire\Dashboard\Branch\StoreSubscription;
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

    // Route::controller(MediaController::class)
    // ->prefix('images')->name('images.')
    // ->group(function ()
    // {
    //     Route::get('/', 'index')->name('index');
    //     Route::post('/', 'store')->name('store');
    // });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('verified')->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class)->only('index', 'destroy');

    Route::resource('corps', CorpController::class)->parameter('corps', 'corp');

    Route::resource('monthly-quarterly-update', MonthlyQuarterlyUpdateController::class)
    ->parameter('monthly_quarterly_update', 'monthlyQuarterlyUpdate')->except('show');

    Route::controller(BranchController::class)
    ->prefix('corp/branches')->name('branches.')
    ->group(function () {
        Route::get('{corp}', 'index')->name('index');
    });

    Route::get('copr/branches/record/{branch}', StoreRecord::class)->name('branches.record.store');
    Route::get('copr/branches/certificate/{branch}', StoreCertificate::class)->name('branches.certificate.store');
    Route::get('copr/branches/subscription/{branch}', StoreSubscription::class)->name('branches.subscription.store');
});




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });