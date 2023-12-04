<div class="row">
    <div class="col-12 mb-3">
        <x-dashboard.input-group type="date" wire:model.defer="date" name="date" :title="trans('table.columns.date')" />
    </div>

    <div class="col-12">
        <x-dashboard.button wire:click="update" name="{{ trans('common.update') }}" class="btn-primary mt-4" />
    </div>
</div>
