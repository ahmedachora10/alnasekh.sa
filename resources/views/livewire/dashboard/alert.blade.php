<div>
    @if ($value !== '')
        <div class="messages alert alert-{{ $color }} alert-dismissible" role="alert">
            {{ $value }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</div>
