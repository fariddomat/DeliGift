<?php
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', 'HomeController@index')->name('home');
        Route::resource('categories', 'CategoryController');
        Route::resource('gifts', 'GiftController');
        Route::resource('users', 'UserController');
        Route::post('ban/{id}', 'UserController@ban')->name('users.ban');
        Route::post('unban/{id}', 'UserController@unban')->name('users.unban');
   
    });
