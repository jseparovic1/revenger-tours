<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TourResourceRequest;
use App\Tour;
use Illuminate\Http\Request;

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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourResourceRequest $request, Tour $tour)
    {
        $tour->update($request->validated());

        $request->session()->flash('status', 'Tour edited successfully.');

        return redirect()->route('admin.tours.edit', compact('tour'));
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(Tour $tour, Request $request)
    {
        $tour->delete();

        $request->session()->flash('status', 'Tour deleted successfully.');

        return redirect()->route('tours.index');
    }
}
