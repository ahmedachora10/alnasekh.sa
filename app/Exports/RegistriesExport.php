<?php

namespace App\Exports;

use App\Exports\Helpers\CommonColumns;
use App\Models\BranchRegistry;
use App\Models\Corp;
use App\Models\CorpBranchRegistry;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistriesExport implements FromQuery, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    use RTLDirection, CommonColumns;

    public function __construct(protected int $corpId) {}

    public function query()
    {
        return CorpBranchRegistry::with('registry')->whereIn('corp_branch_id', Corp::find($this->corpId)->branches()->pluck('id')->toArray());;
    }

    public function headings(): array
    {
        return $this->columns([
            'اسم الرخصة',
            'رقم السجل التجاري',
            'رقم الرخصة',
            'تاريخ الاصدار',
            'تاريخ النهاية',
        ]);
    }

    public function map($item): array
    {
        return array_merge($this->mapCommonData($item),[
            $item->registry->name,
            $item->commercial_registration_number,
            $item->registry_number ?? '-',
            now()->parse($item->start_date)->format('Y-m-d'),
            now()->parse($item->end_date)->format('Y-m-d'),
        ]);
    }
}