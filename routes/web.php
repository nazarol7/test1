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

Route::get('/', 'CategoriesController@index');
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/create', 'CategoriesController@create');   
Route::post('/categories/store', 'CategoriesController@store');
Route::get('/categories/{id}', 'CategoriesController@show');

Route::delete('/categories/{id}', 'CategoriesController@destroy');
Route::get('/categories/create/{id}', 'CategoriesController@create');

Route::post('/posts/store', 'PostsController@store');

Route::get('/posts/create/{id}', 'PostsController@create');

Route::get('/posts/{id}', 'PostsController@show');
Route::delete('/posts/{id}', 'PostsController@destroy');

Route::get('/categories/{id}/edit', 'CategoriesController@edit');
Route::put('/categories/update/{id}', 'CategoriesController@update');


Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::put('/posts/update/{id}', 'PostsController@update');


Route::get('/posts/{id}/comments', 'CommentController@index');
Route::post('/post/{id}/comment', 'CommentController@store'); 