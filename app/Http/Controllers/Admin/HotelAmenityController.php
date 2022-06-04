<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated; 
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Scout;
use DB;
use Session;

class HotelAmenityController extends Controller
{
    public function hotelAmenity_list() 
    {
        $data['hotelAmenityList'] = DB::table('H2_Amenities')->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')->get(['H2_Amenities.*', 'amenities_type.name']);
        // echo "<pre>";print_r($users);die;
        // $data['hotelAmenityList'] = DB::table('H2_Amenities')->orderby('amenity_id', 'DESC')->get();
        return view('admin/hotel/services/hotelamenity_list')->with($data);
    }

    public function addHotelAmenity(Request $request)
    {
        $data['amenities_type'] = DB::table('amenities_type')->get();
        return view('admin/hotel/services/add_hotelamenity')->with($data);
    }

    public function clean($string) {
        $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

        // $amenities = DB::table('amenities_type')->where('id',$hotelAmenity_type_id)->value('name');
        // // dd($amenities);
        // // $string = str_replace(' ', '_', $amenities);
        // $string = preg_replace('/[^A-Za-z0-9\-]/', '_', $amenities);
     
        // // return preg_replace('/-+/', '-', $string);

        // dd($string);
    }

    public function submitHotelAmenity(Request $request)
    {
        // dd($request->all());
        $hotelAmenityName = $request->hotelAmenityName;
        $hotelAmenity_type_id = $request->hotelAmenity_type_id;
        $amenity_type_name = DB::table('amenities_type')->where('id',$hotelAmenity_type_id)->value('name');

        $amenity_type_sym = str_replace(' ', '_', $amenity_type_name);

        $data = DB::table('H2_Amenities')->insert(['amenity_name' => trim($hotelAmenityName),
                                                    'amenity_type' => $hotelAmenity_type_id,
                                                    'amenity_type_name' => trim($amenity_type_name),
                                                    'amenity_type_sym' => $amenity_type_sym]);
        if ($data) {
            return response()->json(['status' => 'success', 'msg' => 'Item Added successfully.']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
        }
    }

    public function editHotelAmenity(Request $request){
    	$id = base64_decode($request->id);
    	// $user_id = $request->id;
        $data['amenities_type'] = DB::table('amenities_type')->get();
        $data['hotelAmenity_info'] = DB::table('H2_Amenities')->where('amenity_id',$id)->first();
    	return view('admin/hotel/services/edit_hotelamenity')->with($data) ;
    }

    
    public function updateHotelAmenity(Request $request){

    	$fname = $request->input('fname') ;
        $lname = $request->input('lname') ;
        $user_id = $request->input('user_id') ;
    	$email = $request->input('email') ;
        $user_country = $request->input('user_country') ;
        $city = $request->input('city') ;
        $address = $request->input('address') ;
    	$contact_number = $request->input('contact_number') ;

    	$userData = User::where('id', $user_id)->first();
    
        $userData->first_name = $fname;
    	// $userData->last_name = $lname;
        $userData->email = $email;
        if($request->password){
            $userData->password = bcrypt($request->password);
        }
        $userData->user_country = $user_country;
        $userData->user_city = $city;
        $userData->address = $address;
    	$userData->contact_number = $contact_number;
    	$userData->updated_at = date('Y-m-d H:i:s');
    	$res = $userData->save();

    	if($res){
            return response()->json(['status' => 'success', 'msg' => 'User has been updated successfully.']);
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
    	} 
    }

    public function changeHotelAmenityStatus(Request $request)
    {
    	$user = User::find($request->user_id);
    	$user->status = $request->status;
    	$user->save();

    	return response()->json(['success'=>'User status change successfully.']);
    }

    public function deleteHotelAmenity(Request $request) {
        $user_id = $request->user_id;
        $frame_info = DB::table('users')->where('id',$user_id)->first();
        if($frame_info->user_type == 'normal_user')
        {   
            $res = DB::table('users')->where('id', '=', $user_id)->delete();

        }
        else{
            $res = DB::table('users')->where('id', '=', $user_id)->delete();
        }

        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'User has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }

    }
}
