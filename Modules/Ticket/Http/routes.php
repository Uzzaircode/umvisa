<?php
use Modules\Sap\Entities\Sap;
use Illuminate\Support\Facades\Input;
use Modules\Ticket\Http\Controllers\TicketsController;
use App\Notifications\TicketSubmitted;

Route::group(['middleware' => 'web','namespace' => 'Modules\Ticket\Http\Controllers'], function()
{
    Route::resource('tickets', 'TicketsController');
    Route::post('tickets/{ticket}',['uses'=>'TicketsController@approve','as'=>'tickets.approve']);
    Route::post('tickets/{ticket}/read',['uses'=>'TicketsController@read','as'=>'tickets.read']);
    Route::post('tickets/{id}/{ticket_id}/markread',['uses'=>'TicketsController@markread','as'=>'tickets.markread']);
    Route::resource('replies','RepliesController');
    Route::get('sapcode','RepliesController@getSapCode')->name('sapcode');
    Route::delete('/massdelete', ['uses' => 'TicketsController@massdelete', 'as' => 'tickets.massdelete']);  
});

