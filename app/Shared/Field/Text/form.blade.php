@php
    /** @var $field \App\Shared\Field\FieldInterface */
@endphp
<label for="{{ $field->name() }}">{{ $field->label() }}</label>
<input
        type="text"
        class="form-input {{ $errors->has($name) ? 'is-invalid': '' }} {{ old($name) && !$errors->has($name) ? 'is-valid': '' }}"
        id="{{ $field->name() }}"
        name="{{ $field->name() }}"
        value="{{ $field->value() ?? old($field->value()) }}"
        aria-describedby="{{ $field->name() }}"
        placeholder="{{ $field->value() }}"
        {{--{{ ($required ?? null) ? 'required' : '' }}--}}
>
<div class="invalid-feedback">{{ $errors->has($field->name()) ? $errors->first($field->name()) : ''}}</div>
