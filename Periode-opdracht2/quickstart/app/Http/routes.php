<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () { 
    // DIT IS DE FIX VOOR HET ERROR PROBLEEM

	Route::get('/', function () {
		return view('welcome');
	});

	// Task Routes
	Route::get('/tasks', 'TaskController@index');
	Route::post('/task', 'TaskController@store');
	Route::delete('/task/{task}', 'TaskController@destroy');
	// Authentication Routes...
	Route::auth();
	

});