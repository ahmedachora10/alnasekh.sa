<div class="card mb-4">
    <div class="card-body text-center">
        {{-- <div class="dropdown btn-pinned">
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
                    </div> --}}
        <div class="mx-auto mb-3">
            <img src="{{ $image }}" alt="Avatar Image" class="rounded-circle w-px-100">
        </div>
        <h5 class="mb-1 card-title">{{ $name }}</h5>
        <span>{{ trans('common.client') }}</span>

        <div class="d-flex align-items-center justify-content-around my-4 py-2">
            <div>
                <h4 class="mb-1">{{ $startDate }}</h4>
                <span>{{ trans('table.columns.start date') }}</span>
            </div>
            <div>
                <h4 class="mb-1">{{ $endDate }}</h4>
                <span>{{ trans('table.columns.end date') }}</span>
            </div>
        </div>
        {{-- <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-plus me-1"></i>Connect</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i
                                class="bx bx-envelope"></i></a>
                    </div> --}}
    </div>
</div>
