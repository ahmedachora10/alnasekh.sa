@props(['key'])
<div {{ $attributes->merge(['class' => 'form-text']) }}>
    {{ config('imagesize.' . $key) }}
</div>
