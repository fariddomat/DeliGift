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
Route::get('checkout', 'Home\AccountController@checkout')->name('checkout');
Route::get('cart', 'Home\AccountController@cart')->name('cart');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
