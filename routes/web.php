<?php

use App\Exports\CorpsExport;
use App\Exports\PDF\EmployeesPDFExport;
use App\Http\Controllers\HomeController;
use App\Models\Corp;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Excel as ExcelFormat;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('switch-theme', function () {
    $theme = request()->session()->get('theme', 'light');

    // Toggle between 'light' and 'dark' themes
    $newTheme = ($theme === 'light') ? 'dark' : 'light';

    // Store the new theme in the session
    request()->session()->put('theme', $newTheme);

    return redirect()->back();
})->name('switch.theme');

Route::get('mail', function () {
    return view('mails.send-reminder', ['title' => '', 'corp' => Corp::first(), 'target' => '']);
});

Route::controller(HomeController::class)
->group(function () {
    Route::get('/', 'index')->name('home');
});


require __DIR__.'/auth.php';

require __DIR__.'/_dashboard.php';