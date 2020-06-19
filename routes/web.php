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

Route::group(['middleware' => 'locale'], function() {
    Auth::routes();

    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('change_language');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user', 'Client\UserController@index')->name('index');
    Route::get('user/edit', 'Client\UserController@edit')->name('edit_user');
    Route::post('user/update', 'Client\UserController@update')->name('user_update');

});
