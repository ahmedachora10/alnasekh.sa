<div class="bs-stepper wizard-vertical vertical mt-2">
    @if (count($savedSubscriptions) !== count($subscriptionTypes))
        <div class="bs-stepper-header">
            <h5>الاشتراكات</h5>
            @foreach ($subscriptionTypes as $type)
                @continue(in_array($type, $savedSubscriptions))

                <div @class(['step', 'active' => $selected === $type->value]) data-target="#account-details-1">
                    <button wire:click="selectStep({{ $type->value }})" type="button" class="step-trigger"
                        aria-selected="false">
                        <span class="bs-stepper-circle">{{ $loop->iteration }}</span>
                        <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">{{ $type->name() }}</span>
                            <span class="bs-stepper-subtitle">اضافة بيانات الاشتراك</span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>
            @endforeach
        </div>
        @if ($this->selected !== null)
            <div class="bs-stepper-content">
                @if (session('selected'))
                    <span class="mb-2 text-danger">{{ session('selected') }}</span>
                @endif
                <form onsubmit="return false" class="mt-2">
                    <!-- Account Details -->
                    <div id="account-details-1" class="content active dstepper-block">
                        {{-- <div class="content-header mb-3">
                    <h6 class="mb-0">
                        {{ $selectedType->name() }}
                    </h6>
                </div> --}}
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <x-dashboard.input-group type="text" disabled readonly
                                    wire:model.defer="company_name" name="company_name" :title="trans('table.columns.corp name')" />
                            </div>

                            <div class="col-sm-6">
                                <x-dashboard.input-group type="number" disabled readonly
                                    wire:model.defer="registration_number" name="registration_number"
                                    :title="trans('table.columns.registration number')" />
                            </div>

                            <div class="col-12">
                                <x-dashboard.input-group type="text" wire:model.defer="form.type" name="form.type"
                                    :title="trans('table.columns.type')" />
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
                        </div>
                    </div>
                </form>
            </div>
        @endif
    @else
        <div class="m-3">لا توجد اشتراكات لاضافتها</div>
    @endif
</div>
