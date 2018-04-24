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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['prefix' => '/v1', 'middleware' => 'auth:api'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('books', 'Api\ProductController', ['only' => [
        'index', 'show'
    ]]);
    Route::resource('customers', 'Api\CustomerController', ['only' => [
        'index', 'store', 'show', 'update'
    ]]);
    Route::resource('sales', 'Api\SaleController', ['only' => [
        'index', 'store', 'show', 'update'
    ]]);
    Route::resource('type', 'Api\ProductTypeController', ['only' => [
        'index'
    ]]);
});