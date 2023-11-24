@props(['color' => 'primary'])

<span {{ $attributes->merge(['class' => 'fw-bold badge bg-label-' . $color]) }}>
    {{ $slot }}
</span>
