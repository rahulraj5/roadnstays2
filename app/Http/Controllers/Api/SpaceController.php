<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

use App\Post;

use Validator,DB;

use App\Models\User;

use App\Models\Hotel;

use App\Helpers\Helper;

use Session;

//use Auth;

use Illuminate\Support\Facades\Auth;

use Mail;

class SpaceController extends APIBaseController
{
    
    public function space_cities(Request $request)
    {
        $categories = DB::table('space')->groupBy('city')->where('status', 1)->get();

        if($categories){
            $space_cities = array();
            $baseurl = url('/public/uploads/space_images/cat_img');
            foreach($categories as $key=>$value){
                $space_cities[] = array(
                    'city'=>$value->city,
                );
            }
            return response()->json(['status'=>'Success', 
                'msg' => 'Space city list successfully',
                'response'=> ['space_cities' => $space_cities]
            ]);
        }else{
            return response()->json(['status'=>'Failure', 'msg' => 'No city found']); 
        }
    }

    public function space_type_list(Request $request)
    {
    	
        $categories = DB::table('space_categories')->where('status', 1)->get();

        if($categories){
            $space_cat = array();
            $baseurl = url('/public/uploads/space_images/cat_img');
            foreach($categories as $key=>$value){
                $space_cat[] = array(
                    'space_category_id'=>$value->scat_id,
                    'space_category_image'=>$baseurl."/".$value->space_cat_image,
                    'space_category_name'=>$value->category_name
                );
            }
    		return response()->json(['status'=>'Success', 
                'msg' => 'Space type list successfully',
                'response'=> ['categories' => $space_cat]
            ]);
    	}else{
    		return response()->json(['status'=>'Failure', 'msg' => 'No Countries found']); 
    	}

        
    }


    public function space_coutrywise(Request $request)
    {
    	$space_country_wise= DB::table('space')
            ->select('space.*', 'countries.name as country_name')
            ->join('countries', 'space.space_country', '=', 'countries.id')
            ->orderby('countries.name', 'ASC')
            ->groupby('space.space_country')
            ->take(11)
            ->get();


        if($data['space_country_wise']){
    		return response()->json(['status'=>'Success', 
                'msg' => 'Space Country list successfully',
                'response'=> ['space_country_wise' => $data['space_country_wise']]
            ]);
    	}else{
    		return response()->json(['status'=>'Failure', 'msg' => 'No Space Country List found']); 
    	}    
    }


    public function getCountries(Request $request)
    {
    	$data['countries'] = DB::table('countries')->get();

    	if($data['countries']){
    		return response()->json(['status'=>'Success', 
                'msg' => 'Countries list successfully',
                'response'=> ['countries' => $data['countries']]
            ]);
    	}else{
    		return response()->json(['status'=>'Failure', 'msg' => 'No Countries found']); 
    	} 
    	 
    } 	

    public function getSpaceByCity(Request $request)
    {
    	$space_address = $request->space_address;
        $lat = $request->space_latitude;
        $lng = $request->space_longitude;

        $data['spaceList'] = DB::table('space')
            ->join('space_categories', 'space.category_id', 'space_categories.scat_id')
            ->where('space.space_address', $space_address)
            ->where('space.space_latitude', $lat)
            ->where('space.space_longitude', $lng)
            ->where('space.status', 1)
            ->paginate(5);
            

        //print_r($data['spaceList']);    

        if($data['spaceList']){
    		return response()->json(['status'=>'Success', 
                'msg' => 'Space list successfully',
                'response'=> ['spaceList' => $data['spaceList']]
            ]);
    	}else{
    		return response()->json(['status'=>'Failure', 'msg' => 'No Space List found']); 
    	}      

    }

    public function getSpaceCityByDate(Request $request){
    	$space_address = $request->space_address;
    	$check_in_date = $request->check_in_date;
    	$check_out_date = $request->check_out_date;
    	
    	$data['spaceList'] = DB::table('space_booking')
            ->join('space', 'space.space_id', 'space_booking.space_id')
            ->where('space.space_address', $space_address)
            ->where('space_booking.check_in_date', $check_in_date)
            ->where('space_booking.check_out_date', $check_out_date)
            ->paginate(5);
        if($data['spaceList']){
    		return response()->json(['status'=>'Success', 
                'msg' => 'Space list successfully',
                'response'=> ['spaceList' => $data['spaceList']]
            ]);
    	}else{
    		return response()->json(['status'=>'Failure', 'msg' => 'No Space List found']); 
    	}       
            
    }

