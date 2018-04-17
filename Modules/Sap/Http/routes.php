<?php

Route::group(['middleware' => 'auth', 'namespace' => 'Modules\Sap\Http\Controllers'], function()
{
    Route::resource('saps', 'SapsController');
});
