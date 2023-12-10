{{-- <button class="btn btn-secondary  ms-2 btn-sm test-cleave" wire:click="export">
    <span class="tf-icons bx bx-cloud-download me-1"></span>
    <span>{{ trans('common.export') }}</span>
</button> --}}
<div class="col-6 {{ $style }}">
    <div class="form-check custom-option custom-option-icon border-right-0 border-top-0 border-bottom-0  border-left">
        <a wire:click="export" href="#" class="form-check-label custom-option-content" for="customRadioIcon1">
            <span class="custom-option-body">
                <i class="{{ $icon }} fs-1 text-secondary"></i>
                <span class="custom-option-title">{{ $title }}</span>
            </span>
        </a>
    </div>
</div>
