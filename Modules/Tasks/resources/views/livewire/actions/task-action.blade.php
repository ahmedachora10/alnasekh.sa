<div class="row">
    <div class="col-12">
        <div class="col-12 mb-4">
            <x-dashboard.input-group type="name" name="form.name" wire:model.defer="form.name" :title="trans('table.columns.name')" />
        </div>

        <div class="col-12 mb-4">
            <x-dashboard.input-group type="description" name="form.description" wire:model.defer="form.description" :title="trans('table.columns.description')" />
        </div>

        <div class="col-12 mb-4">
            <x-dashboard.input-group type="date" name="form.due_date" wire:model.defer="form.due_date" :title="trans('table.columns.due_date')" />
        </div>

        <div class="col-12 mb-4">
            <x-dashboard.select-group  name="form.assigned_to" wire:model.defer="form.assigned_to" :title="trans('table.columns.user')">
                <option value="">{{ trans('select an employee') }}</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{ $user->name }} </option>
                @endforeach

            </x-dashboard.select-group>
            {{-- </br> {{implode(' - ',$user->roles->pluck('name')->toArray())}} --}}
            <div class="col-12">
                <x-dashboard.button type="button" wire:click="save" class="btn-primary mt-3" />
            </div>
        </div>

    </div>
</div>
