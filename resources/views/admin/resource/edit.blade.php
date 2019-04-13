@php
    /** @var $resource \App\Tour */
@endphp

@extends('admin.layouts.app')

@section('content')
    <main class="bg-white flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="rounded overflow-hidden bg-white mx-2 w-full">
                    <div class="px-6 py-6">
                        <div class="text-xl">Manage {{ $resourceName }}</div>
                    </div>
                    <div>
                        @component('components.form.form', [
                                    'method' => 'put',
                                    'action' => route("admin.{$resourceRouteKey}.update", [
                                        strtolower($resourceName) => $resource->{$identifier}]
                                    ),
                                ])
                            @include("admin.{$resourceRouteKey}._form")
                            <div class="form-control">
                                @component('components.form.submit')
                                    UPDATE {{ $resourceName }}
                                @endcomponent
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
