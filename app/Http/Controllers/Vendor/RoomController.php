<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\Room;
use DB;
use Session;

class RoomController extends Controller
{

    public function room_list()
    {
        $data['page_heading_name'] = 'Rooms';
        $data['room_list'] = DB::table('room_list')->orderby('created_at', 'ASC')->get();
        return view('vendor/room/room_list')->with($data);
    }

    public function hotel_rooms_list($id)
    {
        $data['page_heading_name'] = 'Rooms';
        $hotel_id = base64_decode($id);
        // $data['room_list'] = DB::table('room_list')->where('hotel_id', $hotel_id)->orderby('created_at', 'DESC')->get();
        $data['room_list'] = DB::table('room_list')

    	->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
        ->join('hotels', 'room_list.hotel_id', '=', 'hotels.hotel_id')
    	->select('room_list.*',
                'room_type_categories.id as room_type_cat_id',
                'room_type_categories.title as room_type_cat_title',
                'hotels.hotel_name')
        ->orderby('id', 'DESC')        
        ->where('room_list.hotel_id', $hotel_id)
    	->get();
        $data['hotel_id'] = $hotel_id;
        return view('vendor/room/room_list')->with($data);
    }

    public function room_type_categories()
    {
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        return view('admin/room/room_type_categories')->with($data);
    }

    public function add_room($id)
    {
        $data['page_heading_name'] = 'Add Room';
        $hotel_id = base64_decode($id);
        $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        $data['hotel_id'] = $hotel_id;

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['hotel_services'] = DB::table('H3_Services')->orderby('id', 'ASC')->where('status', 1)->get();
        //print_r($data);die;
        return view('vendor/room/add_room')->with($data);
    }

