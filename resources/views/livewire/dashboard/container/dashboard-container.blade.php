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
                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                        <div class="card-information me-2">
                                            <i class="bx bx-file fs-2 mb-2"></i>
                                            <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                            </div>
                                            <small class="card-number mt-2">
                                                {{ trans('common.start at') }}
                                                {{ $branch->record->start_date->format('d/m/Y') }}
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
                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                        <div class="card-information me-2">
                                            <i class="bx bx-file fs-2 mb-2"></i>
                                            <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                {{-- <h6 class="mb-0 me-2">{{ trans('table.columns.certificate number') }}</h6> --}}
                                                <span class="badge bg-label-primary">{{ trans('common.number') }} :
                                                    {{ $branch->certificate->certificate_number }}</span>
                                            </div>
                                            <small class="card-number mt-2">
                                                {{ trans('common.start at') }}
                                                {{ $branch->certificate->start_date->format('d/m/Y') }}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-12 col-sm-12 mb-3">
                <div class="card">
                    <h5 class="card-header">{{ trans('sidebar.monthly quarterly updates') }}</h5>
                    <div class="card-body">
                        <div class="added-cards">
                            @forelse ($branch->monthlyQuarterlyUpdates as $item)
                                <div
                                    class="cardMaster bg-lighter rounded-2 p-3 mb-3 border border-{{ status_handler($item->updates->date)?->color() }}">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                        <div class="card-information me-2">
                                            <i class="bx bx-data fs-2 mb-2"></i>
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
                                            </div>
                                            <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                {{ trans('common.expired at') }}
                                                {{ now()->parse($item->updates->date)->format('d/m/Y') }}
                                            </small>
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
                        <h5 class="card-header">{{ trans('sidebar.registries') }}</h5>
                        <div class="card-body">
                            <div class="added-cards">
                                @forelse ($branch->registries as $item)
                                    <div
                                        class="cardMaster bg-lighter rounded-2 p-3 mb-3 border border-{{ status_handler($item->registry?->end_date)?->color() }}">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                                <i class="bx bx-data fs-2 mb-2"></i>
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
                                                </div>
                                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">
                                                    {{ trans('common.expired at') }}
                                                    {{ now()->parse($item->registry?->end_date)->format('d/m/Y') }}
                                                </small>
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
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="dropdown btn-pinned">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </div>
                    <div class="mx-auto mb-3">
                        <img src="https://th.bing.com/th/id/OIP.g1K70P37u_RLgGQe4Ii5RQHaHa?w=192&h=192&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                            alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">{{ $branch->corp->administrator_name }}</h5>
                    <span>{{ trans('common.client') }}</span>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">{{ $branch->corp->date('start_date') }}</h4>
                            <span>{{ trans('table.columns.start date') }}</span>
                        </div>
                        <div>
                            <h4 class="mb-1">{{ $branch->corp->date('end_date') }}</h4>
                            <span>{{ trans('table.columns.end date') }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-plus me-1"></i>Connect</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i
                                class="bx bx-envelope"></i></a>
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
            <h5 class="card-header">{{ trans('common.subscriptions') }}</h5>
            <div class="card-body">
                <div class="added-cards">
                    @forelse ($branch->subscriptions as $item)
                        <div
                            class="cardMaster bg-lighter rounded-2 p-3 mb-3 border border-{{ status_handler($item?->end_date)?->color() }}">
                            <div class="d-flex justify-content-between flex-sm-row flex-column">
                                <div class="card-information me-2">
                                    <i class="bx bx-git-branch fs-2 mb-2"></i>
                                    <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                        <h6 class="mb-0 me-2">{{ $item->subscription_type->name() }}</h6>
                                        {{-- <span class="badge bg-label-primary">Primary</span> --}}
                                    </div>
                                    <small class="card-number">
                                        {{ trans('common.start at') }}
                                        {{ $item->start_date->format('d/m/Y') }}
                                    </small>
                                </div>
                                <div class="d-flex flex-column text-start text-sm-end">
                                    <div class="d-flex justify-content-end order-sm-0 order-1 mt-sm-0 mt-3">
                                        <button class="btn btn-label-primary"
                                            wire:click="$dispatch('edit-dashboard-branch-subscription', {subscription: {{ $item }}})">{{ trans('common.edit') }}</button>
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
                            {{ trans('table.empty') }}
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
</div>
