<section>

    <x-dashboard.headline :title="trans('sidebar.activities')" />

    <x-dashboard.tables.table1 :columns="['user', 'type' ,'activity']">

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
        <tr wire:loading.class="opacity-50">
            <td>{{ $item->id }}</td>
            <td>{{ $item->user?->name }}</td>
            <td><x-dashboard.badge :color="$item->activity_type?->color()"> {{ $item->activity_type?->name() }} </x-dashboard.badge></td>
            <td>{{ $item->content }}</td>
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
