<?php

use Illuminate\Support\Facades\Route;
use Modules\Service\App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use Modules\Service\App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ServiceController::class)
    ->prefix('services')
    ->name('front.services.')
    ->group(function () {
        Route::get('/all', 'services')->name('index');
        Route::get('{service}/request', 'request')->name('request');
    });

Route::middleware(['auth'])
    ->group(function () {
        Route::resource('services', AdminServiceController::class);
});
