<?php

namespace App\Exports;

use App\Models\UserModel;
use App\Traits\Exports\RTLDirection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UsersExport implements FromCollection, WithEvents, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting
{
    use RTLDirection;

    public function collection()
    {
        return UserModel::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'الاسم',
            'البريد الالكتروني',
            'رقم الهاتف',
            'كلمة السر',
            'يمكن حدفه؟',
            'Device udid',
            'تاريخ الاضافة'
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->name,
            $item->email,
            $item->phone_number,
            $item->password,
            $item->can_deleted,
            $item->device_udid,
            $item->created_at,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}