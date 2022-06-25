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
        $data['room_list'] = DB::table('room_list')->orderby('created_at', 'ASC')->get();
        return view('admin/room/room_list')->with($data);
    }

    public function hotel_rooms_list($id)
    {
        $hotel_id = base64_decode($id);
        $data['room_list'] = DB::table('room_list')->where('hotel_id', $hotel_id)->orderby('created_at', 'DESC')->get();
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
        $adminroom->bed_type = $request->bed_type;
        $adminroom->private_bathroom = $request->private_bathroom;
        $adminroom->private_entrance = $request->private_entrance;
        $adminroom->optional_services = $request->optional_services;
        $adminroom->family_friendly = $request->family_friendly;
        $adminroom->outdoor_facilities = $request->outdoor_facilities;
        $adminroom->extra_people = $request->extra_people;

        if (!empty($_FILES["imgupload"]["name"][0])) {
            $roommainimgname = $_FILES["imgupload"]["name"][0];
            $hotelmainimgurl = time() . '_' . $roommainimgname;
            move_uploaded_file($_FILES["imgupload"]["tmp_name"][0], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][0]);
        }
        $adminroom->image = $roommainimgname;


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

        return response()->json(['status' => 'success', 'msg' => 'Room Added Successfully', 'hotel_id' => $hotel_id]);
    }

    public function view_room(Request $request)
    {
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
        $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
        //echo "<pre>";print_r($data);die;
        return view('vendor/room/view_room')->with($data);
    }

    public function edit_room(Request $request)
    {
        $room_id = base64_decode($request->id);
        $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
        $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();

        $data['room_name_list'] = DB::table('room_name_list')->orderby('created_at', 'ASC')->get();

        $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
        $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
        $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
        $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
        //echo "<pre>"; print_r($data);die; 
        return view('vendor/room/edit_room')->with($data);
    }

    public function delete_room(Request $request)
    {
        $room_id = $request->room_id;
        $res = DB::table('room_list')->where('id', '=', $room_id)->first();
        if ($res) {
            DB::table('room_gallery')->where('id', '=', $room_id)->delete();
            DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
            DB::table('room_services')->where('room_id', '=', $room_id)->delete();
            DB::table('room_list')->where('id', '=', $room_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Room has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function update_room(Request $request)
    {
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
        $room_data = array(
            'room_types_id' => $request->room_type,
            // 'hotel_id' => $request->hotel_name,
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
            'bed_type' => $request->bed_type,
            'private_bathroom' => $request->private_bathroom,
            'private_entrance' => $request->private_entrance,
            'optional_services' => $request->optional_services,
            'family_friendly' => $request->family_friendly,
            'outdoor_facilities' => $request->outdoor_facilities,
            'extra_people' => $request->extra_people,
            'status' => 1,
        );

        $roomData = DB::table('room_list')->where('id', $room_id)->update($room_data);

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

        return response()->json(['status' => 'success', 'msg' => 'Room update Successfully']);
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

    public function delete_hotel(Request $request)
    {
        $hotel_id = $request->hotel_id;
        // echo "<pre>";print_r($frame_info);die;
        $res = DB::table('hotels')->where('hotel_id', '=', $hotel_id)->delete();

        if ($res) {
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

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
}
