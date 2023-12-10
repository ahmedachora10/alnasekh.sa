@props(['status'])

@if ($status)
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
        {{ $status }}
    </div>
@endif
