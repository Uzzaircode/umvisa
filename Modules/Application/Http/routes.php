<?php

Route::group(['middleware' => ['web','timeout'], 'prefix' => 'applications', 'namespace' => 'Modules\Application\Http\Controllers'], function()
{
    Route::get('/', ['uses'=>'ApplicationsController@index','as'=>'applications.index']);
    Route::get('/create', ['uses'=>'ApplicationsController@create','as'=>'applications.create']);
    Route::get('/test',['uses'=>'ApplicationsController@testFlag']);
});
