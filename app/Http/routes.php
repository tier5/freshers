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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'AppController@getIndex',
        'as' => 'app.index'
    ]);
    Route::get('register',[
        'uses'=>'UserController@create',
        'as'=>'register'
    ]);
    Route::post('register',[
        'uses'=>'UserController@store',
        'as'=>'postregister'
    ]);
    Route::get('login', [
        'uses' => 'UserController@getLogin',
        'as' => 'login'
    ]);
    Route::post('login', [
        'uses' => 'UserController@postLogin',
        'as' => 'postlogin'
    ]);

     Route::group(['middleware'=>'auth'],function() {

    Route::get('logout', [
        'uses'=>'UserController@logout',
        'as'=>'logout'
    ]);
    Route::get('profile', [
        'uses' => 'UserController@profile',
        'as' => 'profile'
    ]);
     });
});
