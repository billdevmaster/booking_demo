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
// authentication
Route::get('/signin', function () {
    return view('auth.backend.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('auth.backend.signup');
})->name('signup');

Route::post('/backend/signin', 'Auth\Backend\AuthController@signin')->name('backend.signin');
Route::post('/backend/signup', 'Auth\Backend\AuthController@signup')->name('backend.signup');
Route::get('/backend/signout', 'Auth\Backend\AuthController@signout')->name('backend.signout');

// frontend
Route::group(['middleware' => 'verify.app'], function(){
    Route::get('/', 'Frontend\HomePageController@index')->name('index');
    Route::post('/', 'Frontend\HomePageController@index')->name('order');
    Route::get('/home/getCalendar', 'Frontend\HomePageController@getCalendar')->name('home.getCalendar');
    Route::get('/home/booking', 'Frontend\HomePageController@booking')->name('home.booking');
    Route::get('/home/models', 'Frontend\HomePageController@models')->name('home.models');
    Route::get('/errorBooking', 'Frontend\HomePageController@errorBooking')->name('errorBooking');
    Route::get('/cancelBooking', 'Frontend\HomePageController@cancelBookingView')->name('cancelBookingView');
    Route::post('/cancelBooking', 'Frontend\HomePageController@cancelBooking')->name('cancelBooking');
});

// backend
Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware'=>'isadmin'], function() {
        Route::get('/admin', 'Backend\AdminController@index')->name('admin');
        Route::get('/admin/getCalendar', 'Backend\AdminController@getCalendar')->name('admin.getCalendar');
        Route::get('/admin/editOrder', 'Backend\AdminController@editOrder')->name('admin.editOrder');
        Route::post('/admin/updateOrder', 'Backend\AdminController@updateOrder')->name('admin.updateOrder');
        Route::post('/admin/getDayEndTime', 'Backend\AdminController@getDayEndTime')->name('admin.getDayEndTime');
        Route::post('/admin/deleteOrder', 'Backend\AdminController@deleteOrder')->name('admin.deleteOrder');
        Route::post('/admin/getModel', 'Backend\AdminController@getModel');
        // vehicle route
        Route::get('/admin/vehicles', 'Backend\AdminVehicleController@index')->name('admin.vehicles');
        Route::post('/admin/vehicles/save', 'Backend\AdminVehicleController@save')->name('admin.vehicles.save');
        Route::get('/admin/vehicles/get_list', 'Backend\AdminVehicleController@get_list');
        // end vehicle route
        
        // service route
        Route::get('/admin/services', 'Backend\AdminServiceController@index')->name('admin.services');
        Route::get('/admin/services/get_list', 'Backend\AdminServiceController@get_list');
        Route::post('/admin/services/save', 'Backend\AdminServiceController@save')->name('admin.services.save');
        Route::post('/admin/services/remove', 'Backend\AdminServiceController@remove');
        // end service route
        
        // location route
        Route::get('/admin/locations', 'Backend\AdminLocationController@index')->name('admin.locations');
        Route::post('/admin/locations/save', 'Backend\AdminLocationController@save')->name('admin.locations.save');
        Route::post('/admin/locations/save_general', 'Backend\AdminLocationController@save_general')->name('admin.locations.save_general');
        Route::get('/admin/locations/edit/', 'Backend\AdminLocationController@edit')->name('admin.locations.edit');
        Route::post('/admin/locations/delete/', 'Backend\AdminLocationController@delete')->name('admin.locations.delete');
        Route::get('/admin/locations/get_list', 'Backend\AdminLocationController@get_list');
        Route::get('/admin/locations/getLocationGeneral', 'Backend\AdminLocationController@getLocationGeneral');
        Route::get('/admin/locations/getLocationServices', 'Backend\AdminLocationController@getLocationServices');
        Route::post('/admin/locations/saveLocationService', 'Backend\AdminLocationController@saveLocationService');
        Route::post('/admin/locations/saveLocationServiceOrder', 'Backend\AdminLocationController@saveLocationServiceOrder');
        Route::get('/admin/locations/getLocationVehicles', 'Backend\AdminLocationController@getLocationVehicles');
        Route::post('/admin/locations/saveLocationVehicle', 'Backend\AdminLocationController@saveLocationVehicle');
        Route::get('/admin/locations/getLocationPesuboxs', 'Backend\AdminLocationController@getLocationPesuboxs');
        Route::get('/admin/locations/getLocationPesubox', 'Backend\AdminLocationController@getLocationPesubox');
        Route::post('/admin/locations/saveLocationPesubox', 'Backend\AdminLocationController@saveLocationPesubox');
        Route::post('/admin/locations/deleteLocationPesubox', 'Backend\AdminLocationController@deleteLocationPesubox');
        Route::post('/admin/locations/saveLocationPesuboxStatus', 'Backend\AdminLocationController@saveLocationPesuboxStatus');
        Route::get('/admin/locations/getLocationUsers', 'Backend\AdminLocationController@getLocationUsers');
        Route::get('/admin/locations/getLocationUser', 'Backend\AdminLocationController@getLocationUser');
        Route::post('/admin/locations/saveLocationUser', 'Backend\AdminLocationController@saveLocationUser');
        Route::post('/admin/locations/deleteLocationUser', 'Backend\AdminLocationController@deleteLocationUser');
        Route::post('/admin/locations/saveLocationUserStatus', 'Backend\AdminLocationController@saveLocationUserStatus');
        // end location route

        // clients
        Route::get('/admin/clients', 'Backend\AdminClientsController@index')->name('admin.clients');
        Route::get('/admin/clients/get_list', 'Backend\AdminClientsController@get_list');
        Route::post('/admin/clients/save', 'Backend\AdminClientsController@save')->name('admin.clients.save');
        Route::post('/admin/clients/remove', 'Backend\AdminClientsController@remove');
        // end clients

        // seaded
        Route::get('/admin/seaded', 'Backend\AdminSeadedController@index')->name('admin.seaded');
        Route::post('/admin/seaded/saveNotificationEmail', 'Backend\AdminSeadedController@saveNotificationEmail');
        Route::post('/admin/seaded/setNeedification', 'Backend\AdminSeadedController@setNeedification');
        // end seaded

        // subscribe
        Route::get('/admin/subscribe', 'Backend\AdminSubscribeController@index')->name('admin.subscribe');
        Route::get('/admin/subscribe_success', 'Backend\AdminSubscribeController@subscribe_success')->name('admin.subscribe.success');
    });
});

