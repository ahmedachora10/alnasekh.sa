<?php

namespace App\Exports;

use App\Exports\Helpers\CommonColumns;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Traits\Exports\RTLDirection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class SubscriptionsExport implements FromQuery, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    use RTLDirection, CommonColumns;

    public function __construct(protected int $corpId) {}

    public function query()
    {
        return BranchSubscription::with('branch')->whereIn('corp_branch_id', Corp::find($this->corpId)->branches()->pluck('id')->toArray());
    }

    public function headings(): array
    {
        return $this->columns([
            'نوع الرخصة',
            'النوع',
            'تاريخ الاصدار',
            'تاريخ النهاية',
            'تاريخ الانشاء'
        ]);
    }

    public function map($item): array
    {
        return array_merge($this->mapCommonData($item), [
            $item->subscription_type->name(),
            $item->type,
            $item->start_date->format('Y-m-d'),
            $item->end_date->format('Y-m-d'),
            $item->created_at->format('Y-m-d H:i:s'),
        ]);
    }

}
