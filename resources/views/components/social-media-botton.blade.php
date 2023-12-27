@props(['key' => ''])
@if (setting($key))
    <a href="{{ setting($key) }}" {{ $attributes }} style="border:0px; font-size: 1.5rem; color:white; padding: 0 10px">

        {{-- <img src="{{ asset('/assets/icons/' . $key . '.png') }}"
            style="width: 40px; display:inline-block !important; height: 100% !important;" alt=""> --}}
        <img width="24" height="24" src="https://img.icons8.com/material/24/FFFFFF/facebook-new.png"
            alt="facebook-new" />
    </a>
@endif
