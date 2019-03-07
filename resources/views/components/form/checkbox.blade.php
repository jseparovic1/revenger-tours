<div class="flex items-center justify-end {{ $class ?? null }}">
    <label class="w-64 mr-2" style="margin-top: 0.3rem" for="{{ $name }}">
        {{ $label ?? $name }}
    </label>
    <input
        type="checkbox"
        value="1"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ old($name) ? 'checked' : '' }}
        {{ isset($resource) ? ($resource->{$name} ? 'checked': '') : '' }}
    >
</div>

