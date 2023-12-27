@props(['key' => ''])
@if (setting($key))
    <a href="{{ setting($key) }}" {{ $attributes }} style="border:0px; font-size: 1.5rem; color:white; padding: 0 10px">
        <img src="{{ asset('assets/icons/' . $key . '.svg') }}" style="width: 40px; display:inline-block !important"
            alt="">
    </a>
@endif
