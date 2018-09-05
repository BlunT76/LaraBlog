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

Route::get('/', 'PostController@showposts');

Auth::routes();

Route::get('/home', 'PostController@showposts');

Route::get('/posts', 'PostController@showposts');

Route::get('/create', 'PostController@createposts');
Route::post('/create', 'PostController@storeposts');

Route::get('/edit/{id}', 'PostController@editposts');

Route::get('/remove/{id}', 'PostController@removeposts');

Route::get('/show/{id}', 'PostController@show');
Route::post('/addcomment', 'PostController@addcomment');
//Route::get('/show/create', 'PostController@createposts');