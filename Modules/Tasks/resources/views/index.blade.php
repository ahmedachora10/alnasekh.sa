<x-app-layout>
    <livewire:tasks::containers.tasks />
    <x-dashboard.modals.modal1 id="assign-a-user-to-task">
        <livewire:tasks::actions.assign-user-to columnName='assigned_to' />
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="task-action">
        <livewire:tasks::actions.task-action />
    </x-dashboard.modals.modal1>
    <x-dashboard.modals.modal1 id="task-approval-rejection-container">
        <livewire:tasks::containers.tasks-approval-rejection />
    </x-dashboard.modals.modal1>
    <x-dashboard.modals.modal1 id="task-details-action">
        <livewire:tasks::actions.task-details />
    </x-dashboard.modals.modal1>
</x-app-layout>
