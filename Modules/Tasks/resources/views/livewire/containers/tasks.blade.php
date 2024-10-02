<section>

    <x-dashboard.headline :title="trans('sidebar.tasks')" />

    <x-dashboard.tables.table1
        :columns="['name', 'employee', 'status', 'due date']">

        <x-slot:actions>
                @hasPermission('task.create')
                <a href="#!" wire:click="$dispatch('open-modal', {target:'#task-action'})" class="btn btn-primary mx-4 btn-sm ">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </a>
                @endhasPermission
        </x-slot:actions>

        @forelse ($tasks as $task)
        <tr wire:loading.class="opacity-50">
            <td>
                {{ $loop->iteration }}
            </td>
            <td>{{ $task->name }}</td>
            <td>
                @if ($employee = $task->employee)
                <a href="{{ route('users.show', $employee) }}" class="text-danger" target="_blank">
                    <i class="bx bx-link-external position-relative" style="font-size: 16px; top:-1.5px"></i>
                    <span>{{ $employee->name }}</span>
                </a>
                @else
                -
                @endif
            </td>
            <td>
                <x-dashboard.badge wire:click="switchStatus({{$task}})" :color="$task->status->color() . ' cursor-pointer'">
                    {{ $task->status->label() }}
                </x-dashboard.badge>
            </td>
            <td>{{ $task->due_date?->format('Y-m-d') ?? '-' }}</td>

            <td>

                @hasPermission('task.user.assign|task.edit|task.delete')
                <x-dashboard.actions.container>
                    @hasPermission('task.user.assign')
                    <a href="#!" class="dropdown-item text-info" wire:click="openAssignUserModal({{$task}})">
                        <i class="bx bx-user-plus me-1"></i>تعيين موظف</a>
                    @endhasPermission
                    @hasPermission('task.edit')
                    <x-dashboard.actions.edit href="#!" wire:click="$dispatch('edit-task-action', {task: {{$task}}})">{{ trans('common.edit') }}
                    </x-dashboard.actions.edit>
                    @endhasPermission
                    @hasPermission('task.delete')
                    <x-dashboard.actions.delete wire:click="$dispatch('delete-task-action', {task: {{$task}}})" :livewire="true" />
                    @endhasPermission
                </x-dashboard.actions.container>
                @endhasPermission
            </td>
        </tr>
        @empty
        <tr>
            <td>{{ trans('table.empty') }}</td>
        </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</section>
