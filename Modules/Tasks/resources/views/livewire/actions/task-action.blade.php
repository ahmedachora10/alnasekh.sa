<div class="row">

    <div class="{{$isAdmin ? 'col-md-6' : 'col-12'}} col-12 mb-4">
        <x-dashboard.input-group type="text" name="form.name" wire:model.defer="form.name" :title="trans('table.columns.name')" />
    </div>

    @if($isAdmin)
    <div class='col-md-6 col-12 mb-4'>
        <x-dashboard.select-group name="form.assigned_to" wire:model.defer="form.assigned_to"
            :title="trans('table.columns.user')">
            <option value="">{{ trans('select an employee') }}</option>
            @foreach ($users as $item)
            <option value="{{$item->id}}">{{ $item->name }} </option>
            @endforeach
        </x-dashboard.select-group>
    </div>
    @endif

    <div class="col-md-6 col-12 mb-4">
        <x-dashboard.input-group type="datetime-local" name="form.start_date" wire:model.defer="form.start_date"
            :title="trans('table.columns.start date')" />
    </div>

    <div class="col-md-6 col-12 mb-4">
        <x-dashboard.input-group type="datetime-local" name="form.end_date" wire:model.defer="form.end_date"
            :title="trans('table.columns.end date')" />
    </div>

    <div class="col-12 mb-4">
        <x-dashboard.input-group type="description" name="form.description" wire:model.defer="form.description"
            :title="trans('table.columns.description')" />
    </div>

    <div class="col-12 mb-4">
        <x-dashboard.select-group name="form.priority" wire:model.defer="form.priority"
            :title="trans('table.columns.priority')">
            @foreach ($priority as $item)
            <option value="{{$item->value}}">{{ $item->name() }} </option>
            @endforeach
        </x-dashboard.select-group>
    </div>

    {{-- </br> {{implode(' - ',$user->roles->pluck('name')->toArray())}} --}}
    <div class="col-12">
        <x-dashboard.button type="button" wire:click="save" class="btn-primary mt-3" />
    </div>
</div>
