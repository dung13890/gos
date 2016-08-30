<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('image/{path}', ['as' => 'image', 'uses' => 'Backend\DashboardController@getReponseImage'])->where('path', '(.*?)');

Route::group(['namespace' => 'Auth'], function () {
    Route::group(['namespace' => 'Backend'], function () {
        Route::get('login', 'LoginController@showLoginForm');
        Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']);
        Route::get('logout', 'LoginController@logout');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'ResetPasswordController@reset');
        Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm');
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
    
    Route::resource('rooms', 'RoomsController', ['except' => ['create']]);

    Route::resource('units', 'UnitsController');

    Route::post('roles/ajax/update/{roles}', ['as' => 'roles.ajax.update', 'uses' => 'RolesController@ajaxUpdate']);
    Route::get('roles/ajax/permission', ['as' => 'roles.ajax.permission', 'uses' => 'RolesController@ajaxPermission']);
    Route::get('roles/ajax/{roles}', ['as' => 'roles.ajax.role', 'uses' => 'RolesController@ajaxRole']);
    Route::get('roles/data', ['as' => 'roles.data', 'uses' => 'RolesController@getData']);
    Route::resource('roles', 'RolesController');

    Route::resource('groupproducts', 'GroupProductsController');
    Route::resource('groupcustomers', 'GroupCustomersController');
    Route::resource('manufacturers', 'ManufacturersController');
    Route::resource('warehouses', 'WarehousesController');
    Route::resource('branches', 'BranchesController');
    Route::resource('positions', 'PositionsController');

    Route::get('bills/sale', 'BillsController@sale');
    Route::get('bills/wholesale', 'BillsController@wholesale');
    Route::get('bills/buy', 'BillsController@buy');
    Route::get('bills/warehousetransfer', 'BillsController@warehouseTransfer');
    Route::get('bills/destroystock', 'BillsController@destroyStock');
    Route::get('bills/exportstock', 'BillsController@exportStock');
    Route::get('bills/importstock', 'BillsController@importstock');
    Route::get('bills/symmetrical', 'BillsController@symmetrical');

    Route::resource('quotations', 'QuotationsController', ['only' => ['create', 'store']]);
    
    Route::resource('promotions', 'PromotionsController');
    Route::resource('reports', 'ReportsController');
});
