<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Validator;
use App\Models\User;
use App\Helpers\Helper;
use Session;

class ServiceproviderController extends Controller
{
    public function service_provider_list() 
    {
      $data['serviceproList'] = DB::table('users')->where('role_id','4')->orderby('created_at', 'DESC')->get();
      return view('admin/servicepro/servicepro_list')->with($data);
    }

    public function add_serv_provider(Request $request)
    {
      $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
      return view('admin/servicepro/add_servicepro')->with($data);
    }

    // public function add_customer_actions(Request $request)
    // {
    //   // echo "<pre>";print_r($request->all());die;
    //   // $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
    //   // return view('admin/customer/add_customer')->with($data);
    //   return redirect('admin/customer_management');
    // }

    public function submit_serv_provider(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $user_country = $request->user_country;
        $user_city = $request->city;
        $address = $request->address;
        $password = $request->password;
        $contact_number = $request->contact_number;
        // $validator = Validator::make($request->all(), [
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'user_country' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'password' => 'required',
        //     'confirm_password' => 'required|same:password',
        //     'contact_number' => 'required|numeric|unique:users,contact_number',
        // ]);
        // if ($validator->fails()) {
        //     // session::flash('error', 'Validation error.');
        //     // return redirect('/admin/customer_management')->withErrors($validator)->withInput(); 
        //     return response()->json(['status' => 'error', 'msg' => 'Please Fill required filed']);
        // }
        $checkUser = DB::table('users')->where('email', $email)->first();
        if ($checkUser) {
            return response()->json(['status' => 'error', 'msg' => 'Email is already Registered.']);
        } else {
            $vrfn_code = Helper::generateRandomString(6);
            
            $obj = new User;
            $obj->user_type = "service_provider";
            $obj->first_name = $fname;
            $obj->last_name = $lname;
            $obj->email = $email;
            $obj->user_country = $user_country;
            $obj->user_city = $user_city;
            $obj->address = $address;
            $obj->num_dialcode_1 = $request->country_dialcode;
            $obj->country_iso2_code1 = $request->countryCode;
            $obj->contact_number = $contact_number;
            $obj->password = bcrypt($password);
            $obj->role_id = 4;
            $obj->is_verify_email = 1;
            $obj->is_verify_contact = 0;
            $obj->wallet_balance = 0;
            $obj->register_by = 'web';
            $obj->vrfn_code = $vrfn_code;

            $obj->landline_number = $request->landline_number;
            $obj->about_me = $request->about_me;
            $obj->i_speak = $request->i_speak;
            $obj->payment_info = $request->payment_info;

            $obj->tour_op_img = $request->tour_operator_img;
            $obj->tour_op_id_front_img = $request->tour_operator_id_front_img;
            $obj->tour_op_id_back_img = $request->tour_operator_id_back_img;
            $obj->tour_op_id_number = $request->tour_operator_id_number;

            $obj->tour_op_name = $request->tour_operator_name;
            $obj->tour_op_contact_name = $request->tour_operator_contact_name;

            $obj->num_dialcode_2 = $request->country_dialcode1;
            $obj->country_iso2_code2 = $request->countryCode1;
            $obj->tour_op_contact_num = $request->tour_operator_contact_num;
            $obj->tour_op_email = $request->tour_operator_email;

            $obj->num_dialcode_3 = $request->country_dialcode2;
            $obj->country_iso2_code3 = $request->countryCode2;
            $obj->tour_op_booking_num = $request->tour_operator_booking_num;

            $obj->tour_office_address = $request->tour_office_address;
            $obj->tour_op_instagram = $request->tour_operator_instagram;
            $obj->tour_op_facebook = $request->tour_operator_facebook;
            $obj->tour_op_web_add = $request->tour_operator_web_add;
            $obj->tour_op_tiktok = $request->tour_operator_tiktok;
            $obj->tour_op_youtube = $request->tour_operator_youtube;
            $obj->tour_op_bank_name = $request->tour_operator_bank_name;
            $obj->tour_op_account_title = $request->tour_operator_account_title;
            $obj->tour_op_account_num = $request->tour_operator_account_num;
            $obj->tour_op_branch = $request->tour_operator_branch;
            $obj->tour_op_easypaisa_num = $request->tour_operator_easypaisa_num;
            $obj->tour_op_easypaisa_name = $request->tour_operator_easypaisa_name;
            $obj->tour_op_jazzcash_num = $request->tour_operator_jazzcash_num;
            $obj->tour_op_jazzcash_name = $request->tour_operator_jazzcash_name;
            $obj->tour_op_notes = $request->tour_operator_notes;
            // $obj->tour_contract_date = date('Y-m-d', strtotime($request->contract_date));
            if(!empty($request->contract_date)){
                $tour_contract_date = date('Y-m-d', strtotime($request->contract_date));
            }else{
                $tour_contract_date = NULL;
            }
            $obj->tour_contract_date = $tour_contract_date;
            $obj->tour_contract_terms = $request->tour_operator_terms;

            $obj->status = 1;
            $obj->created_at = date('Y-m-d H:i:s');
            $obj->updated_at = date('Y-m-d H:i:s');

            // 1. Document upload
            if ($request->hasFile('tour_operator_document')) {
                $image_nam2 = $request->file('tour_operator_document')->getClientOriginalName();
                $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
                $image_ex2 = $request->file('tour_operator_document')->getClientOriginalExtension();
                $tour_operator_document = $filenam2 . '-' . time() . '.' . $image_ex2;
                $pat2 = base_path() . '/public/uploads/vendor_document';
                $request->file('tour_operator_document')->move($pat2, $tour_operator_document);
            } else {
                $tour_operator_document = '';
            }
            $obj->tour_op_document = $tour_operator_document;

            // 2. image upload
            if ($request->hasFile('tour_operator_img')) {
                $image_nam2 = $request->file('tour_operator_img')->getClientOriginalName();
                $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
                $image_ex2 = $request->file('tour_operator_img')->getClientOriginalExtension();
                $tour_operator_img = $filenam2 . '-' . time() . '.' . $image_ex2;
                $pat2 = base_path() . '/public/uploads/vendor_document/img';
                $request->file('tour_operator_img')->move($pat2, $tour_operator_img);
            } else {
                $tour_operator_img = '';
            }
            $obj->tour_op_img = $tour_operator_img;

            // 3. id front image upload
            if ($request->hasFile('tour_operator_id_front_img')) {
                if(!empty($request->old_id_front_img))
                $image_nam2 = $request->file('tour_operator_id_front_img')->getClientOriginalName();
                $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
                $image_ex2 = $request->file('tour_operator_id_front_img')->getClientOriginalExtension();
                $tour_operator_id_front_img = $filenam2 . '-' . time() . '.' . $image_ex2;
                $pat2 = base_path() . '/public/uploads/vendor_document/img';
                $request->file('tour_operator_id_front_img')->move($pat2, $tour_operator_id_front_img);
            } else {
                $tour_operator_id_front_img = '';
            }
            $obj->tour_op_id_front_img = $tour_operator_id_front_img;

            // 4. id back image upload
            if ($request->hasFile('tour_operator_id_back_img')) {
                $image_nam2 = $request->file('tour_operator_id_back_img')->getClientOriginalName();
                $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
                $image_ex2 = $request->file('tour_operator_id_back_img')->getClientOriginalExtension();
                $tour_operator_id_back_img = $filenam2 . '-' . time() . '.' . $image_ex2;
                $pat2 = base_path() . '/public/uploads/vendor_document/img';
                $request->file('tour_operator_id_back_img')->move($pat2, $tour_operator_id_back_img);
            } else {
                $tour_operator_id_back_img = '';
            }
            $obj->tour_op_id_back_img = $tour_operator_id_back_img;

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

    public function edit_serv_provider(Request $request){
    	// $user_id = base64_decode($request->id);
    	$user_id = $request->id;
    	// $data['user_info'] = User::find($user_id)->join('vendor_profile', 'user.id', 'vendor_profile.user_id');
    	$data['user_info'] = DB::table('users')->where('id', $user_id)
                                    ->join('vendor_profile', 'users.id', 'vendor_profile.user_id')
                                    ->first();
        // echo "<pre>";print_r($data['user_info']);die;                                    
        $countries = DB::select('select * from country');
    	return view('admin/servicepro/edit_servicepro',["countries"=>$countries])->with($data) ;
    }

    
    public function update_serv_provider(Request $request){

    	$fname = $request->input('fnameup') ;
        $lname = $request->input('lnameup') ;
        $user_id = $request->input('user_id') ;
    	$email = $request->input('emailup') ;
        $user_country = $request->input('user_countryup') ;
        $city = $request->input('cityup') ;
        $address = $request->input('addressup') ;
    	$contact_number = $request->input('contact_numberup') ;

    	$userData = User::where('id', $user_id)->first();
        $userData->first_name = $fname;
    	$userData->last_name = $lname;
        if($request->passwordup){
            $userData->password = bcrypt($request->passwordup);
        }
        $userData->email = $email;
        $userData->user_country = $user_country;
        $userData->user_city = $city;
        $userData->address = $address;
        $userData->num_dialcode_1 = $request->country_dialcode;
        $userData->country_iso2_code1 = $request->countryCode;
    	$userData->contact_number = $contact_number;
    	$userData->updated_at = date('Y-m-d H:i:s');

        $userData->landline_number = $request->landline_number;
        $userData->about_me = $request->about_me;
        $userData->i_speak = $request->i_speak;
        $userData->payment_info = $request->payment_info;
        $userData->tour_op_id_number = $request->tour_operator_id_number;

        $userData->tour_op_name = $request->tour_operator_name;
        $userData->tour_op_contact_name = $request->tour_operator_contact_name;
        $userData->num_dialcode_2 = $request->country_dialcode1;
        $userData->country_iso2_code2 = $request->countryCode1;
        $userData->tour_op_contact_num = $request->tour_operator_contact_num;
        $userData->tour_op_email = $request->tour_operator_email;
        $userData->num_dialcode_3 = $request->country_dialcode2;
        $userData->country_iso2_code3 = $request->countryCode2;
        $userData->tour_op_booking_num = $request->tour_operator_booking_num;
        $userData->tour_office_address = $request->tour_office_address;
        $userData->tour_op_instagram = $request->tour_operator_instagram;
        $userData->tour_op_facebook = $request->tour_operator_facebook;
        $userData->tour_op_web_add = $request->tour_operator_web_add;
        $userData->tour_op_tiktok = $request->tour_operator_tiktok;
        $userData->tour_op_youtube = $request->tour_operator_youtube;
        $userData->tour_op_bank_name = $request->tour_operator_bank_name;
        $userData->tour_op_account_title = $request->tour_operator_account_title;
        $userData->tour_op_account_num = $request->tour_operator_account_num;
        $userData->tour_op_branch = $request->tour_operator_branch;
        $userData->tour_op_easypaisa_num = $request->tour_operator_easypaisa_num;
        $userData->tour_op_easypaisa_name = $request->tour_operator_easypaisa_name;
        $userData->tour_op_jazzcash_num = $request->tour_operator_jazzcash_num;
        $userData->tour_op_jazzcash_name = $request->tour_operator_jazzcash_name;
        $userData->tour_op_notes = $request->tour_operator_notes;
        if(!empty($request->contract_date)){
            $tour_contract_date = date('Y-m-d', strtotime($request->contract_date));
        }else{
            $tour_contract_date = NULL;
        }
        $userData->tour_contract_date = $tour_contract_date;
        // $userData->tour_contract_date = date('Y-m-d', strtotime($request->contract_date));
        $userData->tour_contract_terms = $request->tour_operator_terms;

        // 1. document upload
        if ($request->hasFile('tour_operator_document')) {
            if(!empty($request->old_vendor_document))
            {
                $filePath = public_path('uploads/vendor_document/'. $request->old_vendor_document);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/vendor_document/' . $request->old_vendor_document;
                    unlink($oldImagePath);
                }
            }
            $image_nam2 = $request->file('tour_operator_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('tour_operator_document')->getClientOriginalExtension();
            $tour_operator_document = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/vendor_document';
            $request->file('tour_operator_document')->move($pat2, $tour_operator_document);
        } else {
            $tour_operator_document = $request->old_vendor_document;
        }
        $userData->tour_op_document = $tour_operator_document;

        // 2. image upload
        if ($request->hasFile('tour_operator_img')) {
            if(!empty($request->old_operator_img))
            {
                $filePath = public_path('uploads/vendor_document/img/'. $request->old_operator_img);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/vendor_document/img/' . $request->old_operator_img;
                    unlink($oldImagePath);
                }
            }
            $image_nam2 = $request->file('tour_operator_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('tour_operator_img')->getClientOriginalExtension();
            $tour_operator_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/vendor_document/img';
            $request->file('tour_operator_img')->move($pat2, $tour_operator_img);
        } else {
            $tour_operator_img = $request->old_operator_img;
        }
        $userData->tour_op_img = $tour_operator_img;

        // 3. id front image upload
        if ($request->hasFile('tour_operator_id_front_img')) {
            if(!empty($request->old_id_front_img))
            {
                $filePath = public_path('uploads/vendor_document/img/'. $request->old_id_front_img);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/vendor_document/img/' . $request->old_id_front_img;
                    unlink($oldImagePath);
                }
            }
            $image_nam2 = $request->file('tour_operator_id_front_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('tour_operator_id_front_img')->getClientOriginalExtension();
            $tour_operator_id_front_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/vendor_document/img';
            $request->file('tour_operator_id_front_img')->move($pat2, $tour_operator_id_front_img);
        } else {
            $tour_operator_id_front_img = $request->old_id_front_img;
        }
        $userData->tour_op_id_front_img = $tour_operator_id_front_img;

        // 4. id back image upload
        if ($request->hasFile('tour_operator_id_back_img')) {
            if(!empty($request->old_id_back_img))
            {
                $filePath = public_path('uploads/vendor_document/img/'. $request->old_id_back_img);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/vendor_document/img/' . $request->old_id_back_img;
                    unlink($oldImagePath);
                }
            }
            $image_nam2 = $request->file('tour_operator_id_back_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('tour_operator_id_back_img')->getClientOriginalExtension();
            $tour_operator_id_back_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/vendor_document/img';
            $request->file('tour_operator_id_back_img')->move($pat2, $tour_operator_id_back_img);
        } else {
            $tour_operator_id_back_img = $request->old_id_back_img;
        }
        $userData->tour_op_id_back_img = $tour_operator_id_back_img;

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

    public function change_serv_provider_status(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
    	$user = User::find($request->user_id);
        // echo "<pre>";print_r($user);die;
    	$user->status = $request->status;
    	$user->save();

    	return response()->json(['success'=>'User status change successfully.']);
    }

    public function delete_serv_provider(Request $request) {
        $user_id = $request->user_id;
        $frame_info = DB::table('users')->where('id',$user_id)->first();
        // echo "<pre>";print_r($frame_info);die;
        if($frame_info->user_type == 'service_provider')
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
