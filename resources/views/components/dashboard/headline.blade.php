@props(['title', 'description' => null])
<div>
    <h4 class="py-3 mb-2">{{ $title }}</h4>
    @if ($description !== null)
        <p>{{ $description }}</p>
    @endif
</div>
