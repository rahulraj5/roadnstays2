<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated; 
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Scout;
use DB;
use Session;

class ScoutController extends Controller
{
    public function login()
    {
        return view('scout.login');
    }

    // public function postLogin(Request $request)
    // {
    //     echo "<pre>";print_r($request->all());die;
    //     return view('scout.login');
    // }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // echo "<pre>";print_r((Auth::guard('scout')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])));die;
        
        if(Auth::guard('users')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))){
            // echo "<pre>";print_r('inside');die;
            // $userName = Auth::guard('scout')->user()->name;
            // echo "<pre>";print_r($userName);die;
            // return redirect()->route('scout.dashboard');
            return response()->json(['status' => 'success', 'msg' => 'Login Successfully']);
        }else{
            // $userName = Auth::guard('scout')->user()->name;
            // echo "<pre>";print_r($userName);die;
            // session()->flash('error', 'Incorrect Credential');
            // return back()->with($request->only('email'));
            return response()->json(['status' => 'error', 'msg' => 'Incorrect Credential']);
        }

    }

    public function dashboard()
    {
        return view('scout.dashboard');

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
            $updata = DB::table('users')->where('id', $request->id)->update(['name' => $request->name]);
            if(!empty($updata))
            {
                return response()->json(['status' => 'success', 'msg' => 'Profile Updated Successfully']);
            }else{
                return response()->json(['status' => 'error', 'msg' => 'Not Updated any Value']);
            }
        }

        $data['profile_detail'] = DB::table('Scout')->get();
        // echo "<pre>";print_r($profile_detail);die;
        return view('scout/profile')->with($data);
    }

    public function change_password(Request $request)
    {
        // dd($request->all());
        // echo "<pre>";print_r(Auth::user());die;
        $data = $request->all(); 
        
        $user_obj = Scout::where('id', '=', 1)->first();
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
        return view('scout/change_password');
    }

    public function scoutLogout()
    {
        Auth::guard('scout')->logout();
        return redirect()->route('scout.login');
    }
}
