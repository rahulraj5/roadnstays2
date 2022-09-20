<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Validator;
use App\Models\User;
use App\Helpers\Helper;
use Session;

class ScoutController extends Controller
{
    public function scout_list() 
    {
      $data['scoutList'] = DB::table('users')->where('role_id','3')->orderby('created_at', 'DESC')->get();
      return view('admin/scout/scout_list')->with($data);
    }

    public function add_scout(Request $request)
    {
      $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
      return view('admin/scout/add_scout')->with($data);
    }

    // public function add_customer_actions(Request $request)
    // {
    //   // echo "<pre>";print_r($request->all());die;
    //   // $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
    //   // return view('admin/customer/add_customer')->with($data);
    //   return redirect('admin/customer_management');
    // }

    public function submit_scout(Request $request)
    {
        
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $user_country = $request->user_country;
        $user_city = $request->city;
        $address = $request->address;
        $password = $request->password;
        $contact_number = $request->contact_number;
        $landline_number = $request->landline_number;

        if($request->hasFile('profile_picture'))
        {
            $image_name1 = $request->file('profile_picture')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('profile_picture')->getClientOriginalExtension();
            $profile_picture = $filename1.'-'.'profile_picture'.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/profile_img';
            $request->file('profile_picture')->move($path1,$profile_picture);
        }else{
            $profile_picture = '';
        }

        if($request->hasFile('nic_upload'))
        {
            $image_name = $request->file('nic_upload')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('nic_upload')->getClientOriginalExtension();
            $nic_upload = $filename.'-'.'profile_picture'.'-'.time().'.'.$image_ext;
            $path = base_path() . '/public/uploads/profile_img';
            $request->file('nic_upload')->move($path,$nic_upload);
        }else{
            $nic_upload = '';
        }

        if($request->hasFile('contract_upload'))
        {
            $image_name2 = $request->file('contract_upload')->getClientOriginalName();
            $filename2 = pathinfo($image_name2,PATHINFO_FILENAME);
            $image_ext2 = $request->file('contract_upload')->getClientOriginalExtension();
            $contract_upload = $filename2.'-'.'profile_picture'.'-'.time().'.'.$image_ext2;
            $path2 = base_path() . '/public/uploads/profile_img';
            $request->file('contract_upload')->move($path2,$nic_upload);
        }else{
            $contract_upload = '';
        }


        $checkUser = DB::table('users')->where('email', $email)->first();
        if ($checkUser) {
            return response()->json(['status' => 'error', 'msg' => 'Email is already Registered.']);
        } else {
            $vrfn_code = Helper::generateRandomString(6);
            
            $obj = new User;
            $obj->user_type = "scout";
            $obj->first_name = $fname;
            $obj->last_name = $lname;
            $obj->email = $email;
            $obj->user_country = $user_country;
            $obj->user_city = $user_city;
            $obj->address = $address;
            $obj->contact_number = $contact_number;
            $obj->landline_number = $landline_number;
            $obj->password = bcrypt($password);
            $obj->role_id = 3;
            $obj->is_verify_email = 1;
            $obj->is_verify_contact = 0; 
            $obj->profile_pic = $profile_picture;
            $obj->register_by = 'web'; 
            $obj->vrfn_code = $vrfn_code;
            $obj->status = 1;
            $obj->created_at = date('Y-m-d H:i:s');
            $obj->updated_at = date('Y-m-d H:i:s');
            $res = $obj->save();
            $scout_id = $obj->id;

            $scout_details = array(
                'scout_id'=> $scout_id,
                'status'=> $request->status,
                'designation'=> $request->designation,
                'other'=> $request->other,
                'contract_date'=> $request->contract_date,
                'nic'=>$request->nic,
                'nic_upload'=>$nic_upload,
                'contract_upload'=>$contract_upload,
                'basic_salary'=>$request->basic_salary,
                'transport_allowance'=>$request->transport_allowance,
                'other_allowance'=>$request->other_allowance,
                'other_allowance_1'=>$request->other_allowance_1,
                'other_allowance_2'=>$request->other_allowance_2,
                'gross_salary'=>$request->gross_salary,
                'other_benefits'=>$request->other_benefits,
                'hotel_commission'=>$request->hotel_commission,
                'tour_commision'=>$request->tour_commision,
                'space_commission'=>$request->space_commission,
                'event_commission'=>$request->event_commission,
                'created_at'=> date('Y-m-d H:i:s')
            );
            if ($res) { 
                $id = DB::table('scout_details')->insertGetId($scout_details);
                return response()->json(['status' => 'success', 'msg' => 'Scout has been created successfully.']); 
            } else {
                return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']); 
            }
        } 

    }

