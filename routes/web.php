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
	try{
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

Route::get('/apg', 'HomeController@apg')->name('user.apg');
Route::get('/ipn','HomeController@ipn')->name('user.ipn');

Route::get('/about-us', 'HomeController@about_us')->name('user.about_us');
Route::get('/contact-us', 'HomeController@contact_us')->name('user.contact_us');
Route::get('/terms_&_condition','HomeController@terms_condition')->name('user.terms_&_condition');
Route::get('/cookie-policy', 'HomeController@cookie_policy')->name('user.cookie_policy');
Route::get('/privacy-policy', 'HomeController@privacy_policy')->name('user.privacy_policy');
Route::get('/cancellation-policy', 'HomeController@cancellation_policy')->name('user.cancellation_policy');
Route::get('/list-your-property','HomeController@list_your_property')->name('user.list_your_property');
Route::get('/baseForm', 'HomeController@baseForm');

Route::post('/updateProfile', 'HomeController@updateProfile');
Route::post('/updateProfileImage', 'HomeController@updateProImg'); 

Route::post('/user/loginPost', 'HomeController@postLogin'); 
Route::post('/user/signup', 'HomeController@signup'); 
Route::get('/email_verification/{id}', 'HomeController@email_verification');
Route::post('/servicepro/loginPost', 'HomeController@serviceProPostLogin');
Route::post('/servicepro/signup', 'HomeController@vendorSignup');  

// Route::post('forgotPassword_action','Home\FrontController@forgotPassword_action');
Route::post('forgotPassword_action','HomeController@forgotPassword_action');
Route::any('reset-password/{token}','HomeController@reset_password');
Route::post('resetPassword_action','HomeController@resetPassword_action');


Route::any('/checkValidHotelDaterange', 'HomeController@check_valid_hotel_daterange')->name('user.checkValidHotelDaterange');	
Route::get('/hotelDetails/{id?}','HomeController@hotel_details')->name('user.hotel_details');
Route::get('/hotelDetails','HomeController@hotel_details')->name('user.hotel_details');
Route::get('/roomdetails','HomeController@room_details')->name('user.room_details');
Route::get('/hotelList/{name?}','HomeController@hotel_list')->name('user.hotel_list');
Route::get('/checkout/{name?}','HomeController@checkout')->name('user.checkout');
Route::post('/hote_list_ajax','HomeController@hotel_list_ajax')->name('user.hotel_list_ajax');

Route::get('/hote_list_ajax','HomeController@hotel_list_ajax_page')->name('user.hotel_list_ajax_page');

route::post('/roombookingorderoffline','HomeController@roombookingorderoffline')->name('user.roombookingorderoffline');

Route::get('/confirmBooking','HomeController@confirm_booking')->name('user.confirm_booking');
Route::get('/allRooms','HomeController@all_rooms')->name('user.all_rooms');
Route::post('/room_details_ajax','HomeController@room_details_ajax')->name('user.room_details_ajax');
Route::get('/events','HomeController@events')->name('user.events');
Route::get('/event_details','Home\HomeController@event_details')->name('user.event_details');
Route::get('/event_details/{id?}','HomeController@event_details')->name('user.event_details');
Route::get('/eventBooking/{name?}','HomeController@eventBooking')->name('user.eventBooking');
Route::get('/tour','HomeController@tour')->name('user.tour');
Route::get('/tour-list/{name?}','HomeController@tour_list')->name('user.tour-list');
Route::get('/tour_enquiry','HomeController@tour_enquiry')->name('user.tour_enquiry');
Route::post('/tour_list_ajax','HomeController@tour_list_ajax')->name('user.tour_list_ajax');
Route::get('/tour_list_country/{id?}','HomeController@tour_list_country')->name('user.tour_list_country');
Route::get('/tour_details/{id?}','HomeController@tour_details')->name('user.tour_details');
Route::get('/tourBooking/{name?}','HomeController@tourBooking')->name('user.tourBooking');
Route::post('submitMaketrip','HomeController@submitMaketrip')->name('user.submitMaketrip');
Route::get('/packages','HomeController@packages')->name('user.packages');
Route::get('/space','Home\SpaceController@space')->name('user.space');
Route::get('/space-details/{id?}','Home\SpaceController@space_details')->name('user.space_details');
Route::get('/spaceList/{name?}','Home\SpaceController@space_search_list');
Route::get('/space-details','Home\SpaceController@space_details')->name('user.space_details');
Route::get('/space-detail/{id?}','Home\SpaceController@space_detail')->name('user.space_detail');
Route::get('/test-space-detail/{id?}','Home\SpaceController@space_detail_test')->name('user.test_space_detail');

Route::any('/changeDaterange', 'Home\SpaceController@change_daterange_session')->name('user.changeDaterange');	
Route::any('/updateDaterange', 'Home\SpaceController@update_daterange_session')->name('user.updateDaterange');	
Route::any('/checkValidDaterange', 'Home\SpaceController@check_valid_daterange')->name('user.checkValidDaterange');	
Route::any('/delete_space_date_session', 'Home\SpaceController@removeSpaceDateSession')->name('user.delete_space_date_session');	

Route::get('/space-category-list/{id?}','Home\SpaceController@space_category_list')->name('user.space_category_list');
Route::get('/space-checkout/{name?}','Home\SpaceController@checkout')->name('user.space_checkout');
Route::get('/space-city-wise/{id?}','Home\SpaceController@space_city_wise')->name('user.space_city_wise');
Route::post('/bookingSpaceOrder','Home\SpaceController@spaceBookingOrder')->name('user.spaceBookingOrder');
route::post('/spacebookingorderoffline','Home\SpaceController@spacebookingorderoffline')->name('user.spacebookingorderoffline');
Route::get('/space-payment-successful','Home\SpaceController@space_payment_successful')->name('user.space_payment_successful');

Route::get('/travel-details','HomeController@travel_details')->name('user.travel-details');

Route::get('/blogs','HomeController@blogs')->name('user.blogs');

Route::post('/bookingRoomOrder','HomeController@booking_room_order')->name('user.booking_room_order');
Route::get('payment-successful','HomeController@payment_successful')->name('user.payment_successful');

Route::post('/tourBookingOrder','HomeController@tourBookingOrder')->name('user.tourBookingOrder');
Route::get('tour-payment-successful','HomeController@tour_payment_successful')->name('user.tour_payment_successful');

Route::post('/eventBookingOrder','HomeController@eventBookingOrder')->name('user.eventBookingOrder');
Route::get('event-payment-successful','HomeController@event_payment_successful')->name('user.event_payment_successful');

// check and send reminder and delete booking request 
Route::any('/checkEndtimeForBookingRequest','Home\SpaceController@check_endtime_for_booking_request');

Route::any('/checkEndtimeForRoomBookingRequest','Home\BookingController@check_endtime_for_room_booking_request');

Route::any('/checkEndtimeForTourBookingRequest','Home\BookingController@check_endtime_for_tour_booking_request');
// Route::get('/two','HomeController@two')->name('user.two');
// Route::get('/three','HomeController@three')->name('user.three');

// user route start here
Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {
    Route::get('user/profile','HomeController@userProfile')->name('user.profile');
    Route::any('user/changePassword', 'HomeController@change_password');
    Route::any('user/updatePassword', 'Home\UserController@update_password');
    Route::any('user/logout', 'HomeController@userLogout')->name('user.logout');

    // Route::get('user/hotelDetails','HomeController@hotel_details')->name('user.hotel_details');

    // booking 
    Route::any('user/bookingList', 'Home\BookingController@booking_list');	
    Route::any('user/bookingList-upcoming', 'Home\BookingController@booking_list_upcoming');	
    Route::any('user/bookingList-cancel', 'Home\BookingController@booking_list_cancel');	
    Route::any('user/spaceBookingList', 'Home\BookingController@space_booking_list');
    Route::any('user/spaceBookingList-upcoming', 'Home\BookingController@space_booking_list_upcoming');	
    Route::any('user/spaceBookingList-cancel', 'Home\BookingController@space_booking_list_cancel');		
    Route::any('user/tourBookingList', 'Home\BookingController@tour_booking_list');	
    Route::any('user/tourBookingList-upcoming', 'Home\BookingController@tour_booking_list_upcoming');	
    Route::any('user/tourBookingList-cancel', 'Home\BookingController@tour_booking_list_cancel');	

    Route::any('user/requestBookingRoom', 'Home\BookingController@request_booking_room');   
    Route::any('user/cancelRoomBookingRequest', 'Home\BookingController@cancel_request_booking_room');

    Route::any('user/requestBookingTour', 'Home\BookingController@request_booking_tour');	
    Route::any('user/cancelTourBookingRequest', 'Home\BookingController@cancel_request_booking_tour');	
    Route::any('user/requestBookingSpace', 'Home\BookingController@request_booking_space'); 
    Route::any('user/cancelSpaceBookingRequest', 'Home\BookingController@cancel_request_booking_space');

    Route::any('user/eventBookingList', 'Home\BookingController@event_booking_list');	
    Route::get('user/eventBookingDetails/{id}', 'Home\BookingController@event_booking_detail');
    Route::get('user/cancelledEventBookingDetails/{id}', 'Home\BookingController@canceled_event_booking_details');	

    Route::get('user/bookingDetails/{id}', 'Home\BookingController@booking_detail');	
    Route::post('user/cancelHotelBooking','Home\BookingController@cancel_hotel_booking');	
    Route::get('user/bookingDetailCancelled/{id}', 'Home\BookingController@booking_canceled_detail');	
    Route::get('user/bookingInvoice/{id}', 'Home\BookingController@booking_invoice');
    Route::get('user/spaceBookingInvoice/{id}', 'Home\BookingController@space_booking_invoice');
    Route::get('user/tourBookingInvoice/{id}', 'Home\BookingController@tour_booking_invoice');
    Route::get('user/eventBookingInvoice/{id}', 'Home\BookingController@event_booking_invoice');

    Route::get('user/spaceBookingDetails/{id}', 'Home\BookingController@space_booking_detail');	
    Route::post('user/cancelSpaceBooking','Home\BookingController@cancel_space_booking');
    Route::get('user/cancelledSpaceBooking/{id}', 'Home\BookingController@space_booking_canceled');	
    
    Route::get('user/tourBookingDetails/{id}', 'Home\BookingController@tour_booking_detail');
    Route::post('user/cancelTourBooking','Home\BookingController@cancel_tour_booking');	
    Route::get('user/cancelledTourBooking/{id}', 'Home\BookingController@tour_booking_canceled');	
    Route::any('user/bookingList-approval', 'Home\BookingController@booking_list_approval');
    Route::any('user/spaceBookingList-approval', 'Home\BookingController@space_booking_list_approval');
    Route::any('user/tourBookingList-approval', 'Home\BookingController@tour_booking_list_approval');
});	

