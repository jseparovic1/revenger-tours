<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Disk;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostResourceRequest;
use App\Http\Requests\Admin\TourResourceRequest;
use App\Post;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourResourceRequest $request)
    {
        $validatedData = $request->validated();

//        $hero = array_pull($validatedData,'hero');

        $post = Post::create($validatedData);

//        $this->uploadImages($tour, $hero, 'hero_original');

        $request->session()->flash('status', 'Post created successfully.');

        return redirect()->route('admin.posts.edit', $post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['resource' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostResourceRequest $request, Post $post)
    {
        $validatedData = $request->validated();

//        $hero = array_pull($validatedData,'hero');

        $post->update($validatedData);

//        $this->uploadImages($post, $hero, 'hero_original');

        $request->session()->flash('status', 'Post edited successfully.');

        return redirect()->route('admin.posts.edit', ['resource' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(Post $post, Request $request)
    {
        $post->delete();
        $request->session()->flash('status', 'Post deleted successfully.');

        return redirect()->route('admin.posts.index');
    }

    /**
     * @param Tour $tour
     * @param $hero
     */
    private function uploadImages(Post $post, $hero, $collection): void
    {
        $storedMedia = $post->media->pluck('file_name')->toArray();

        collect($hero)
            ->reject(function($image) use ($storedMedia) {
                return in_array($image, $storedMedia);
            })->each(function ($image) use ($post, $collection) {
                $post->addMedia(Storage::disk(Disk::TEMPORARY)->path($image))->toMediaCollection($collection);
            });
    }
}
