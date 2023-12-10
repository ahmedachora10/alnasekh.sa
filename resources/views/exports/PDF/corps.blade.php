<x-export-layout>
    <x-dashboard.tables.table1 :responsive="false" :withActions="false" :withId="false" :columns="['name', 'employee', 'email', 'phone', 'start date', 'end date']">
        @forelse ($data as $corp)
            <tr>
                <td>
                    <span>{{ $corp->name }}</span>

                </td>
                <td>
                    @if ($user = $corp->user)
                        <span class="text-danger" target="_blank">
                            <span>{{ $user->name }}</span>
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td>
                    <x-dashboard.badge color="primary">
                        {{ $corp->email }}
                    </x-dashboard.badge>
                </td>
                <td>
                    <x-dashboard.badge color="info phone-number">
                        {{ $corp->phone }}
                    </x-dashboard.badge>
                </td>
                <td>{{ $corp->start_date->format('Y-m-d') }}</td>
                <td>{{ $corp->end_date->format('Y-m-d') }}</td>

            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>
</x-export-layout>