    public function searchEvents(Request $request){
        $address = $request->address;
        $lat = $request->latitude;
        $lng = $request->longitude;

        $data['eventList'] = DB::table('events')
                            ->where('address', $address)
                            ->where('latitude', $lat)
                            ->where('longitude', $lng)
                            ->paginate(5);

        $distance=50;

        $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude .') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));                    

        if($data['eventList']){
            return response()->json(['status'=>'Success', 
                'msg' => 'Event list successfully',
                'response'=> ['eventList' => $data['eventList']]
            ]);
        }else{
            return response()->json(['status'=>'Failure', 'msg' => 'No Event List found']); 
        }                    
    }

    public function spaceByLocation(Request $request){

            $space_id = $request->space_id;

            if($space_id){
                $space_data = DB::table('space')->where('category_id',$space_id)->get();
        

                $space_name = DB::table('space_categories')->where('scat_id',$space_id)->get();
                
                
                $space_data_by_category = array();
                //print_r($space_data);
                $count_space = count($space_data);
                $s_available = array();
                $baseurl = url('/public/uploads/space_images');
                foreach($space_data as $key => $value){
                    $space_gallery = DB::table('space_gallery')->where('space_id', $value->space_id)->get();
                    $images = array();
                    foreach($space_gallery as $key1 => $value1){
                        $images[] = $baseurl."/".$value1->image;
                    }
                    $s_available[] = array(
                        'space_id'=>$value->space_id,
                        'image'=>$images,
                        'space_name'=>$value->space_name,
                        'description'=>$value->description,
                        'price_per_night'=>"PKR ".$value->price_per_night."/- Per Night",
                        'room_size'=>$value->room_size." /sq.ft.",
                        'bedroom_number'=>$value->bedroom_number." Bedrooms",
                        'bathroom_number'=>$value->bathroom_number." Baths",
                        
                    );
                }

                if($s_available){
                    return response()->json(['status'=>'Success', 
                        'msg' => 'Space availablity successfully',
                        'response'=> ['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Results','s_available' => $s_available]
                    ]);
                }else{
                    return response()->json(['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Result','status'=>'Failure', 'msg' => 'No Space found']); 
                }
            }else{
                $space_latitude = $request->space_latitude;
                
                $space_longitude = $request->space_longitude; 
            
                $space_location = $request->space_location;
         
                $space_name = $request->space_name; 
            
                $checkin_date = date('Y-m-d', strtotime($request->start_date)); 
            
                $checkout_date = date('Y-m-d', strtotime($request->end_date));
                 
                $space_city = explode(',', $space_location);
                 
                $date1_ts = strtotime($checkin_date);
                $date2_ts = strtotime($checkout_date);
                $diff = $date2_ts - $date1_ts;
                $booking_days =  round($diff / 86400);

                $distance = 30;
                $results = DB::select(DB::raw('SELECT space_id, ( 3959 * acos( cos( radians(' . $space_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $space_longitude . ') ) + sin( radians(' . $space_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));
                // echo Session::get('space_location');echo "<pre>";print_r($results);

                
                $not_booked_id = array();

                foreach ($results as $key => $value) {
                   

                    $booked_space_id = DB::table('space_booking')
                        ->where("space_id", $value->space_id)
                        ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
                        ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
                        // ->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
                        ->get();

                    //echo "<pre>";print_r($booked_space_id);

                    $space_booked_id = array();

                    foreach ($booked_space_id as $space_book) {
                        $space_booked_id[] = $space_book->space_id;
                    }

                    $space_avail_id = DB::table('space')->where('space_id', $value->space_id)->whereNotIn("space_id", $space_booked_id)->get();
                    // echo "<pre>";print_r($space_avail_id);
                    foreach ($space_avail_id as $space_get_book_id) {
                        $not_booked_id[] = $space_get_book_id->space_id;
                    }
                }
                
                $space_available = DB::table('space')->whereIn("space_id", $not_booked_id)->groupBy('space_id')->where("status", 1)->paginate(10);
                
                $space_name = DB::table('space_categories')->where('scat_id',$space_available[0]->category_id)->get();

                $count_space = count($space_available);
                
                //print_r($space_name);die;
                $s_available = array();

                foreach($space_available as $key => $value){

                    $space_gallery = DB::table('space_gallery')->where('space_id', $value->space_id)->get();
                    $images = array();
                    $baseurl = url('/public/uploads/space_images/cat_img');
                    foreach($space_gallery as $key1 => $value1){
                        $images[] = $baseurl."/".$value1->image;
                    }
                    $s_available[] = array(
                        'image'=>$images,
                        'space_name'=>$value->space_name,
                        'description'=>$value->description,
                        'price_per_night'=>"PKR ".$value->price_per_night."/- Per Night",
                        'room_size'=>$value->room_size." /sq.ft.",
                        'bedroom_number'=>$value->bedroom_number." Bedrooms",
                        'bathroom_number'=>$value->bathroom_number." Baths",
                        
                    );
                    
                }

                //print_r($space_available);die;
                
                
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

                if($s_available){
                    return response()->json(['status'=>'Success', 
                        'msg' => 'Space availablity successfully',
                        'response'=> ['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Results','s_available' => $s_available]
                    ]);
                }else{
                    return response()->json(['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Result','status'=>'Failure', 'msg' => 'No Space found']); 
                }
            } 

    }

