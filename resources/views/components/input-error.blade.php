@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            {{ $message }}
        </div>
    @break
@endforeach
@endif
