<?php

namespace App\Exports;

use App\Exports\Helpers\CommonColumns;
use App\Models\CorpReport;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportsExport implements FromQuery, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    use RTLDirection;

    public function __construct(protected int $corpId) {}

    public function query()
    {
        return CorpReport::with(['corp', 'ministryModel', 'entityModel', 'missionModel'])->where('corp_id', $this->corpId);
    }

    public function headings(): array
    {
        return [
            '#',
            'المنشأة',
            'الوزارة',
            'الجهة',
            'المهمة',
            'التاريخ',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->corp?->name,
            $item->ministryModel?->name,
            $item->entityModel?->name,
            $item->missionModel?->content,
            $item->created_at?->format('Y-m-d'),
        ];
    }
}