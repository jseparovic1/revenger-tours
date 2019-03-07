<label for="{{ $name }}">{{ $label ?? $name }}</label>

@php($value = '')

@if(old($name) !== 'null')
    @php($value = old($name))
@elseif(isset($resource))
    @php($value = $resource->{$name})
@endif

<wysiwyg
    name="{{ $name }}"
    old-value='{!! $value !!}'
>
</wysiwyg>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
@isset($help)
    <small id="{{ $name }}" class="form-text text-muted">{{ $help }}</small>
@endisset
