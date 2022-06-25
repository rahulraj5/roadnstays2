<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Helpers\Helper;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front/index');
    }

    public function baseForm()
    {
        return view('front/base_from');
    }

   

    public function all_rooms()
    {
        return view('front/hotel/all_rooms');
    }

    public function room_details()
    {
        return view('front/hotel/room_details');
    }
    public function events()
    {
        return view('front/hotel/events');
    }

    public function tour()
    {
        return view('front/tour/tour');
    }   

    public function packages()
    {
        return view('front/packages/packages');
    }  

    public function tour_details()
    {
        return view('front/tour/tour_details');
    } 

    public function two()
    {
        return view('front/tour/two');
    } 

    public function three()
    {
        return view('front/tour/three');
    } 

    public function signup(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $checkUserEmail = DB::table('users')->where('email', $request->semail)->first(); 
        if (empty($checkUserEmail)) 
        {
            $user = new User;
            $user->first_name = $request->name;
            $user->email = $request->semail;
            $user->contact_number = $request->phone_no;
            $user->password = bcrypt($request->spassword);
            $user->user_type = "normal_user";
            $user->role_id = 2;
            $addUser = $user->save();

            $data['check_send_email'] = DB::table('users')->where('email', $request->semail)->first(); 
            if ($addUser) 
            {
                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $request->semail;
            
                    Mail::send('email.test', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'],'RoadNStays');
                        $message->to('votivephp.rahulraj@gmail.com');
                        $message->subject('RoadNStays - New Registration');
                    });
            
                }
                // Auth::guard("web")->login($user);
                return response()->json(['status' => 'success','msg' => 'User Created Successfully']);
            }
        }else{
            return response()->json(['status' => 'error','msg' => 'The email has already been taken']);
        }
    }


    public function postLogin(Request $request)
    {
        $user_obj = User::where('email', '=', $request->email)->first();
        if (!empty($user_obj->id)) {
            if($user_obj->role_id == 2){
                if($user_obj->status == 1){
                    $credentials = $request->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        return response()->json(['status' => 'success' ,'role' => 'user','msg' => 'Login Successfully.']);
                    } else {
                        return response()->json(['status' => 'error', 'msg' => 'Invalid Credential.']);
                    }
                }else{
                    return response()->json(['status' => 'error','msg' => 'Your account is not activated by Administrator.']);
                }
            }else{
                return response()->json(['status' => 'error' ,'role' => 'other','msg' => 'Email address not registered.']);
            }
        }else{
            return response()->json(['status' => 'error','msg' => 'Email address not registered.']);
        }
    }

    public function serviceProPostLogin(Request $request)
    {
        $user_obj = User::where('email', '=', $request->vlemail)->first();
        // print_r($request->all());
        // if (!empty($user_obj->id) and $user_obj->role_id == 2) {
        if (!empty($user_obj->id)) {

            if($user_obj->role_id == 4){
                if($user_obj->status == 1){
                    // $credentials = $request->only('email', 'password');
                    // auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
                    if (Auth::attempt(['email' => $request->input('vlemail'), 'password' => $request->input('vlpassword')])) {
                    // if (auth()->guard('servicepro')->attempt($credentials)) {
                        return response()->json(['status' => 'success','role' => 'vendor' ,'msg' => 'Login Successfully.']);
                    }else {
                        return response()->json(['status' => 'error','msg' => 'Invalid Credential.']);
                    }
                }else{
                    return response()->json(['status' => 'error','msg' => 'Your account is not activated by Administrator.']);
                }
            }else{
                return response()->json(['status' => 'error' ,'role' => 'other','msg' => 'Email address not registered.']);
            }
        }else{
            return response()->json(['status' => 'error','msg' => 'Email address not registered.']);
        }
    }

    public function vendorSignup(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $checkUserEmail = DB::table('users')->where('email', $request->vsemail)->first(); 
        if (empty($checkUserEmail)) 
        {
            $user = new User;
            $user->first_name = $request->vsname;
            $user->email = $request->vsemail;
            $user->contact_number = $request->vsphone_no;
            $user->password = bcrypt($request->vspassword);
            $user->user_type = "service_provider";
            $user->role_id = 4;
            $addUser = $user->save();
            if ($addUser) 
            {
                // Auth::guard("web")->login($user);
                return response()->json(['status' => 'success','msg' => 'User Created Successfully']);
            }
        }else{
            return response()->json(['status' => 'error','msg' => 'The email has already been taken']);
        }
    }

    public function userProfile(Request $request)
    {
        return view('front.dashboard');
    }

    public function serviceProProfile(Request $request)
    {
        return view('front.dashboard');
    }

    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }
    
    public function profile(Request $request)
    {
        if(!empty($request->id))
        {
            $updata = DB::table('users')->where('id', $request->id)->update(['name' => $request->name]);
            if(!empty($updata))
            {
                return response()->json(['status' => 'success', 'msg' => 'Profile Updated Successfully']);
            }else{
                return response()->json(['status' => 'error', 'msg' => 'Not Updated any Value']);
            }
        }

        $data['profile_detail'] = DB::table('users')->get();
        return view('front/profile')->with($data);
    }

    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        if($user_id){
            DB::table('users')
                ->where('id', $user_id)
                ->update([
                    'first_name' => $request->puname,
                    'email' => $request->puemail,
                    'contact_number' => $request->puphone_no,
                    'user_city' => $request->city,
                    'state_id' => $request->state,
                    'user_country' => $request->country,
                    'address' => $request->address,
                    'postal_code' => $request->zip_code,
                ]);
            return response()->json(['status' => 'success', 'msg' => 'Profile Updated']);
        }
    }

    public function updateProImg(Request $request)
    {
        $user_id = Auth::user()->id;
        if($user_id){
            if($request->hasFile('imageFile'))
            {
                $image_name = $request->file('imageFile')->getClientOriginalName();
                $filename = pathinfo($image_name,PATHINFO_FILENAME);
                $image_ext = $request->file('imageFile')->getClientOriginalExtension();
                $fileNameToStore = $filename.'-'.time().'.'.$image_ext;
                $path = base_path() . '/public/uploads/profile_img/';
                $request->file('imageFile')->move($path, $fileNameToStore);
                
            }else{
                $fileNameToStore = 'user.jpg';
            }
                DB::table('users')->where('id', $user_id)->update(['profile_pic' => $fileNameToStore]);
            return response()->json(['status' => 'success', 'msg' => 'Profile Image Updated']);
        }
    }

    public function change_password(Request $request)
    {
        // echo "<pre>";print_r(Auth::user());die;
        $data = $request->all(); 
        
        $user_obj = User::where('id', '=', 1)->first();
        if(!empty($data)){
              
            if (!empty($user_obj->id) and $user_obj->id == 1) {
                // echo "<pre>";print_r($data);
                // echo "<pre>";print_r($user_obj);
                // $check_pwd = Hash::make($data['old_password']);
                // echo "<pre>";print_r($check_pwd);
                // die; 
                $user_id =  $user_obj->id;
                if(!\Hash::check($data['old_password'], $user_obj->password)){
                    return response()->json(['status' => 'error', 'msg' => 'You have entered wrong password']);
                }else{
                    $user_id = $user_obj->id;
                    $password = bcrypt($request->input('new_password'));
                    // echo "<pre>";print_r($request->input('new_password'));die; 
                    $checkda = DB::update('update users set password = ? where id = 1',[$password]);
                    return response()->json(['status' => 'success', 'msg' => 'Password Updated Successfully']);
                }
            }
        }    
        return view('front/change_password');
    }

    public function userLogout()
    {
        // Auth::guard('web')->logout();
        Auth::logout();
        return redirect()->route('home');
    }

    public function hotel_list(Request $request)
    {   
        $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->orderBy('hotel_id', 'DESC')->paginate(10);
        $hoteldata=array();
        foreach ($hotel_data as $key => $value) {
            $gallary = DB::table('hotel_gallery')->where('hotel_id','=',$value->hotel_id)->get();

            $Img=array();
            foreach ($gallary as $key => $IMG) {
                $Img[] = array(
                    'img_id'=>$IMG->id,
                    'img_name'=>$IMG->image,
                    'is_featured'=>$IMG->is_featured,
                    'status'=>$IMG->status,
                );
            }

            $amenities = DB::table('hotel_amenities')
                        ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                        ->where('hotel_amenities.hotel_id','=',$value->hotel_id)
                        ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                        ->get();

            $hoteldata[] = array(

                'hotel_id'=> $value->hotel_id,
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
                'hotel_amenities' => $amenities,
                'gallary' => $Img
            );
        }
        

        //$data['hotels'] = DB::table('hotels')->where(['hotel_status' => 1])->orderBy('hotel_id', 'DESC')->paginate('10');
        $data['hotel_data'] = $hoteldata;
        $data['hotels'] = $hotel_data; 
        //echo "<pre>"; print_r($data);die;
        return view('front.hotel.hotel_list')->with($data);
    }

    public function hotel_details($hotel_id)
    {
        $hotel_id = base64_decode($hotel_id);
        
        $data['hotel_data'] = DB::table('hotels')
                            ->join('country', 'hotels.hotel_country', '=', 'country.id')
                            ->where(['hotels.hotel_id'=>$hotel_id,'hotels.hotel_status' => 1])->first();

        $data['hotel_gallery'] =  DB::table('hotel_gallery')->where(['hotel_id'=>$hotel_id,'status' => 1])->get();

        $data['amenities'] = DB::table('hotel_amenities')
                            ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                            ->where('hotel_amenities.hotel_id','=',$hotel_id)
                            ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                            ->get(); 

        //$data['room_data'] =  DB::table('room_list')->where(['hotel_id'=>$hotel_id,'status' => 1])->get();

        $room_data =  DB::table('room_list')->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')->where(['room_list.hotel_id'=>$hotel_id,'room_list.status' => 1])->select('room_list.*', 'room_type_categories.title as room_type')->get();

        $roomdata = array();
        foreach ($room_data as $key => $room) {

            $room_amenities = DB::table('room_amenities')
                        ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                        ->where('room_amenities.room_id','=',$room->id)
                        ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                        ->get();

            $room_features = DB::table('room_features')
                        ->join('room_others_features', 'room_features.feature_id', '=', 'room_others_features.id')
                        ->where('room_features.room_id','=',$room->id)
                        ->select('room_others_features.*', 'room_features.feature_id')
                        ->get();

            $room_services = DB::table('room_services')
                        ->join('H3_Services', 'room_services.room_service_id', '=', 'H3_Services.id')
                        ->where('room_services.room_id','=',$room->id)
                        ->select('H3_Services.*', 'room_services.room_service_id')
                        ->get();

            $room_extra_option = DB::table('room_extra_option')->where('room_id','=',$room->id)->get();

            $room_gallery = DB::table('room_gallery')->where('room_id','=',$room->id)->get();

            $roomdata[] =array(
                'id' => $room->id,
                'name' => $room->name,
                'room_type' => $room->room_type,
                'image' => $room->image,
                'description' => $room->description,
                'notes' => $room->notes,
                'max_adults' => $room->max_adults,
                'max_childern' => $room->max_childern,
                'number_of_rooms' => $room->number_of_rooms,
                'price_per_night' => $room->price_per_night,
                'tax_percentage' => $room->tax_percentage,
                'price_per_night_7d' => $room->price_per_night_7d,
                'price_per_night_30d' => $room->price_per_night_30d,
                'is_guest_allow' => $room->is_guest_allow,
                'extra_guest_per_night' => $room->extra_guest_per_night,
                'is_above_guest_cap' => $room->is_above_guest_cap,
                'is_pay_by_num_guest' => $room->is_pay_by_num_guest,
                'room_size' => $room->room_size,
                'type_of_price' => $room->type_of_price,
                'cleaning_fee' => $room->cleaning_fee,
                'cleaning_fee_type' => $room->cleaning_fee_type,
                'city_fee' => $room->city_fee,
                'city_fee_type' => $room->city_fee_type,
                'earlybird_discount' => $room->earlybird_discount,
                'min_days_in_advance' => $room->min_days_in_advance,
                'bed_type' => $room->bed_type,
                'private_bathroom' => $room->private_bathroom,
                'private_entrance' => $room->private_entrance,
                'optional_services' => $room->optional_services,
                'family_friendly' => $room->family_friendly,
                'outdoor_facilities' => $room->outdoor_facilities,
                'extra_people' => $room->extra_people,
                'breakfast_availability' => $room->breakfast_availability,
                'breakfast_price_inclusion' => $room->breakfast_price_inclusion,
                'breakfast_cost' => $room->breakfast_cost,
                'breakfast_type' => $room->breakfast_type,
                'room_amenities' => $room_amenities,
                'room_features' => $room_features,
                'room_services' => $room_services,
                'room_extra_option' => $room_extra_option,
                'room_gallery' => $room_gallery
            );             
        }

        $data['room_data'] = $roomdata;
        //echo "<pre>"; print_r($data['room_data']);die;

        return view('front.hotel.hotel_details')->with($data);
    }

    public function room_details_ajax(Request $request)
    {
        $room_id = $request->id;
        $room_data =  DB::table('room_list')->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')->where(['room_list.id'=>$room_id,'room_list.status' => 1])->select('room_list.*', 'room_type_categories.title as room_type')->first();

        $room_amenities = DB::table('room_amenities')
                        ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                        ->where('room_amenities.room_id','=',$room_id)
                        ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                        ->get();

        $room_features = DB::table('room_features')
                    ->join('room_others_features', 'room_features.feature_id', '=', 'room_others_features.id')
                    ->where('room_features.room_id','=',$room_id)
                    ->select('room_others_features.*', 'room_features.feature_id')
                    ->get();

        $room_services = DB::table('room_services')
                    ->join('H3_Services', 'room_services.room_service_id', '=', 'H3_Services.id')
                    ->where('room_services.room_id','=',$room_id)
                    ->select('H3_Services.*', 'room_services.room_service_id')
                    ->get();

        $room_extra_option = DB::table('room_extra_option')->where('room_id','=',$room_id)->get();

        $room_gallery = DB::table('room_gallery')->where('room_id','=',$room_id)->get();

        //return json(array('room_data'=>$room_data,'room_amenities'=>$room_amenities,'room_features'=>$room_features,'room_services'=>$room_services,'room_gallery'=>$room_gallery));

        return response()->json(['room_data'=>$room_data,'room_amenities'=>$room_amenities,'room_features'=>$room_features,'room_services'=>$room_services,'room_gallery'=>$room_gallery]);

    }

    public function checkout()
    {   
        if(isset($_GET['hotel_id']) && isset($_GET['room_id'])) {
            $hotel_id = $_GET['hotel_id'];
            $room_id = $_GET['room_id'];
            $data['hotel_data'] = DB::table('hotels')
                            ->join('country', 'hotels.hotel_country', '=', 'country.id')
                            ->where(['hotels.hotel_id'=>$hotel_id,'hotels.hotel_status' => 1])
                            ->first();

            $data['room_data'] = DB::table('room_list')
                        ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
                        ->where(['room_list.hotel_id'=>$hotel_id,'room_list.id'=>$room_id,'room_list.status' => 1])
                        ->select('room_list.*', 'room_type_categories.title as room_type')
                        ->first();
            return view('front/hotel/checkout')->with($data);
        }else{
            return redirect()->route('home');
        }
        
    }

    public function confirm_booking()
    {
        return view('front/hotel/confirm_booking');
    }

    public function serviceProDashboard(Request $request)
    {
        return view('vendor.dashboard');
    }

    public function serviceProLogout()
    {
        // Auth::guard('servicepro')->logout();
        Auth::logout();
        return redirect()->route('home');
    }

    public function forgotPassword_action(Request $request)
    {
        $email = $request->forgetEmail;

        $token = Str::random(64);

        $reseturll = url('/resetPassword/');

        $checkuser = DB::table('users')->where(['email' => $email])->first();
        // print_r($checkuser);die;

        if(!empty($checkuser)){
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
    
            $data = array( 'email' => $email, 'token' => $token , 'reseturll' => $reseturll);
    
            // Mail::send("email.forgotPasswordMail",$data,function($message) use ($data) {
    
            //     $message->from('info@votivelaravel.in', 'votivelaravel.in');
        
            //     $message->subject("Forgot Password");
        
            //     $message->to($data['email']);
        
            // });

            $fromEmail = Helper::getFromEmail();
            $inData['from_email'] = $fromEmail;
            $inData['email'] = $email;
    
            Mail::send('email.emailtemplate', $data, function ($message) use ($inData) {
                $message->from($inData['from_email'],'RoadNStays');
                $message->to('votivephp.rahulraj@gmail.com');
                $message->subject('RoadNStays - New Registration');
            });

            return response()->json(['status' => 'success','msg' => 'Please check your email address..']);
            // return Redirect::back()->with('msg', "Please check your email address..");
        }else{
            return response()->json(['status' => 'error','msg' => 'Please enter vaild mail-id!']);
            // return Redirect::back()->with('error', "Please enter vaild mail-id!");
        }                                

    }
}
