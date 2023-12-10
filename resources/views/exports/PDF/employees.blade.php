<x-export-layout>
    <h4 class="text-primary text-center">معلومات الموظفين</h4>
    <x-dashboard.tables.table1 :responsive="false" :withActions="false" :withId="false" :columns="[
        'employee name',
        'resident number',
        'employee start date',
        'employee end date',
        'business card start date',
        'business card end date',
        'contract start date',
        'contract end date',
    ]">
        @forelse ($data as $item)
            <tr>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    {{ $item->resident_number }}
                </td>

                <td>{{ $item->start_date->format('Y-m-d') }}</td>
                <td>{{ $item->end_date->format('Y-m-d') }}</td>

                <td>{{ $item->business_card_start_date->format('Y-m-d') }}</td>
                <td>{{ $item->business_card_end_date->format('Y-m-d') }}</td>

                <td>{{ $item->contract_start_date->format('Y-m-d') }}</td>
                <td>{{ $item->contract_end_date->format('Y-m-d') }}</td>

            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>
</x-export-layout>
