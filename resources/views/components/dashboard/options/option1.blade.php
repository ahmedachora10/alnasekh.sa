<div class="form-check custom-option custom-option-icon shadow-sm">
    <label class="form-check-label custom-option-content" for="customCheckboxIcon1">
        <span class="d-flex justify-content-between align-items-center custom-option-body mb-0">
            <div class="d-flex align-items-center">
                <i class="{{ $icon }} text-primary"></i>
                <span class="custom-option-title ms-2 text-primary"> {{ $title }} </span>
                @if ($description !== '')
                    <small> {{ $description }} </small>
                @endif
            </div>
            <input {{ $attributes->merge(['class' => 'form-check-input']) }} type="checkbox">
        </span>
    </label>
</div>
