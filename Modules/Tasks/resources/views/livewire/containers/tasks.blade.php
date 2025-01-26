<section>

    <x-dashboard.headline :title="trans('sidebar.tasks')" />

    <x-dashboard.tables.table1
        :columns="$columns">

        <x-slot:actions>
            <a href="#!" data-bs-toggle="modal" data-bs-target="#task-approval-rejection-container" class="btn btn-warning mx-2 btn-sm ">
                    <span class="tf-icons bx bx-task"></span>
                    <span>حالات المهام</span>
                </a>
                @hasPermission('task.create')
                <a href="#!" wire:click="$dispatch('open-modal', {target:'#task-action'})" class="btn btn-primary ms-2 me-4 btn-sm ">
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
                @if(($admin || $task->userTaskCompleted) && !$task->done)
                <x-dashboard.badge wire:click="switchStatus({{$task}})" :color="$task->status->color() . ' cursor-pointer'">
                    {{ $task->status->label() }}
                </x-dashboard.badge>
                @else
                <x-dashboard.badge :color="$task->status->color() . ' cursor-pointer'">
                    {{ $task->status->label() }}
                </x-dashboard.badge>
                @endif
            </td>

            @if($admin)
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

            <td class="text-primary">{{ $task->completed?->format('m d / H:i') ?? '-' }}</td>
            @endif

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
