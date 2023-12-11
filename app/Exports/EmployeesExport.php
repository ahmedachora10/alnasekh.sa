<?php

namespace App\Exports;

use App\Exports\Helpers\CommonColumns;
use App\Exports\Sheets\MedicalInsuranceExport;
use App\Models\BranchEmployee;
use App\Models\Corp;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;

class EmployeesExport implements FromQuery, WithHeadings, WithEvents, ShouldAutoSize, WithMapping
{
    use RTLDirection, CommonColumns;

    public function __construct(protected int $corpId, public bool $all = false) {}

    public function query() {

        return BranchEmployee::with(['branch.corp', 'medicalInsurance'])
        ->when($this->all === false, function ($query) {
            $query->where('corp_branch_id', $this->corpId);
        })
        ->when($this->all === true, function ($query) {
            $query->whereIn('corp_branch_id', Corp::find($this->corpId)?->branches()->pluck('id')->toArray() ?? []);
        });
    }

    public function headings(): array
    {
        return $this->columns([
            'الاسم',
            'رقم الاقامة',
            'تاريخ اصدار الاقامة',
            'تاريخ نهاية الاقامة',
            'تاريخ بداية كرت العمل',
            'تاريخ نهاية كرت العمل',
            'تاريخ بداية العقد',
            'تاريخ نهاية العقد'
        ]);
    }

    public function map($item): array
    {
        return array_merge($this->mapCommonData($item),[
            $item->name,
            $item->resident_number,
            $item->contract_start_date,
            $item->contract_end_date,
            $item->business_card_start_date,
            $item->business_card_end_date,
            $item->start_date->format('Y-m-d'),
            $item->end_date->format('Y-m-d'),
        ]);
    }


}