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
Route::resource('posts', 'PostController' );

/**Follow Route */
Route::post('/follows/{profile}', 'FollowController@store')->name('follows.store');