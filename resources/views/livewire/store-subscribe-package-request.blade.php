<div class="row">

    @if (session('success'))
        <div class="col-12 mb-3">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.company_name" name="form.company_name"
            :title="trans('table.columns.company name')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.administrator_name" name="form.administrator_name"
            :title="trans('table.columns.administrator name')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.email" name="form.email" :title="trans('table.columns.email')" />
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="number" wire:model.defer="form.phone" name="form.phone" :title="trans('table.columns.phone')" />
    </div>

    @if (!$isDefaultPackage)
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="number" wire:model.defer="form.commercial_registration_number"
                name="form.commercial_registration_number" :title="trans('table.columns.commercial registration number')" />
        </div>
    @endif

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.company_activity" name="form.company_activity"
            :title="trans('table.columns.company activity')" />
    </div>

    @if (!$isDefaultPackage)
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="text" wire:model.defer="form.company_size" name="form.company_size"
                :title="trans('table.columns.company size')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="number" wire:model.defer="form.number_of_resident_employees"
                name="form.number_of_resident_employees" :title="trans('table.columns.number of resident employees')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="number" wire:model.defer="form.number_of_suadi_employees"
                name="form.number_of_suadi_employees" :title="trans('table.columns.number of suadi employees')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="number" wire:model.defer="form.total_employees" name="form.total_employees"
                :title="trans('table.columns.total employees')" />
        </div>
    @endif

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.input-group type="text" wire:model.defer="form.company_type" name="form.company_type"
            :title="trans('table.columns.company type')" />
    </div>

    @if (!$isDefaultPackage)
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="text" wire:model.defer="form.company_headquarters"
                name="form.company_headquarters" :title="trans('table.columns.company headquarters')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="text" wire:model.defer="form.company_city" name="form.company_city"
                :title="trans('table.columns.company city')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard.input-group type="number" wire:model.defer="form.number_of_branches"
                name="form.number_of_branches" :title="trans('table.columns.number of branches')" />
        </div>
    @endif

    <div class="col-12">
        <button type="button" wire:click="save" class="btn btn-primary">{{ trans('common.send') }}</button>
    </div>
</div>
