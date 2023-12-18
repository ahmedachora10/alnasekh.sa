<div class="row">

    @php
        $isForeigner = $form->nationality == App\Enums\Nationalities::FOREIGNER;
    @endphp

    @foreach (App\Enums\Nationalities::cases() as $item)
        <div class="col-md-6 col-12 mb-3">
            <div class="form-check custom-option custom-option-icon checked">
                <label class="form-check-label custom-option-content" for="customRadioIcon{{ $loop->index }}">
                    <span class="custom-option-body">
                        <i class="bx bx-user"></i>
                        <span class="custom-option-title"> {{ $item->name() }} </span>
                    </span>
                    <input name="nationality" wire:model.change="form.nationality" class="form-check-input" type="radio"
                        id="customRadioIcon{{ $loop->index }}" value="{{ $item }}">
                </label>
            </div>
        </div>
    @endforeach

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.name" name="form.name" :title="trans('table.columns.name')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="number" wire:model.defer="form.resident_number" name="form.resident_number"
            :title="trans(!$isForeigner ? 'table.columns.national id' : 'table.columns.resident number')" />
    </div>

    @if ($isForeigner)
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="date" wire:model.defer="form.contract_start_date"
                name="form.contract_start_date" :title="trans('table.columns.contract start date')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="date" wire:model.defer="form.contract_end_date"
                name="form.contract_end_date" :title="trans('table.columns.contract end date')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="date" wire:model.defer="form.business_card_start_date"
                name="form.business_card_start_date" :title="trans('table.columns.business card start date')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="date" wire:model.defer="form.business_card_end_date"
                name="form.business_card_end_date" :title="trans('table.columns.business card end date')" />
        </div>
    @endif

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="form.start_date" name="form.start_date"
            :title="trans('table.columns.employee start date')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="form.end_date" name="form.end_date"
            :title="trans('table.columns.employee end date')" />
    </div>

    <div class="col-12">
        <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}" class="btn-primary mt-4" />
    </div>
</div>
