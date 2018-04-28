<?php
use Modules\Sap\Entities\Sap;
use Illuminate\Support\Facades\Input;

Route::group(['middleware' => 'web','namespace' => 'Modules\Ticket\Http\Controllers'], function()
{
    Route::resource('tickets', 'TicketsController');
    Route::post('tickets/{ticket}',['uses'=>'TicketsController@approve','as'=>'tickets.approve']);  
    Route::resource('replies','RepliesController');
    Route::get('sapcode','RepliesController@getSapCode')->name('sapcode');
    
});

