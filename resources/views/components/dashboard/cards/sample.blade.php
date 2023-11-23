<div class="row">
    <div class="{{ $column }}">
        <div {{ $attributes->merge(['class' => 'card mb-4']) }}>
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
