<?php

Route::View('/', 'frontend.pages.home')->name('home');
Route::View('/about', 'frontend.pages.about')->name('about');
Route::View('/posts/{slug?}', 'frontend.pages.post');
Route::View('/show/{post}', 'frontend.pages.show');
Route::View('/welcome', 'frontend.pages.welcome', ['now' => Carbon\Carbon::now()])->middleware('auth');
// Route::View('/calendar', 'frontend.pages.calendar');
// Route::get('/show/{post}', 'XControllers\PostController@show');
Route::post('/message/create', 'XControllers\MessageController@create');

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@getPosts')->name('blog.index');
    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@findPostBySlug')->name('blog.post');
    Route::get('tag/{slug}', 'BlogController@getPostsByTag')->name('blog.tag');
    Route::get('topic/{slug}', 'BlogController@getPostsByTopic')->name('blog.topic');
});

Route::prefix('/thisisxyyo')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::any('/lab/{all}', function () {
    return view('frontend.pages.lab');
})->where(['all' => '.*']);
