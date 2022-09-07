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

    // HOTEL booking start here 

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
            // ->get();
            ->paginate(10);

        // echo "<pre>";print_r($data['canceledList']);die;
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
            ->orderby('booking.id', 'DESC')
            // ->get();    
            ->paginate(10);    
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
        // ->get();
        ->paginate(10);    
 
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

    // SPACE booking start here

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
            ->where('space_booking.check_out_date', '<', date('Y-m-d'))   
            ->orderby('space_booking.id', 'DESC')
            // ->get();
            ->paginate(10);

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
                    ->orderby('space_booking.id', 'DESC')
                    // ->get();
                    ->paginate(10);
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
            // ->get();
            ->paginate(10);

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
                'space_categories.category_name',
                'country.nicename as user_country',
            )
            // ->orderby('created_at', 'DESC')
            ->where('space_booking.id', $booking_id)
            ->first();
               
        $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    
        // echo "<pre>";print_r($data['bookingDetails']);die;
        return view('front/booking/space_booking_details')->with($data);
    }

    public function space_booking_canceled($id)
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
                ->where('tour_list.tour_end_date', '>', date('Y-m-d'))
                ->orderby('tour_booking.id', 'DESC')
                // ->get();
                ->paginate(10);
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
                ->orderby('tour_booking.id', 'DESC')
                // ->get();
                ->paginate(10);
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
                // ->get();
                ->paginate(10);

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
                'tour_list.tour_locations'
                
            )
            // ->orderby('created_at', 'DESC')
            ->where('tour_booking.id', $booking_id)
            ->first();
               
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

    public function cancel_hotel_booking(Request $request)
	{
        // echo "<pre>";print_r($request->all());die;
        $booking_id = $request->booking_id;
        if (empty($booking_id)) {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        } else {
            DB::table('booking')->where('id', $booking_id)->update([
                'booking_status' => 'canceled',
                'cancel_reason' => $request->cancel_reason,
                'cancel_details' => $request->cancel_details
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
                'cancel_details' => $request->cancel_details
            ]);
            return response()->json(['status' => 'success', 'msg' => 'Booking has been Canceled Sucessfully !']);
        }  

        // if (empty($room_id)) {
        //     return json_encode(array('status' => 'error', 'msg' => 'Please Select Room to Copy.'));
		// } else {
        //     if ($getid) {
        //         return json_encode(array('status' => 'success', 'msg' => 'Room Copied Sucessfully !', 'new_room_id' => base64_encode($getid)));
        //     } else {
        //         return json_encode(array('status' => 'error', 'msg' => 'Something get wrong.'));
        //     }
        // }
        
    } 
    
    public function cancel_tour_booking(Request $request)
	{
        $booking_id = $request->booking_id;
        if (empty($booking_id)) {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        } else {
            DB::table('tour_booking')->where('id', $booking_id)->update([
                'booking_status' => 'canceled',
                'cancel_reason' => $request->cancel_reason,
                'cancel_details' => $request->cancel_details
            ]);
            return response()->json(['status' => 'success', 'msg' => 'Booking has been Canceled Sucessfully !']);
        }  
    }    

}
