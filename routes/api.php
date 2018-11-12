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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('products', 'Api\ProductController@index');
    Route::get('products/{product}', 'Api\ProductController@show');
    Route::post('products', 'Api\ProductController@store');
    Route::patch('products/{product}', 'Api\ProductController@update');
    Route::delete('products/{product}', 'Api\ProductController@delete');

    Route::get('orders', 'Api\OrderController@index');
    Route::get('orders/{order}', 'Api\OrderController@show');
    Route::post('orders', 'Api\OrderController@store');
    Route::patch('orders/{order}', 'Api\OrderController@update');
    Route::delete('orders/{order}', 'Api\OrderController@delete');

    Route::get('suppliers', 'Api\SupplierController@index');
    Route::get('suppliers/{supplier}', 'Api\SupplierController@show');
    Route::post('suppliers', 'Api\SupplierController@store');
    Route::patch('suppliers/{supplier}', 'Api\SupplierController@update');
    Route::delete('suppliers/{supplier}', 'Api\SupplierController@delete');
