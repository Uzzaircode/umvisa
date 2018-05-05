<?php

Route::group(['middleware' => ['web','auth','timeout'], 'namespace' => 'Modules\Sap\Http\Controllers'], function()
{
    Route::resource('saps', 'SapsController');
});