// vendor route start here
Route::group(['middleware' => 'App\Http\Middleware\VendorMiddleware'], function () {
    Route::get('servicepro/dashboard','Vendor\VendorController@serviceProDashboard')->name('servicepro.dashboard');
    Route::any('servicepro/profile', 'HomeController@serviceProProfile'); 

    Route::any('servicepro/hotel-reservation-list', 'Vendor\ReservationController@hotel_reservation');	
    Route::post('servicepro/cancelHotelBooking','Home\BookingController@cancel_hotel_booking');
    Route::any('servicepro/space-reservation-list', 'Vendor\ReservationController@space_reservation');	
    Route::post('servicepro/cancelSpaceBooking','Home\BookingController@cancel_space_booking');
    Route::any('servicepro/tour-reservation-list', 'Vendor\ReservationController@tour_reservation');
    Route::post('servicepro/cancelTourBooking','Home\BookingController@cancel_tour_booking');	

    Route::get('servicepro/hotel-reservation-details/{id}', 'Vendor\ReservationController@hotel_reservation_detail');	
    Route::get('servicepro/hotel-reservation-cancel-details/{id}', 'Vendor\ReservationController@hotel_reservation_canceled_detail');	

    Route::get('servicepro/space-reservation-details/{id}', 'Vendor\ReservationController@space_reservation_detail');	
    Route::get('servicepro/space-reservation-cancel-details/{id}', 'Vendor\ReservationController@space_reservation_canceled');	

    Route::get('servicepro/tour-reservation-details/{id}', 'Vendor\ReservationController@tour_reservation_detail');	
    Route::get('servicepro/tour-reservation-cancel-details/{id}', 'Vendor\ReservationController@tour_reservation_canceled');	

    Route::get('servicepro/bookingInvoice/{id}', 'Home\BookingController@booking_invoice');
    Route::get('servicepro/spaceBookingInvoice/{id}', 'Home\BookingController@space_booking_invoice');
    Route::get('servicepro/tourBookingInvoice/{id}', 'Home\BookingController@tour_booking_invoice');
    Route::get('servicepro/eventBookingInvoice/{id}', 'Home\BookingController@event_booking_invoice');


    Route::any('servicepro/updatePassword', 'Home\UserController@update_password');
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
    
    Route::any('servicepro/roomWiseBookingList/{id}', 'Vendor\BookingController@view_room_wise_booking_list');
    Route::any('servicepro/spaceWiseBookingList/{id}', 'Vendor\SpaceController@view_space_wise_booking_list');
    Route::any('servicepro/tourWiseBookingList/{id}', 'Vendor\TourController@view_tour_wise_booking_list');

    Route::any('servicepro/issueInvoiceRoom', 'Vendor\BookingController@issue_invoice_room');
    Route::any('servicepro/rejectBookingRequestRoom', 'Vendor\BookingController@reject_booking_request_room');
    Route::any('servicepro/deleteInvoiceRoom', 'Vendor\BookingController@delete_invoice_room');

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
    Route::get('servicepro/tourbooking_list', 'Vendor\TourController@tourbooking_list');
    Route::get('servicepro/viewtourBooking/{id}', 'Vendor\TourController@view_booking');
    Route::get('servicepro/tourApproveBooking_list', 'Vendor\TourController@tour_approve_booking_list');

    Route::any('servicepro/issueInvoiceTour', 'Vendor\TourController@issue_invoice_tour');
    Route::any('servicepro/rejectBookingRequestTour', 'Vendor\TourController@reject_booking_request_tour');
    Route::any('servicepro/deleteInvoiceTour', 'Vendor\TourController@delete_invoice_tour');
    Route::any('servicepro/cancelTourBookingRequestStatus', 'Vendor\TourController@cancel_tour_booking_request_status');
    Route::any('servicepro/getInvoiceDetails/{requestId}', 'Vendor\TourController@getInvoiceDetails')->name('getInvoiceDetails');
    Route::any('servicepro/sendInvoice', 'Vendor\TourController@send_invoice');
    Route::any('servicepro/deleteBookingRequest', 'Vendor\TourController@delete_booking_request');

    // space route start from here
    Route::get('servicepro/space-list', 'Vendor\SpaceController@space_list');
    Route::get('servicepro/add-space', 'Vendor\SpaceController@add_space');
    Route::get('servicepro/stepadd-space', 'Vendor\SpaceController@step_add_space');
    Route::get('servicepro/add-space/{id}', 'Vendor\SpaceController@add_space');
    Route::any('servicepro/submitSpace', 'Vendor\SpaceController@submit_space');
    Route::get('servicepro/changeSpaceStatus', 'Vendor\SpaceController@change_space_status');
    Route::post('servicepro/deleteSpace', 'Vendor\SpaceController@delete_space');
    Route::get('servicepro/edit-space/{id}', 'Vendor\SpaceController@edit_space');
    Route::get('servicepro/stepedit-space/{id}', 'Vendor\SpaceController@step_edit_space');
    Route::any('servicepro/updateSpace', 'Vendor\SpaceController@update_space');
    Route::any('servicepro/view-space/{id}', 'Vendor\SpaceController@view_space');
    Route::any('servicepro/stepview-space/{id}', 'Vendor\SpaceController@step_view_space');

    Route::any('servicepro/deleteSpaceSingleImage', 'Vendor\SpaceController@delete_space_single_image');
    Route::post('servicepro/addCopySpace','Vendor\SpaceController@add_copy_space');
    Route::get('servicepro/editCopySpace/{id}', 'Vendor\SpaceController@edit_copy_space');
    
    Route::post('servicepro/addCopyTour','Vendor\TourController@add_copy_tour');
    Route::get('servicepro/editCopyTour/{id}', 'Vendor\TourController@edit_copy_tour');

    Route::get('servicepro/spaceBookingList', 'Vendor\BookingController@space_booking_list');
    Route::any('servicepro/spaceBookingView/{id}', 'Vendor\BookingController@space_booking_view');

    Route::any('servicepro/issueInvoiceSpace', 'Vendor\BookingController@issue_invoice_space');
    Route::any('servicepro/rejectBookingRequestSpace', 'Vendor\BookingController@reject_booking_request_space');
    Route::any('servicepro/deleteInvoiceSpace', 'Vendor\BookingController@delete_invoice_space');

    Route::get('servicepro/transactionHistory', 'Vendor\BookingController@transaction_history');
    Route::get('servicepro/transactionHistoryView/{id}', 'Vendor\BookingController@view_transaction_history'); 
    Route::get('servicepro/events_list', 'Vendor\EventController@events_list');
    Route::get('servicepro/addEvent', 'Vendor\EventController@addEvent');
    Route::post('servicepro/submitEvent', 'Vendor\EventController@submitEvent');
    Route::get('servicepro/changeEventStatus', 'Vendor\EventController@change_event_status');
    Route::get('servicepro/edit_event/{id}', 'Vendor\EventController@edit_event');
    Route::post('servicepro/updateEvent', 'Vendor\EventController@updateEvent');
    Route::any('servicepro/view-event/{id}', 'Vendor\EventController@view_event');
    Route::post('servicepro/deleteEvent', 'Vendor\EventController@delete_event');
     Route::get('servicepro/spaceApproveBooking_list', 'Vendor\BookingController@space_approve_booking_list');
    Route::any('servicepro/cancelSpaceBookingRequestStatus', 'Vendor\BookingController@cancel_space_booking_request_status');
    Route::any('servicepro/getSpaceInvoiceDetails/{requestId}', 'Vendor\BookingController@getSpaceInvoiceDetails')->name('getSpaceInvoiceDetails');
    Route::any('servicepro/sendSpaceInvoice', 'Vendor\BookingController@sendSpaceInvoice');
    Route::any('servicepro/deleteSpaceBookingRequest', 'Vendor\BookingController@delete_space_booking_request');
     Route::get('servicepro/roomsApproveBooking_list', 'Vendor\BookingController@room_approve_booking_list');
    Route::any('servicepro/cancelRoomBookingRequestStatus', 'Vendor\BookingController@cancel_room_booking_request_status');
    Route::any('servicepro/getRoomInvoiceDetails/{requestId}', 'Vendor\BookingController@getRoomInvoiceDetails')->name('getRoomInvoiceDetails');
    Route::any('servicepro/sendRoomInvoice', 'Vendor\BookingController@sendRoomInvoice');
    Route::any('servicepro/deleteRoomBookingRequest', 'Vendor\BookingController@delete_room_booking_request');
    Route::any('servicepro/requestBookingTour', 'Home\BookingController@request_booking_tour');
    Route::any('servicepro/cancelTourBookingRequest', 'Home\BookingController@cancel_request_booking_tour');  

    Route::any('servicepro/requestBookingSpace', 'Home\BookingController@request_booking_space'); 
    Route::any('servicepro/cancelSpaceBookingRequest', 'Home\BookingController@cancel_request_booking_space');

    Route::any('servicepro/requestBookingRoom', 'Home\BookingController@request_booking_room');   
    Route::any('servicepro/cancelRoomBookingRequest', 'Home\BookingController@cancel_request_booking_room');

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
        Route::get('/rooms_approval_booking_list', 'Admin\BookingController@rooms_approval_booking_list');
        Route::any('/viewBooking/{id}', 'Admin\BookingController@view_booking');
        Route::any('/bookingDetails/{id}', 'Admin\BookingController@booking_details');
        Route::get('/changeBookingStatus','Admin\BookingController@change_booking_status');
        Route::get('/changeOfflineBookingStatus','Admin\BookingController@change_offline_booking_status');
        Route::get('/changeTourBookingStatus','Admin\BookingController@change_tour_booking_status');
        Route::get('/changeOfflineTourBookingStatus','Admin\BookingController@change_offline_tour_booking_status');
        Route::get('/changeSpaceBookingStatus','Admin\BookingController@change_space_booking_status');
        Route::get('/changeOfflineSpaceBookingStatus','Admin\BookingController@change_offline_space_booking_status');

        Route::get('/globalTime', 'Admin\BookingController@global_time');
        Route::any('/updateGlobalTime', 'Admin\BookingController@global_time_update');

        Route::any('/roomWiseBookingList/{id}', 'Admin\BookingController@view_room_wise_booking_list');
        Route::any('/spaceWiseBookingList/{id}', 'Admin\SpaceController@view_space_wise_booking_list');
        Route::any('/tourWiseBookingList/{id}', 'Admin\TourController@view_tour_wise_booking_list');
        
        Route::get('/scoutList', 'ScoutController@scout_list');
        Route::get('/addScout', 'ScoutController@add_scout');
        Route::any('/submitScout', 'ScoutController@submit_scout');
        Route::get('/editScout/{id}', 'ScoutController@edit_scout');
        Route::any('/updateScout', 'ScoutController@update_scout');
        Route::get('/changeScoutStatus', 'ScoutController@change_scout_status');
        Route::any('/deleteScout', 'ScoutController@delete_scout');
        Route::get('/addScoutRating/{id}', 'ScoutController@add_scout_rating');
        Route::any('/submitScoutRating', 'ScoutController@submit_scout_rating');
        Route::get('/scoutRatingList/{id}','ScoutController@scout_rating_list');
        
        Route::get('/editScoutRating/{id}', 'ScoutController@edit_scout_rating');
        Route::any('/updateScoutRating', 'ScoutController@update_scout_rating');
        Route::get('/changeScoutRatingStatus', 'ScoutController@change_scout_rating_status');
        Route::any('/deleteScoutRating', 'ScoutController@delete_scout_rating');

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
        Route::post('/roomCustomPriceUpdate', 'Admin\RoomController@room_custom_price_update');
        Route::get('/roomPriceCalendar/{id}', 'Admin\RoomController@room_price_calendar');
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

        Route::get('/addRoomTypeCategory', 'Admin\RoomController@add_Room_type_category');
        Route::any('/submitRoomTypeCategory', 'Admin\RoomController@submit_room_type_category');
        Route::get('/editRoomTypeCategory/{id}', 'Admin\RoomController@edit_room_type_category');
        Route::any('/updateRoomTypeCategory', 'Admin\RoomController@update_room_type_category');
        Route::post('/deleteRoomTypeCategory', 'Admin\RoomController@delete_room_type_category');

        Route::get('/roomNameList', 'Admin\RoomController@room_name_list');
        Route::get('/addRoomName', 'Admin\RoomController@add_Room_name');
        Route::any('/submitRoomName', 'Admin\RoomController@submit_room_name');
        Route::get('/editRoomName/{id}', 'Admin\RoomController@edit_room_name');
        Route::any('/updateRoomName', 'Admin\RoomController@update_room_name');
        Route::post('/deleteRoomName', 'Admin\RoomController@delete_room_name');
        Route::get('/roomTypeWiseRoomNameList/{id}', 'Admin\RoomController@room_type_wise_room_name_list');

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
        Route::get('/customtourList', 'Admin\TourController@custom_tour_list');
        Route::get('/viewCustomTour/{id}', 'Admin\TourController@view_custom_tour');
        Route::get('/addTour', 'Admin\TourController@add_tour');
        Route::any('/submitTour', 'Admin\TourController@submit_tour');
        Route::get('/viewTour/{id}', 'Admin\TourController@view_tour');
        Route::get('/editTour/{id}', 'Admin\TourController@edit_tour');
        Route::any('/updateTour', 'Admin\TourController@update_tour');
        Route::get('/changeTourStatus', 'Admin\TourController@change_tour_status');
        Route::any('/deleteTour', 'Admin\TourController@delete_tour');
        Route::any('/deleteTourSingleImage', 'Admin\TourController@delete_tour_single_image');
        Route::get('/tourbooking_list', 'Admin\TourController@tourbooking_list');
        Route::get('/tour_approval_booking_list', 'Admin\TourController@tour_approval_booking_list');
        Route::get('/viewtourBooking/{id}', 'Admin\TourController@view_booking');
        // Space start here
        Route::get('/space-list', 'Admin\SpaceController@space_list');
        Route::get('/add-space', 'Admin\SpaceController@add_space');
        Route::get('/stepadd-space', 'Admin\SpaceController@step_add_space');
        // Route::get('/add-space/{id}', 'Admin\SpaceController@add_space');
        Route::any('/submitSpace', 'Admin\SpaceController@submit_space');
        Route::get('/changeSpaceStatus', 'Admin\SpaceController@change_space_status');
        Route::post('/deleteSpace', 'Admin\SpaceController@delete_space');
        Route::get('/edit-space/{id}', 'Admin\SpaceController@edit_space');
        Route::get('/stepedit-space/{id}', 'Admin\SpaceController@step_edit_space');
        Route::any('/updateSpace', 'Admin\SpaceController@update_space');
        Route::any('/view-space/{id}', 'Admin\SpaceController@view_space');
        Route::any('/stepview-space/{id}', 'Admin\SpaceController@step_view_space');

        Route::any('/deleteSpaceSingleImage', 'Admin\SpaceController@delete_space_single_image');
        Route::post('/addCopySpace','Admin\SpaceController@add_copy_space');
        Route::get('/editCopySpace/{id}', 'Admin\SpaceController@edit_copy_space');
                    
        Route::post('/addCopyTour','Admin\TourController@add_copy_tour');
        Route::get('/editCopyTour/{id}', 'Admin\TourController@edit_copy_tour');

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

        Route::get('/spaceBookingList', 'Admin\SpaceController@booking_list');
        Route::get('/space_approval_booking_list', 'Admin\SpaceController@space_approval_booking_list');

        // Route::any('/getSpaceInvoiceDetails/{requestId}', 'Admin\SpaceController@getSpaceInvoiceDetails')->name('getSpaceInvoiceDetails_admin');

        Route::any('/spaceViewBooking/{id}', 'Admin\SpaceController@view_booking');
        Route::any('/spaceBookingDetails/{id}', 'Admin\SpaceController@booking_details');
        Route::get('/transactionHistory', 'Admin\BookingController@transaction_history');
        Route::get('/transactionHistoryView/{id}', 'Admin\BookingController@view_transaction_history');
        Route::get('/events_list', 'Admin\EventController@events_list');
        Route::get('/addEvent', 'Admin\EventController@addEvent');
        Route::post('/submitEvent', 'Admin\EventController@submitEvent');
        Route::get('/changeEventStatus', 'Admin\EventController@change_event_status');
        Route::get('/edit_event/{id}', 'Admin\EventController@edit_event');
        Route::post('/updateEvent', 'Admin\EventController@updateEvent');
        Route::any('/view-event/{id}', 'Admin\EventController@view_event');
        Route::post('/deleteEvent', 'Admin\EventController@delete_event');
        Route::any('/deleteEventSingleImage', 'Admin\EventController@delete_event_single_image');
        Route::any('/eventMileData', 'Admin\EventController@event_mile_data');

        Route::get('banner_management', 'Admin\CmsController@index');
        Route::get('add_banner', 'Admin\CmsController@addBanner');
        Route::post('submitBanner', 'Admin\CmsController@submitBanner');
        Route::get('change_banner_status', 'Admin\CmsController@change_banner_status');
        Route::get('edit_banner/{id}', 'Admin\CmsController@editBanner');
        Route::post('/updateBanner', 'Admin\CmsController@updateBanner');
        Route::get('/addHeadingSubheading', 'Admin\CmsController@addHeadingSubheading');
        Route::post('/submitHeadingSubheading', 'Admin\CmsController@submitHeadingSubheading');
        Route::get('/showHeadingSubheading', 'Admin\CmsController@showHeadingSubheading');
        Route::get('/showStaticData', 'Admin\CmsController@showStaticData');
        Route::get('/editStaticData/{id}', 'Admin\CmsController@editStaticData');
        Route::post('/updateStaticData', 'Admin\CmsController@updateStaticData');
        Route::get('/showAboutBanner', 'Admin\CmsController@showAboutBanner');
        Route::get('/editAboutBanner/{id}', 'Admin\CmsController@editAboutBanner');
        Route::post('/updateAboutBanner', 'Admin\CmsController@updateAboutBanner');
        Route::get('/showAboutContent', 'Admin\CmsController@showAboutContent');
        Route::get('/editAboutContent/{id}', 'Admin\CmsController@editAboutContent');
        Route::post('/updateAboutContent', 'Admin\CmsController@updateAboutContent');
        Route::get('/showChooseUs', 'Admin\CmsController@showChooseUs');
        Route::get('/editChooseUs/{id}', 'Admin\CmsController@editChooseUs');
        Route::post('/updateChooseUs', 'Admin\CmsController@updateChooseUs');
        
        Route::get('/eventbooking_list', 'Admin\EventController@eventbooking_list');
        Route::any('/view-eventbooking/{id}', 'Admin\EventController@view_eventbooking');
    });
});


