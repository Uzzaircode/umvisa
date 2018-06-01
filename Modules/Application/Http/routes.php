<?php

Route::group(['middleware' => 'web','namespace' => 'Modules\Application\Http\Controllers'], function()
{
    Route::resource('applications', 'ApplicationsController');
});
