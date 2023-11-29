<div class="row">
    <div class="col-12 mb-3">
        <x-dashboard.input-group readonly type="number" disabled readonly
            wire:model.defer="form.commercial_registration_number" name="form.commercial_registration_number"
            :title="trans('table.columns.commercial registration number')" />
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
        <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}" class="btn-primary float-end mt-2" />
    </div>
</div>
