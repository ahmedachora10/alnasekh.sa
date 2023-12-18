<section>

    <x-dashboard.headline :title="trans('sidebar.monthly quarterly updates')" description="قسم للتعامل مع التحديثات الشهرية والربع سنوية" />

    <x-dashboard.tables.table1 :createAction="route('monthly-quarterly-update.create')" :columns="['image', 'entity name', 'mission']">

        @forelse ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <img src="{{ asset($item->thumbnail) }}" alt="image" width="30" height="30"
                        class=" rounded-circle">
                </td>
                <td>{{ $item->entity_name }}</td>
                <td>
                    {{ $item->mission }}
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit
                            :href="route('monthly-quarterly-update.edit', $item->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('monthly-quarterly-update.destroy', $item)" />
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
