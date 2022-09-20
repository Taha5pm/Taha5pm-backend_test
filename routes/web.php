<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

    Route::get('Products', ['as' => 'profile.product', 'uses' => 'App\Http\Controllers\ProductController@index']);
    Route::get('Suppliers', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\SupplierController@index']);
    Route::get('Customers', ['as' => 'customer', 'uses' => 'App\Http\Controllers\CustomerController@index']);
    Route::put('Suppliers/store',['as' => 'supplier.store', 'uses' => 'App\Http\Controllers\SupplierController@store']);
    Route::put('Products/store',['as' => 'product.store', 'uses' => 'App\Http\Controllers\ProductController@store']);
    Route::put('Customers/store',['as' => 'customer.store', 'uses' => 'App\Http\Controllers\CustomerController@store']);
    Route::get('Orders',['as' => 'order', 'uses' => 'App\Http\Controllers\OrderController@index']);
    Route::put('Orders/store',['as' => 'order.store', 'uses' => 'App\Http\Controllers\OrderController@store']);


	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

