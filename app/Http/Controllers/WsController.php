<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Helpers\Helper;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WsController extends Controller
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

        $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->get();
        $hoteldata=array();

        //echo "<pre>";print_r($data);die;
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

            if($value->property_alternate_num){ $property_alternate_num = $value->property_alternate_num; }else{ $property_alternate_num = 0; }
            if($value->hotel_latitude){ $hotel_latitude = $value->hotel_latitude; }else{ $hotel_latitude = 0; }
            if($value->hotel_longitude){ $hotel_longitude = $value->hotel_longitude; }else{ $hotel_longitude = 0; }

            $hoteldata[] = array(

                'hotel_id'=> $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => $property_alternate_num,
                'cat_listed_room_type' => $value->cat_listed_room_type,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' => $value->checkin_time,
                'checkout_time' => $value->checkout_time,
                'stay_price' => $value->stay_price,
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country' => $value->hotel_country,
                'hotel_latitude' => $hotel_latitude,
                'hotel_longitude' => $hotel_longitude,
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
 
            if($value->property_alternate_num){ $property_alternate_num = $value->property_alternate_num; }else{ $property_alternate_num = 0; }

            if($value->hotel_latitude){ $hotel_latitude = $value->hotel_latitude; }else{ $hotel_latitude = 0; }

            if($value->hotel_longitude){ $hotel_longitude = $value->hotel_longitude; }else{ $hotel_longitude = 0; }

            $hoteldata[] = array(

                'hotel_id'=> $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => $property_alternate_num,
                'cat_listed_room_type' => $value->cat_listed_room_type,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' => $value->checkin_time,
                'checkout_time' => $value->checkout_time,
                'stay_price' => $value->stay_price,
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country' => $value->hotel_country,
                'hotel_latitude' => $hotel_latitude,
                'hotel_longitude' => $hotel_longitude,
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
            if($value->room_other_featured_id){ $room_other_featured_id = $value->room_other_featured_id; }else{ $room_other_featured_id = 0; } 
            $hotelamenities[] = array(
                'id'=> $value->id,
                'hotel_id' => $value->hotel_id,
                'amenity_id' => $value->amenity_id,
                'status' => $value->status,
                'created_at' => $value->created_at,
                'amenity_name' => $value->amenity_name,
                'amenity_icon' => $value->amenity_icon,
                'amenity_type' => $value->amenity_type,
                'amenity_type_name' => $value->amenity_type_name,
                'amenity_type_sym' => $value->amenity_type_sym,
                'room_other_featured_id' => $room_other_featured_id,
                'name' => $value->name,
                'amenity_name_type' => $value->amenity_name_type
            ); 
        }
 
        $hotel_room_data = DB::table('room_list')
        ->join('room_gallery', 'room_list.id', '=', 'room_gallery.room_id')
        ->where('room_list.hotel_id', '=', $hotelID) 
        ->where('room_list.status', '=', 1) 
        ->get();  
        $hotelroomdata = array();
        foreach ($hotel_room_data as $key => $value) {          

            $baseurl = url('/public/uploads/room_images/');
            $roomimg = $baseurl.'/'.$value->image;

            if($value->is_guest_allow){ $is_guest_allow = $value->is_guest_allow; }else{ $is_guest_allow = 0; }
            if($value->cleaning_fee_type){ $cleaning_fee_type = $value->cleaning_fee_type; }else{ $cleaning_fee_type = 0; } 
            $hotelroomdata[] = array( 
                'id'=> $value->id,
                'room_types_id' => $value->room_types_id,
                'hotel_id' => $value->hotel_id,
                'name' => $value->name,
                'description' => $value->description,
                'notes' => $value->notes,
                'max_adults' => $value->max_adults,
                'max_childern' => $value->max_childern,
                'number_of_rooms' => $value->number_of_rooms,
                'price_per_night' => $value->price_per_night,
                'price_per_night_7d' => $value->price_per_night_7d,
                'price_per_night_30d' => $value->price_per_night_30d,
                'is_guest_allow' => $is_guest_allow,
                'extra_guest_per_night'=> $value->extra_guest_per_night,
                'type_of_price' => $value->type_of_price,
                'cleaning_fee' => $value->cleaning_fee,
                'cleaning_fee_type' => $cleaning_fee_type,
                'city_fee' => $value->city_fee,
                'bed_type' => $value->bed_type,
                'private_bathroom' => $value->private_bathroom,
                'private_entrance' => $value->private_entrance,
                'optional_services' => $value->optional_services,
                'family_friendly' => $value->family_friendly,
                'outdoor_facilities'=> $value->outdoor_facilities,
                'extra_people' => $value->extra_people,
                'status' => $value->status,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'room_id' => $value->room_id,
                'image' => $roomimg,
                'is_featured' => $value->is_featured
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

        $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->get();
        $hoteldata=array();

        //echo "<pre>";print_r($data);die;
        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id','=',$value->hotel_id)->get();

            $Img=array();
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id'=>$IMG->id,
                    'img_name'=>$IMG->image,
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
                'property_alternate_num' => $value->property_alternate_num,
                'cat_listed_room_type' => $value->cat_listed_room_type,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' => $value->checkin_time,
                'checkout_time' => $value->checkout_time,
                'stay_price' => $value->stay_price,
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country' => $value->hotel_country,
                'hotel_latitude' => $value->hotel_latitude,
                'hotel_longitude' => $value->hotel_longitude,
                'gallary' => $Img
            );
        }
        
        $data['hotel_data'] = $hoteldata;

        if(count($hoteldata)>0){ 
			$response['message'] = "Hotel List";
			$response['status'] = 1;
			$response['data'] = array('hotel-List'=>$hoteldata); 
		}else{ 
			$response['message'] = "No data found";
			$response['status'] = 0;
			$response['data'] = array('hotel-List'=>$hoteldata); 
		} 
		return $response; 
    } 
    
} 