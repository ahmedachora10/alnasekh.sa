<div class="row">
    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.company" name="form.company" :title="trans('table.columns.company')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.policy" name="form.policy" :title="trans('table.columns.policy')" />
    </div>

    <div class="col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.type" name="form.type" :title="trans('table.columns.type')" />
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
