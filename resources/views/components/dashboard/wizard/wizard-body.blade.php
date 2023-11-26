@props(['target', 'title' => '', 'subtitle' => null])
<div id="{{ $target }}" class="content">
    <div class="content-header mb-3">
        <h6 class="mb-0">{{ $title }}</h6>
        @if ($subtitle)
            <small>{{ $subtitle }}</small>
        @endif
    </div>
    <div class="row g-3">
        {{ $slot }}
    </div>
</div>
