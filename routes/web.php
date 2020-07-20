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
    Route::get('/', 'HomeController@index')
        ->name('home');
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('change_language');
    Route::get('booking', 'BookingController@booking')
        ->name('booking');
    Route::post('select-room', 'BookingController@selectRoomAvailable')
        ->name('select_room');
    Route::post('save-info', 'BookingController@saveInfo')
        ->name('save_info');
    Route::post('deposit', 'BookingController@deposit')
        ->name('deposit');
    Route::group(['namespace' => 'Client'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index')
                ->name('user.index');
            Route::get('edit', 'UserController@edit')
                ->name('user.edit');
            Route::post('update', 'UserController@update')
                ->name('user.update');
            Route::post('cancel', 'UserController@cancelBooking')
                ->name('user.cancel_booking');
        });
        Route::resource('rooms', 'RoomController', ['as' => 'client']);
        Route::resource('comments', 'CommentController')
            ->only(['store', 'update', 'destroy']);
        Route::resource('ratings', 'RatingController')->middleware('auth');;
    });
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/', 'AdminController@index')
            ->name('admin.index');
        Route::resource('users', 'UserController');
        Route::resource('types', 'TypeController');
        Route::resource('rooms', 'RoomController');
        Route::resource('bookings', 'BookingController');
        Route::get('filter/room/{type_id}', 'RoomController@filterRoomByType');
        Route::get('bookings-of-room/{id}', 'RoomController@bookingsOfRoom')
            ->name('bookings_of_room');
        Route::get('view-detail/booking/{id}', 'BookingController@showDetails')
            ->name('show_booking_details');
        Route::post('bookings/update-status', 'BookingController@updateStatus')
            ->name('update_status');
        Route::get('/get-data-chart', 'AdminController@dataChart');
        Route::put('/read-notification', 'AdminController@readNotification');
    });
});
