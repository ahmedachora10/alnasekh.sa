<div>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">{{ trans('common.employees') }}</h5>
            <div>
                {{-- <a href="{{ route('export.branch.employees', $branch) }}"
                    class="btn btn-secondary  ms-2 btn-sm test-cleave">
                    <span class="tf-icons bx bx-cloud-download me-1"></span>
                    <span>{{ trans('common.export') }}</span>
                </a> --}}
                {{-- <livewire:exports.export-button :branch="$branch" type="employees" /> --}}

                <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave" data-bs-target="#branchEmployeeFormModal"
                    data-bs-toggle="modal" wire:click="$dispatch('reset-employee-form')">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <x-dashboard.tables.table2 :columns="['name', 'resident number', 'start date', 'end date', 'medical insurance', 'health card']">
            @forelse ($employees as $item)
                @php
                    $insuranceStatus = status_handler($item->medicalInsurance?->end_date);
                    $healthStatus = status_handler($item->healthCardPaper?->end_date);
                @endphp
                <tr>
                    <td>
                        <i class="{{ status_handler($item->end_date)?->icon() }}"></i>
                        {{ $item->id }}
                    </td>
                    <td>
                        <span class="fw-medium lh-1">{{ $item->name }}</span>
                    </td>
                    <td>
                        <x-dashboard.badge color="primary">{{ $item->resident_number }}</x-dashboard.badge>
                    </td>
                    <td>
                        <span class="fw-medium lh-1">{{ $item->date('start_date') }}</span>
                    </td>
                    <td>
                        <span class="fw-medium lh-1">{{ $item->date('end_date') }}</span>
                    </td>

                    <td>
                        <i class="{{ $insuranceStatus?->icon() }}" title="{{ $insuranceStatus?->name() }}"></i>
                        <x-dashboard.button
                            wire:click="$dispatch('create-update-medical-insurance', { employee: {{ $item }}})"
                            @class([
                                'btn-primary btn-sm' => $item->medicalInsurance,
                                'btn-outline-primary btn-sm' => !$item->medicalInsurance,
                            ]) :name="trans('table.columns.medical insurance')" :icon="$item->medicalInsurance ? 'bx bx-check-double' : 'bx bx-checkbox-minus'" />
                    </td>

                    <td>
                        <i class="{{ $healthStatus?->icon() }}" title="{{ $healthStatus?->name() }}"></i>
                        <x-dashboard.button
                            wire:click="$dispatch('create-update-health-card', { employee: {{ $item }}})"
                            @class([
                                'btn-warning btn-sm' => $item->healthCardPaper,
                                'btn-outline-warning btn-sm' => !$item->healthCardPaper,
                            ]) :name="trans('table.columns.health card')" :icon="$item->healthCardPaper ? 'bx bx-check-double' : 'bx bx-checkbox-minus'" />
                    </td>

                    <td>
                        {{-- <x-dashboard.actions.container> --}}
                        <div class="d-flex align-items-center justify-content-start ">
                            <x-dashboard.actions.delete route="#" text=""
                                wire:click="$dispatch('delete-employee', {employee: {{ $item }}})"
                                :livewire="true" />
                            <x-dashboard.actions.edit href="#!"
                                wire:click="$dispatch('edit-employee', {employee : {{ $item }}})"></x-dashboard.actions.edit>
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

        {{ $employees->links() }}
    </div>
</div>
