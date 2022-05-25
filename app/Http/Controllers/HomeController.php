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

    // public function login()
    // {
    //     return view('auth.login');
    // }

    public function postLogin(Request $request)
    {
        $user_obj = User::where('email', '=', $request->email)->first();
        // echo "<pre>";print_r($user_obj->id);die;
        if (!empty($user_obj->id) and $user_obj->role_id == 2) {
            $credentials = $request->only('email', 'password');
            // auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
            if (Auth::attempt($credentials)) {
            // if (auth()->guard('admin')->attempt($credentials)) {
                // $user = auth()->guard('admin')->user();
                // echo "$user";
                return response()->json(['status' => 'success','msg' => 'Login Successfully.']);
            } else {
                return response()->json(['status' => 'error','msg' => 'Invalid Credential.']);
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
    //   return Admin::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }


    
    public function profile(Request $request)
    {
        // dd($request->all());
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

    public function change_password(Request $request)
    {
        // dd($request->all());
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
        // Auth::guard('user')->logout();
        Auth::logout();
        return redirect()->route('home');
    }
}
