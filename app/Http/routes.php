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

    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
        Route::group(['prefix' => 'v1'], function () { 
            Route::get('user/profile', ['as' => 'api.user.profile', 'uses'=>'UserController@profile']);
        });
    });

    Route::group(['prefix' => '/', 'namespace' => 'Backend', 'middleware' => ['auth']], function () {
        Route::get('/', 'DashboardController@index');
        Route::post('summernote/image', ['as' => 'summernote.image', 'uses' => 'DashboardController@summernoteImage']);
        Route::PATCH('notification/{notification}', array('as' => 'notification.read', 'uses' => 'DashboardController@readNotification'));
        
        Route::get('user/ajax/profile', ['as' => 'user.ajax.profile', 'uses' => 'UserController@ajaxProfile']);
        Route::post('user/update/profile', ['as' => 'user.update.profile', 'uses' => 'UserController@updateProfile']);
        Route::post('user/update/password', ['as' => 'user.update.password', 'uses' => 'UserController@updatePassword']);
        Route::get('user/data/room/{room}', ['as' => 'user.data.room', 'uses' => 'UserController@getDataWithRoom']);
        Route::get('user/data', ['as' => 'user.data', 'uses' => 'UserController@getData']);
        Route::get('user/room/{room}', ['as' => 'user.room', 'uses' => 'UserController@room']);
        Route::resource('user', 'UserController', ['except' => ['create']]);
        
        Route::resource('products', 'ProductsController');
        Route::resource('customers', 'CustomersController');
        Route::resource('providers', 'ProvidersController');
        
        Route::get('rooms/data', ['as' => 'rooms.data', 'uses' => 'RoomsController@getData']);
        Route::resource('rooms', 'RoomsController', ['except' => ['create']]);

        Route::resource('units', 'UnitsController');

        Route::post('roles/ajax/update/{roles}', ['as' => 'roles.ajax.update', 'uses' => 'RolesController@ajaxUpdate']);
        Route::get('roles/ajax/permission', ['as' => 'roles.ajax.permission', 'uses' => 'RolesController@ajaxPermission']);
        Route::get('roles/ajax/{roles}', ['as' => 'roles.ajax.role', 'uses' => 'RolesController@ajaxRole']);
        Route::get('roles/data', ['as' => 'roles.data', 'uses' => 'RolesController@getData']);
        Route::resource('roles', 'RolesController');
    });
});

