<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

use App\Post;

use Validator,DB;

use App\Models\User;

use App\Models\Hotel;

use App\Helpers\Helper;

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
            'stay_price' => isset($value->stay_price)?$value->stay_price:0,
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
                'tax_percentage' => isset($value->tax_percentage)?$value->tax_percentage:0,
                'price_per_night' => $value->price_per_night,
                'price_per_night_7d' => $value->price_per_night_7d,
                'price_per_night_30d' => $value->price_per_night_30d,
                'is_guest_allow' => isset($value->is_guest_allow)?$value->is_guest_allow:0,
                'extra_guest_per_night'=> isset($value->extra_guest_per_night)?$value->extra_guest_per_night:0, 
                'is_above_guest_cap' => isset($value->is_above_guest_cap)?$value->is_above_guest_cap:0,
                'is_pay_by_num_guest' => isset($value->is_pay_by_num_guest)?$value->is_pay_by_num_guest:0,
                'room_size' => isset($value->room_size)?$value->room_size:0,
                'type_of_price' => isset($value->type_of_price)?$value->type_of_price:"",
                'cleaning_fee' => isset($value->cleaning_fee)?$value->cleaning_fee:0,
                'cleaning_fee_type' => isset($value->cleaning_fee_type)?$value->cleaning_fee_type:"",
                'city_fee' => isset($value->city_fee)?$value->city_fee:0, 
                'city_fee_type' => isset($value->city_fee_type)?$value->city_fee_type:"",
                'earlybird_discount' => isset($value->earlybird_discount)?$value->earlybird_discount:0, 
                'min_days_in_advance' => isset($value->min_days_in_advance)?$value->min_days_in_advance:0, 
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
                'total_tax' => $totaltax,
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
                'tax_percentage' => isset($value->tax_percentage)?$value->tax_percentage:0,
                'price_per_night' => $value->price_per_night,
                'price_per_night_7d' => $value->price_per_night_7d,
                'price_per_night_30d' => $value->price_per_night_30d,
                'is_guest_allow' => isset($value->is_guest_allow)?$value->is_guest_allow:0,
                'extra_guest_per_night'=> isset($value->extra_guest_per_night)?$value->extra_guest_per_night:0, 
                'is_above_guest_cap' => isset($value->is_above_guest_cap)?$value->is_above_guest_cap:0,
                'is_pay_by_num_guest' => isset($value->is_pay_by_num_guest)?$value->is_pay_by_num_guest:0,
                'room_size' => isset($value->room_size)?$value->room_size:0,
                'type_of_price' => isset($value->type_of_price)?$value->type_of_price:"",
                'cleaning_fee' => isset($value->cleaning_fee)?$value->cleaning_fee:0,
                'cleaning_fee_type' => isset($value->cleaning_fee_type)?$value->cleaning_fee_type:"",
                'city_fee' => isset($value->city_fee)?$value->city_fee:0, 
                'city_fee_type' => isset($value->city_fee_type)?$value->city_fee_type:"",
                'earlybird_discount' => isset($value->earlybird_discount)?$value->earlybird_discount:0, 
                'min_days_in_advance' => isset($value->min_days_in_advance)?$value->min_days_in_advance:0, 
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
                'total_night_price' => $ppernight,
                'total_tax' => $totaltax,
                'total_amount' => $totalamount,
                'total_night' =>$days,
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

        $tour_list = DB::table('tour_list')->get(); 


        if(count($tour_list)>0){
        
            $response['message'] = "Tour List";
            $response['status'] = 1;
            $response['data'] = array('tour_list'=>$tour_list);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('tour_list'=>$tour_list);
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

        $validator = Validator::make($request->all(), [

            'tour_id' => 'required'

        ]);

        $tour_id = $request->tour_id;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $tour_data = DB::table('tour_list')->where('id','=',$tour_id)->first();
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
            

            //print_r($trip_detail);die;
            if($tour_data){
            $response['message'] = "Tour Detail";
            $response['status'] = 1;
            $response['data'] = array('tour_data'=>$tour_data,'tour_itinerary'=>$touritinerary,'tour_gallery'=>$tour_gallery);
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
                    ->where('country_id', 'like', '%' . $destination . '%')
                    ->where('tour_days', 'like', '%' . $duration . '%')
                    ->get(); 


        if(count($tour_list)>0){
        
            $response['message'] = "Tour List";
            $response['status'] = 1;
            $response['data'] = array('tour_list'=>$tour_list);

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('tour_list'=>$tour_list);
        }
        
        return $response; 
    }
    
} 