<?php

namespace App\Http\Controllers;

use App\Article;

use App\Http\Requests\StoreArticle;


class ArticleController extends Controller{

    public function __construct(){

        $this->middleware('auth')->except('index','show');
    }



    public function index()
    {
        $articles = Article::latest()->paginate(8);

        $title = 'all article';

        return view("article/index",compact('articles'),compact('title'));
    }


    public function create()
    {
        return view("article/create");
    }


    public function store(StoreArticle $request)
    {

        auth()->user()->articles()->create($request->validated());

        return redirect(route('user.article.index'));

    }


    public function show(Article $article)
    {
        return view("article/show",compact('article'));
    }


    public function edit(Article $article)
    {
        $this->authorize('update',$article);

        return view("article/edit",compact('article'));
    }


    public function update(Article $article,StoreArticle $request)
    {
        $this->authorize('update',$article);

        $article->update($request->validated());

        return redirect(route('article.show',$article));
    }


    public function destroy(Article $article)
    {
        $this->authorize('update',$article);

        $article->delete();

        return redirect(route('user.article.index'));
    }

}
