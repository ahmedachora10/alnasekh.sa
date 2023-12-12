<div>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">{{ trans('common.reports') }}</h5>
            <div>
                <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave" data-bs-target="#createCorpReportModal"
                    data-bs-toggle="modal">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <x-dashboard.tables.table2 :columns="['ministry', 'entity', 'mission', 'date']">
            @forelse ($reports as $item)
                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        <x-dashboard.badge color="info">{{ $item->ministry }}</x-dashboard.badge>
                    </td>
                    <td>
                        <x-dashboard.badge color="primary">{{ $item->entity }}</x-dashboard.badge>
                    </td>
                    <td>
                        <span class="fw-medium lh-1">{{ $item->mission }}</span>
                    </td>
                    <td>
                        <span class="fw-medium lh-1">{{ $item->created_at->format('Y-m-d H:i:s') }}</span>
                    </td>

                    <td>
                        {{-- <x-dashboard.actions.container> --}}
                        <div class="d-flex align-items-center justify-content-start ">
                            <x-dashboard.actions.delete route="#" text="" :livewire="true"
                                wire:click="$dispatch('delete-corp-report', {report : {{ $item }}})" />
                            <x-dashboard.actions.edit href="#!" data-bs-target="#createCorpReportModal"
                                data-bs-toggle="modal"
                                wire:click="$dispatch('edit-corp-report', {report : {{ $item }}})"></x-dashboard.actions.edit>
                        </div>
                        {{-- </x-dashboard.actions.container> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">{{ trans('table.empty') }}</td>
                </tr>
            @endforelse
        </x-dashboard.tables.table2>

        {{ $reports->links() }}
    </div>
</div>
