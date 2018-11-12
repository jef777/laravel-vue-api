<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::resource('branches', 'Crud\BranchController');
Route::resource('deliveries', 'Crud\DeliveryController');
Route::resource('headquaters', 'Crud\HeadquartersController');
Route::resource('orders', 'Crud\OrderController');
Route::resource('order_details', 'Crud\OrderDetailController');
Route::resource('order_detail_deliveries', 'Crud\OrderDetailDeliveryController');
Route::resource('products', 'Crud\ProductController');
Route::resource('suppliers', 'Crud\SupplierController');




Route::get('/home', 'HomeController@index')->name('home');
