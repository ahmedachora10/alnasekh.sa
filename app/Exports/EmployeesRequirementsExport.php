<?php

namespace App\Exports;

use App\Exports\Sheets\HealthCardPapersExport;
use App\Exports\Sheets\MedicalInsuranceExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeesRequirementsExport implements WithMultipleSheets
{

    public function __construct(protected int $corpId, protected bool $all = false) {}

    public function sheets(): array
    {
        $employeeExport = new EmployeesExport($this->corpId, $this->all);

        return [
            $employeeExport,
            new MedicalInsuranceExport($employeeExport->query()->get()->pluck('id')->toArray()),
            new HealthCardPapersExport($employeeExport->query()->get()->pluck('id')->toArray()),
        ];
    }
}