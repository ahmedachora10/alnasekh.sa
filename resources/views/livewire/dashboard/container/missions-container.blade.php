<section>

    <x-dashboard.headline :title="trans('sidebar.missions')" />

    <div @class([
        'd-flex align-items-start bg-white mb-2 p-2',
        'd-none' => !$open,
    ])>
        <div class="w-100">
            <x-dashboard.input-group type="text" class="rounded-0" wire:model.defer="form.content" name="form.content"
                wire:keydown.enter="save" title="" />
        </div>
        <button class="btn btn-primary rounded-0" wire:click="save">
            {{ trans('common.save') }}
        </button>
    </div>

    <x-dashboard.tables.table1 :columns="['mission']">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        @forelse ($missions as $item)
            <tr wire:loading.class="opacity-50">
                <td>{{ $item->id }}</td>
                <td>{{ $item->content }}</td>

                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit href="#!"
                            wire:click="edit({{ $item }})">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :livewire="true" wire:click="delete({{ $item }})" />
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
        {{ $missions->links() }}
    </div>
</section>
