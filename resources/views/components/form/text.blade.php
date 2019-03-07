@if(!isset($label))
    @php
        $label = \Illuminate\Support\Str::ucfirst(implode(' ', explode('_', $name)))
    @endphp
@endif

@php($value = '')
@if(old($name))
    @php($value = old($name))
@elseif(isset($resource) && !$errors->has($name))
    @php($value = $resource->{$name})
@endif

<label for="{{ $name }}">{{ $label }}</label>
<input
    type="{{ $type ?? 'text' }}"
    {{ isset($type) && $type === 'textarea' ? "cols=15 rows=10": '' }}
    class="{{$class ?? 'form-input'}} {{ $errors->has($name) ? 'is-invalid': '' }} {{ old($name) && !$errors->has($name) ? 'is-valid': '' }}"
    id="{{ $name }}"
    name="{{ $name }}"
    value="{{ $value }}"
    aria-describedby="{{ $name }}"
    placeholder="{{ $placeholder ?? "Enter $name" }}"
    value="{{ old($name) }}"
    {{ ($required ?? null) ? 'required' : '' }}
    {{ ($autofocus ?? null) ? 'autofocus' : '' }}
>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
@isset($help)
    <small id="{{ $name }}" class="form-text text-grey">{{ $help }}</small>
@endisset
