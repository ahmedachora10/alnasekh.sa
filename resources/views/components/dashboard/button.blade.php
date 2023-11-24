@props(['name', 'icon' => null])

<button {{ $attributes->merge(['class' => !is_null($icon) && is_null($name) ? 'btn btn-icon' : 'btn']) }}>
    @if (!empty($icon))
        <span class="tf-icons bx {{ $icon }} @if (!is_null($name)) me-1 @endif"></span>
    @endif
    {{ trans($name) }}
</button>
