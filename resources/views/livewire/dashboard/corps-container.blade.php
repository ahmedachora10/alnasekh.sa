<section>
    <x-dashboard.headline :title="trans('sidebar.corps')" description="قسم للتعامل مع المنشأت وفروعها" />

    <x-dashboard.tables.table1 :createAction="route('corps.create')" :columns="['name', 'administrator name', 'email', 'phone', 'start date', 'end date', 'has branches']">

        @forelse ($corps as $corp)
            <tr>
                <td>{{ $corp->id }}</td>
                <td>{{ $corp->name }}</td>
                <td>{{ $corp->administrator_name }}</td>
                <td>
                    <x-dashboard.badge color="primary">
                        {{ $corp->email }}
                    </x-dashboard.badge>
                </td>

                <td>
                    <x-dashboard.badge color="info">
                        {{ $corp->phone }}
                    </x-dashboard.badge>
                </td>

                <td>{{ $corp->start_date->format('Y-m-d') }}</td>
                <td>{{ $corp->end_date->format('Y-m-d') }}</td>

                <td>
                    <x-dashboard.badge :color="$corp->has_branches->color()">
                        {{ $corp->has_branches->name() }}
                    </x-dashboard.badge>
                </td>

                <td>
                    <x-dashboard.actions.container>
                        <a href="{{ route('corps.show', $corp->id) }}" class="dropdown-item"> <i
                                class="bx bx-show me-1"></i>
                            عرض</a>
                        <x-dashboard.actions.edit
                            :href="route('corps.edit', $corp->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('corps.destroy', $corp)" />
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
        {{ $corps->links() }}
    </div>

</section>