Route::group(['prefix' => 'scout'], function(){
    Route::group(['middleware' => 'scout.guest'], function(){ 	
        // Route::get('/login', [Scout\ScoutUserController::class, 'login'])->name('scout.login');
        // Route::post('/loginPost', [Scout\ScoutUserController::class, 'postLogin']);	
        Route::get('/login', 'Scout\ScoutUserController@login')->name('scout.login');	
        Route::post('/loginPost', 'Scout\ScoutUserController@postLogin');
        
    });
    Route::group(['middleware' => 'scout.auth'], function(){
        Route::get('/dashboard','Scout\ScoutUserController@dashboard')->name('scout.dashboard');
        Route::any('/profile', 'Scout\ScoutUserController@profile');
        Route::any('/changePassword', 'Scout\ScoutUserController@change_password');
        Route::any('/logout', 'Scout\ScoutUserController@scoutLogout')->name('scout.logout');
        Route::get('/hotelList', 'Scout\HotelController@hotel_list');
        Route::get('/viewHotelRooms/{id}', 'Scout\HotelController@hotel_rooms_list');
        Route::get('/viewHotel/{id}', 'Scout\HotelController@view_hotel');
        Route::get('/viewHotelRooms/{id}', 'Scout\HotelController@hotel_rooms_list');
        Route::any('/viewRoom/{id}', 'Scout\HotelController@view_room');
        Route::get('/tourList', 'Scout\TourController@tour_list');
        Route::get('/viewTour/{id}', 'Scout\TourController@view_tour');	
        Route::get('/spaceList', 'Scout\ScoutSpaceController@index');
        Route::get('/spaceView/{id}', 'Scout\ScoutSpaceController@spaceView');
        Route::get('/bookingList', 'Scout\ScoutSpaceController@bookingList');
        Route::get('/changeSpaceStatus', 'Scout\ScoutSpaceController@change_space_status');
        Route::any('/viewBooking/{id}', 'Scout\ScoutSpaceController@view_booking');
        Route::get('/tourbooking_list', 'Scout\ScoutSpaceController@tourbooking_list');
        Route::get('/view_tour_booking/{id}', 'Scout\ScoutSpaceController@viewTourBooking');
        Route::get('/spacebooking_list', 'Scout\ScoutSpaceController@spacebooking_list');
        Route::get('/view_space_booking/{id}', 'Scout\ScoutSpaceController@viewSpaceBooking');
        Route::get('/changeBookingStatus','Admin\BookingController@change_booking_status');
        Route::get('/changeSpaceBookingStatus','Admin\BookingController@change_space_booking_status');
        Route::get('/events_list', 'Scout\ScoutSpaceController@events_list');
        Route::any('/view-event/{id}', 'Scout\ScoutSpaceController@view_event');
        Route::get('/eventbooking_list', 'Scout\ScoutSpaceController@eventbooking_list');
        Route::any('/view-eventbooking/{id}', 'Scout\ScoutSpaceController@view_eventbooking');
    });
});


/* start web services api */

/* Route::group(['middleware' => 'App\Http\Middleware\VerifyCsrfToken'], function () {

Route::post('/ws/hotel_list','WsController@hotel_list')->middleware('CheckToken');
Route::post('/ws/hotel_detail','WsController@hotel_details')->middleware('CheckToken');
Route::post('/ws/room_detail','WsController@room_details')->middleware('CheckToken');

}); */
