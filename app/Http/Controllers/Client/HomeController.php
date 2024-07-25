<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $movies = (new \App\Models\Movie())->getMoviesActive();
        return view('client.index', compact('movies'));
    }
}
