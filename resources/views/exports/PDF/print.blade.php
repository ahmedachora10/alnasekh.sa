<x-export-layout>
    @if ($title !== '')
        <h4 class="text-primary text-center">{{ $title }}</h4>
    @endif
    <x-dashboard.tables.table1 :responsive="false" :withActions="false" :withId="false" :translate="false"
        :columns="$export->headings()">
        @forelse ($data as $item)
            <tr>
                @foreach ($export->map($item) as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>
</x-export-layout>
