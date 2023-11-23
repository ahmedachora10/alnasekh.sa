@props(['route' => null])

<form method="POST" action="{{ $route }}">
    @csrf
    @method('DELETE')

    <a href="{{ $route }}" {{ $attributes->merge(['class' => 'dropdown-item text-danger']) }}
        onclick="if(confirm('هل تود حذف هذا العنصر؟')) { event.preventDefault();
        this.closest('form').submit();} else { return false }">
        <i class="bx bx-trash me-1"></i> {{ __('Delete') }}
    </a>
</form>
