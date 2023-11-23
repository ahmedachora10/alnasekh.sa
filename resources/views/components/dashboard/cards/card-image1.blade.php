<div class="card bg-dark text-white">
    <img src="{{ $image }}" class="card-img" alt="image">
    <div class="card-img-overlay">
        @if ($title)
            <h5 class="card-title">{{ $title }}</h5>
        @endif

        @if ($description)
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content.
                This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        @endif
    </div>
</div>
