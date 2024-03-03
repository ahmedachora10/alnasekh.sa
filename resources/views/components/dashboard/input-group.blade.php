@props(['type' => 'text', 'name', 'title' => null, 'value' => null, 'placeholder' => null])

@if ($title)
    <x-dashboard.label :for="$name">{{ $title }}</x-dashboard.label>
@endif

<x-dashboard.input {{ $attributes }} :type="$type" :name="$name" :value="$value ?? old($name)" :id="$name"
    :placeholder="$placeholder" />

<x-dashboard.error :field="$name" />
