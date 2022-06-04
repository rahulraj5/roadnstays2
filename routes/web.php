<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ScoutController;
use App\Http\Controllers\Scout\ScoutUserController;
use Illuminate\Support\Facades\Mail;

Route::get('/clear', function () {
    $exitCode = Artisan::call('view:clear', []);   
          return '<h1>cache cleared</h1>';
    });
    Route::get('/config-cache', function() {
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('config:clear');
          return '<h1>config cache cleared</h1>';
    
    });
    Route::get('/view-clear', function() {
        $exitCode = Artisan::call('view:clear');
        return '<h1>View cache cleared</h1>';
    });


Route::any("/test",function ()
{	 	
	try {
		Mail::send("email.test",[],function($message){

			// $message->from(config("app.webmail"), config("app.mailname"));
			// $message->from('info@votivelaravel.in', 'votivelaravel.in');
			$message->from('roadNstays@votivelaravel.in', 'votivelaravel.in');
	
		   $message->subject("Test Email");
	
		   $message->to("votivephp.rahulraj@gmail.com");
	
		});
	
		return "Success";
	} catch (Exception $ex) {
		// Debug via $ex->getMessage();
		return "We've got errors!";
	}
});



Route::fallback(function () {
    return view("errors/404");
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/baseForm', [App\Http\Controllers\HomeController::class, 'baseForm'])->name('baseForm');

Route::post('/updateProfile', 'App\Http\Controllers\HomeController@updateProfile');
Route::post('/updateProfileImage', 'App\Http\Controllers\HomeController@updateProImg'); 

Route::post('/user/loginPost', 'App\Http\Controllers\HomeController@postLogin'); 
Route::post('/user/signup', 'App\Http\Controllers\HomeController@signup'); 
Route::post('/servicepro/loginPost', 'App\Http\Controllers\HomeController@serviceProPostLogin');
Route::post('/servicepro/signup', 'App\Http\Controllers\HomeController@vendorSignup');  

Route::post('forgotPassword_action','App\Http\Controllers\HomeController@forgotPassword_action');

// user route start here
Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {
    Route::get('user/profile','App\Http\Controllers\HomeController@userProfile')->name('user.profile');
    Route::any('user/changePassword', 'App\Http\Controllers\HomeController@change_password');
    // Route::any('user/logout', 'App\Http\Controllers\HomeController@userLogout');	
    Route::any('user/logout', 'App\Http\Controllers\HomeController@userLogout')->name('user.logout');
});	

// vendor route start here
Route::group(['middleware' => 'App\Http\Middleware\VendorMiddleware'], function () {
    Route::get('servicepro/dashboard','App\Http\Controllers\HomeController@serviceProDashboard')->name('servicepro.dashboard');
    Route::any('servicepro/profile', 'App\Http\Controllers\HomeController@serviceProProfile');
    // Route::any('servicepro/changePassword', 'App\Http\Controllers\HomeController@change_password');
    Route::any('servicepro/logout', 'App\Http\Controllers\HomeController@serviceProLogout')->name('servicepro.logout');	
});	


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login','App\Http\Controllers\AdminController@login')->name('admin.login');	
        Route::get('/','App\Http\Controllers\AdminController@login')->name('admin.login');	
        Route::post('/loginPost', 'App\Http\Controllers\AdminController@authenticate'); 
    });
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
        Route::any('/profile', 'App\Http\Controllers\AdminController@profile');
        Route::any('/changePassword', 'App\Http\Controllers\AdminController@change_password');
        Route::any('/logout', 'App\Http\Controllers\AdminController@logout')->name('admin.logout');	

        Route::get('/customer_management', 'App\Http\Controllers\CustomerController@index');
        Route::get('/add_customer', 'App\Http\Controllers\CustomerController@add_customer');
        Route::any('/add_customer_action', 'App\Http\Controllers\CustomerController@add_customer_action');
        Route::get('/edit_customer/{id}', 'App\Http\Controllers\CustomerController@edit_customer');
        Route::any('/customer_update', 'App\Http\Controllers\CustomerController@customer_update');
        Route::get('/change_user_status', 'App\Http\Controllers\CustomerController@change_user_status');
        Route::any('/deletecustomer', 'App\Http\Controllers\CustomerController@deletecustomer');

        Route::get('/scoutList', 'App\Http\Controllers\ScoutController@scout_list');
        Route::get('/addScout', 'App\Http\Controllers\ScoutController@add_scout');
        Route::any('/submitScout', 'App\Http\Controllers\ScoutController@submit_scout');
        Route::get('/editScout/{id}', 'App\Http\Controllers\ScoutController@edit_scout');
        Route::any('/updateScout', 'App\Http\Controllers\ScoutController@update_scout');
        Route::get('/changeScoutStatus', 'App\Http\Controllers\ScoutController@change_scout_status');
        Route::any('/deleteScout', 'App\Http\Controllers\ScoutController@delete_scout');

        Route::get('/serviceProviderList', 'App\Http\Controllers\ServiceproviderController@service_provider_list');
        Route::get('/addServiceProvider', 'App\Http\Controllers\ServiceproviderController@add_serv_provider');
        Route::any('/submitServiceProvider', 'App\Http\Controllers\ServiceproviderController@submit_serv_provider');
        Route::get('/editServiceProvider/{id}', 'App\Http\Controllers\ServiceproviderController@edit_serv_provider');
        Route::any('/updateServiceProvider', 'App\Http\Controllers\ServiceproviderController@update_serv_provider');
        Route::get('/change_serv_provider_status', 'App\Http\Controllers\ServiceproviderController@change_serv_provider_status');
        Route::any('/deleteServiceProvider', 'App\Http\Controllers\ServiceproviderController@delete_serv_provider');

        Route::get('/hotelList', 'App\Http\Controllers\Admin\HotelController@hotel_list');
        Route::get('/addHotel', 'App\Http\Controllers\Admin\HotelController@add_hotel');
        Route::any('/submitHotel', 'App\Http\Controllers\Admin\HotelController@submit_hotel');
        Route::any('/submitHotelPolicy', 'App\Http\Controllers\Admin\HotelController@submit_hotel_policy');
        Route::any('/submitHotelFacilityService', 'App\Http\Controllers\Admin\HotelController@submit_hotel_facility_service');
        Route::get('/editHotel/{id}', 'App\Http\Controllers\Admin\HotelController@edit_hotel');
        Route::any('/updateHotel', 'App\Http\Controllers\Admin\HotelController@update_hotel');
        Route::get('/changeHotelStatus', 'App\Http\Controllers\Admin\HotelController@change_hotel_status');
        Route::any('/deleteHotel', 'App\Http\Controllers\Admin\HotelController@delete_hotel');

        Route::get('/hotelAndStays_list', 'App\Http\Controllers\Admin\HotelnStaysController@hotelAndStays_list');
        Route::get('/addHotelAndStays', 'App\Http\Controllers\Admin\HotelnStaysController@addHotelAndStays');
        Route::any('/submitHotelAndStays', 'App\Http\Controllers\Admin\HotelnStaysController@submitHotelAndStays');
        Route::get('/editHotelAndStays/{id}', 'App\Http\Controllers\Admin\HotelnStaysController@editHotelAndStays');
        Route::any('/updateHotelAndStays', 'App\Http\Controllers\Admin\HotelnStaysController@updateHotelAndStays');
        Route::get('/changeHotelAndStaysStatus', 'App\Http\Controllers\Admin\HotelnStaysController@changeHotelAndStaysStatus');
        Route::any('/deleteHotelAndStays', 'App\Http\Controllers\Admin\HotelnStaysController@deleteHotelAndStays');

        Route::get('/hotelAmenity_list', 'App\Http\Controllers\Admin\HotelAmenityController@hotelAmenity_list');
        Route::get('/addHotelAmenity', 'App\Http\Controllers\Admin\HotelAmenityController@addHotelAmenity');
        Route::any('/submitHotelAmenity', 'App\Http\Controllers\Admin\HotelAmenityController@submitHotelAmenity');
        Route::get('/editHotelAmenity/{id}', 'App\Http\Controllers\Admin\HotelAmenityController@editHotelAmenity');
        Route::any('/updateHotelAmenity', 'App\Http\Controllers\Admin\HotelAmenityController@updateHotelAmenity');
        Route::get('/changeHotelAmenityStatus', 'App\Http\Controllers\Admin\HotelAmenityController@changeHotelAmenityStatus');
        Route::any('/deleteHotelAmenity', 'App\Http\Controllers\Admin\HotelAmenityController@deleteHotelAmenity');

        Route::get('/hotelService_list', 'App\Http\Controllers\Admin\HotelServiceController@hotelService_list');
        Route::get('/addHotelService', 'App\Http\Controllers\Admin\HotelServiceController@addHotelService');
        Route::any('/submitHotelService', 'App\Http\Controllers\Admin\HotelServiceController@submitHotelService');
        Route::get('/editHotelService/{id}', 'App\Http\Controllers\Admin\HotelServiceController@editHotelService');
        Route::any('/updateHotelService', 'App\Http\Controllers\Admin\HotelServiceController@updateHotelService');
        Route::get('/changeHotelServiceStatus', 'App\Http\Controllers\Admin\HotelServiceController@changeHotelServiceStatus');
        Route::any('/deleteHotelService', 'App\Http\Controllers\Admin\HotelServiceController@deleteHotelService');

        Route::get('/hotelRoomType_list', 'App\Http\Controllers\Admin\HotelRoomtypeController@hotelRoomType_list');
        Route::get('/addHotelRoomType', 'App\Http\Controllers\Admin\HotelRoomtypeController@addHotelRoomType');
        Route::any('/submitHotelRoomType', 'App\Http\Controllers\Admin\HotelRoomtypeController@submitHotelRoomType');
        Route::get('/editHotelRoomType/{id}', 'App\Http\Controllers\Admin\HotelRoomtypeController@editHotelRoomType');
        Route::any('/updateHotelRoomType', 'App\Http\Controllers\Admin\HotelRoomtypeController@updateHotelRoomType');
        Route::get('/changeHotelRoomTypeStatus', 'App\Http\Controllers\Admin\HotelRoomtypeController@changeHotelRoomTypeStatus');
        Route::any('/deleteHotelRoomType', 'App\Http\Controllers\Admin\HotelRoomtypeController@deleteHotelRoomType');

        Route::get('/hotelSpaceType_list', 'App\Http\Controllers\Admin\HotelSpacetypeController@hotelSpaceType_list');
        Route::get('/addHotelSpacetype', 'App\Http\Controllers\Admin\HotelSpacetypeController@addHotelSpacetype');
        Route::any('/submitHotelSpacetype', 'App\Http\Controllers\Admin\HotelSpacetypeController@submitHotelSpacetype');
        Route::get('/editHotelSpacetype/{id}', 'App\Http\Controllers\Admin\HotelSpacetypeController@editHotelSpacetype');
        Route::any('/updateHotelSpacetype', 'App\Http\Controllers\Admin\HotelSpacetypeController@updateHotelSpacetype');
        Route::get('/changeHotelSpacetypeStatus', 'App\Http\Controllers\Admin\HotelSpacetypeController@changeHotelSpacetypeStatus');
        Route::any('/deleteHotelSpacetype', 'App\Http\Controllers\Admin\HotelSpacetypeController@deleteHotelSpacetype');
    });
});


Route::group(['prefix' => 'scout'], function(){
    Route::group(['middleware' => 'scout.guest'], function(){ 
        Route::get('/login', [ScoutUserController::class, 'login'])->name('scout.login');	
        Route::post('/loginPost', [ScoutUserController::class, 'postLogin']);	
    });
    Route::group(['middleware' => 'scout.auth'], function(){
        Route::get('/dashboard','App\Http\Controllers\Scout\ScoutUserController@dashboard')->name('scout.dashboard');
        Route::any('/profile', 'App\Http\Controllers\Scout\ScoutUserController@profile');
        Route::any('/changePassword', 'App\Http\Controllers\Scout\ScoutUserController@change_password');
        Route::any('/logout', 'App\Http\Controllers\Scout\ScoutUserController@scoutLogout')->name('scout.logout');	
    });
});

