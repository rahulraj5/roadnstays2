<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated; 
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use DB;
use Session;

class VendorController extends Controller
{
    
    public function add_hotel(Request $request)
    {
        // $value = $request->session()->pull('key', 'lastinsertedid');
        // $value = $request->session()->get('lastinsertedid');
        // echo $value;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
      
      return view('vendor/hotel/add_hotel_test')->with($data);
    }

    public function hotel_list()
    {
        // dd(Auth::user()->id);
        $data['hotelList'] = DB::table('hotels')->where('hotel_user_id',Auth::user()->id)->orderby('created_at', 'DESC')->get();
        return view('vendor/hotel/hotel_list')->with($data);
    }

    public function submit_hotel(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        // $check = $request->entertain_service; 
        // $answers = [];
        // for ($i = 1; $i < count($request->entertain_service); $i++) {
        //     $answers = [
        //         'amenity_idd' => $request->entertain_service[$i]
        //     ];
        // }

        // $acheck = implode(', ', array_keys($request->entertain_service));
        // echo "<pre>";print_r($answers);die;

        if($request->hasFile('hotelVideo'))
        {
            $vfile_name = $request->file('hotelVideo')->getClientOriginalName();
            $filename = pathinfo($vfile_name,PATHINFO_FILENAME);
            $file_ext = $request->file('hotelVideo')->getClientOriginalExtension();
            $hotelVideo = $filename.'-'.time().'.'.$file_ext;
            $path = base_path() . '/public/uploads/hotel_video';
            $request->file('hotelVideo')->move($path,$hotelVideo);
            
        }else{
            $hotelVideo = '';
        }
        if($request->hasFile('hotelGallery'))
        {
            $image_name1 = $request->file('hotelGallery')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('hotelGallery')->getClientOriginalExtension();
            $hotelGallery = $filename1.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/hotel_gallery';
            $request->file('hotelGallery')->move($path1,$hotelGallery);
        }else{
            $hotelGallery = '';
        }

        if($request->hasFile('hotel_document'))
        {
            $image_nam2 = $request->file('hotel_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2,PATHINFO_FILENAME);
            $image_ex2 = $request->file('hotel_document')->getClientOriginalExtension();
            $hotel_document = $filenam2.'-'.time().'.'.$image_ex2;
            $pat2 = base_path() . '/public/uploads/hotel_document';
            $request->file('hotel_document')->move($pat2,$hotel_document);
        }else{
            $hotel_document = '';
        }

        // if($request->hasFile('hotel_notes'))
        // {
        //     $image_name3 = $request->file('hotel_notes')->getClientOriginalName();
        //     $filename3 = pathinfo($image_name3,PATHINFO_FILENAME);
        //     $image_ext3 = $request->file('hotel_notes')->getClientOriginalExtension();
        //     $hotel_notes = $filename3.'-'.time().'.'.$image_ext3;
        //     $path3 = base_path() . '/public/uploads/hotel_notes';
        //     $request->file('hotel_notes')->move($path3,$hotel_notes);
        // }else{
        //     $hotel_notes = '';
        // }

        $adminhotel = new Hotel;
        
        // step 1 
        $adminhotel->hotel_user_id = Auth::user()->id;
        $adminhotel->is_admin = 3;
        $adminhotel->hotel_name = $request->hotelName;
        $adminhotel->hotel_content = $request->summernote;
        $adminhotel->property_contact_name = $request->contact_name;
        $adminhotel->property_contact_num = $request->contact_num;
        $adminhotel->property_alternate_num = $request->alternate_num;

        $adminhotel->cat_listed_room_type = $request->cat_listed_room_type;
        $adminhotel->where_property_listed = $request->where_property_listed;
        $adminhotel->do_you_multiple_hotel = $request->do_you_multiple_hotel;
        $adminhotel->hotel_rating = $request->hotel_rating;

        $adminhotel->scout_id = $request->scout_id;
        $adminhotel->checkin_time = $request->checkin_time;
        $adminhotel->checkout_time = $request->checkout_time;
        $adminhotel->min_day_before_book = $request->min_day_before_book;
        $adminhotel->min_day_stays = $request->min_day_stays;
        
        // $adminhotel->created_at = date('Y-m-d H:i:s');
        $adminhotel->hotel_video = $hotelVideo;
        $adminhotel->hotel_gallery = $hotelGallery;
        $adminhotel->hotel_document = $hotel_document;
        $adminhotel->hotel_notes = $request->hotel_notes;

        // step 2
        $adminhotel->booking_option = $request->booking_option;
        $adminhotel->hotel_address = $request->hotel_address;
        $adminhotel->hotel_latitude = $request->hotel_latitude;
        $adminhotel->hotel_longitude = $request->hotel_longitude;
        $adminhotel->hotel_city = $request->hotel_city;    
        $adminhotel->neighb_area = $request->neighb_area;
        $adminhotel->hotel_country = $request->hotel_country;
        $adminhotel->attraction_name = $request->attraction_name;
        $adminhotel->attraction_content = $request->attraction_content;
        $adminhotel->attraction_distance = $request->attraction_distance;  
        $adminhotel->attraction_type = $request->attraction_type;
        $adminhotel->stay_price = $request->stay_price;
        $adminhotel->extra_price_name = $request->extra_price_name;
        $adminhotel->extra_price = $request->extra_price;
        $adminhotel->extra_price_type = $request->extra_price_type; 
        $adminhotel->service_fee_name = $request->service_fee_name;
        $adminhotel->service_fee = $request->service_fee;
        $adminhotel->service_fee_type = $request->service_fee_type;
        $adminhotel->property_type = $request->property_type; 

        // step 3

        $adminhotel->room_amenities = json_encode($request->entertain_service1); 
        $adminhotel->bathroom_amenities = json_encode($request->extra_service2); 
        $adminhotel->media_tech_amenities = json_encode($request->extra_service3); 
        $adminhotel->food_drink_amenities = json_encode($request->extra_service4); 
        $adminhotel->outdoor_view_amenities = json_encode($request->extra_service5); 
        $adminhotel->accessibility_amenities = json_encode($request->extra_service6); 
        $adminhotel->entertain_family_amenities = json_encode($request->extra_service7); 
        $adminhotel->extra_service_amenities = json_encode($request->extra_service8); 

        $adminhotel->entertain_family_service = json_encode($request->entertain_service); 
        $adminhotel->extra_service = json_encode($request->extra_service); 
        
        $adminhotel->save();
        // $lastinsertid = $adminhotel->id;
        // $request->session()->put('lastinsertedid', $lastinsertid);
        return response()->json(['status' => 'success', 'msg' => 'Hotel Added Successfully']);
    }

    public function add_hotel_test(Request $request)
    {
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
      
        return view('vendor/hotel/add_hotel_test')->with($data);
    }

    public function submit_hotel_test(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        if($request->hasFile('hotelVideo'))
        {
            $vfile_name = $request->file('hotelVideo')->getClientOriginalName();
            $filename = pathinfo($vfile_name,PATHINFO_FILENAME);
            $file_ext = $request->file('hotelVideo')->getClientOriginalExtension();
            $hotelVideo = $filename.'-'.time().'.'.$file_ext;
            $path = base_path() . '/public/uploads/hotel_video';
            $request->file('hotelVideo')->move($path,$hotelVideo);
            
        }else{
            $hotelVideo = '';
        }
        if($request->hasFile('hotelGallery'))
        {
            $image_name1 = $request->file('hotelGallery')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('hotelGallery')->getClientOriginalExtension();
            $hotelGallery = $filename1.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/hotel_gallery';
            $request->file('hotelGallery')->move($path1,$hotelGallery);
        }else{
            $hotelGallery = '';
        }

        if($request->hasFile('hotel_document'))
        {
            $image_nam2 = $request->file('hotel_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2,PATHINFO_FILENAME);
            $image_ex2 = $request->file('hotel_document')->getClientOriginalExtension();
            $hotel_document = $filenam2.'-'.time().'.'.$image_ex2;
            $pat2 = base_path() . '/public/uploads/hotel_document';
            $request->file('hotel_document')->move($pat2,$hotel_document);
        }else{
            $hotel_document = '';
        }

        if($request->hasFile('hotel_notes'))
        {
            $image_name3 = $request->file('hotel_notes')->getClientOriginalName();
            $filename3 = pathinfo($image_name3,PATHINFO_FILENAME);
            $image_ext3 = $request->file('hotel_notes')->getClientOriginalExtension();
            $hotel_notes = $filename3.'-'.time().'.'.$image_ext3;
            $path3 = base_path() . '/public/uploads/hotel_notes';
            $request->file('hotel_notes')->move($path3,$hotel_notes);
        }else{
            $hotel_notes = '';
        }

        $adminhotel = new Hotel;
        
        // step 1 
        $adminhotel->hotel_user_id = Auth::user()->id;
        $adminhotel->is_admin = 3;
        $adminhotel->hotel_name = $request->hotelName;
        $adminhotel->hotel_content = $request->summernote;
        $adminhotel->property_contact_name = $request->contact_name;
        $adminhotel->property_contact_num = $request->contact_num;
        $adminhotel->property_alternate_num = $request->alternate_num;

        $adminhotel->cat_listed_room_type = $request->cat_listed_room_type;
        $adminhotel->where_property_listed = $request->where_property_listed;
        $adminhotel->do_you_multiple_hotel = $request->do_you_multiple_hotel;
        $adminhotel->hotel_rating = $request->hotel_rating;

        $adminhotel->scout_id = $request->scout_id;
        $adminhotel->checkin_time = $request->checkin_time;
        $adminhotel->checkout_time = $request->checkout_time;
        $adminhotel->min_day_before_book = $request->min_day_before_book;
        $adminhotel->min_day_stays = $request->min_day_stays;
        
        // $adminhotel->created_at = date('Y-m-d H:i:s');
        $adminhotel->hotel_video = $hotelVideo;
        $adminhotel->hotel_gallery = $hotelGallery;
        $adminhotel->hotel_document = $hotel_document;
        $adminhotel->hotel_notes = $hotel_notes;

        // step 2
        $adminhotel->booking_option = $request->booking_option;
        $adminhotel->hotel_address = $request->hotel_address;
        $adminhotel->hotel_latitude = $request->hotel_latitude;
        $adminhotel->hotel_longitude = $request->hotel_longitude;
        $adminhotel->hotel_city = $request->hotel_city;    
        $adminhotel->neighb_area = $request->neighb_area;
        $adminhotel->hotel_country = $request->hotel_country;
        $adminhotel->attraction_name = $request->attraction_name;
        $adminhotel->attraction_content = $request->attraction_content;
        $adminhotel->attraction_distance = $request->attraction_distance;  
        $adminhotel->attraction_type = $request->attraction_type;
        $adminhotel->stay_price = $request->stay_price;
        $adminhotel->extra_price_name = $request->extra_price_name;
        $adminhotel->extra_price = $request->extra_price;
        $adminhotel->extra_price_type = $request->extra_price_type; 
        $adminhotel->service_fee_name = $request->service_fee_name;
        $adminhotel->service_fee = $request->service_fee;
        $adminhotel->service_fee_type = $request->service_fee_type;
        $adminhotel->property_type = $request->property_type; 

        // step 3

        $adminhotel->room_amenities = json_encode($request->entertain_service1); 
        $adminhotel->bathroom_amenities = json_encode($request->extra_service2); 
        $adminhotel->media_tech_amenities = json_encode($request->extra_service3); 
        $adminhotel->food_drink_amenities = json_encode($request->extra_service4); 
        $adminhotel->outdoor_view_amenities = json_encode($request->extra_service5); 
        $adminhotel->accessibility_amenities = json_encode($request->extra_service6); 
        $adminhotel->entertain_family_amenities = json_encode($request->extra_service7); 
        $adminhotel->extra_service_amenities = json_encode($request->extra_service8); 

        $adminhotel->entertain_family_service = json_encode($request->entertain_service); 
        $adminhotel->extra_service = json_encode($request->extra_service); 
        
        $adminhotel->save();
        return response()->json(['status' => 'success', 'msg' => 'Hotel Added Successfully']);
    }
    
    public function edit_hotel($id)
    {
        $hotel_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        $data['hotel_info'] = DB::table('hotels')->where('hotel_id',$hotel_id)->first();

        return view('vendor/hotel/edit_hotel_test')->with($data);
    }
    
    public function update_hotel(Request $request) 
    {
        $hotel_id = $request->hotel_id;
        $user_id = Auth::user()->id;

        if($request->hasFile('hotelVideo'))
        {
            $vfile_name = $request->file('hotelVideo')->getClientOriginalName();
            $filename = pathinfo($vfile_name,PATHINFO_FILENAME);
            $file_ext = $request->file('hotelVideo')->getClientOriginalExtension();
            $hotelVideo = $filename.'-'.time().'.'.$file_ext;
            $path = base_path() . '/public/uploads/hotel_video';
            $request->file('hotelVideo')->move($path,$hotelVideo);
            
        }else{
            $hotelVideo = '';
        }

        if($request->hasFile('hotelGallery'))
        {
            $image_name1 = $request->file('hotelGallery')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('hotelGallery')->getClientOriginalExtension();
            $hotelGallery = $filename1.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/hotel_gallery';
            $request->file('hotelGallery')->move($path1,$hotelGallery);
        }else{
            $hotelGallery = '';
        }

        if($request->hasFile('hotel_document'))
        {
            $image_nam2 = $request->file('hotel_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2,PATHINFO_FILENAME);
            $image_ex2 = $request->file('hotel_document')->getClientOriginalExtension();
            $hotel_document = $filenam2.'-'.time().'.'.$image_ex2;
            $pat2 = base_path() . '/public/uploads/hotel_document';
            $request->file('hotel_document')->move($pat2,$hotel_document);
        }else{
            $hotel_document = '';
        }

        // if($request->hasFile('hotel_notes'))
        // {
        //     $image_name3 = $request->file('hotel_notes')->getClientOriginalName();
        //     $filename3 = pathinfo($image_name3,PATHINFO_FILENAME);
        //     $image_ext3 = $request->file('hotel_notes')->getClientOriginalExtension();
        //     $hotel_notes = $filename3.'-'.time().'.'.$image_ext3;
        //     $path3 = base_path() . '/public/uploads/hotel_notes';
        //     $request->file('hotel_notes')->move($path3,$hotel_notes);
        // }else{
        //     $hotel_notes = '';
        // }


        if (!empty($hotel_id)) { 
            DB::table('hotels')

            ->where('hotel_id', $hotel_id)

            ->update([
                'hotel_name' => $request->hotelName,
                'hotel_content' => $request->summernote,
                'property_contact_name' => $request->contact_name,
                'property_contact_num' => $request->contact_num,
                'property_alternate_num' => $request->alternate_num,
                'cat_listed_room_type' => $request->cat_listed_room_type,
                'where_property_listed' => $request->where_property_listed,
                'do_you_multiple_hotel' => $request->do_you_multiple_hotel,
                'hotel_rating' => $request->hotel_rating,
                'scout_id' => $request->scout_id,
                'checkin_time' => $request->checkin_time,
                'checkout_time' => $request->checkout_time,
                'min_day_before_book' => $request->min_day_before_book,
                'min_day_stays' => $request->min_day_stays,

                'hotel_video' => $hotelVideo,
                'hotel_gallery' => $hotelGallery,
                'hotel_document' => $hotel_document,
                'hotel_notes' => $request->hotel_notes,

                // step 2
                'booking_option' => $request->booking_option,
                'hotel_address' => $request->hotel_address,
                'hotel_latitude' => $request->hotel_latitude,
                'hotel_longitude' => $request->hotel_longitude,
                'hotel_city' => $request->hotel_city,
                'neighb_area' => $request->neighb_area,
                'hotel_country' => $request->hotel_country,
                'attraction_name' => $request->attraction_name,
                'attraction_content' => $request->attraction_content,
                'attraction_distance' => $request->attraction_distance,
                'attraction_type' => $request->attraction_type,
                'stay_price' => $request->stay_price,
                'extra_price_name' => $request->extra_price_name,
                'extra_price' => $request->extra_price,
                'extra_price_type' => $request->extra_price_type,
                'service_fee_name' => $request->service_fee_name,
                'service_fee' => $request->service_fee,
                'service_fee_type' => $request->service_fee_type,
                'property_type' => $request->property_type,

                // step 3
                'room_amenities' => json_encode($request->entertain_service1),
                'bathroom_amenities' => json_encode($request->extra_service2),
                'media_tech_amenities' => json_encode($request->extra_service3),
                'food_drink_amenities' => json_encode($request->extra_service4),
                'outdoor_view_amenities' => json_encode($request->extra_service5),
                'accessibility_amenities' => json_encode($request->extra_service6),
                'entertain_family_amenities' => json_encode($request->extra_service7),
                'extra_service_amenities' => json_encode($request->extra_service8),
                
                'entertain_family_service' => json_encode($request->entertain_service),
                'extra_service' => json_encode($request->extra_service),

                'updated_at' => date('Y-m-d H:i:s'),

            ]); 

            return response()->json(['status' => 'success', 'msg' => 'Hotel Updated Successfully']);
        }  
    }

        
    public function edit_hotel_test($id)
    {
        $hotel_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        $data['hotel_info'] = DB::table('hotels')->where('hotel_id',$hotel_id)->first();

        return view('vendor/hotel/edit_hotel_test')->with($data);
    }
    
    public function update_hotel_test(Request $request) 
    {
        $hotel_id = $request->hotel_id;
        $user_id = Auth::user()->id;

        if($request->hasFile('hotelVideo'))
        {
            $vfile_name = $request->file('hotelVideo')->getClientOriginalName();
            $filename = pathinfo($vfile_name,PATHINFO_FILENAME);
            $file_ext = $request->file('hotelVideo')->getClientOriginalExtension();
            $hotelVideo = $filename.'-'.time().'.'.$file_ext;
            $path = base_path() . '/public/uploads/hotel_video';
            $request->file('hotelVideo')->move($path,$hotelVideo);
            
        }else{
            $hotelVideo = '';
        }

        if($request->hasFile('hotelGallery'))
        {
            $image_name1 = $request->file('hotelGallery')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('hotelGallery')->getClientOriginalExtension();
            $hotelGallery = $filename1.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/hotel_gallery';
            $request->file('hotelGallery')->move($path1,$hotelGallery);
        }else{
            $hotelGallery = '';
        }

        if($request->hasFile('hotel_document'))
        {
            $image_nam2 = $request->file('hotel_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2,PATHINFO_FILENAME);
            $image_ex2 = $request->file('hotel_document')->getClientOriginalExtension();
            $hotel_document = $filenam2.'-'.time().'.'.$image_ex2;
            $pat2 = base_path() . '/public/uploads/hotel_document';
            $request->file('hotel_document')->move($pat2,$hotel_document);
        }else{
            $hotel_document = '';
        }

        if($request->hasFile('hotel_notes'))
        {
            $image_name3 = $request->file('hotel_notes')->getClientOriginalName();
            $filename3 = pathinfo($image_name3,PATHINFO_FILENAME);
            $image_ext3 = $request->file('hotel_notes')->getClientOriginalExtension();
            $hotel_notes = $filename3.'-'.time().'.'.$image_ext3;
            $path3 = base_path() . '/public/uploads/hotel_notes';
            $request->file('hotel_notes')->move($path3,$hotel_notes);
        }else{
            $hotel_notes = '';
        }


        if (!empty($hotel_id)) { 
            DB::table('hotels')

            ->where('hotel_id', $hotel_id)

            ->update([
                'hotel_name' => $request->hotelName,
                'hotel_content' => $request->summernote,
                'property_contact_name' => $request->contact_name,
                'property_contact_num' => $request->contact_num,
                'property_alternate_num' => $request->alternate_num,
                'cat_listed_room_type' => $request->cat_listed_room_type,
                'where_property_listed' => $request->where_property_listed,
                'do_you_multiple_hotel' => $request->do_you_multiple_hotel,
                'hotel_rating' => $request->hotel_rating,
                'scout_id' => $request->scout_id,
                'checkin_time' => $request->checkin_time,
                'checkout_time' => $request->checkout_time,
                'min_day_before_book' => $request->min_day_before_book,
                'min_day_stays' => $request->min_day_stays,

                'hotel_video' => $hotelVideo,
                'hotel_gallery' => $hotelGallery,
                'hotel_document' => $hotel_document,
                'hotel_notes' => $hotel_notes,

                // step 2
                'booking_option' => $request->booking_option,
                'hotel_address' => $request->hotel_address,
                'hotel_latitude' => $request->hotel_latitude,
                'hotel_longitude' => $request->hotel_longitude,
                'hotel_city' => $request->hotel_city,
                'neighb_area' => $request->neighb_area,
                'hotel_country' => $request->hotel_country,
                'attraction_name' => $request->attraction_name,
                'attraction_content' => $request->attraction_content,
                'attraction_distance' => $request->attraction_distance,
                'attraction_type' => $request->attraction_type,
                'stay_price' => $request->stay_price,
                'extra_price_name' => $request->extra_price_name,
                'extra_price' => $request->extra_price,
                'extra_price_type' => $request->extra_price_type,
                'service_fee_name' => $request->service_fee_name,
                'service_fee' => $request->service_fee,
                'service_fee_type' => $request->service_fee_type,
                'property_type' => $request->property_type,

                // step 3
                'room_amenities' => json_encode($request->entertain_service1),
                'bathroom_amenities' => json_encode($request->extra_service2),
                'media_tech_amenities' => json_encode($request->extra_service3),
                'food_drink_amenities' => json_encode($request->extra_service4),
                'outdoor_view_amenities' => json_encode($request->extra_service5),
                'accessibility_amenities' => json_encode($request->extra_service6),
                'entertain_family_amenities' => json_encode($request->extra_service7),
                'extra_service_amenities' => json_encode($request->extra_service8),
                
                'entertain_family_service' => json_encode($request->entertain_service),
                'extra_service' => json_encode($request->extra_service),

                'updated_at' => date('Y-m-d H:i:s'),

            ]); 

            return response()->json(['status' => 'success', 'msg' => 'Hotel Updated Successfully']);
        }  
    }
    
    public function delete_hotel(Request $request) {
        $hotel_id = $request->hotel_id;
        // echo "<pre>";print_r($frame_info);die;
        $res = DB::table('hotels')->where('hotel_id', '=', $hotel_id)->delete();

        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }
    }

    public function change_hotel_status(Request $request)
    {
        $hotel_id = $request->hotel_id;

        if(!empty($hotel_id)) { 
            DB::table('hotels')
            ->where('hotel_id', $hotel_id)
            ->update([
                'hotel_status' => $request->status
            ]);
        }    
    	return response()->json(['success'=>'status change successfully.']);
    }

    public function hotel_rooms_list($id)
    {   

        $hotel_id = $id;
        $data['room_list'] = DB::table('room_list')->where('hotel_id',$hotel_id)->orderby('created_at', 'DESC')->get();
        return view('vendor/room/room_list')->with($data);
    }
}
