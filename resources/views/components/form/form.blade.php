@if(mb_strtolower($method) === 'put' || mb_strtolower($method) === 'patch')
    @php
        $methodHelper = mb_strtoupper($method);
        $method = 'post';
    @endphp
@endif

<form
    action="{{ $action }}"
    method="{{ $method ?? 'post'}}"
    class="{{ $class ?? '' }}"
>
    @if(isset($methodHelper))
        @method($methodHelper)
    @endif
    {{ csrf_field() }}
    {{ $slot ?? null }}
</form>
