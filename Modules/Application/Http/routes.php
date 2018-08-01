<?php

Route::group(['middleware' => ['web','timeout'], 'prefix' => 'applications', 'namespace' => 'Modules\Application\Http\Controllers'], function()
{   
    Route::resource('applications','ApplicationsController',['except'=>['index','create','store']]);
    Route::get('/', ['uses'=>'ApplicationsController@index','as'=>'applications.index']);
    Route::get('create', ['uses'=>'ApplicationsController@create','as'=>'applications.create']);
    Route::post('store',['uses'=>'ApplicationsController@store','as'=>'applications.store']);
    
    Route::group(['middleware'=>['signed']],function(){
        Route::get('{id}/edit',['uses'=>'ApplicationsController@edit','as'=>'applications.edit']);
        Route::get('{id}/show',['uses'=>'ApplicationsController@show','as'=>'applications.show']);
        
    });
    Route::post('{id}/create/remarks',['uses'=>'ApplicationsController@createRemarks','as'=>'create.remarks']);
    Route::get('letter','ApplicationsController@letter');
       
});

Route::group(['middleware'=>['web','timeout'],'prefix'=>'financialinstruments','namespace'=>'Modules\Application\Http\Controllers'],function(){
    Route::get('/', ['uses'=>'FinancialinstrumentController@index','as'=>'finins.index']);

});