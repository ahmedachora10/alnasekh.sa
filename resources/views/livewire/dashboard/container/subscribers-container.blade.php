<section>

    <x-dashboard.headline :title="trans('sidebar.subscribers')" />

    <x-dashboard.tables.table1 :columns="['phone']" :withActions="false">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        @forelse ($subscribers as $item)
            <tr wire:loading.class="opacity-50">
                <td>{{ $item->id }}</td>

                <td>{{ $item->phone }}</td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4">
        {{ $subscribers->links() }}
    </div>

</section>
