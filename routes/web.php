<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/article', 'UserArticleController@index')->name('user.article.index');

Route::post('/article/{article}/comment', 'CommentController@store');

Route::resource('article','ArticleController');

Route::fallback(function () {
    return 'page not found';
});

//Route::get('/messages', 'MessageController@index')->name('messages');
