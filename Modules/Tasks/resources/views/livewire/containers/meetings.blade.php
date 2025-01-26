<section>

    <x-dashboard.headline :title="trans('sidebar.meetings')" />

    <x-dashboard.tables.table1
        :columns="['title', 'description', 'date']">

        <x-slot:actions>
                @hasPermission('task.create')
                <a href="#!" wire:click="$dispatch('open-modal', {target:'#meeting-action'})" class="btn btn-primary mx-4 btn-sm ">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </a>
                @endhasPermission

        </x-slot:actions>

        @forelse ($meetings as $meeting)
        <tr wire:loading.class="opacity-50">
            <td>
                {{ $loop->iteration }}
            </td>
            <td>{{ $meeting->title }}</td>
            <td>{{ $meeting->description }}</td>

            <td class="text-primary">{{ $meeting->date?->format('m d / H:i') ?? '-' }}</td>

            <td>
                @if(auth()->id() === $meeting->created_by)
                @hasPermission('task.user.assign|task.edit|task.delete')
                <x-dashboard.actions.container>
                    {{-- @hasPermission('task.user.assign')
                    <a href="#!" class="dropdown-item text-info" wire:click="openAssignUserModal({{$meeting}})">
                        <i class="bx bx-user-plus me-1"></i>تعيين موظف</a>
                    @endhasPermission --}}
                    @hasPermission('task.edit')
                    <x-dashboard.actions.edit href="#!" wire:click="$dispatch('edit-meeting-action', {meeting: {{$meeting}}})">{{ trans('common.edit') }}
                    </x-dashboard.actions.edit>
                    @endhasPermission
                    @hasPermission('task.delete')
                    <x-dashboard.actions.delete wire:click="$dispatch('delete-meeting-action', {meeting: {{$meeting}}})" :livewire="true" />
                    @endhasPermission
                </x-dashboard.actions.container>
                @endhasPermission
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td>{{ trans('table.empty') }}</td>
        </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4">
        {{ $meetings->links() }}
    </div>
</section>
