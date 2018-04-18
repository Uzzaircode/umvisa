<?php

Route::group(['middleware' => ['web','auth'], 'namespace' => 'Modules\Sap\Http\Controllers'], function()
{
    Route::resource('saps', 'SapsController');
});
