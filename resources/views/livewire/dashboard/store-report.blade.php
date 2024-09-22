<div class="row">
    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.select-group wire:model.live="form.ministry" name="form.ministry" :title="trans('table.columns.ministry')">
            <option value="">{{ trans('common.select the element') }}</option>
            @foreach ($ministries as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </x-dashboard.select-group>
    </div>

    <div class="col-md-6 col-12 mb-3">
        <x-dashboard.select-group wire:model.live="form.entity" name="form.entity" :title="trans('table.columns.entity')">
            <option value="">{{ trans('common.select the element') }}</option>
            @foreach ($entities as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </x-dashboard.select-group>
    </div>

    <div class="col-12 mb-3">
        <x-dashboard.select-group wire:model.defer="form.mission" name="form.mission" :title="trans('table.columns.mission')">
            <option value="">{{ trans('common.select the element') }}</option>
            @foreach ($missions as $item)
                <option value="{{ $item->id }}">{{ $item->content }}</option>
            @endforeach
        </x-dashboard.select-group>
    </div>


    <div class="col-12 mb-3">
        <label class="switch switch-primary my-3">
            <input type="checkbox" class="switch-input" wire:model.defer="sendReminderEmail" name="sendReminderEmail" value="1">
            <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
            </span>
            <span class="switch-label">{{ trans('common.send reminder') }}</span>
        </label>
    </div>

    {{-- <div class="col-12 mb-3">
        <x-dashboard.label> {{ trans('table.columns.mission') }} </x-dashboard.label>
        <textarea type="text" class="form-control" wire:model.defer="form.mission" name="form.mission">
        </textarea>
        <x-dashboard.error field="form.mission" />
    </div> --}}

    <div class="col-12">
        <x-dashboard.button wire:click="save" name="{{ trans('common.save') }}" class="btn-primary mt-4" />
    </div>
</div>
