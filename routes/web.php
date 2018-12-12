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
Auth::routes();
Route::get('/', ['uses'=>'Auth\LoginController@showLoginForm']);
// Auth

// OAuth
Route::get('login/{provider}',          'Auth\SocialAccountsController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountsController@handleProviderCallback');

Route::group( ['middleware' => 'auth'], function() {
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::get('myprofile', 'UsersController@myprofile');
    Route::post('myprofile/update/{id}', 'UsersController@profileUpdate')->name('profile.update');
    Route::get('notifications','NotificationsController@index')->name('notifications');
    Route::post('read/{id}/{application_id}','NotificationsController@markAsRead')->name('notifications.read');

});
Route::prefix('staff')->group(function() {
    Route::get('login', 'Auth\StaffsLoginController@showLoginForm')->name('staff.login');
    Route::post('login', 'Auth\StaffsLoginController@login')->name('staff.login.submit');
    Route::get('home', 'StaffsController@index')->name('staff.home');
});



