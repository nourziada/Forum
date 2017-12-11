<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/forum')->group(function(){

    /*
	|--------------------------------------------------------------------------
	| Index and Home Route
	|--------------------------------------------------------------------------
	*/

	Route::get('/', function () {
	    return view('welcome');
	})->name('index');

    Route::get('/home', 'HomeController@index')->name('home');

    /*
	|--------------------------------------------------------------------------
	| Authontication Route
	|--------------------------------------------------------------------------
	*/

	Auth::routes();
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


	/*
	|--------------------------------------------------------------------------
	| Social Media Route
	|--------------------------------------------------------------------------
	*/

	Route::get('{provider}/auth','SocialsController@auth')->name('socail.auth');
	Route::get('auth/{provider}/callback','SocialsController@auth_callback')->name('socail.callback');


    /*
    |--------------------------------------------------------------------------
    | Channels Route
    |--------------------------------------------------------------------------
    */

    Route::resource('/admin/channel' , 'ChannelsController');


    /*
    |--------------------------------------------------------------------------
    | Discussions Route
    |--------------------------------------------------------------------------
    */
    Route::post('/discuss/{id}/reply' , 'DiscussionsController@reply')->name('discuss.reply');
    Route::resource('/discuss' , 'DiscussionsController');
});

