<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>'auth'],function(){
    Route::get('/changeprofile', 'UserController@getChangeprofile');
    Route::post('/changeprofile', 'UserController@postChangeprofile');
    Route::get('/logout', 'UserController@getLogout');
    Route::get('/admin', 'UserController@getAdmin');
});
Route::controller('/', 'UserController');
