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

Route::get('/','ProductsController@index')->name('app');

Route::get('/add-to-cart/{id}',[
   'uses' => 'ProductsController@getAddToCart',
   'as' => 'product.addToCart'
]);
Route::get('/currency/{type}',[
    'uses' => 'CurrencyController@setCurrency',
    'as' => 'setCurrency'
]);
Route::get('/cart/remove',[
    'uses' => 'ProductsController@removeCart',
    'as' => 'cart.remove'
]);
Route::get('/cart/checkout',[
    'uses' => 'ProductsController@checkoutCart',
    'as' => 'cart.checkout'
]);