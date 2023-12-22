@props(['key' => ''])
@if (setting($key))
    <a href="{{ setting($key) }}" {{ $attributes }} style="border:0px; font-size: 1.5rem; color:white; padding: 0 10px">
        <i class="fab fa-{{ $key }}"></i>
    </a>
@endif
