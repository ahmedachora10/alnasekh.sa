<div class="row">
    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.ministry" name="form.ministry" :title="trans('table.columns.ministry')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.entity" name="form.entity" :title="trans('table.columns.entity')" />
    </div>

    <div class="col-12 mb-3">
        {{-- <div class="editor" wire:model.defer="form.mission"></div> --}}
        <x-dashboard.label> {{ trans('table.columns.mission') }} </x-dashboard.label>
        <textarea type="text" class="form-control" wire:model.defer="form.mission" name="form.mission">
        </textarea>
        <x-dashboard.error field="form.mission" />
    </div>
    <div class="col-12">
        <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}" class="btn-primary mt-4" />
    </div>
</div>
