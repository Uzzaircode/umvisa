<?php
use Modules\Sap\Entities\Sap;
use Illuminate\Support\Facades\Input;
use Modules\Ticket\Http\Controllers\TicketsController;

Route::group(['middleware' => ['web','timeout'],'namespace' => 'Modules\Ticket\Http\Controllers'], function()
{
    Route::resource('tickets', 'TicketsController');
    Route::post('tickets/{ticket}',['uses'=>'TicketsController@approve','as'=>'tickets.approve']);
    Route::post('tickets/{ticket}/read',['uses'=>'TicketsController@read','as'=>'tickets.read']);
    Route::resource('replies','RepliesController');
    Route::get('sapcode','RepliesController@getSapCode')->name('sapcode');    
});

