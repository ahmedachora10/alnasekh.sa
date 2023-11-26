<section>
    <x-dashboard.wizard.wizard-head current="subscriptions">
    </x-dashboard.wizard.wizard-head>
    <div class="mb-3"></div>
    {{-- <x-dashboard.cards.sample column="col-12">
        <div class="row">
            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="text" disabled readonly wire:model.defer="company_name"
                    name="company_name" :title="trans('table.columns.corp name')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="number" disabled readonly wire:model.defer="registration_number"
                    name="registration_number" :title="trans('table.columns.registration number')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="text" wire:model.defer="form.type" name="form.type"
                    :title="trans('table.columns.type')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="number" wire:model.defer="form.status" name="form.status"
                    :title="trans('table.columns.status')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="date" wire:model.defer="form.start_date" name="form.start_date"
                    :title="trans('table.columns.start date')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="date" wire:model.defer="form.end_date" name="form.end_date"
                    :title="trans('table.columns.end date')" />
            </div>

            <div class="col-12">
                <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}" class="btn-primary mt-4" />
            </div>
        </div>
    </x-dashboard.cards.sample> --}}

    <div class="bs-stepper wizard-vertical vertical mt-2">
        <div class="bs-stepper-header">
            @foreach ($subscriptionTypes as $type)
                @php
                    $currentStep = $type === $selectedType;
                    if ($currentStep) {
                        $oldSteps = true;
                    }
                @endphp
                <div @class([
                    'step',
                    'active' => $currentStep && !$allSubscriptionsAdded,
                    'crossed' => !isset($oldSteps) || $allSubscriptionsAdded,
                ]) data-target="#account-details-1">
                    <button type="button" class="step-trigger" aria-selected="false">
                        <span class="bs-stepper-circle">{{ $loop->iteration }}</span>
                        <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">{{ $type->name() }}</span>
                            <span class="bs-stepper-subtitle">اضافة بيانات الاشتراك</span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>
            @endforeach

            <div @class(['step', 'active' => $allSubscriptionsAdded]) data-target="#account-details-1">
                <button type="button" class="step-trigger" aria-selected="false">
                    <span class="bs-stepper-circle">5</span>
                    <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">المراجعة</span>
                        <span class="bs-stepper-subtitle">مراجعة بيانات الاشتراك</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <form onsubmit="return false">
                <!-- Account Details -->
                <div id="account-details-1" class="content active dstepper-block">
                    <div class="content-header mb-3">
                        <h6 class="mb-0">
                            @if ($allSubscriptionsAdded)
                                المراجعة
                            @else
                                {{ $selectedType->name() }}
                            @endif
                        </h6>
                        <small>{{ $allSubscriptionsAdded ? 'مراجعة' : 'اضافة' }} بيانات الاشتراك</small>
                    </div>
                    <div class="row g-3">
                        @if (!$allSubscriptionsAdded)
                            <div class="col-sm-6">
                                <x-dashboard.input-group type="text" disabled readonly
                                    wire:model.defer="company_name" name="company_name" :title="trans('table.columns.corp name')" />
                            </div>

                            <div class="col-sm-6">
                                <x-dashboard.input-group type="number" disabled readonly
                                    wire:model.defer="registration_number" name="registration_number"
                                    :title="trans('table.columns.registration number')" />
                            </div>

                            <div class="col-sm-6">
                                <x-dashboard.input-group type="text" wire:model.defer="form.type" name="form.type"
                                    :title="trans('table.columns.type')" />
                            </div>

                            <div class="col-sm-6">
                                <x-dashboard.input-group type="number" wire:model.defer="form.status"
                                    name="form.status" :title="trans('table.columns.status')" />
                            </div>

                            <div class="col-sm-6">
                                <x-dashboard.input-group type="date" wire:model.defer="form.start_date"
                                    name="form.start_date" :title="trans('table.columns.start date')" />
                            </div>

                            <div class="col-sm-6">
                                <x-dashboard.input-group type="date" wire:model.defer="form.end_date"
                                    name="form.end_date" :title="trans('table.columns.end date')" />
                            </div>

                            <div class="col-12">
                                <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}"
                                    class="btn-primary float-end mt-2" />
                            </div>
                        @else
                            @foreach ($branch->subscriptions as $item)
                                <div class="col-sm-6">
                                    <div class="card card-border-shadow-primary h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="d-flex align-items-center mb-2 pb-1">
                                                    <div class="avatar me-2">
                                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                                class="bx bx-git-repo-forked"></i></span>
                                                    </div>
                                                    <h4 class="ms-1 mb-0">{{ $item->subscription_type->name() }}</h4>
                                                </div>
                                                <div>
                                                    <x-dashboard.actions.edit wire:click="edit({{ $item }})"
                                                        class="text-primary" style="cursor: pointer" />
                                                </div>
                                            </div>
                                            {{-- <p class="mb-1">Deviated from route</p> --}}
                                            <p class="mb-0">
                                                <span class="fw-medium me-1">{{ $item->date('end_date') }}</span>
                                                <small class="text-muted">{{ $item->date('start_date') }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <x-dashboard.button wire:click="redirectTo" name="{{ trans('common.next') }}"
                                class="btn-primary float-end mt-2" />
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-dashboard.modals.modal1 id="updateSubscriptoinModal" :title="trans('common.update subscription')">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <x-dashboard.input-group type="text" disabled readonly wire:model.defer="company_name"
                    name="company_name" :title="trans('table.columns.corp name')" />
            </div>

            <div class="col-sm-6 mb-3">
                <x-dashboard.input-group type="number" disabled readonly wire:model.defer="registration_number"
                    name="registration_number" :title="trans('table.columns.registration number')" />
            </div>

            <div class="col-sm-6 mb-3">
                <x-dashboard.input-group type="text" wire:model.defer="form.type" name="form.type"
                    :title="trans('table.columns.type')" />
            </div>

            <div class="col-sm-6 mb-3">
                <x-dashboard.input-group type="number" wire:model.defer="form.status" name="form.status"
                    :title="trans('table.columns.status')" />
            </div>

            <div class="col-sm-6 mb-3">
                <x-dashboard.input-group type="date" wire:model.defer="form.start_date" name="form.start_date"
                    :title="trans('table.columns.start date')" />
            </div>

            <div class="col-sm-6 mb-3">
                <x-dashboard.input-group type="date" wire:model.defer="form.end_date" name="form.end_date"
                    :title="trans('table.columns.end date')" />
            </div>

            <div class="col-12">
                <x-dashboard.button wire:click="udpate" name="{{ trans('common.save') }}"
                    class="btn-primary float-end mt-2" />
            </div>
        </div>
    </x-dashboard.modals.modal1>
</section>
