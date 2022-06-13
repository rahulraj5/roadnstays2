<?php

namespace App\Http\Controllers\Admin;

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

	  public function room_type_categories()
    {
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        return view('admin/room/room_type_categories')->with($data);
    }

    public function add_room()
    {   

        $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        return view('admin/room/add_room')->with($data);
    }

    public function submit_room(Request $request)
    {
    //   print_r($request->all());die;
       $adminroom = new Room;
       $adminroom->room_types_id = $request->room_type;
       $adminroom->hotel_id = $request->hotel_name;
       $adminroom->name = $request->room_name;
       $adminroom->description   = $request->description;
       $adminroom->notes = $request->notes;
       $adminroom->max_adults = $request->max_adults;
       $adminroom->max_childern = $request->max_childern;
       $adminroom->number_of_rooms = $request->number_of_rooms;
       $adminroom->price_per_night = $request->price_per_night;
       $adminroom->price_per_night_7d = $request->price_per_night_7d;
       $adminroom->price_per_night_30d = $request->price_per_night_30d;
       $adminroom->extra_guest_per_night = $request->extra_guest_per_night;
       $adminroom->cleaning_fee = $request->cleaning_fee;
       $adminroom->city_fee = $request->city_fee;
       $adminroom->type_of_price = $request->type_of_price;
       $adminroom->bed_type = $request->bed_type;
       $adminroom->private_bathroom = $request->private_bathroom;
       $adminroom->private_entrance = $request->private_entrance;
       $adminroom->optional_services = $request->optional_services;
       $adminroom->family_friendly = $request->family_friendly;
       $adminroom->outdoor_facilities = $request->outdoor_facilities;
       $adminroom->extra_people = $request->extra_people;

       $adminroom->room_amenities = json_encode($request->entertain_service1); 
       $adminroom->bathroom_amenities = json_encode($request->extra_service2); 
       $adminroom->media_tech_amenities = json_encode($request->extra_service3); 
       $adminroom->food_drink_amenities = json_encode($request->extra_service4); 
       $adminroom->outdoor_view_amenities = json_encode($request->extra_service5); 
       $adminroom->accessibility_amenities = json_encode($request->extra_service6); 
       $adminroom->entertain_family_amenities = json_encode($request->extra_service7); 
       $adminroom->extra_service_amenities = json_encode($request->extra_service8); 
       $adminroom->entertain_family_service = json_encode($request->entertain_service); 
       $adminroom->extra_service = json_encode($request->extra_service);
       $adminroom->other_room_features = json_encode($request->other_features_id);

       $adminroom->status = 1;
       $adminroom->created_at = date('Y-m-d H:i:s');
       $adminroom->save();
       $room_id = $adminroom->id;
       if(!empty($_FILES["imgupload"]["name"])){
        foreach ($_FILES["imgupload"]["name"] as $key => $error) {
          $imgname = $_FILES["imgupload"]["name"][$key];
          $imgurl="public/uploads/room_images/".time().'_'.$imgname;
          $name = $_FILES["imgupload"]["name"];
          move_uploaded_file( $_FILES["imgupload"]["tmp_name"][$key], "public/uploads/room_images/" .time().'_'.$_FILES['imgupload']['name'][$key]);

          $Img = array(
            'image' =>time().'_'.$imgname,
            'room_id'=>$room_id,
            'is_featured' => 0,
            'status' => 1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
          );
          $up = DB::table('room_gallery')->insert($Img);
        }
      }


       return response()->json(['status' => 'success', 'msg' => 'Room Added Successfully']);
    }

    public function view_room(Request $request)
    {   
        $room_id = base64_decode($request->id);
        $data['room_data'] = DB::table('room_list')
        ->join('hotels', 'room_list.hotel_id', '=', 'hotels.hotel_id')
        ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
        ->select('room_list.*', 'hotels.hotel_name', 'room_type_categories.title as room_type')
        ->where('room_list.id','=',$room_id)->first();
        $data['room_images'] = DB::table('room_gallery')->where('room_id','=',$room_id)->get();
        //echo "<pre>";print_r($data);die;
        return view('admin/room/view_room')->with($data);
    }

    public function edit_room(Request $request)
    {   
        $room_id = base64_decode($request->id);
        $data['room_data'] = DB::table('room_list')->where('id','=',$room_id)->first();
        $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        $data['room_images'] = DB::table('room_gallery')->where('room_id','=',$room_id)->get();
        //echo "<pre>"; print_r($data);die; 
        return view('admin/room/edit_room')->with($data);
    }

    public function delete_room(Request $request) {
        $room_id = $request->id;
        // echo "<pre>";print_r($frame_info);die;
        $res = DB::table('room_list')->where('id', '=', $room_id)->delete();

        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'Room has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }
    }


    public function update_room(Request $request)
    {

      
       $room_id = $request->room_id;

       $room_data = array(
         'room_types_id' => $request->room_type,
         'hotel_id' => $request->hotel_name,
         'name' => $request->room_name,
         'description' => $request->description,
         'notes' => $request->notes,
         'max_adults' => $request->max_adults,
         'max_childern' => $request->max_childern,
         'number_of_rooms' => $request->number_of_rooms,
         'price_per_night' => $request->price_per_night,
         'price_per_night_7d' => $request->price_per_night_7d,
         'price_per_night_30d' => $request->price_per_night_30d,
         'extra_guest_per_night' => $request->extra_guest_per_night,
         'cleaning_fee' => $request->cleaning_fee,
         'city_fee' => $request->city_fee,
         'type_of_price' => $request->type_of_price,
         'bed_type' => $request->bed_type,
         'private_bathroom' => $request->private_bathroom,
         'private_entrance' => $request->private_entrance,
         'optional_services' => $request->optional_services,
         'family_friendly' => $request->family_friendly,
         'outdoor_facilities' => $request->outdoor_facilities,
         'extra_people' => $request->extra_people,
         'status' => 1,
       );

       $roomData = DB::table('room_list')->where('id',$room_id)->update($room_data);

       return response()->json(['status' => 'success', 'msg' => 'Room update Successfully']);
    }


    public function change_room_status(Request $request)
    {
        $id = $request->id;

        if(!empty($id)) { 
            DB::table('room_list')->where('id', $id)->update([
                'status' => $request->status
            ]);
        }    
        return response()->json(['success'=>'status change successfully.']);
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

    public function change_room_type_status(Request $request)
    {
        $id = $request->id;

        if(!empty($id)) { 
            DB::table('room_type_categories')->where('id', $id)->update([
                'status' => $request->status
            ]);
        }    
    	return response()->json(['success'=>'status change successfully.']);
    }


    public function room_name(Request $request)
    {
      $room_type_id = $request->room_type_id;
      $data['room_name_list'] = DB::table('room_name_list')->where('room_type_id', $room_type_id)->orderby('created_at', 'ASC')->get();
        return response()->json($data);
    }

}