<?php

namespace App\Exports\PDF;

use App\Exports\PDF\Interface\PDFInterface;
use App\Models\BranchEmployee;
use App\Models\Corp;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeesPDFExport implements PDFInterface {

    public function download() {
        $data = Corp::first();

        view()->share('data',[$data]);

        $pdf = Pdf::loadView('exports.PDF.pdf', [$data]);

        return $pdf->download('pdf_file.pdf');
    }
}