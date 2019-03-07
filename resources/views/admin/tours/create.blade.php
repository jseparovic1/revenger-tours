@extends('admin.layouts.app')

@section('content')
    <main class="bg-white flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="rounded overflow-hidden bg-white mx-2 w-full">
                    <div class="px-6 py-6">
                        <div class="text-xl">Create tour</div>
                    </div>
                    <div>
                        @component('components.form.form', [
                                    'method' => 'post',
                                    'action' => route('admin.tours.store'),
                                ])
                            <div class="form-control">
                                @include('components.form.imageUpload', ['name' => 'hero', 'label' => 'Hero image'])
                            </div>
                            @include('admin.tours._form')
                            <div class="form-control">
                                @component('components.form.submit') CREATE TOUR @endcomponent
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
