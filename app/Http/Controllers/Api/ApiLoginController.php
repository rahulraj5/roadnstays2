<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

use App\Post;

use Validator, DB;

use App\Models\User;

use App\Helpers\Helper;

//use Auth;

use Illuminate\Support\Facades\Auth;

use Mail;

use Hash;

class ApiLoginController extends APIBaseController
{

    /**

     * Registration

     *

     * @return \Illuminate\Http\Response

     */
    public function login(Request $request)
    {
        print_r($request->all());
    }

    public function register(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'first_name' => 'required',

            'last_name' => 'required',

            'email' => 'required|unique:users,email',

            'password' => 'required',

            'confirm_password' => 'required|same:password',

            'contact_number' => 'required|numeric|unique:users,contact_number',

            'device_id' => 'required',

            'device_type' => 'required',

            'device_token' => 'required',


        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {


            $name1 = '';

            if ($request->hasFile('profile_image')) {

                $image = $request->file('profile_image');

                $name1 = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/profile_image');

                $imagePath = $destinationPath . '/' .  $name1;

                $image->move($destinationPath, $name1);
            }



            $referral_code = !empty($request->referral_code ? $request->referral_code : '');

            //   $device_id = !empty($request->device_id ? $request->device_id : '');

            //   $device_token = !empty($request->device_token ? $request->device_token : '');

            //   $device_type = !empty($request->device_type ? $request->device_type : '');



            $vrfn_code = Helper::generateRandomString(6);

            $first_name = $request->first_name;

            $last_name = $request->last_name;

            $email = $request->email;

            $password = $request->password;

            $contact_number = $request->contact_number;



            //   $name_arr = explode(' ', $name);

            $device_id = $request->device_id;

            $device_type = $request->device_type;

            $device_token = $request->device_token;


            if (!empty($request->my_referral_code)) {
                $my_referral_code = $request->my_referral_code;
            } else {
                $my_referral_code = "";
            }
            if (!empty($request->user_referral_id)) {
                $user_referral_id = $request->user_referral_id;
            } else {
                $user_referral_id = "";
            }

            


            $obj = new User;

            $obj->user_type = "normal_user";

            $obj->first_name = $first_name;

            $obj->last_name = $last_name;

            $obj->email = $email;

            $obj->contact_number = $contact_number;

            $obj->password = bcrypt($password);

            $obj->role_id = 2;

            $obj->device_id = $device_id;

            $obj->device_token = $device_token;

            $obj->device_type = $device_type;

            $obj->profile_pic      = !empty($name1) ? url('public/uploads/profile_image/') . '/' . $name1 : url('resources/assets/images/blank_user.jpg');

            $obj->is_verify_email = 0;

            $obj->is_verify_contact = 0;

            //   $obj->user_referral_id = $user_referral_id;

            $obj->wallet_balance = 0;

            $obj->register_by = 'web';

            $obj->vrfn_code = $vrfn_code;

            //   $obj->device_id = $vrfn_code;

            //   $obj->device_type = $device_type;

            //   $obj->device_token = $device_token;

            $obj->status = 1;

            $obj->created_at = date('Y-m-d H:i:s');

            $obj->updated_at = date('Y-m-d H:i:s');

            $res = $obj->save();

            $user_id = $obj->id;

            if ($res) {



                $users = User::where('email', '=', $email)->first();

                $my_referral_code = Helper::my_simple_crypt($users->id, 'e');

                //   $users->my_referral_code = $my_referral_code;

                $users->save();



                if (!empty($request->my_referral_code)) {



                    $referral_info = DB::table('users')->where('my_referral_code', $request->my_referral_code)->where('status', 1)->first();

                    $refferal_id = $referral_info->id;



                    DB::table('my_referrals')->insert(

                        [

                            'user_id' =>  $users->id,

                            'referral_code' =>  $request->my_referral_code,

                            'refferal_id' => $refferal_id,

                            'amount' => 0,

                            'status' =>  1,

                            'created_at' =>  date('Y-m-d H:i:s')

                        ]

                    );
                }

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $vrfn_url = url('/') . '/email_verification/' . $vrfn_code . '_' . $users->id;

                    $user_id = $users->id;

                    $fromEmail = Helper::getFromEmail();

                    $inData['from_email'] = $fromEmail;

                    $inData['email'] = $email;


                    $inData['body'] = '';



                    // Mail::send([], [], function ($message) use ($inData) {

                    //     $message->from($inData['from_email'],'FRAMEiT');

                    //     $message->to($inData['email']);

                    //     $message->subject('FRAMEiT - Verification');

                    //     $message->setBody($inData['body'], 'text/html');

                    // });
                    $data = array('user_id' => $user_id, 'name' => "User", 'first_name' => $first_name, 'last_name' => $last_name,'full_url'=>url()->current());
                    Mail::send('emails.signup_template', $data, function ($message) use ($inData) {
                        // Mail::send('emails.signup_email_template', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to($inData['email']);
                        $message->subject('roadNstays - E-mail Verification');
                    });
                }

                $user_new_info = array(
                    "user_id" => $users->id,
                    "user_type" => $users->user_type,
                    "first_name" => $users->first_name,
                    "last_name" => $users->last_name,
                    "email" => $users->email,
                    "contact_number" => $users->contact_number,
                    "role_id" => $users->role_id,
                    "is_verify_email" => $users->is_verify_email,
                    "is_verify_contact" => $users->is_verify_contact,
                    // "my_referral_code"=>$users->my_referral_code,
                    // "user_referral_id"=>$users->user_referral_id,
                    "wallet_balance" => $users->wallet_balance,
                    "profile_pic" => $users->profile_pic,
                    "device_id" => $users->device_id,
                    "device_token" => $users->device_token,
                    "device_type" => $users->device_type
                );


                return $this->sendResponse($user_new_info, 'Account has been created successfully. Please check your email address and please do verify your account!');
            } else {

                return $this->sendError('OOPs! Some internal issue occured.', array(), 200);
            }
        }
    }

    public function changeStatus(Request $request)
    {
        //$current_uri = request()->segments();
       
        $user_id = $request->user_id;
        $full_url = $request->full_url;
        $check_out = $request->check_out;
        $hotel_id = $request->hotel_id;
        $person = $request->person;
        $room_id = $request->room_id;
        $verify_status = DB::update('update users set is_verify_email = 1 where id = ?', [$user_id]);

        if ((!empty($check_out)) && (!(empty($hotel_id))) && (!(empty($person))) && (!(empty($room_id) ))) {
           $base_url_custom = $full_url.'&check_out='.$check_out.'&hotel_id='.$hotel_id.'&person='.$person.'&room_id='.$room_id;
        }else{
            $base_url_custom = $full_url;
        }
        

        //print_r($base_url_custom);die;
        return redirect($base_url_custom);
    }


    public function loginUser(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',

            'password' => 'required',

            //   'device_id' => 'required',

            //   'device_type' => 'required',

            //   'device_token' => 'required'

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {

            $user_obj = User::where('email', '=', $request->email)->first();

            if (!empty($user_obj->id)) {

                $device_id = !empty($request->device_id) ? $request->device_id : '';

                $device_token = !empty($request->device_token) ? $request->device_token : '';

                $device_type = !empty($request->device_type) ? $request->device_type : '';



                $credentials = array(

                    'email' => $request->email,

                    'password' => $request->password

                );



                if (Auth::attempt($credentials)) {

                    if (Auth::user()->role_id == 2) {

                        if (Auth::user()->is_verify_email == 1 || Auth::user()->is_verify_contact == 1) {

                            if (Auth::user()->status == 1) {

                                if (!empty($device_token)) {



                                    $device_credentials = array(

                                        'device_id' => $request->device_id,

                                        'device_token' => $request->device_token,

                                        'device_type' => $request->device_type

                                    );



                                    $updateData = DB::table('users')->where('id', $user_obj->id)->update($device_credentials);
                                }

                                $user_info = Auth::user();

                                $user_new_info = array(
                                    "user_id" => $user_info->id,
                                    "user_type" => $user_info->user_type,
                                    "first_name" => isset($user_info->first_name) ? $user_info->first_name : "",
                                    "last_name" => isset($user_info->last_name) ? $user_info->last_name : "",
                                    "email" => $user_info->email,
                                    "contact_number" => isset($user_info->contact_number) ? $user_info->contact_number : "",
                                    "role_id" => isset($user_info->role_id) ? $user_info->role_id : 0,
                                    "is_verify_email" => isset($user_info->is_verify_email) ? $user_info->is_verify_email : 0,
                                    "is_verify_contact" => isset($user_info->is_verify_contact) ? $user_info->is_verify_contact : 0,
                                    "my_referral_code" => isset($user_info->my_referral_code) ? $user_info->my_referral_code : "",
                                    "user_referral_id" => isset($user_info->user_referral_id) ? $user_info->user_referral_id : "",
                                    "wallet_balance" => isset($user_info->wallet_balance) ? $user_info->wallet_balance : 0,
                                    "profile_pic" => isset($user_info->profile_pic) ? $user_info->profile_pic : "",
                                    "device_id" => isset($user_info->device_id) ? $user_info->device_id : "",
                                    "device_token" => isset($user_info->device_token) ? $user_info->device_token : "",
                                    "device_type" => isset($user_info->device_type) ? $user_info->device_type : ""
                                );

                                return $this->sendResponse($user_new_info, 'You are logged In.!');
                            } else {

                                Auth::logout();

                                return $this->sendError('Your account is inactive. Please contact with administration department.', array(), 200);
                            }
                        } else {

                            Auth::logout();

                            return $this->sendError('Please do verify your account. After that you can do login!', array(), 200);
                        }
                    } else {

                        Auth::logout();

                        return $this->sendError('You have no authority to access in this section.', array(), 200);
                    }
                } else {

                    return $this->sendError('Invalid Credential. Please check and try again.', array(), 200);
                }
            } else {

                return $this->sendError('Email address not registered.', array(), 200);
            }
        }
    }

    public function forgot_password(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email'

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {

            $user_obj = User::where('email', '=', $request->email)->first();

            if (!empty($user_obj->id)) {

                $user_id = $user_obj->id;

                $vrfn_code = Helper::generateRandomString(6);

                $obj_user = User::find($user_id);

                $obj_user->password = bcrypt($vrfn_code);

                $res = $obj_user->save();

                if ($res) {

                    $data['url'] = url('/');

                    $data['email'] = $user_obj->email;

                    $data['password'] = $vrfn_code;

                    $data['first_name'] = $user_obj->first_name;

                    $data['last_name'] = $user_obj->last_name;

                    $data['user_id'] = $user_obj->id;

                    $data['otp'] = random_int(1000, 9999);

                    $inData['email'] = $user_obj->email;

                    DB::update('update users set otp = ? where email = ?', [$data['otp'], $data['email']]);

                    if ($_SERVER['SERVER_NAME'] != 'localhost') {

                        $fromEmail = Helper::getFromEmail();

                        $inData['from_email']     =  $fromEmail;

                        $res1 = Mail::send('emails.forget_password', $data, function ($message) use ($inData) {

                            $message->from($inData['from_email'], 'roadNstays');

                            $message->to($inData['email']);

                            $message->subject('roadNstays - Forgot Password');
                        });
                    }

                    return $this->sendResponse(array(), 'The otp is sended on email. Please verify the OTP!');
                } else {

                    return $this->sendError('Some internal issue occured. Please check and try again.', array(), 200);
                }
            } else {

                return $this->sendError('Email address not registered.', array(), 200);
            }
        }
    }

    public function verifyOTP(Request $request)
    {
        $email = $request->email;
        $otp = $request->otp;

        $validator = Validator::make($request->all(), [

            'otp' => 'required'

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $user_obj = User::where('email', '=', $email)->first();
            if ($user_obj->email == $email and $user_obj->otp == $otp) {
                return $this->sendResponse(array(), 'Your OTP is verified');
            } else {
                return $this->sendError('Incorrect OTP', array(), 200);
            }
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $email = $request->email;
            $new_password = bcrypt($request->new_password);
            $confirm_password = $request->confirm_password;
            $res = DB::update('update users set password = ? where email = ?', [$new_password, $email]);
            if ($res) {
                return $this->sendResponse(array(), 'Your Password is updated successfully');
            } else {
                return $this->sendError('Some internal issue occured. Please check and try again.', array(), 200);
            }
        }
    }

    public function getProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);


        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {

            $user_obj = User::where('id', '=', $request->user_id)->first();

            $user_info = array(
                "user_id" => $request->user_id,
                "user_type" => $user_obj->user_type,
                "first_name" => isset($user_obj->first_name) ? $user_obj->first_name : "",
                "last_name" => isset($user_obj->last_name) ? $user_obj->last_name : "",
                "email" => $user_obj->email,
                "contact_number" => isset($user_obj->contact_number) ? $user_obj->contact_number : "",
                "profile_pic" => isset($user_obj->profile_pic) ? $user_obj->profile_pic : "",
            );

            return $this->sendResponse($user_info, "");
        }
    }

    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required|numeric',
        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $name1 = '';
            $user_obj = User::where('id', '=', $request->user_id)->first();
            if ($request->hasFile('profile_image')) {

                $image = $request->file('profile_image');

                $name1 = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/profile_image');

                $imagePath = $destinationPath . '/' .  $name1;

                $image->move($destinationPath, $name1);
            }
            $user_id = $request->user_id;
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $contact_number = $request->contact_number;
            $email = $request->email;
            $profile_pic      = !empty($name1) ? url('public/uploads/profile_image/') . '/' . $name1 : $user_obj->profile_pic;
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $new_password = bcrypt($request->new_password);

            $res = DB::update('update users set first_name = ?,last_name=?,contact_number=?,profile_pic=? where id = ?', [$first_name, $last_name, $contact_number, $profile_pic, $user_id]);

            $user_obj1 = User::where('id', '=', $request->user_id)->first();
            $user_info = array(
                "user_id" => $user_obj1->id,
                "user_type" => $user_obj1->user_type,
                "first_name" => $user_obj1->first_name,
                "last_name" => $user_obj1->last_name,
                "email" => $user_obj1->email,
                "contact_number" => $user_obj1->contact_number,
                "profile_pic" => $user_obj1->profile_pic,
            );
            return $this->sendResponse($user_info, "Profile Updated Successfully");
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $user_obj = User::where('id', '=', $request->user_id)->first();
            if (!(Hash::check($request->old_password, $user_obj->password))) {
                // The passwords matches
                return $this->sendError('Your current password does not matches with the password you provided. Please try again.', array(), 200);
            }

            if (strcmp($request->get('old_password'), $request->new_password) == 0) {
                //Current password and new password are same
                return $this->sendError('New Password cannot be same as your current password. Please choose a different password.', array(), 200);
            }


            //Change Password

            $user_obj->password = bcrypt($request->new_password);
            $user_obj->save();

            return $this->sendResponse(array(), "Password changed successfully !");
        }
    }

    public function hotel_list(Request $request)
    {

        $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->get();
        $hoteldata = array();

        //echo "<pre>";print_r($data);die;
        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id', '=', $value->hotel_id)->get();

            $Img = array();
            $baseurl = url('/public/uploads/hotel_gallery/');
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id' => $IMG->id,
                    'img_name' => $baseurl . '/' . $IMG->image,
                    'is_featured' => $IMG->is_featured,
                    'status' => $IMG->status,
                );
            }

            if ($value->property_alternate_num) {
                $property_alternate_num = $value->property_alternate_num;
            } else {
                $property_alternate_num = 0;
            }
            if ($value->hotel_latitude) {
                $hotel_latitude = $value->hotel_latitude;
            } else {
                $hotel_latitude = 0;
            }
            if ($value->hotel_longitude) {
                $hotel_longitude = $value->hotel_longitude;
            } else {
                $hotel_longitude = 0;
            }

            $hoteldata[] = array(

                'hotel_id' => $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => $property_alternate_num,
                'cat_listed_room_type' => $value->cat_listed_room_type,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' => $value->checkin_time,
                'checkout_time' => $value->checkout_time,
                'stay_price' => $value->stay_price,
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country' => $value->hotel_country,
                'hotel_latitude' => $hotel_latitude,
                'hotel_longitude' => $hotel_longitude,
                'gallary' => $Img
            );
        }

        $data['hotel_data'] = $hoteldata;

        if (count($hoteldata) > 0) {

            $response['message'] = "Hotel List";
            $response['status'] = 1;
            $response['data'] = array('hotellist' => $hoteldata);
        } else {

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('hotellist' => $hoteldata);
        }


        return $response;
    }

    public function hotel_details(Request $request)
    {

        $hotelID = $request->id;
        $hotel_data = DB::table('hotels')->where('hotel_id', '=', $hotelID)->where(['hotel_status' => 1])->get();
        $hoteldata = array();

        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id', '=', $value->hotel_id)->get();
            $Img = array();
            $baseurl = url('/public/uploads/hotel_gallery/');

            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id' => $IMG->id,
                    'img_name' => $baseurl . '/' . $IMG->image,
                    'is_featured' => $IMG->is_featured,
                    'status' => $IMG->status,
                );
            }

            if ($value->property_alternate_num) {
                $property_alternate_num = $value->property_alternate_num;
            } else {
                $property_alternate_num = 0;
            }

            if ($value->hotel_latitude) {
                $hotel_latitude = $value->hotel_latitude;
            } else {
                $hotel_latitude = 0;
            }

            if ($value->hotel_longitude) {
                $hotel_longitude = $value->hotel_longitude;
            } else {
                $hotel_longitude = 0;
            }

            $hoteldata[] = array(

                'hotel_id' => $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => $property_alternate_num,
                'cat_listed_room_type' => $value->cat_listed_room_type,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' => $value->checkin_time,
                'checkout_time' => $value->checkout_time,
                'stay_price' => $value->stay_price,
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country' => $value->hotel_country,
                'hotel_latitude' => $hotel_latitude,
                'hotel_longitude' => $hotel_longitude,
                'gallary' => $Img
            );
        }

        $hotel_amenities = DB::table('hotel_amenities')
            //->join('hotel_amenities', 'hotels.hotel_id', '=', 'hotel_amenities.hotel_id')
            ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
            ->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')
            ->where('hotel_amenities.hotel_id', '=', $hotelID)
            ->where('hotel_amenities.status', '=', 1)
            ->get();
        $hotelamenities = array();
        foreach ($hotel_amenities as $key => $value) {
            if ($value->room_other_featured_id) {
                $room_other_featured_id = $value->room_other_featured_id;
            } else {
                $room_other_featured_id = 0;
            }
            $hotelamenities[] = array(
                'id' => $value->id,
                'hotel_id' => $value->hotel_id,
                'amenity_id' => $value->amenity_id,
                'status' => $value->status,
                'created_at' => $value->created_at,
                'amenity_name' => $value->amenity_name,
                'amenity_icon' => $value->amenity_icon,
                'amenity_type' => $value->amenity_type,
                'amenity_type_name' => $value->amenity_type_name,
                'amenity_type_sym' => $value->amenity_type_sym,
                'room_other_featured_id' => $room_other_featured_id,
                'name' => $value->name,
                'amenity_name_type' => $value->amenity_name_type
            );
        }

        $hotel_room_data = DB::table('room_list')
            ->join('room_gallery', 'room_list.id', '=', 'room_gallery.room_id')
            ->where('room_list.hotel_id', '=', $hotelID)
            ->where('room_list.status', '=', 1)
            ->get();
        $hotelroomdata = array();
        foreach ($hotel_room_data as $key => $value) {

            $baseurl = url('/public/uploads/room_images/');
            $roomimg = $baseurl . '/' . $value->image;

            if ($value->is_guest_allow) {
                $is_guest_allow = $value->is_guest_allow;
            } else {
                $is_guest_allow = 0;
            }
            if ($value->cleaning_fee_type) {
                $cleaning_fee_type = $value->cleaning_fee_type;
            } else {
                $cleaning_fee_type = 0;
            }
            $hotelroomdata[] = array(
                'id' => $value->id,
                'room_types_id' => $value->room_types_id,
                'hotel_id' => $value->hotel_id,
                'name' => $value->name,
                'description' => $value->description,
                'notes' => $value->notes,
                'max_adults' => $value->max_adults,
                'max_childern' => $value->max_childern,
                'number_of_rooms' => $value->number_of_rooms,
                'price_per_night' => $value->price_per_night,
                'price_per_night_7d' => $value->price_per_night_7d,
                'price_per_night_30d' => $value->price_per_night_30d,
                'is_guest_allow' => $is_guest_allow,
                'extra_guest_per_night' => $value->extra_guest_per_night,
                'type_of_price' => $value->type_of_price,
                'cleaning_fee' => $value->cleaning_fee,
                'cleaning_fee_type' => $cleaning_fee_type,
                'city_fee' => $value->city_fee,
                'bed_type' => $value->bed_type,
                'private_bathroom' => $value->private_bathroom,
                'private_entrance' => $value->private_entrance,
                'optional_services' => $value->optional_services,
                'family_friendly' => $value->family_friendly,
                'outdoor_facilities' => $value->outdoor_facilities,
                'extra_people' => $value->extra_people,
                'status' => $value->status,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'room_id' => $value->room_id,
                'image' => $roomimg,
                'is_featured' => $value->is_featured
            );
        }

        if (count($hoteldata) > 0) {
            $response['message'] = "Hotel Detail";
            $response['status'] = 1;
            $response['data'] = array('hotel_detail' => $hoteldata, 'hotel_amenities' => $hotelamenities, 'room_detail' => $hotelroomdata);
        } else {
            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('hotel_detail' => '', 'room_detail' => '');
        }

        return $response;
    }

    public function room_details(Request $request)
    {

        $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->get();
        $hoteldata = array();

        //echo "<pre>";print_r($data);die;
        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id', '=', $value->hotel_id)->get();

            $Img = array();
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id' => $IMG->id,
                    'img_name' => $IMG->image,
                    'is_featured' => $IMG->is_featured,
                    'status' => $IMG->status,
                );
            }

            $hoteldata[] = array(

                'hotel_id' => $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => $value->property_alternate_num,
                'cat_listed_room_type' => $value->cat_listed_room_type,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' => $value->checkin_time,
                'checkout_time' => $value->checkout_time,
                'stay_price' => $value->stay_price,
                'hotel_address' => $value->hotel_address,
                'hotel_city' => $value->hotel_city,
                'hotel_country' => $value->hotel_country,
                'hotel_latitude' => $value->hotel_latitude,
                'hotel_longitude' => $value->hotel_longitude,
                'gallary' => $Img
            );
        }

        $data['hotel_data'] = $hoteldata;

        if (count($hoteldata) > 0) {
            $response['message'] = "Hotel List";
            $response['status'] = 1;
            $response['data'] = array('hotel-List' => $hoteldata);
        } else {
            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('hotel-List' => $hoteldata);
        }
        return $response;
    }
}
