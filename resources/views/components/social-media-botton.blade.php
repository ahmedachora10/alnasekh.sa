@props(['key' => ''])
@if (setting($key))
    <a href="{{ setting($key) }}" {{ $attributes }} style="border:0px; font-size: 1.5rem; color:white; padding: 0 10px">

        {{-- <img src="{{ ('/assets/icons/' . $key . '.svg') }}" type="image/svg+xml"
            style="width: 40px; display:inline-block !important; height: 100% !important;" alt=""> --}}
        @switch($key)
            @case('facebook')
                <img width="24" height="24" src="https://img.icons8.com/material/24/FFFFFF/facebook-new.png"
                    alt="facebook-new" />
            @break

            @case('instagram')
                <img width="24" height="24" src="https://img.icons8.com/material/24/FFFFFF/facebook-new.png"
                    alt="facebook-new" />
            @break

            @case('linkedin')
                <img width="24" height="24" src="https://img.icons8.com/material/24/FFFFFF/facebook-new.png"
                    alt="facebook-new" />
            @break

            @case('snapchat')
            @break

            @case('telegram')
            @break

            @case('tiktok')
            @break

            @case('twitter')
            @break

            @case('whatsapp')
                <img width="24" height="24" src="https://img.icons8.com/material/24/000000/whatsapp--v1.png"
                    alt="whatsapp--v1" />
            @break

            @case('youtube')
            @break
        @endswitch
    </a>
@endif
