<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'project003'], function() {
    Route::resource('/api/tasks', 'TaskController',
        ['only' => ['index','store','show','update','destroy']]);
    Route::get('/', 'Project003Controller@index');
    Route::get('/{page}', 'Project003Controller@show');
});
