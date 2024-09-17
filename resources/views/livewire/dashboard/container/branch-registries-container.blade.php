<section>
    @php
        $existingRegistries = $savedRegistries->pluck('id')->toArray();
    @endphp
    <x-dashboard.wizard.wizard-head current="registries" :branch="$branch" />
    <div class="mb-3"></div>
    <x-dashboard.cards.sample column="col-12">
        <div class="input-group">
            <select name="registry" class="form-control" id="registry" wire:model.defer="registryId">
                <option value="">تحديد السجل</option>
                @foreach ($registries as $item)
                    @continue(in_array($item->id, $existingRegistries))
                    @php
                        $this->registryId = $item->id;
                    @endphp
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-secondary" type="button" id="button-addon1" wire:click="create">
                <i class="bx bx-plus"></i>
                {{ trans('common.create') }}
            </button>
        </div>
        <x-dashboard.error field="registryId" />
        <div class="mt-4 row">
            @foreach ($savedRegistries as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-secondary"><i
                                                class="bx bx-file"></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{ $item->name }}</h4>
                                </div>
                                <div>
                                    <x-dashboard.actions.edit
                                        wire:click="$dispatch('edit-branch-registry',{registry: {{ $item }}})"
                                        class="text-secondary" style="cursor: pointer" />
                                </div>
                            </div>
                            {{-- <p class="mb-1">Deviated from route</p> --}}
                            <p class="mb-0 d-flex justify-content-between align-items-center">
                                <span>
                                    <span class="fw-medium me-1">{{ $item->registry->end_date }}</span>
                                    <small class="text-muted">{{ $item->registry->start_date }}</small>
                                </span>

                                <span>
                                    <x-dashboard.actions.delete :livewire="true"
                                        wire:click="$dispatch('delete-branch-registry',{registry: {{ $item }}})"
                                        class="text-danger float-end" text="" style="cursor: pointer;" />
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($existingRegistries) > 0)
            <div class="mt-3">
                <a href="{{ route('branches.subscription.store', $branch) }}" class="btn btn-primary float-end">
                    {{ trans('common.next') }}
                </a>
            </div>
        @endif
    </x-dashboard.cards.sample>

    <x-dashboard.modals.modal1 id="branchRegistryFormModal" :title="trans('common.new registry')">
        <livewire:dashboard.branch.store-registry :branch="$branch" />
    </x-dashboard.modals.modal1>
</section>
