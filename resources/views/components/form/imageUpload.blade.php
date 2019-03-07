<label for="{{$name}}[]">{{ $label }}</label>
<image-upload
    label="{{ $label }}"
    input-name="{{ $name }}"
    :images="{{ isset($images) ? $images->toJson() : '[]' }}"
></image-upload>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