    public function edit_scout(Request $request){ 
    	$user_id = $request->id;
    	$data['user_info'] = User::find($user_id);
        $data['scout_details'] = DB::table('scout_details')->where('scout_id',$user_id)->first();
        $countries = DB::select('select * from country');
    	return view('admin/scout/edit_scout',["countries"=>$countries])->with($data) ;
    }

    
    public function update_scout(Request $request){

    	$fname = $request->input('fnameu') ;
        $lname = $request->input('lnameu') ;
        $user_id = $request->input('user_id') ;
    	$email = $request->input('emailu') ;
        $user_country = $request->input('user_countryu') ;
        $city = $request->input('cityu') ;
        $address = $request->input('addressu') ;
    	$contact_number = $request->input('contact_numberu') ;
        $landline_number = $request->input('landline_numberu');


        if($request->hasFile('profile_picture'))
        {
            if(!empty($request->old_profile_image))
            {
                $filePath = public_path('uploads/profile_img/'. $request->old_profile_image);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/profile_img/' . $request->old_profile_image;
                    unlink($oldImagePath);
                }
            }
            $image_name1 = $request->file('profile_picture')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('profile_picture')->getClientOriginalExtension();
            $profile_picture = $filename1.'-'.'profile_picture'.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/profile_img';
            $request->file('profile_picture')->move($path1,$profile_picture);
        }else{
            $profile_picture = $request->old_profile_image;
        }



