@props(['type' => 'success'])

@if (session()->has($type))
    <div class="messages alert alert-{{ $type }} alert-dismissible" role="alert">
        {{ session()->get($type) }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
