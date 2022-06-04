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
        $email = $request->email;
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
            // $obj->last_name = $lname;
            $obj->email = $email;
            $obj->user_country = $user_country;
            $obj->user_city = $user_city;
            $obj->address = $address;
            $obj->contact_number = $contact_number;
            $obj->password = bcrypt($password);
            $obj->role_id = 2;
            $obj->is_verify_email = 1;
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

    
    public function customer_update(Request $request){

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
}
