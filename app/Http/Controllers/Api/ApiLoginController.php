<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

//use App\Post;

use Validator,DB;

use App\Models\User;

//use App\Helpers\Helper;

//use Auth;

use Illuminate\Support\Facades\Auth;

use Mail;
 
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

}