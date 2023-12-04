<section>

    <x-dashboard.headline :title="trans('sidebar.corps')" />

    <x-dashboard.tables.table1 :createAction="route('corps.create')" :columns="['name', 'employee', 'email', 'phone', 'start date', 'end date', 'has branches?']">

        @forelse ($corps as $corp)
            <tr>
                <td>
                    <i class="{{ status_handler($corp->end_date)?->icon() }}"></i>
                    {{ $corp->id }}
                </td>
                <td>
                    @if ($corp->doesnt_has_branches)
                        <a href="{{ route('branches.show', $corp->branches->first()) }}">{{ $corp->name }}</a>
                    @else
                        <a href="{{ route('corps.show', $corp) }}">{{ $corp->name }}</a>
                    @endif
                </td>
                <td>
                    @if ($user = $corp->user)
                        <a href="{{ route('users.show', $user) }}" class="text-danger" target="_blank">
                            <i class="bx bx-link-external position-relative" style="font-size: 16px; top:-1.5px"></i>
                            <span>{{ $user->name }}</span>
                        </a>
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
                <td>
                    <x-dashboard.badge :color="$corp->has_branches->color()">
                        {{ $corp->has_branches->name() }}
                    </x-dashboard.badge>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        @if (!$corp->doesnt_has_branches)
                            <a href="{{ route('branches.index', $corp) }}" class="dropdown-item text-primary"> <i
                                    class="bx bx-git-branch me-1"></i>{{ trans('sidebar.branches') }}</a>
                        @endif

                        @if ($corp->doesnt_has_branches)
                            <a href="{{ route('branches.show', $corp->branches->first()) }}"
                                class="dropdown-item text-primary">
                                <i class="bx bx-show me-1"></i>{{ trans('common.show') }}</a>
                        @else
                            <a href="{{ route('corps.show', $corp) }}" class="dropdown-item"> <i
                                    class="bx bx-show me-1"></i> {{ trans('common.show') }} </a>
                        @endif
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
