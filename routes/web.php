<?php
 

Auth::routes();
// Auth::routes(['verify' => true]);

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
		Mail::send("emails.test",[],function($message){

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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/baseForm', 'HomeController@baseForm');

Route::post('/updateProfile', 'HomeController@updateProfile');
Route::post('/updateProfileImage', 'HomeController@updateProImg'); 

Route::post('/user/loginPost', 'HomeController@postLogin'); 
Route::post('/user/signup', 'HomeController@signup'); 
Route::get('/email_verification/{id}', 'HomeController@email_verification');
Route::post('/servicepro/loginPost', 'HomeController@serviceProPostLogin');
Route::post('/servicepro/signup', 'HomeController@vendorSignup');  

Route::post('forgotPassword_action','HomeController@forgotPassword_action');

Route::get('/hotelDetails/{id?}','HomeController@hotel_details')->name('user.hotel_details');
Route::get('/hotelDetails','HomeController@hotel_details')->name('user.hotel_details');
Route::get('/roomdetails','HomeController@room_details')->name('user.room_details');
Route::get('/hotelList/{name?}','HomeController@hotel_list')->name('user.hotel_list');
Route::get('/checkout/{name?}','HomeController@checkout')->name('user.checkout');

Route::get('/confirmBooking','HomeController@confirm_booking')->name('user.confirm_booking');
Route::get('/allRooms','HomeController@all_rooms')->name('user.all_rooms');
Route::post('/room_details_ajax','HomeController@room_details_ajax')->name('user.room_details_ajax');
Route::get('/events','HomeController@events')->name('user.events');
Route::get('/event_details','HomeController@event_details')->name('user.event_details');
Route::get('/tour','HomeController@tour')->name('user.tour');
Route::get('/tour_details','HomeController@tour_details')->name('user.tour_details');
Route::get('/packages','HomeController@packages')->name('user.packages');
Route::get('/space','Home\SpaceController@space')->name('user.space');
Route::get('/space-details/{id?}','Home\SpaceController@space_details')->name('user.space_details');
Route::get('/space-details','Home\SpaceController@space_details')->name('user.space_details');

Route::get('/travel-details','HomeController@travel_details')->name('user.travel-details');
Route::get('/terms_&_condition','HomeController@terms_condition')->name('user.terms_&_condition');
Route::get('/blogs','HomeController@blogs')->name('user.blogs');

Route::post('/bookingRoomOrder','HomeController@booking_room_order')->name('user.booking_room_order');
Route::get('payment-successful','HomeController@payment_successful')->name('user.payment_successful');
// Route::get('/two','HomeController@two')->name('user.two');
// Route::get('/three','HomeController@three')->name('user.three');

// user route start here
Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {
    Route::get('user/profile','HomeController@userProfile')->name('user.profile');
    Route::any('user/changePassword', 'HomeController@change_password');
    Route::any('user/logout', 'HomeController@userLogout')->name('user.logout');

    // Route::get('user/hotelDetails','HomeController@hotel_details')->name('user.hotel_details');

    // booking 
    Route::any('user/bookingList', 'Home\BookingController@booking_list');	
    // Route::any('user/bookingDetails', 'Home\BookingController@booking_details');	
    Route::get('user/bookingDetails/{id}', 'Home\BookingController@booking_detail');	
    Route::get('user/bookingDetailCancelled/{id}', 'Home\BookingController@booking_canceled_detail');	
});	

// vendor route start here
Route::group(['middleware' => 'App\Http\Middleware\VendorMiddleware'], function () {
    Route::get('servicepro/dashboard','Vendor\VendorController@serviceProDashboard')->name('servicepro.dashboard');
    Route::any('servicepro/profile', 'HomeController@serviceProProfile');
    // Route::any('servicepro/profile', 'Vendor\VendorController@serviceProProfile');
    // Route::any('servicepro/changePassword', 'HomeController@change_password');
    Route::any('servicepro/logout', 'HomeController@serviceProLogout')->name('servicepro.logout');	


    Route::get('servicepro/hotelList', 'Vendor\VendorController@hotel_list');
    Route::get('servicepro/viewHotel/{id}', 'Vendor\VendorController@view_hotel');
    Route::any('servicepro/addHotel', 'Vendor\VendorController@add_hotel');
    Route::post('servicepro/submitHotel', 'Vendor\VendorController@submit_hotel');
    Route::get('servicepro/addHotelTest', 'Vendor\VendorController@add_hotel_test');
    Route::any('servicepro/submitHotelTest', 'Vendor\VendorController@submit_hotel_test');
    Route::any('servicepro/submitHotelPolicy', 'Vendor\VendorController@submit_hotel_policy');
    Route::any('servicepro/submitHotelFacilityService', 'Vendor\VendorController@submit_hotel_facility_service');
    Route::get('servicepro/editHotel/{id}', 'Vendor\VendorController@edit_hotel');
    Route::any('servicepro/updateHotel', 'Vendor\VendorController@update_hotel');
    Route::get('servicepro/changeHotelStatus', 'Vendor\VendorController@change_hotel_status');
    Route::any('servicepro/deleteHotel', 'Vendor\VendorController@delete_hotel');
    Route::any('servicepro/deleteHotelSingleImage', 'Vendor\VendorController@delete_hotel_single_image');

    Route::get('servicepro/viewHotelRooms/{id}', 'Vendor\RoomController@hotel_rooms_list');
    Route::get('servicepro/addroom/{id}', 'Vendor\RoomController@add_room');
    Route::any('servicepro/submitroom', 'Vendor\RoomController@submit_room');
    Route::get('servicepro/changeRoomStatus', 'Vendor\RoomController@change_room_status');
    Route::post('servicepro/deleteRoom', 'Vendor\RoomController@delete_room');
    Route::get('servicepro/editRoom/{id}', 'Vendor\RoomController@edit_room');
    Route::any('servicepro/updateRoom', 'Vendor\RoomController@update_room');
    Route::any('servicepro/viewRoom/{id}', 'Vendor\RoomController@view_room');
    Route::post('servicepro/room_name', 'Vendor\RoomController@room_name');
    Route::any('servicepro/deleteRoomSingleImage', 'Vendor\RoomController@delete_room_single_image');
    Route::post('servicepro/addCopyRoom','Vendor\RoomController@add_copy_room');
    Route::get('servicepro/editCopyRoom/{id}', 'Vendor\RoomController@edit_copy_room');

    
    Route::get('servicepro/bookingList', 'Vendor\BookingController@booking_list');
    Route::any('servicepro/viewBooking/{id}', 'Vendor\BookingController@view_booking');

            // Tour start here
    Route::get('servicepro/tourList', 'Vendor\TourController@tour_list');
    Route::get('servicepro/addTour', 'Vendor\TourController@add_tour');
    Route::any('servicepro/submitTour', 'Vendor\TourController@submit_tour');
    Route::get('servicepro/viewTour/{id}', 'Vendor\TourController@view_tour');
    Route::get('servicepro/editTour/{id}', 'Vendor\TourController@edit_tour');
    Route::any('servicepro/updateTour', 'Vendor\TourController@update_tour');
    Route::get('servicepro/changeTourStatus', 'Vendor\TourController@change_tour_status');
    Route::any('servicepro/deleteTour', 'Vendor\TourController@delete_tour');
    Route::any('servicepro/deleteTourSingleImage', 'Vendor\TourController@delete_tour_single_image');

    // space route start from here
    Route::get('servicepro/space-list', 'Vendor\SpaceController@space_list');
    Route::get('servicepro/add-space', 'Vendor\SpaceController@add_space');
    Route::get('servicepro/add-space/{id}', 'Vendor\SpaceController@add_space');
    Route::any('servicepro/submitSpace', 'Vendor\SpaceController@submit_space');
    Route::get('servicepro/changeSpaceStatus', 'Vendor\SpaceController@change_space_status');
    Route::post('servicepro/deleteSpace', 'Vendor\SpaceController@delete_space');
    Route::get('servicepro/edit-space/{id}', 'Vendor\SpaceController@edit_space');
    Route::any('servicepro/updateSpace', 'Vendor\SpaceController@update_space');
    Route::any('servicepro/view-space/{id}', 'Vendor\SpaceController@view_space');

    Route::any('servicepro/deleteSpaceSingleImage', 'Vendor\SpaceController@delete_space_single_image');
    Route::post('servicepro/addCopySpace','Vendor\SpaceController@add_copy_space');
    Route::get('servicepro/editCopySpace/{id}', 'Vendor\SpaceController@edit_copy_space');

});	


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login','AdminController@login')->name('admin.login');	
        Route::get('/','AdminController@login')->name('admin.login');	
        Route::post('/loginPost', 'AdminController@authenticate'); 
    });
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
        Route::any('/profile', 'AdminController@profile');
        Route::any('/changePassword', 'AdminController@change_password');
        Route::any('/logout', 'AdminController@logout')->name('admin.logout');	

        Route::get('/customer_management', 'CustomerController@index');
        Route::get('/add_customer', 'CustomerController@add_customer');
        Route::any('/add_customer_action', 'CustomerController@add_customer_action');
        Route::get('/edit_customer/{id}', 'CustomerController@edit_customer');
        Route::any('/customer_update', 'CustomerController@customer_update');
        Route::get('/change_user_status', 'CustomerController@change_user_status');
        Route::any('/deletecustomer', 'CustomerController@deletecustomer');

        Route::get('/booking_list', 'Admin\BookingController@booking_list');
        Route::any('/viewBooking/{id}', 'Admin\BookingController@view_booking');
        Route::any('/bookingDetails/{id}', 'Admin\BookingController@booking_details');
        Route::get('/add_customer', 'CustomerController@add_customer');
        Route::any('/add_customer_action', 'CustomerController@add_customer_action');
        Route::get('/edit_customer/{id}', 'CustomerController@edit_customer');
        Route::any('/customer_update', 'CustomerController@customer_update');
        Route::get('/change_user_status', 'CustomerController@change_user_status');
        Route::any('/deletecustomer', 'CustomerController@deletecustomer');

        Route::get('/scoutList', 'ScoutController@scout_list');
        Route::get('/addScout', 'ScoutController@add_scout');
        Route::any('/submitScout', 'ScoutController@submit_scout');
        Route::get('/editScout/{id}', 'ScoutController@edit_scout');
        Route::any('/updateScout', 'ScoutController@update_scout');
        Route::get('/changeScoutStatus', 'ScoutController@change_scout_status');
        Route::any('/deleteScout', 'ScoutController@delete_scout');

        Route::get('/serviceProviderList', 'ServiceproviderController@service_provider_list');
        Route::get('/addServiceProvider', 'ServiceproviderController@add_serv_provider');
        Route::any('/submitServiceProvider', 'ServiceproviderController@submit_serv_provider');
        Route::get('/editServiceProvider/{id}', 'ServiceproviderController@edit_serv_provider');
        Route::any('/updateServiceProvider', 'ServiceproviderController@update_serv_provider');
        Route::get('/change_serv_provider_status', 'ServiceproviderController@change_serv_provider_status');
        Route::any('/deleteServiceProvider', 'ServiceproviderController@delete_serv_provider');

        Route::get('/roomlist', 'Admin\RoomController@room_list');
        Route::get('/addroom', 'Admin\RoomController@add_room');
        Route::get('/addroom/{id}', 'Admin\RoomController@add_room');
        Route::get('/addroomtest', 'Admin\RoomController@add_room_test');
        Route::any('/submitroom', 'Admin\RoomController@submit_room');
        Route::get('/changeRoomStatus', 'Admin\RoomController@change_room_status');
        Route::post('/deleteRoom', 'Admin\RoomController@delete_room');
        Route::get('/editRoom/{id}', 'Admin\RoomController@edit_room');
        // Route::get('/editRoomtest/{id}', 'Admin\RoomController@edit_room_test');
        Route::any('/updateRoom', 'Admin\RoomController@update_room');
        Route::any('/viewRoom/{id}', 'Admin\RoomController@view_room');

        Route::get('/editHotelRoom/{id}', 'Admin\RoomController@edit_hotel_room');
        Route::any('/updateHotelRoom', 'Admin\RoomController@update_hotel_room');

        Route::get('/changeRoomTypeStatus', 'Admin\RoomController@change_room_type_status');
        Route::get('/room_type_categories', 'Admin\RoomController@room_type_categories');
        Route::post('/room_name', 'Admin\RoomController@room_name');

        Route::any('/deleteRoomSingleImage', 'Admin\RoomController@delete_room_single_image');
        Route::post('/addCopyRoom','Admin\RoomController@add_copy_room');
        Route::get('/editCopyRoom/{id}', 'Admin\RoomController@edit_copy_room');

        Route::get('/editCopyHotelRoom/{id}', 'Admin\RoomController@edit_copy_hotel_room');
        Route::any('/updateCopyHotelRoom', 'Admin\RoomController@update_copy_hotel_room');

        Route::get('/hotelList', 'Admin\HotelController@hotel_list');
        Route::get('/addHotel', 'Admin\HotelController@add_hotel');
        Route::any('/submitHotel', 'Admin\HotelController@submit_hotel');
        Route::get('/addHotelTest', 'Admin\HotelController@add_hotel_test'); 
        Route::get('/hotel_types', 'Admin\HotelController@hotel_types');
        Route::any('/deleteHotelSingleImage', 'Admin\HotelController@delete_hotel_single_image');

        Route::any('/submitHotelTest', 'Admin\HotelController@submit_hotel_test');
        Route::any('/submitHotelPolicy', 'Admin\HotelController@submit_hotel_policy');
        Route::any('/submitHotelFacilityService', 'Admin\HotelController@submit_hotel_facility_service');
        Route::get('/editHotel/{id}', 'Admin\HotelController@edit_hotel');
        Route::any('/updateHotel', 'Admin\HotelController@update_hotel');
        Route::get('/viewHotel/{id}', 'Admin\HotelController@view_hotel');
        Route::get('/changeHotelStatus', 'Admin\HotelController@change_hotel_status');
        Route::any('/deleteHotel', 'Admin\HotelController@delete_hotel');

        Route::get('/viewHotelRooms/{id}', 'Admin\HotelController@hotel_rooms_list');

        Route::get('/hotelAndStays_list', 'Admin\HotelnStaysController@hotelAndStays_list');
        Route::get('/addHotelAndStays', 'Admin\HotelnStaysController@addHotelAndStays');
        Route::any('/submitHotelAndStays', 'Admin\HotelnStaysController@submitHotelAndStays');
        Route::get('/editHotelAndStays/{id}', 'Admin\HotelnStaysController@editHotelAndStays');
        Route::any('/updateHotelAndStays', 'Admin\HotelnStaysController@updateHotelAndStays');
        Route::get('/changeHotelAndStaysStatus', 'Admin\HotelnStaysController@changeHotelAndStaysStatus');
        Route::any('/deleteHotelAndStays', 'Admin\HotelnStaysController@deleteHotelAndStays');

        Route::get('/hotelAmenity_list', 'Admin\HotelAmenityController@hotelAmenity_list');
        Route::get('/addHotelAmenity', 'Admin\HotelAmenityController@addHotelAmenity');
        Route::any('/submitHotelAmenity', 'Admin\HotelAmenityController@submitHotelAmenity');
        Route::get('/editHotelAmenity/{id}', 'Admin\HotelAmenityController@editHotelAmenity');
        Route::any('/updateHotelAmenity', 'Admin\HotelAmenityController@updateHotelAmenity');
        Route::get('/changeHotelAmenityStatus', 'Admin\HotelAmenityController@changeHotelAmenityStatus');
        Route::any('/deleteHotelAmenity', 'Admin\HotelAmenityController@deleteHotelAmenity');

        Route::get('/hotelAmenityType_list', 'Admin\HotelAmenityController@hotelAmenityType_list');
        Route::get('/addHotelAmenityType', 'Admin\HotelAmenityController@addHotelAmenityType');
        Route::any('/submitHotelAmenityType', 'Admin\HotelAmenityController@submitHotelAmenityType');
        Route::get('/editHotelAmenityType/{id}', 'Admin\HotelAmenityController@editHotelAmenityType');
        Route::any('/updateHotelAmenityType', 'Admin\HotelAmenityController@updateHotelAmenityType');
        Route::get('/viewHotelAmenityList/{id}', 'Admin\HotelAmenityController@view_hotel_amenity_list');
        Route::get('/changeHotelAmenityTypeStatus', 'Admin\HotelAmenityController@changeHotelAmenityTypeStatus');
        Route::any('/deleteHotelAmenityType', 'Admin\HotelAmenityController@deleteHotelAmenityType');

        Route::get('/hotelService_list', 'Admin\HotelServiceController@hotelService_list');
        Route::get('/addHotelService', 'Admin\HotelServiceController@addHotelService');
        Route::any('/submitHotelService', 'Admin\HotelServiceController@submitHotelService');
        Route::get('/editHotelService/{id}', 'Admin\HotelServiceController@editHotelService');
        Route::any('/updateHotelService', 'Admin\HotelServiceController@updateHotelService');
        Route::get('/changeHotelServiceStatus', 'Admin\HotelServiceController@changeHotelServiceStatus');
        Route::any('/deleteHotelService', 'Admin\HotelServiceController@deleteHotelService');

        Route::get('/hotelRoomType_list', 'Admin\HotelRoomtypeController@hotelRoomType_list');
        Route::get('/addHotelRoomType', 'Admin\HotelRoomtypeController@addHotelRoomType');
        Route::any('/submitHotelRoomType', 'Admin\HotelRoomtypeController@submitHotelRoomType');
        Route::get('/editHotelRoomType/{id}', 'Admin\HotelRoomtypeController@editHotelRoomType');
        Route::any('/updateHotelRoomType', 'Admin\HotelRoomtypeController@updateHotelRoomType');
        Route::get('/changeHotelRoomTypeStatus', 'Admin\HotelRoomtypeController@changeHotelRoomTypeStatus');
        Route::any('/deleteHotelRoomType', 'Admin\HotelRoomtypeController@deleteHotelRoomType');

        Route::get('/hotelSpaceType_list', 'Admin\HotelSpacetypeController@hotelSpaceType_list');
        Route::get('/addHotelSpacetype', 'Admin\HotelSpacetypeController@addHotelSpacetype');
        Route::any('/submitHotelSpacetype', 'Admin\HotelSpacetypeController@submitHotelSpacetype');
        Route::get('/editHotelSpacetype/{id}', 'Admin\HotelSpacetypeController@editHotelSpacetype');
        Route::any('/updateHotelSpacetype', 'Admin\HotelSpacetypeController@updateHotelSpacetype');
        Route::get('/changeHotelSpacetypeStatus', 'Admin\HotelSpacetypeController@changeHotelSpacetypeStatus');
        Route::any('/deleteHotelSpacetype', 'Admin\HotelSpacetypeController@deleteHotelSpacetype');

        // Tour start here
        Route::get('/tourList', 'Admin\TourController@tour_list');
        Route::get('/addTour', 'Admin\TourController@add_tour');
        Route::any('/submitTour', 'Admin\TourController@submit_tour');
        Route::get('/viewTour/{id}', 'Admin\TourController@view_tour');
        Route::get('/editTour/{id}', 'Admin\TourController@edit_tour');
        Route::any('/updateTour', 'Admin\TourController@update_tour');
        Route::get('/changeTourStatus', 'Admin\TourController@change_tour_status');
        Route::any('/deleteTour', 'Admin\TourController@delete_tour');
        Route::any('/deleteTourSingleImage', 'Admin\TourController@delete_tour_single_image');

        // Space start here
        Route::get('/space-list', 'Admin\SpaceController@space_list');
        Route::get('/add-space', 'Admin\SpaceController@add_space');
        Route::get('/add-space/{id}', 'Admin\SpaceController@add_space');
        Route::any('/submitSpace', 'Admin\SpaceController@submit_space');
        Route::get('/changeSpaceStatus', 'Admin\SpaceController@change_space_status');
        Route::post('/deleteSpace', 'Admin\SpaceController@delete_space');
        Route::get('/edit-space/{id}', 'Admin\SpaceController@edit_space');
        Route::any('/updateSpace', 'Admin\SpaceController@update_space');
        Route::any('/view-space/{id}', 'Admin\SpaceController@view_space');

        Route::any('/deleteSpaceSingleImage', 'Admin\SpaceController@delete_space_single_image');
        Route::post('/addCopySpace','Admin\SpaceController@add_copy_space');
        Route::get('/editCopySpace/{id}', 'Admin\SpaceController@edit_copy_space');

        Route::get('/space-category', 'Admin\SpaceController@space_category_list');
        Route::get('/add-space-category', 'Admin\SpaceController@add_space_category');
        Route::any('/submitSpaceCategory', 'Admin\SpaceController@submit_space_category');
        Route::get('/edit-space-category/{id}', 'Admin\SpaceController@edit_space_category');
        Route::any('/updateSpaceCategory', 'Admin\SpaceController@update_space_category');
        Route::get('/changeSpaceCategoryStatus', 'Admin\SpaceController@change_space_category_status');
        Route::post('/deleteSpaceCategory', 'Admin\SpaceController@delete_space_category');

        Route::get('/space-subcategory', 'Admin\SpaceController@space_subcategory_list');
        Route::get('/add-space-subcategory', 'Admin\SpaceController@add_space_subcategory');
        Route::any('/submitSpaceSubCategory', 'Admin\SpaceController@submit_space_subcategory');
        Route::get('/edit-space-subcategory/{id}', 'Admin\SpaceController@edit_space_subcategory');
        Route::any('/updateSpaceSubCategory', 'Admin\SpaceController@update_space_subcategory');
        Route::get('/changeSpaceSubCategoryStatus', 'Admin\SpaceController@change_space_subcategory_status');
        Route::post('/deleteSpaceSubCategory', 'Admin\SpaceController@delete_space_subcategory');
    });
});


Route::group(['prefix' => 'scout'], function(){
    Route::group(['middleware' => 'scout.guest'], function(){ 
        Route::get('/login', [ScoutUserController::class, 'login'])->name('scout.login');	
        Route::post('/loginPost', [ScoutUserController::class, 'postLogin']);	
    });
    Route::group(['middleware' => 'scout.auth'], function(){
        Route::get('/dashboard','Scout\ScoutUserController@dashboard')->name('scout.dashboard');
        Route::any('/profile', 'Scout\ScoutUserController@profile');
        Route::any('/changePassword', 'Scout\ScoutUserController@change_password');
        Route::any('/logout', 'Scout\ScoutUserController@scoutLogout')->name('scout.logout');	
    });
});

/* start web services api */

/* Route::group(['middleware' => 'App\Http\Middleware\VerifyCsrfToken'], function () {

Route::post('/ws/hotel_list','WsController@hotel_list')->middleware('CheckToken');
Route::post('/ws/hotel_detail','WsController@hotel_details')->middleware('CheckToken');
Route::post('/ws/room_detail','WsController@room_details')->middleware('CheckToken');

}); */
