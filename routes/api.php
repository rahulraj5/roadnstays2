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
Route::post('home_page','Api\WsController@home_page')->middleware('CheckToken');
Route::post('hotel_list','Api\WsController@hotel_list')->middleware('CheckToken');
Route::post('hotel_detail','Api\WsController@hotel_details')->middleware('CheckToken');
Route::post('room_detail','Api\WsController@room_details')->middleware('CheckToken');
Route::post('hotel_type','Api\WsController@hotel_type')->middleware('CheckToken');
Route::post('hotel_room_booking_list','Api\WsController@hotel_room_booking')->middleware('CheckToken');
Route::post('room_booking_details','Api\WsController@room_booking_details')->middleware('CheckToken');
Route::post('paypal_payment','Api\WsController@payment')->middleware('CheckToken');
Route::post('hotel_list_test','Api\WsController@hotel_list_test')->middleware('CheckToken');
Route::post('tour_list','Api\WsController@tour_list')->middleware('CheckToken');
Route::post('tour_details','Api\WsController@tour_details')->middleware('CheckToken');
Route::post('tour_search_fields','Api\WsController@tour_search_fields')->middleware('CheckToken');
Route::post('tour_list_search','Api\WsController@tour_list_search')->middleware('CheckToken');
Route::post('tour_booking_list','Api\WsController@tour_booking_list')->middleware('CheckToken');
Route::post('tour_booking_detail','Api\WsController@tour_booking_detail')->middleware('CheckToken');
Route::post('forget_password','Api\ApiLoginController@forgot_password')->middleware('CheckToken');
Route::post('verify_otp','Api\ApiLoginController@verifyOTP')->middleware('CheckToken');
Route::post('reset_password','Api\ApiLoginController@resetPassword')->middleware('CheckToken');
Route::post('get_profile','Api\ApiLoginController@getProfile')->middleware('CheckToken');
Route::post('edit_profile','Api\ApiLoginController@editProfile')->middleware('CheckToken');
Route::post('change_password','Api\ApiLoginController@changePassword')->middleware('CheckToken');
Route::post('events_list','Api\EventController@events_list')->middleware('CheckToken');
Route::post('event_details','Api\EventController@event_details')->middleware('CheckToken');
Route::post('eventBookingList','Api\EventController@event_booking_list')->middleware('CheckToken');
Route::post('eventBookingDetail','Api\EventController@event_booking_detail')->middleware('CheckToken');
Route::post('event_details_test','Api\EventController@event_details_test')->middleware('CheckToken');
Route::post('space_cities','Api\SpaceController@space_cities')->middleware('CheckToken');
Route::post('space_type_list','Api\SpaceController@space_type_list')->middleware('CheckToken');
Route::post('space_list','Api\SpaceController@topFamousSpaces')->middleware('CheckToken');
Route::post('space_country_list','Api\SpaceController@space_coutrywise')->middleware('CheckToken');
Route::post('spaceListByCity','Api\SpaceController@getSpaceByCity')->middleware('CheckToken');
Route::post('spaceByCityDate','Api\SpaceController@getSpaceCityByDate')->middleware('CheckToken');
Route::post('spaceBookingList','Api\SpaceController@space_booking_list')->middleware('CheckToken');
Route::post('spaceBookingDetail','Api\SpaceController@space_booking_detail')->middleware('CheckToken');
Route::post('eventsByLocation','Api\SpaceController@searchEvents')->middleware('CheckToken');
Route::post('getCountries','Api\SpaceController@getCountries')->middleware('CheckToken');
Route::post('spaceByLocation','Api\SpaceController@spaceByLocation')->middleware('CheckToken');
Route::post('spaceById','Api\SpaceController@spaceById')->middleware('CheckToken');
Route::post('spaceDetails','Api\SpaceController@spaceDetails')->middleware('CheckToken');
Route::post('change_daterange_session','Api\SpaceController@change_daterange_session')->middleware('CheckToken'); 
Route::post('createSpaceBooking','Api\WsController@create_space_booking')->middleware('CheckToken');
Route::post('createTourBooking','Api\WsController@create_tour_booking')->middleware('CheckToken');
Route::post('createEventBooking','Api\WsController@create_event_booking')->middleware('CheckToken');
Route::post('createRoomBooking','Api\WsController@create_booking_room')->middleware('CheckToken');
});
Route::get('changeStatus','Api\ApiLoginController@changeStatus'); 