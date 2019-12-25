<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function index(Post $id){
        return response()->json($post->comments()->latest()->get());
    }

    public function store(Request $request, Post $id){
        $comment = $post->comments()->create([
            'author' => $request->author,
            'content' => $request->content,

        ]);
            
       $comment = Comment::where('id', $comment->id)->first();

        return $comment->toJson();
    }
}
