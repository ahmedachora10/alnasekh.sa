<div
    class="d-flex justify-content-between align-items-start card-widget-2 @if (!$last) border-end @endif pb-3 pb-sm-0">
    <div>
        <h3 class="mb-2">{{ $total }}</h3>
        <p class="mb-0">{{ $name }}</p>
    </div>
    <div class="avatar me-lg-4">
        <span class="avatar-initial rounded bg-label-{{ $color }}">
            <i class="{{ $icon }} bx-sm"></i>
        </span>
    </div>
</div>
