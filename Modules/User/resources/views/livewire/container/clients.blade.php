<section>
    <x-dashboard.tables.table1 :columns="['name', 'email', 'created at']">

        <x-slot:actions>
            @hasPermission('client.create')
            <a href="{{ route('clients.create') }}" class="btn btn-primary mx-4 btn-sm ">
                <span class="tf-icons bx bx-plus"></span>
                <span>{{ trans('common.create') }}</span>
            </a>
            @endhasPermission
        </x-slot:actions>

        <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title>

        @forelse ($clients as $user)
        <tr wire:loading.class="opacity-50">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>

            <td>
                <x-dashboard.actions.container>
                    @hasPermission('client.wallet')
                    <a href="#!" class="dropdown-item" wire:click="$dispatch('open-wallet', { user: {{$user}}})">
                        <i class="bx bx-wallet me-1"></i>
                        {{trans('common.wallet')}}
                    </a>
                    @endhasPermission
                    @hasPermission('client.edit')
                    <x-dashboard.actions.edit :href="route('clients.edit', $user->id)">{{ trans('common.edit') }}
                    </x-dashboard.actions.edit>
                    @endhasPermission

                    @hasPermission('client.delete')
                        <x-dashboard.actions.delete :route="route('clients.destroy', $user->id)" />
                    @endhasPermission
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
        {{ $clients->links() }}
    </div>

</section>