<div class="row">
    <div class="col-md-6 col-12">
        <x-dashboard.input-group type="text" wire:model.defer="form.name" name="form.name" :title="trans('table.columns.name')" />
    </div>

    <div class="col-md-6 col-12">
        <x-dashboard.input-group type="number" wire:model.defer="form.registration_number" name="form.registration_number"
            :title="trans('table.columns.registration number')" />
    </div>

    <div class="col-12 mt-2">
        <x-dashboard.input-group type="text" wire:model.defer="form.address" name="form.address" :title="trans('table.columns.address')" />
    </div>

    <div class="col-12">
        <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}" class="btn-primary mt-4" />
    </div>
</div>
