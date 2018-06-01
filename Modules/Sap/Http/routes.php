<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Sap\Http\Controllers'], function()
{
    Route::resource('saps', 'SapsController');
});
