<div class="card p-2 h-100 shadow-none border">
    <div class="rounded-2 text-center mb-3">
        <a href=""><img class="img-fluid p-2" src="{{ asset($service->thumbnail) }}" alt="tutor image"></a>
    </div>
    <div class="card-body p-3 pt-2">
        <div class="d-flex justify-content-end align-items-center mb-4">
            @if($service->old_price > 0)
            <span class="badge bg-label-secondary text-decoration-line-through fw-bold me-2">{{$service->old_price}}$</span>
            @endif
            <span class="text-warning fw-bold">{{$service->price}}$</span>
        </div>

        <a href="" class="h5">{{ $service->get_name }}</a>
        <p class="mt-2">{{ $service->get_description }}</p>
        {{-- <p class="d-flex align-items-center"><i class="bx bx-time-five me-2"></i>{{ $service->created_at->diffForHumans() }}</p> --}}

        <div class="d-flex flex-column justify-content-end flex-md-row gap-2 text-nowrap pe-xl-3 pe-xxl-0">
            <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center" href="{{route('services.request', $service)}}">
                <span class="me-2">{{ trans('common.order now') }}</span><i
                    class="bx bx-chevron-right lh-1 scaleX-n1-rtl"></i>
            </a>
        </div>
    </div>
</div>
