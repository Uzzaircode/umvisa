<?php

Route::group(['middleware' => 'web','namespace' => 'Modules\Department\Http\Controllers'], function()
{
    Route::resource('departments', 'DepartmentsController');
});
