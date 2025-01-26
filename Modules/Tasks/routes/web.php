<?php

use Illuminate\Support\Facades\Route;
use Modules\Tasks\App\Http\Controllers\CalendarController;
use Modules\Tasks\App\Http\Controllers\MeetingController;
use Modules\Tasks\App\Http\Controllers\TasksController;

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

Route::resource('tasks', TasksController::class)
    ->middleware(['auth', 'permission:task.show'])
    ->only('index');

Route::resource('meetings', MeetingController::class)
    ->middleware(['auth', 'permission:task.show'])
    ->only('index');

Route::controller(CalendarController::class)
    ->middleware(['auth'])
    ->prefix('calendar')
    ->name('calendar.')
    ->group(function () {

        Route::get('/', 'index')
            ->name('index');

        Route::post('/', 'calendarEvents')
            ->name('events');

        Route::get('/{id}', 'getEventInfo')
            ->name('events.show');
    });
