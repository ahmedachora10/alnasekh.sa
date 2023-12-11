<?php

namespace App\Exports\Sheets;

use App\Models\EmployeeHealthCardPaper;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class HealthCardPapersExport  implements FromQuery, WithMapping, WithTitle, ShouldAutoSize, WithEvents, WithHeadings
{
    use RTLDirection;
    public function __construct(protected array $employeesIds = []) {}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return EmployeeHealthCardPaper::with('employee.branch.corp')->whereIn('branch_employee_id', $this->employeesIds);
    }

    public function map($item): array
    {
        return [
            $item->employee?->branch?->corp?->name,
            $item->employee?->branch?->name,
            $item->employee?->name,
            $item->certificate_number,
            $item->start_date->format('Y-m-d'),
            $item->end_date->format('Y-m-d'),
        ];
    }

    public function headings(): array
    {
        return [
            'المنشأة',
            'الفرع',
            'الموظف',
            'رقم الرخصة',
            'تاريخ الاصدار',
            'تاريخ نهاية',
        ];
    }

    public function title(): string
    {
        return date('Y-m-d-H-i-s').'-health-card-papers';
    }
}