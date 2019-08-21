<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function store(Article $article,Request $request)
    {
        $article->comments()->create([
            'user_id' => auth()->id(),
            'content'=> $request->comment
        ]);

        return back();
    }
}
