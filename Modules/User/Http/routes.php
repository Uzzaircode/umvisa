<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/', 'UserController@index');
});

Route::get('login/{provider}',          'Modules\User\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');