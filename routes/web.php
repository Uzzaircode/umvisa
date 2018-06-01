<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses'=>'Auth\LoginController@showLoginForm']);
// Auth
Auth::routes();
// OAuth
Route::get('login/{provider}',          'Auth\SocialAccountsController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountsController@handleProviderCallback');

Route::group( ['middleware' => 'auth'], function() {
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::get('myprofile', 'UsersController@myprofile');
    Route::post('myprofile/update/{id}', 'UsersController@profileUpdate')->name('profile.update');
    Route::get('notifications','NotificationsController@index')->name('notifications');
});

Route::get('/home', 'HomeController@index')->name('home');
