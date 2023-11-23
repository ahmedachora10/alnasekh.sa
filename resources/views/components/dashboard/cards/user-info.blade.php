<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
                <span class="fw-bold text-{{ $color }}">{{ $title }}</span>
                <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">{{ $count }}</h4>
                    @if ($statistics)
                        <small class="text-success">({{ $statistics }})</small>
                    @endif
                </div>
                <small>{{ $description }}</small>
            </div>
            <span class="badge bg-label-{{ $color }} rounded p-2">
                <i class="{{ $icon }} bx-sm"></i>
            </span>
        </div>
    </div>
</div>
