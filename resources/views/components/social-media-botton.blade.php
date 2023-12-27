@props(['key' => ''])
@if (setting($key))
    <a href="{{ setting($key) }}" {{ $attributes }} style="border:0px; font-size: 1.5rem; color:white; padding: 0 10px">
        <img src="{{ asset('/assets/icons/' . $key . '.png') }}"
            style="width: 36px; display:inline-block !important; height: 100% !important;" alt="">
    </a>
@endif
