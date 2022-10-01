<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Helpers\Helper;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // HOTEL booking start here 

    public function booking_list(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['bookingList'] = DB::table('booking')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
            ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
            ->join('country', 'hotels.hotel_country', '=', 'country.id')
            ->select(
                'booking.*',
                'hotels.hotel_name',
                'hotels.hotel_user_id',
                'hotels.is_admin as hotel_added_is_admin',
                'hotels.property_contact_name',
                'hotels.property_contact_num',
                'hotels.hotel_address',
                'hotels.hotel_city',
                'hotels.stay_price as hotelroom_min_stay_price',
                'hotels.checkin_time',
                'hotels.checkout_time',
                'country.nicename as hotel_country',
                'room_type_categories.title as room_type_name',
                'room_list.name as room_name'
            )
            ->where('booking.user_id', $u_id)   
            ->where('booking.booking_status', '!=' ,'canceled')   
            ->where('booking.check_out', '<', date('Y-m-d'))
            ->orderby('booking.id', 'DESC')
            ->get();
            // ->paginate(10);

        // echo "<pre>";print_r($data['bookingList']);die;
        return view('front/booking/booking_list')->with($data);
    }

    public function booking_list_upcoming(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['upcomingBookingList'] = DB::table('booking')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
            ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
            ->join('country', 'hotels.hotel_country', '=', 'country.id')
            ->select(
                'booking.*',
                'hotels.hotel_name',
                'hotels.hotel_user_id',
                'hotels.is_admin as hotel_added_is_admin',
                'hotels.property_contact_name',
                'hotels.property_contact_num',
                'hotels.hotel_address',
                'hotels.hotel_city',
                'hotels.stay_price as hotelroom_min_stay_price',
                'hotels.checkin_time',
                'hotels.checkout_time',
                'country.nicename as hotel_country',
                'room_type_categories.title as room_type_name',
                'room_list.name as room_name'
            )
            ->where('booking.user_id', $u_id) 
            ->where('booking.booking_status', '!=', 'canceled')  
            ->orderby('booking.id', 'DESC')
            ->get();    
            // ->paginate(10);    
        // echo "<pre>";print_r($data['canceledList']);die;
        return view('front/booking/booking_list_upcoming')->with($data);
    }

    public function booking_list_cancel(Request $request)
    {
        $u_id = Auth::user()->id;

        $data['bookingList'] = DB::table('booking')
        ->join('users', 'booking.user_id', '=', 'users.id')
        ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
        ->join('room_list', 'booking.room_id', '=', 'room_list.id')
        ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
        ->join('country', 'hotels.hotel_country', '=', 'country.id')
        ->select(
            'booking.*',
            'hotels.hotel_name',
            'hotels.hotel_user_id',
            'hotels.is_admin as hotel_added_is_admin',
            'hotels.property_contact_name',
            'hotels.property_contact_num',
            'hotels.hotel_address',
            'hotels.hotel_city',
            'hotels.stay_price as hotelroom_min_stay_price',
            'hotels.checkin_time',
            'hotels.checkout_time',
            'country.nicename as hotel_country',
            'room_type_categories.title as room_type_name',
            'room_list.name as room_name'
        )
        ->where('booking.user_id', $u_id)   
        ->orderby('booking.id', 'DESC')
        ->get();
        // ->paginate(10);    
 
        // echo "<pre>";print_r($data['canceledList']);die;
        return view('front/booking/booking_list_cancel')->with($data);
    }

    public function booking_detail($id)
    {        
        $booking_id = base64_decode($id);
        $data['bookingDetails'] = DB::table('booking')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'booking.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'users.address as user_address',
                'users.state_id as user_state',
                'users.user_city as user_city',
                'users.postal_code as user_postal_code',
                'country.nicename as user_country',
                'hotels.hotel_name',
                'hotels.hotel_user_id',
                'hotels.is_admin as hotel_added_is_admin',
                'hotels.property_contact_name',
                'hotels.property_contact_num',
                'hotels.hotel_address',
                'hotels.neighb_area',
                'hotels.hotel_city',
                'hotels.stay_price as hotelroom_min_stay_price',
                'hotels.scout_id',

                'hotels.checkin_time',
                'hotels.checkout_time',
                'hotels.booking_option',
                'hotels.payment_mode',
                'hotels.online_payment_percentage',
                'hotels.at_desk_payment_percentage',
                'hotels.cancel_policy',
                'hotels.min_hrs',
                'hotels.max_hrs',
                'hotels.min_hrs_percentage',
                'hotels.max_hrs_percentage',

                'room_list.name as room_name',
                'room_list.price_per_night',
            )
            // ->orderby('created_at', 'DESC')
            ->where('booking.id', $booking_id)
            ->first();

        $checkin_timestamp=strtotime($data['bookingDetails']->check_in.' '.date("H:i:s", strtotime($data['bookingDetails']->checkin_time)));  
        $current_timestamp= strtotime(Carbon::now()->toDateTimeString());
        $data['remaining_hours'] = abs($checkin_timestamp - $current_timestamp)/(60*60);

        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    

        return view('front/booking/booking_details')->with($data);
    }

    public function booking_canceled_detail($id)
    {
        $booking_id = base64_decode($id);
        $data['bookingDetails'] = DB::table('booking')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'booking.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'users.address as user_address',
                'users.state_id as user_state',
                'users.user_city as user_city',
                'users.postal_code as user_postal_code',
                'country.nicename as user_country',
                'hotels.hotel_name',
                'hotels.hotel_user_id',
                'hotels.is_admin as hotel_added_is_admin',
                'hotels.property_contact_name',
                'hotels.property_contact_num',
                'hotels.hotel_address',
                'hotels.neighb_area',
                'hotels.hotel_city',
                'hotels.stay_price as hotelroom_min_stay_price',
                'hotels.scout_id',
                'room_list.name as room_name',
                'room_list.price_per_night'
            )
            // ->orderby('created_at', 'DESC')
            ->where('booking.id', $booking_id)
            ->first();
               
        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    

        return view('front/booking/booking_canceled_detail')->with($data);
    }

    // SPACE booking start here

    public function space_booking_list(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['bookingList'] = DB::table('space_booking')
            ->join('users', 'space_booking.user_id', '=', 'users.id')
            ->join('space', 'space_booking.space_id', '=', 'space.space_id')
            ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
            ->select('space_booking.*',
                    'users.user_type',
                    'users.first_name as user_first_name',
                    'users.last_name as user_last_name',
                    'users.email as user_email',
                    'users.contact_number as user_contact_num',
                    'users.role_id as user_role_id',
                    'users.is_verify_email as user_email_is_verify_email',
                    'users.is_verify_contact as user_contact_is_verify_contact',
                    'space.space_name',
                    'space.space_user_id as space_vendor_id',
                    'space.space_address',
                    'space.city',
                    'space_categories.category_name',
            )
            ->where('space_booking.user_id', $u_id)  
            // ->where('booking.booking_status', '!=' ,'canceled') 
            ->where('space_booking.check_out_date', '<', date('Y-m-d'))   
            ->orderby('space_booking.id', 'DESC')
            ->get();
            // ->paginate(10);

        // echo "<pre>";print_r($data['bookingList']);die;
        return view('front/booking/space_booking_list')->with($data);
    }

    public function space_booking_list_upcoming(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['upcomingBookingList'] = DB::table('space_booking')
                    ->join('users', 'space_booking.user_id', '=', 'users.id')
                    ->join('space', 'space_booking.space_id', '=', 'space.space_id')
                    ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
                    ->select('space_booking.*',
                            'users.user_type',
                            'users.first_name as user_first_name',
                            'users.last_name as user_last_name',
                            'users.email as user_email',
                            'users.contact_number as user_contact_num',
                            'users.role_id as user_role_id',
                            'users.is_verify_email as user_email_is_verify_email',
                            'users.is_verify_contact as user_contact_is_verify_contact',
                            'space.space_name',
                            'space.space_user_id as space_vendor_id',
                            'space.space_address',
                            'space.city',
                            'space_categories.category_name',
                    )
                    ->where('space_booking.user_id', $u_id)
                    ->where('space_booking.booking_status', '!=', 'canceled')  
                    // ->where('space_booking.check_out_date', '>=', date('Y-m-d'))   
                    ->orderby('space_booking.id', 'DESC')
                    ->get();
                    // ->paginate(10);
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('front/booking/space_booking_list_upcoming')->with($data);
    }

    public function space_booking_list_cancel(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['bookingList'] = DB::table('space_booking')
            ->join('users', 'space_booking.user_id', '=', 'users.id')
            ->join('space', 'space_booking.space_id', '=', 'space.space_id')
            ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
            ->select('space_booking.*',
                    'users.user_type',
                    'users.first_name as user_first_name',
                    'users.last_name as user_last_name',
                    'users.email as user_email',
                    'users.contact_number as user_contact_num',
                    'users.role_id as user_role_id',
                    'users.is_verify_email as user_email_is_verify_email',
                    'users.is_verify_contact as user_contact_is_verify_contact',
                    'space.space_name',
                    'space.space_user_id as space_vendor_id',
                    'space.space_address',
                    'space.city',
                    'space_categories.category_name',
            )
            ->where('space_booking.user_id', $u_id)   
            ->orderby('space_booking.id', 'DESC')
            ->get();
            // ->paginate(10);

        // echo "<pre>";print_r($data['bookingList']);die;
        return view('front/booking/space_booking_list_cancel')->with($data);
    }
    
    public function space_booking_detail($id)
    {
        $booking_id = base64_decode($id);
        $data['bookingDetails'] = DB::table('space_booking')
            ->join('users', 'space_booking.user_id', '=', 'users.id')
            ->join('space', 'space_booking.space_id', '=', 'space.space_id')
            ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'space_booking.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'users.address as user_address',
                'users.state_id as user_state',
                'users.user_city as user_city',
                'users.postal_code as user_postal_code',
                'space.space_name as space_name',
                'space.price_per_night',
                'space.space_user_id',
                'space.neighbor_area',
                'space.scout_id',
                'space.space_address as space_address',

                'space.checkin_hr',
                'space.checkout_hr',
                'space.booking_option',
                'space.payment_mode',
                'space.online_payment_percentage',
                'space.at_desk_payment_percentage',
                'space.cancel_policy',
                'space.min_hrs',
                'space.max_hrs',
                'space.min_hrs_percentage',
                'space.max_hrs_percentage',

                'space_categories.category_name',
                'country.nicename as user_country',


            )
            // ->orderby('created_at', 'DESC')
            ->where('space_booking.id', $booking_id)
            ->first();
        // echo "<pre>";print_r($data['bookingDetails']);die;
        $checkin_timestamp=strtotime($data['bookingDetails']->check_in_date.' '.date("H:i:s", strtotime($data['bookingDetails']->checkin_hr)));  
        $current_timestamp= strtotime(Carbon::now()->toDateTimeString());
        $data['remaining_hours'] = abs($checkin_timestamp - $current_timestamp)/(60*60);    
               
        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    
        
        return view('front/booking/space_booking_details')->with($data);
    }

    public function space_booking_canceled($id)
    {
        $booking_id = base64_decode($id);
        $data['bookingDetails'] = DB::table('space_booking')
            ->join('users', 'space_booking.user_id', '=', 'users.id')
            ->join('space', 'space_booking.space_id', '=', 'space.space_id')
            ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'space_booking.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'users.address as user_address',
                'users.state_id as user_state',
                'users.user_city as user_city',
                'users.postal_code as user_postal_code',
                'space.space_name as space_name',
                'space.price_per_night',
                'space.space_user_id',
                'space.neighbor_area',
                'space.scout_id',
                'space.space_address as space_address',
                'space_categories.category_name',
                'country.nicename as user_country',
                )
                // ->orderby('created_at', 'DESC')
                ->where('space_booking.id', $booking_id)
                ->first();

        // echo "<pre>";print_r($data['bookingDetails']);die;   
        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    

        return view('front/booking/space_booking_canceled_detail')->with($data);
    }

    // TOUR booking start here

    public function tour_booking_list(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['bookingList'] = DB::table('tour_booking')
                ->join('users', 'tour_booking.user_id', '=', 'users.id')
                ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                ->join('country', 'tour_list.country_id', '=', 'country.id')
                ->select(
                    'tour_booking.*',
                    'tour_list.tour_title',
                    'tour_list.vendor_id',
                    'tour_list.tour_code',
                    'tour_list.tour_type',
                    'tour_list.address',
                    'tour_list.city',
                    'tour_list.tour_start_date',
                    'tour_list.tour_end_date',
                    'country.nicename as tour_country',
                )
                ->where('tour_booking.user_id', $u_id)  
                ->where('tour_booking.booking_status', '!=' ,'canceled') 
                ->where('tour_list.tour_end_date', '<', date('Y-m-d'))
                ->orderby('tour_booking.id', 'DESC')
                ->get();
                // ->paginate(10);
        // echo "<pre>";print_r($data['bookingList']);die; 
        return view('front/booking/tour_booking_list')->with($data);
    }

    public function tour_booking_list_upcoming(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['upcomingBookingList'] = DB::table('tour_booking')
                ->join('users', 'tour_booking.user_id', '=', 'users.id')
                ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                ->join('country', 'tour_list.country_id', '=', 'country.id')
                ->select(
                    'tour_booking.*',
                    'tour_list.tour_title',
                    'tour_list.vendor_id',
                    'tour_list.tour_code',
                    'tour_list.tour_type',
                    'tour_list.address',
                    'tour_list.city',
                    'tour_list.tour_start_date',
                    'tour_list.tour_end_date',
                    'country.nicename as tour_country',
                )
                ->where('tour_booking.user_id', $u_id)
                ->where('tour_booking.booking_status', '!=', 'canceled')  
                // ->where('tour_list.tour_end_date', '>=', date('Y-m-d'))
                ->orderby('tour_booking.id', 'DESC')
                ->get();
                // ->paginate(10);
        // echo "<pre>";print_r($data['canceledList']);die;
        return view('front/booking/tour_booking_list_upcoming')->with($data);
    }

    public function tour_booking_list_cancel(Request $request)
    {
        $u_id = Auth::user()->id;
        $data['bookingList'] = DB::table('tour_booking')
                ->join('users', 'tour_booking.user_id', '=', 'users.id')
                ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                ->join('country', 'tour_list.country_id', '=', 'country.id')
                ->select(
                    'tour_booking.*',
                    'tour_list.tour_title',
                    'tour_list.vendor_id',
                    'tour_list.tour_code',
                    'tour_list.tour_type',
                    'tour_list.address',
                    'tour_list.city',
                    'tour_list.tour_start_date',
                    'tour_list.tour_end_date',
                    'country.nicename as tour_country',
                )
                ->where('tour_booking.user_id', $u_id)  
                ->orderby('tour_booking.id', 'DESC')
                ->get();
                // ->paginate(10);

        // echo "<pre>";print_r($data['bookingList']);die; 
        return view('front/booking/tour_booking_list_cancel')->with($data);
    }

    public function tour_booking_detail($id)
    {
        // echo "<pre>";print_r('Coming Soon');die;
        $booking_id = base64_decode($id);
        $data['bookingDetails'] = DB::table('tour_booking')
            ->join('users', 'tour_booking.user_id', '=', 'users.id')
            ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'tour_booking.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'users.address as user_address',
                'users.state_id as user_state',
                'users.user_city as user_city',
                'users.postal_code as user_postal_code',
                'country.nicename as user_country',
                'tour_list.address',
                'tour_list.neighb_area',
                'tour_list.city',
                'tour_list.scout_id',
                'tour_list.tour_title as tour_title',
                'tour_list.tour_price',
                'tour_list.tour_start_day',
                'tour_list.tour_start_date',
                'tour_list.tour_end_date',
                'tour_list.tour_code',
                'tour_list.tour_locations',
                
                'tour_list.booking_option', 
                'tour_list.payment_mode',
                'tour_list.online_payment_percentage',
                'tour_list.at_desk_payment_percentage',
                'tour_list.cancellation_and_refund',
                'tour_list.min_hrs',
                'tour_list.max_hrs',
                'tour_list.min_hrs_percentage',
                'tour_list.max_hrs_percentage',
            )
            // ->orderby('created_at', 'DESC')
            ->where('tour_booking.id', $booking_id)
            ->first();
          
        // echo "<pre>";print_r($data['bookingDetails']);
        // echo "<pre>";    
        // $created_at = $data['bookingDetails']->created_at;
        // echo "<pre>";print_r($created_at);
        // echo "<pre>";print_r(date("H:i:s",strtotime($created_at)));
        // $tour_start_date = $data['bookingDetails']->tour_start_date;
        // echo "<pre>";print_r($tour_start_date);

        // $timestamp2 = $tour_start_date." ".date("H:i:s",strtotime($created_at));
        // echo "<pre>";print_r($timestamp2);
        // $timestamp3 = strtotime($timestamp2);
        // echo "<pre>";print_r($timestamp3);

        // $date2 = Carbon::now()->toDateTimeString();
        // echo "<pre>";print_r(($date2));
        // $timestamp1 = strtotime($date2);
        // echo "<pre>";print_r(($timestamp1));
        // $hour = abs($timestamp3 - $timestamp1)/(60*60);
        // echo "<pre>";print_r(($hour));
        // die;   
        
        $checkin_timestamp=strtotime($data['bookingDetails']->tour_start_date.' '.date("H:i:s",strtotime($data['bookingDetails']->created_at)));  
        $current_timestamp= strtotime(Carbon::now()->toDateTimeString());
        $data['remaining_hours'] = abs($checkin_timestamp - $current_timestamp)/(60*60);

        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    
        // echo "<pre>";print_r($data['bookingDetails']);die;
        return view('front/booking/tour_booking_details')->with($data);
    }

    public function tour_booking_canceled($id)
    {
        // echo "<pre>";print_r('Coming Soon');die;
        $booking_id = base64_decode($id);
        $data['bookingDetails'] = DB::table('tour_booking')
            ->join('users', 'tour_booking.user_id', '=', 'users.id')
            ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'tour_booking.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'users.address as user_address',
                'users.state_id as user_state',
                'users.user_city as user_city',
                'users.postal_code as user_postal_code',
                'country.nicename as user_country',
                'tour_list.address',
                'tour_list.neighb_area',
                'tour_list.city',
                'tour_list.scout_id',
                'tour_list.tour_title as tour_title',
                'tour_list.tour_price',
                'tour_list.tour_start_day',
                'tour_list.tour_start_date',
                'tour_list.tour_end_date',
                'tour_list.tour_code',
                'tour_list.tour_locations'
                
            )
            // ->orderby('created_at', 'DESC')
            ->where('tour_booking.id', $booking_id)
            ->first();
        // echo "<pre>";print_r($data['bookingDetails']);die;
        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();       

        return view('front/booking/tour_booking_canceled_detail')->with($data);
    }

    public function request_booking_tour(Request $request)
    {
        // $u_id = Auth::user()->id;
        // $tour_id = $request->tour_id;
        // echo "<pre>";print_r($u_id);
        // echo "<pre>";print_r($tour_id);
        // echo "<pre>";print_r($request->all());die;
        $user_id = Auth::user()->id;
        $tour_id = $request->tour_id;
        $tour_price = $request->tour_price;
        $tour_start_date = $request->tour_start_date;
        $tour_end_date = $request->tour_end_date;

        $check = DB::table('tour_booking_request')->where('tour_id', '=', $tour_id)->where('user_id', '=', $user_id)->first();
        if($check){
            $deleteRequest = DB::table('tour_booking_request')->where('tour_id', '=', $tour_id)->where('user_id', '=', $user_id)->delete();
        }    

        $requestData = DB::table('tour_booking_request')->insert(
            array(
                'tour_id' =>  $tour_id,
                'user_id' =>  $user_id,
                'request_status' =>  1,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        if($requestData)
        {
            return response()->json(['status' => 'success', 'msg' => 'Booking Request sent. Please wait for owner"s Confirmation!']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        }


        // $email = $request->email;
        // $first_name = $request->first_name;
        // $last_name = $request->last_name;
        // $mobile = $request->mobile;
        // $document_type = $request->document_type;
        // $document_number = $request->document_number;
        // if ($request->hasFile('front_document_img')) {
        //     $image_name = $request->file('front_document_img')->getClientOriginalName();
        //     $filename = pathinfo($image_name, PATHINFO_FILENAME);
        //     $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
        //     $front_document_img = $filename . '-' . time() . '.' . $image_ext;
        //     $path = base_path() . '/public/uploads/user_document/';
        //     $request->file('front_document_img')->move($path, $front_document_img);
        // }
        // if ($request->hasFile('back_document_img')) {
        //     $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
        //     $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
        //     $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
        //     $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
        //     $pat2 = base_path() . '/public/uploads/user_document';
        //     $request->file('back_document_img')->move($pat2, $back_document_img);
        // }

        // if (empty($booking_id)) {
        //     return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        // } else {
        //     DB::table('booking')->where('id', $booking_id)->update([
        //         'booking_status' => 'canceled',
        //         'cancel_reason' => $request->cancel_reason,
        //         'cancel_details' => $request->cancel_details,
        //         'refund_amount' => $request->refund_amount,
        //         'canceled_at' => date('Y-m-d H:i:s')

        //     ]);
        //     return response()->json(['status' => 'success', 'msg' => 'Booking has been Canceled Sucessfully !']);
        // }  
    }

    public function cancel_request_booking_tour(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('tour_booking_request')->where('id', '=', $request_id)->first();
        if ($res) {
            DB::table('tour_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been canceled successfully!'));
        }else{
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }   

    public function cancel_hotel_booking(Request $request)
	{
        // echo "<pre>";print_r($request->all());die;
        $booking_id = $request->booking_id;
        $hotel_id = DB::table('booking')->where('id', $booking_id)->value('hotel_id');
        $get_hotel_cancel_policy = DB::table('hotels')->where('hotel_id', $hotel_id)->get(['payment_mode','online_payment_percentage','at_desk_payment_percentage','cancel_policy','min_hrs','max_hrs','min_hrs_percentage','max_hrs_percentage']);
        // if($get_hotel_cancel_policy[0]->payment_mode == 1){
        //     echo "Online Full Payment";
        // }else if($get_hotel_cancel_policy[0]->payment_mode == 2){
        //     echo "Partial Payment";
        // }else{
        //     echo "Offline Payment";
        // }
        // echo "<pre>";print_r($get_hotel_cancel_policy[0]->payment_mode);die;
        // if($get_hotel_cancel_policy[0]->payment_mode == 1){

        // }elseif($get_hotel_cancel_policy[0]->payment_mode == 2){

        // }else{

        // }
        // echo "<pre>";print_r($get_hotel_cancel_policy);die;
        if (empty($booking_id)) {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        } else {
            DB::table('booking')->where('id', $booking_id)->update([
                'booking_status' => 'canceled',
                'cancel_reason' => $request->cancel_reason,
                'cancel_details' => $request->cancel_details,
                'refund_amount' => $request->refund_amount,
                'canceled_at' => date('Y-m-d H:i:s')

            ]);
            return response()->json(['status' => 'success', 'msg' => 'Booking has been Canceled Sucessfully !']);
        }  
    }    

    public function cancel_space_booking(Request $request)
	{
        $booking_id = $request->booking_id;
        if (empty($booking_id)) {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        } else {
            DB::table('space_booking')->where('id', $booking_id)->update([
                'booking_status' => 'canceled',
                'cancel_reason' => $request->cancel_reason,
                'cancel_details' => $request->cancel_details,
                'refund_amount' => $request->refund_amount,
                'canceled_at' => date('Y-m-d H:i:s')
            ]);
            return response()->json(['status' => 'success', 'msg' => 'Booking has been Canceled Sucessfully !']);
        }  
        
    } 
    
    public function cancel_tour_booking(Request $request)
	{
        $booking_id = $request->booking_id;
        if (empty($booking_id)) {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        } else {
            $u_id = Auth::id();
            $get_tour_id = DB::table('tour_booking')->where('id', $booking_id)->value('tour_id');
            $get_avail_for_booking = DB::table('tour_booking_request')->where('tour_id', $get_tour_id)->where('user_id', $u_id)->delete(); 
            
            DB::table('tour_booking')->where('id', $booking_id)->update([
                'booking_status' => 'canceled',
                'cancel_reason' => $request->cancel_reason,
                'cancel_details' => $request->cancel_details,
                'refund_amount' => $request->refund_amount,
                'canceled_at' => date('Y-m-d H:i:s')
            ]);
            return response()->json(['status' => 'success', 'msg' => 'Booking has been Canceled Sucessfully !']);
        }  
    }  
    
    // booking invoices start from here
    
    public function booking_invoice($id)
	{
        $booking_id = base64_decode($id);
        $data['booking_data'] = DB::table('booking')->where('id', $booking_id)->first();
        $data['hotel_data'] = DB::table('hotels')->where('hotel_id', $data['booking_data']->hotel_id)->first();
        $data['room_data'] = DB::table('room_list')->where('id', $data['booking_data']->room_id)->first();
        $data['user_data'] = DB::table('users')->where('id', $data['booking_data']->user_id)->first();
        $data['room_type'] = DB::table('room_type_categories')->where('id', $data['room_data']->room_types_id)->value('title');
        // echo "<pre>";print_r($data['booking_data']);
        // echo "<pre>";print_r($data['hotel_data']);
        // echo "<pre>";print_r($data['room_data']);
        // echo "<pre>";print_r($data['user_data']);die;
        return view('front/booking/booking_invoice_template')->with($data);
    }

    public function tour_booking_invoice($id)
	{
        $booking_id = base64_decode($id);
        $data['booking_data'] = DB::table('tour_booking')->where('id', $booking_id)->first();
        $data['tour_data'] = DB::table('tour_list')->where('id', $data['booking_data']->tour_id)->first();
        
        // echo "<pre>";print_r($data['booking_data']);
        // echo "<pre>";print_r($data['tour_data']);die;
        return view('front/booking/booking_invoice_tour_template')->with($data);
    }

    public function space_booking_invoice($id)
	{
        $booking_id = base64_decode($id);
        $data['booking_data'] = DB::table('space_booking')->where('id', $booking_id)->first();
        $data['space_data'] = DB::table('space')->where('space_id', $data['booking_data']->space_id)->first();
        // $data['room_data'] = DB::table('room_list')->where('id', $data['booking_data']->room_id)->first();
        // $data['user_data'] = DB::table('users')->where('id', $data['booking_data']->user_id)->first();
        
        // echo "<pre>";print_r($data['booking_data']);
        // echo "<pre>";print_r($data['hotel_data']);
        // echo "<pre>";print_r($data['booking_data']);
        // echo "<pre>";print_r($data['space_data']);die;
        return view('front/booking/booking_invoice_space_template')->with($data);
    }
    
    public function event_booking_invoice($id)
	{
        $booking_id = base64_decode($id);
        $data['booking_data'] = DB::table('booking')->where('id', $booking_id)->first();
        $data['hotel_data'] = DB::table('hotels')->where('hotel_id', $data['booking_data']->hotel_id)->first();
        $data['room_data'] = DB::table('room_list')->where('id', $data['booking_data']->room_id)->first();
        $data['user_data'] = DB::table('users')->where('id', $data['booking_data']->user_id)->first();

        // echo "<pre>";print_r($data['booking_data']);
        // echo "<pre>";print_r($data['hotel_data']);
        // echo "<pre>";print_r($data['room_data']);
        // echo "<pre>";print_r($data['user_data']);die;
        return view('front/booking/booking_invoice_event_template')->with($data);
    }

    // public function booking_list(Request $request)
    // {
    //     $u_id = Auth::user()->id;
    //     $data['bookingList'] = DB::table('booking')
    //         ->join('users', 'booking.user_id', '=', 'users.id')
    //         ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //         ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //         ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
    //         ->join('country', 'hotels.hotel_country', '=', 'country.id')
    //         ->select(
    //             'booking.*',
    //             'hotels.hotel_name',
    //             'hotels.hotel_user_id',
    //             'hotels.is_admin as hotel_added_is_admin',
    //             'hotels.property_contact_name',
    //             'hotels.property_contact_num',
    //             'hotels.hotel_address',
    //             'hotels.hotel_city',
    //             'hotels.stay_price as hotelroom_min_stay_price',
    //             'hotels.checkin_time',
    //             'hotels.checkout_time',
    //             'country.nicename as hotel_country',
    //             'room_type_categories.title as room_type_name',
    //             'room_list.name as room_name'
    //         )
    //         ->where('booking.user_id', $u_id)   
    //         ->where('booking.booking_status', '!=' ,'canceled')   
    //         ->orderby('booking.id', 'DESC')
    //         ->get();
    //         // ->paginate(10);

    //     $data['upcomingBookingList'] = DB::table('booking')
    //         ->join('users', 'booking.user_id', '=', 'users.id')
    //         ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //         ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //         ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
    //         ->join('country', 'hotels.hotel_country', '=', 'country.id')
    //         ->select(
    //             'booking.*',
    //             'hotels.hotel_name',
    //             'hotels.hotel_user_id',
    //             'hotels.is_admin as hotel_added_is_admin',
    //             'hotels.property_contact_name',
    //             'hotels.property_contact_num',
    //             'hotels.hotel_address',
    //             'hotels.hotel_city',
    //             'hotels.stay_price as hotelroom_min_stay_price',
    //             'hotels.checkin_time',
    //             'hotels.checkout_time',
    //             'country.nicename as hotel_country',
    //             'room_type_categories.title as room_type_name',
    //             'room_list.name as room_name'
    //         )
    //         ->where('booking.user_id', $u_id)   
    //         ->orderby('booking.id', 'DESC')
    //         ->get();    
    //         // ->paginate(10);    
    //     // echo "<pre>";print_r($data['canceledList']);die;
    //     return view('front/booking/booking_list')->with($data);
    // }






        // public function booking_detail_with_date_check($id)
    // {
    //     // $date = date('Y-m-d H:i:s');
    //     // $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y');
    //     // $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y');
    //     // print_r(gettype($newDate));die;
    //     $currentDateTime = Carbon::now();
    //     // print_r(gettype($currentDateTime));
    //     $newDateTime = Carbon::now()->subHours(3);
             
    //     // print_r($currentDateTime);$data['date']->toDateTimeString()
    //     // print_r($currentDateTime->toDateTimeString());

        
    //     $booking_id = base64_decode($id);
    //     $data['bookingDetails'] = DB::table('booking')
    //         ->join('users', 'booking.user_id', '=', 'users.id')
    //         ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //         ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //         ->join('country', 'users.user_country', '=', 'country.id')
    //         ->select(
    //             'booking.*',
    //             'users.user_type',
    //             'users.first_name as user_first_name',
    //             'users.last_name as user_last_name',
    //             'users.email as user_email',
    //             'users.contact_number as user_contact_num',
    //             'users.role_id as user_role_id',
    //             'users.is_verify_email as user_email_is_verify_email',
    //             'users.is_verify_contact as user_contact_is_verify_contact',
    //             'users.address as user_address',
    //             'users.state_id as user_state',
    //             'users.user_city as user_city',
    //             'users.postal_code as user_postal_code',
    //             'country.nicename as user_country',
    //             'hotels.hotel_name',
    //             'hotels.hotel_user_id',
    //             'hotels.is_admin as hotel_added_is_admin',
    //             'hotels.property_contact_name',
    //             'hotels.property_contact_num',
    //             'hotels.hotel_address',
    //             'hotels.neighb_area',
    //             'hotels.hotel_city',
    //             'hotels.stay_price as hotelroom_min_stay_price',
    //             'hotels.scout_id',

    //             'hotels.booking_option',
    //             'hotels.payment_mode',
    //             'hotels.online_payment_percentage',
    //             'hotels.at_desk_payment_percentage',
    //             'hotels.min_hrs',
    //             'hotels.max_hrs',
    //             'hotels.min_hrs_percentage',
    //             'hotels.max_hrs_percentage',

    //             'room_list.name as room_name',
    //             'room_list.price_per_night',
    //         )
    //         // ->orderby('created_at', 'DESC')
    //         ->where('booking.id', $booking_id)
    //         ->first();
        
    //     // echo "<pre>";    
    //     // print_r(gettype($data['bookingDetails']->check_in));
    //     // print_r(date_format($data['bookingDetails']->check_in, 'd-m-Y H:i:s'));
    //     // print_r(date('d-m-Y H:i:s', strtotime($data['bookingDetails']->check_in)));
    //     // $checkin_date = date('d-m-Y H:i:s', strtotime($data['bookingDetails']->check_in));
    //     $date = new DateTime($data['bookingDetails']->check_in);
    //     // print_r($date);
    //     $now = new DateTime();
    //     // print_r($now);

    //     $cin = Carbon::createFromFormat('Y-m-d', $data['bookingDetails']->check_in)->format('Y-m-d H:s:i');
    //     // Carbon::createFromFormat('m/d/Y', $myDate)->format('Y-m-d');
    //     // print_r((gettype($cin)));echo "<pre>";
    //     $dnow=date_create($cin);
    //     // print_r((gettype($dnow)));echo "<pre>";
    //     // print_r((($dnow)));echo "<pre>";
    //     $now1 = Carbon::now()->toDateTimeString();
    //     // print_r(gettype($now1));echo "<pre>";

    //     $dafter=date_create($now1);
    //     // print_r((($dafter)));echo "<pre>";
    //     $difference=date_diff($dnow,$dafter);
    //     // print_r(($difference));
    //     // $diff_in_hours = $cin->diffInHours($now1);
               
    //     // dd($diff_in_hours);

    //     // $interval = date_diff($date,$now);

    //     // echo $interval->format('%h:%i:%s');

    //     $date1 = $cin;
    //     print_r(($date1));echo "<pre>";
    //     $date2 = Carbon::now()->toDateTimeString();
    //     print_r(($date2));echo "<pre>";
    //     $timestamp1 = strtotime($date1);
    //     print_r(($timestamp1));echo "<pre>";
    //     $timestamp2 = strtotime($date2);
    //     print_r(($timestamp2));echo "<pre>";
    //     $hour = abs($timestamp2 - $timestamp1)/(60*60);
    //     print_r(($hour));

    //     // print_r(gettype($checkin_date));
    //     // print_r($checkin_date->toDateTimeString());
    //     // print_r($checkin_date->subHours(3));
    //     // date_format($date,"Y/m/d H:i:s");
    //     die;   
    
    
        // get the difference between two dates successfully
        // $checkin_time = $data['bookingDetails']->checkin_time;
        // print_r(($checkin_time));echo "<pre>";
        // $time_in_24_hour_format  = date("H:i:s", strtotime($checkin_time));
        // print_r(($time_in_24_hour_format));echo "<pre>";
        // $checkindate = $data['bookingDetails']->check_in.' '.$time_in_24_hour_format;
        // print_r($checkindate);echo "<pre>";
        
        
        // echo "current timestamp"."\n";
        // // print_r($data['bookingDetails']->check_in);echo "<pre>";
        // $date2 = Carbon::now()->toDateTimeString();
        // print_r(($date2));echo "<pre>";
        // // die;
        // $timestamp1 = strtotime($checkindate);
        // print_r(($timestamp1));echo "<pre>";
        // $timestamp2 = strtotime($date2);
        // print_r(($timestamp2));echo "<pre>";
        // $hour = abs($timestamp2 - $timestamp1)/(60*60);
        // print_r(($hour));
        // die;    
            
    //     $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    

    //     return view('front/booking/booking_details')->with($data);
    // }







        // public function space_booking_list(Request $request)
    // {
    //     $u_id = Auth::user()->id;
    //     $data['bookingList'] = DB::table('space_booking')
    //         ->join('users', 'space_booking.user_id', '=', 'users.id')
    //         ->join('space', 'space_booking.space_id', '=', 'space.space_id')
    //         ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
    //         ->select('space_booking.*',
    //                 'users.user_type',
    //                 'users.first_name as user_first_name',
    //                 'users.last_name as user_last_name',
    //                 'users.email as user_email',
    //                 'users.contact_number as user_contact_num',
    //                 'users.role_id as user_role_id',
    //                 'users.is_verify_email as user_email_is_verify_email',
    //                 'users.is_verify_contact as user_contact_is_verify_contact',
    //                 'space.space_name',
    //                 'space.space_user_id as space_vendor_id',
    //                 'space.space_address',
    //                 'space.city',
    //                 'space_categories.category_name',
    //         )
    //         ->where('space_booking.user_id', $u_id)   
    //         ->orderby('space_booking.id', 'DESC')
    //         ->get();
    //         // ->paginate(10);

    //     $data['upcomingBookingList'] = DB::table('space_booking')
    //                 ->join('users', 'space_booking.user_id', '=', 'users.id')
    //                 ->join('space', 'space_booking.space_id', '=', 'space.space_id')
    //                 ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
    //                 ->select('space_booking.*',
    //                         'users.user_type',
    //                         'users.first_name as user_first_name',
    //                         'users.last_name as user_last_name',
    //                         'users.email as user_email',
    //                         'users.contact_number as user_contact_num',
    //                         'users.role_id as user_role_id',
    //                         'users.is_verify_email as user_email_is_verify_email',
    //                         'users.is_verify_contact as user_contact_is_verify_contact',
    //                         'space.space_name',
    //                         'space.space_user_id as space_vendor_id',
    //                         'space.space_address',
    //                         'space.city',
    //                         'space_categories.category_name',
    //                 )
    //                 ->where('space_booking.user_id', $u_id)   
    //                 ->orderby('space_booking.id', 'DESC')
    //                 ->get();
    //     //             // ->paginate(10);
    //     // echo "<pre>";print_r($data['bookingList']);die;
    //     return view('front/booking/space_booking_list')->with($data);
    // }
    
}
