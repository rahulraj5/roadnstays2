<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Validator;
use App\Models\User;
use App\Helpers\Helper;
use Session;

class CustomerController extends Controller
{
    public function index() 
    {
      $data['customerList'] = DB::table('users')->where('role_id','2')->orderby('created_at', 'DESC')->get();
      return view('admin/customer/customer_list')->with($data);
    }

    public function add_customer(Request $request)
    {
      $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
      return view('admin/customer/add_customer')->with($data);
    }

    // public function add_customer_actions(Request $request)
    // {
    //   // echo "<pre>";print_r($request->all());die;
    //   // $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
    //   // return view('admin/customer/add_customer')->with($data);
    //   return redirect('admin/customer_management');
    // }

    public function add_customer_action(Request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $is_verify_email = $request->user_email_verified;
        $user_country = $request->user_country;
        $user_city = $request->city;
        $address = $request->address;
        $password = $request->password;
        $contact_number = $request->contact_number;

        // $validator = Validator::make($request->all(), [
        //     'fname' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'user_country' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'password' => 'required',
        //     'confirm_password' => 'required|same:password',
        //     'contact_number' => 'required,numeric,contact_number',
        //     // 'contact_number' => 'required|numeric|unique:users,contact_number',
        // ]);
        $checkUser = DB::table('users')->where('email', $email)->first();
        // print_r($checkUser);die;
        // if ($validator->fails()) {
        //     // session::flash('error', 'Validation error.');
        //     // return redirect('/admin/customer_management')->withErrors($validator)->withInput(); 
        //     return response()->json(['status' => 'error', 'msg' => 'Please Fill required filed']);
        // }
        if($checkUser) {
            return response()->json(['status' => 'error', 'msg' => 'Email is already Registered.']);
        } else {
            $vrfn_code = Helper::generateRandomString(6);
            
            $obj = new User;
            $obj->user_type = "normal_user";
            $obj->first_name = $fname;
            $obj->last_name = $lname;
            $obj->email = $email;
            $obj->user_country = $user_country;
            $obj->user_city = $user_city;
            $obj->address = $address;
            $obj->contact_number = $contact_number;
            $obj->password = bcrypt($password);
            $obj->role_id = 2;
            $obj->is_verify_email = $is_verify_email;
            $obj->is_verify_contact = 0;
            $obj->wallet_balance = 0;
            $obj->register_by = 'web';
            $obj->vrfn_code = $vrfn_code;
            $obj->status = 1;
            $obj->created_at = date('Y-m-d H:i:s');
            $obj->updated_at = date('Y-m-d H:i:s');
            $res = $obj->save();

            if ($res) {
                $users = User::where('email','=',$email)->first();
                $my_referral_code = Helper::my_simple_crypt($users->id,'e');
                $users->my_referral_code = $my_referral_code;
                $users->save();
                return response()->json(['status' => 'success', 'msg' => 'User has been created successfully.']);
                // session::flash('message', 'User has been created successfully.');
                // return redirect('admin/customer_management');
            } else {
                return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
                // session::flash('error', 'OOPs! Some internal issue occured.');
                // return redirect('admin/customer_management');
            }
        } 

    }

    public function edit_customer(Request $request){
    	// $user_id = base64_decode($request->id);
    	$user_id = $request->id;
    	$data['user_info'] = User::find($user_id);
        $countries = DB::select('select * from country');
    	return view('admin/customer/edit_customer',["countries"=>$countries])->with($data) ;
    }

    
    public function customer_update(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
    	$fname = $request->input('fnameup') ;
        $lname = $request->input('lnameup') ;
        $user_id = $request->input('user_id') ;
    	$email = $request->input('emailup') ;
    	$is_verify_email = $request->input('user_email_verifiedup') ;
        $user_country = $request->input('user_countryup') ;
        $city = $request->input('cityup') ;
        $address = $request->input('addressup') ;
    	$contact_number = $request->input('contact_numberup') ;

    	$userData = User::where('id', $user_id)->first();
    
        $userData->first_name = $fname;
    	$userData->last_name = $lname;
        $userData->email = $email;
        $userData->is_verify_email = $is_verify_email;
        if($request->passwordup){
            $userData->password = bcrypt($request->passwordup);
        }
        $userData->user_country = $user_country;
        $userData->user_city = $city;
        $userData->address = $address;
    	$userData->contact_number = $contact_number;
    	$userData->updated_at = date('Y-m-d H:i:s');
    	$res = $userData->save();

    	if($res){
            return response()->json(['status' => 'success', 'msg' => 'User has been updated successfully.']);
    		// session::flash('message', 'User updated succesfully.');
    		// return redirect('admin/customer_management');
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
    		// session::flash('error', 'Somthing went wrong.');
    		// return redirect('admin/customer_management');
    	} 
    }

