<div class="form-check custom-option custom-option-icon shadow-sm border-none">
    <label class="form-check-label custom-option-content" for="customCheckboxIcon1">
        <span
            class="d-flex justify-content-between align-items-center custom-option-body mb-0 form-check-{{ $color }}">
            <div class="d-flex align-items-center">
                <i class="{{ $icon }} text-{{ $color }}"></i>
                <span class="custom-option-title ms-2 text-{{ $color }}"> {{ $title }} </span>
                @if ($description !== '')
                    <small> {{ $description }} </small>
                @endif
            </div>
            <input {{ $attributes->merge(['class' => 'form-check-input']) }} type="checkbox">
        </span>
    </label>
</div>
