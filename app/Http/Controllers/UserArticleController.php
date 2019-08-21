<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;

class UserArticleController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $articles = auth()->user()->articles()->latest()->paginate(8);

        $title = 'my article';

        return view('article/index',compact('articles'),compact('title'));

    }

}
