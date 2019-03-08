<label for="{{$name}}[]">{{ $label }}</label>
<image-upload
    label="{{ $label }}"
    input-name="{{ $name }}"
    :images="{{ isset($images) ? $images->toJson() : '[]' }}"
    {{ isset($edit) ? 'is-edit-action' : '' }}
    resource="{{ isset($resource) ? get_class($resource) : null }}"
    {{ isset($resourceId) ? "resource-id={$resourceId}" : '' }}
    collection-name="{{ $collectionName ?? null }}"
></image-upload>
<div class="invalid-feedback">{{ $errors->has($name) ? $errors->first($name) : ''}}</div>
