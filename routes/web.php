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

// Guest routes
Route::get('/', 'PostController@showposts');

Auth::routes();

Route::get('/home', 'PostController@showposts');

Route::get('/posts', 'PostController@showposts');

Route::get('/show/{id}', 'PostController@show');

//Logged users routes
Route::post('/create', 'PostController@storeposts', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('/edit/{id}', 'PostController@editposts', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('/remove/{id}', 'PostController@removeposts', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::post('/addcomment', 'PostController@addcomment', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('create','PostController@createposts', function () {
    // Only authenticated users may enter...
})->middleware('auth');

//Fallback routes
Route::any('{all}', array('uses' => 'PostController@showposts'))->where('all', '.*');