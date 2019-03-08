@php
    /** @var $tours \App\Tour[] */
@endphp

@extends('admin.layouts.app')

@section('content')
    <main class="bg-white flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="rounded overflow-hidden bg-white mx-2 w-full">
                    <div class="px-6 py-6 flex justify-between">
                        <div class="text-xl">Manage tour categories</div>
                        <a href="{{ route('admin.tours.create') }}" class="py-2 px-4 border rounded-full text-black hover:border-brand">+ CREATE TOUR</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-black">
                            <thead class="bg-brand-darkest text-white text-normal">
                            <tr>
                                <th>Tour</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tours as $tour)
                                <tr class="border-none">
                                    <th class="border-none">{{ $tour->title }}</th>
                                    <td>{{ \Illuminate\Support\Str::words($tour->hero_description, 6) }}</td>
                                    <td>€ {{ $tour->price }} </td>
                                    <td>{{ $tour->type }} </td>
                                    <td>{{ $tour->updated_at->diffForHumans() }}</td>
                                    <td class="flex">
                                        <a class="py-2 px-4 border rounded-full text-black hover:text-grey" href="{{ route('tours.show', ['tour' => $tour->slug]) }}">SHOW</a>
                                        <a class="py-2 px-4 border rounded-full text-black hover:text-grey" href="{{ route('admin.tours.edit', ['tour' => $tour->slug]) }}">EDIT</a>
                                        <form action="{{ route('admin.tours.destroy', ['tour' => $tour]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="py-2 px-4 bg-brand-darker rounded-full text-white hover:text-grey">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
