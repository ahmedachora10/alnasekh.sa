<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\ClientController;
use Modules\User\App\Http\Controllers\UserController;

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

Route::group([], function () {
    Route::resource('user', UserController::class)->names('user');
});

Route::middleware(['auth'])
    ->group(function () {
        Route::resource('clients', ClientController::class)->names('clients');
    });