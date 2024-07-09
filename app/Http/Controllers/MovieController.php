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
        $movies = Movie::with('categories')->get();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.movies.create', compact('categories'));
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
            'duration' => 'required|integer|min:0',
            'release_date' => 'required|date',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
        ]);

        $hours = floor($request->duration / 60);
        $minutes = $request->duration % 60;
        $duration = sprintf('%02d:%02d:00', $hours, $minutes);

        $movie = new Movie();
        $thumbnailName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->storeAs('public/movies', $thumbnailName);
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->description = $request->description;
        $movie->duration = $duration;
        $movie->release_date = $request->release_date;
        $movie->thumbnail = $thumbnailName;
        if($request->has('status')) {
            $movie->status = $request->status;
        }
        $movie->save();
        $movie->categories()->attach($request->category_ids);
        return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::with('categories')->find($id);
        return view('admin.movies.show', compact('movie'));
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
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