    public function spaceById(Request $request){

        $category_id = $request->category_id;
        $city_name = $request->city_name;

        if($category_id){
            if (!empty($city_name)) {
                $space_data = DB::table('space')->where('category_id',$category_id)->where('city',$city_name)->get();
            }else{
                $space_data = DB::table('space')->where('category_id',$category_id)->get();
            }
            
    
            //print_r($space_data);

            $space_name = DB::table('space_categories')->where('scat_id',$category_id)->get();
            
            
            $space_data_by_category = array();
            //print_r($space_data);
            $count_space = count($space_data);
            $s_available = array();
            $baseurl = url('/public/uploads/space_images');
            foreach($space_data as $key => $value){
                $space_gallery = DB::table('space_gallery')->where('space_id', $value->space_id)->get();
                $images = array();
                foreach($space_gallery as $key1 => $value1){
                    $images[] = $baseurl."/".$value1->image;
                }
                $s_available[] = array(
                    'space_id'=>$value->space_id,
                    'image'=>$images,
                    'space_name'=>$value->space_name,
                    'description'=>$value->description,
                    'price_per_night'=>"PKR ".$value->price_per_night."/- Per Night",
                    'room_size'=>$value->room_size." /sq.ft.",
                    'bedroom_number'=>$value->bedroom_number." Bedrooms",
                    'bathroom_number'=>$value->bathroom_number." Baths",
                    
                );
            }

            if($s_available){
                return response()->json(['status'=>'Success', 
                    'msg' => 'Space availablity successfully',
                    'response'=> ['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Results','s_available' => $s_available]
                ]);
            }else{
                return response()->json(['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Result','status'=>'Failure', 'msg' => 'No Space found']); 
            }
        }else{
            $space_latitude = $request->space_latitude;
   
    
    
            $space_longitude = $request->space_longitude;
       

        
            $space_location = $request->space_location;
        

        
            $space_name = $request->space_name;
        

        
            $checkin_date = date('Y-m-d', strtotime($request->start_date));
       

        
            $checkout_date = date('Y-m-d', strtotime($request->end_date));
            

            $space_city = explode(',', $space_location);
            

            $date1_ts = strtotime($checkin_date);
            $date2_ts = strtotime($checkout_date);
            $diff = $date2_ts - $date1_ts;
            $booking_days =  round($diff / 86400);

            $distance = 30;
            $results = DB::select(DB::raw('SELECT space_id, ( 3959 * acos( cos( radians(' . $space_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $space_longitude . ') ) + sin( radians(' . $space_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));
            // echo Session::get('space_location');echo "<pre>";print_r($results);

            
            $not_booked_id = array();

            foreach ($results as $key => $value) {
               

                $booked_space_id = DB::table('space_booking')
                    ->where("space_id", $value->space_id)
                    ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
                    ->orWhereBetween('check_out_date', [$checkin_date, $checkout_date])
                    // ->whereNotBetween('check_out_date', [$checkin_date, $checkout_date])
                    ->get();

                //echo "<pre>";print_r($booked_space_id);

                $space_booked_id = array();

                foreach ($booked_space_id as $space_book) {
                    $space_booked_id[] = $space_book->space_id;
                }

                $space_avail_id = DB::table('space')->where('space_id', $value->space_id)->whereNotIn("space_id", $space_booked_id)->get();
                // echo "<pre>";print_r($space_avail_id);
                foreach ($space_avail_id as $space_get_book_id) {
                    $not_booked_id[] = $space_get_book_id->space_id;
                }
            }
            
            $space_available = DB::table('space')->whereIn("space_id", $not_booked_id)->groupBy('space_id')->where("status", 1)->paginate(10);
            
            $space_name = DB::table('space_categories')->where('scat_id',$space_available[0]->category_id)->get();

            $count_space = count($space_available);
            
            //print_r($space_name);die;
            $s_available = array();

            foreach($space_available as $key => $value){

                $space_gallery = DB::table('space_gallery')->where('space_id', $value->space_id)->get();
                $images = array();
                $baseurl = url('/public/uploads/space_images/cat_img');
                foreach($space_gallery as $key1 => $value1){
                    $images[] = $baseurl."/".$value1->image;
                }
                $s_available[] = array(
                    'image'=>$images,
                    'space_name'=>$value->space_name,
                    'description'=>$value->description,
                    'price_per_night'=>"PKR ".$value->price_per_night."/- Per Night",
                    'room_size'=>$value->room_size." /sq.ft.",
                    'bedroom_number'=>$value->bedroom_number." Bedrooms",
                    'bathroom_number'=>$value->bathroom_number." Baths",
                    
                );
                
            }

            //print_r($space_available);die;
            
            
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

            if($s_available){
                return response()->json(['status'=>'Success', 
                    'msg' => 'Space availablity successfully',
                    'response'=> ['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Results','s_available' => $s_available]
                ]);
            }else{
                return response()->json(['space_category'=>$space_name[0]->category_name,'space_count'=>$count_space.' Result','status'=>'Failure', 'msg' => 'No Space found']); 
            }
        }

    }

