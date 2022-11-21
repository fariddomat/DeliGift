<?php
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin|representative'])
    ->group(function () {

        Route::get('/dashboard', 'HomeController@index')->name('home');
        Route::resource('categories', 'CategoryController');
        Route::resource('gifts', 'GiftController');
        Route::resource('users', 'UserController');
        Route::resource('orders', 'OrderController');
        Route::post('confirm/{id}', 'OrderController@confirm')->name('orders.confirm');
        Route::post('unban/{id}', 'UserController@unban')->name('users.unban');
        Route::post('unban/{id}', 'UserController@unban')->name('users.unban');

    });
