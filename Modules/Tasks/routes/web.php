<?php

use Illuminate\Support\Facades\Route;
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
