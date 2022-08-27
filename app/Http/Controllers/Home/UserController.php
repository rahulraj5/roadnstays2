<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Helpers\Helper;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_password(Request $request)
    {    
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::where('id', Auth::id())->update(['password' => Hash::make($request->user_password)]);
            return response()->json(['status' => 'success', 'msg' => 'Password Update Successfully']);
        }else{
            return response()->json(['status'=>'error', 'msg'=>'Wrong Old Password']);
        }
    }

}
