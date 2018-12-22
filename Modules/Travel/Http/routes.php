<?php

Route::group(['middleware' => 'web', 'prefix' => 'travel', 'namespace' => 'Modules\Travel\Http\Controllers'], function()
{
    Route::get('/', 'TravelController@index');
});
