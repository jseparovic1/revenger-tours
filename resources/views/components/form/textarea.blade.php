@if(!isset($label))
    @php
        $label = \Illuminate\Support\Str::ucfirst(implode(' ', explode('_', $name)))
    @endphp
@endif

<label for="{{ $name }}">{{ $label }}</label>
<textarea
    rows={{ $rows ?? '5' }}
    class="{{$class ?? 'form-input'}} {{ $errors->has($name) ? 'is-invalid': '' }} {{ old($name) && !$errors->has($name) ? 'is-valid': '' }}"
    id="{{ $name }}"
    name="{{ $name }}"
    aria-describedby="{{ $name }}"
    placeholder="{{ $placeholder ?? "Enter $name" }}"
>{{ isset($resource) ? $resource->{$name} : old($name) }}</textarea>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
@isset($help)
    <small id="{{ $name }}" class="form-text text-grey">{{ $help }}</small>
@endisset
