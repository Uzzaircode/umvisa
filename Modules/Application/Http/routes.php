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
    Route::get('/users/search', 'ApplicationsController@loadUsers');
       
});

Route::group(['middleware'=>['web','timeout'],'prefix'=>'financialinstruments','namespace'=>'Modules\Application\Http\Controllers'],function(){
    Route::get('/', ['uses'=>'FinancialinstrumentController@index','as'=>'finins.index']);
});

Route::group(['prefix'=>'country','middleware'=>['web','timeout']],function(){
    Route::get('/',function(){
        $country = new PragmaRX\Countries\Package\Countries;
        $country = $country->all();
        // return $brazil = $country->where('name.common','Brazil')->hydrate('flag');
        return view('application::test',compact('country'));
    });
});

Route::group(['middleware'=>'api','namespace' => 'Modules\Application\Http\Controllers','prefix'=>'api'],function(){
    Route::resource('apps','ApplicationsController');
});



