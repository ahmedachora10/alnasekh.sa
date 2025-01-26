<x-app-layout>
    <livewire:tasks::containers.meetings />
    <x-dashboard.modals.modal1 id="meeting-action">
        <livewire:tasks::actions.meeting-action />
    </x-dashboard.modals.modal1>

    @push('component-styles')
        <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('component-scripts')
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    @endpush
</x-app-layout>
