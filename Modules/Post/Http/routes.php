<?php

Route::group(['middleware' => 'web', 'prefix' => 'backend', 'namespace' => 'Modules\Post\Http\Controllers'], function()
{
    Route::resource('posts', 'PostsController');
});
