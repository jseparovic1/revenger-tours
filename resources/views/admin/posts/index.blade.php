@php
    /** @var $posts \App\Post[] */
@endphp

@extends('admin.layouts.app')

@section('content')
    <main class="bg-white flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="rounded overflow-hidden bg-white mx-2 w-full">
                    <div class="px-6 py-6 flex justify-between">
                        <div class="text-xl">Manage Posts</div>
                        <a href="{{ route('admin.posts.create') }}" class="py-2 px-4 border rounded-full text-black hover:border-brand">+ CREATE POST</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-black">
                            <thead class="bg-brand-darkest text-white text-normal">
                                <tr>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr class="border-none">
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug  }}</td>
                                    <td>€ {{ str_limit($post->description , 50, '...') }} </td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td class="flex">
                                        <a class="py-2 px-4 border rounded-full text-black hover:text-grey" href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">SHOW</a>
                                        <a class="py-2 px-4 border rounded-full text-black hover:text-grey" href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}">EDIT</a>
                                        <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="POST">
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
