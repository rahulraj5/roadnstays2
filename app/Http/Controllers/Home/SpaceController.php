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
use Illuminate\Pagination\Paginator;
use LDAP\Result;

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
            ->join('countries', 'space.space_country', '=', 'countries.id')
            ->orderby('countries.name', 'ASC')
            ->groupby('space.space_country')
            ->take(11)
            ->get();

        $data['space_country'] = DB::table('space')
            ->select(
                'space.space_country as country_id',
                'countries.name as country_name'
            )
            ->selectRaw('count(*) as space_count_in_city, space_country')
            ->join('countries', 'space.space_country', '=', 'countries.id')
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
        if ($data['space_details']->space_user_id == 1) {
            $data['admin_user_details'] = DB::table('admins')->where('id', 1)->first();
        } else {
            $data['space_user_details'] = DB::table('users')->where('id', $data['space_details']->space_user_id)->first();
        }
        $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

        $data['space_features'] = DB::table('space_features')
            ->join('space_features_list', 'space_features.space_feature_id', 'space_features_list.space_feature_id')
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
        if ($data['space_details']->space_user_id == 1) {
            $data['admin_user_details'] = DB::table('admins')->where('id', 1)->first();
        } else {
            $data['space_user_details'] = DB::table('users')->where('id', $data['space_details']->space_user_id)->first();
        }
        $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

        $data['space_features'] = DB::table('space_features')
            ->join('space_features_list', 'space_features.space_feature_id', 'space_features_list.space_feature_id')
            ->where('space_id', $space_id)->get();
        // echo "<pre>";print_r($data['space_user_details']);
        // die;
        return view('front/space_details')->with($data);
    }

    public function space_city_wise($id)
    {
        $country_id = base64_decode($id);
        $data['space_data'] = DB::table('space')->where('space_country', $country_id)->whereNotNull('space_name')->orderby('space_id', 'DESC')->paginate(12);
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
            ->paginate(5);
        $data['space_cat_name'] = DB::table('space_categories')->where('scat_id', $space_category_id)->value('category_name');
        $spaces = DB::table('space')
            ->join('space_categories', 'space.category_id', 'space_categories.scat_id')
            ->where('space.category_id', $space_category_id)
            ->where('space.status', 1)
            ->paginate(5);
        $data['spaces'] = $spaces;
        // echo "<pre>";print_r($data['space_cat_name']);die;
        return view('front/space/space_category_list')->with($data);
    }

    // working search list of space 
    public function space_search_list(Request $request)
    {
        if (count($request->all()) >= 1) {

            if (isset($request->space_latitude)) {
                $space_latitude = $request->space_latitude;
            } else {

                $space_latitude = Session::get('space_latitude');
            }

            if (isset($request->space_longitude)) {
                $space_longitude = $request->space_longitude;
            } else {

                $space_longitude = Session::get('space_longitude');
            }

            if (isset($request->space_location)) {
                $space_location = $request->space_location;
            } else {

                $space_location = Session::get('space_location');
            }

            if (isset($request->space_name)) {
                $space_name = $request->space_name;
            } else {
                $space_name = Session::get('space_name');
            }

            if (isset($request->space_checkin_date)) {
                $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
            } else {
                $checkin_date = Session::get('space_check_in_date');
            }

            if (isset($request->space_checkout_date)) {
                $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));
            } else {
                $checkout_date = Session::get('space_check_out_date');
            }

            $space_city = explode(',', $space_location);
            // dd($space_city);

            Session::put('space_latitude', $space_latitude);
            Session::put('space_longitude', $space_longitude);
            Session::put('space_location', $space_location);
            Session::put('space_name', $space_name);
            // Session::put('person', $person);
            Session::put('space_check_in_date', $checkin_date);
            Session::put('space_check_out_date', $checkout_date);

            $date1_ts = strtotime($checkin_date);
            $date2_ts = strtotime($checkout_date);
            $diff = $date2_ts - $date1_ts;
            $booking_days =  round($diff / 86400);

            $distance = 30;
            $results = DB::select(DB::raw('SELECT space_id, ( 3959 * acos( cos( radians(' . $space_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $space_longitude . ') ) + sin( radians(' . $space_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));
            // echo Session::get('space_location');echo "<pre>";print_r($results);
            
            $not_booked_id = array();

            foreach ($results as $key => $value) {
                // $booked_space_id = DB::table('space_booking')
                //                 ->where("space_id", $value->space_id)
                //                 ->where(function ($query) use ($checkin_date, $checkout_date) {
                //                     $query->where(function ($q) use ($checkin_date, $checkout_date) {
                //                         $q->where('check_in_date', '>=', $checkin_date)
                //                         ->where('check_in_date', '<', $checkout_date);
                //                     })->orWhere(function ($q) use ($checkin_date, $checkout_date) {
                //                         $q->where('check_in_date', '<=', $checkin_date)
                //                         ->where('check_out_date', '>', $checkout_date);
                //                     })->orWhere(function ($q) use ($checkin_date, $checkout_date) {
                //                         $q->where('check_out_date', '>', $checkin_date)
                //                         ->where('check_out_date', '<=', $checkout_date);
                //                     })->orWhere(function ($q) use ($checkin_date, $checkout_date) {
                //                         $q->where('check_in_date', '>=', $checkin_date)
                //                         ->where('check_out_date', '<=', $checkout_date);
                //                     });
                //                 // })->pluck('space_id')->unique();
                //                 })->get();

                $booked_space_id = DB::table('space_booking')
                                ->where("space_id", $value->space_id)
                                ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
                                ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
                                // ->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
                                ->get();                  

                // echo "<pre>";print_r($booked_space_id);

                $space_booked_id = array();                

                foreach ($booked_space_id as $space_book)
                {
                    $space_booked_id[] = $space_book->space_id;
                }

                $space_avail_id = DB::table('space')->where('space_id', $value->space_id)->whereNotIn("space_id", $space_booked_id)->get();
                // echo "<pre>";print_r($space_avail_id);
                foreach ($space_avail_id as $space_get_book_id)
                {
                    $not_booked_id[] = $space_get_book_id->space_id;
                }

            }
            $space_available = DB::table('space')->whereIn("space_id", $not_booked_id)->groupBy('space_id')->where("status", 1)->paginate(10);

            $data['spaceList'] = $space_available;
            $data['space_check_in_date'] = $checkin_date;
            $data['space_check_out_date'] = $checkout_date;
            $data['booking_days'] = $booking_days;
            $data['space_city'] = $space_city[0];
            $data['space_latitude'] = $space_latitude;
            $data['space_longitude'] = $space_longitude;

            // echo "<pre>";print_r($data['spaceList']);die;
            return view('front.space.space_search_list')->with($data);
        } else {
            return redirect('/');
        }
    }

    // public function space_search_list(Request $request)
    // {
    //     if (count($request->all()) >= 1) {

    //         if (isset($request->space_latitude)) {
    //             $space_latitude = $request->space_latitude;
    //         } else {

    //             $space_latitude = Session::get('space_latitude');
    //         }

    //         if (isset($request->space_longitude)) {
    //             $space_longitude = $request->space_longitude;
    //         } else {

    //             $space_longitude = Session::get('space_longitude');
    //         }

    //         if (isset($request->space_location)) {
    //             $space_location = $request->space_location;
    //         } else {

    //             $space_location = Session::get('space_location');
    //         }

    //         if (isset($request->space_name)) {
    //             $space_name = $request->space_name;
    //         } else {
    //             $space_name = Session::get('space_name');
    //         }

    //         if (isset($request->space_checkin_date)) {
    //             $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
    //         } else {
    //             $checkin_date = Session::get('space_check_in_date');
    //         }

    //         if (isset($request->space_checkout_date)) {
    //             $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));
    //         } else {
    //             $checkout_date = Session::get('space_check_out_date');
    //         }

    //         $space_city = explode(',', $space_location);
    //         // dd($space_city);

    //         Session::put('space_latitude', $space_latitude);
    //         Session::put('space_longitude', $space_longitude);
    //         Session::put('space_location', $space_location);
    //         Session::put('space_name', $space_name);
    //         // Session::put('person', $person);
    //         Session::put('space_check_in_date', $checkin_date);
    //         Session::put('space_check_out_date', $checkout_date);

    //         $date1_ts = strtotime($checkin_date);
    //         $date2_ts = strtotime($checkout_date);
    //         $diff = $date2_ts - $date1_ts;
    //         $booking_days =  round($diff / 86400);

    //         $distance = 30;
    //         $results = DB::select(DB::raw('SELECT space_id, ( 3959 * acos( cos( radians(' . $space_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $space_longitude . ') ) + sin( radians(' . $space_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));
    //         // echo Session::get('space_location');echo "<pre>";print_r($results);
            
    //         $not_booked_id = array();

    //         foreach ($results as $key => $value) {
    //             // $booked_space_id = DB::table('space_booking')
    //             //                 ->where("space_id", $value->space_id)
    //             //                 ->where(function ($query) use ($checkin_date, $checkout_date) {
    //             //                     $query->where(function ($q) use ($checkin_date, $checkout_date) {
    //             //                         $q->where('check_in_date', '>=', $checkin_date)
    //             //                         ->where('check_in_date', '<', $checkout_date);
    //             //                     })->orWhere(function ($q) use ($checkin_date, $checkout_date) {
    //             //                         $q->where('check_in_date', '<=', $checkin_date)
    //             //                         ->where('check_out_date', '>', $checkout_date);
    //             //                     })->orWhere(function ($q) use ($checkin_date, $checkout_date) {
    //             //                         $q->where('check_out_date', '>', $checkin_date)
    //             //                         ->where('check_out_date', '<=', $checkout_date);
    //             //                     })->orWhere(function ($q) use ($checkin_date, $checkout_date) {
    //             //                         $q->where('check_in_date', '>=', $checkin_date)
    //             //                         ->where('check_out_date', '<=', $checkout_date);
    //             //                     });
    //             //                 // })->pluck('space_id')->unique();
    //             //                 })->get();
    //             $booked_space_id = DB::table('space_booking')
    //                 ->where("space_id", $value->space_id)
    //                 ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
    //                 ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
    //                 // ->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
    //                 ->get();                

    //             // echo "<pre>";print_r($booked_space_id);

    //             $space_booked_id = array();                

    //             foreach ($booked_space_id as $space_book)
    //             {
    //                 // $space_avail_id = DB::table('space')->whereNotIn("space_id", $space_book->space_id)->
    //                 // // pluck('space_id');
    //                 // get();
    //                 $space_booked_id[] = $space_book->space_id;
    //             }

    //             // $booked_space_id = DB::table('space_booking')
    //             //     ->where("space_id", $value->space_id)
    //             //     // ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
    //             //     // ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
    //             //     ->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
    //             //     // ->where(function ($query) {
    //             //     //     $query->where('email', 'jdoe@example.com');
    //             //     // })
    //             //     // ->where(function($query, $value) {
    //             //     //     DB::table('space')
    //             //     //     ->where('space_id', $value->space_id)
    //             //     //     ->select('space_id');
    //             //     // })
    //             //     // ->pluck('space_id')->unique();
    //             //     ->get();
    //             // echo "<pre>";print_r($space_booked_id);
    //             // $booked_id = array();
    //             // $space_avail_id = DB::table('space')->whereNotIn("space_id", $booked_space_id)->pluck('space_id');
    //             $space_avail_id = DB::table('space')->where('space_id', $value->space_id)->whereNotIn("space_id", $space_booked_id)->get();
    //             // echo "<pre>";print_r($space_avail_id);
    //             foreach ($space_avail_id as $space_get_book_id)
    //             {
    //                 // $space_get_id = DB::table('space')->where("space_id", $space_get_book_id->space_id)->get();
    //                 $not_booked_id[] = $space_get_book_id->space_id;
    //             }
    //             // echo "<pre>";print_r($booked_id);
    //             // $space_data = DB::table('space')->whereIn("space_id", $space_avail_id)->where("status", 1)->paginate(10);
    //             // $booked_id[] = $booked_space_id->space_id;

    //         }
    //         // echo "<pre>";print_r($not_booked_id);
    //         // die;
    //         // echo "<pre>";print_r($booked_space_id);
    //         // $space_avail_id = DB::table('space')->whereNotIn("space_id", $booked_space_id)->pluck('space_id');
    //         // echo "<pre>";print_r($space_avail_id);die;
    //         $space_available = DB::table('space')->whereIn("space_id", $not_booked_id)->groupBy('space_id')->where("status", 1)->paginate(10);
    //         // $space_data = DB::table('space')->whereIn("space_id", $space_avail_id)->Where('city', 'like', '%' . $space_city[0] . '%')->where("status", 1)->paginate(10);
    //         // echo "<pre>";print_r($space_available);die;

    //         $data['spaceList'] = $space_available;
    //         $data['check_in'] = $checkin_date;
    //         $data['check_out'] = $checkout_date;
    //         $data['booking_days'] = $booking_days;
    //         $data['space_city'] = $space_city[0];
    //         $data['space_latitude'] = $space_latitude;
    //         $data['space_longitude'] = $space_longitude;

    //         // echo "<pre>";print_r($data);die;
    //         return view('front.space.space_search_list')->with($data);
    //     } else {
    //         return redirect('/');
    //     }
    // }

    // public function space_search_list(Request $request)
    // {
    //     if (count($request->all()) >= 1) {

    //         if (isset($request->space_latitude)) {
    //             $space_latitude = $request->space_latitude;
    //         } else {

    //             $space_latitude = Session::get('space_latitude');
    //         }

    //         if (isset($request->space_longitude)) {
    //             $space_longitude = $request->space_longitude;
    //         } else {

    //             $space_longitude = Session::get('space_longitude');
    //         }

    //         if (isset($request->space_location)) {
    //             $space_location = $request->space_location;
    //         } else {

    //             $space_location = Session::get('space_location');
    //         }

    //         if (isset($request->space_name)) {
    //             $space_name = $request->space_name;
    //         } else {
    //             $space_name = Session::get('space_name');
    //         }

    //         if (isset($request->space_checkin_date)) {
    //             $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
    //         } else {
    //             $checkin_date = Session::get('space_check_in_date');
    //         }

    //         if (isset($request->space_checkout_date)) {
    //             $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));
    //         } else {
    //             $checkout_date = Session::get('space_check_out_date');
    //         }

    //         $space_city = explode(',', $space_location);
    //         // dd($space_city);

    //         Session::put('space_latitude', $space_latitude);
    //         Session::put('space_longitude', $space_longitude);
    //         Session::put('space_location', $space_location);
    //         Session::put('space_name', $space_name);
    //         // Session::put('person', $person);
    //         Session::put('checkin_date', $checkin_date);
    //         Session::put('checkout_date', $checkout_date);

    //         $date1_ts = strtotime($checkin_date);
    //         $date2_ts = strtotime($checkout_date);
    //         $diff = $date2_ts - $date1_ts;
    //         $booking_days =  round($diff / 86400);

    //         $distance = 30;
    //         $results = DB::select(DB::raw('SELECT space_id, ( 3959 * acos( cos( radians(' . $space_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $space_longitude . ') ) + sin( radians(' . $space_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));
    //         // echo Session::get('space_location');echo "<pre>";print_r($results);
            
    //         // $booked_id = array();

    //         foreach ($results as $key => $value) {
    //             $booked_space_id = DB::table('space_booking')
    //                 ->where("space_id", $value->space_id)
    //                 ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
    //                 ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
    //                 //->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
    //                 // ->where(function ($query) {
    //                 //     $query->where('email', 'jdoe@example.com');
    //                 // })
    //                 // ->where(function($query, $value) {
    //                 //     DB::table('space')
    //                 //     ->where('space_id', $value->space_id)
    //                 //     ->select('space_id');
    //                 // })
    //                 ->pluck('space_id')->unique();
    //                 // ->get();
    //             // echo "<pre>";print_r($booked_space_id);
    //             // $booked_id = array();
    //             // $space_avail_id = DB::table('space')->whereNotIn("space_id", $booked_space_id)->pluck('space_id');
    //             // foreach ($booked_space_id as $space)
    //             // {
    //             //     $booked_id[] = $space->space_id;
    //             // }
    //             // echo "<pre>";print_r($booked_id);
    //             // $space_data = DB::table('space')->whereIn("space_id", $space_avail_id)->where("status", 1)->paginate(10);
    //             // $booked_id[] = $booked_space_id->space_id;

    //         }
    //         // die;
    //         // echo "<pre>";print_r($booked_space_id);
    //         $space_avail_id = DB::table('space')->whereNotIn("space_id", $booked_space_id)->pluck('space_id');
    //         // echo "<pre>";print_r($space_avail_id);die;
    //         $space_data = DB::table('space')->whereIn("space_id", $space_avail_id)->where("status", 1)->paginate(10);
    //         // $space_data = DB::table('space')->whereIn("space_id", $space_avail_id)->Where('city', 'like', '%' . $space_city[0] . '%')->where("status", 1)->paginate(10);
    //         // echo "<pre>";print_r($space_data);die;

    //         $data['spaceList'] = $space_data;
    //         $data['check_in'] = $checkin_date;
    //         $data['check_out'] = $checkout_date;
    //         $data['booking_days'] = $booking_days;
    //         $data['space_city'] = $space_city[0];
    //         $data['space_latitude'] = $space_latitude;
    //         $data['space_longitude'] = $space_longitude;

    //         // echo "<pre>";print_r($data);die;
    //         return view('front.space.space_search_list')->with($data);
    //     } else {
    //         return redirect('/');
    //     }
    // }

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


    public function spaceBookingOrder(Request $request)
    {
        // echo "<pre>"; print_r($request->all());die;
        $space_id = $request->space_id;
        $user_id = $request->user_id;
        $space_price = $request->space_price;
        $space_start_date = $request->check_in;
        $space_end_date = $request->check_out;
        $total_days = $request->total_days;
        $total_member = $request->total_member;
        $total_room = $request->total_room;

        $email = $request->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $mobile = $request->mobile;
        $status = 1;

        $client = "AcwBj1jBaPuIaGvVF4WCqtT8PMe8XVlNLriyqP2JVlFViJQpJbmF-CMsTnqI9TOA0Z6kWeD3uG5R0xvO";
        $secret = "EPZ31KCn1aSfHzEkjdV6fI_A31vdzcbhVhV-fkc0GFKvc_WVJZPoKOCAw8TNmhKQVAF4pW46iaDpmznd";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $client . ":" . $secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $result = curl_exec($ch);
        if (empty($result)) die("Error: No response.");
        else {
            $json = json_decode($result);

            $paccess_token = $json->access_token;
        }

        $data = '{
            "intent":"sale",
            "redirect_urls":{
            "return_url":"' . url('/space-payment-successful') . '",
            "cancel_url":"' . url('/payment-cancelled') . '"
            },
            "payer":{
            "payment_method":"paypal"
            },
            "transactions":[
            {
                "amount":{
                "total":' . round($space_price) . ',
                "currency":"USD"
                },
                "description":"This is the payment transaction description."
            }
            ]
        }';

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "Content-Type: application/json",
                "Authorization: Bearer " . $json->access_token,
                "Content-length: " . strlen($data)
            )
        );

        $result = curl_exec($ch);
        $json = json_decode($result);
        $link = $json->links[1]->href;
        $tokenlink = $json->links[1]->href;
        $link_array = explode('&token=', $tokenlink);
        $token = end($link_array);

        $state = $json->state;

        $payment_id = $json->id;

        $guestinfo = DB::table('guestinfo')->insert(
            array(
                'space_id' =>  $space_id,
                'email' =>  $email,
                'first_name' =>  $first_name,
                'last_name' => $last_name,
                'mobile' =>  $mobile,
                'status' =>  $status,
                'created_date' =>  date('Y-m-d H:i:s')
            )
        );

        $check = DB::table('space_booking_temp')->insert(
            array(
                'user_id' =>  $user_id,
                'payment_id' =>  $payment_id,
                'paccess_token' =>  $paccess_token,
                'token_id' => $token,
                'space_id' =>  $space_id,
                'space_start_date' =>  $space_start_date,
                'space_end_date' =>  $space_end_date,
                'total_days' =>  $total_days,
                'total_member' =>  $total_member,
                'total_room' =>  $total_room,
                'total_amount' => round($space_price),
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );

        return redirect($link);
    }

    public function space_payment_successful(Request $request)
    {
        if (Auth::check()) {
            $user_id =  Auth::id();
        } else {
            $user_id = '';
        }
        $paymentId = $_GET['paymentId'];
        $token = $_GET['token'];
        $PayerID = $_GET['PayerID'];
        $paccess_token = '';
        $bookingtemp = DB::table('space_booking_temp')->where('payment_id', '=', $paymentId)->first();
        $spaceData = DB::table('space')->where('space_id', $bookingtemp->space_id)->where('status', 1)->first();
        // echo "<pre>";print_r($spaceData);die;
        $vendor_id = $spaceData->space_user_id;

        if (!empty($bookingtemp)) {
            $paccess_token = $bookingtemp->paccess_token;
            $data1 = '{
               "payer_id": "' . $PayerID . '"
               }';

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment/" . $paymentId . "/execute");
            /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/payments/payment”);*/
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $paccess_token));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);

            $resulspays = json_decode($result);
            // echo "<pre>";print_r($resulspays);die;   

            $cartid = $resulspays->cart;
            $pstatus = $resulspays->state;
            $paymethod = $resulspays->payer->payment_method;

            $pemail = $resulspays->payer->payer_info->email;
            $pfirst_name = $resulspays->payer->payer_info->first_name;
            $plast_name = $resulspays->payer->payer_info->last_name;
            $payer_id = $resulspays->payer->payer_info->payer_id;

            $srecipient_name = $resulspays->payer->payer_info->shipping_address->recipient_name;
            $sadd_line1 = $resulspays->payer->payer_info->shipping_address->line1;
            $sadd_line2 = !empty($resulspays->payer->payer_info->shipping_address->line2) ?  $resulspays->payer->payer_info->shipping_address->line2 : '';
            $scity = $resulspays->payer->payer_info->shipping_address->city;
            $sstate = $resulspays->payer->payer_info->shipping_address->state;
            $spostal_code = $resulspays->payer->payer_info->shipping_address->postal_code;
            $scountry_code = $resulspays->payer->payer_info->shipping_address->country_code;

            $phone = !empty($resulspays->payer->payer_info->phone) ?  $resulspays->payer->payer_info->phone : '';
            $country_code = $resulspays->payer->payer_info->country_code;
            $business_name = !empty($resulspays->payer->payer_info->business_name) ?  $resulspays->payer->payer_info->business_name : '';

            $total_amount = $resulspays->transactions[0]->amount->total;
            $currency = $resulspays->transactions[0]->amount->currency;

            $merchant_id = $resulspays->transactions[0]->payee->merchant_id;
            $merchant_email = $resulspays->transactions[0]->payee->email;
            $password = "Admin@123";
            $password = md5($password);
            curl_close($ch);
            if (empty($user_id)) {

                $checkuser = DB::table('users')->where('email', $pemail)->first();

                if (!empty($checkuser)) {

                    $user_id = $checkuser->id;
                } else {

                    DB::table('users')->insert(
                        [
                            'first_name' =>  $pfirst_name,
                            'last_name' =>  $plast_name,
                            'email' =>  $pemail,
                            'user_type' => 'normal_user',
                            'contact_number' =>  $phone,
                            'password' =>  $password,
                            'role_id' =>  2,
                            'is_verify_email' => 1,
                            'register_by' =>  'paypal',
                            'status' => 1,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'created_at' =>  date('Y-m-d H:i:s')
                        ]
                    );

                    $user_id = DB::getpdo()->lastInsertId();
                }
            }
        }
        $checkorder = DB::table('space_booking')->where('payment_token', '=', $token)->first();

        if (empty($checkorder)) {

            DB::table('space_booking')->insert(
                [
                    'user_id' =>  $user_id,
                    'space_booking_id' => Helper::generateRandomBookingId(5),
                    'space_id' => $bookingtemp->space_id,
                    'check_in_date' =>  $bookingtemp->space_start_date,
                    'check_out_date' =>  $bookingtemp->space_end_date,
                    'total_days' =>  $bookingtemp->total_days,
                    'total_room' =>   $bookingtemp->total_room,
                    'total_member' => $bookingtemp->total_member,
                    'total_amount' =>  $bookingtemp->total_amount,
                    'booking_status' => "pending",
                    'payment_status' => 'successful',
                    'payment_type' => $paymethod,
                    'payment_id' => $paymentId,
                    'payment_token' => $token,
                    'payer_id' => $PayerID,
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $booking_id = DB::getpdo()->lastInsertId();

            DB::table('payment_transaction')->insert(
                [
                    'booking_id' => $booking_id,
                    'user_id' =>  $user_id,
                    'vendor_id' =>  $vendor_id,
                    'txn_id' => $cartid,
                    'txn_amount' =>  $bookingtemp->total_amount,
                    'payment_method' => $paymethod,
                    'booking_type' => 'Space',
                    'txn_status' =>  'successful',
                    'txn_date' => date('Y-m-d H:i:s'),
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $check = true;

            if ($check) {
                $users = User::where('id', '=', $user_id)->first();
                $data['user_info'] = $users;
                $data['booking_id'] = $booking_id;
                $data['url'] = url('/');
                $data['order_info'] =  DB::table('space_booking')
                    ->join('users', 'users.id', '=', 'space_booking.user_id')
                    ->join('space', 'space.space_id', '=', 'space_booking.space_id')
                    ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
                    ->where('space_booking.id', $booking_id)
                    ->where('users.status', 1)
                    ->select('space_booking.*', 'space.*', 'space_categories.*', 'space_booking.created_at as booking_date', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number')
                    ->first();

                // echo "<pre>";print_r($data['order_info']);die;

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $users->email;
                    Mail::send('emails.space-invoice', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to($inData['email']);
                        $message->subject('roadNstyas - Space Booking Confirmation Mail');
                    });

                    $data['url'] = url('/admin_login');

                    $data['status'] = 'created to user';

                    $data['booking_id'] = $booking_id;

                    Mail::send('emails.space-invoice-reciever', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstyas');
                        $message->to('votivephp.rahulraj@gmail.com');
                        $message->subject('roadNstays - New Booking Recieved Mail');
                    });
                }

                // $spaceData = DB::table('space')->where('space_id', $bookingtemp->space_id)->where('status', 1)->first();
                // echo "<pre>";print_r($spaceData);die;
                // $vendor_id = $spaceData->space_user_id;
                if ($vendor_id != 1) {
                    $vendors = DB::table('users')->where('id', '=', $vendor_id)->first();
                    // echo "<pre>";print_r($vendors);die;
                    // $vendor_counts = count($vendors);
                    if (!empty($vendors)) {
                        if ($_SERVER['SERVER_NAME'] != 'localhost') {

                            $data['first_name'] = $vendors->first_name;

                            $data['status'] = 'Booking Space';

                            $data['booking_id'] = $booking_id;

                            $fromEmail = Helper::getFromEmail();
                            $inData['from_email'] = $fromEmail;
                            $inData['email'] = $vendors->email;
                            Mail::send('emails.space-invoice-reciever', $data, function ($message) use ($inData) {
                                $message->from($inData['from_email'], 'roadNstyas');
                                $message->to($inData['email']);
                                $message->subject('roadNstyas - Order assigned');
                            });
                        }
                    }
                }
                Session::get('total_amt');
                session::flash('message', 'Order created Succesfully.');
                //return redirect('/category/'.$frame_detail->category_id.'');
                return view('front/space/space_payment_successful', $data);
            } else {
                session::flash('error', 'Record not inserted.');
                return redirect('/');
            }
        } else {
            $data['booking_id'] = $checkorder->id;
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['booking_id'] =  $checkorder->id;
            $data['url'] = url('/');
            $data['order_info'] =  DB::table('space_booking')
                ->join('users', 'users.id', '=', 'space_booking.user_id')
                ->join('space', 'space.space_id', '=', 'space_booking.space_id')
                ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
                ->where('space_booking.id', $checkorder->id)
                ->where('users.status', 1)
                ->select('space_booking.*', 'space.*', 'space_categories.*', 'space_booking.created_at as booking_date', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number')
                ->first();

            // echo "<pre>";print_r($data['order_info']);die;    
        }
        session::flash('message', 'Booking created Succesfully.');
        return view('front/space/space_payment_successful', $data);
    }

    // public function space_payment_successful_old()
    // {
    //     return view('front/space/space_payment_successful');
    // }

    // public function space_search_list(Request $request)
    // {
    //     if (count($request->all()) >= 1) {

    //         if (isset($request->space_latitude)) {
    //             $space_latitude = $request->space_latitude;
    //         } else {

    //             $space_latitude = Session::get('space_latitude');
    //         }

    //         if (isset($request->space_longitude)) {
    //             $space_longitude = $request->space_longitude;
    //         } else {

    //             $space_longitude = Session::get('space_longitude');
    //         }

    //         if (isset($request->space_location)) {
    //             $location = $request->space_location;
    //         } else {

    //             $space_location = Session::get('space_location');
    //         }

    //         if (isset($request->space_name)) {
    //             $space_name = $request->space_name;
    //         } else {
    //             $space_name = Session::get('space_name');
    //         }

    //         // if(isset($request->person)){ $person = $request->person; }else{ 
    //         //     $person = Session::get('person'); }

    //         if (isset($request->space_checkin_date)) {
    //             $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
    //         } else {
    //             $checkin_date = Session::get('space_check_in_date');
    //         }

    //         if (isset($request->space_checkout_date)) {
    //             $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));
    //         } else {
    //             $checkout_date = Session::get('space_check_out_date');
    //         }

    //         $space_city = explode(',', $space_location);

    //         Session::put('space_latitude', $space_latitude);
    //         Session::put('space_longitude', $space_longitude);
    //         Session::put('space_location', $space_location);
    //         Session::put('space_name', $space_name);
    //         // Session::put('person', $person);
    //         Session::put('checkin_date', $checkin_date);
    //         Session::put('checkout_date', $checkout_date);

    //         $date1_ts = strtotime($checkin_date);
    //         $date2_ts = strtotime($checkout_date);
    //         $diff = $date2_ts - $date1_ts;
    //         $booking_days =  round($diff / 86400);

    //         $distance = 30;
    //         $results = DB::select(DB::raw('SELECT space_id, ( 3959 * acos( cos( radians(' . $space_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $space_longitude . ') ) + sin( radians(' . $space_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));
    //         // echo "<pre>";print_r($results);die; 
    //         $spaceids = array();

    //         foreach ($results as $key => $value) {

    //             $booking = DB::table('space_booking')
    //                 ->where("space_id", $value->space_id)
    //                 ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
    //                 ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
    //                 //->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
    //                 ->get();

    //             // echo "<pre>";print_r($booking);   

    //             $bookspaceids = array();

    //             foreach ($booking as $key => $bookvalue) {

    //                 $bookspaceids[] = $bookvalue->space_id;
                  
    //             }
    //             // echo "<pre>";print_r($bookspaceids); 

    //             $space_list = DB::table('space')->whereNotIn("space_id", $bookspaceids)->get();
    //             foreach ($space_list as $get_space_id) {
    //                 $spaceids[] = $get_space_id->space_id;
    //             }
    //             // echo "<pre>";print_r($space_list);
    //             // $spaceids[] = $value->space_id;
    //         }
            
    //         $space_data = DB::table('space')->whereIn("space_id", $spaceids)->where("status", 1)->groupBy('space_id')->paginate(10);
    //         // echo "<pre>";print_r($space_data);
    //         // die;
    //         $data['spaceList'] = $space_data;
    //         // $data['check_in'] = $checkin_date;
    //         // $data['check_out'] = $checkout_date;
    //         // $data['booking_days'] = $booking_days;
    //         // $data['space_latitude'] = $space_latitude;
    //         // $data['space_longitude'] = $space_longitude;

    //         // echo "<pre>";print_r($data);die;
    //         return view('front.space.space_search_list')->with($data);
    //     } else {
    //         return redirect('/');
    //     }
    // }

}
