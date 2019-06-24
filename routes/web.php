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

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::get('/p/{post}/edit', 'PostsController@edit')->middleware('admin');
Route::patch('/p/edit/{post}', 'PostsController@update')->middleware('admin');
Route::delete('/p/delete/{post}', 'PostsController@destroy')->middleware('admin');

Route::post('comment/{post}', 'CommentsController@store');
Route::get('comment/{post}', 'CommentsController@get');
Route::delete('comment/delete/{post}', 'CommentsController@destroy');

Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login');

Route::post('/logout', 'Auth\LogoutController@logout');

Route::get('/dashboard', 'DashboardController@index');
