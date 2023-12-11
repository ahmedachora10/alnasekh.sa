<?php

namespace App\Exports\Helpers;

trait CommonColumns {
    public function columns(array $arr = []) : array {
        return array_merge([
            '#',
            'المنشأة',
            'الفرع',
        ], $arr);
    }

    public function mapCommonData($item) {
        return [
            $item->id,
            $item->branch?->corp?->name,
            $item->branch?->name,
        ];
    }
}