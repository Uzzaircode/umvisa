<?php

Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'namespace' => 'Modules\Post\Http\Controllers'], function()
{
    Route::resource('posts', 'PostsController');
});
