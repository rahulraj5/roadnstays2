<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

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
            if ($addUser) 
            {
                Auth::guard("web")->login($user);
                return response()->json(['status' => 'success','msg' => 'User Created Successfully']);
            }
        }else{
            return response()->json(['status' => 'error','msg' => 'The email has already been taken']);
        }
    }

    public function postLogin(Request $request)
    {
        $user_obj = User::where('email', '=', $request->email)->first();
        // echo "<pre>";print_r($user_obj->id);die;
        // if (!empty($user_obj->id) and $user_obj->role_id == 2) {
        if (!empty($user_obj->id)) {

            if($user_obj->role_id == 2){
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return response()->json(['status' => 'success' ,'role' => 'user','msg' => 'Login Successfully.']);
                } else {
                    return response()->json(['status' => 'error', 'msg' => 'Invalid Credential.']);
                }
            }else if($user_obj->role_id == 4){
                $credentials = $request->only('email', 'password');
                // auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
                // if (Auth::attempt($credentials)) {
                if (auth()->guard('servicepro')->attempt($credentials)) {
                    // $user = auth()->guard('servicepro')->user();
                    // echo "$user";
                    return response()->json(['status' => 'success','role' => 'vendor' ,'msg' => 'Login Successfully.']);
                } else {
                    return response()->json(['status' => 'error','msg' => 'Invalid Credential.']);
                }
            }else{
                return response()->json(['status' => 'error','msg' => 'Something get Wrong.']);
            }
        }else{
            return response()->json(['status' => 'error','msg' => 'Email address not registered.']);
        }
    }

    // public function postLoginn(Request $request)
    // {
    //     // echo "<pre>";print_r($request->all());die;
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
   
    //     $credentials = $request->only('email', 'password');
    //     // echo "<pre>";print_r($credentials);die;
    //     if (Auth::attempt($credentials)) {
    //         echo 'login successfully';
    //         return redirect()->intended('home.dashboard')->withSuccess('You have Successfully loggedin');
    //         // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    //     }else{
    //         echo 'something get wrong';
    //     }
        
    //     // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    // }

    public function dashboard(Request $request)
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
        // echo "<pre>";print_r($profile_detail);die;
        return view('front/profile')->with($data);
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
            // echo "Profile Image Updated Successfully";
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
                    if($checkda){
                        // echo "<pre>";print_r($checkda);die;
                    }else{
                        // echo "<pre>";print_r($checkda);die;
                    }
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


    public function serviceProDashboard(Request $request)
    {
        return view('service_provider.dashboard');
    }

    public function serviceProLogout()
    {
        Auth::guard('servicepro')->logout();
        // Auth::logout();
        return redirect()->route('home');
    }
}
