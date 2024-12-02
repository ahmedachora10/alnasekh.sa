<div class="card h-100">
    <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between mb-4">
            <div class="avatar flex-shrink-0">
                @if($image != '')
                <img src="{{$image}}"
                    alt="wallet info" class="rounded">
                @endif
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    {{-- <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                    {{$slot}}
                </div>
            </div>
        </div>
        <p class="mb-1">{{$title ?? trans('common.wallet')}}</p>
        <h4 class="card-title mb-3">
            <x-loader class="d-block" wire:loading.class.remove='d-none' />
            <span wire:loading.remove>
                {{$currency}}{{$amount}}
            </span>
        </h4>
        {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
    </div>
</div>
