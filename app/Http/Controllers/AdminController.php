<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated; 
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use DB;
use Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // echo "<pre>";print_r($request->all());die;
        // auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
        // echo auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);die;
        // $credentials = $request->only('email', 'password');
        // $data = auth()->guard('admin')->attempt($credentials);
        // echo "<pre>";print_r($data);die;
        // echo "<pre>";print_r($credentials);die;
        
        // echo (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember')));die;

        if(Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))){
            // echo "<pre>";print_r('inside');die;
            // return redirect()->route('admin.dashboard');
            return response()->json(['status' => 'success', 'msg' => 'Login Successfully']);
        }else{
            // session()->flash('error', 'Incorrect Credential');
            // return back()->with($request->only('email'));
            return response()->json(['status' => 'error', 'msg' => 'Incorrect Credential']);
        }

        // $userCredentials = $request->only('email', 'password');
        // $teachers=Admin::where($userCredentials)->first();
        // echo "<pre>";print_r($teachers);die;
        // if ($teachers=Admin::where($userCredentials)->first()) {
        //     echo "<pre>";print_r($teachers);die;
        //     auth()->login($teachers);
        //     return redirect()->route('admin.dashboard');
        // }
        // else {
        //     return back()->with($request->only('email'));
        // }
    }

    public function dashboard()
    {
        $data['hotel_count'] = DB::table('hotels')->count();
        $data['room_count'] = DB::table('room_list')->where('name','!=',null)->count();
        $data['space_count'] = DB::table('space')->where('space_name','!=',null)->count();
        $data['tour_count'] = DB::table('tour_list')->count();
        $data['event_count'] = DB::table('events')->count();
        $data['user_count'] = DB::table('users')->where('user_type', 'normal_user')->count();
        $data['vendor_count'] = DB::table('users')->where('user_type', 'service_provider')->count();
        $data['scout_count'] = DB::table('users')->where('user_type', 'scout')->count();
        return view('admin.dashboard')->with($data);

        // if(Auth::check()){
        //     return view('admin.dashboard');
        // }
  
        // return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function profile(Request $request)
    {
        // dd($request->all());
        if(!empty($request->id))
        {
            $updata = DB::table('admins')->where('id', $request->id)->update(['name' => $request->name]);
            if(!empty($updata))
            {
                return response()->json(['status' => 'success', 'msg' => 'Profile Updated Successfully']);
            }else{
                return response()->json(['status' => 'error', 'msg' => 'Not Updated any Value']);
            }
        }

        $data['profile_detail'] = DB::table('admins')->get();
        // echo "<pre>";print_r($profile_detail);die;
        return view('admin/profile')->with($data);
    }

    public function change_password(Request $request)
    {
        // dd($request->all());
        // echo "<pre>";print_r(Auth::user());die;
        $data = $request->all(); 
        
        $user_obj = Admin::where('id', '=', 1)->first();
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
        // if(!empty($request->id))
        // {
        //     $updata = DB::table('admins')->where('id', $request->id)->update(['name' => $request->name]);
        //     if(!empty($updata))
        //     {
        //         return response()->json(['status' => 'success', 'msg' => 'Profile Updated Successfully']);exit();
        //     }else{
        //         return response()->json(['status' => 'error', 'msg' => 'Not Updated any Value']);exit();
        //     }
        // }
        // $data['profile_detail'] = DB::table('admins')->get();
        // echo "<pre>";print_r($profile_detail);die;
        return view('admin/change_password');
    }
    
    // public function logout() {
    //     Session::flush();
    //     Auth::logout();
  
    //     return Redirect('/');
    // }

    // public function logout() {
    //     // Auth::guard('admin')->logout();
    //     Session::flush();
    //     Auth::logout();
    //     return redirect()->route('admin.login');
    // }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
