@props(['name', 'title'])

<x-dashboard.label :for="$name">{{ $title }}</x-dashboard.label>

<select {{ $attributes->merge(['class' => 'form-select']) }} :name="$name" :id="$name">
    {{ $slot }}
</select>

<x-dashboard.error :field="$name" />
