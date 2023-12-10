<?php

namespace App\Exports;

use App\Models\BranchEmployee;
use App\Models\Corp;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class EmployeesExport implements FromQuery, WithHeadings, WithEvents, ShouldAutoSize
{
    use RTLDirection;

    public function __construct(protected int $corpId, public bool $all = false) {}

    public function query() {

        return BranchEmployee::query()
        ->select(
            [
                'id', 'name', 'resident_number',
                'contract_start_date', 'contract_end_date',
                'business_card_start_date', 'business_card_end_date',
                'start_date', 'end_date',
            ]
        )
        ->when($this->all === false, function ($query) {
            $query->where('corp_branch_id', $this->corpId);
        })
        ->when($this->all === true, function ($query) {
            $query->whereIn('corp_branch_id', Corp::find($this->corpId)?->branches()->pluck('id')->toArray() ?? []);
        });
    }

    public function headings(): array
    {
        return [
            '#',
            'الاسم',
            'رقم الاقامة',
            'تاريخ اصدار الاقامة',
            'تاريخ نهاية الاقامة',
            'تاريخ بداية كرت العمل',
            'تاريخ نهاية كرت العمل',
            'تاريخ بداية العقد',
            'تاريخ نهاية العقد'
        ];
    }


}
