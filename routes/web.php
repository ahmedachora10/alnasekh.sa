<?php

use App\Exports\CorpsExport;
use App\Exports\PDF\EmployeesPDFExport;
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

// Route::get('export', function () {
//     return Excel::download(new CorpsExport, 'corps.xlsx', ExcelFormat::XLSX);
// });



require __DIR__.'/auth.php';

require __DIR__.'/_dashboard.php';