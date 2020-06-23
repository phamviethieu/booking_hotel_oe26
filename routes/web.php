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

Route::group(['middleware' => 'locale'], function () {
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('change_language');
    Route::group(['namespace' => 'Client'], function () {
        Route::get('user', 'UserController@index')->name('user.index');
        Route::get('user/edit', 'UserController@edit')->name('user.edit');
        Route::post('user/update', 'UserController@update')->name('user.update');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::resource('users', 'UserController');
    });
});
