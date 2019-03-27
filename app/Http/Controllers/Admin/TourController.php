<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Disk;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TourResourceRequest;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tours.index', [
            'tours' => Tour::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tours.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourResourceRequest $request)
    {
        $validatedData = $request->validated();

        $hero = array_pull($validatedData,'hero');

        $tour = Tour::create($validatedData);

        $this->uploadImages($tour, $hero, 'hero_original');

        $request->session()->flash('status', 'Tour created successfully.');

        return redirect()->route('admin.tours.edit', $tour->slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', ['resource' => $tour]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourResourceRequest $request, Tour $tour)
    {
        $validatedData = $request->validated();
        dd($validatedData);
        $hero = array_pull($validatedData,'hero');

        $tour->update($validatedData);

        $this->uploadImages($tour, $hero, 'hero_original');

        $request->session()->flash('status', 'Tour edited successfully.');

        return redirect()->route('admin.tours.edit', ['resource' => $tour]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(Tour $tour, Request $request)
    {
        $tour->delete();
        $request->session()->flash('status', 'Tour deleted successfully.');

        return redirect()->route('admin.tours.index');
    }

    /**
     * @param Tour $tour
     * @param $hero
     */
    private function uploadImages(Tour $tour, $hero, $collection): void
    {
        $storedMedia = $tour->media->pluck('file_name')->toArray();

        collect($hero)
            ->reject(function($image) use ($storedMedia) {
                return in_array($image, $storedMedia);
            })->each(function ($image) use ($tour, $collection) {
                $tour->addMedia(Storage::disk(Disk::TEMPORARY)->path($image))->toMediaCollection($collection);
            });
    }
}
