<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'as' => 'api.v1.'], function () {
    Route::resource('positions', 'PositionsController');
    Route::resource('branches', 'BranchesController');
    Route::resource('units', 'UnitsController');
    Route::resource('rooms', 'RoomsController');
    Route::resource('users', 'UsersController');
});
