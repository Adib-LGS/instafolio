<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'welcome');


/**Auhtentification systeme middleware*/
Auth::routes();

/**Home*/
Route::get('/home', 'HomeController@index')->name('home');

/**Profiles Route */
Route::get('/profiles/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('/search', 'ProfileController@search')->name('profiles.search');
Route::get('/profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('/profiles/{user}', 'ProfileController@update')->name('profiles.update');

/**Posts Route */
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

/**Follow Route */
Route::post('/follows/{profile}', 'FollowController@store')->name('follows.store');