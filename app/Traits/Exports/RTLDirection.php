<?php

namespace App\Traits\Exports;

use Maatwebsite\Excel\Events\AfterSheet;

trait RTLDirection {
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}