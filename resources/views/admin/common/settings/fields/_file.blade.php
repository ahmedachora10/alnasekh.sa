<div class="form-group mb-3 col-md-6 {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">
    @if (setting($field['name']))
        <img src="{{ asset(str_replace('public/', 'storage/', \setting($field['name'] ?? ''))) }}"
            class=" img-thumbnail mb-2" width="100" height="100">
    @endif
    <label for="{{ $field['name'] ?? '' }}"
        class="mb-2">{{ trans('settings.' . strtolower($field['label'] ?? '')) }}</label>
    <input type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}"
        value="{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}"
        class="form-control {{ $field['class'] ?? '' }}" id="{{ $field['name'] ?? '' }}"
        placeholder="{{ $field['label'] ?? '' }}">

    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>
