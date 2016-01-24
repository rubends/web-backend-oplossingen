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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', function () {
    return view('welcome');
	});

    Route::get('/tasks', 'TaskController@index');
    //Route::get('/tasks', 'DoneTaskController@index'); GAAT NIET
    Route::get('/newtask', 'TaskController@newtask');
	Route::post('/task', 'TaskController@store');
	Route::delete('/task/{task}', 'TaskController@destroy');
	Route::delete('/donetask/{task}', 'TaskController@donedestroy');
	Route::any('/donetask/{task}/{name}', 'TaskController@done');
    Route::any('/notdone/{task}/{name}', 'TaskController@notdone');

    Route::auth();

    Route::get('/dashboard', function () {
    return view('home');
	});
});
