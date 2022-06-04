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

class HotelnStaysController extends Controller
{

    public function hotelAndStays_list() 
    {
      $data['hotelstayList'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'DESC')->get();
      return view('admin/hotel/services/hotelnstays_list')->with($data);
    }

    public function addHotelAndStays(Request $request)
    {
    //   $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
    //   return view('admin/hotel/services/add_hotelnstays')->with($data);
      return view('admin/hotel/services/add_hotelnstays');
    }

    public function submitHotelAndStays(Request $request)
    {
        $hotelstayname = $request->hotelstayname;
        $hotelstaydescription = $request->hotelstaydescription;

        $data = DB::table('H1_Hotel_and_other_Stays')->insert(['stay_type' => $hotelstayname, 'description' => $hotelstaydescription]);

        if ($data) {
            return response()->json(['status' => 'success', 'msg' => 'Item Added successfully.']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
        }

    }

    public function editHotelAndStays(Request $request){
    	$id = base64_decode($request->id);
    	// $id = $request->id;
    	$data['HotelAndStays_info'] = DB::table('H1_Hotel_and_other_Stays')->where('id',$id)->first();
    	// $data['HotelAndStays_info'] = User::find($user_id);
        // $countries = DB::select('select * from country');
    	return view('admin/hotel/services/edit_hotelnstays')->with($data) ;
    }

    
    public function updateHotelAndStays(Request $request)
    {
        $id = $request->id;
        $data = DB::table('H1_Hotel_and_other_Stays')
                    ->where('id', $id)
                    ->update(['stay_type' => $request->hotelstayname,
                            'description' => $request->hotelstaydescription,
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);

    	if($data){
            return response()->json(['status' => 'success', 'msg' => 'Item Updated successfully.']);
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
    	} 
    }

    public function changeHotelAndStaysStatus(Request $request)
    {
    	$user = User::find($request->user_id);
    	$user->status = $request->status;
    	$user->save();

    	return response()->json(['success'=>'User status change successfully.']);
    }

    public function deleteHotelAndStays(Request $request) {
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
