<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index'])->name('web_home');
Route::get('Product/{p_serial_number}/Details', [App\Http\Controllers\Website\HomeController::class, 'show'])->name('pro_det');




Route::group(['middleware' => 'auth:admin', 'prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('Products', ['as' => 'product', 'uses' => 'App\Http\Controllers\ProductController@index']);
    Route::put('Products/store', ['as' => 'product.store', 'uses' => 'App\Http\Controllers\ProductController@store']);

    Route::get('Suppliers', ['as' => 'supplier', 'uses' => 'App\Http\Controllers\SupplierController@index']);
    Route::put('Suppliers/store', ['as' => 'supplier.store', 'uses' => 'App\Http\Controllers\SupplierController@store']);
    Route::get('Suppliers/{s_serial_number}/Details', ['as' => 'supplier.show', 'uses' => 'App\Http\Controllers\SupplierController@show']);

    Route::get('Customers', ['as' => 'customer', 'uses' => 'App\Http\Controllers\CustomerController@index']);
    Route::put('Customers/store', ['as' => 'customer.store', 'uses' => 'App\Http\Controllers\CustomerController@store']);

    Route::get('Make-Order', ['as' => 'order', 'uses' => 'App\Http\Controllers\OrderController@index']);
    Route::put('Orders/store', ['as' => 'order.store', 'uses' => 'App\Http\Controllers\OrderController@store']);


    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Auth::routes();