    public function change_user_status(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
    	$user = User::find($request->user_id);
        // echo "<pre>";print_r($user);die;
    	$user->status = $request->status;
    	$user->save();

    	return response()->json(['success'=>'User status change successfully.']);
    }

    public function deletecustomer(Request $request) {
        $user_id = $request->user_id;
        $frame_info = DB::table('users')->where('id',$user_id)->first();
        // echo "<pre>";print_r($frame_info);die;
        if($frame_info->user_type == 'normal_user')
        {   
            $res = DB::table('users')->where('id', '=', $user_id)->delete();
            // DB::table('bdc_business')->where('user_id', '=', $user_id)->delete();
            // DB::table('bdc_job')->where('user_id', '=', $user_id)->delete();

            // DB::table('appointmnt')->where('business_user_id', '=', $user_id)->delete();
            // DB::table('bdc_enquiry')->where('user_id', '=', $user_id)->delete();
            // DB::table('business_review')->where('business_user_id', '=', $user_id)->delete();

            // DB::table('applyjob')->where('job_user_id', '=', $user_id)->delete();
            // DB::table('save_job_table')->where('job_user_id', '=', $user_id)->delete();
            // DB::table('job_review')->where('job_user_id', '=', $user_id)->delete();

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

    public function delete_coustomer(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $res = DB::table('hotels')->where('hotel_id', '=', $hotel_id)->first();
        // echo "<pre>";print_r($res);die;
        $getHotelGallery = DB::table('hotel_gallery')->where('hotel_id', '=', $hotel_id)->get();
        $getRoom = DB::table('room_list')->where('hotel_id', '=', $hotel_id)->get();

        if ($res) {
            if(!empty($getHotelGallery))
            {
                foreach($getHotelGallery as $hotelGallery){
                    // echo "<pre>";print_r($hotelGallery);
                    $filePath = public_path('uploads/hotel_gallery/'. $hotelGallery->image);
                    if(file_exists($filePath)){
                        $oldImagePath = './public/uploads/hotel_gallery/' . $hotelGallery->image;
                        unlink($oldImagePath);
                    }
                }
            }

            if(count($getRoom) > 0){
                foreach($getRoom as $room){
                    $getRoomimg = DB::table('room_gallery')->where('room_id', '=', $room->id)->get();
                    
                    if(count($getRoomimg) > 0){
                        foreach($getRoomimg as $roomImg){
                            // echo "<pre>";print_r($roomImg->image);
                            $filePath = public_path('uploads/room_images/'. $roomImg->image);
                            if(file_exists($filePath)){
                                $oldImagePath = './public/uploads/room_images/' . $roomImg->image;
                                unlink($oldImagePath);
                            }
                        }
                    }
                    DB::table('room_gallery')->where('room_id', '=', $room->id)->delete();


                    DB::table('room_amenities')->where('room_id', '=', $room->id)->delete();
                    DB::table('room_services')->where('room_id', '=', $room->id)->delete();
                    DB::table('room_extra_option')->where('room_id', '=', $room->id)->delete();
                    DB::table('room_features')->where('room_id', '=', $room->id)->delete();
                }
            }

            DB::table('hotel_gallery')->where('hotel_id', '=', $hotel_id)->delete();
            DB::table('room_list')->where('hotel_id', '=', $hotel_id)->delete();
            // DB::table('room_gallery')->where('room_id', '=', $room_id)->delete();
            DB::table('hotel_amenities')->where('hotel_id', '=', $hotel_id)->delete();
            DB::table('hotel_services')->where('hotel_id', '=', $hotel_id)->delete();

            DB::table('hotel_service_fee')->where('hotel_id', '=', $hotel_id)->delete();
            DB::table('hotel_extra_price')->where('hotel_id', '=', $hotel_id)->delete();

            DB::table('hotels')->where('hotel_id', '=', $hotel_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }
}
