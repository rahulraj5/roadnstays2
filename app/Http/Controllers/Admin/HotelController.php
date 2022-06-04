<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated; 
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use DB;
use Session;

class HotelController extends Controller
{

    public function hotel_list()
    {
        // dd(Auth::user()->id);
        $data['hotelList'] = DB::table('hotels')->orderby('created_at', 'DESC')->get();
        return view('admin/hotel/hotel_list')->with($data);
    }

    public function add_hotel(Request $request)
    {
        // $value = $request->session()->pull('key', 'lastinsertedid');
        // $value = $request->session()->get('lastinsertedid');
        // echo $value;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
      
      return view('admin/hotel/add_hotel')->with($data);
    }

    public function submit_hotela(Request $request)
    {
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        if($request->hotelName){
            echo "<pre>";print_r($request->all());die;
        } 

        return view('admin/hotel/add_hotel')->with($data);
    }

    public function submit_hotel(Request $request)
    {
        // $check = $request->entertain_service; 
        // $answers = [];
        // for ($i = 1; $i < count($request->entertain_service); $i++) {
        //     $answers = [
        //         'amenity_idd' => $request->entertain_service[$i]
        //     ];
        // }

        // $acheck = implode(', ', array_keys($request->entertain_service));
        // echo "<pre>";print_r($answers);die;

        // $category_id = $request->category_id;
        // if($request->sub_cat_id){
        //     $sub_cat_id = $request->sub_cat_id;
        // }else{
        //     $sub_cat_id = 0;
        // }
        // $address_type = $request->address_type;

        // if($address_type == 1){
        //     $business_address = $request->business_address;
        //     $business_country = $request->business_country;
        //     $business_city = $request->business_city;
        // }elseif($address_type == 2){
        //     $business_address = $request->business_address1;
        //     $business_country = '';
        //     $business_city = '';
        // }else{
        //     $business_address = '';
        //     $business_country = '';
        //     $business_city = '';
        // }

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
        $adminhotel->is_admin = 1;
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
        // $lastinsertid = $adminhotel->id;
        // $request->session()->put('lastinsertedid', $lastinsertid);
        return response()->json(['status' => 'success', 'msg' => 'Hotel Added Successfully']);
    }

    public function submit_hotel_policy(Request $request)
    {
        echo "<pre>";print_r($request->all());die;
        $lastInsertId = $request->session()->get('lastinsertedid');
        // echo "<pre>";print_r($request->all());die;

        if (!empty($lastInsertId)){ 
            DB::table('hotels')

            ->where('hotel_id', $lastInsertId)

            ->update([
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
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        // $request->session()->put('lastinsertedid', $lastInsertId);
        return response()->json(['status' => 'success','lastInsertId' => $lastInsertId , 'msg' => 'Policy Added Successfully']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Please Fill Hotel Context First']);
        }
    }


    public function submit_hotel_facility_service(Request $request)
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
        
        $adminhotel->hotel_user_id = Auth::user()->id;
        $adminhotel->is_admin = 1;
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
        
        $adminhotel->save();
        $lastinsertid = $adminhotel->id;
        $request->session()->put('lastinsertedid', $lastinsertid);
        return response()->json(['status' => 'success','lastInsertId' => $lastinsertid , 'msg' => 'Hotel Added Successfully']);
    }

    public function edit_hotel($id)
    {
        $hotel_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        $data['hotel_info'] = DB::table('hotels')->where('hotel_id',$hotel_id)->first();

        return view('admin/hotel/edit_hotel')->with($data);

        // $parentcategories = DB::table('categories')->where('cat_parent', '=', 0)->get();
        // $subcategories = DB::table('categories')->where('cat_parent', '!=', 0)->get();
        // // echo "<pre>";print_r($subcategories);die;
        // $busi_listings  = DB::table('bdc_business')->where('business_id', '=', $id)->get();
        // $country = DB::table('country')->get();
        // $data_onview = array(
        //     'busi_listings' => $busi_listings,
        //     "parentcategories"=>$parentcategories,
        //     "id"=>$id,
        //     "subcategories"=>$subcategories,
        //     "country"=>$country
        // );
        // return view('business_user/edit_bussiness_listing')->with($data_onview);
    }

    public function update_hotel(Request $request) 
    {
        $hotel_id = $request->business_id;
        // $category_id = $request->category_id;
        // $sub_cat_id = $request->sub_cat_id;
        // $user_id = Auth::user()->id;

        // if($request->sub_cat_id){
        //     $sub_cat_id = $request->sub_cat_id;
        // }else{
        //     $sub_cat_id = 0;
        // }
        // // print_r($category_id);echo " ";print_r($sub_cat_id);die;

        // $address_type = $request->address_type;

        // if($address_type == 1){
        //     $business_address = $request->business_address;
        //     $business_country = $request->business_country;
        //     $business_city = $request->business_city;
        // }elseif($address_type == 2){
        //     $business_address = $request->business_address1;
        //     $business_country = '';
        //     $business_city = '';
        // }else{
        //     $business_address = '';
        //     $business_country = '';
        //     $business_city = '';
        // }

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
                'user_id' => $user_id,
                'cat_id' => $request->category_id,
                'sub_cat_id' => $sub_cat_id,
                'business_title' => $request->title,
                'business_desc' => $request->description,
                'business_email' => $request->email,
                'business_mobile' => $request->mobile,
                'business_address' => $business_address,
                'business_country' => $business_country,
                'business_city' => $business_city,
                'features_ads' => $request->features_ads,
                'status' => $request->status,
                'address_type' => $address_type,
                'logo_status' => 0,

                'hotel_video' => $hotelVideo,
                'hotel_gallery' => $hotelGallery,
                'hotel_document' => $hotel_document,
                'hotel_notes' => $hotel_notes,
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


}
