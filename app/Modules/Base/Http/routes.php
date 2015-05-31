<?php

Route::group(['prefix' => 'tools'], function() {
    Route::get('{tool}', 'ToolsController@show');
    // TODO: Figure out why resourceful routing doesn't work:
    // Route::resource('/', 'ToolsController', [
    //     'only'=>['show']
    // ]);
});
