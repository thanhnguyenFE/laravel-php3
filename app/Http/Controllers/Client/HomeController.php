<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $banners = (new \App\Models\Banner())->getBannersActive();
        $movies = (new \App\Models\Movie())->getMoviesActive();
        return view('client.index', compact('movies', 'banners'));
    }

    public function comment(Request $request){
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
