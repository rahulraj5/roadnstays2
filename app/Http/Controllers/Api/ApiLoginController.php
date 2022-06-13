<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

use App\Post;

use Validator,DB;

use App\Models\User;

use App\Helpers\Helper;

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

	public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|unique:users,email',

            'password' => 'required',

            'confirm_password' => 'required|same:password',

            'contact_number' => 'required|numeric|unique:users,contact_number',

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);

        } else {


            $name1 = '';

            if ($request->hasFile('profile_image')) {

                $image = $request->file('profile_image');

                $name1 = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/profile_image');         

                $imagePath = $destinationPath. '/'.  $name1;

                $image->move($destinationPath, $name1);

            }



            $referral_code = !empty($request->referral_code ? $request->referral_code : '');

            $device_id = !empty($request->device_id ? $request->device_id : '');

            $device_token = !empty($request->device_token ? $request->device_token : '');

            $device_type = !empty($request->device_type ? $request->device_type : '');



            $vrfn_code = Helper::generateRandomString(6);

            $name = $request->name;

            $email = $request->email;

            $password = $request->password;

            $contact_number = $request->contact_number;

            $name_arr = explode(' ', $name);


            if(!empty($request->my_referral_code)){
                $my_referral_code=$request->my_referral_code;
            }else{
                $my_referral_code="";
            }
            if(!empty($request->user_referral_id)){
                $user_referral_id=$request->user_referral_id;
            }else{
                $user_referral_id="";
            }



            $obj = new User;

            $obj->user_type = "normal_user";

            $obj->first_name = (!empty($name_arr[0]) ? $name_arr[0] : '');

            $obj->last_name = (!empty($name_arr[1]) ? $name_arr[1] : '');

            $obj->email = $email;

            $obj->contact_number = $contact_number;

            $obj->password = bcrypt($password);

            $obj->role_id = 2;

            $obj->device_id = $device_id;

            $obj->device_token = $device_token;

            $obj->device_type = $device_type;

            $obj->profile_pic      = !empty($name1)? url('public/uploads/profile_image/').'/'.$name1 :url('resources/assets/images/blank_user.jpg');

            $obj->is_verify_email = 0;

            $obj->is_verify_contact = 0;

            $obj->user_referral_id = $user_referral_id;

            $obj->wallet_balance = 0;

            $obj->register_by = 'web';

            $obj->vrfn_code = $vrfn_code;

            $obj->status = 1;

            $obj->created_at = date('Y-m-d H:i:s');

            $obj->updated_at = date('Y-m-d H:i:s');

            $res = $obj->save();



            if ($res) {



                $users = User::where('email','=',$email)->first();

                $my_referral_code = Helper::my_simple_crypt($users->id,'e');

                $users->my_referral_code = $my_referral_code;

                $users->save();



                if(!empty($request->my_referral_code)){



                    $referral_info = DB::table('users')->where('my_referral_code',$request->my_referral_code)->where('status',1)->first();

                    $refferal_id = $referral_info->id;

 

                    DB::table('my_referrals')->insert(

                        [

                          'user_id' =>  $users->id,

                          'referral_code' =>  $request->my_referral_code,

                          'refferal_id' => $refferal_id,

                          'amount' => 0,

                          'status' =>  1 ,

                          'created_at' =>  date('Y-m-d H:i:s')

                        ]

                    );

                }





                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    

                    $vrfn_url = url('/').'/email_verification/'.$vrfn_code.'_'.$users->id;



                    $fromEmail = Helper::getFromEmail();

                    $inData['from_email'] = $fromEmail;

                    $inData['email'] = $email;

                    /*$inData['body'] = "<table>

                                        <thead>

                                            <tr>

                                                <td>name</td>

                                                <td>Link</td>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>

                                                <td>".$name."</td>

                                                <td><a href='".$vrfn_url."'>Verification Link</a></td>

                                            </tr>

                                        </tbody>

                                    </table>";*/

                    $inData['body'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

                            <html xmlns="http://www.w3.org/1999/xhtml">

                            <head>

                               <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

                               <meta name="viewport" content="width=device-width, initial-scale=1"/>

                               <title>Verify your FRAMEiT account</title>

                               <style type="text/css">img{max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}a img{border: none;}table{border-collapse: collapse !important;}#outlook a{padding:0;}.ReadMsgBody{width: 100%;}.ExternalClass{width: 100%;}.backgroundTable{margin: 0 auto; padding: 0; width: 100% !important;}table td{border-collapse: collapse;}.ExternalClass *{line-height: 115%;}.container-for-gmail-android{min-width: 600px;}/* General styling */ *{font-family: Helvetica, Arial, sans-serif;}body{-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; margin: 0 !important; height: 100%; color: #676767;}td{font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #777777; text-align: center; line-height: 21px;}a{color: #676767; text-decoration: none !important;}.pull-left{text-align: left;}.pull-right{text-align: right;}.header-lg, .header-md, .header-sm{font-size: 32px; font-weight: 700; line-height: normal; padding: 35px 0 0; color: #4d4d4d;}.header-md{font-size: 24px;}.header-sm{padding: 5px 0; font-size: 18px; line-height: 1.3;}.content-padding{padding: 20px 0 30px;}.mobile-header-padding-right{width: 290px; text-align: right; padding-left: 10px;}.mobile-header-padding-left{width: 290px; text-align: left; padding-left: 10px;}.free-text{width: 100% !important; padding: 10px 60px 0px;}.block-rounded{border-radius: 5px; border: 1px solid #e5e5e5; vertical-align: top;}.button{padding: 55px 0 0;}.info-block{padding: 0 20px; width: 260px;}.mini-block-container{padding: 30px 50px; width: 500px;}.mini-block{background-color: #ffffff; width: 498px; border: 1px solid #cccccc; border-radius: 5px; padding: 60px 75px;}.block-rounded{width: 260px;}.info-img{width: 258px; border-radius: 5px 5px 0 0;}.force-width-img{width: 480px; height: 1px !important;}.force-width-full{width: 600px; height: 1px !important;}.user-img img{width: 82px; border-radius: 5px; border: 1px solid #cccccc;}.user-img{width: 92px; text-align: left;}.user-msg{width: 236px; font-size: 14px; text-align: left; font-style: italic;}.code-block{padding: 10px 0; border: 1px solid #cccccc; width: 20px; color: #4d4d4d; font-weight: bold; font-size: 18px;}.mini-img{padding: 5px; width: 140px;}.mini-img img{border-radius: 5px; width: 140px;}.mini-imgs{padding: 25px 0 30px;}.progress-bar{padding: 0 15px 0;}.step{vertical-align: top;}.step img{width: 109px; height: 78px;}.active{font-weight: bold;}</style>

                               <style type="text/css" media="screen"> @import url(http://fonts.googleapis.com/css?family=Oxygen:400,700); </style>

                               <style type="text/css" media="screen"> @media screen{/* Thanks Outlook 2013! */ *{font-family: "Oxygen", "Helvetica Neue", "Arial", "sans-serif" !important;}}</style>

                               <style type="text/css" media="only screen and (max-width: 480px)"> /* Mobile styles */ @media only screen and (max-width: 480px){table[class*="container-for-gmail-android"]{min-width: 290px !important; width: 100% !important;}table[class="w320"]{width: 320px !important;}td[class*="mobile-header-padding-left"]{width: 160px !important;}img[class="force-width-gmail"]{display: none !important; width: 0 !important; height: 0 !important;}td[class="mobile-block"]{display: block !important;}td[class="mini-img"], td[class="mini-img"] img{width: 150px !important;}td[class*="mobile-header-padding-left"]{width: 160px !important; padding-left: 0 !important;}td[class*="mobile-header-padding-right"]{width: 160px !important; padding-right: 0 !important;}td[class="header-lg"]{font-size: 24px !important; padding-bottom: 5px !important;}td[class="header-md"]{font-size: 18px !important; padding-bottom: 5px !important;}td[class="content-padding"]{padding: 5px 0 30px !important;}td[class="button"]{padding: 5px !important;}td[class*="free-text"]{padding: 10px 18px 30px !important;}img[class="force-width-img"], img[class="force-width-full"]{display: none !important;}td[class="info-block"]{display: block !important; width: 280px !important; padding-bottom: 40px !important;}td[class="info-img"], img[class="info-img"]{width: 278px !important;}td[class="mini-block-container"]{padding: 8px 20px !important; width: 280px !important;}td[class="mini-block"]{padding: 20px 0 !important;}td[class*="step"] img{width: 86px !important; height: 62px !important;}td[class="progress-bar"]{padding: 0 11px 25px;}td[class="user-img"]{display: block !important; text-align: center !important; width: 100% !important; padding-bottom: 10px;}td[class="user-msg"]{display: block !important; padding-bottom: 20px;}}</style>

                            </head>

                            <body bgcolor="#f7f7f7">

                               <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">

                                  <tr>

                                     <td align="left" valign="top" width="100%">

                                        <center>

                                           <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" style="background-color:#333;background: #333;">

                                              <tr>

                                                 <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">

                                                       <center>

                                                          <table cellpadding="0" cellspacing="0" width="600" class="w320">

                                                             <tr>

                                                                <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;"> <a href="'.url('/').'"><img width="137" height="47" src="'.url("/").'/resources/front_assets/img/logo.png" alt="logo"></a> </td>

                                                             </tr>

                                                          </table>

                                                       </center>

                                                 </td>

                                              </tr>

                                           </table>

                                        </center>

                                     </td>

                                  </tr>

                                  <tr>

                                     <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">

                                        <center>

                                           <table cellspacing="0" cellpadding="0" width="600" class="w320">

                                              <tr>

                                                 <td class="header-lg"> Almost done! </td>

                                              </tr>

                                              <tr>

                                                 <td class="free-text"> Click on the button below to verify your account. </td>

                                              </tr>

                                              <tr>

                                                 <td class="mini-block-container">

                                                    <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">

                                                       <tr>

                                                          <td class="mini-block">

                                                             <table cellpadding="0" cellspacing="0" width="100%">

                                                                <tr>

                                                                   <td class="progress-bar">

                                                                      <table cellpadding="0" cellspacing="0" width="100%"></table>

                                                                   </td>

                                                                </tr>

                                                                <tr>

                                                                   <td class="button">

                                                                      <div> 

                                                                         <a href="'.$vrfn_url.'" target="_blank" style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:Cabin, Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">

                                                                            Click Here

                                                                         </a>

                                                                      </div>

                                                                   </td>

                                                                </tr>

                                                             </table>

                                                          </td>

                                                       </tr>

                                                    </table>

                                                 </td>

                                              </tr>

                                           </table>

                                        </center>

                                     </td>

                                  </tr>

                                  <tr>

                                     <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; height: 100px;">

                                        <center>

                                           <table cellspacing="0" cellpadding="0" width="600" class="w320">

                                              <tr>

                                                 <td style="padding: 25px 0 25px">04-451-1555<br/>In5 Inovation Centre, Dubai Media City <br/>info@frameit.com <br/><strong>(C) 2020 Frame Hub Middle East FZ LLC. </strong><br/><br/></td>

                                              </tr>

                                           </table>

                                        </center>

                                     </td>

                                  </tr>

                               </table>

                            </body>

                            </html>';  

                    

                    Mail::send([], [], function ($message) use ($inData) {

                        $message->from($inData['from_email'],'FRAMEiT');

                        $message->to($inData['email']);

                        $message->subject('FRAMEiT - Verification');

                        $message->setBody($inData['body'], 'text/html');

                    });



                }

            



                return $this->sendResponse(array(), 'Account has been created successfully. Please check your email address and please do verify your account!');

            } else {

                return $this->sendError('OOPs! Some internal issue occured.', array(), 200);

            }

        } 

        

    }

    public function loginUser(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',

            'password' => 'required'

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->messages()->first(), array(), 200);

        } else {

          $user_obj = User::where('email','=',$request->email)->first();

          if (!empty($user_obj->id)) {



            $device_id = !empty($request->device_id) ? $request->device_id : '';

        $device_token = !empty($request->device_token) ? $request->device_token : '';

        $device_type = !empty($request->device_type) ? $request->device_type : '';



            $credentials = array(

                  'email' => $request->email,

                  'password' => $request->password

              ); 

              

              if (Auth::attempt($credentials)){

                if (Auth::user()->role_id == 2) {

                  if (Auth::user()->is_verify_email == 1 || Auth::user()->is_verify_contact == 1) {

                    if (Auth::user()->status == 1) {

                      if(!empty($device_token)){



                        $device_credentials = array(

                            'device_id' => $request->device_id,

                            'device_token' => $request->device_token,

                            'device_type' => $request->device_type

                        ); 



                        $updateData = DB::table('users')->where('id',$user_obj->id )->update($device_credentials);



                      }

                      $user_info = Auth::user();

                      return $this->sendResponse($user_info, 'You are logged In.!');

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

}

