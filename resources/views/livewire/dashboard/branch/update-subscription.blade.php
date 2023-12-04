<div class="row">
    <div class="col-12mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.type" name="form.type" :title="trans('table.columns.type')" />
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
        <x-dashboard.button wire:click="update" name="{{ trans('common.save') }}" class="btn-primary float-end mt-2" />
    </div>
</div>
