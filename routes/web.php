<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/forum')->group(function(){

	Route::get('/', function () {
	    return view('welcome');
	})->name('index');

	Auth::routes();
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

	Route::get('/home', 'HomeController@index')->name('home');

	/*
	|--------------------------------------------------------------------------
	| Social Media Route
	|--------------------------------------------------------------------------
	*/

	Route::get('{provider}/auth','SocialsController@auth')->name('socail.auth');
	Route::get('auth/{provider}/callback','SocialsController@auth_callback')->name('socail.callback');

});

