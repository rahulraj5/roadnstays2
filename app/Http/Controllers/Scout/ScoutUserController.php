<?php

namespace App\Http\Controllers\Scout;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated; 
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Scout;
use DB;
use Session;

class ScoutUserController extends Controller
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
        // echo "<pre>";print_r($request->all());die;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // echo "<pre>";print_r((Auth::guard('scout')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])));die;
        
        // if(Auth::guard('scout')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))){
        if(Auth::guard('scout')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
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
        // echo Auth::user_type();
        // echo Auth::first_name();
        $scout_id = Auth::user()->id;
        $data['page_heading_name'] = 'Dashboard';
        $data['hotel_count'] = DB::table('hotels')->where('scout_id', $scout_id)->count();
        // $data['room_count'] = DB::table('room_list')->where('name','!=',null)->count();
        $data['space_count'] = DB::table('space')->where('scout_id', $scout_id)->where('space_name','!=',null)->count();
        $data['tour_count'] = DB::table('tour_list')->where('scout_id', $scout_id)->count();
        $data['event_count'] = DB::table('events')->where('scout_id', $scout_id)->count();
        $data['roomBookingCount'] = DB::table('booking')
                                ->join('users', 'booking.user_id', '=', 'users.id')
                                ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
                                ->select('booking.*')
                                ->where('scout_id',$scout_id)
                                ->count();

        $data['tourBookingCount'] = DB::table('tour_booking')
                                ->join('users', 'tour_booking.user_id', '=', 'users.id')
                                ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                                ->select('tour_booking.*')
                                ->where('scout_id',$scout_id)
                                ->count();

        $data['spaceBookingCount'] = DB::table('space_booking')
                                ->join('users', 'space_booking.user_id', '=', 'users.id')
                                ->join('space', 'space_booking.space_id', '=', 'space.space_id')
                                ->select('space_booking.*')
                                ->where('scout_id',$scout_id)
                                ->count();
                                
        $data['eventBookingCount'] = DB::table('event_booking')
                                ->join('users', 'event_booking.user_id', '=', 'users.id')
                                ->join('events', 'event_booking.event_id', '=', 'events.id')
                                ->select('event_booking.*')
                                ->where('scout_id',$scout_id)
                                ->count();
        // echo "<pre>";print_r($data['roomBookingList']);die;  
        return view('scout.dashboard')->with($data);

        // if(Auth::check()){
        //     return view('admin.dashboard');
        // }
  
        // return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function profile(Request $request)
    {
        $scout_id = Auth::user()->id;
        // dd($request->all());
        if(!empty($request->id))
        {
            $updata = DB::table('users')->where('id', $request->id)->update(['first_name' => $request->first_name, 'last_name' => $request->last_name]);
            if(!empty($updata))
            {
                return response()->json(['status' => 'success', 'msg' => 'Profile Updated Successfully']);
            }else{
                return response()->json(['status' => 'error', 'msg' => 'Not Updated any Value']);
            }
        }

        $data['profile_detail'] = DB::table('users')->where('id',$scout_id)->get();
        // echo "<pre>";print_r($profile_detail);die;
        return view('scout/profile')->with($data);
    }

    public function change_password(Request $request)
    {
        $user_id = Auth::user()->id;
        // dd($request->all());
        // echo "<pre>";print_r(Auth::user());die;
        $data = $request->all(); 
        
        $user_obj = DB::table('users')->where('id', $user_id)->first();
        if(!empty($data)){
              
            if (!empty($user_obj)) {
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
                    $checkda = DB::update('update users set password = ? where id = 0',[$password]);
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
