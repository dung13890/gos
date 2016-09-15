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
    Route::get('user/ajax/profile', ['as' => 'user.ajax.profile', 'uses' => 'UserController@ajaxProfile']);
    Route::post('user/update/profile', ['as' => 'user.update.profile', 'uses' => 'UserController@updateProfile']);
    Route::post('user/update/password', ['as' => 'user.update.password', 'uses' => 'UserController@updatePassword']);
   
    Route::resource('user', 'UserController', ['only' => ['index']]);

    Route::resource('products', 'ProductsController');
    Route::resource('customers', 'CustomersController');
    Route::resource('providers', 'ProvidersController');

    Route::resource('rooms', 'RoomsController', ['except' => ['create']]);

    Route::resource('units', 'UnitsController');

    Route::resource('roles', 'RolesController', ['only' => 'index']);

    Route::resource('groupproducts', 'GroupProductsController', ['only' => 'index']);
    Route::resource('groupcustomers', 'GroupCustomersController', ['only' => 'index']);
    Route::resource('manufacturers', 'ManufacturersController', ['only' => 'index']);
    Route::resource('warehouses', 'WarehousesController', ['only' => 'index']);
    Route::resource('branches', 'BranchesController', ['only' => 'index']);
    Route::resource('positions', 'PositionsController', ['only' => 'index']);

    Route::resource('bills', 'BillsController', ['only' =>['index']]);
    Route::get('bills/sale', 'BillsController@sale');
    Route::get('bills/wholesale', 'BillsController@wholesale');
    Route::get('bills/buy', 'BillsController@buy');
    Route::get('bills/warehousetransfer', 'BillsController@warehouseTransfer');
    Route::get('bills/destroystock', 'BillsController@destroyStock');
    Route::get('bills/exportstock', 'BillsController@exportStock');
    Route::get('bills/importstock', 'BillsController@importstock');
    Route::get('bills/symmetrical', 'BillsController@symmetrical');
    Route::get('bills/stockrequisition', ['as' => 'bill.stockrequisition', 'uses' => 'BillsController@stockRequisition']);
    Route::get('bills/createstockrequisition', 
        ['as' => 'bill.createstockrequisition', 'uses' => 'BillsController@createStockRequisition']);
    Route::get('bills/stockrequisitiondetail', 
        ['as' => 'bill.stockrequisitiondetail', 'uses' => 'BillsController@stockRequisitionDetail']);


    Route::resource('quotations', 'QuotationsController', ['only' => ['create', 'store']]);

    Route::resource('promotions', 'PromotionsController');

    Route::resource('reports', 'ReportsController', ['except' => ['show']]);
    Route::get('reports/importexport', 'ReportsController@reportInportExport');
    Route::get('reports/overall', 'ReportsController@overall');
    Route::get('reports/overalldetail', 'ReportsController@overallDetail');

    Route::resource('permissions', 'PermissionsController', ['only' => 'index']);

    Route::resource('locations', 'LocationsController', ['only' => 'index']);

    Route::resource('notifications', 'NotificationsController', ['only' => 'index']);    
});
