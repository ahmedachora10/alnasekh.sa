<section>

    <x-dashboard.headline :title="trans('sidebar.sliders')" />

    <x-dashboard.tables.table1 :createAction="route('sliders.create')" :columns="['image', 'title']">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        @forelse ($sliders as $item)
            <tr wire:loading.class="opacity-50">
                <td>{{ $item->id }}</td>
                <td><img src="{{ asset($item->thumbnail) }}" alt="logo" width="40" height="40"
                        class="rounded-circle"></td>
                <td>{{ $item->title ?? '-' }}</td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit
                            :href="route('sliders.edit', $item->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('sliders.destroy', $item)" />
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
        {{ $sliders->links() }}
    </div>

</section>
