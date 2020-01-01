<?php

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@getPosts')->name('blog.index')->middleware('auth');
    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@findPostBySlug')->name('blog.post')->middleware('auth');
    Route::get('tag/{slug}', 'BlogController@getPostsByTag')->name('blog.tag')->middleware('auth');
    Route::get('topic/{slug}', 'BlogController@getPostsByTopic')->name('blog.topic')->middleware('auth');
});

Route::prefix('/thisisxyyo')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

// Route::any('/lab/{all}', function () {
//     return view('frontend.pages.lab');
// })->where(['all' => '.*']);

Route::View('/test', 'frontend.pages.test')->name('test')->middleware('auth');

Route::any('/{all}', function () {
    return view('main');
})->where(['all' => '.*']);
