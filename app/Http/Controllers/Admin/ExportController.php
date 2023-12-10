<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmployeesExport;
use App\Http\Controllers\Controller;
use App\Models\Corp;
use App\Models\CorpBranch;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function corps() {
        $data = Corp::all();
        return view('exports.pdf.corps', compact('data'));
    }

    public function employees(Corp $corp) {

        $data = [];
        foreach($corp->branches as $branch) {
            foreach ($branch->employees as $emp) {
                $data[] = $emp;
            }
        }

        return view('exports.pdf.employees', compact('data'));
    }

    public function monthlyQuarterlyMonthly(Corp $corp) {

        $data = [];
        foreach($corp->branches as $branch) {
            if($branch->monthlyQuarterlyUpdates === null) continue;
            foreach ($branch->monthlyQuarterlyUpdates as $emp) {
                $data[] = $emp;
            }
        }

        return view('exports.pdf.monthly-quarterly-updates', compact('data'));
    }
}
