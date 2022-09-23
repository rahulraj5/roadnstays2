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
use Carbon\CarbonPeriod;
use Illuminate\Pagination\Paginator;
use LDAP\Result;

use function PHPSTORM_META\type;

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
        // Session::flush();
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
        // // echo "<pre>";print_r($data['admin_user_details']);
        // echo "<pre>";print_r($data['space_user_details']);die;
        $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
        $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

        $data['space_features'] = DB::table('space_features')
            ->join('space_features_list', 'space_features.space_feature_id', 'space_features_list.space_feature_id')
            ->where('space_id', $space_id)->get();

        $get_date_range = DB::table('space_booking')->where('space_id', $space_id)->where('booking_status', '!=', 'canceled')->where('check_out_date', '>=', Carbon::today())->get(['check_in_date','check_out_date']);
        $get_date_range_array = $get_date_range->toArray();
        // print_r($get_date_range_array);die;
        $space_booked_date = array();

        foreach ($get_date_range_array as $value) { 
            $period = CarbonPeriod::create($value->check_in_date, $value->check_out_date);
            
            foreach ($period as $date) {
                // print_r($date);
                array_push($space_booked_date, $date->format('m/d/Y')); 
            }
        }  

        // echo "<pre>";print_r($space_booked_date);die;
        $data['space_booked_date'] = json_encode($space_booked_date);
        // echo "<pre>";print_r($data['space_booked_date']);die;
        $data['check_in'] = Session::get('space_check_in_date');
        $data['check_out'] = Session::get('space_check_out_date');  
        return view('front/space/space_details')->with($data);
    }

    public function update_daterange_session(Request $request)
    {
        $checkin_date = date('Y-m-d', strtotime($request->space_start_date));
        $checkout_date = date('Y-m-d', strtotime($request->space_end_date));;
        $spaceIdd = $request->spaceIdd;
        // echo "<pre>";print_r($spaceIdd);
        if($checkin_date === $checkout_date){
            $request->session()->forget('space_check_in_date');
            $request->session()->forget('space_check_out_date');
            return response()->json(['status' => 'notAvailable', 'msg' => 'Chekin Date and Checkout date should not be same']);
        }else{
            $booked_space_id = DB::table('space_booking')
            ->where("space_id", $spaceIdd)
            ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
            ->WhereBetween('check_out_date', [$checkin_date, $checkout_date])
            ->get();
            // echo "<pre>";print_r($booked_space_id);die;  
            if(count($booked_space_id) === 0) {                  
                Session::put('space_check_in_date', $request->space_start_date);
                Session::put('space_check_out_date', $request->space_end_date);

                return response()->json(['status' => 'success', 'msg' => 'Space is Available']);
            }else {
                $request->session()->forget('space_check_in_date');
                $request->session()->forget('space_check_out_date');
                return response()->json(['status' => 'notAvailable', 'msg' => 'Not Available in Selected Date']);
            }
        }    
    }

    public function change_daterange_session(Request $request)
    {
        $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
        $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));;
        $spaceIdd = $request->spaceIdd;
        $booked_space_id = DB::table('space_booking')
                    ->where("space_id", $spaceIdd)
                    ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
                    ->WhereBetween('check_out_date', [$checkin_date, $checkout_date])
                    ->get();   
                  
        if(count($booked_space_id) === 0) {                  
            Session::put('space_check_in_date', $request->space_checkin_date);
            Session::put('space_check_out_date', $request->space_checkout_date);

            return response()->json(['status' => 'success', 'msg' => 'Space is Available']);
        }else {
            $request->session()->forget('space_check_in_date');
            $request->session()->forget('space_check_out_date');
            return response()->json(['status' => 'notAvailable', 'msg' => 'Not Available in Selected Date']);
        }
    }

    public function check_valid_daterange(Request $request)
    {
        $checkin_date = date('Y-m-d', strtotime($request->space_start_date));
        $checkout_date = date('Y-m-d', strtotime($request->space_end_date));
        if($checkin_date === $checkout_date){
            $request->session()->forget('space_check_in_date');
            $request->session()->forget('space_check_out_date');
            return response()->json(['status' => 'sameDateError', 'msg' => 'Chekin Date and Checkout date should not be same']);
        }
        // else{
        //         return response()->json(['status' => 'notAvailable', 'msg' => 'Not Available in Selected Date']);
        //     }
        // }    
    }

    public function event_details()
    {
        return view('front/event/event_details');
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
                    // ->pluck('space_id');
                    ->get();

                // echo "<pre>";print_r($booked_space_id);
                // echo "<pre>";print_r($booked_space_id);
                // die;    
                $space_booked_id = array();

                foreach ($booked_space_id as $space_book) {
                    if($space_book->booking_status != 'canceled'){
                        $space_booked_id[] = $space_book->space_id;
                    }
                }
                // echo "<pre>";print_r($space_booked_id);
                // die;
                $space_avail_id = DB::table('space')->where('space_id', $value->space_id)->whereNotIn("space_id", $space_booked_id)->get();
                // echo "<pre>";print_r($space_avail_id);die;
                foreach ($space_avail_id as $space_get_book_id) {
                    $not_booked_id[] = $space_get_book_id->space_id;
                }
            }
            // die;
            $space_available = DB::table('space')->whereIn("space_id", $not_booked_id)->groupBy('space_id')->where("status", 1)->paginate(10);
            // echo "<pre>";print_r($space_available);die;
            $features = DB::table('space_features_list')->where('status', '=', 1)->get();

            $data['spaceList'] = $space_available;
            $data['space_check_in_date'] = $checkin_date;
            $data['space_check_out_date'] = $checkout_date;
            $data['booking_days'] = $booking_days;
            $data['space_city'] = $space_city[0];
            $data['space_latitude'] = $space_latitude;
            $data['space_longitude'] = $space_longitude;

            $data['categories'] = DB::table('space_categories')->where('status', 1)->get();
            $data['subcategories'] = DB::table('space_sub_categories')->where('status', 1)->get();
            $data['features'] = $features;

            // $data['space_country_wise'] = DB::table('space')
            //     ->select('space.*', 'countries.name as country_name')
            //     ->join('countries', 'space.space_country', '=', 'countries.id')
            //     ->orderby('countries.name', 'ASC')
            //     ->groupby('space.space_country')
            //     ->take(11)
            //     ->get();

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

            // $data['space_country'] = DB::table('countries')->get();

            // echo "<pre>";print_r($data['space_country']);die;
            return view('front.space.space_search_list')->with($data);
        } else {
            return redirect('/');
        }
    }

    public function space_list_ajax(Request $request)
    {
        $gdistance = $request->distance;
        $budget = $request->budget;
        $star = $request->star;
        $roomwise = $request->roomwise;
        $emenites = $request->emenites;
        $property = $request->property;

        Session::put('gdistance', $gdistance);
        Session::put('budget', $budget);
        Session::put('star', $star);
        Session::put('roomwise', $roomwise);
        Session::put('emenites', $emenites);
        Session::put('property', $property);

        if (!empty($gdistance)) {

            $distance = max($gdistance);
        } else {

            $distance = 30;
        }

        $min_price1 = '';
        $min_price2 = '';
        $min_price3 = '';
        $min_price4 = '';
        $min_price5 = '';
        $max_price1 = '';
        $max_price2 = '';
        $max_price3 = '';
        $max_price4 = '';
        $max_price5 = '';

        if (!empty($budget)) {
            foreach ($budget as $key => $price) {
                if ($price == 1) {
                    $min_price1 = 0;
                    $max_price1 = 5000;
                }
                if ($price == 2) {
                    $min_price2 = 5000;
                    $max_price2 = 10000;
                }
                if ($price == 3) {
                    $min_price3 = 10000;
                    $max_price3 = 15000;
                }
                if ($price == 4) {
                    $min_price4 = 15000;
                    $max_price4 = 20000;
                }
                if ($price == 5) {
                    $min_price5 = 20000;
                    $max_price5 = 500000;
                }
            }
        }

        $hotel_latitude = Session::get('hotel_latitude');
        $hotel_longitude = Session::get('hotel_longitude');
        $location = Session::get('location');
        $hotel_name = Session::get('hotel_name');
        $person = Session::get('person');
        $checkin_date = Session::get('checkin_date');
        $checkout_date = Session::get('checkout_date');
        $hotel_city = explode(',', $location);
        $date1_ts = strtotime($checkin_date);
        $date2_ts = strtotime($checkout_date);
        $diff = $date2_ts - $date1_ts;
        $booking_days =  round($diff / 86400);

        $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude . ') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));

        $hotelids = array();
        foreach ($results as $key => $value) {
            $booking = DB::table('booking')
                ->where("hotel_id", $value->hotel_id)
                ->whereBetween('check_in', [$checkin_date, $checkout_date])
                ->orWhereBetween('check_out', [$checkin_date, $checkout_date])
                //->whereNotBetween('check_out', [$checkin_date, $checkout_date])
                ->get();

            $bookroomids = array();
            foreach ($booking as $key => $bookvalue) {
                $roomid = $bookvalue->room_id;
                $totalbookroom = $bookvalue->total_room;
                $nofroom = DB::table('room_list')->where("id", $roomid)->value('number_of_rooms');
                if ($totalbookroom >= $nofroom) {
                    $bookroomids[] = $bookvalue->room_id;
                }
            }

            $room_list = DB::table('room_list')
                ->where("hotel_id", $value->hotel_id)
                ->where(function ($query) use ($roomwise) {
                    if (!empty($roomwise)) {
                        $query->whereIn("room_types_id", $roomwise);
                    }
                })
                ->whereNotIn("id", $bookroomids)
                ->get();

            //$totalroom = count($room_list); 

            $total_memeber = 0;
            $total_room = 0;
            foreach ($room_list as $key => $roomlvalue) {
                $total_memeber = $total_memeber + $roomlvalue->max_adults;
            }
            if ($person <= $total_memeber) {
                $hotelids[] = $value->hotel_id;
            }
        }

        // get eminites data

        $hotelamenities = '';
        $amhotelids = array();
        if (!empty($emenites)) {
            $hotelamenities = DB::table('hotel_amenities')
                ->whereIn("amenity_id", $emenites)
                ->where("status", 1)
                ->get();

            if (!empty($hotelamenities)) {

                foreach ($hotelamenities as $key => $valueam) {

                    $amhotel_ids[] = $valueam->hotel_id;
                }

                $amhotelids = array_unique($amhotel_ids);
            }
        }

        if (!empty($amhotelids)) {

            $hotelids = array_intersect($hotelids, $amhotelids);
        }

        // close table    

        $hotel_data = DB::table('hotels')
            ->whereIn("hotel_id", $hotelids)
            //->whereIn("hotel_rating",$star)
            ->where(function ($query) use ($star) {
                if (!empty($star)) {
                    $query->whereIn("hotel_rating", $star);
                }
            })
            ->where(function ($query) use ($property) {
                if (!empty($property)) {
                    $query->whereIn("property_type", $property);
                }
            })

            ->where(function ($query) use ($min_price1, $max_price1, $min_price2, $max_price2, $min_price3, $max_price3, $min_price4, $max_price4, $min_price5, $max_price5, $budget) {

                if (!empty($budget)) {

                    $query->where(function ($query) use ($min_price1, $max_price1) {
                        $query->where('stay_price', '>=', $min_price1);
                        $query->where('stay_price', '<=', $max_price1);
                    });

                    $query->orWhere(function ($query) use ($min_price2, $max_price2) {
                        $query->where('stay_price', '>=', $min_price2);
                        $query->where('stay_price', '<=', $max_price2);
                    });

                    $query->orWhere(function ($query) use ($min_price3, $max_price3) {
                        $query->where('stay_price', '>=', $min_price3);
                        $query->where('stay_price', '<=', $max_price3);
                    });

                    $query->orWhere(function ($query) use ($min_price4, $max_price4) {
                        $query->where('stay_price', '>=', $min_price4);
                        $query->where('stay_price', '<=', $max_price4);
                    });

                    $query->orWhere(function ($query) use ($min_price5, $max_price5) {
                        $query->where('stay_price', '>=', $min_price5);
                        $query->where('stay_price', '<=', $max_price5);
                    });
                }
            })
            ->where("hotel_status", 1)
            ->groupBy('hotel_id')
            ->paginate(10);
        //->get();


        $hoteldata = array();

        //echo "<pre>";print_r($data);die;
        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id', '=', $value->hotel_id)->get();

            $Img = array();
            $baseurl = url('/public/uploads/hotel_gallery/');
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id' => $IMG->id,
                    'img_name' => $baseurl . '/' . $IMG->image,
                    'is_featured' => $IMG->is_featured,
                    'status' => $IMG->status,
                );
            }

            $amenities = DB::table('hotel_amenities')
                ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('hotel_amenities.hotel_id', '=', $value->hotel_id)
                ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                ->limit('10')
                ->get();


            $hoteldata[] = array(

                'hotel_id' => $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => isset($value->property_alternate_num) ? $value->property_alternate_num : "",
                'cat_listed_room_type' => isset($value->cat_listed_room_type) ? $value->cat_listed_room_type : 0,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' =>  isset($value->checkin_time) ? $value->checkin_time : "",
                'checkout_time' =>  isset($value->checkout_time) ? $value->checkout_time : "",
                'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                'hotel_address' => isset($value->hotel_address) ? $value->hotel_address : "",
                'hotel_city' => isset($value->hotel_city) ? $value->hotel_city : "",
                'hotel_country' => isset($value->hotel_country) ? $value->hotel_country : "",
                'hotel_latitude' => isset($value->hotel_latitude) ? $value->hotel_latitude : "",
                'hotel_longitude' => isset($value->hotel_longitude) ? $value->hotel_longitude : "",
                'hotel_gallery' => isset($value->hotel_gallery) ? $value->hotel_gallery : "",
                'hotel_amenities' => $amenities,
                'gallary' => $Img
            );
        }

        $data['hotel_data'] = $hoteldata;

        $room_wise = DB::table('room_type_categories')->where('status', '=', 1)->get();

        $emenites = DB::table('H2_Amenities')->where('status', '=', 1)->get();

        $property_type = DB::table('H1_Hotel_and_other_Stays')->where('status', '=', 1)->get();

        //echo "<pre>"; print_r($property_type); die;

        $data['hotel_data'] = $hoteldata;
        $data['hotels'] = $hotel_data;
        $data['hotelcount'] = count($hoteldata);
        $data['location'] = $hotel_city[0];
        $data['check_in'] = $checkin_date;
        $data['check_out'] = $checkout_date;
        $data['person'] = $person;
        $data['booking_days'] = $booking_days;
        $data['hotel_latitude'] = $hotel_latitude;
        $data['hotel_longitude'] = $hotel_longitude;
        $data['room_wise'] = $room_wise;
        $data['emenites'] = $emenites;
        $data['property_type'] = $property_type;

        $returnHTML = view('front.space.space_list_ajax')->with($data)->render();;

        return response()->json($returnHTML);
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
        $document_type = $request->document_type;
        $document_number = $request->document_number;
        if ($request->hasFile('front_document_img')) {
            $image_name = $request->file('front_document_img')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
            $front_document_img = $filename . '-' . time() . '.' . $image_ext;
            $path = base_path() . '/public/uploads/user_document/';
            $request->file('front_document_img')->move($path, $front_document_img);
        }
        if ($request->hasFile('back_document_img')) {
            $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
            $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/user_document';
            $request->file('back_document_img')->move($pat2, $back_document_img);
        }
        $status = 1;

        // $client = "AcwBj1jBaPuIaGvVF4WCqtT8PMe8XVlNLriyqP2JVlFViJQpJbmF-CMsTnqI9TOA0Z6kWeD3uG5R0xvO";
        // $secret = "EPZ31KCn1aSfHzEkjdV6fI_A31vdzcbhVhV-fkc0GFKvc_WVJZPoKOCAw8TNmhKQVAF4pW46iaDpmznd";

        $client = "AVEgpnihV9nIWSO15Cg-SWM-TcA9_nKFqH_xA_gzoRmdpRw_dQNlB65G-fzbjr6dz5tUTr-ITCLbJ2Yn";
        $secret = "EFB-JdeQkwgkqOf7fAf5wIIDC1ed_67MDjU_2SSySwnzTnQu4v-DciM75nirTa7qJGeXL4_cdmIK6HEh";

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
                'payment_id' =>  $payment_id,
                'document_type' =>  $document_type,
                'document_number' =>  $document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
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
        $userData = DB::table('guestinfo')->where('payment_id', $paymentId)->where('status', 1)->first();
        // echo "<pre>";print_r($spaceData);die;
        $vendor_id = $spaceData->space_user_id;
        $check_guest_user = 0;
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
            $uemail = $userData->email;
            $pfirst_name = $resulspays->payer->payer_info->first_name;
            $ufirst_name = $userData->first_name;
            $plast_name = $resulspays->payer->payer_info->last_name;
            $ulast_name = $userData->last_name;
            $payer_id = $resulspays->payer->payer_info->payer_id;

            $srecipient_name = $resulspays->payer->payer_info->shipping_address->recipient_name;
            $sadd_line1 = $resulspays->payer->payer_info->shipping_address->line1;
            $sadd_line2 = !empty($resulspays->payer->payer_info->shipping_address->line2) ?  $resulspays->payer->payer_info->shipping_address->line2 : '';
            $scity = $resulspays->payer->payer_info->shipping_address->city;
            $sstate = $resulspays->payer->payer_info->shipping_address->state;
            $spostal_code = $resulspays->payer->payer_info->shipping_address->postal_code;
            $scountry_code = $resulspays->payer->payer_info->shipping_address->country_code;

            $phone = !empty($resulspays->payer->payer_info->phone) ?  $resulspays->payer->payer_info->phone : '';
            $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
            $country_code = $resulspays->payer->payer_info->country_code;
            $business_name = !empty($resulspays->payer->payer_info->business_name) ?  $resulspays->payer->payer_info->business_name : '';

            $total_amount = $resulspays->transactions[0]->amount->total;
            $currency = $resulspays->transactions[0]->amount->currency;

            $merchant_id = $resulspays->transactions[0]->payee->merchant_id;
            $merchant_email = $resulspays->transactions[0]->payee->email;
            $password = "roadnstays@123";
            $password = bcrypt($password);
            curl_close($ch);
            if (empty($user_id)) {

                $checkuser = DB::table('users')->where('email', $uemail)->first();

                if (!empty($checkuser)) {

                    $user_id = $checkuser->id;
                    $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
                } else {
                    $check_guest_user = 1;
                    DB::table('users')->insert(
                        [
                            'first_name' =>  $ufirst_name,
                            'last_name' =>  $ulast_name,
                            'email' =>  $uemail,
                            'user_type' => 'normal_user',
                            'contact_number' =>  $uphone,
                            'document_type' =>  $userData->document_type,
                            'document_number' =>  $userData->document_number,
                            'front_document_img' =>  $userData->front_document_img,
                            'back_document_img' =>  $userData->back_document_img,
                            'password' =>  $password,
                            'role_id' =>  2,
                            'is_verify_email' => 0,
                            'register_by' =>  'web',
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
                    if($check_guest_user === 1){
                        $usr_data = array('user_id'=>$users->id,'name'=>"User",'first_name'=>$users->first_name,'last_name'=>$users->last_name,'email'=>$users->email,'password'=>"roadnstays@123");
                        Mail::send('emails.signup_template', $usr_data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'RoadNStays');
                            $message->to($inData['email']);
                            $message->subject('RoadNStays - User E-mail Verification');
                        });
                    }

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
                if($check_guest_user === 0){
                    // echo "Nothing need to do";
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
                }   
                // session::flash('message', 'Order created Succesfully.');
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

    
    // public function space_detail($id)
    // {
    //     $space_id = base64_decode($id);
    //     $data['space_details'] = DB::table('space')->where('space_id', $space_id)->first();
    //     $data['country'] = DB::table('countries')->where('id', $data['space_details']->space_country)->first();
    //     $data['category'] = DB::table('space_categories')->where('scat_id', $data['space_details']->category_id)->first();
    //     $data['subcategory'] = DB::table('space_sub_categories')->where('sub_cat_id', $data['space_details']->sub_category_id)->first();
    //     if ($data['space_details']->space_user_id == 1) {
    //         $data['admin_user_details'] = DB::table('admins')->where('id', 1)->first();
    //     } else {
    //         $data['space_user_details'] = DB::table('users')->where('id', $data['space_details']->space_user_id)->first();
    //     }
    //     $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
    //     $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
    //     $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

    //     $data['space_features'] = DB::table('space_features')
    //         ->join('space_features_list', 'space_features.space_feature_id', 'space_features_list.space_feature_id')
    //         ->where('space_id', $space_id)->get();
    //     // echo "<pre>";print_r($data['space_user_details']);
    //     // echo "<pre>";print_r($data);
    //     // die;
    //     return view('front/space_details')->with($data);
    // }

    // public function space_detail_test($id)
    // {
    //     $space_id = base64_decode($id);
    //     $data['space_details'] = DB::table('space')->where('space_id', $space_id)->first();
    //     $data['country'] = DB::table('countries')->where('id', $data['space_details']->space_country)->first();
    //     $data['category'] = DB::table('space_categories')->where('scat_id', $data['space_details']->category_id)->first();
    //     $data['subcategory'] = DB::table('space_sub_categories')->where('sub_cat_id', $data['space_details']->sub_category_id)->first();
    //     if ($data['space_details']->space_user_id == 1) {
    //         $data['admin_user_details'] = DB::table('admins')->where('id', 1)->first();
    //     } else {
    //         $data['space_user_details'] = DB::table('users')->where('id', $data['space_details']->space_user_id)->first();
    //     }
    //     $data['space_gallery'] = DB::table('space_gallery')->where('space_id', $data['space_details']->space_id)->get();
    //     $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $data['space_details']->space_id)->get();
    //     $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $data['space_details']->space_id)->get();

    //     $data['space_features'] = DB::table('space_features')
    //         ->join('space_features_list', 'space_features.space_feature_id', 'space_features_list.space_feature_id')
    //         ->where('space_id', $space_id)->get();
    //     // echo "<pre>";print_r($data['space_user_details']);
    //     // echo "<pre>";print_r($data);
    //     // die;
    //     return view('front/test_space_details')->with($data);
    // }

    
    public function removeSpaceDateSession(Request $request)
    {
        Session::forget('space_check_in_date');
        Session::forget('space_check_out_date');
        echo 'Space Date Session has been destroyed';
        
        // $data['get_date'] = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '>=', Carbon::today())->get(); 
        // $data['get_date'] = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '<=', Carbon::today())->get(array('check_in_date', 'check_out_date'));


        // $data['get_date'] = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '<=', Carbon::today())->pluck('check_in_date','check_out_date')->get();

        // DB::table('table')->get(array('check_in_date', 'check_out_date', 'column3'));
        // dd($data['get_date'][0]);   
        // $array = array_values($data['get_date']);
        // dd($data['get_date']);

        // $data=Array(); //associative array
        // $simple_array = array(); //simple array
        // foreach($data['get_date'] as $d)
        // {
        //     $simple_array[]=$d['check_in_date'];   
        // }
        // dd($simple_array);


        // $space_id = 272;
        // $data['get_date'] = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '>=', Carbon::today())->get(['check_in_date','check_out_date']); 
        // dd($data['get_date']);
        // $get_date1 = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '<=', Carbon::today())->select('check_in_date','check_out_date')->get(); 
        // $get_date2 = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '<=', Carbon::today())->pluck('check_in_date','check_out_date')->toArray(); 
        // $get_date = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '<=', Carbon::today())->get(['check_in_date','check_out_date']);
        // $what_date = $get_date->toArray();
        // echo "<pre>";print_r($get_date1);
        // echo "<pre>";print_r($get_date2);
        // echo "<pre>";print_r($get_date3);
        // echo "<pre>";print_r($what_date);
        // die;

        // testing working code
        // $get_date = DB::table('space_booking')->where('space_id', $space_id)->where('check_in_date', '<=', Carbon::today())->get(['check_in_date','check_out_date']);
        // $what_date = $get_date->toArray();
        // $val = array();

        // foreach ($what_date as $value) { 
        //     $period = CarbonPeriod::create($value->check_in_date, $value->check_out_date);
        //     foreach ($period as $date) {
        //         array_push($val, $date->format('Y-m-d'));
        //     }
        // }
        // dd($val);
    }

}
