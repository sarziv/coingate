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

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/add-to-cart/{id}/{item}/{price}',[
   'uses' => 'ProductsController@getAddToCart',
   'as' => 'product.addToCart'
]);