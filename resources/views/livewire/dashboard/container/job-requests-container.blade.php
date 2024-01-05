<section>

    <x-dashboard.headline :title="trans('sidebar.job requests')" />

    <x-dashboard.tables.table1 :columns="[
        'name',
        'email',
        'phone',
        'age',
        'specialization',
        'years of experience',
        'excerpt',
        'job',
        'job city',
        'cv',
    ]">

        <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title>

        @forelse ($jobRequests as $item)
            <tr wire:loading.class="opacity-50">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->age }}</td>
                <td>{{ $item->specialization }}</td>
                <td>{{ $item->years_of_experience }}</td>
                <td>{{ $item->excerpt }}</td>
                <td>{{ $item->jobPost?->get_title ?? '-' }}</td>
                <td>{{ $item->jobCity?->get_title ?? '-' }}</td>

                <td>
                    <a href="{{ asset('storage/' . $item->cv) }}" class="btn btn-sm btn-primary" target="_blank">
                        <i class="bx bx-show me-1"></i>
                        {{ trans('table.columns.cv') }}
                    </a>
                </td>

                <td>
                    <x-dashboard.actions.container>
                        <a href="#" wire:click="getAttachments({{ $item }})" class="dropdown-item"> <i
                                class="bx bx-show me-1"></i> {{ trans('common.show') }} </a>
                        <x-dashboard.actions.delete wire:click="delete({{ $item }})" :livewire="true" />
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
        {{ $jobRequests->links() }}
    </div>

    <x-dashboard.modals.modal1 id="showAttachments">
        <div class="col-12 row">

            <h6 class="mb-4 text-secondary">{{ trans('table.columns.informations') }}</h6>

            <div class="row justify-content-between align-items-start">
                <div class="col-sm-5 col-12">
                    <p class="text-nowrap"><i class="bx bx-user bx-sm me-2"></i>{{ $jobRequest?->name }}</p>
                    <p class="text-nowrap"><i class="bx bx-envelope bx-sm me-2"></i>{{ $jobRequest?->email }}</p>
                    <p class="text-nowrap"><i class="bx bx-phone bx-sm me-2"></i>{{ $jobRequest?->phone }}</p>
                    <p class="text-nowrap"><i class="bx bx-customize bx-sm me-2"></i>{{ $jobRequest?->specialization }}
                    </p>
                    <p class="text-nowrap"><i
                            class="bx bx-calendar bx-sm me-2"></i>{{ $jobRequest?->years_of_experience }}
                    </p>
                </div>
                <div class="col-sm-5 col-12">
                    <p class="text-nowrap"><i class="bx bx-paragraph bx-sm me-2"></i>{{ $jobRequest?->excerpt }}</p>
                    <p class="text-nowrap"><i
                            class="bx bx-category bx-sm me-2"></i>{{ $jobRequest?->jobPost?->get_title ?? '-' }}
                    </p>
                    <p class="text-nowrap"><i class="bx bx-map bx-sm me-2"></i>{{ $jobRequest?->jobCity?->get_title }}
                    </p>
                </div>
            </div>

            <hr class="mt-3">
            <h6 class="mt-3 mb-4 text-secondary">{{ trans('table.columns.cv') }}</h6>

            <div class="form-check custom-option custom-option-basic mb-3">
                <label class="form-check-label custom-option-content" for="marketingCheckbox">
                    <span class="form-check-input">
                        <i class="bx bx-file fs-4"></i>
                    </span>
                    <span class="custom-option-header pb-0">
                        <span class="fw-medium">{{ trans('table.columns.cv') }}</span>
                        <div>
                            <a class="badge bg-label-primary" href="{{ asset('storage/' . $jobRequest?->file) }}"
                                target="_blank"
                                download="{{ str($jobRequest?->file)->replace('jobs/attachments/', '') }}">
                                <i class="bx bx-download"></i>
                            </a>
                            <a class="badge bg-label-danger" href="{{ asset('storage/' . $jobRequest?->file) }}"
                                target="_blank">
                                <i class="bx bx-show"></i>
                            </a>
                        </div>
                    </span>
                </label>
            </div>

            <hr class="mt-3">
            <h6 class="mt-3 mb-4 text-secondary">{{ trans('table.columns.attachments') }}</h6>

            <div class="row justify-content-between align-items-center">
                @foreach ($jobRequest?->attachments ?? [] as $item)
                    <div class="form-check custom-option custom-option-basic mb-3 col-sm-5 col-12">
                        <label class="form-check-label custom-option-content" for="marketingCheckbox">
                            <span class="form-check-input">
                                <i class="bx bx-file fs-4"></i>
                            </span>
                            <span class="custom-option-header pb-0">
                                <span class="fw-medium">{{ trans('table.columns.file') }}
                                    {{ $loop->iteration }}</span>
                                <div>
                                    <a class="badge bg-label-primary" href="{{ asset('storage/' . $item->file) }}"
                                        target="_blank"
                                        download="{{ str($item->file)->replace('jobs/attachments/', '') }}">
                                        <i class="bx bx-download"></i>
                                    </a>
                                    <a class="badge bg-label-danger" href="{{ asset('storage/' . $item->file) }}"
                                        target="_blank">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </x-dashboard.modals.modal1>


</section>
