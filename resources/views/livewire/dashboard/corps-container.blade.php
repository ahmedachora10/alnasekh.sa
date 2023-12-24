<section>

    <x-dashboard.headline :title="trans('sidebar.corps')" />

    <x-dashboard.tables.table1 :columns="['', 'image', 'name', 'employee', 'email', 'phone', 'start date', 'end date', 'has branches?']">
        <x:slot:title>
            <div class="d-flex">
                <select wire:model.change="numberOfRows" class="form-control w-auto me-2">
                    @foreach ($numberOfRowsArray as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>

                <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                    placeholder="{{ trans('table.columns.search') }}" />
            </div>
        </x:slot:title>
        <x-slot:actions>
            {{-- <livewire:exports.export-button type='corps' /> --}}

            <div>
                <button data-bs-toggle="modal" data-bs-target="#ExportModal" class="btn btn-secondary btn-sm ">
                    <span class="tf-icons bx bx-cloud-download me-1"></span>
                    <span>{{ trans('common.export') }}</span>
                </button>

                <a href="{{ route('corps.create') }}" class="btn btn-primary mx-4 btn-sm ">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </a>
            </div>

        </x-slot:actions>
        @forelse ($corps as $corp)
            <tr wire:loading.class="opacity-50">
                <td>
                    {{-- <i class="{{ status_handler($corp->end_date)?->icon() }}"></i> --}}
                    {{ $loop->iteration }}
                </td>
                <td>
                    <span class="ms-3 badge badge-dot bg-{{ status_handler($corp->end_date)?->color() }}"></span>
                </td>
                <td>
                    <img src="{{ asset($corp->thumbnail) }}" alt="image" width="30" height="30"
                        class=" rounded-circle">
                </td>
                <td>
                    @if ($corp->doesnt_has_branches)
                        <a href="{{ route('branches.show', $corp->branches?->first()) }}">{{ $corp->name }}</a>
                    @else
                        <a href="{{ route('corps.show', $corp) }}">{{ $corp->name }}</a>
                    @endif
                </td>
                <td>
                    @if ($user = $corp->user)
                        <a href="{{ route('users.show', $user) }}" class="text-danger" target="_blank">
                            <i class="bx bx-link-external position-relative" style="font-size: 16px; top:-1.5px"></i>
                            <span>{{ $user->name }}</span>
                        </a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    <x-dashboard.badge color="primary">
                        {{ $corp->email }}
                    </x-dashboard.badge>
                </td>
                <td>
                    <x-dashboard.badge color="info phone-number">
                        {{ $corp->phone }}
                    </x-dashboard.badge>
                </td>
                <td>{{ $corp->start_date->format('Y-m-d') }}</td>
                <td>{{ $corp->end_date->format('Y-m-d') }}</td>
                <td>
                    <x-dashboard.badge :color="$corp->has_branches->color()">
                        {{ $corp->has_branches->name() }}
                    </x-dashboard.badge>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        @if (!$corp->doesnt_has_branches)
                            <a href="{{ route('branches.index', $corp) }}" class="dropdown-item text-primary"> <i
                                    class="bx bx-git-branch me-1"></i>{{ trans('sidebar.branches') }}</a>
                        @endif

                        @if ($corp->doesnt_has_branches)
                            <a href="{{ route('branches.show', $corp->branches?->first()) }}"
                                class="dropdown-item text-primary">
                                <i class="bx bx-show me-1"></i>{{ trans('common.show') }}</a>
                            @php
                                $steps = stepsChecker($corp->branch);
                            @endphp
                            <a class="dropdown-item text-{{ $steps['link'] === '#' ? 'secondary disabled' : 'danger' }}"
                                target="_blank" href="{{ $steps['link'] }}">
                                <i class="bx bx-link-external position-relative" style="font-size: 15px"></i>
                                {{ $steps['text'] }}
                            </a>
                        @else
                            <a href="{{ route('corps.show', $corp) }}" class="dropdown-item"> <i
                                    class="bx bx-show me-1"></i> {{ trans('common.show') }} </a>
                        @endif
                        <a href="#!" wire:click="export({{ $corp }})" class="dropdown-item"> <i
                                class="bx bx-cloud-download me-1"></i>
                            {{ trans('common.export') }}
                        </a>
                        <x-dashboard.actions.edit
                            :href="route('corps.edit', $corp->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('corps.destroy', $corp)" />
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
        {{ $corps->links() }}
    </div>


    <x-dashboard.modals.modal1 id="ExportHasBranchesBranchModal">
        <div class="row overflow-visible g-0">
            <div class="col-6">
                <div
                    class="form-check custom-option custom-option-icon border-right-0 border-top-0 border-bottom-0  border-left">
                    <a href="#!" data-bs-target="#PrintHasBranchesModal" data-bs-toggle="modal"
                        class="form-check-label custom-option-content" for="customRadioIcon1">
                        <span class="custom-option-body">
                            <i class="bx bx-printer fs-1 text-secondary"></i>
                            <span class="custom-option-title">{{ trans('common.print') }}</span>

                        </span>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div
                    class="form-check custom-option custom-option-icon border-right-0 border-top-0 border-bottom-0  border-left">
                    <a href="#!" data-bs-target="#ExportExcelHasBanchesModal" data-bs-toggle="modal"
                        target="_blank" class="form-check-label custom-option-content" for="customRadioIcon1">
                        <span class="custom-option-body">
                            <i class="bx bx-cloud-download fs-1 text-secondary"></i>
                            <span class="custom-option-title">{{ trans('common.export') }}</span>

                        </span>
                    </a>
                </div>
            </div>
        </div>
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="ExportDoesntHasBanchesModal">
        <div class="row overflow-visible g-0">
            <div class="col-6">
                <div
                    class="form-check custom-option custom-option-icon border-right-0 border-top-0 border-bottom-0  border-left">
                    <a href="#!" data-bs-target="#PrintDoesntHasBanchesModal" data-bs-toggle="modal"
                        class="form-check-label custom-option-content" for="customRadioIcon1">
                        <span class="custom-option-body">
                            <i class="bx bx-printer fs-1 text-secondary"></i>
                            <span class="custom-option-title">{{ trans('common.print') }}</span>

                        </span>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div
                    class="form-check custom-option custom-option-icon border-right-0 border-top-0 border-bottom-0  border-left">
                    <a href="#!" data-bs-target="#ExportExcelDoesntHasBanchesModal" data-bs-toggle="modal"
                        target="_blank" class="form-check-label custom-option-content" for="customRadioIcon1">
                        <span class="custom-option-body">
                            <i class="bx bx-cloud-download fs-1 text-secondary"></i>
                            <span class="custom-option-title">{{ trans('common.export') }}</span>

                        </span>
                    </a>
                </div>
            </div>
        </div>
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="ExportModal">
        <div class="row overflow-visible g-0">
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.print')" type="corps"
                icon="bx bx-file" />
            <livewire:exports.export-button type="corps" />
        </div>
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="PrintHasBranchesModal">
        <div class="row overflow-visible g-0">
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.corp details')" type="corp"
                icon="bx bx-file" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.branches')" type="all-branches"
                icon="bx bx-file-blank" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.employees')"
                type="all-employees" icon="fas fa-users fs-2 mb-2 text-secondary" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.monthly and quarterly updates')"
                type="all-monthly-quarterly-updates" icon="bx bx-file" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.subscriptions')"
                type="all-subscriptions" icon="bx bx-file" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.records')" type="all-records"
                icon="bx bx-file-blank" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.certificates')"
                type="all-certificates" icon="bx bx-file-blank" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.reports')" type="reports"
                icon="bx bx-file-blank" style="border-top" />
        </div>
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="PrintDoesntHasBanchesModal">
        <div class="row overflow-visible g-0">
            <livewire:exports.export-button fileType="excel" :corp="$corpModel" :title="trans('common.corp details')" type="corp"
                icon="bx bx-file" />
            <livewire:exports.export-button fileType="excel" :corp="$corpModel" :title="trans('common.employees')"
                type="all-employees" icon="fas fa-users" />

            <livewire:exports.export-button fileType="excel" :corp="$corpModel" :title="trans('common.monthly and quarterly updates')"
                type="all-monthly-quarterly-updates" icon="bx bx-file" style="border-top" />

            <livewire:exports.export-button fileType="excel" :corp="$corpModel" :title="trans('common.subscriptions')"
                type="all-subscriptions" icon="bx bx-file" style="border-top" />

            <livewire:exports.export-button fileType="excel" :corp="$corpModel" :title="trans('common.registries')"
                type="all-registries" icon="bx bx-file-blank" style="border-top" />

            <livewire:exports.export-button :corp="$corpModel" fileType="excel" :title="trans('common.reports')" type="reports"
                icon="bx bx-file" style="border-top" />
        </div>
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="ExportExcelHasBanchesModal">
        <div class="row overflow-visible g-0">
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.corp details')" type="corp" icon="bx bx-file" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.branches')" type="all-branches"
                icon="bx bx-file-blank" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.employees')" type="all-employees"
                icon="fas fa-users" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.monthly and quarterly updates')" type="all-monthly-quarterly-updates"
                icon="bx bx-file" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.subscriptions')" type="all-subscriptions"
                icon="bx bx-file" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.records')" type="all-records"
                icon="bx bx-file-blank" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.certificates')" type="all-certificates"
                icon="bx bx-file-blank" style="border-top" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.reports')" type="reports" icon="bx bx-file"
                style="border-top" />
        </div>
    </x-dashboard.modals.modal1>


    <x-dashboard.modals.modal1 id="ExportExcelDoesntHasBanchesModal">
        <div class="row overflow-visible g-0">
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.corp details')" type="corp" icon="bx bx-file" />
            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.employees')" type="all-employees"
                icon="fas fa-users" />

            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.monthly and quarterly updates')" type="all-monthly-quarterly-updates"
                icon="bx bx-file" style="border-top" />

            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.subscriptions')" type="all-subscriptions"
                icon="bx bx-file" style="border-top" />

            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.registries')" type="all-registries"
                icon="bx bx-file-blank" style="border-top" />

            <livewire:exports.export-button :corp="$corpModel" :title="trans('common.reports')" type="reports" icon="bx bx-file"
                style="border-top" />
        </div>
    </x-dashboard.modals.modal1>
</section>
