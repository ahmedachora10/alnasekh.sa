<div class="row">
    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.name" name="form.name" :title="trans('table.columns.name')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="number" wire:model.defer="form.resident_number" name="form.resident_number"
            :title="trans('table.columns.resident number')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="form.business_card_start_date"
            name="form.business_card_start_date" :title="trans('table.columns.business card start date')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="form.business_card_end_date"
            name="form.business_card_end_date" :title="trans('table.columns.business card end date')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="form.contract_start_date"
            name="form.contract_start_date" :title="trans('table.columns.contract start date')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="form.contract_end_date" name="form.contract_end_date"
            :title="trans('table.columns.contract end date')" />
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
