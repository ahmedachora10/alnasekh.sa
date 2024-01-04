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
        'attachments',
    ]">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

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
                <td>{{ $item->job }}</td>
                <td>{{ $item->job_city }}</td>

                <td>
                    <a href="{{ asset('storage/' . $item->cv) }}" class="btn btn-sm btn-primary" target="_blank">
                        <i class="bx bx-show me-1"></i>
                        {{ trans('table.columns.cv') }}
                    </a>
                </td>

                <td>
                    <a href="#" class="btn btn-sm btn-primary" wire:click="getAttachments({{ $item }})">
                        <i class="bx bx-show me-1"></i>
                        {{ trans('common.show') }}
                    </a>
                </td>

                <td>
                    <x-dashboard.actions.container>
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
            @foreach ($this->attachments as $item)
                <div class="form-check custom-option custom-option-basic mb-3">
                    <label class="form-check-label custom-option-content" for="marketingCheckbox">
                        <span class="form-check-input">
                            <i class="bx bx-file fs-4"></i>
                        </span>
                        <span class="custom-option-header pb-0">
                            <span class="fw-medium">{{ trans('table.columns.file') }} {{ $loop->iteration }}</span>
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
    </x-dashboard.modals.modal1>


</section>
