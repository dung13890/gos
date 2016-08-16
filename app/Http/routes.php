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

Route::group(['middlewareGroups' => ['web']], function () {
    Route::get('image/{path}', ['as' => 'image', 'uses' => 'Backend\DashboardController@getReponseImage'])->where('path', '(.*?)');
    
    Route::group(['namespace' => 'Auth'], function () {
        Route::group(['namespace' => 'Backend'], function () {
            Route::get('login', 'AuthController@getLogin');
            Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
            Route::get('logout', 'AuthController@logout');
            Route::post('password/email', 'PasswordController@postEmail');
            Route::post('password/reset', 'PasswordController@reset');
            Route::get('password/reset/{token?}', 'PasswordController@showResetForm');
        });

    });


    Route::group(['prefix' => '/', 'namespace' => 'Backend', 'middleware' => ['auth']], function () {
        Route::get('/', 'DashboardController@index');
        Route::post('summernote/image', ['as' => 'summernote.image', 'uses' => 'DashboardController@summernoteImage']);
        Route::PATCH('notification/{notification}', array('as' => 'notification.read', 'uses' => 'DashboardController@readNotification'));
        
        Route::get('user/data', ['as' => 'user.data', 'uses' => 'UserController@getData']);
        Route::resource('user', 'UserController', ['except' => ['create']]);
        Route::resource('products', 'ProductsController');
        Route::resource('customers', 'CustomersController');
        Route::resource('providers', 'ProvidersController');
    });
});

