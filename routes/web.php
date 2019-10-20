<?php

Auth::routes();

Route::View('/', 'frontend.pages.home')->name('home');
Route::View('/about', 'frontend.pages.about')->name('about');
Route::View('/posts/{slug?}', 'frontend.pages.post');
Route::View('/show/{post}', 'frontend.pages.show');
// Route::get('/show/{post}', 'XControllers\PostController@show');
Route::post('/message/create', 'XControllers\MessageController@create');

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@getPosts')->name('blog.index');
    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@findPostBySlug')->name('blog.post');
    Route::get('tag/{slug}', 'BlogController@getPostsByTag')->name('blog.tag');
    Route::get('topic/{slug}', 'BlogController@getPostsByTopic')->name('blog.topic');
});

// Route::get('/nihao', 'XControllers\PhraseController@insert');
