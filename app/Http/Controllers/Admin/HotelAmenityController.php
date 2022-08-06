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
        // $other_featured_id = json_encode($request->otherFeaturedId); 
        $amenity_type_name = DB::table('amenities_type')->where('id',$hotelAmenity_type_id)->value('name');

        $amenity_type_sym = str_replace(' ', '_', $amenity_type_name);

        $data = DB::table('H2_Amenities')->insert(['amenity_name' => trim($hotelAmenityName),
                                                    'amenity_type' => $hotelAmenity_type_id,
                                                    // 'room_other_featured_id' => $other_featured_id,
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

    
    public function updateHotelAmenity(Request $request)
    {
        $id = $request->id;
        $hotelAmenityName = $request->hotelAmenityName;
        $hotelAmenity_type_id = $request->hotelAmenity_type_id;
        // $other_featured_id = json_encode($request->otherFeaturedId); 
        $amenity_type_name = DB::table('amenities_type')->where('id',$hotelAmenity_type_id)->value('name');

        $amenity_type_sym = str_replace(' ', '_', $amenity_type_name);

        $data = DB::table('H2_Amenities')
                    ->where('amenity_id', $id)
                    ->update(['amenity_name' => trim($hotelAmenityName),
                            'amenity_type' => $hotelAmenity_type_id,
                            'amenity_type_name' => trim($amenity_type_name),
                            'amenity_type_sym' => $amenity_type_sym,
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);

    	if($data){
            return response()->json(['status' => 'success', 'msg' => 'Item Updated successfully.']);
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
    	} 
    }

    public function changeHotelAmenityStatus(Request $request)
    {
    	// $user = DB::find($request->amenity_id);
    	// $user->status = $request->status;
    	// $user->save();
        $id = $request->amenity_id;
        if(!empty($id)) { 
            DB::table('H2_Amenities')
            ->where('amenity_id', $id)
            ->update([
                'status' => $request->status
            ]);
        }    

    	return response()->json(['success'=>'User status change successfully.']);
    }

    public function deleteHotelAmenity(Request $request) {
        $amenity_id = $request->amenity_id;
        
        $res = DB::table('H2_Amenities')->where('amenity_id', '=', $amenity_id)->delete();
       

        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }

    }









    public function hotelAmenityType_list() 
    {
        $data['hotelAmenityType_list'] = DB::table('amenities_type')->orderby('id', 'DESC')->get();
        return view('admin/hotel/services/hotelamenity_type_list')->with($data);
    }

    public function addHotelAmenityType(Request $request)
    {
        return view('admin/hotel/services/add_hotelamenity_type');
    }

    public function submitHotelAmenityType(Request $request)
    {
        $data = DB::table('amenities_type')->insert(['name' => trim($request->hotelAmenityTypeName)]);
        if ($data) {
            return response()->json(['status' => 'success', 'msg' => 'Item Added successfully.']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
        }
    }

    public function editHotelAmenityType(Request $request){
    	$id = base64_decode($request->id);
        $data['hotelAmenityType_info'] = DB::table('amenities_type')->where('id',$id)->first();
    	return view('admin/hotel/services/edit_hotelamenity_type')->with($data) ;
    }
    
    public function updateHotelAmenityType(Request $request)
    {
        $id = $request->id;
    	$res = DB::table('amenities_type')->where('id', $id)->update([
                                    'name' => $request->hotelAmenityTypeName,
                                    ]);
    	if($res){
            return response()->json(['status' => 'success', 'msg' => 'updated successfully.']);
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'You have not changed any value.']);
    	} 
    }

    public function view_hotel_amenity_list($id)
    {
        // dd($data['hotelAmenityList']);
        $data['hotelAmenityList'] = DB::table('H2_Amenities')->where('amenity_type',$id)->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')->get(['H2_Amenities.*', 'amenities_type.name']);
        // $data['hotelAmenityList'] = DB::table('H2_Amenities')->where('amenity_type',$id)->orderby('amenity_type_name', 'ASC')->get();
        
        return view('admin/hotel/services/view_hotelamenities_list')->with($data);
    }

    public function changeHotelAmenityTypeStatus(Request $request)
    { 
        $id = $request->amenity_id;
        if(!empty($id)) { 
            DB::table('amenities_type')
            ->where('id', $id)
            ->update([
                'status' => $request->status
            ]);
        }    
    	return response()->json(['success'=>'status change successfully.']);
    }

    public function deleteHotelAmenityType(Request $request) {
        $amenity_id = $request->amenity_id;
        $res = DB::table('amenities_type')->where('id', '=', $amenity_id)->delete();
        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }

    }
}
