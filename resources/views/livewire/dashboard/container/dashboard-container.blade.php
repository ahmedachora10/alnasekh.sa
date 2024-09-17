<div class="row">

    <div class="col-lg-8 col-md-6">
        <div class="row">
            @if (!$branch->corp->doesnt_has_branches)
                <div class="col-lg-6 col-md-12 mb-3">
                    <div class="card border border-{{ status_handler($branch->record?->end_date)?->color() }}">
                        <h5 class="card-header">{{ trans('common.record') }}</h5>
                        <div class="card-body">
                            <div class="added-cards">
                                <div class="cardMaster bg-lighter rounded-2 p-3 mb-3">
                                    @if ($branch->record)
                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                                <i class="bx bx-file fs-2 mb-2"></i>
                                                <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                </div>
                                                <small class="card-number mt-2">
                                                    {{ trans('common.start at') }}
                                                    {{ $branch->record?->start_date->format('d/m/Y') }}
                                                </small>
                                            </div>
                                            <div class="d-flex flex-column text-start text-sm-end">
                                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3 justify-content-end">
                                                    <button class="btn btn-label-primary"
                                                        wire:click="$dispatch('edit-branch-record', {record:{{ $branch->record }}})">{{ trans('common.edit') }}</button>
                                                </div>
                                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                    {{ trans('common.expired at') }}
                                                    {{ $branch->record?->end_date->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    @else
                                        <div>{{ trans('table.empty') }} </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <div class="card border border-{{ status_handler($branch->certificate?->end_date)?->color() }}">
                        <h5 class="card-header">{{ trans('table.columns.certificate') }}</h5>
                        <div class="card-body">
                            <div class="added-cards">
                                <div class="cardMaster bg-lighter rounded-2 p-3 mb-3">
                                    @if ($branch->certificate)
                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                                <i class="bx bx-file fs-2 mb-2"></i>
                                                <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                    {{-- <h6 class="mb-0 me-2">{{ trans('table.columns.license number') }}</h6> --}}
                                                    {{-- <span class="badge bg-label-primary">{{ trans('common.number') }} : --}}
                                                    {{-- {{ $branch->certificate->certificate_number }}</span> --}}
                                                </div>
                                                <small class="card-number mt-2">
                                                    {{ trans('common.start at') }}
                                                    {{ $branch->certificate?->start_date->format('d/m/Y') }}
                                                </small>
                                            </div>
                                            <div class="d-flex flex-column text-start text-sm-end">
                                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3 justify-content-end">
                                                    <button class="btn btn-label-primary"
                                                        wire:click="$dispatch('edit-branch-certificate', {certificate:{{ $branch->certificate }}})">{{ trans('common.edit') }}</button>

                                                </div>
                                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                    {{ trans('common.expired at') }}
                                                    {{ $branch->certificate?->end_date->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    @else
                                        <div>{{ trans('table.empty') }} </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-12 col-sm-12 mb-3">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">{{ trans('sidebar.monthly quarterly updates') }}</h5>
                        <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave"
                            data-bs-target="#createMonthlyUpdatesModal" data-bs-toggle="modal">
                            <span class="tf-icons bx bx-plus"></span>
                            <span>{{ trans('common.create') }}</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="added-cards row">
                            @forelse ($branch->monthlyQuarterlyUpdates as $item)
                                <div class="col-md-6 col-12">
                                    <div
                                        class="cardMaster bg-lighter rounded-2 p-3 mb-3 border border-{{ status_handler($item->updates?->date)?->color() }}">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                                <img src="{{ asset($item->thumbnail) }}" alt="logo" width="40"
                                                    height="40" class="mb-2 rounded-circle">
                                                {{-- <i class="bx bx-data fs-2 mb-2"></i> --}}
                                                <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                    <h6 class="mb-0 me-2">{{ $item->entity_name }}</h6>
                                                    {{-- <span class="badge bg-label-primary">Primary</span> --}}
                                                </div>
                                                <small class="card-number">
                                                    {{ $item->mission }}
                                                </small>
                                            </div>
                                            <div class="d-flex flex-column text-start text-sm-end">
                                                <div
                                                    class="d-flex order-sm-0 order-1 mt-sm-0 mt-3 justify-content-end mb-3">
                                                    <button class="btn btn-label-primary"
                                                        wire:click="$dispatch('edit-branch-monthly-quarterly-update', {update:{{ $item->updates }}})">{{ trans('common.edit') }}</button>
                                                    <button class="btn" wire:confirm
                                                        wire:click="$dispatch('delete-monthly-quarterly-from-branch', {id:{{ $item->id }}})">
                                                        <i class="bx bx-trash text-danger"></i>
                                                    </button>
                                                </div>
                                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                    {{ trans('common.expired at') }}
                                                    {{ now()->parse($item->updates?->date)->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="cardMaster bg-lighter rounded-2 p-3 mb-3">
                                    {{ trans('table.empty') }}
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            @if ($branch->corp->doesnt_has_branches)
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header">{{ trans('sidebar.registries') }}</h5>
                            <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave"
                                data-bs-target="#createRegistryModal" data-bs-toggle="modal">
                                <span class="tf-icons bx bx-plus"></span>
                                <span>{{ trans('common.create') }}</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="added-cards row">
                                @forelse ($branch->registries as $item)
                                    <div class="col-md-6 col-12">
                                        <div
                                            class="cardMaster bg-lighter rounded-2 p-3 mb-3 border border-{{ status_handler($item->registry?->end_date)?->color() }}">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                <div class="card-information me-2">
                                                    {{-- <i class="bx bx-data fs-2 mb-2"></i> --}}
                                                    <img src="{{ asset($item->thumbnail) }}" alt="logo"
                                                        width="40" height="40" class="mb-2 rounded-circle">
                                                    <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                        <h6 class="mb-0 me-2">{{ $item->name }}</h6>
                                                        {{-- <span class="badge bg-label-primary">Primary</span> --}}
                                                    </div>
                                                    {{-- <small class="card-number">
                                                    {{ $item->mission }}
                                                </small> --}}
                                                </div>
                                                <div class="d-flex flex-column text-start text-sm-end">
                                                    <div
                                                        class="d-flex order-sm-0 order-1 mt-sm-0 mt-3 justify-content-end mb-3">
                                                        <button class="btn btn-label-primary"
                                                            wire:click="$dispatch('edit-branch-registry', {registry:{{ $item }}})">{{ trans('common.edit') }}</button>

                                                        <button class="btn " wire:confirm
                                                            wire:click="$dispatch('delete-branch-registry', {registry:{{ $item }}})">
                                                            <i class="bx bx-trash text-danger"></i>
                                                        </button>
                                                    </div>
                                                    <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                        {{ trans('common.expired at') }}
                                                        {{ now()->parse($item->registry?->end_date)->format('d/m/Y') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="cardMaster bg-lighter rounded-2 p-3 mb-3"> {{ trans('common.empty') }}
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-md-6">

        @if ($branch->corp->doesnt_has_branches)
            <x-dashboard.cards.user-corp-card :name="$branch->corp->administrator_name" :image="asset($branch->corp->thumbnail)" :startDate="$branch->corp->date('start_date')" :endDate="$branch->corp->date('end_date')" />
        @endif

        @if (!$branch->corp->doesnt_has_branches)
            <div class="col-md-12 mb-3">
                <div
                    class="card border border-{{ status_handler($branch->civilDefenseCertificate?->end_date)?->color() }}">
                    <h5 class="card-header">{{ trans('common.civil defense permit') }}</h5>
                    <div class="card-body">
                        <div class="added-cards">
                            <div class="cardMaster bg-lighter rounded-2 p-3 mb-3">
                                @if ($branch->civilDefenseCertificate)
                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                        <div class="card-information me-2">
                                            <i class="bx bx-file fs-2 mb-2"></i>
                                            <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                            </div>
                                            <small class="card-number mt-2">
                                                {{ trans('common.start at') }}
                                                {{ $branch->civilDefenseCertificate?->start_date->format('d/m/Y') }}
                                            </small>
                                        </div>
                                        <div class="d-flex flex-column text-start text-sm-end">
                                            <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3 justify-content-end">
                                                <button class="btn btn-label-primary"
                                                    wire:click="$dispatch('edit-branch-civil-defense-permit', {certificate:{{ $branch->civilDefenseCertificate }}})">{{ trans('common.edit') }}</button>
                                            </div>
                                            <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                {{ trans('common.expired at') }}
                                                {{ $branch->civilDefenseCertificate?->end_date->format('d/m/Y') }}
                                            </small>
                                        </div>
                                    </div>
                                @else
                                    <div>{{ trans('table.empty') }} </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!$branch->corp->doesnt_has_branches)
            <div class="mb-3">
                <x-dashboard.cards.user-info :title="trans('common.employees')" :count="$branch->employees_count" />
            </div>
        @endif

        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">{{ trans('common.subscriptions') }}</h5>
                <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave" data-bs-target="#updateSubscriptionModal"
                    data-bs-toggle="modal">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </button>
            </div>
            <div class="card-body">
                <div class="added-cards">
                    @forelse ($branch->subscriptions as $item)
                        <div
                            class="cardMaster bg-lighter rounded-2 p-3 mb-3 border border-{{ status_handler($item?->end_date)?->color() }}">
                            <div class="d-flex justify-content-between flex-sm-row flex-column">
                                <div class="card-information me-2">
                                    {{-- <i class="bx bx-git-branch fs-2 mb-2"></i> --}}
                                    <img src="{{ asset($item->subscription_type->thumbnail()) }}" alt="logo"
                                        width="40" height="40" class="mb-2 rounded-circle">
                                    <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                        <h6 class="mb-0 me-2">{{ $item->subscription_type->name() }}</h6>
                                        {{-- <span class="badge bg-label-primary">Primary</span> --}}
                                    </div>
                                    <small class="card-number">
                                        {{ trans('common.start at') }}
                                        {{ $item?->start_date->format('d/m/Y') }}
                                    </small>
                                </div>
                                <div class="d-flex flex-column text-start text-sm-end">
                                    <div class="d-flex justify-content-end order-sm-0 order-1 mt-sm-0 mt-3">
                                        <button class="btn btn-label-primary"
                                            wire:click="$dispatch('edit-dashboard-branch-subscription', {subscription: {{ $item }}})">{{ trans('common.edit') }}</button>
                                        <button class="btn" wire:confirm
                                            wire:click="$dispatch('delete-branch-subscription', {subscription:{{ $item }}})">
                                            <i class="bx bx-trash text-danger"></i>
                                        </button>
                                    </div>
                                    <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                        {{ trans('common.expired at') }}
                                        {{ $item?->end_date->format('d/m/Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="cardMaster bg-lighter rounded-2 p-3 mb-3">
                            {{ trans('table.empty') }} </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-4 mt-4">
        <livewire:dashboard.branch.update-employee :branch="$branch" />
    </div>

    <div class="col-12 mb-4 mt-4">
        <livewire:dashboard.container.reports-container :corp="$branch->corp" />
    </div>

    <div class="col-12 mb-4 mt-4">
        <livewire:dashboard.container.activities-logs :branch="$branch" />
    </div>
</div>
