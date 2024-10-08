<section>
    <x-dashboard.wizard.wizard-head current="civil_defense_permit" :branch="$branch" />
    <div class="mb-3"></div>
    <x-dashboard.cards.sample column="col-12">
        <div class="row">
            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="text" :value="$company_name" disabled readonly name="company_name"
                    :title="trans('table.columns.corp name')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard.input-group type="number" wire:model.defer="form.permit" name="form.permit"
                    :title="trans('table.columns.permit')" />
            </div>

            <div class="col-12 mb-3">
                <x-dashboard.input-group type="number" wire:model.defer="form.ministry_of_interior_number"
                    name="form.ministry_of_interior_number" :title="trans('table.columns.ministry of interior number')" />
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
