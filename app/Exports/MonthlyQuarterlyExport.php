<?php

namespace App\Exports;

use App\Models\Corp;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MonthlyQuarterlyExport implements FromQuery, WithEvents, WithHeadings, ShouldAutoSize, WithMapping
{
    use RTLDirection;

    public function __construct(
        public int $corpId
    ) {}

    public function query()
    {
        return CorpBranchMonthlyQuarterlyUpdate::with(['monthlyQuarterlyUpdate'])
        ->whereIn('corp_branch_id', Corp::find($this->corpId)?->branches()->pluck('id')->toArray());
    }

    public function headings(): array
    {
        return [
            '#',
            'الجهة',
            'المهمة',
            'التاريخ',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item?->monthlyQuarterlyUpdate->entity_name,
            $item?->monthlyQuarterlyUpdate->mission,
            now()->parse($item->date)->format('Y-m-d'),
        ];
    }
}