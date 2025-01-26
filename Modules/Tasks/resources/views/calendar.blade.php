<x-app-layout>

    <div class="col app-calendar-content">
        <div class="card shadow-none border-0">
            <div class="card-body pb-0">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <x-dashboard.off-canvas id="show-event-details-action" headline="title" class="offcanvas-end">
        <div class="row">
            <div class="col-12 mb-3">
                <x-dashboard.label>{{ trans('table.columns.start date') }}</x-dashboard.label>
                <x-dashboard.input id="start-date" type="text" disabled />
            </div>
            <div class="col-12 mb-3">
                <x-dashboard.label>{{ trans('table.columns.end date') }}</x-dashboard.label>
                <x-dashboard.input id="end-date" type="text" disabled />
            </div>
        </div>
    </x-dashboard.off-canvas>

    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/fullcalendar.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/app-calendar.css')}}">
    @endpush
    @push('scripts')
        <script>
            var calendarEventsUri = '{{route("calendar.events")}}';
            var calendarEventDetailsUri = '{{route("calendar.events.show", "id")}}';
        </script>
        @vite('Modules/Tasks/resources/assets/js/app.js')
    @endpush
</x-app-layout>
