@props(['type' => 'text', 'name', 'title', 'value' => null, 'placeholder' => null])

<x-dashboard.label :for="$name">{{ $title }}</x-dashboard.label>

<x-dashboard.input {{ $attributes }} :type="$type" :name="$name" :value="$value ?? old($name)" :id="$name"
    :placeholder="$placeholder" />

<x-dashboard.error :field="$name" />
