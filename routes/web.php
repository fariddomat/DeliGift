<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@home')->name('index');
Route::get('shop', 'Home\ShopController@index')->name('shop');
Route::get('product/{id}', 'Home\ShopController@product')->name('product');

Route::get('account', 'Home\AccountController@index')->name('account');
Route::get('orders', 'Home\AccountController@orders')->name('orders');
Route::get('order/{id}', 'Home\AccountController@order')->name('order');
Route::get('favorite', 'Home\AccountController@favorite')->name('favorite');
Route::get('addToFavorite/{id}', 'Home\AccountController@addToFavorite')->name('addToFavorite');
Route::get('removeFromFavorite/{id}', 'Home\AccountController@removeFromFavorite')->name('removeFromFavorite');

Route::get('checkout', 'Home\AccountController@checkout')->name('checkout');
Route::get('cart', 'Home\AccountController@cart')->name('cart');

Route::get('add-to-cart/{id}', 'Home\OrderController@addToCart')->name('add.to.cart');
Route::patch('update-cart', 'Home\OrderController@update')->name('update.cart');
Route::delete('remove-from-cart', 'Home\OrderController@remove')->name('remove.from.cart');
Route::post('store', 'Home\OrderController@store')->name('order.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
