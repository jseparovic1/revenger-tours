@php
    /** @var $tours \App\Tour[] */
@endphp

@extends('admin.layouts.app')

@section('content')
    <main class="bg-white flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="rounded overflow-hidden bg-white mx-2 w-full">
                    <div class="px-6 py-6">
                        <div class="text-xl">Manage tour categories</div>
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
                                    <td>{{ $tour->updated_at }}</td>
                                    <td class="flex">
                                        <a class="py-2 px-4 bg-info-dark rounded-full text-white" href="{{ route('tours.show', ['tour' => $tour->slug]) }}">SHOW</a>
                                        <a class="py-2 px-4 bg-info-dark rounded-full text-white" href="{{ route('tours.edit', ['tour' => $tour->slug]) }}">EDIT</a>
                                        <form action="{{ route('tours.destroy', ['tour' => $tour]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="py-2 px-4 bg-brand-darker rounded-full text-white" onclick="confirm('Are you sure to delete this tour')" >DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /card -->
            </div>
            <!-- /Cards Section Ends Here -->
        </div>
    </main>
@endsection
