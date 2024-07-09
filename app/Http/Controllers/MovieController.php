<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'duration' => 'required|string|max:50',
            'release_date' => 'required|date',
        ]);
//        dd($request->file('thumbnail')->store('public/movies'));
        $movie = new Movie();
        $thumbnailName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->storeAs('public/movies', $thumbnailName);
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;
        $movie->thumbnail = $thumbnailName;
        $movie->status = $request->status;
        $movie->save();
        return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
