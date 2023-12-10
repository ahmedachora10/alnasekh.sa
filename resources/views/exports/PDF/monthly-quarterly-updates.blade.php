<x-export-layout>
    <h4 class="text-primary text-center">التحديثات الشهرية والربع السنوية</h4>
    <x-dashboard.tables.table1 :responsive="false" :withActions="false" :withId="false" :columns="['entity', 'mission', 'date']">
        @forelse ($data as $item)
            <tr>
                <td>
                    <span>{{ $item->entity_name }}</span>

                </td>
                <td>
                    {{ $item->mission }}
                </td>
                <td>
                    {{ now()->parse($item->updates->date)->format('Y-m-d') }}
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>
</x-export-layout>
