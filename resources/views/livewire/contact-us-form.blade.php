<form wire:submit.prevent="save">
    <div class="row g-4">
        @if (session('success'))
            <div class="col-12">
                <span class="d-block mb-3 text-success">{{ session('success') }}</span>
            </div>
        @endif
        <div class="col-md-6">
            <x-dashboard.input-group type="text" wire:model.defer="name" name="name" :title="trans('table.columns.name')" />
        </div>
        <div class="col-md-6">
            <x-dashboard.input-group type="text" wire:model.defer="email" name="email" :title="trans('table.columns.email')" />
        </div>

        <div class="col-md-6">
            <x-dashboard.input-group type="text" wire:model.defer="phone" name="phone" :title="trans('table.columns.phone')" />
        </div>

        <div class="col-md-6">
            <x-dashboard.input-group type="text" wire:model.defer="subject" name="subject" :title="trans('table.columns.subject')" />
        </div>

        <div class="col-12">
            <label class="form-label" for="contact-form-message">{{ trans('table.columns.message') }}</label>
            <textarea id="contact-form-message" class="form-control" rows="9" wire:model.defer="message" name="message"></textarea>
            <x-dashboard.error field="message" />
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">{{ trans('common.send') }}</button>
        </div>
    </div>
</form>
