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

class SpaceController extends Controller
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

    public function space()
    {
        $data['spaceList'] = DB::table('space')
                                ->join('space_categories', 'space.category_id', 'space_categories.scat_id')    
                                ->where('space.status', 1)
                                ->get();
        $data['categories'] = DB::table('space_categories')->where('status', 1)->get();
        $data['subcategories'] = DB::table('space_sub_categories')->where('status', 1)->get();     
        
        $data['space_country_wise'] = DB::table('space')
                                    ->select('space.*', 'countries.name as country_name')
                                    ->join('countries','space.space_country', '=','countries.id')
                                    ->orderby('countries.name', 'ASC')
                                    ->groupby('space.space_country')
                                    ->take(11)             
                                    ->get();

        $data['space_country'] = DB::table('space')
                                ->select('space.space_country as country_id',
                                        'countries.name as country_name')
                                ->selectRaw('count(*) as space_count_in_city, space_country')
                                ->join('countries','space.space_country', '=','countries.id') 
                                ->whereNotNull('space_name')
                                ->groupBy('space.space_country')
                                ->orderby('space_count_in_city', 'DESC') 
                                ->take(11) 
                                ->get();  
        
        // echo "<pre>";print_r($data['space_country']);die;
        return view('front/space/space')->with($data);
    } 

    public function space_details($id)
    {
        $space_id = base64_decode($id);
        $data['space_details'] = DB::table('space')->where('space_id', $space_id)->first();
        $data['country'] = DB::table('countries')->where('id', $data['space_details']->space_country)->first();
        $data['category'] = DB::table('space_categories')->where('scat_id', $data['space_details']->category_id)->first();
        $data['subcategory'] = DB::table('space_sub_categories')->where('sub_cat_id', $data['space_details']->sub_category_id)->first();
        if($data['space_details']->space_user_id == 1){
            $data['admin_user_details'] = DB::table('admins')->where('id', 1)->first();
        }else{
            $data['space_user_details'] = DB::table('users')->where('id', $data['space_details']->space_user_id)->first();
        }
        $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

        $data['space_features'] = DB::table('space_features')
                                    ->join('space_features_list', 'space_features.space_feature_id' , 'space_features_list.space_feature_id')
                                    ->where('space_id', $space_id)->get();
        return view('front/space/space_details')->with($data);
    }

    public function space_detail($id)
    {
        $space_id = base64_decode($id);
        $data['space_details'] = DB::table('space')->where('space_id', $space_id)->first();
        $data['country'] = DB::table('countries')->where('id', $data['space_details']->space_country)->first();
        $data['category'] = DB::table('space_categories')->where('scat_id', $data['space_details']->category_id)->first();
        $data['subcategory'] = DB::table('space_sub_categories')->where('sub_cat_id', $data['space_details']->sub_category_id)->first();
        if($data['space_details']->space_user_id == 1){
            $data['admin_user_details'] = DB::table('admins')->where('id', 1)->first();
        }else{
            $data['space_user_details'] = DB::table('users')->where('id', $data['space_details']->space_user_id)->first();
        }
        $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

        $data['space_features'] = DB::table('space_features')
                                    ->join('space_features_list', 'space_features.space_feature_id' , 'space_features_list.space_feature_id')
                                    ->where('space_id', $space_id)->get();

        // echo "<pre>";print_r($data['space_details']);
        // echo "<pre>";print_r($data['space_features']);
        // echo "<pre>";print_r($data['country']);
        // echo "<pre>";print_r($data['category']);
        // echo "<pre>";print_r($data['subcategory']);
        // echo "<pre>";print_r($data['space_user_details']);
        // die;
        return view('front/space_details')->with($data);
    }

    public function space_city_wise($id)
    {
        $country_id = base64_decode($id);
        $data['space_data'] = DB::table('space')->where('space_country',$country_id)->whereNotNull('space_name')->orderby('space_id','DESC')->get();
        $data['categories'] = DB::table('space_categories')->where('status', 1)->get();
        // $data['tour_details'] = DB::table('tour_list')->where('country_id',$id)->orderby('id','DESC')->first();
        // $data['tour_data_countries'] = DB::table('tour_list')
        //                                   ->select('tour_list.*','country.name as country_name')
        //                                   ->join('country', 'tour_list.country_id', '=', 'country.id')
        //                                   ->orderby('tour_list.tour_price','ASC')
        //                                   ->groupBy('tour_list.country_id')->get();
        $data['country_id'] = $country_id;
        // echo "<pre>";print_r($data['space_data']);die;
        return view('front/space/space_city_wise')->with($data);
    }

    public function space_category_list($id)
    {
        $space_category_id = base64_decode($id);
        $data['spaceList'] = DB::table('space')
                                ->join('space_categories', 'space.category_id', 'space_categories.scat_id')    
                                ->where('space.category_id', $space_category_id)
                                ->where('space.status', 1)
                                ->get();
        $data['space_cat_name'] = DB::table('space_categories')->where('scat_id', $space_category_id)->value('category_name');  

        // echo "<pre>";print_r($data['space_cat_name']);die;
        return view('front/space/space_category_list')->with($data);
    }

    public function checkout(Request $request)
    {
        //print_r($request->all());
        if (isset($_GET['space_id'])) {
            $space_id = $_GET['space_id'];
            // $check_in = date('2022-07-27');
            // $check_out = date('2022-07-30');
            $check_in = $_GET['check_in'];
            $check_out = $_GET['check_out'];
            $data['space_data'] = DB::table('space')
                ->join('countries', 'space.space_country', '=', 'countries.id')
                ->where(['space.space_id' => $space_id, 'space.status' => 1])
                ->first();

            $data['space_features'] = DB::table('space_features')
                ->join('space_features_list', 'space_features.space_feature_id', '=', 'space_features_list.space_feature_id')
                ->where('space_features.space_id', '=', $space_id)
                // ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                ->limit(5)
                ->get();

            $data['space_category'] = DB::table('space_categories')
            ->where(['space_categories.scat_id' => $data['space_data']->category_id, 'space_categories.status' => 1])
            ->first();    

            $new_check_in = date('Y-m-d', strtotime($check_in));
            $new_check_out = date('Y-m-d', strtotime($check_out));

            $date1_ts = strtotime($new_check_in);
            $date2_ts = strtotime($new_check_out);
            $diff = $date2_ts - $date1_ts;
            $booking_days =  round($diff / 86400);

            $timestamp = strtotime('2009-10-22');
            $start_day = date('l', $date1_ts);
            $end_day = date('l', $date2_ts);
            $data['check_in'] = $check_in;
            $data['check_out'] = $check_out;
            $data['booking_days'] = $booking_days;
            $data['start_day'] = $start_day;
            $data['end_day'] = $end_day;

            // echo "<pre>";print_r($data);die;
            return view('front/space/checkout_space')->with($data);
            // return view('front/space/checkout_space');
        } else {
            return redirect()->route('home');
        }
    }

    public function space_payment_successful()
    {
        return view('front/space/space_payment_successful');
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
    //         ->orderby('booking.id', 'DESC')
    //         ->get();
    //     // echo "<pre>";print_r($data['canceledList']);die;
    //     return view('front/booking/booking_list')->with($data);
    // }

    // public function booking_details(Request $request)
    // {
    //     return view('front/booking/booking_details');
    // } 

    // public function booking_detail($id)
    // {
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
    //             'room_list.name as room_name',
    //             'room_list.price_per_night'
    //         )
    //         // ->orderby('created_at', 'DESC')
    //         ->where('booking.id', $booking_id)
    //         ->first();
               
    //     $data['scoutDetails'] = DB::table('users')->where('id', $data['bookingDetails']->scout_id)->first();    

    //     return view('front/booking/booking_details')->with($data);
    // }

}