    public function topFamousSpaces(Request $request){
        $spaceList = DB::table('space')
            ->join('space_categories', 'space.category_id', 'space_categories.scat_id')
            ->where('space.status', 1)
            ->get();
 
        if($spaceList){
            $space_list_array = array();
            foreach($spaceList as $key=>$value){
                $baseurl = url('/public/uploads/space_images/');
                $space_list_array[] = array(
                    'image'=>$baseurl."/".$value->image,
                    'category_name'=>$value->category_name,
                    'space_name'=>$value->space_name,
                    'space_address'=>$value->space_address,
                    'city'=>$value->city
                );
            }

            return response()->json(['status'=>'Success', 
                'msg' => 'Space list successfully',
                'response'=> ['space_list' => $space_list_array]
            ]);
        }else{
            return response()->json(['status'=>'Failure', 'msg' => 'No Space found']); 
        }    

    }

    public function spaceDetails(Request $request){


        $space_id = $request->space_id;

        $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
        
        $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));

        $space_details = DB::table('space')->where('space_id', $space_id)->get()->first();
        

        $space_name = $space_details->space_name;

        $baseurl = url('/public/uploads/space_images');

        $space_image = $baseurl."/".$space_details->image;

        $space_gallery = DB::table('space_gallery')->where('space_id', $space_id)->get();
        //print_r($space_gallery);
        $space_img_array = array();
        foreach($space_gallery as $key=>$value){
            $space_img_array[] = $baseurl."/".$value->image;
        }

        $space_configrations = array(
            $space_details->room_number." Rooms",$space_details->bedroom_number." Bedrooms",$space_details->bathroom_number." Bathrooms",$space_details->outdoor_facilities,"Others"
        );

        if ($space_details->space_user_id == 1) {
            $admin_user_details = DB::table('admins')->where('id', 1)->first();
        } else {
            $space_user_details = DB::table('users')->where('id', $space_details->space_user_id)->first();
        }

        if(!empty($space_user_details)){
            $posted_by = $space_user_details->first_name." ".$space_user_details->last_name." on ".date('M d, Y', strtotime($space_user_details->created_at));
        }elseif(!empty($admin_user_details)){
            $posted_by = $admin_user_details->name." on ".date('M d, Y', strtotime($admin_user_details->created_at));
        }

        $space_custom_details = DB::table('space_custom_details')->where('space_id', $space_details->space_id)->get();

        $furnishing_details = array();

        foreach($space_custom_details as $key=>$value){
            $furnishing_details[] = $value->custom_quantity." ".$value->custom_label;
        }

        $space_extra_option = DB::table('space_extra_option')->where('space_id', $space_details->space_id)->get();

        $extra_option_name = array();

        foreach($space_extra_option as $extra_option){

            $extra_option_name[] = $extra_option->ext_opt_name." - PKR ".$extra_option->ext_opt_price;
        }

        $space_features = DB::table('space_features')
            ->join('space_features_list', 'space_features.space_feature_id', 'space_features_list.space_feature_id')
            ->where('space_id', $space_id)->get();

        $s_features = array();    

        foreach($space_features as $feature){
            $s_features[] = $feature->space_feature_name;
        }    

        $date1_ts = strtotime($checkin_date);
        $date2_ts = strtotime($checkout_date);
        $diff = $date2_ts - $date1_ts;
        $booking_days = round($diff / 86400);

        $total_amount = ($booking_days*$space_details->price_per_night)+$space_details->cleaning_fee+$space_details->city_fee+$space_details->tax_percentage;


        $space_details_data[] = array(
            'space_gallary_images'=>$space_img_array,
            'space_name'=>$space_details->space_name,
            'guest_number'=>$space_details->guest_number.' Guests',
            'bedroom_number'=>$space_details->bedroom_number.' bedroom',
            'bathroom_number'=>$space_details->bathroom_number.' Bathroom',
            'space_configrations'=>$space_configrations,
            'space_rent'=>"PKR ".$space_details->price_per_night,
            'room_size'=>$space_details->room_size.' sq. ft.',
            'space_address'=>$space_details->space_address,
            'posted_by_on'=>$posted_by,
            'description'=>$space_details->description,
            'furnishing_details'=>$furnishing_details,
            'extra_option_name'=>$extra_option_name,
            'space_feature_name'=>$s_features,
            'cleaning_fee'=>$space_details->cleaning_fee,
            'total_nights'=>$booking_days,
            'city_fee'=>$space_details->city_fee,
            'service_tax'=>$space_details->tax_percentage,
            'total_amount'=>'PKR '.$total_amount
        );

        if($space_details_data){
            return response()->json(['status'=>'success','msg'=>'Space details get successfully','space_details'=>$space_details_data]);
        }else{
            return response()->json(['status'=>'Failure', 'msg' => 'No Space found']);
        } 
        
    }

    public function change_daterange_session(Request $request)
    {
        $checkin_date = date('Y-m-d', strtotime($request->space_checkin_date));
        $checkout_date = date('Y-m-d', strtotime($request->space_checkout_date));
        $spaceIdd = $request->spaceIdd;
        $booked_space_id = DB::table('space_booking')
                    ->where("space_id", $spaceIdd)
                    ->whereBetween('check_in_date', [$checkin_date, $checkout_date])
                    ->WhereBetween('check_out_date', [$checkin_date, $checkout_date])
                    ->get();   
                  
        if(count($booked_space_id) === 0) {                  
           

            return response()->json(['status' => 'success', 'msg' => 'Space is Available']);
        }else {
            
            return response()->json(['status' => 'notAvailable', 'msg' => 'Not Available in Selected Date']);
        }
    }

    // public function change_daterange_session(Request $request){

    // }
}    