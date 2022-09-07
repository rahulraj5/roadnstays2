<?php

use Illuminate\Http\Request;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
Route::group(['middleware' => 'CheckToken'], function () {

Route::post('register', 'Api\ApiLoginController@register')->middleware('CheckToken');
Route::post('login', 'Api\ApiLoginController@loginUser')->middleware('CheckToken');

Route::post('hotel_list','Api\WsController@hotel_list')->middleware('CheckToken');
Route::post('hotel_detail','Api\WsController@hotel_details')->middleware('CheckToken');
Route::post('room_detail','Api\WsController@room_details')->middleware('CheckToken');
Route::post('hotel_type','Api\WsController@hotel_type')->middleware('CheckToken');
Route::post('paypal_payment','Api\WsController@payment')->middleware('CheckToken');
Route::post('hotel_list_test','Api\WsController@hotel_list_test')->middleware('CheckToken');
Route::post('tour_list','Api\WsController@tour_list')->middleware('CheckToken');
Route::post('tour_details','Api\WsController@tour_details')->middleware('CheckToken');
Route::post('tour_search_fields','Api\WsController@tour_search_fields')->middleware('CheckToken');
Route::post('tour_list_search','Api\WsController@tour_list_search')->middleware('CheckToken');
Route::post('forget_password','Api\ApiLoginController@forgot_password')->middleware('CheckToken');
Route::post('verify_otp','Api\ApiLoginController@verifyOTP')->middleware('CheckToken');
Route::post('reset_password','Api\ApiLoginController@resetPassword')->middleware('CheckToken');
Route::post('get_profile','Api\ApiLoginController@getProfile')->middleware('CheckToken');
Route::post('edit_profile','Api\ApiLoginController@editProfile')->middleware('CheckToken');
Route::post('change_password','Api\ApiLoginController@changePassword')->middleware('CheckToken');
});
Route::get('changeStatus','Api\ApiLoginController@changeStatus');


