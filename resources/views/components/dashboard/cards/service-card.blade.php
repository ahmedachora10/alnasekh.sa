<div class="card h-auto">
    <img height="186px" width="100%"
        src="{{ asset($service->thumbnail) }}"
        alt="{{$service->get_name}}">
    <div class="mt-n8">
        <span class="d-inline-block ms-6 shadow-lg text-center">
            <span class="mb-0 h6 fw-bold text-dark bg-warning px-4 rounded-top pt-2 pb-1 d-inline-block">{{$service->price}}$</span><br>
            <span class="rounded-bottom bg-light text-secondary text-decoration-line-through pt-1 pb-2 px-4 d-block">{{$service->old_price}}$</span>
        </span>
    </div>
    <div class="card-body">
        <h5 class="text-truncate mb-2">{{$service->get_name}}</h5>
        <p>{{ $service->get_description }}</p>
        <div class="d-flex justify-content-end my-6">
            <a href="{{route('front.services.request', $service)}}" class="btn btn-primary ms-auto" role="button">{{ trans('common.order now') }}</a>
        </div>
    </div>
</div>