    public function submit_room(Request $request)
    {
        $roomName = $request->room_name;
        $checkRoomName = DB::table('room_list')->where('name', $roomName)->whereNotNull('name')->where('hotel_id',$request->hotel_id)->get();
        $roomNameExist = count($checkRoomName);
        if($roomNameExist == 0){
            $hotel_id = $request->hotel_id;
            // echo "<pre>";print_r($request->all());die;
            $adminroom = new Room;
            $adminroom->room_types_id = $request->room_type;
            $adminroom->hotel_id = $request->hotel_id;

            $adminroom->name = $request->room_name;
            $adminroom->max_adults = $request->max_adults;
            $adminroom->max_childern = $request->max_childern;
            $adminroom->number_of_rooms = $request->number_of_rooms;
            $adminroom->description   = $request->description;
            $adminroom->notes = $request->notes;
            $adminroom->price_per_night = $request->price_per_night;
            $adminroom->type_of_price = $request->type_of_price;
            $adminroom->tax_percentage = $request->tax_percentage;
            $adminroom->price_per_night_7d = $request->price_per_night_7d;
            $adminroom->price_per_night_30d = $request->price_per_night_30d;

            $adminroom->cleaning_fee = $request->cleaning_fee;
            $adminroom->cleaning_fee_type = $request->cleaning_fee_type;
            $adminroom->city_fee = $request->city_fee;
            $adminroom->city_fee_type = $request->city_fee_type;

            $adminroom->earlybird_discount = $request->earlybird_discount;
            $adminroom->min_days_in_advance = $request->min_days_in_advance;

            $adminroom->is_guest_allow = $request->is_guest_allow;
            $adminroom->extra_guest_per_night = $request->extra_guest_per_night;
            $adminroom->is_above_guest_cap = $request->is_above_guest_cap;
            $adminroom->is_pay_by_num_guest = $request->is_pay_by_num_guest;

            $adminroom->room_size = $request->room_size;
            // $adminroom->bed_type = $request->bed_type;
            // $adminroom->num_of_beds = $request->num_of_beds;
            $adminroom->private_bathroom = $request->private_bathroom;
            $adminroom->private_entrance = $request->private_entrance;
            $adminroom->optional_services = $request->optional_services;
            $adminroom->family_friendly = $request->family_friendly;
            $adminroom->outdoor_facilities = $request->outdoor_facilities;
            $adminroom->extra_people = $request->extra_people;

            // if (!empty($_FILES["imgupload"]["name"][0])) {
            //     $roommainimgname = $_FILES["imgupload"]["name"][0];
            //     $hotelmainimgurl = time() . '_' . $roommainimgname;
            //     move_uploaded_file($_FILES["imgupload"]["tmp_name"][0], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][0]);
            // }

            if($request->hasFile('roomFeaturedImg'))
            {
                $image_name1 = $request->file('roomFeaturedImg')->getClientOriginalName();
                $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
                $image_ext1 = $request->file('roomFeaturedImg')->getClientOriginalExtension();
                $roomFeaturedImg = $filename1.'-'.'roomMainImg'.'-'.time().'.'.$image_ext1;
                $path1 = base_path() . '/public/uploads/room_images';
                $request->file('roomFeaturedImg')->move($path1,$roomFeaturedImg);
            }else{
                $roomFeaturedImg = 'default_room_img.jpg';
            }

            $adminroom->image = $roomFeaturedImg;

            $adminroom->status = 1;
            $adminroom->created_at = date('Y-m-d H:i:s');
            $adminroom->save();
            $room_id = $adminroom->id;

            if (!empty($_FILES["imgupload"]["name"])) {
                foreach ($_FILES["imgupload"]["name"] as $key => $error) {
                    $imgname = $_FILES["imgupload"]["name"][$key];
                    $imgurl = "public/uploads/room_images/" . time() . '_' . $imgname;
                    $name = $_FILES["imgupload"]["name"];
                    move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);

                    $Img = array(
                        'image' => time() . '_' . $imgname,
                        'room_id' => $room_id,
                        'is_featured' => 0,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_gallery')->insert($Img);
                }
            }
            if (!empty($request->amenity)) {
                foreach ($request->amenity as $amenity_id) {
                    $ameni = array(
                        'room_id' => $room_id,
                        'amenity_id' => $amenity_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_amenities')->insert($ameni);
                }
            }

            if (!empty($request->services)) {
                foreach ($request->services as $service_id) {
                    $serv = array(
                        'room_id' => $room_id,
                        'room_service_id' => $service_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_services')->insert($serv);
                }
            }

            if (!empty($request->other_features_id)) {
                foreach ($request->other_features_id as $features_id) {
                    $serv = array(
                        'room_id' => $room_id,
                        'feature_id' => $features_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_features')->insert($serv);
                }
            }

            
            // add multiple option
            if (!empty($request->extra[0]['name'])) {
                foreach ($request->extra as $extra_option) {
                    // echo "<pre>";print_r($extra_option['name']);
                    $extra_opt = array(
                        'ext_opt_name' => $extra_option['name'],
                        'ext_opt_price' => $extra_option['price'],
                        'ext_opt_type' => $extra_option['type'],
                        'room_id' => $room_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_extra_option')->insert($extra_opt);
                }
            }

            if (!empty($request->bed[0]['type'])) {
                foreach ($request->bed as $bed_details) {
                    // echo "<pre>";print_r($bed_details['num']);
                    $bed_detail = array(
                        'bed_type' => $bed_details['type'],
                        'bed_number' => $bed_details['num'],
                        'room_id' => $room_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_bed_details')->insert($bed_detail);
                }
            }

            return response()->json(['status' => 'success', 'msg' => 'Room Added Successfully', 'hotel_id' => base64_encode($hotel_id)]);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Room Name Already Exist in Selected Hotel']);
        }    
    }

    public function view_room(Request $request)
    {
        $data['page_heading_name'] = 'Room Details';
        $room_id = base64_decode($request->id);
        $data['room_data'] = DB::table('room_list')
            ->join('hotels', 'room_list.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
            ->select('room_list.*', 'hotels.hotel_name', 'room_type_categories.title as room_type')
            ->where('room_list.id', '=', $room_id)->first();
        $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
        $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
        $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
        $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
        $data['bed_details_option'] = DB::table('room_bed_details')->where('room_id', $room_id)->where('status', 1)->get();
        //echo "<pre>";print_r($data);die;
        return view('vendor/room/view_room')->with($data);
    }

    public function edit_room(Request $request)
    {
        $data['page_heading_name'] = 'Edit Room';
        $room_id = base64_decode($request->id);
        $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
        $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();

        // $data['room_name_list'] = DB::table('room_name_list')->orderby('created_at', 'ASC')->get();
        $data['room_name_list'] = DB::table('room_name_list')->where('room_type_id','=', $data['room_data']->room_types_id)->where('status', '=', 1)->get();

        $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
        $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
        $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
        $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
        $data['bed_details_option'] = DB::table('room_bed_details')->where('room_id', $room_id)->where('status', 1)->get();
        //echo "<pre>"; print_r($data);die; 
        return view('vendor/room/edit_room')->with($data);
    }
    public function update_room(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $roomName = $request->room_name;
        // $checkRoomName = DB::table('room_list')->where('name', $roomName)->where('hotel_id',$request->hotel_name)->where('id','!=',$request->room_id)->get();
        $checkRoomName = DB::table('room_list')->where('name', $roomName)->whereNotNull('name')->where('hotel_id',$request->hotel_name)->where('id','!=',$request->room_id)->get();
        $roomNameExist = count($checkRoomName);
        // echo "<pre>";print_r($roomNameExist);die;
        if($roomNameExist == 0){
            $hotel_id = base64_encode($request->hotel_name);
            // echo "<pre>";print_r($request->extra);die;
            $room_id = $request->room_id;

            if($request->is_guest_allow==1){
                $extra_guest_per_night = $request->extra_guest_per_night;
                $is_above_guest_cap = $request->is_above_guest_cap;
                $is_pay_by_num_guest = $request->is_pay_by_num_guest;
            }else{
                $extra_guest_per_night = 0;
                $is_above_guest_cap = 0;
                $is_pay_by_num_guest = 0;
            }

            if($request->hasFile('roomFeaturedImg'))
            {
                if(!empty($request->old_room_image))
                {
                    $filePath = public_path('uploads/room_images/'. $request->old_room_image);
                    if(file_exists($filePath)){
                        $oldImagePath = './public/uploads/room_images/' . $request->old_room_image;
                        unlink($oldImagePath);
                    }
                }
                $image_name1 = $request->file('roomFeaturedImg')->getClientOriginalName();
                $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
                $image_ext1 = $request->file('roomFeaturedImg')->getClientOriginalExtension();
                $roomFeaturedImg = $filename1.'-'.'roomMainImg'.'-'.time().'.'.$image_ext1;
                $path1 = base_path() . '/public/uploads/room_images';
                $request->file('roomFeaturedImg')->move($path1,$roomFeaturedImg);
            }else{
                $roomFeaturedImg = $request->old_room_image;
            }

            if(!empty($request->old_room_type)){
                $room_type_id = $request->old_room_type;
            }else{
                $room_type_id = $request->room_type;
            }
            
            $room_data = array(
                'room_types_id' => $room_type_id,
                // 'hotel_id' => $request->hotel_name,
                'name' => $request->room_name,
                'image' => $roomFeaturedImg,
                'name' => $request->room_name,
                'max_adults' => $request->max_adults,
                'max_childern' => $request->max_childern,
                'number_of_rooms' => $request->number_of_rooms,
                'description' => $request->description,
                'notes' => $request->notes,
                'price_per_night' => $request->price_per_night,
                'type_of_price' => $request->type_of_price,
                'tax_percentage' => $request->tax_percentage,
                'price_per_night_7d' => $request->price_per_night_7d,
                'price_per_night_30d' => $request->price_per_night_30d,
                'cleaning_fee' => $request->cleaning_fee,
                'cleaning_fee_type' => $request->cleaning_fee_type,
                'city_fee' => $request->city_fee,
                'city_fee_type' => $request->city_fee_type,
                
                'earlybird_discount' => $request->earlybird_discount,
                'min_days_in_advance' => $request->min_days_in_advance,

                'is_guest_allow' => $request->is_guest_allow,
                'extra_guest_per_night' => $extra_guest_per_night,
                'is_above_guest_cap' => $is_above_guest_cap,
                'is_pay_by_num_guest' => $is_pay_by_num_guest,

                'room_size' => $request->room_size,
                // 'bed_type' => $request->bed_type,
                // 'num_of_beds' => $request->num_of_beds,
                'private_bathroom' => $request->private_bathroom,
                'private_entrance' => $request->private_entrance,
                'optional_services' => $request->optional_services,
                'family_friendly' => $request->family_friendly,
                'outdoor_facilities' => $request->outdoor_facilities,
                'extra_people' => $request->extra_people,
                'status' => 1,
            );
            // echo "<pre>";print_r($room_data);die;
            $roomData = DB::table('room_list')->where('id', $room_id)->update($room_data);

            if (!empty($_FILES["imgupload"]["name"])) {
                foreach ($_FILES["imgupload"]["name"] as $key => $error) {
                    $imgname = $_FILES["imgupload"]["name"][$key];
                    $imgurl = "public/uploads/room_images/" . time() . '_' . $imgname;
                    $name = $_FILES["imgupload"]["name"];
                    move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);

                    $Img = array(
                        'image' => time() . '_' . $imgname,
                        'room_id' => $room_id,
                        'is_featured' => 0,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_gallery')->insert($Img);
                }
            }

            if (!empty($request->amenity)) {
                $delPastAmenities = DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
                foreach ($request->amenity as $amenity_id) {
                    $ameni = array(
                        'room_id' => $room_id,
                        'amenity_id' => $amenity_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_amenities')->insert($ameni);
                }
            }

            
            if (!empty($request->services)) {
                DB::table('room_services')->where('room_id', '=', $room_id)->delete();
                foreach ($request->services as $service_id) {
                    $service = array(
                        'room_id' => $room_id,
                        'room_service_id' => $service_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_services')->insert($service);
                }
            }

            
            if (!empty($request->other_features_id)) {
                DB::table('room_features')->where('room_id', '=', $room_id)->delete();
                foreach ($request->other_features_id as $features_id) {
                    $service = array(
                        'room_id' => $room_id,
                        'feature_id' => $features_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_features')->insert($service);
                }
            }

            if (!empty($request->extra[0]['name'])) {
                DB::table('room_extra_option')->where('room_id', '=', $room_id)->delete();
                foreach ($request->extra as $extra_option) {
                    // echo "<pre>";print_r($extra_option['name']);
                    $extra_opt = array(
                        'ext_opt_name' => $extra_option['name'],
                        'ext_opt_price' => $extra_option['price'],
                        'ext_opt_type' => $extra_option['type'],
                        'room_id' => $room_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('room_extra_option')->insert($extra_opt);
                }
            }

            if (!empty($request->bed[0]['type'])) {

                DB::table('room_bed_details')->where('room_id', '=', $room_id)->delete();
              
                if (!empty($request->bed[0]['type'])) {
                    foreach ($request->bed as $bed_details) {
                        $bed_detail = array(
                            'bed_type' => $bed_details['type'],
                            'bed_number' => $bed_details['num'],
                            'room_id' => $room_id,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $up = DB::table('room_bed_details')->insert($bed_detail);
                    }
                }
              }
        
            return response()->json(['status' => 'success', 'msg' => 'Room update Successfully', 'hotel_id' => $hotel_id]);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Room Name Already Exist in Selected Hotel']);
        }     
    }

    // public function delete_room(Request $request)
    // {
    //     $room_id = $request->room_id;
    //     $res = DB::table('room_list')->where('id', '=', $room_id)->first();
    //     if ($res) {
    //         DB::table('room_gallery')->where('id', '=', $room_id)->delete();
    //         DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
    //         DB::table('room_services')->where('room_id', '=', $room_id)->delete();
    //         DB::table('room_list')->where('id', '=', $room_id)->delete();
    //         return json_encode(array('status' => 'success', 'msg' => 'Room has been deleted successfully!'));
    //     } else {
    //         return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
    //     }
    // }

    public function delete_room(Request $request)
    {
        $room_id = $request->room_id;
        $getRoomGallery = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();
        // echo "<pre>";print_r($getRoomGallery);die;
        if(!empty($getRoomGallery))
        {
            foreach($getRoomGallery as $roomGallery){
                // echo "<pre>";print_r($roomGallery);
                $filePath = public_path('uploads/room_images/'. $roomGallery->image);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/room_images/' . $roomGallery->image;
                    unlink($oldImagePath);
                }
            }
        }
        // die;
        $roomGalleryDelete = DB::table('room_gallery')->where('room_id', '=', $room_id)->delete();

        DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
        DB::table('room_extra_option')->where('room_id', '=', $room_id)->delete();
        DB::table('room_features')->where('room_id', '=', $room_id)->delete();
        DB::table('room_services')->where('room_id', '=', $room_id)->delete();
        DB::table('room_bed_details')->where('room_id', '=', $room_id)->delete();

        $res = DB::table('room_list')->where('id', '=', $room_id)->delete();
        DB::table('booking')->where('room_id', '=', $room_id)->delete();
        DB::table('booking_temp')->where('room_id', '=', $room_id)->delete();

        if ($res) {
            return json_encode(array('status' => 'success', 'msg' => 'Room has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function change_room_status(Request $request)
    {
        $id = $request->id;

        if (!empty($id)) {
            DB::table('room_list')->where('id', $id)->update([
                'status' => $request->status
            ]);
        }
        return response()->json(['success' => 'status change successfully.']);
    }

    // public function delete_hotel(Request $request)
    // {
    //     $hotel_id = $request->hotel_id;
    //     // echo "<pre>";print_r($frame_info);die;
    //     $res = DB::table('hotels')->where('hotel_id', '=', $hotel_id)->delete();

    //     if ($res) {
    //         return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
    //     } else {
    //         return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
    //     }
    // }

    public function change_room_type_status(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            DB::table('room_type_categories')->where('id', $id)->update([
                'status' => $request->status
            ]);
        }
        return response()->json(['success' => 'status change successfully.']);
    }

    public function room_name(Request $request)
    {
      $room_type_id = $request->room_type_id;
      $data['room_name_list'] = DB::table('room_name_list')->where('room_type_id', $room_type_id)->orderby('created_at', 'ASC')->get();
        return response()->json($data);
    }
        
    public function delete_room_single_image(Request $request)
	{
        $imageId = $request->id;
        // $hotelID = $request->hotel_id;
        $image_data = DB::table('room_gallery')->where('id', $imageId)->first();
		if ($image_data) {
			$Path = './public/uploads/room_images/' . $image_data->image;
			unlink($Path);
			$image_delete = DB::table('room_gallery')->where('id', '=', $imageId)->delete();
			return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
		}
	}

    public function add_copy_room(Request $request)
	{
        $room_id = $request->room_id;
        if (empty($room_id)) {
            return json_encode(array('status' => 'error', 'msg' => 'Please Select Room to Copy.'));
		} else {
            $get_room_detail = DB::table('room_list')->where('id', '=', $room_id)->first();
            // echo $get_room_detail[0]->id;die;
            $get_room_gallery = DB::table('room_gallery')->where('room_id', '=', $get_room_detail->id)->get();

            $get_room_amenities = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
            $get_room_services = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
            $get_room_features = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();

            // echo count($get_room_gallery);die;

            if (!empty($get_room_detail)) {
                // echo "<pre>";print_r($get_room_detail);die;
                $getid = DB::table('room_list')->insertGetId(array( 
                    'hotel_id'      => $get_room_detail->hotel_id,
                    'max_adults'      => $get_room_detail->max_adults,
                    'max_childern'     => $get_room_detail->max_childern,
                    'number_of_rooms'    => $get_room_detail->number_of_rooms,
                    'description' => $get_room_detail->description,
                    'notes'    => $get_room_detail->notes,
                    'price_per_night'    => $get_room_detail->price_per_night,
                    'type_of_price'    => $get_room_detail->type_of_price,
                    'tax_percentage'    => $get_room_detail->tax_percentage,
                    'price_per_night_7d' => $get_room_detail->price_per_night_7d,
                    'price_per_night_30d'    => $get_room_detail->price_per_night_30d,
                    'cleaning_fee'    => $get_room_detail->cleaning_fee,
                    'cleaning_fee_type'    => $get_room_detail->cleaning_fee_type,
                    'city_fee'    => $get_room_detail->city_fee,
                    'city_fee_type'    => $get_room_detail->city_fee_type,

                    'earlybird_discount'    => $get_room_detail->earlybird_discount,
                    'min_days_in_advance'    => $get_room_detail->min_days_in_advance,
                    'is_guest_allow'    => $get_room_detail->is_guest_allow,
                    'extra_guest_per_night'    => $get_room_detail->extra_guest_per_night,
                    'is_above_guest_cap'    => $get_room_detail->is_above_guest_cap,
                    'is_pay_by_num_guest'    => $get_room_detail->is_pay_by_num_guest,

                    'room_size'    => $get_room_detail->room_size,
                    // 'bed_type'    => $get_room_detail->bed_type,
                    // 'num_of_beds' => $request->num_of_beds,
                    'private_bathroom'    => $get_room_detail->private_bathroom,
                    'private_entrance'    => $get_room_detail->private_entrance,
                    'optional_services'    => $get_room_detail->optional_services,
                    'family_friendly'    => $get_room_detail->family_friendly,
                    'outdoor_facilities'    => $get_room_detail->outdoor_facilities,
                    'extra_people'    => $get_room_detail->extra_people,
                    'status' => 0,
                    'created_at'    => date('Y-m-d H:i:s'),
                ));

                if (!empty($get_room_amenities)) {
                    foreach ($get_room_amenities as $amenity_id) {
                        $ameni = array(
                            'room_id' => $getid,
                            'amenity_id' => $amenity_id,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $up = DB::table('room_amenities')->insert($ameni);
                    }
                }
    
                if (!empty($get_room_services)) {
                    foreach ($get_room_services as $service_id) {
                        $serv = array(
                            'room_id' => $getid,
                            'room_service_id' => $service_id,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $up = DB::table('room_services')->insert($serv);
                    }
                }
    
                if (!empty($get_room_features)) {
                    foreach ($get_room_features as $features_id) {
                        $serv = array(
                            'room_id' => $getid,
                            'feature_id' => $features_id,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $up = DB::table('room_features')->insert($serv);
                    }
                }


                // if ($getid) {
                //     if(count($get_room_gallery) > 0)
                //     {
                //         foreach ($get_room_gallery as $key => $room_gallery) {
                //             //echo "<pre>";print_r($room_gallery->image);
                //             DB::table('room_gallery')->insertGetId(array(
                //                 'room_id'      => $getid,
                //                 'image'     => $room_gallery->image,
                //                 'created_at' => date('Y-m-d H:i:s'),
                //                 'updated_at' => date('Y-m-d H:i:s')
                //             ));
                //         }
                //     }
                // }
                if ($getid) {
                    return json_encode(array('status' => 'success', 'msg' => 'Room Copied Sucessfully !', 'new_room_id' => base64_encode($getid)));
                }

            } else {
                return json_encode(array('status' => 'error', 'msg' => 'Something get wrong.'));
            }
        }
	}

    public function edit_copy_room(Request $request)
    {
        $data['page_heading_name'] = 'Edit Room';
        $room_id = base64_decode($request->id);
        $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
        $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
        $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
        $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
        $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
        $data['bed_details_option'] = DB::table('room_bed_details')->where('room_id', $room_id)->where('status', 1)->get();
        //echo "<pre>"; print_r($data);die;
        // echo "<pre>"; print_r($data['room_features']);die;
        return view('vendor/room/edit_copy_room')->with($data);
    }
}
