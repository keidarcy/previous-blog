<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.pages.home');
});

Route::get('/home', 'XControllers\HomeController@home')->name('home');
Route::get('/about', 'XControllers\HomeController@about')->name('about');
Route::get('/nihao', 'XControllers\PhraseController@insert');



Auth::routes();

//oute::get('/home', 'HomeController@index')->name('home');

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@getPosts')->name('blog.index');
    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@findPostBySlug')->name('blog.post');
    Route::get('tag/{slug}', 'BlogController@getPostsByTag')->name('blog.tag');
    Route::get('topic/{slug}', 'BlogController@getPostsByTopic')->name('blog.topic');
});

Route::get('/blogs', 'XControllers\PostController@index');
Route::get('/show/{id}', 'XControllers\PostController@show');


Route::post('/message/create', 'XControllers\MessageController@create');
