@props(['key' => 'success', 'color' => 'primary'])

@if (session()->has($key))
    <div class="messages alert alert-{{ $color }} alert-dismissible" role="alert">
        {{ session()->get($key) }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
