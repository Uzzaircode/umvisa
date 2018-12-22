<?php

Route::group(['middleware' => 'auth', 'prefix' => 'travel', 'namespace' => 'Modules\Travel\Http\Controllers'], function () {
    Route::resource('/', 'TravelsController');
});
