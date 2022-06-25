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

Route::post('/ws/hotel_list','Api\WsController@hotel_list')->middleware('CheckToken');
Route::post('/ws/hotel_detail','Api\WsController@hotel_details')->middleware('CheckToken');
Route::post('/ws/room_detail','Api\WsController@room_details')->middleware('CheckToken');

Route::post('forget_password','Api\ApiLoginController@forgot_password')->middleware('CheckToken');
Route::post('verify_otp','Api\ApiLoginController@verifyOTP')->middleware('CheckToken');
Route::post('reset_password','Api\ApiLoginController@resetPassword')->middleware('CheckToken');
Route::post('get_profile','Api\ApiLoginController@getProfile')->middleware('CheckToken');
Route::post('edit_profile','Api\ApiLoginController@editProfile')->middleware('CheckToken');
Route::post('change_password','Api\ApiLoginController@changePassword')->middleware('CheckToken');
});
Route::get('changeStatus','Api\ApiLoginController@changeStatus');


