<?php

Route::group(['middleware' => ['web','timeout'],'namespace' => 'Modules\Application\Http\Controllers'], function()
{
    Route::resource('applications', 'ApplicationsController');
});
