<section>
    <x-dashboard.tables.table1 title="sidebar.users" :createAction="route('users.create')" :columns="['image', 'name', 'email', 'role', 'created at']">

        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><img src="{{ asset($user->thumbnail) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @forelse ($user->roles as $role)
                        <span class="fw-bold badge bg-label-primary">
                            {{ $role->display_name }}
                        </span>
                    @empty
                        -
                    @endforelse
                </td>

                <td>{{ $user->created_at->diffForHumans() }}</td>

                <td>
                    <x-dashboard.actions.container>
                        <a href="{{ route('users.show', $user->id) }}" class="dropdown-item"> <i
                                class="bx bx-show me-1"></i>
                            عرض</a>
                        <x-dashboard.actions.edit
                            :href="route('users.edit', $user->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('users.destroy', $user->id)" />
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
        {{ $users->links() }}
    </div>

</section>
