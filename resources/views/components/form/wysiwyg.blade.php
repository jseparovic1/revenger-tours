<label for="{{ $name }}">{{ $label ?? $name }}</label>
<wysiwyg name="{{ $name }}" :value="{{ json_encode(isset($resource->{$name}) ? $resource->{$name} : '') }}"></wysiwyg>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
@isset($help)
    <small id="{{ $name }}" class="form-text text-muted">{{ $help }}</small>
@endisset
