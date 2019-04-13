@php
    /** @var $resources \App\Http\Controllers\Admin\ViewModel\PostViewModel[] */
@endphp

@extends('admin.layouts.app')

@section('content')
    @component('admin.layouts.index', [
        'resourceName' => $resourceName,
        'headers' => $headers,
    ])
        @foreach($resources as $resource)
            <tr class="border-none">
                @foreach($fields as $field)
                    <td>{{ $resource->{$field}() }}</td>
                @endforeach
                <td class="flex">
                    <a class="py-2 px-4 border rounded-full text-black hover:text-grey"
                       target="_blank"
                       href="{{ route("{$resourceRouteKey}.show", [$resourceRouteKey => $resource->slug()]) }}">SHOW</a>
                    <a class="py-2 px-4 border rounded-full text-black hover:text-grey"
                       href="{{ route("admin.{$resourceRouteKey}.edit", [$resourceRouteKey => $resource->slug()]) }}">EDIT</a>
                    <form action="{{ route("admin.{$resourceRouteKey}.destroy", [$resourceRouteKey => $resource->slug()]) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="py-2 px-4 bg-brand-darker rounded-full text-white hover:text-grey">DELETE
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
