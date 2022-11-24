<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

use App\Post;

use Validator,DB;

use App\Models\User;

use App\Models\Hotel;

use App\Helpers\Helper;

use Illuminate\Support\Facades\URL;
//use Auth;

use Illuminate\Support\Facades\Auth;

use Mail;

class WsController extends APIBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


    public function home_page(Request $request)
    {
        
        $tour_list_data = DB::table('tour_list')->join('country', 'tour_list.country_id', '=', 'country.id')->limit(5)->get(['tour_list.*', 'country.nicename as country_name']);

        $hotel_list_data = DB::table('hotels')->join('country', 'hotels.hotel_country', '=', 'country.id')->limit(5)->get(['hotels.*', 'country.nicename as hotel_country_name']);

        // $search = null;
        // $replace = '""';
        // array_walk($tour_list,
        // function (&$v) use ($search, $replace){
        //     $v = str_replace($search, $replace, $v);    
        //     }                                                                     
        // );
            
        $hotel_list = array();
        $baseurl = url('/public/uploads/hotel_gallery');
        foreach($hotel_list_data as $key => $value){

            $hotel_list[] = array(
                'hotel_id'=>$value->hotel_id,
                'hotel_name'=>$value->hotel_name,
                'hotel_content'=>$value->hotel_content,
                'price_per_night'=>"PKR ".$value->stay_price."/- Per Night",
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country_name'=>$value->hotel_country_name,
                'hotel_rating'=>$value->hotel_rating,
                'hotel_gallery'=> $baseurl."/".$value->hotel_gallery,
            );
        }

        $tour_list = array();
        $baseurl = url('/public/uploads/tour_gallery');
        foreach($tour_list_data as $key => $value){

            $tour_list[] = array(
                'id'=>$value->id,
                'tour_title'=>$value->tour_title,
                'tour_description'=>$value->tour_description,
                'price_per_night'=>"PKR ".$value->tour_price,
                'address' => $value->address,
                'city' => $value->city,
                'country_name'=>$value->country_name,
                'tour_type'=>$value->tour_type,
                'tour_sub_type'=>$value->tour_sub_type,
                'tour_days' => $value->tour_days,
                'tour_feature_image'=> $baseurl."/".$value->tour_feature_image,
            );
        }


        if(count($tour_list)>0 || count($hotel_list)>0){
        
            $response['message'] = "Home Data";
            $response['status'] = 1;
            $response['data'] = array('tour_list'=>$tour_list,'hotel_list'=>$hotel_list);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('tour_list'=>$tour_list,'hotel_list'=>$hotel_list);
        }
        
        return $response; 

    }

    public function hotel_list(Request $request)
    {   
        $hotel_latitude = $request->hotel_latitude; 
        $hotel_longitude = $request->hotel_longitude; 
        $hotel_city = $request->hotel_city; 
        $hotel_name = $request->hotel_name; 
        $person = $request->person;
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;

        $star_category = $request->star_category; 
        $property_type = $request->hotel_type; 
        $user_rating = $request->user_rating; 
        $popular_hotel = $request->popular_hotel; 
        $price_filter = $request->price_filter; 

        $distance=50;

        $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude .') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));


        $hotelids = array();

        foreach ($results as $key => $value) { 

        $booking = DB::table('booking')
        ->where("hotel_id",$value->hotel_id)
        ->whereBetween('check_in', [$checkin_date, $checkout_date])
        ->orWhereBetween('check_out', [$checkin_date, $checkout_date])
        ->get();

        $bookroomids = array();

        foreach ($booking as $key => $bookvalue) {

        $roomid = $bookvalue->room_id;
        $totalbookroom = $bookvalue->total_room;

        $nofroom = DB::table('room_list')->where("id",$roomid)->value('number_of_rooms'); 

        if($totalbookroom >= $nofroom ){    
        
            $bookroomids[] = $bookvalue->room_id;

        }
            
        }

        $room_list = DB::table('room_list')->where("hotel_id",$value->hotel_id)->whereNotIn("id",$bookroomids)->get(); 

        $totalroom = count($room_list);

        $total_memeber = 0;

        foreach ($room_list as $key => $roomlvalue) {

        $total_memeber = $total_memeber+$roomlvalue->max_adults;   
            
        }

         if($person <= $total_memeber){

         $hotelids[]= $value->hotel_id; 

         }

        }
     

        $Hotel = new Hotel;

        $Hotel = $Hotel->whereIn("hotel_id",$hotelids);
        $Hotel = $Hotel->where("hotel_status",1);

        if(!empty($star_category)){ $Hotel = $Hotel->where("hotel_rating",$star_category); } 

        if(!empty($user_rating)){ $Hotel = $Hotel->where("user_rating",$user_rating); } 

        if(!empty($property_type)){ $Hotel = $Hotel->where("property_type",$property_type); } 

        if(!empty($popular_hotel)){ $Hotel = $Hotel->orderBy('user_rating','DESC'); }

        if(!empty($price_filter)){ 

            if($price_filter==1){ 

                $Hotel = $Hotel->orderBy('stay_price','ASC'); 

            }else{

            $Hotel = $Hotel->orderBy('stay_price','DESC');

            }

        }

        $Hotel = $Hotel->groupBy('hotel_id'); 

        $hotel_data = $Hotel->get();

        $hoteldata=array();

        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id','=',$value->hotel_id)->get();

            $Img=array();
            $baseurl = url('/public/uploads/hotel_gallery/');
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id'=>$IMG->id,
                    'img_name'=>$baseurl.'/'.$IMG->image,
                    'is_featured'=>$IMG->is_featured,
                    'status'=>$IMG->status,
                );
            }


            $hoteldata[] = array(  

            'hotel_id'=> $value->hotel_id,
            'hotel_user_id' => $value->hotel_user_id,
            'hotel_name' => $value->hotel_name,
            'hotel_content' => $value->hotel_content,
            'property_contact_name' => $value->property_contact_name,
            'property_contact_num' => $value->property_contact_num,
            'property_alternate_num' =>isset($value->property_alternate_num)?$value->property_alternate_num:"",
            'cat_listed_room_type' => isset($value->cat_listed_room_type)?$value->cat_listed_room_type:0, 
            'hotel_rating' => $value->hotel_rating,
            'user_rating' => isset($value->user_rating)?$value->user_rating:"",
            'checkin_time' =>  isset($value->checkin_time)?$value->checkin_time:"",
            'checkout_time' =>  isset($value->checkout_time)?$value->checkout_time:"",
            'stay_price' => isset($value->stay_price)?$value->stay_price:0,
            'hotel_address' => isset($value->hotel_address)?$value->hotel_address:"", 
            'hotel_city' => isset($value->hotel_city)?$value->hotel_city:"", 
            'hotel_country' => isset($value->hotel_country)?$value->hotel_country:"", 
            'hotel_latitude' => isset($value->hotel_latitude)?$value->hotel_latitude:"",
            'hotel_longitude' => isset($value->hotel_longitude)?$value->hotel_longitude:"",
            'property_type' => isset($value->property_type)?$value->property_type:"",
            'gallary' => $Img
            );
            }
                    
        $data['hotel_data'] = $hoteldata;

        if(count($hoteldata)>0){
        
            $response['message'] = "Hotel List";
            $response['status'] = 1;
            $response['data'] = array('hotellist'=>$hoteldata);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('hotellist'=>$hoteldata);
        }
        

        return $response; 
    }


    public function hotel_details(Request $request)
    {

    	$hotelID = $request->id; 
        $member = $request->member;

        $hotel_data = DB::table('hotels')->where('hotel_id','=',$hotelID)->where(['hotel_status' => 1])->get(); 

        $hoteldata=array();

        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id','=',$value->hotel_id)->get();
            $Img=array();
            $baseurl = url('/public/uploads/hotel_gallery/');

            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id'=>$IMG->id,
                    'img_name'=>$baseurl.'/'.$IMG->image,
                    'is_featured'=>$IMG->is_featured,
                    'status'=>$IMG->status,
                );
            }
 

            $hoteldata[] = array(

            'hotel_id'=> $value->hotel_id,
            'hotel_user_id' => $value->hotel_user_id,
            'hotel_name' => $value->hotel_name,
            'hotel_content' => $value->hotel_content,
            'property_contact_name' => $value->property_contact_name,
            'property_contact_num' => $value->property_contact_num,
            'property_alternate_num' =>isset($value->property_alternate_num)?$value->property_alternate_num:"",
            'cat_listed_room_type' => isset($value->cat_listed_room_type)?$value->cat_listed_room_type:0, 
            'hotel_rating' => $value->hotel_rating,
            'checkin_time' =>  isset($value->checkin_time)?$value->checkin_time:"",
            'checkout_time' =>  isset($value->checkout_time)?$value->checkout_time:"",
            'stay_price' => isset($value->stay_price)?$value->stay_price:"0",
            'hotel_address' => isset($value->hotel_address)?$value->hotel_address:"", 
            'hotel_city' => isset($value->hotel_city)?$value->hotel_city:"", 
            'hotel_country' => isset($value->hotel_country)?$value->hotel_country:"", 
            'hotel_latitude' => isset($value->hotel_latitude)?$value->hotel_latitude:"",
            'hotel_longitude' => isset($value->hotel_longitude)?$value->hotel_longitude:"",
            'gallary' => $Img

            );
        }
         
        $hotel_amenities = DB::table('hotel_amenities')
        //->join('hotel_amenities', 'hotels.hotel_id', '=', 'hotel_amenities.hotel_id')
        ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
        ->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')
        ->where('hotel_amenities.hotel_id', '=', $hotelID) 
        ->where('hotel_amenities.status', '=', 1) 
        ->get();
        $hotelamenities = array();
        foreach ($hotel_amenities as $key => $value) {
            
            $hotelamenities[] = array(
                'id'=> $value->id,
                'hotel_id' => $value->hotel_id,
                'amenity_id' => $value->amenity_id,
                'status' => $value->status,
                'created_at' => $value->created_at,
                'amenity_name' => $value->amenity_name,
                'amenity_icon' => isset($value->amenity_icon)?$value->amenity_icon:"",
                'amenity_type' => $value->amenity_type,
                'amenity_type_name' => isset($value->amenity_type_name)?$value->amenity_type_name:"",
                'amenity_type_sym' => isset($value->amenity_type_sym)?$value->amenity_type_sym:"",
                'room_other_featured_id' => isset($value->room_other_featured_id)?$value->room_other_featured_id:"", 
                'name' => $value->name,
                'amenity_name_type' => isset($value->amenity_name_type)?$value->amenity_name_type:"",
            ); 
        }
    
        $booking = DB::table('booking')
        ->where("hotel_id",$hotelID)
        ->whereBetween('check_in', [$hotel_data['0']->checkin_time, $hotel_data['0']->checkout_time])
        ->orWhereBetween('check_out', [$hotel_data['0']->checkin_time, $hotel_data['0']->checkout_time])
        ->get();

        $bookroomids = array();

        foreach ($booking as $key => $bookvalue) {
        
        $bookroomids[] = $bookvalue->room_id;
            
        }

         $hotel_room_data = DB::table('room_list')->where("hotel_id",$hotelID)->whereNotIn("id",$bookroomids)->get(); 



        $hotel_room_data = DB::table('room_list')
        //->join('room_gallery', 'room_list.id', '=', 'room_gallery.room_id')
        ->where('room_list.hotel_id', '=', $hotelID) 
        ->where('room_list.status', '=', 1) 
        ->get();  

        $hotelroomdata = array();
        foreach ($hotel_room_data as $key => $value) {          

            $baseurl = url('/public/uploads/room_images/');
            $roomimg = $baseurl.'/'.$value->image;
 
            $room_amenities = DB::table('room_amenities')
            ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
            ->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')
            ->where('room_amenities.room_id', '=', $value->id) 
            ->where('room_amenities.status', '=', 1) 
            ->get();

            $roomamenities = array();

            foreach ($room_amenities as $roomvalue) {
                
                $roomamenities[] = array(
                    'id'=> $roomvalue->id,
                    'room_id' => $roomvalue->room_id,
                    'amenity_id' => $roomvalue->amenity_id,
                    'status' => $roomvalue->status,
                    'created_at' => $roomvalue->created_at,
                    'amenity_name' => $roomvalue->amenity_name,
                    'amenity_icon' => isset($roomvalue->amenity_icon)?$roomvalue->amenity_icon:"",
                    'amenity_type' => $roomvalue->amenity_type,
                    'amenity_type_name' => isset($roomvalue->amenity_type_name)?$roomvalue->amenity_type_name:"",
                    'amenity_type_sym' => isset($roomvalue->amenity_type_sym)?$roomvalue->amenity_type_sym:"",
                    'room_other_featured_id' => isset($roomvalue->room_other_featured_id)?$roomvalue->room_other_featured_id:"", 
                    'name' => $roomvalue->name,
                    'amenity_name_type' => isset($roomvalue->amenity_name_type)?$roomvalue->amenity_name_type:"",
                ); 
            }
         
            $max_adults = $value->max_adults;
            $noofroom1 = $member%$max_adults;
            $member1 = $member-$noofroom1;
            $noofroom = $member1/$max_adults;
            if($noofroom1){ $noofroom = $noofroom+1;}


            $ppernight = $value->price_per_night*$noofroom;
            $texpercent = $value->tax_percentage;
            $totaltax = ($ppernight*$texpercent)/100;

            $hotelroomdata[] = array( 
                'hotel_id' => $value->hotel_id,
                'room_id' => $value->id,
                'room_types_id' => $value->room_types_id,
                'name' => $value->name,
                'description' => isset($value->description)?$value->description:"",
                'notes' => isset($value->notes)?$value->notes:"",
                'max_adults' => $value->max_adults,
                'max_childern' => $value->max_childern,
                'number_of_rooms' => $value->number_of_rooms,
                'tax_percentage' => isset($value->tax_percentage)?$value->tax_percentage: "0",
                'price_per_night' => $value->price_per_night,
                'price_per_night_7d' => $value->price_per_night_7d,
                'price_per_night_30d' => $value->price_per_night_30d,
                'is_guest_allow' => isset($value->is_guest_allow)?$value->is_guest_allow: "0",
                'extra_guest_per_night'=> isset($value->extra_guest_per_night)?$value->extra_guest_per_night:"0", 
                'is_above_guest_cap' => isset($value->is_above_guest_cap)?$value->is_above_guest_cap:"0",
                'is_pay_by_num_guest' => isset($value->is_pay_by_num_guest)?$value->is_pay_by_num_guest:"0",
                'room_size' => isset($value->room_size)?$value->room_size: "0",
                'type_of_price' => isset($value->type_of_price)?$value->type_of_price:"",
                'cleaning_fee' => isset($value->cleaning_fee)?$value->cleaning_fee: "0",
                'cleaning_fee_type' => isset($value->cleaning_fee_type)?$value->cleaning_fee_type:"",
                'city_fee' => isset($value->city_fee)?$value->city_fee: "0", 
                'city_fee_type' => isset($value->city_fee_type)?$value->city_fee_type:"",
                'earlybird_discount' => isset($value->earlybird_discount)?$value->earlybird_discount:"0", 
                'min_days_in_advance' => isset($value->min_days_in_advance)?$value->min_days_in_advance:"0", 
                'bed_type' => $value->bed_type,
                'private_bathroom' => $value->private_bathroom,
                'private_entrance' => $value->private_entrance,
                'optional_services' => isset($value->optional_services)?$value->optional_services:"",
                'family_friendly' => $value->family_friendly,
                'outdoor_facilities'=>isset($value->outdoor_facilities)?$value->outdoor_facilities:"", 
                'extra_people' => isset($value->extra_people)?$value->extra_people:"", 
                'breakfast_availability' => isset($value->breakfast_availability)?$value->breakfast_availability:0, 
                'breakfast_price_inclusion' => isset($value->breakfast_price_inclusion)?$value->breakfast_price_inclusion:0, 
                'breakfast_cost' => isset($value->breakfast_cost)?$value->breakfast_cost:"",
                'breakfast_type' => isset($value->breakfast_type)?$value->breakfast_type:"",
                'status' => $value->status,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'image' => $roomimg,
                'total_member' => $member,
                'no_of_room' => $noofroom,
                'total_per_night' => $ppernight,
                'total_tax' => (double)$totaltax,
                'room_amenities' => $roomamenities
            );
        }      


  
        if(count($hoteldata)>0){ 
    		$response['message'] = "Hotel Detail";
    		$response['status'] = 1;
    		$response['data'] = array('hotel_detail'=>$hoteldata,'hotel_amenities'=>$hotelamenities,'room_detail'=>$hotelroomdata); 
		}else{ 
			$response['message'] = "No data found";
			$response['status'] = 0;
			$response['data'] = array('hotel_detail'=>'','room_detail'=>'');
		}
	 
		return $response; 
    }
  
    public function room_details(Request $request)
    {

        $roomID = $request->id; 

        $hotelID = DB::table('room_list')->where('id', '=', $roomID)->value('hotel_id');

        $hotel_data = DB::table('hotels')->where('hotel_id','=',$hotelID)->where(['hotel_status' => 1])->get(); 

        $hoteldata=array();

        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id','=',$value->hotel_id)->get();
            $Img=array();
            $baseurl = url('/public/uploads/hotel_gallery/');

            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id'=>$IMG->id,
                    'img_name'=>$baseurl.'/'.$IMG->image,
                    'is_featured'=>$IMG->is_featured,
                    'status'=>$IMG->status,
                );
            }
 

            $hoteldata[] = array(

            'hotel_id'=> $value->hotel_id,
            'hotel_user_id' => $value->hotel_user_id,
            'hotel_name' => $value->hotel_name,
            'hotel_content' => $value->hotel_content,
            'property_contact_name' => $value->property_contact_name,
            'property_contact_num' => $value->property_contact_num,
            'property_alternate_num' =>isset($value->property_alternate_num)?$value->property_alternate_num:"",
            'cat_listed_room_type' => isset($value->cat_listed_room_type)?$value->cat_listed_room_type:0, 
            'hotel_rating' => $value->hotel_rating,
            'checkin_time' =>  isset($value->checkin_time)?$value->checkin_time:"",
            'checkout_time' =>  isset($value->checkout_time)?$value->checkout_time:"",
            'stay_price' => isset($value->stay_price)?$value->stay_price:0,
            'hotel_address' => isset($value->hotel_address)?$value->hotel_address:"", 
            'hotel_city' => isset($value->hotel_city)?$value->hotel_city:"", 
            'hotel_country' => isset($value->hotel_country)?$value->hotel_country:"", 
            'hotel_latitude' => isset($value->hotel_latitude)?$value->hotel_latitude:"",
            'hotel_longitude' => isset($value->hotel_longitude)?$value->hotel_longitude:"",
            'gallary' => $Img

            );
        }

        $member = $request->member;
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;

        $diff = strtotime($checkout_date) - strtotime($checkin_date);
         //echo "<pre>"; print_r($diff);die;
        $days = abs(round($diff / 86400));

        $hotel_room_data = DB::table('room_list')
        ->join('room_gallery', 'room_list.id', '=', 'room_gallery.room_id')
        ->where('room_list.id', '=', $roomID) 
        ->where('room_list.status', '=', 1) 
        ->get();  


        $hotelroomdata = array();
        foreach ($hotel_room_data as $key => $value) {          

            $baseurl = url('/public/uploads/room_images/');
            $roomimg = $baseurl.'/'.$value->image;

            $max_adults = $value->max_adults;
            $noofroom1 = $member%$max_adults;
            $member1 = $member-$noofroom1;
            $noofroom = $member1/$max_adults;
            if($noofroom1){ $noofroom = $noofroom+1;}

            $ppernight = $value->price_per_night*$noofroom*$days;
            $texpercent = $value->tax_percentage;
            $totaltax = ($ppernight*$texpercent)/100;
            $totalamount = $ppernight+$totaltax;

            $hotelroomdata[] = array( 
                'id'=> $value->id,
                'room_id'=>$roomID,
                'room_types_id' => $value->room_types_id,
                'hotel_id' => $value->hotel_id,
                'name' => $value->name,
                'description' => isset($value->description)?$value->description:"",
                'notes' => isset($value->notes)?$value->notes:"",
                'max_adults' => $value->max_adults,
                'max_childern' => $value->max_childern,
                'number_of_rooms' => $value->number_of_rooms,
                'tax_percentage' => isset($value->tax_percentage)?$value->tax_percentage:"0",
                'price_per_night' => $value->price_per_night,
                'price_per_night_7d' => $value->price_per_night_7d,
                'price_per_night_30d' => $value->price_per_night_30d,
                'is_guest_allow' => isset($value->is_guest_allow)?$value->is_guest_allow:"0",
                'extra_guest_per_night'=> isset($value->extra_guest_per_night)?$value->extra_guest_per_night:"0", 
                'is_above_guest_cap' => isset($value->is_above_guest_cap)?$value->is_above_guest_cap:"0",
                'is_pay_by_num_guest' => isset($value->is_pay_by_num_guest)?$value->is_pay_by_num_guest:"0",
                'room_size' => isset($value->room_size)?$value->room_size:"0",
                'type_of_price' => isset($value->type_of_price)?$value->type_of_price:"",
                'cleaning_fee' => isset($value->cleaning_fee)?$value->cleaning_fee:"0",
                'cleaning_fee_type' => isset($value->cleaning_fee_type)?$value->cleaning_fee_type:"",
                'city_fee' => isset($value->city_fee)?$value->city_fee:"0", 
                'city_fee_type' => isset($value->city_fee_type)?$value->city_fee_type:"",
                'earlybird_discount' => isset($value->earlybird_discount)?$value->earlybird_discount:"0", 
                'min_days_in_advance' => isset($value->min_days_in_advance)?$value->min_days_in_advance:"0", 
                'bed_type' => $value->bed_type,
                'private_bathroom' => $value->private_bathroom,
                'private_entrance' => $value->private_entrance,
                'optional_services' => isset($value->optional_services)?$value->optional_services:"",
                'family_friendly' => $value->family_friendly,
                'outdoor_facilities'=>isset($value->outdoor_facilities)?$value->outdoor_facilities:"", 
                'extra_people' => isset($value->extra_people)?$value->extra_people:"", 
                'breakfast_availability' => isset($value->breakfast_availability)?$value->breakfast_availability:0, 
                'breakfast_price_inclusion' => isset($value->breakfast_price_inclusion)?$value->breakfast_price_inclusion:0, 
                'breakfast_cost' => isset($value->breakfast_cost)?$value->breakfast_cost:"",
                'breakfast_type' => isset($value->breakfast_type)?$value->breakfast_type:"",
                'status' => $value->status,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'room_id' => $value->room_id,
                'image' => $roomimg,
                'total_member' => $member,
                'no_of_room' => $noofroom,
                'total_night_price' => strval($ppernight),
                'total_tax' => strval($totaltax),
                'total_amount' => strval($totalamount),
                'total_night' => strval($days),
                'is_featured' => $value->is_featured
            );
        }

        $room_amenities = DB::table('room_amenities')
        ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
        ->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')
        ->where('room_amenities.room_id', '=', $roomID) 
        ->where('room_amenities.status', '=', 1) 
        ->get();

        $roomamenities = array();

        foreach ($room_amenities as $roomvalue) {
            
            $roomamenities[] = array(
                'id'=> $roomvalue->id,
                'room_id' => $roomvalue->room_id,
                'amenity_id' => $roomvalue->amenity_id,
                'status' => $roomvalue->status,
                'created_at' => $roomvalue->created_at,
                'amenity_name' => $roomvalue->amenity_name,
                'amenity_icon' => isset($roomvalue->amenity_icon)?$roomvalue->amenity_icon:"",
                'amenity_type' => $roomvalue->amenity_type,
                'amenity_type_name' => isset($roomvalue->amenity_type_name)?$roomvalue->amenity_type_name:"",
                'amenity_type_sym' => isset($roomvalue->amenity_type_sym)?$roomvalue->amenity_type_sym:"",
                'room_other_featured_id' => isset($roomvalue->room_other_featured_id)?$roomvalue->room_other_featured_id:"", 
                'name' => $roomvalue->name,
                'amenity_name_type' => isset($roomvalue->amenity_name_type)?$roomvalue->amenity_name_type:"",
            ); 
        }
  
        if(count($hotelroomdata)>0){ 

            $response['message'] = "Room Detail"; 
            $response['status'] = 1;
            $response['data'] = array('hotel_detail'=>$hoteldata,'room_detail'=>$hotelroomdata,'room_amenities'=>$roomamenities); 
        }else{ 

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('room_detail'=>'');
        }
     
        return $response; 

    } 


    public function hotel_list_test(Request $request)
    {   
        $hotel_latitude = $request->hotel_latitude; 
        $hotel_longitude = $request->hotel_longitude; 
        $hotel_city = $request->hotel_city; 
        $hotel_name = $request->hotel_name; 
        $person = $request->person;
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;

        $star_category = $request->star_category; 
        $property_type = $request->hotel_type; 
        $user_rating = $request->user_rating; 
        $popular_hotel = $request->popular_hotel; 
        $price_filter = $request->price_filter; 

        $distance=50;

        $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude .') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));


        $hotelids = array();

        foreach ($results as $key => $value) { 

        $booking = DB::table('booking')
        ->where("hotel_id",$value->hotel_id)
        ->whereBetween('check_in', [$checkin_date, $checkout_date])
        ->orWhereBetween('check_out', [$checkin_date, $checkout_date])
        ->get();

        $bookroomids = array();

        foreach ($booking as $key => $bookvalue) {
        
        $bookroomids[] = $bookvalue->room_id;
            
        }

         $room_list = DB::table('room_list')->where("hotel_id",$value->hotel_id)->whereNotIn("id",$bookroomids)->get(); 

        $totalroom = count($room_list);

        $total_memeber = 0;

        foreach ($room_list as $key => $roomlvalue) {

        $total_memeber = $total_memeber+$roomlvalue->max_adults;   
            
        }

         if($person <= $total_memeber){

         $hotelids[]= $value->hotel_id; 

         }

        }
     

        $Hotel = new Hotel;

        $Hotel = $Hotel->whereIn("hotel_id",$hotelids);
        $Hotel = $Hotel->where("hotel_status",1);

        if(!empty($star_category)){ $Hotel = $Hotel->where("hotel_rating",$star_category); } 

        if(!empty($user_rating)){ $Hotel = $Hotel->where("user_rating",$user_rating); } 

        if(!empty($property_type)){ $Hotel = $Hotel->where("property_type",$property_type); } 

        if(!empty($popular_hotel)){ $Hotel = $Hotel->orderBy('user_rating','DESC'); }

        if(!empty($price_filter)){ 

            if($price_filter==1){ 

                $Hotel = $Hotel->orderBy('stay_price','ASC'); 

            }else{

            $Hotel = $Hotel->orderBy('stay_price','DESC');

        }

        }

        $Hotel = $Hotel->groupBy('hotel_id'); 

        $hotel_data = $Hotel->get();

        $hoteldata=array();

        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id','=',$value->hotel_id)->get();

            $Img=array();
            $baseurl = url('/public/uploads/hotel_gallery/');
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id'=>$IMG->id,
                    'img_name'=>$baseurl.'/'.$IMG->image,
                    'is_featured'=>$IMG->is_featured,
                    'status'=>$IMG->status,
                );
            }


            $hoteldata[] = array(  

            'hotel_id'=> $value->hotel_id,
            'hotel_user_id' => $value->hotel_user_id,
            'hotel_name' => $value->hotel_name,
            'hotel_content' => $value->hotel_content,
            'property_contact_name' => $value->property_contact_name,
            'property_contact_num' => $value->property_contact_num,
            'property_alternate_num' =>isset($value->property_alternate_num)?$value->property_alternate_num:"",
            'cat_listed_room_type' => isset($value->cat_listed_room_type)?$value->cat_listed_room_type:0, 
            'hotel_rating' => $value->hotel_rating,
            'user_rating' => isset($value->user_rating)?$value->user_rating:"",
            'checkin_time' =>  isset($value->checkin_time)?$value->checkin_time:"",
            'checkout_time' =>  isset($value->checkout_time)?$value->checkout_time:"",
            'stay_price' => isset($value->stay_price)?$value->stay_price:0,
            'hotel_address' => isset($value->hotel_address)?$value->hotel_address:"", 
            'hotel_city' => isset($value->hotel_city)?$value->hotel_city:"", 
            'hotel_country' => isset($value->hotel_country)?$value->hotel_country:"", 
            'hotel_latitude' => isset($value->hotel_latitude)?$value->hotel_latitude:"",
            'hotel_longitude' => isset($value->hotel_longitude)?$value->hotel_longitude:"",
            'property_type' => isset($value->property_type)?$value->property_type:"",
            'gallary' => $Img
            );
            }
                    
        $data['hotel_data'] = $hoteldata;

        if(count($hoteldata)>0){
        
            $response['message'] = "Hotel List";
            $response['status'] = 1;
            $response['data'] = array('hotellist'=>$hoteldata);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('hotellist'=>$hoteldata);
        }
        

        return $response; 
    }


    public function hotel_type(Request $request)
    {   

        $hotel_type = DB::table('H1_Hotel_and_other_Stays')->where("status",1)->get(); 

        $hoteltype=array();

        foreach ($hotel_type as $key => $value) {

        $hoteltype[] = array(  

            'id'=> $value->id,
            'stay_type' => $value->stay_type,

            );
        }


        if(count($hotel_type)>0){
        
            $response['message'] = "Hotel Type";
            $response['status'] = 1;
            $response['data'] = array('hoteltype'=>$hoteltype);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('hoteltype'=>$hotel_type);
        }
        
        return $response; 
    }
 
    public function hotel_room_booking(Request $request)
    {

    	//echo "string";die;
		$validator = Validator::make($request->all(), [

	        'user_id' => 'required',
	        'type' => 'required'

	    ]);

        $u_id = $request->user_id;
        $type = $request->type;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        }else{

        	if ($type == 'upcomimg') {
        		$bookingList = DB::table('booking')
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
	            ->where('booking.check_in', '>', date('Y-m-d'))
	            ->orderby('booking.id', 'DESC')
	            ->get();   
        	}elseif ($type == 'canceled') {
        		$bookingList = DB::table('booking')
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
		        ->where('booking.booking_status', '=' ,'canceled')  
		        ->orderby('booking.id', 'DESC')
		        ->get();
        	}else{
        		$bookingList = $bookingList = DB::table('booking')
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
        	}


	        foreach ($bookingList as $key => $value) {

          	    $search = null;
		        $replace = '""';
		        array_walk($value,
		        function (&$v) use ($search, $replace){
		            $v = str_replace($search, $replace, $v);    
		            }                                                                     
		        );

	        }  
            if(count($bookingList)>0){
    
	            $response['message'] = "Hotel Room Booking List";
	            $response['status'] = 1;
	            $response['data'] = array('booking_list'=>$bookingList);

	        }else{

	            $response['message'] = "No data found";
	            $response['status'] = 0;
	            $response['data'] = array('booking_list'=>$bookingList);
	        }
    
    		return $response; 
        }   
    }

    public function room_booking_details(Request $request)
    {	
    	$validator = Validator::make($request->all(), [

	        'booking_id' => 'required'

	    ]);

        $booking_id = $request->booking_id;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {


    		$bookingDetails = DB::table('booking')
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

            $search = null;
	        $replace = '""';
	        array_walk($bookingDetails,
	        function (&$v) use ($search, $replace){
	            $v = str_replace($search, $replace, $v);    
	            }                                                                     
	        );

            //$vendorDetails = DB::table('users')->where('id',$bookingDetails->hotel_user_id)->first();

            if($bookingDetails->hotel_user_id == 1) {
               $vendorDetails = DB::table('admins')->where('id',$bookingDetails->hotel_user_id)->first();
            }else{
                $vendorDetails = DB::table('users')->where('id',$bookingDetails->hotel_user_id)->first();
            }

            $searchvendor = null;
            $replacevendor = '""';
            array_walk($vendorDetails,
            function (&$vn) use ($searchvendor, $replacevendor){
                $vn = str_replace($searchvendor, $replacevendor, $vn);    
                }                                                                     
            );

            if($bookingDetails){ 
	            $response['message'] = "Hotel Room Booking Detail";
	            $response['status'] = 1;
	            $response['data'] = array('booking_details'=>$bookingDetails,'vendor_details'=>$vendorDetails);

	        }else{

	            $response['message'] = "No data found";
	            $response['status'] = 0;
	            $response['data'] = array('booking_details'=>$bookingDetails);
	        }
    
    		return $response;
        }    
    }

    public function tour_booking_list(Request $request)
    {	
    	    	
		$validator = Validator::make($request->all(), [

	        'user_id' => 'required',
	        'type' => 'required'

	    ]);

        $u_id = $request->user_id;
        $type = $request->type;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        }else{
        	if($type == 'upcomimg') {
		        $bookingList = DB::table('tour_booking')
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
		            ->where('tour_list.tour_start_date', '>', date('Y-m-d'))
		            ->orderby('tour_booking.id', 'DESC')
		            ->get();
		    }elseif($type == 'completed') {
		    	$bookingList = DB::table('tour_booking')
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
	            ->where('tour_list.tour_start_date', '<', date('Y-m-d'))
	            ->orderby('tour_booking.id', 'DESC')
	            ->get();
		    }else{
		    	$bookingList = DB::table('tour_booking')
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
		            ->where('tour_booking.booking_status', '=' ,'canceled') 
		            //->where('tour_list.tour_start_date', '<', date('Y-m-d'))
		            ->orderby('tour_booking.id', 'DESC')
		            ->get();
		    }       
	        foreach ($bookingList as $key => $value) {
          	    $search = null;
		        $replace = '""';
		        array_walk($value,
		        function (&$v) use ($search, $replace){
		            $v = str_replace($search, $replace, $v);    
		            }                                                                     
		        );
	        }  

            if(count($bookingList)>0){
    
	            $response['message'] = "Hotel Room Booking List";
	            $response['status'] = 1;
	            $response['data'] = array('booking_list'=>$bookingList);

	        }else{

	            $response['message'] = "No data found";
	            $response['status'] = 0;
	            $response['data'] = array('booking_list'=>$bookingList);
	        }
    
    		return $response; 

	    }        
    }

    public function tour_booking_detail(Request $request)
    {
        $validator = Validator::make($request->all(), [

	        'booking_id' => 'required'

	    ]);

        $booking_id = $request->booking_id;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
        	$bookingDetails = DB::table('tour_booking')
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
                'tour_list.vendor_id',
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

            $search = null;
	        $replace = '""';
	        array_walk($bookingDetails,
	        function (&$v) use ($search, $replace){
	            $v = str_replace($search, $replace, $v);    
	            }                                                                     
	        );

            if($bookingDetails->vendor_id == 1) {
               $vendorDetails = DB::table('admins')->where('id',$bookingDetails->vendor_id)->first();
            }else{
                $vendorDetails = DB::table('users')->where('id',$bookingDetails->vendor_id)->first();
            }

            //$vendorDetails = DB::table('users')->where('id',$bookingDetails->vendor_id)->first();

            $searchvendor = null;
            $replacevendor = '""';
            array_walk($vendorDetails,
            function (&$vn) use ($searchvendor, $replacevendor){
                $vn = str_replace($searchvendor, $replacevendor, $vn);    
                }                                                                     
            );

            if($bookingDetails){
        
	            $response['message'] = "Tour Booking Detail";
	            $response['status'] = 1;
	            $response['data'] = array('booking_details'=>$bookingDetails,'vendor_details'=>$vendorDetails);

	        }else{

	            $response['message'] = "No data found";
	            $response['status'] = 0;
	            $response['data'] = array('booking_details'=>$bookingDetails);
	        }
    
    		return $response;
        }    
    }

    public function payment(Request $request)
    {
        $user_id = $request->user_id;
        $hotel_id = $request->hotel_id;  
        $room_id = $request->room_id;
        $member = $request->total_member;
        $total_room = $request->total_room;
        $total_day = $request->total_day;
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;
        $tax = $request->tax;
        $amount = $request->amount;
        $total_amount = $request->total_amount;

        $request_params = array (
            'METHOD' => 'DoDirectPayment',
            'USER' => 'deepaksanidhya_api1.gmail.com',
            'PWD' => 'NVA4VZETTGTWFNTM',
            'SIGNATURE' => 'AXsc3YsPwPHamsW.7NrxtR-8foL9A3XXp2YQYJMz9-3ae8CC1S0ixBPx',
            'VERSION' => '85.0',
            'PAYMENTACTION' => 'Sale',
            'IPADDRESS' => '127.0.0.1',
            'CREDITCARDTYPE' => $request->credit_card_type,
            'ACCT' => $request->card_number,
            'EXPDATE' => $request->exp_date,
            'CVV2' => $request->cvv2,
            'FIRSTNAME' => $request->first_name,
            'LASTNAME' => $request->last_name,
            'STREET' => $request->street,
            'CITY' => $request->city,
            'STATE' => $request->state,
            'COUNTRYCODE' => $request->country_code,
            'ZIP' => $request->zip,
            'AMT' => $request->total_amount,
            'CURRENCYCODE' => 'USD',
            'DESC' => $request->desc
       ); 
  
     
       $nvp_string = '';     
       foreach($request_params as $var=>$val)
       {
          $nvp_string .= '&'.$var.'='.urlencode($val);
       }
     
        $curl = curl_init();     
        curl_setopt($curl, CURLOPT_VERBOSE, 0);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);     
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);     
        curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');     
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);     
        curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string); 

        $result = curl_exec($curl);

        curl_close($curl);   

        $data = $this->NVPToArray($result);


        if($data['ACK'] == 'Success'){
           
            $response['message'] = "Your payment was processed success.";
            $response['status'] = $data['ACK'];
            $response['data'] = array('payment'=>$data);

        }if($data['ACK'] == 'Failure'){

            $response['message'] = "Your payment was declined/fail.";
            $response['status'] = $data['ACK'];
            $response['data'] = array('payment'=>$data);

        }else{ /*echo "Something went wront please try again letter."; */ }

        return $response; 
    }

    public function  NVPToArray($NVPString)
    {

       $proArray = array();

        while(strlen($NVPString)){
            // key
            $keypos= strpos($NVPString,'=');
            $keyval = substr($NVPString,0,$keypos);
            //value
            $valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
            $valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);

            $proArray[$keyval] = urldecode($valval);
            $NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
        }

        return $proArray;
    }


    public function tour_list(Request $request)
    {   

        $tour_list = DB::table('tour_list')->join('country', 'tour_list.country_id', '=', 'country.id')->get(['tour_list.*', 'country.nicename as country_name']);

        $search = null;
        $replace = '""';
        array_walk($tour_list,
        function (&$v) use ($search, $replace){
            $v = str_replace($search, $replace, $v);    
            }                                                                     
        );
            
        if(count($tour_list)>0){
        
            $response['message'] = "Tour List";
            $response['status'] = 1;
            $response['data'] = array('tour_list'=>$tour_list,'tour_url'=> URL::to('').'/public/uploads/tour_gallery/');

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('tour_list'=>$tour_list,'tour_url'=> URL::to('').'/public/uploads/tour_gallery/');
        }
        
        return $response; 
    }

    public function tour_search_fields(Request $request)
    {   
        $get_tour = DB::table('tour_list')->join('country', 'tour_list.country_id', '=', 'country.id')->select('tour_list.country_id','country.nicename')->where('tour_list.status',1)->where('tour_list.tour_status', 'available')->get()->unique('tour_list.country_id');
        
        $tour_duration = DB::table('tour_list')->where('status',1)->where('tour_status', 'available')->orderBy('tour_days', 'ASC')->get()->unique('tour_days'); 

        $tourduration=array();

        foreach ($tour_duration as $key => $value) {

        $tourduration[] = array(  

            'id'=> $value->id,
            'tour_night' => $value->tour_days-1,
            'tour_days' => $value->tour_days,

            );
        }

        if(count($get_tour)>0){
        
            $response['message'] = "Country List & Tour Duration";
            $response['status'] = 1;
            $response['data'] = array('country_list'=>$get_tour,'tour_duration'=>$tourduration);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('country_list'=>$get_tour,'tour_duration'=>$tourduration);
        }
        
        return $response;
    }

    public function tour_details(Request $request)
    {   
        // echo URL::to('');die;

        $validator = Validator::make($request->all(), [

            'tour_id' => 'required'

        ]);

        $tour_id = $request->tour_id;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $tour_data = DB::table('tour_list')->join('country', 'tour_list.country_id', '=', 'country.id')->where('tour_list.id','=',$tour_id)->first(['tour_list.*', 'country.nicename as country_name']);
            $tour_itinerary = DB::table('tour_itinerary')->where('tour_id', $tour_id)->get();
            $tour_gallery = DB::table('tour_gallery')->where('tour_id', $tour_id)->get();
            $touritinerary = array();
            foreach($tour_itinerary as $itinerary){

                $trip_detail = json_decode($itinerary->trip_detail);
                $detail_array = array();
                foreach($trip_detail as $detail){
                    $detail_array[] = array('trip_detail'=>$detail);
                }

                $touritinerary[] = array(
                    'id' => $itinerary->id, 
                    'tour_id' => $itinerary->tour_id, 
                    'title' => $itinerary->title, 
                    'place_from' => $itinerary->place_from, 
                    'place_to' => $itinerary->place_to, 
                    'hotel' => $itinerary->hotel, 
                    'transport' => $itinerary->transport, 
                    'night_stay' => $itinerary->night_stay, 
                    'trip_detail' => $detail_array, 
                    'picture' => $itinerary->picture, 
                    'status' => $itinerary->status,
                    'created_at' => $itinerary->created_at,
                    'updated_at' => $itinerary->updated_at
                );
            }
            
            $search = null;
            $replace = '""';
            array_walk($tour_data,
            function (&$v) use ($search, $replace){
                $v = str_replace($search, $replace, $v);    
                }                                                                     
            );


            $vendor_data = DB::table('users')->join('vendor_profile', 'users.id', '=', 'vendor_profile.user_id')->where('users.id','=',$tour_data->vendor_id)->first(['users.*', 'vendor_profile.*']);


            $search1 = null;
            $replace1 = '""';
            array_walk($vendor_data,
            function (&$v1) use ($search1, $replace1){
                $v1 = str_replace($search1, $replace1, $v1);    
                }                                                                     
            );

            $search2 = null;
            $replace2 = '""';
            array_walk($touritinerary,
            function (&$v2) use ($search2, $replace2){
                $v2 = str_replace($search2, $replace2, $v2);    
                }                                                                     
            );

            // $REPLACEMENT = '';

            // $values = ['a', 'b', null, 'd'];

            // $result = array_map(
            //   fn ($value) => $value ?? $REPLACEMENT,
            //   $touritinerary
            // );

            // print_r($result); die;

            //print_r($vendor_data);die;
            if($tour_data){
            $response['message'] = "Tour Detail";
            $response['status'] = 1;
            $response['data'] = array('tour_data'=>$tour_data,'tour_itinerary'=>$touritinerary,'tour_gallery'=>$tour_gallery,"tour_url" => URL::to('')."/public/uploads/tour_gallery/",'vendor_data'=>$vendor_data,'vendor_url' => URL::to('')."/public/uploads/vendor_document/img/");
            }else{

                $response['message'] = "No data found";
                $response['status'] = 0;
                $response['data'] = array('tour_data'=>0);
            }
        
            return $response;

        }
    }

    public function tour_list_search(Request $request)
    {   

        //print_r($request->all());die;        
        if (isset($request->destination)) {
            $destination = $request->destination;
        } else {
            $destination = '';
        }

        if (isset($request->duration)) {
            $duration = $request->duration;
        } else {
            $duration = '';
        }


        $tour_list = DB::table('tour_list')
                    ->join('country', 'tour_list.country_id', '=', 'country.id')
                    ->where('tour_list.country_id', 'like', '%' . $destination . '%')
                    ->where('tour_list.tour_days', 'like', '%' . $duration . '%')
                    ->get(['tour_list.*', 'country.nicename as country_name']);


        if(count($tour_list)>0){
        
            $response['message'] = "Tour List";
            $response['status'] = 1;
            $response['data'] = array('tour_list'=>$tour_list,'tour_url'=> URL::to('').'/public/uploads/tour_gallery/');

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('tour_list'=>$tour_list,'tour_url'=> URL::to('').'/public/uploads/tour_gallery/');
        }
        
        return $response; 
    }
    

    // public function create_booking_room(Request $request)
    // {
        
    //     $validator = Validator::make($request->all(), [

    //         'user_id' => 'required',
    //         'hotel_id' => 'required',
    //         'room_id' => 'required',
    //         'check_in' => 'required',
    //         'check_out' => 'required',
    //         'total_days' =>  'required',
    //         'total_room' =>   'required',
    //         'total_member' => 'required',
    //         'total_amount' => 'required',
    //         'cleaning_fee' => 'required',
    //         'city_fee' => 'required',
    //         'tax_percentage' => 'required',
    //         'booking_status' => 'required',
    //         'payment_status' => 'required',
    //         'payment_type' => 'required',
    //     ] );

    //     if ($validator->fails()) {
    //         return $this->sendError($validator->messages()->first(), array(), 200);
    //     } else {
    //         $hotelData = DB::table('hotels')->where('hotel_id', $request->hotel_id)->where('hotel_status', 1)->first();
    //         $userData = DB::table('guestinfo')->where('payment_id', $paymentId)->where('status', 1)->first();
    //         // echo "<pre>"; print_r($userData);die;
    //         $vendor_id = $hotelData->hotel_user_id;
    //         $check_guest_user = 0;
    //         if (!empty($bookingtemp)) {

    //             $uemail = $userData->email;
    //             $ufirst_name = $userData->first_name;
    //             $ulast_name = $userData->last_name;
    //             $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
    //             $uemail = $userData->email;
    //             $password = "roadnstays@123";
    //             $password = bcrypt($password);
    //             //curl_close($ch);
    //             if (empty($user_id)) {

    //                 $checkuser = DB::table('users')->where('email', $uemail)->first();
                    
    //                 if (!empty($checkuser)) {
    //                     $user_id = $checkuser->id;
    //                     $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
    //                 } else {
    //                     $check_guest_user = 1;
    //                     DB::table('users')->insert(
    //                         [
    //                             'first_name' =>  $ufirst_name,
    //                             'last_name' =>  $ulast_name,
    //                             'email' =>  $uemail,
    //                             'user_type' => 'normal_user',
    //                             'contact_number' =>  $uphone,
    //                             'document_type' =>  $userData->document_type,
    //                             'document_number' =>  $userData->document_number,
    //                             'front_document_img' =>  $userData->front_document_img,
    //                             'back_document_img' =>  $userData->back_document_img,
    //                             'password' =>  $password,
    //                             'role_id' =>  2,
    //                             'is_verify_email' => 0,
    //                             'register_by' =>  'web',
    //                             'status' => 1,
    //                             'updated_at' => date('Y-m-d H:i:s'),
    //                             'created_at' =>  date('Y-m-d H:i:s')
    //                         ]
    //                     );

    //                     $user_id = DB::getpdo()->lastInsertId();
    //                 }
    //             }
    //         }
    //         $checkorder = DB::table('booking')->where('payment_token', '=', $result->TransactionId)->first();
    //         $data['payment_status'] = $result->TransactionStatus;
    //         if($result->TransactionStatus=="Paid")
    //         {
    //             $booking_status = "confirmed";
    //         }else{
    //             $booking_status = "pending";
    //         }
            
    //         if (empty($checkorder)) {

    //             DB::table('booking')->insert(
    //                 [
    //                     'user_id' =>  $request->user_id,
    //                     'hotel_id' => $request->hotel_id,
    //                     'room_id' =>  $request->room_id,
    //                     'check_in' =>  $request->check_in,
    //                     'check_out' =>  $request->check_out,
    //                     'total_days' =>  $request->total_days,
    //                     'total_room' =>   $request->total_room,
    //                     'total_member' => $request->total_member,
    //                     'total_amount' => $request->total_amount,
    //                     'cleaning_fee' => $request->cleaning_fee,
    //                     'city_fee' => $request->city_fee,
    //                     'tax_percentage' => $request->tax_percentage,
    //                     'booking_status' => 'confirmed',
    //                     'payment_status' => 'COD',
    //                     'payment_type' => 'COD',
    //                     'created_at' =>  date('Y-m-d H:i:s')
    //                 ]
    //             );

    //             $booking_id = DB::getpdo()->lastInsertId();

    //             DB::table('payment_transaction')->insert(
    //                 [
    //                     'booking_id' => $booking_id,
    //                     'user_id' =>  $request->user_id,
    //                     'vendor_id' =>  $vendor_id,
    //                     'txn_id' => '',
    //                     'txn_amount' =>  $request->total_amount,
    //                     'payment_method' => 'COD',
    //                     'booking_type' => 'Room',
    //                     'txn_status' =>  'COD',
    //                     'txn_date' => date('Y-m-d H:i:s'),
    //                     'created_at' =>  date('Y-m-d H:i:s')
    //                 ]
    //             );

    //             $check = true;

    //             if ($check) {

    //                 $users = User::where('id', '=', $user_id)->first();
    //                 $data['user_info'] = $users;
    //                 $data['booking_id'] = $booking_id;
    //                 $data['url'] = url('/');
    //                 $data['order_info'] =  DB::table('booking')
    //                     ->join('users', 'users.id', '=', 'booking.user_id')
    //                     ->join('hotels', 'hotels.hotel_id', '=', 'booking.hotel_id')
    //                     ->join('room_list', 'room_list.id', '=', 'booking.room_id')
    //                     ->where('booking.id', $booking_id)
    //                     ->where('users.status', 1)
    //                     ->select('booking.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.user_city', 'users.postal_code', 'users.contact_number', 'room_list.name', 'room_list.id as room_id', 'room_list.price_per_night', 'room_list.tax_percentage', 'room_list.cleaning_fee', 'room_list.city_fee', 'room_list.bed_type', 'room_list.breakfast_availability', 'room_list.breakfast_price_inclusion', 'hotels.hotel_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.hotel_city', 'hotels.hotel_rating', 'hotels.hotel_gallery', 'hotels.property_alternate_num', 'hotels.property_contact_num', 'hotels.hotel_latitude', 'hotels.hotel_longitude')
    //                     ->first();

    //                 $update_payment_status = DB::table('room_booking_request')->where('user_id', $user_id)->where('room_id', $request->room_id)->where('hotel_id', $request->hotel_id)->update(['payment_status' => 1]);    

    //                 $data['room_amenities'] = DB::table('room_amenities')
    //                     ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
    //                     ->where('room_amenities.room_id', '=', $request->room_id)
    //                     ->select('H2_Amenities.*', 'room_amenities.amenity_id')
    //                     ->limit(5)
    //                     ->get();

    //                 if ($_SERVER['SERVER_NAME'] != 'localhost') {

    //                     $fromEmail = Helper::getFromEmail();
    //                     $inData['from_email'] = $fromEmail;
    //                     $inData['email'] = $users->email;
    //                     Mail::send('emails.invoice', $data, function ($message) use ($inData) {
    //                         $message->from($inData['from_email'], 'roadNstays');
    //                         $message->to($inData['email']);
    //                         $message->subject('roadNstyas - Room Booking Confirmation Mail');
    //                     });
    //                     if($check_guest_user === 1){
    //                         $usr_data = array('user_id'=>$users->id,'name'=>"User",'first_name'=>$users->first_name,'last_name'=>$users->last_name,'email'=>$users->email,'password'=>"roadnstays@123");
    //                         Mail::send('emails.signup_template', $usr_data, function ($message) use ($inData) {
    //                             $message->from($inData['from_email'], 'RoadNStays');
    //                             $message->to($inData['email']);
    //                             $message->subject('RoadNStays - User E-mail Verification');
    //                         });
    //                     }

    //                     $data['url'] = url('/admin_login');

    //                     $data['status'] = 'created to user';

    //                     $data['booking_id'] = $booking_id;

    //                     Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
    //                         $message->from($inData['from_email'], 'roadNstyas');
    //                         $message->to('votivephppushpendra@gmail.com');
    //                         $message->subject('roadNstyas - New Booking Recieved Mail');
    //                     });
    //                 }
    //                 $vendors = User::where('id', '=', $vendor_id)->first();
    //                 if (!empty($vendors)) {
    //                     if ($_SERVER['SERVER_NAME'] != 'localhost') {

    //                         $data['first_name'] = $vendors->first_name;

    //                         $data['status'] = 'Booking Room';

    //                         $data['booking_id'] = $booking_id;

    //                         $fromEmail = Helper::getFromEmail();
    //                         $inData['from_email'] = $fromEmail;
    //                         $inData['email'] = $vendors->email;
    //                         Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
    //                             $message->from($inData['from_email'], 'roadNstyas');
    //                             $message->to($inData['email']);
    //                             $message->subject('roadNstyas - Order assigned');
    //                         });
    //                     }
    //                 }
    //                 Session::get('total_amt');
        
            
    //                 if($check_guest_user === 0){
    //                 }else{
    //                     $response['message'] = "Tour Detail";
    //                     $response['status'] = 1;
    //                     $response['data'] = array('booking_data'=>$data);
    //                 }
    //             } else {
    //                     $response['message'] = "No data found";
    //                     $response['status'] = 0;
    //                     $response['data'] = array('tour_data'=>0);
    //             }
    //         }

    //         return $response;
    //     }
        
    // }

    public function create_booking_room(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'user_id' => 'required',
            'hotel_id' => 'required'

        ]); 
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        }else{
        
            $user_id =  $request->user_id;

            $hotelData = DB::table('hotels')->where('hotel_id', $request->hotel_id)->where('hotel_status', 1)->first();

            if (!empty($hotelData)) {
                $file = $request->file('front_document_img');
                if(!empty($file)){
                    $destinationPath = public_path("uploads");
                    $file->move($destinationPath,$file->getClientOriginalName());
                    $front_document_img =  $file->getClientOriginalName();
                }else{
                    $front_document_img = "";
                }

                $back_document_img = $request->file('back_document_img');
                
                
                if(!empty($back_document_img)){
                    $destinationPath_back_img = public_path("uploads");
                    $back_document_img->move($destinationPath_back_img,$back_document_img->getClientOriginalName());
                    $back_document_img = $back_document_img->getClientOriginalName();
                }else{
                    $back_document_img = "";
                }

                DB::table('guestinfo')->insert(
                    [
                        'user_id' =>  $hotelData->hotel_user_id,
                        'first_name' =>  $request->first_name,
                        'last_name' =>  $request->last_name,
                        'email' =>  $request->email,
                        'hotel_id'=>$hotelData->hotel_id,
                        'mobile' =>  $request->mobile,
                        'document_type' =>  $request->document_type,
                        'document_number' =>  $request->document_number,
                        'front_document_img' =>  $front_document_img,
                        'back_document_img' =>  $back_document_img,
                        'status' => 1,
                        'updated_date' => date('Y-m-d H:i:s'),
                        'created_date' =>  date('Y-m-d H:i:s')
                    ]
                );

                $guest_user_id = DB::getpdo()->lastInsertId();

                $userData = DB::table('guestinfo')->where('user_id', $hotelData->hotel_user_id)->where('status', 1)->first();

                // echo "<pre>"; print_r($userData);die;
                $vendor_id = $hotelData->hotel_user_id;
                $check_guest_user = 0;
                
                $uemail = $userData->email;
                $ufirst_name = $userData->first_name;
                $ulast_name = $userData->last_name;
                $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
                $uemail = $userData->email;
                $password = "roadnstays@123";
                $password = bcrypt($password);
                //curl_close($ch);
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
            
            

                DB::table('booking')->insert(
                    [
                        'user_id' =>  $user_id,
                        'hotel_id' => $request->hotel_id,
                        'room_id' =>  $request->room_id,
                        'check_in' =>  $request->check_in,
                        'check_out' =>  $request->check_out,
                        'total_days' =>  $request->total_days,
                        'total_room' =>   $request->total_room,
                        'total_member' => $request->total_member,
                        'total_amount' => $request->total_amount,
                        'cleaning_fee' => $request->cleaning_fee,
                        'city_fee' => $request->city_fee,
                        'tax_percentage' => $request->tax_percentage,
                        'booking_status' => 'confirmed',
                        'payment_status' => 'COD',
                        'payment_type' => 'COD',
                        'created_at' =>  date('Y-m-d H:i:s')
                    ]
                );

                $booking_id = DB::getpdo()->lastInsertId();

                DB::table('payment_transaction')->insert(
                    [
                        'booking_id' => $booking_id,
                        'user_id' =>  $request->user_id,
                        'vendor_id' =>  $vendor_id,
                        'txn_id' => '',
                        'txn_amount' =>  $request->total_amount,
                        'payment_method' => 'COD',
                        'booking_type' => 'Room',
                        'txn_status' =>  'COD',
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
                    $data['order_info'] =  DB::table('booking')
                        ->join('users', 'users.id', '=', 'booking.user_id')
                        ->join('hotels', 'hotels.hotel_id', '=', 'booking.hotel_id')
                        ->join('room_list', 'room_list.id', '=', 'booking.room_id')
                        ->where('booking.id', $booking_id)
                        ->where('users.status', 1)
                        ->select('booking.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.user_city', 'users.postal_code', 'users.contact_number', 'room_list.name', 'room_list.id as room_id', 'room_list.price_per_night', 'room_list.tax_percentage', 'room_list.cleaning_fee', 'room_list.city_fee', 'room_list.bed_type', 'room_list.breakfast_availability', 'room_list.breakfast_price_inclusion', 'hotels.hotel_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.hotel_city', 'hotels.hotel_rating', 'hotels.hotel_gallery', 'hotels.property_alternate_num', 'hotels.property_contact_num', 'hotels.hotel_latitude', 'hotels.hotel_longitude')
                        ->first();

                        
                    $update_payment_status = DB::table('room_booking_request')->where('user_id', $user_id)->where('room_id', $request->room_id)->where('hotel_id', $request->hotel_id)->update(['payment_status' => 1]);    

                    $data['room_amenities'] = DB::table('room_amenities')
                        ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                        ->where('room_amenities.room_id', '=', $request->room_id)
                        ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                        ->limit(5)
                        ->get();

                    if ($_SERVER['SERVER_NAME'] != 'localhost') {

                        $fromEmail = Helper::getFromEmail();
                        $inData['from_email'] = $fromEmail;
                        $inData['email'] = $users->email;
                        Mail::send('emails.invoice', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstays');
                            $message->to($inData['email']);
                            $message->subject('roadNstyas - Room Booking Confirmation Mail');
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

                        Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstyas');
                            $message->to('votivephppushpendra@gmail.com');
                            $message->subject('roadNstyas - New Booking Recieved Mail');
                        });
                    }
                    $vendors = User::where('id', '=', $vendor_id)->first();
                    if (!empty($vendors)) {
                        if ($_SERVER['SERVER_NAME'] != 'localhost') {

                            $data['first_name'] = $vendors->first_name;

                            $data['status'] = 'Booking Room';

                            $data['booking_id'] = $booking_id;

                            $fromEmail = Helper::getFromEmail();
                            $inData['from_email'] = $fromEmail;
                            $inData['email'] = $vendors->email;
                            Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
                                $message->from($inData['from_email'], 'roadNstyas');
                                $message->to($inData['email']);
                                $message->subject('roadNstyas - Order assigned');
                            });
                        }
                    }
                    $response['message'] = "Booking Created Successfully";
                    $response['status'] = 1;
                    $response['data'] = array('booking_id'=>$booking_id);

            
                    if($check_guest_user === 0){
                    }else{
                        $response['message'] = "To view your booking Please! do signin into your account after verify your E-mail.";
                        $response['status'] = 1;
                    }
                } else {
                    $response['message'] = "No data found";
                    $response['status'] = 0;
                    $response['data'] = array('booking_id'=>0);
                }
            }else{
                $response['message'] = "Hotel not found";
                $response['status'] = 0;
                $response['data'] = array('booking_id'=>0);      
            } 
            return $response;
        }
        
    }

    public function create_space_booking(Request $request){

        
    	$user_id =  $request->user_id; 
        
        $spaceData = DB::table('space')->where('space_id', $request->space_id)->where('status', 1)->first();
        if (!empty($spaceData)) {
       
            $file = $request->file('front_document_img');
            if(!empty($file)){
                $destinationPath = public_path("uploads");
                $file->move($destinationPath,$file->getClientOriginalName());
                $front_document_img =  $file->getClientOriginalName();
            }else{
                $front_document_img = "";
            }

            $back_document_img = $request->file('back_document_img');
            
            
            if(!empty($back_document_img)){
                $destinationPath_back_img = public_path("uploads");
                $back_document_img->move($destinationPath_back_img,$back_document_img->getClientOriginalName());
                $back_document_img = $back_document_img->getClientOriginalName();
            }else{
                $back_document_img = "";
            }

            DB::table('guestinfo')->insert(
                [
                    'user_id' =>  $spaceData->space_user_id,
                    'first_name' =>  $request->first_name,
                    'last_name' =>  $request->last_name,
                    'email' =>  $request->email,
                    'space_id'=>$spaceData->space_id,
                    'mobile' =>  $request->mobile,
                    'document_type' =>  $request->document_type,
                    'document_number' =>  $request->document_number,
                    'front_document_img' =>  $front_document_img,
                    'back_document_img' =>  $back_document_img,
                    'status' => 1,
                    'updated_date' => date('Y-m-d H:i:s'),
                    'created_date' =>  date('Y-m-d H:i:s')
                ]
            );

            $guest_user_id = DB::getpdo()->lastInsertId();
             
            $userData = DB::table('guestinfo')->where('id', $guest_user_id)->where('status', 1)->first();
            $vendor_id = $spaceData->space_user_id;
            $check_guest_user = 0;
            
            $uemail = $userData->email;
            $ufirst_name = $userData->first_name;
            $ulast_name = $userData->last_name;
            $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
            $password = "roadnstays@123";
            $password = bcrypt($password);

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
            
            DB::table('space_booking')->insert(
                [
                    'user_id' =>  $user_id,
                    'space_booking_id' => Helper::generateRandomBookingId(5),
                    'space_id' => $request->space_id,
                    'check_in_date' =>  $request->space_start_date,
                    'check_out_date' =>  $request->space_end_date,
                    'total_days' =>  $request->total_days,
                    'total_room' =>   $request->total_room,
                    'total_member' => $request->total_member,
                    'total_amount' =>  $request->total_amount,
                    'booking_status' => 'confirmed',
                    // 'payment_status' => 'successful',
                    'payment_status' => 'COD',
                    // 'payment_type' => $paymethod,
                    'payment_type' => 'COD',
                    
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $booking_id = DB::getpdo()->lastInsertId();
            //print_r($userData);

            DB::table('payment_transaction')->insert(
                [
                    'booking_id' => $booking_id,
                    'user_id' =>  $user_id,
                    'vendor_id' =>  $vendor_id,
                    // 'txn_id' => $cartid,
                    'txn_id' => '',
                    'txn_amount' =>  $request->total_amount,
                    // 'payment_method' => $paymethod,
                    'payment_method' => 'COD',
                    'booking_type' => 'Space',
                    'txn_status' =>  'COD',
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
                    ->select('space_booking.*', 'space.*','space_booking.id as booki_id', 'space_categories.*', 'space_booking.created_at as booking_date', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number')
                    ->first();

                $update_payment_status = DB::table('space_booking_request')->where('user_id', $user_id)->where('space_id', $request->space_id)->update(['payment_status' => 1]);    

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
                        $message->to('admin@gmail.com');
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
                $response['message'] = "Booking Created Successfully";
                $response['status'] = 1;
                $response['data'] = array('booking_id'=>$booking_id);
                if($check_guest_user === 0){
                    // echo "Nothing need to do";
                }else{
                    $response['message'] = "To view your booking Please! do signin into your account after verify your E-mail.";
                    $response['status'] = 1;
                    
                }   
                
                
            } else {
                $response['message'] = "No data found";
                $response['status'] = 0;
                $response['data'] = array('space_data'=>0);
                
            }
        }else{
            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('space_data'=>0);
        }
        return $response;
        
    	
    }

    public function create_tour_booking(Request $request){
    	$user_id =  $request->user_id;

        $tourData = DB::table('tour_list')->where('id', $request->tour_id)->where('tour_status', 1)->first();
        if (!empty($tourData)) {
            $file = $request->file('front_document_img');
            if(!empty($file)){
                $destinationPath = public_path("uploads");
                $file->move($destinationPath,$file->getClientOriginalName());
                $front_document_img =  $file->getClientOriginalName();
            }else{
                $front_document_img = "";
            }

            $back_document_img = $request->file('back_document_img');
            
            
            if(!empty($back_document_img)){
                $destinationPath_back_img = public_path("uploads");
                $back_document_img->move($destinationPath_back_img,$back_document_img->getClientOriginalName());
                $back_document_img = $back_document_img->getClientOriginalName();
            }else{
                $back_document_img = "";
            }

            DB::table('guestinfo')->insert(
                [
                    'user_id' =>  $tourData->vendor_id,
                    'first_name' =>  $request->first_name,
                    'last_name' =>  $request->last_name,
                    'email' =>  $request->email,
                    'tour_id'=>$tourData->id,
                    'mobile' =>  $request->mobile,
                    'document_type' =>  $request->document_type,
                    'document_number' =>  $request->document_number,
                    'front_document_img' =>  $front_document_img,
                    'back_document_img' =>  $back_document_img,
                    'status' => 1,
                    'updated_date' => date('Y-m-d H:i:s'),
                    'created_date' =>  date('Y-m-d H:i:s')
                ]
            );

            $guest_user_id = DB::getpdo()->lastInsertId();
            
            $userData = DB::table('guestinfo')->where('id', $guest_user_id)->where('status', 1)->first();

            $vendor_id = $tourData->vendor_id;
            $check_guest_user = 0;

            
            $uemail = $userData->email;
            $ufirst_name = $userData->first_name;
            $ulast_name = $userData->last_name;
            $password = "roadnstays@123";
            $password = bcrypt($password);

            if (empty($user_id)) {
                $checkuser = DB::table('users')->where('email', $uemail)->first();

                if (!empty($checkuser)) {
                    $user_id = $checkuser->id;
                    $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
                }else{
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
            
            DB::table('tour_booking')->insert(
                [
                    'user_id' =>  $user_id,
                    'tour_id' => $request->tour_id,
                    'total_amount' =>  $request->total_amount,
                    'partial_payment_status' =>  'COD',
                    'online_paid_amount' =>  $request->online_paid_amount,
                    'remaining_amount_to_pay' =>  $request->remaining_amount_to_pay,
                    'booking_status' => 'confirmed',
                    'payment_status' => 'COD',
                    'payment_type' => 'COD',
                    
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $booking_id = DB::getpdo()->lastInsertId();

            DB::table('payment_transaction')->insert(
                [
                    'booking_id' => $booking_id,
                    'user_id' =>  $user_id,
                    'vendor_id' =>  $vendor_id,
                    'txn_id' => '',
                    'txn_amount' =>  $request->total_amount,
                    'payment_method' => 'COD',
                    'booking_type' => 'Tour',
                    'txn_status' =>  'COD',
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
                $data['order_info'] =  DB::table('tour_booking')
                    ->join('users', 'users.id', '=', 'tour_booking.user_id')
                    ->join('tour_list', 'tour_list.id', '=', 'tour_booking.tour_id')
                    ->where('tour_booking.id', $booking_id)
                    ->where('users.status', 1)
                    ->select('tour_booking.*', 'tour_list.*','tour_booking.id as booki_id', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
                    ->first();

                //$update_payment_status = DB::table('tour_booking_request')->where('user_id', $user_id)->where('tour_id', $bookingtemp->tour_id)->update(['payment_status' => 1]);    

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $users->email;
                    Mail::send('emails.tour-invoice', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to($inData['email']);
                        $message->subject('roadNstyas - Tour Booking Confirmation Mail');
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

                    Mail::send('emails.tour-invoice-reciever', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstyas');
                        $message->to('votivephppushpendra@gmail.com');
                        $message->subject('roadNstyas - New Booking Recieved Mail');
                    });
                }

                // $tourData = DB::table('tour_list')->where('id',$bookingtemp->tour_id)->where('tour_status', 1)->first();
                // $vendor_id = $tourData->vendor_id;
                $vendors = User::where('id', '=', $vendor_id)->get();
                $vendor_counts = count($vendors);
                if (!empty($vendors)) {
                    if ($_SERVER['SERVER_NAME'] != 'localhost') {

                        $data['first_name'] = $vendors['0']->first_name;

                        $data['status'] = 'Booking Tour';

                        $data['booking_id'] = $booking_id;

                        $fromEmail = Helper::getFromEmail();
                        $inData['from_email'] = $fromEmail;
                        $inData['email'] = $vendors['0']->email;
                        Mail::send('emails.tour-invoice-reciever', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstyas');
                            $message->to($inData['email']);
                            $message->subject('roadNstyas - Order assigned');
                        });
                    }
                }
                
                if($check_guest_user === 0){
                    // echo "Nothing need to do";
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
                }  
                
                $response['message'] = "Booking Created Successfully";
                $response['status'] = 1;
                $response['data'] = array('booking_id'=>$booking_id);
                
                if($check_guest_user === 0){
                    // echo "Nothing need to do";
                }else{
                    $response['message'] = "To view your booking Please! do signin into your account after verify your E-mail.";
                    $response['status'] = 1;
                    
                }  
                
            } else {
                $response['message'] = "No data found";
                $response['status'] = 0;
                $response['data'] = array('space_data'=>0);
            }
        }else{
            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('space_data'=>0);
        }

        return $response; 
        
    }

    public function create_event_booking(Request $request){

        
        $user_id =  $request->user_id; 

        $eventData = DB::table('events')->where('id', $request->event_id)->where('status', 1)->first();

        $file = $request->file('front_document_img');
        if(!empty($file)){
            $destinationPath = public_path("uploads");
            $file->move($destinationPath,$file->getClientOriginalName());
            $front_document_img =  $file->getClientOriginalName();
        }else{
            $front_document_img = "";
        }

        $back_document_img = $request->file('back_document_img');
        
        
        if(!empty($back_document_img)){
            $destinationPath_back_img = public_path("uploads");
            $back_document_img->move($destinationPath_back_img,$back_document_img->getClientOriginalName());
            $back_document_img = $back_document_img->getClientOriginalName();
        }else{
            $back_document_img = "";
        } 
         

        DB::table('guestinfo')->insert(
            [
                'user_id' =>  $eventData->vendor_id,
                'first_name' =>  $request->first_name,
                'last_name' =>  $request->last_name,
                'email' =>  $request->email,
                'event_id'=>$eventData->id,
                'mobile' =>  $request->mobile,
                'document_type' =>  $request->document_type,
                'document_number' =>  $request->document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
                'status' => 1,
                'updated_date' => date('Y-m-d H:i:s'),
                'created_date' =>  date('Y-m-d H:i:s')
            ]
        );

        $guest_user_id = DB::getpdo()->lastInsertId();
        
        $userData = DB::table('guestinfo')->where('id', $guest_user_id)->where('status', 1)->first();
        
        $vendor_id = $eventData->vendor_id;
        
        
        $check_guest_user = 0;

        $uemail = $userData->email;
        $ufirst_name = $userData->first_name;
        $ulast_name = $userData->last_name;
        $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
        $password = "roadnstays@123";
        $password = bcrypt($password);
        if (empty($user_id)) {
            $checkuser = DB::table('users')->where('email', $uemail)->first();
            
            if (!empty($checkuser)) {

                $user_id = $checkuser->id;
                $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
            }else{
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
        

        DB::table('event_booking')->insert(
            [
                'user_id' =>  $user_id,
                'event_id' => $request->event_id,
                'total_amount' =>  $request->total_amount,
                'booking_status' => 'confirmed',
                'payment_status' => 'COD',
                'payment_type' => 'COD',
                'created_at' =>  date('Y-m-d H:i:s')
            ]
        );

        $booking_id = DB::getpdo()->lastInsertId();

        DB::table('payment_transaction')->insert(
            [
                'booking_id' => $booking_id,
                'user_id' =>  $user_id,
                'vendor_id' =>  $vendor_id,
                'txn_id' => '',
                'txn_amount' =>  $request->total_amount,
                'payment_method' => 'COD',
                'booking_type' => 'Tour',
                'txn_status' =>  'COD',
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
            $data['order_info'] =  DB::table('event_booking')
                ->join('users', 'users.id', '=', 'event_booking.user_id')
                ->join('events', 'events.id', '=', 'event_booking.event_id')
                ->where('event_booking.id', $booking_id)
                ->where('users.status', 1)
                ->select('event_booking.*', 'events.*','event_booking.id as booki_id', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
                ->first();

            if ($_SERVER['SERVER_NAME'] != 'localhost') {

                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = $users->email;

                Mail::send('emails.event-invoice', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'roadNstays');
                    $message->to($inData['email']);
                    $message->subject('roadNstyas - Event Booking Confirmation Mail');
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

                Mail::send('emails.event-invoice-reciever', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'roadNstyas');
                    $message->to('admin@gmail.com');
                    $message->subject('roadNstyas - New Event Booking Recieved Mail');
                });
            }

            // $tourData = DB::table('tour_list')->where('id',$bookingtemp->tour_id)->where('tour_status', 1)->first();
            // $vendor_id = $tourData->vendor_id;
            $vendors = User::where('id', '=', $vendor_id)->get();

            //print_r($vendors);die;
            $vendor_counts = count($vendors);
            if (!empty($vendors)) {
                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $data['first_name'] = $vendors['0']->first_name;

                    $data['status'] = 'Booking Event';

                    $data['booking_id'] = $booking_id;

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $vendors['0']->email;
                    Mail::send('emails.event-invoice-reciever', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstyas');
                        $message->to($inData['email']);
                        $message->subject('roadNstyas - Order assigned');
                    });
                }
            }
            $response['message'] = "Booking Created Successfully";
            $response['status'] = 1;
            $response['data'] = array('booking_id'=>$booking_id);
            
            if($check_guest_user === 0){
                // echo "Nothing need to do";
            }else{
                $response['message'] = "To view your booking Please! do signin into your account after verify your E-mail.";
                $response['status'] = 1;
                
            }
        } else {
            $response['message'] = "Booking Unsuccessful";
            $response['status'] = 0;
            $response['data'] = array('booking_data'=>0);
        }
        return $response;

    }


} 