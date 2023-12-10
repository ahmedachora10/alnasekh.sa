<?php

namespace App\Exports;

use App\Models\BranchRecord;
use App\Models\Corp;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecordsExport implements FromQuery, WithEvents, WithHeadings, ShouldAutoSize, WithMapping
{
    use RTLDirection;

    public function __construct(protected int $corpId) {}

    public function query()
    {
        return BranchRecord::whereIn('corp_branch_id', Corp::find($this->corpId)?->branches()->pluck('id')->toArray());
    }

    public function headings(): array
    {
        return [
            '#',
            'النوع',
            'تاريخ الاصدار',
            'تاريخ الانتهاء',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->type,
            $item->start_date->format('Y-m-d'),
            $item->end_date->format('Y-m-d'),
        ];
    }
}