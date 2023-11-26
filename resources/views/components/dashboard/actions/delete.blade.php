@props(['route' => null, 'text' => trans('common.delete'), 'livewire' => false])

@if ($livewire === false)
    <form method="POST" action="{{ $route }}">
        @csrf
        @method('DELETE')

        <a href="{{ $route }}" {{ $attributes->merge(['class' => 'dropdown-item text-danger']) }}
            onclick="if(confirm('هل تود حذف هذا العنصر؟')) { event.preventDefault();
        this.closest('form').submit();} else { return false }">
            <i class="bx bx-trash me-1"></i> {{ $text }}
        </a>
    </form>
@else
    <button {{ $attributes->merge(['class' => 'dropdown-item text-danger']) }}
        wire:confirm="{{ trans('common.are you sure') }}">
        <i class="bx bx-trash me-1"></i> {{ $text }}
    </button>
@endif
