<?php

namespace App\Exports;

use App\Exports\Helpers\CommonColumns;
use App\Models\Corp;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BranchesExport implements FromCollection, WithEvents, WithHeadings, ShouldAutoSize, WithMapping
{
    use RTLDirection, CommonColumns;

    public function __construct(protected Corp $corp) {}

    public function collection()
    {
        return $this->corp->branches;
    }

    public function headings(): array
    {
        return $this->columns([
            'رقم السجل',
            'العنوان'
        ]);
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->corp?->name,
            $item->name,
            $item->registration_number,
            $item->address,
        ];
    }
}
