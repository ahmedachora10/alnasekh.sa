<section>

    <x-dashboard.headline :title="trans('sidebar.ministries')" />

    <div @class([
        'd-flex align-items-start bg-white mb-2 p-2',
        'd-none' => !$open,
    ])>
        <div class="w-100">
            <x-dashboard.input-group type="text" class="rounded-0" wire:model.defer="form.name" name="form.name"
                wire:keydown.enter="save" title="" />
        </div>
        <button class="btn btn-primary rounded-0" wire:click="save">
            {{ trans('common.save') }}
        </button>
    </div>

    <x-dashboard.tables.table1 :columns="['name', 'entity']">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        <x-slot:actions>
            <div class="mb-3">
                <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave" wire:click="switchForm">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </button>
            </div>
        </x-slot:actions>

        @forelse ($ministries as $item)
            <tr wire:loading.class="opacity-50">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>

                <td>
                    <button class="btn btn-info btn-xs"
                        wire:click="$dispatch('entity-action', {ministryId: {{ $item->id }}})">
                        <span class="tf-icons bx bx-plus"></span>
                        <span>{{ trans('common.create') }}</span>
                    </button>
                </td>

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
        {{ $ministries->links() }}
    </div>
</section>
