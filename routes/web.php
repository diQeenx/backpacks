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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Catalog'], function () {
    Route::get('catalog', 'CatalogController@index')->name('catalog');
    Route::get('product/{id}', 'ProductController@index')->name('product');
});

Route::group(['namespace' => 'User'], function () {
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'AccountController@index')->name('account');
        Route::post('/', 'AccountController@edit')->name('account.edit');
        Route::get('cart', 'AccountController@cart')->name('account.cart');
    });
    Route::post('cart', 'CartController@add')->name('cart.add');
    Route::post('cart/{id}', 'CartController@delete')->name('cart.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('index', 'AdminController@index')->name('admin.index');
});


