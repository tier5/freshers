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

    Route::get('/', [
        'uses' => 'AppController@getIndex',
        'as' => 'app.index'
    ]);

    Route::resource('article', 'ArticleController', [
        'names'=> [
            'index' => 'article.index'
        ]
    ]);

    Route::group(['prefix' => 'search'], function () {
        Route::get('/', [
            'uses' => 'SearchController@search',
            'as' => 'search'
        ]);
        Route::get('tag/{id?}', [
            'uses' => 'SearchController@searchTag',
            'as' => 'search.tag'
        ]);
        Route::get('category/{id?}', [
            'uses' => 'SearchController@searchCategory',
            'as' => 'search.category'
        ]);
        Route::get('data', [
            'uses' => 'SearchController@getSearchData',
            'as' => 'search.data'
        ]);
    });
    Route::get('/userarticle/{user_id?}', [
        'uses' => 'ArticleController@userarticle',
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
        Route::get('logout', [
            'uses' => 'UserController@logout',
            'as' => 'logout'
        ]);
        Route::get('profile', [
            'uses' => 'UserController@profile',
            'as' => 'profile'
        ]);
        Route::get('editprofile', [
            'uses' => 'UserController@editprofile',
            'as' => 'editprofile'
        ]);
        Route::patch('editprofile', [
            'uses' => 'UserController@updateprofile',
            'as' => 'updateprofile'
        ]);
        Route::patch('resetprofilepassword', [
            'uses' => 'UserController@resetprofilepassword',
            'as' => 'resetprofilepassword'
        ]);
    });

    Route::get('resetpassword', [
        'uses' => 'PasswordController@resetpassword',
        'as' => 'resetpassword'
    ]);
    Route::post('resetpassword', [
        'uses' => 'PasswordController@postresetpassword',
        'as' => 'resetpassword'
    ]);
    Route::get('password/reset/{token}',[
        'uses'=>'PasswordController@getreset',
        'as'=>'getreset'
    ]);
    Route::post('password/reset',[
        'uses'=>'PasswordController@postreset',
        'as'=>'postreset'
    ]);



