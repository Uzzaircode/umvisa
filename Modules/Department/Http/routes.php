<?php

Route::group(['middleware' => ['web','timeout'],'namespace' => 'Modules\Department\Http\Controllers'], function()
{
    Route::resource('departments', 'DepartmentsController');
});
