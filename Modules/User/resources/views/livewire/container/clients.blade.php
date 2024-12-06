<section>
    <x-dashboard.tables.table1 :columns="['name', 'email', 'phone', 'city', 'status', 'created at']">

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

        @forelse ($clients as $client)
        <tr wire:loading.class="opacity-50">
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->city }}</td>
            <td>
                <x-dashboard.badge wire:click="switch({{$client}})" :color="$client->blocked ? 'danger' : 'primary'">
                    {{ $client->blocked_text }}
                </x-dashboard.badge>
            </td>
            <td>{{ $client->registration_at?->diffForHumans() ?? '-' }}</td>

            <td>
                <x-dashboard.actions.container>
                    @hasPermission('client.wallet')*
                    @if($client->can_use_wallet)
                        <a href="#!" class="dropdown-item" wire:click="$dispatch('open-wallet', { user: {{$client}}})">
                            <i class="bx bx-wallet me-1"></i>
                            {{trans('common.wallet')}}
                        </a>
                    @else
                    <a href="#!" class="dropdown-item text-decoration-line-through text-muted" disabled>
                        <i class="bx bx-wallet me-1 text-danger"></i>
                        {{trans('common.wallet')}}
                    </a>
                    @endif
                    @endhasPermission
                    @hasPermission('client.edit')
                    <x-dashboard.actions.edit :href="route('clients.edit', $client->id)">{{ trans('common.edit') }}
                    </x-dashboard.actions.edit>
                    @endhasPermission

                    @hasPermission('client.delete')
                        <x-dashboard.actions.delete :route="route('clients.destroy', $client->id)" />
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
