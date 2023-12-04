<x-app-layout>
    {{-- <x-dashboard.headline :title="$corp->name" /> --}}

    <div class="row">

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator">
                        <div class="row gy-4 gy-sm-1">
                            <div class="col-sm-6 col-lg-6">
                                <x-dashboard.cards.card-widget :name="trans('common.branches')" :total="$corp->branches_count"
                                    icon="bx bx-git-branch" color="primary" />
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <x-dashboard.cards.card-widget :name="trans('common.employees')" :total="$corp->branches->sum('employees_count')" icon="bx bx-user-pin"
                                    color="info" :last="true" />
                                <hr class="d-none d-sm-block d-lg-none">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @if (!$corp->doesnt_has_branches)
                <div class="col-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">{{ trans('common.branches') }}</h5>
                        <div class="card-body">
                            <livewire:dashboard.branches-container :corp="$corp" theme="branches-container2" />
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-4 col-sm-6">
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
                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/12.png"
                            alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">{{ $corp->administrator_name }}</h5>
                    <span>{{ trans('common.client') }}</span>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">{{ $corp->date('start_date') }}</h4>
                            <span>{{ trans('table.columns.start date') }}</span>
                        </div>
                        <div>
                            <h4 class="mb-1">{{ $corp->date('end_date') }}</h4>
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
        </div>

    </div>
</x-app-layout>
