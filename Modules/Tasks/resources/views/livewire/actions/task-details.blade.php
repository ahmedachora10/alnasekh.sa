<div class="card h-100 shadow-none">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
            <x-dashboard.badge :color="$task?->status?->color()">
                {{ $task?->status?->label() }}
            </x-dashboard.badge>
        </div>
        <div class="bg-label-primary rounded-3 text-center mb-4 pt-6">
          <img class="img-fluid" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/sitting-girl-with-laptop.png" alt="Card girl image" style="width: 52%;">
        </div>
        <h5 class="mb-2">{{ $task?->name }}</h5>
        <p>{{$task?->description}}</p>
        <div class="row mb-4 g-3">
          <div class="col-6">
            <div class="d-flex align-items-center gap-4">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-calendar bx-sm"></i></span>
              </div>
              <div>
                <h6 class="mb-0 text-nowrap">{{$task?->start_date?->format('Y m d / H:i')}}</h6>
                <small>{{trans('table.columns.start date')}}</small>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-time-five bx-sm"></i></span>
              </div>
              <div>
                <h6 class="mb-0 text-nowrap">{{$task?->end_date?->format('Y m d / H:i')}}</h6>
                <small>{{trans('table.columns.end date')}}</small>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5">
            <div class="row">
                @foreach ($task?->getMedia('*') ?? [] as $item)
                @php
                    $type = file_type($item->mime_type);
                @endphp
                <div class="d-flex align-items-center col-auto">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-secondary"><i class="{{$type->icon}} bx-sm"></i></span>
                    </div>
                    <a href="{{$item->getUrl()}}" target="_blank">
                        <h6 class="mb-0 text-nowrap">{{ $type->name }}</h6>
                        <small>{{__('File')}}</small>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="col-12 text-center">
          <a href="javascript:void(0);" class="btn btn-primary w-100 d-grid">Join the event</a>
        </div> --}}
      </div>
    </div>
