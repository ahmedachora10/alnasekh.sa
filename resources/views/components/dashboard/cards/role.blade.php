<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <h6 class="fw-normal">{{ $totalUsers }} </h6>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                @foreach ($users as $user)
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-sm pull-up" aria-label="{{ $user->name }}"
                        data-bs-original-title="{{ $user->name }}">
                        <img class="rounded-circle" src="{{ asset($user->thumbnail) }}" alt="Avatar">
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end">
            {{ $slot }}
        </div>
    </div>
</div>
