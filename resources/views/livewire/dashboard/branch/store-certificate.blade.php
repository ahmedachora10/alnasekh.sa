<section>
    <x-dashboard.wizard.wizard-head current="certificates" :branch="!$branch->corp->doesnt_has_branches" />
    <div class="mb-3"></div>
    <x-dashboard.cards.sample column="col-12">
        <div class="row">
            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="text" :value="$company_name" disabled readonly name="company_name"
                    :title="trans('table.columns.corp name')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="number" wire:model.defer="form.certificate_number"
                    name="form.certificate_number" :title="trans('table.columns.certificate number')" />
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

    </x-dashboard.cards.sample>
</section>
