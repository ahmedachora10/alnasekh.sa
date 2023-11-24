@props(['title', 'description' => null])
<div class="mb-4">
    <h4 class="py-2 mb-2">{{ $title }}</h4>
    @if ($description !== null)
        <p>{{ $description }}</p>
    @endif
</div>
