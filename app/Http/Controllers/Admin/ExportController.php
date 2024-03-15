<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BranchesExport;
use App\Exports\CertificatesExport;
use App\Exports\CorpsExport;
use App\Exports\EmployeesExport;
use App\Exports\MonthlyQuarterlyExport;
use App\Exports\RecordsExport;
use App\Exports\RegistriesExport;
use App\Exports\ReportsExport;
use App\Exports\SubscriptionsExport;
use App\Http\Controllers\Controller;
use App\Models\BranchEmployee;
use App\Models\Corp;
use App\Models\CorpBranch;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function corps(?Corp $corp) {
        $export = new CorpsExport($corp?->id);

        $data = $export->query()->get();

        $title = 'المنشأة';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function employees(Corp $corp) {

        $export = new EmployeesExport($corp->id, true);

        // $data = $export->query()->get();
        $data = BranchEmployee::with(['healthCardPaper','medicalInsurance'])
        ->whereIn('corp_branch_id', $corp->branches()->pluck('id')->toArray())
        ->get();

        $title = 'الموظفين';

        return view('exports.pdf.employees', compact('data', 'export', 'title'));
    }

    public function monthlyQuarterlyMonthly(Corp $corp) {
        $export = new MonthlyQuarterlyExport($corp->id);

        $data = $export->query()->get();

        $title = 'التحديثات الشهرية والربع السنوية';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function branches(Corp $corp) {

        $export = new BranchesExport($corp);

        $data = $export->collection();

        $title = 'الفروع';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function subscriptions(Corp $corp) {

        $export = new SubscriptionsExport($corp->id);

        $data = $export->query()->get();

        $title = 'الاشتراكات';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function certificates(Corp $corp) {

        $export = new CertificatesExport($corp->id);

        $data = $export->query()->get();

        $title = 'السجلات';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function registries(Corp $corp) {

        $export = new RegistriesExport($corp->id);

        $data = $export->query()->get();

        $title = 'الرخص';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function records(Corp $corp) {

        $export = new RecordsExport($corp->id);

        $data = $export->query()->get();

        $title = 'الرخص';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }

    public function reports(Corp $corp) {

        $export = new ReportsExport($corp->id);

        $data = $export->query()->get();

        $title = 'سجل العمليات';

        return view('exports.pdf.print_', compact('data', 'export', 'title'));
    }
}