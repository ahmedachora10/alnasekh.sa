<?php

namespace App\Exports;

use App\Exports\Sheets\SubscriptionsExport;
use App\Models\Corp;
use App\Traits\Exports\RTLDirection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CorpsExport implements FromQuery, WithHeadings, WithEvents, ShouldAutoSize, WithColumnFormatting, WithMapping
{

    public function __construct(protected ?int $corpId = null) {}

    use Exportable, RTLDirection;

    public function query()
    {
        return Corp::select(['id', 'name', 'administrator_name', 'phone', 'email', 'commercial_registration_number', 'start_date', 'end_date', 'created_at'])
        ->with('user')
        ->when($this->corpId !== null, function ($query) {
            $query->where('id', $this->corpId);
        });
    }

    public function headings(): array
    {
        return [
            '#',
            'اسم المنشأة',
            'الموظف',
            'اسم العميل',
            'الهاتف',
            'البريد الالكتروني',
            'رقم السجل التجاري',
            'تاريخ الاصدار',
            'تاريخ النهاية',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_NUMBER,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_NUMBER,
            'H' => NumberFormat::FORMAT_DATE_DATETIME,
            'I' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function map($corp): array
    {
        return [
            $corp->id,
            $corp->name,
            $corp->user?->name,
            $corp->administrator_name,
            $corp->phone,
            $corp->email,
            $corp->commercial_registration_number,
            $corp->start_date->format('Y-m-d'),
            $corp->end_date->format('Y-m-d'),
        ];
    }
}