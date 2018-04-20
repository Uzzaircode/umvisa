<?php

Route::group(['middleware' => 'web','namespace' => 'Modules\Ticket\Http\Controllers'], function()
{
    Route::resource('tickets', 'TicketsController');
});
