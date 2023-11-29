<section>

    <x-dashboard.headline :title="trans('sidebar.registries')" />

    <x-dashboard.tables.table1 :createAction="route('registries.create')" :columns="['name']">

        @forelse ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit
                            :href="route('registries.edit', $item->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('registries.destroy', $item)" />
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
        {{ $data->links() }}
    </div>

</section>
