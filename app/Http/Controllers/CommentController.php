<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showDetailComment(Request $request)
    {
        try {
            $comment_id = $request->input('comment_id');
            $comment = Comment::find($comment_id);
            $user = $comment->user;
            $movie = $comment->movie;
            $comment->user = $user;
            $comment->movie = $movie;
            $comment->makeHidden('user_id', 'movie_id');
            return response()->json($comment);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'rating' => 'required',
//            'status' => 'required',
        ]);
        $comment_id = $request->input('comment_id');
        $comment = Comment::find($comment_id);
        $comment->content = $request->input('content');
        $comment->rating = $request->input('rating');
        $comment->status = $request->input('status');
        $comment->save();
        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::find($id)->delete();
        return redirect()->route('schedules.index')->with('success', 'Comment deleted successfully!');
    }
}
