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

//Route::view('/', 'welcome'); Version optimiser 
Route::get('/', function () {
    return view('welcome');
});

/**Auhtentification systeme middleware*/
Auth::routes();

/**DashBoard */
Route::get('/home', 'HomeController@index')->name('home');

/**RestFull Pathern for the Controllers */
Route::get('/profiles/{user}', 'ProfileController@show')->name('profiles.show');