        if($request->hasFile('nic_upload'))
        {
            if(!empty($request->old_nic_upload))
            {
                $filePath = public_path('uploads/profile_img/'. $request->old_nic_upload);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/profile_img/' . $request->old_nic_upload;
                    unlink($oldImagePath);
                }
            }
            $image_name = $request->file('nic_upload')->getClientOriginalName();
            $filename = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext = $request->file('nic_upload')->getClientOriginalExtension();
            $nic_upload = $filename.'-'.'profile_picture'.'-'.time().'.'.$image_ext;
            $path = base_path() . '/public/uploads/profile_img';
            $request->file('old_nic_upload')->move($path,$nic_upload);
        }else{
            $nic_upload = $request->old_nic_upload;
        }


        if($request->hasFile('contract_upload'))
        {
            if(!empty($request->old_contract_upload))
            {
                $filePath = public_path('uploads/profile_img/'. $request->old_contract_upload);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/profile_img/' . $request->old_contract_upload;
                    unlink($oldImagePath);
                }
            }
            $image_name2 = $request->file('contract_upload')->getClientOriginalName();
            $filename2 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext2 = $request->file('profile_picture')->getClientOriginalExtension();
            $contract_upload = $filename2.'-'.'contract_upload'.'-'.time().'.'.$image_ext2;
            $path2 = base_path() . '/public/uploads/profile_img';
            $request->file('contract_upload')->move($path2,$contract_upload);
        }else{
            $contract_upload = $request->old_contract_upload;
        }


    	$userData = User::where('id', $user_id)->first();
    
        $userData->first_name = $fname;
    	$userData->last_name = $lname;
        $userData->email = $email;
        $userData->user_country = $user_country;
        $userData->user_city = $city;
        $userData->address = $address;
    	$userData->contact_number = $contact_number;
        $userData->landline_number = $landline_number;
        $userData->profile_pic = $profile_picture;
    	$userData->updated_at = date('Y-m-d H:i:s');
    	$res = $userData->save();

        $scout_details = array(
            'status'=> $request->status,
            'designation'=> $request->designation,
            'other'=> $request->other,
            'contract_date'=> $request->contract_date,
            'nic'=>$request->nic,
            'nic_upload'=>$nic_upload,
            'contract_upload'=>$contract_upload,
            'basic_salary'=>$request->basic_salary,
            'transport_allowance'=>$request->transport_allowance,
            'other_allowance'=>$request->other_allowance,
            'other_allowance_1'=>$request->other_allowance_1,
            'other_allowance_2'=>$request->other_allowance_2,
            'gross_salary'=>$request->gross_salary,
            'other_benefits'=>$request->other_benefits,
            'hotel_commission'=>$request->hotel_commission,
            'tour_commision'=>$request->tour_commision,
            'space_commission'=>$request->space_commission,
            'event_commission'=>$request->event_commission,
            'created_at'=> date('Y-m-d H:i:s')
        );

        $affected = DB::table('scout_details')
              ->where('scout_id', $user_id)
              ->update($scout_details);

    	if($res){
            return response()->json(['status' => 'success', 'msg' => 'Scout has been updated successfully.']);
    		// session::flash('message', 'User updated succesfully.');
    		// return redirect('admin/customer_management');
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
    		// session::flash('error', 'Somthing went wrong.');
    		// return redirect('admin/customer_management');
    	} 
    }

    public function change_scout_status(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
    	$user = User::find($request->user_id);
        // echo "<pre>";print_r($user);die;
    	$user->status = $request->status;
    	$user->save();

    	return response()->json(['success'=>'Scout status change successfully.']);
    }

    public function delete_scout(Request $request) {
        $user_id = $request->user_id;
        $frame_info = DB::table('users')->where('id',$user_id)->first();
        // echo "<pre>";print_r($frame_info);die;
        if($frame_info->user_type == 'scout')
        {   
            $res = DB::table('users')->where('id', '=', $user_id)->delete();
            $res1 = DB::table('scout_details')->where('scout_id', '=', $user_id)->delete();
            // DB::table('bdc_business')->where('user_id', '=', $user_id)->delete();
            // DB::table('bdc_job')->where('user_id', '=', $user_id)->delete();

            // DB::table('appointmnt')->where('business_user_id', '=', $user_id)->delete();
            // DB::table('bdc_enquiry')->where('user_id', '=', $user_id)->delete();
            // DB::table('business_review')->where('business_user_id', '=', $user_id)->delete();

            // DB::table('applyjob')->where('job_user_id', '=', $user_id)->delete();
            // DB::table('save_job_table')->where('job_user_id', '=', $user_id)->delete();
            // DB::table('job_review')->where('job_user_id', '=', $user_id)->delete();

        }
        // else{
        //     $res = DB::table('users')->where('id', '=', $user_id)->delete();
        // }

        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'Scout has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }

    }

    public function add_scout_rating($scout_id="")
    {
      $data['scout_id'] = $scout_id;
      $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
      return view('admin/scout/add_scout_rating')->with($data);
    }

    public function submit_scout_rating(Request $request)
    {
        $rating = $request->rating;
        $year = $request->year;
        $remarks = $request->remarks;
        $scout_id = $request->scout_id;
        $scout_details = array(
                'scout_id'=> $scout_id,
                'rating' => $rating,
                'year' => $year,
                'remarks' => $remarks,
                'status' => 1,
                'created_at'=> date('Y-m-d H:i:s')
            );
        $id = DB::table('scout_performance_rating')->insertGetId($scout_details);
        if ($id) { 
            return response()->json(['status' => 'success', 'msg' => 'Scout rating has been created successfully.']); 
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']); 
        }
    }

    public function scout_rating_list($scout_id="")
    {   
        $data['scout_id'] = $scout_id;
        $data['scoutRatingList'] = DB::table('scout_performance_rating')->join('users', 'scout_performance_rating.scout_id', '=', 'users.id')->where('scout_performance_rating.scout_id',$scout_id)->get(['scout_performance_rating.*', 'users.first_name', 'users.last_name']);
        //echo "<pre>"; print_r($data);die;
        return view('admin/scout/scout_rating_list')->with($data);
    }

    public function edit_scout_rating(Request $request)
    {
        $id = $request->id;
        $data['scout_rating'] = DB::table('scout_performance_rating')->where('id',$id)->first();
        return view('admin/scout/edit_scout_rating')->with($data);
    }

    public function update_scout_rating(Request $request)
    {
        $id = $request->id;
        $rating = $request->rating;
        $year = $request->year;
        $remarks = $request->remarks;
        $scout_id = $request->scout_id;
        $scout_details = array(
                'scout_id'=> $scout_id,
                'rating' => $rating,
                'year' => $year,
                'remarks' => $remarks,
                'status' => 1,
                'created_at'=> date('Y-m-d H:i:s')
            );
        $id = DB::table('scout_performance_rating')->where('id', $id)
              ->update($scout_details);
        if ($id) { 
            return response()->json(['status' => 'success', 'msg' => 'Scout rating has been updated successfully.']); 
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']); 
        }
    }

    public function delete_scout_rating(Request $request)
    {

        $id = $request->id;
        $frame_info = DB::table('scout_performance_rating')->where('id',$id)->first();
        
        
        if(!empty($frame_info))
        {   
            $res = DB::table('scout_performance_rating')->where('id', '=', $id)->delete();
        }

        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'Scout rating has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }
    }
    public function change_scout_rating_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        
        DB::table('scout_performance_rating')->where('id', $id)
              ->update(['status'=>$status]);

        return response()->json(['success'=>'Scout rating status change successfully.']);
    }

}
