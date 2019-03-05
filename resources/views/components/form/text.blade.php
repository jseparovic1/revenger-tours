@php
/**
props
    label
    name
    type
    name
    placeholder
    required
    autofocus
    help
**/
@endphp

<label for="{{ $name }}">{{ $label ?? $name }}</label>
<input
    type="{{ $type ?? 'text' }}"
    class="{{$class ?? 'form-input'}} {{ $errors->has($name) ? 'is-invalid': '' }} {{ old($name) && !$errors->has($name) ? 'is-valid': '' }}"
    id="{{ $name }}"
    name="{{ $name }}"
    value="{{ $resource->{$name} ?? null }}"
    aria-describedby="{{ $name }}"
    placeholder="{{ $placeholder ?? "Enter $name" }}"
    value="{{ $oldValue ?? old($name) }}"
    {{ ($required ?? null) ? 'required' : '' }}
    {{ ($autofocus ?? null) ? 'autofocus' : '' }}
>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
@isset($help)
    <small id="{{ $name }}" class="form-text text-muted">{{ $help }}</small>
@endisset
