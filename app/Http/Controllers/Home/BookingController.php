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
            ->orderby('booking.id', 'DESC')
            ->paginate(10);

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
            ->orderby('booking.id', 'DESC')
            ->paginate(10);    
        // echo "<pre>";print_r($data['canceledList']);die;
        return view('front/booking/booking_list')->with($data);
    }

    public function booking_details(Request $request)
    {
        return view('front/booking/booking_details');
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
                'room_list.name as room_name',
                'room_list.price_per_night'
            )
            // ->orderby('created_at', 'DESC')
            ->where('booking.id', $booking_id)
            ->first();
               
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
}
