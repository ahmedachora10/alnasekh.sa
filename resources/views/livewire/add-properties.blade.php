<div>
    <label for="properties" class="label mb-2">{{ trans('table.columns.properties') }}</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
            aria-describedby="button-addon1" wire:model.defer="property">
        <button class="btn btn-outline-primary" type="button" id="button-addon1" wire:click="add"><i
                class="bx bx-plus"></i></button>
    </div>

    <div class="properties row align-items-center justify-content-start">
        @foreach ($properties as $item)
            <div class="ms-2 border py-2 py-2 border rounded-1 col-auto">
                <span class="pe-3">{{ $item }}</span>
                <a href="#!" wire:click="remove('{{ $item }}')">
                    <i class="bx bx-trash text-danger" style="font-size: 14px"></i>
                </a>
                <input type="hidden" value="{{ $item }}" name="{{ $fieldName }}[]">
            </div>
        @endforeach
    </div>
</div>
