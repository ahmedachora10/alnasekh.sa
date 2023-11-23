@props(['link' => route('logout')])

<form method="POST" action="{{ $link }}">
    @csrf
    <a {{ $attributes }} href="{{ $link }}"
        onclick="event.preventDefault();
    this.closest('form').submit();">
        {{ $slot }}
    </a>
</form>
