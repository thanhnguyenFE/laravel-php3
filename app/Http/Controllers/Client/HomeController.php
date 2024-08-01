<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $categories = \App\Models\Category::all()->where('status', 1);
        if ($request->query('search') && !$request->query('category')) {
            $search = $request->query('search');
            $active = Movie::where('status', 1);
            $movies = $active->where('title', 'like', '%' . $search . '%')->get();
            $category_id = null;
        } else if ($request->query('category') && $request->query('search')) {
            $category = $request->query('category');
            $category_id = \App\Models\Category::where('name', $category)->first()->id;
            $search = $request->query('search');
            $active = Movie::where('status', 1);
            $movies = $active->where('title', 'like', '%' . $search . '%')
                ->whereHas('categories', function ($query) use ($category_id) {
                    $query->where('categories.id', $category_id);
                })
                ->with('categories')
                ->get();
        } else if ($request->query('category') && !$request->query('search')) {
            $category = $request->query('category');
            $category_id = \App\Models\Category::where('name', $category)->first()->id;
            $search = null;
            $movies = Category::find($category_id)->movies()->where('status', 1)->get();
        } else {
            $category_id = null;
            $search = null;
            $movies = (new \App\Models\Movie())->getMoviesActive();
        }
        $banners = (new \App\Models\Banner())->getBannersActive();
        return view('client.index', compact('movies', 'banners', 'search', 'categories', 'category_id'));
    }

    public function comment(Request $request)
    {
        $comment = new \App\Models\Comment();
        $comment->user_id = auth()->user()->id;
        $comment->movie_id = $request->movie_id;
        $comment->content = $request->comment;
        $comment->rating = $request->rating;
        $comment->date = Carbon::now();
        $comment->save();
        return redirect()->back()->with('success', 'Đánh giá bộ phim thành công!');
    }
}
