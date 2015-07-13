<?php

Route::get('/', 'WelcomeController@index');
Route::get('/history', 'WelcomeController@history');

Route::controller('/dev', 'DevController');
