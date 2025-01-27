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

    <div class="col-12 mb-4">
        <x-dashboard.label>{{ trans('table.columns.attachments') }}</x-dashboard.label>
        <x-dropzon-form id="attachments">
            <input type="hidden" name="model" value="{{App\Enums\MediaValidation::Task->value}}">
        </x-dropzon-form>
        <x-dashboard.error field="form.attachments" />
    </div>


    @if ($form?->attachments)
    <div class="col-12">
        <div class="row">
            @foreach ($form?->attachments ?? [] as $item)
            <div class="col-md-6 col-12 d-flex align-items-center border-primary py-3 px-4 border rounded mb-2">
                <div
                    class="d-flex align-items-center justify-content-center avatar flex-shrink-0 me-3 avatar-initial rounded bg-label-primary">
                    <i class="bx bx-file"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-3">
                        <a href="{{ $item['id'] ? $item['url'] : asset('storage/'.$item['url'])}}" target="_blank" class="mb-0 text-heading">{{ $item['name'] }}</a>
                    </div>
                    <div class="user-progress">
                        <a href="#!" class="d-flex justify-content-center" @click="$wire.deleteAttachment('{{$item['id'] ?? $item['url'] }}', {{$item['id'] ? true : false}})">
                            <i class="bx bx-trash text-danger"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- </br> {{implode(' - ',$user->roles->pluck('name')->toArray())}} --}}
    <div class="col-12">
        <x-dashboard.button type="button" id="save-task-action" wire:click="save" class="btn-primary mt-3" />
    </div>
</div>


@pushOnce('scripts')
    <script type="module" defer>

        const uploadAttachment = dropzoneHandler('#attachments', {
            maxFiles: 5,
            maxFilesize: 1024,
            paramName: 'attachment',
            // acceptedFiles: ".mp4"
        });

        const submitBtn = $('#save-task-action');

        uploadAttachment.on("success", function(file, response) {
            submitBtn.removeAttr('disabled');

            if (!response.status) return notify({status:response.status, message: response.message,  style: 'bg-wanring'});

            notify({status: true, message: "{{__('File has been uploaded succefully')}}"});

            Livewire.dispatch('add-attachments', {
                path: response.file,
                name: file.name
            });
        });

        uploadAttachment.on("addedfile", (file) => {
            submitBtn.attr('disabled', true);
        });

        uploadAttachment.on("error", (file, response) => {
            uploadAttachment.removeFile(file);
            submitBtn.attr('disabled', false);
            if(response.errors) return notify({status: false, message: response.message || "{{__('Something went wrong')}}"});
            notify({status: false, message: "{{__('Something went wrong')}}"});
        });

    </script>
@endPushOnce
