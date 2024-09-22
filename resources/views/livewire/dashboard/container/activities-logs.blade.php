<section>

    <x-dashboard.headline :title="trans('sidebar.reminders')" />

    <x-dashboard.tables.table1 :columns="['user', 'type' ,'activity', 'created at']">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        <x-slot:actions>
            <label class=" badge bg-warning mx-3">
                الاجمالي : {{ $activities->total() }}
            </label>
        </x-slot:actions>

        @forelse ($activities as $item)
        @php
            $type = App\Enums\ActivityLogType::tryFrom($item->event);
        @endphp
        <tr wire:loading.class="opacity-50">
            <td>{{ $item->id }}</td>
            <td><x-dashboard.badge color="secondary">{{ $item->causer?->name ?? '-' }}</x-dashboard.badge></td>
            <td><x-dashboard.badge :color="$type?->color()"> {{ $type?->name() }} </x-dashboard.badge></td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
            <td>
                <x-dashboard.actions.container>
                    <x-dashboard.actions.delete wire:click="delete({{ $item }})" :livewire="true" />
                </x-dashboard.actions.container>
            </td>
        </tr>
        @empty
        <tr>
            <td>{{ trans('table.empty') }}</td>
        </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4">
        {{ $activities->links() }}
    </div>


</section>
