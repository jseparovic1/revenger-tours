@php
    /** @var $tour \App\Tour */
    $resource = $tour;
@endphp

@extends('admin.layouts.app')

@section('content')
    <main class="bg-white flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="rounded overflow-hidden bg-white mx-2 w-full">
                    <div class="px-6 py-6">
                        <div class="text-xl">Manage tour</div>
                    </div>
                    <div>
                    @component('components.form.form', [
                                'method' => 'put',
                                'action' => route('admin.tours.update', ['tour' => $tour->slug]),
                            ])
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'title'])
                            </div>
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'type', 'placeholder' => 'Tour type "normal" or "private""'])
                            </div>
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'price'])
                            </div>

                            <div class="form-control">
                                @include('components.form.textarea', ['name' => 'details'])
                            </div>
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'hero_short_description'])
                            </div>
                            <div class="form-control">
                                @include('components.form.textarea', ['name' => 'hero_description'])
                            </div>
                            <div class="form-control">
                                @include('components.form.textarea', ['name' => 'card_description'])
                            </div>
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'departure_time'])
                            </div>
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'included'])
                            </div>
                            <div class="form-control">
                                @include('components.form.text', ['name' => 'excluded'])
                            </div>
                            <div class="form-control flex-row justify-start w-48">
                                @include('components.form.checkbox', ['name' => 'recommended'])
                                @include('components.form.checkbox', ['name' => 'featured'])
                            </div>
                            <div class="form-control">
                                @component('components.form.submit') UPDATE TOUR @endcomponent
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
