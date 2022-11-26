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
use App\Models\Staticpages;

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
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['home_content'] = DB::table('home_page')->get();
        $data['hotel_list'] = DB::table('hotels')->where('hotel_status',1)->get();
        // echo "<pre>";print_r($data['hotel_list']);die;
        $data['tour_list'] = DB::table('tour_list')->where('status',1)->get();
        // echo "<pre>";print_r($data['tour_list']);die;
        return view('front/index')->with($data);
    }

    public function apg()
    {
        return view('front/apg/apg');
    }

    public function all_rooms()
    {
        return view('front/hotel/all_rooms');
    }

    public function room_details()
    {
        return view('front/hotel/room_details');
    }

    public function about_us()
    {
       $data['banner'] = DB::table('about_us_banner')->get();
       $data['about_content'] = DB::table('about_us_content_section')->get();
       $data['chooseus_heading'] = DB::table('why_choose_us_heading')->get();
       $data['about_choose_us'] = DB::table('about_choose_us')->get();
       
       return view('front/about_us')->with($data);
    }

    public function contact_us()
    {
       return view('front/contact_us');
    }

    public function terms_condition()
    {
        $data['list_content'] = Staticpages::where('page_url_text','terms_&_condition')->orderby('created_at', 'ASC')->get();

        return view('front/terms_condition')->with($data);
    }

    public function cookie_policy()
    {
        $data['list_content'] = Staticpages::where('page_url_text','cookie-policy')->orderby('created_at', 'ASC')->get();
        return view('front/cookie_policy')->with($data);
    }

    public function privacy_policy()
    {
        $data['list_content'] = Staticpages::where('page_url_text','privacy-policy')->orderby('created_at', 'ASC')->get();
        return view('front/privacy_policy')->with($data);
    }

    public function cancellation_policy()
    {
        $data['list_content'] = Staticpages::where('page_url_text','cancellation-policy')->orderby('created_at', 'ASC')->get();
        return view('front/cancellation_policy')->with($data);
    }

    public function list_your_property($value='')
    {
        $data['list_content'] = Staticpages::where('page_url_text','list-your-property')->orderby('created_at', 'ASC')->get();
        
        return view('front/list_your_property')->with($data);
    }

    public function event_details($id)
    {
        $id = base64_decode($id);
        $data['event_data'] = DB::table('events')->where('id', $id)->orderby('id', 'DESC')->first();
        $data['hotel_data'] = DB::table('hotels')->orderby('hotel_id', 'DESC')->get();
        $data['space_data'] = DB::table('space')->orderby('space_id', 'DESC')->get();
        $data['event_gallery'] = DB::table('event_gallery')->where('event_id', $id)->orderby('id', 'DESC')->get();
        //echo "<pre>"; print_r($data);die;
        return view('front/event/event_details')->with($data);
    }

    public function events()
    {
        // $data['events_data'] = DB::table('events')->orderby('id','DESC')->get();
        $data['events_data'] = DB::table('events')->where('start_date', '>=', date('Y-m-d'))->orderby('id', 'DESC')->get();
        $data['past_events_data'] = DB::table('events')->where('end_date', '<', date('Y-m-d'))->orderby('id', 'DESC')->get();
        //echo "<pre>"; print_r($data);die;
        return view('front/event/events')->with($data);
    }

    public function eventBooking($id)
    {
        $event_id = base64_decode($id);
        $data['event_details'] = DB::table('events')->where('id', $event_id)->first();
        return view('front/event/event-booking')->with($data);
    }

    public function eventBookingOrder(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $event_id = $request->event_id;
        $user_id = $request->user_id;
        $price = $request->price;
        // $price = $request->total_amount;

        if(!empty($request->online_payable_amount) and $request->online_payable_amount > 0)
        {
            $online_payable_amount = $request->online_payable_amount;
        }else{
            $online_payable_amount = $price;
        }
        $remaining_amount_to_pay = $request->at_desk_payable_amount;
        $partial_payment_status = $request->partial_payment_status;

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $email = $request->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $mobile = $request->mobile;
        $document_type = $request->document_type;
        $document_number = $request->document_number;
        if ($request->hasFile('front_document_img')) {
            $image_name = $request->file('front_document_img')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
            $front_document_img = $filename . '-' . time() . '.' . $image_ext;
            $path = base_path() . '/public/uploads/user_document/';
            $request->file('front_document_img')->move($path, $front_document_img);
        }
        if ($request->hasFile('back_document_img')) {
            $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
            $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/user_document';
            $request->file('back_document_img')->move($pat2, $back_document_img);
        }
        $status = 1;

        // ******* Alfalha Code Strat From Here ****

        $bankorderId   = rand(0,1786612);
        $data['bankorderId'] = $bankorderId;

        $event_details = DB::table('events')->where('id', $event_id)->first();

        $data['title'] = $event_details->title;
        $data['address'] = $event_details->address;
        
        $data['event_id'] = $event_id;
        $data['user_id']  = $user_id;
        // $data['price']  = $price;
        $data['price']  = $online_payable_amount;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['email'] = $email;
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['mobile'] = $mobile;
        $data['document_type'] = $document_type;
        $data['document_number'] = $document_number;


        $url = "https://sandbox.bankalfalah.com/HS/HS/HS";

        //$url = "https://payments.bankalfalah.com/HS/HS/HS";
            
        // $bankorderId   = $this->session->userdata('bankorderId');
        // $bankorderId   = rand(0,1786612);
        
       

        $Key1= "wgqW8C9uQG8EntcW";
        $Key2= "6620721616357136";
        $HS_ChannelId="1001";
        $HS_MerchantId="19513" ;
        $HS_StoreId="024984" ;
        $HS_IsRedirectionRequest  = 0;
        $HS_ReturnURL= url('/event-payment-successful');
        $HS_MerchantHash="OUU362MB1upxJgeTHp3x+e9lYN3lrYJOyJIVHPA/LMyWny/BUgjHQpG8Id/C5coxbxc5OMqhewg=";
        $HS_MerchantUsername="cutowa" ;
        $HS_MerchantPassword="lHpnn0Po8FVvFzk4yqF7CA==";
        $HS_TransactionReferenceNumber= $bankorderId;
        $transactionTypeId = "3";
        $TransactionAmount = round($online_payable_amount);   
        $cipher="aes-128-cbc";


        $data['key1'] = $Key1;
        $data['Key2'] = $Key2;
        $data['HS_ChannelId'] = $HS_ChannelId;
        $data['HS_MerchantId'] = $HS_MerchantId;
        $data['HS_StoreId'] = $HS_StoreId;
        $data['HS_IsRedirectionRequest'] = $HS_IsRedirectionRequest;
        $data['HS_ReturnURL'] = $HS_ReturnURL;
        $data['HS_MerchantHash']  = $HS_MerchantHash;
        $data['HS_MerchantUsername'] = $HS_MerchantUsername;
        $data['HS_MerchantPassword'] = $HS_MerchantPassword;
        $data['HS_TransactionReferenceNumber'] = $HS_TransactionReferenceNumber;
        $data['transactionTypeId'] = $transactionTypeId;
        $data['TransactionAmount'] = $TransactionAmount;
        $data['cipher'] = $cipher;

        $mapString = 
        "HS_ChannelId=$HS_ChannelId" 
        . "&HS_IsRedirectionRequest=$HS_IsRedirectionRequest" 
        . "&HS_MerchantId=$HS_MerchantId" 
        . "&HS_StoreId=$HS_StoreId" 
        . "&HS_ReturnURL=$HS_ReturnURL"
        . "&HS_MerchantHash=$HS_MerchantHash"
        . "&HS_MerchantUsername=$HS_MerchantUsername"
        . "&HS_MerchantPassword=$HS_MerchantPassword"
        . "&HS_TransactionReferenceNumber=$HS_TransactionReferenceNumber";

        $cipher_text = openssl_encrypt($mapString, $cipher, $Key1,   OPENSSL_RAW_DATA , $Key2);
        $hashRequest = base64_encode($cipher_text); 

        //The data you want to send via POST
        $fields = [
            "HS_ChannelId"=>$HS_ChannelId,
            "HS_IsRedirectionRequest"=>$HS_IsRedirectionRequest,
            "HS_MerchantId"=> $HS_MerchantId,
            "HS_StoreId"=> $HS_StoreId,
            "HS_ReturnURL"=> $HS_ReturnURL,
            "HS_MerchantHash"=> $HS_MerchantHash,
            "HS_MerchantUsername"=> $HS_MerchantUsername,
            "HS_MerchantPassword"=> $HS_MerchantPassword,
            "HS_TransactionReferenceNumber"=> $HS_TransactionReferenceNumber,
            "HS_RequestHash"=> $hashRequest
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        //execute post
        $result = curl_exec($ch);

        $handshake =  json_decode($result);

        $AuthToken = $handshake->AuthToken;


        // echo $result ."<br>";
        // echo $AuthToken ."<br>";


        /* ==============SSO CALL ================*/

        // you need Auth Token & Amount Here before Hashing

        $RequestHash1 = NULL;
        $Currency = "PKR";
        $IsBIN =0;

        $mapStringSSo = 
        "AuthToken=$AuthToken" 
        . "&RequestHash=$RequestHash1" 
        . "&ChannelId=$HS_ChannelId"
        . "&Currency=$Currency"
        . "&IsBIN=$IsBIN"
        . "&ReturnURL=$HS_ReturnURL"
        . "&MerchantId=$HS_MerchantId"
        . "&StoreId=$HS_StoreId" 
        . "&MerchantHash=$HS_MerchantHash"
        . "&MerchantUsername=$HS_MerchantUsername"
        . "&MerchantPassword=$HS_MerchantPassword"
        . "&TransactionTypeId=3"
        . "&TransactionReferenceNumber=$HS_TransactionReferenceNumber"
        . "&TransactionAmount=$TransactionAmount"; 

        //echo $mapStringSSo."<br>";
                
        $cipher_text = openssl_encrypt($mapStringSSo, $cipher, $Key1,   OPENSSL_RAW_DATA , $Key2);
        $hashRequest1 = base64_encode($cipher_text);


        $data['AuthToken'] = $AuthToken;
        $data['hashRequest1'] = $hashRequest1;

        // ******  Alfalha Code End Here ***

        
        $guestinfo = DB::table('guestinfo')->insert(
            array(
                'event_id' =>  $event_id,
                'email' =>  $email,
                'first_name' =>  $first_name,
                'last_name' => $last_name,
                'mobile' =>  $mobile,
                // 'payment_id' =>  $payment_id,
                'payment_id' =>  $bankorderId,
                'document_type' =>  $document_type,
                'document_number' =>  $document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
                'status' =>  $status,
                'created_date' =>  date('Y-m-d H:i:s')
            )
        );

        $check = DB::table('event_booking_temp')->insert(
            array(
                'user_id' =>  $user_id,
                'payment_id' =>  $bankorderId,
                // 'payment_id' =>  $payment_id,
                // 'paccess_token' =>  $paccess_token,
                // 'token_id' => $token,
                'event_id' =>  $event_id,
                'start_date' =>  $start_date,
                'end_date' =>  $end_date,
                'total_amount' => round($price),
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        return view('front/apg/apg', $data);
        // return redirect($link);
    }

    public function event_payment_successful(Request $request)
    {
        $order_id = $_GET['O'];
        $url = "https://sandbox.bankalfalah.com/HS/api/IPN/OrderStatus/19513/024984/".$order_id;
    
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL,  $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $result =  json_decode($jsonData);

        if (Auth::check()) {
            $user_id =  Auth::id();
        } else {
            $user_id = '';
        }
        $paymentId = $_GET['O'];

        // $paymentId = $_GET['paymentId'];
        // $token = $_GET['token'];
        // $PayerID = $_GET['PayerID'];
        // $paccess_token = '';
        $bookingtemp = DB::table('event_booking_temp')->where('payment_id', '=', $paymentId)->first();
        $eventData = DB::table('events')->where('id', $bookingtemp->event_id)->where('status', 1)->first();
        $userData = DB::table('guestinfo')->where('payment_id', $paymentId)->where('status', 1)->first();
        $vendor_id = $eventData->vendor_id;
        $check_guest_user = 0;
        if (!empty($bookingtemp)) {
            // $paccess_token = $bookingtemp->paccess_token;
            // $data1 = '{
            // "payer_id": "' . $PayerID . '"
            // }';

            // $ch = curl_init();

            // curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment/" . $paymentId . "/execute");
            // /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/payments/payment”);*/
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $paccess_token));
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $result = curl_exec($ch);

            // $resulspays = json_decode($result);

            // $cartid = $resulspays->cart;
            // $pstatus = $resulspays->state;
            // $paymethod = $resulspays->payer->payment_method;

            // $pemail = $resulspays->payer->payer_info->email;
            $uemail = $userData->email;
            // $pfirst_name = $resulspays->payer->payer_info->first_name;
            $ufirst_name = $userData->first_name;
            // $plast_name = $resulspays->payer->payer_info->last_name;
            $ulast_name = $userData->last_name;
            // $payer_id = $resulspays->payer->payer_info->payer_id;

            // $srecipient_name = $resulspays->payer->payer_info->shipping_address->recipient_name;
            // $sadd_line1 = $resulspays->payer->payer_info->shipping_address->line1;
            // $sadd_line2 = !empty($resulspays->payer->payer_info->shipping_address->line2) ?  $resulspays->payer->payer_info->shipping_address->line2 : '';
            // $scity = $resulspays->payer->payer_info->shipping_address->city;
            // $sstate = $resulspays->payer->payer_info->shipping_address->state;
            // $spostal_code = $resulspays->payer->payer_info->shipping_address->postal_code;
            // $scountry_code = $resulspays->payer->payer_info->shipping_address->country_code;

            // $phone = !empty($resulspays->payer->payer_info->phone) ?  $resulspays->payer->payer_info->phone : '';
            $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
            // $country_code = $resulspays->payer->payer_info->country_code;
            // $business_name = !empty($resulspays->payer->payer_info->business_name) ?  $resulspays->payer->payer_info->business_name : '';

            // $total_amount = $resulspays->transactions[0]->amount->total;
            // $currency = $resulspays->transactions[0]->amount->currency;

            // $merchant_id = $resulspays->transactions[0]->payee->merchant_id;
            // $merchant_email = $resulspays->transactions[0]->payee->email;
            $password = "roadnstays@123";
            $password = bcrypt($password);
            // curl_close($ch);
            if (empty($user_id)) {

                $checkuser = DB::table('users')->where('email', $uemail)->first();

                if (!empty($checkuser)) {

                    $user_id = $checkuser->id;
                    $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
                } else {
                    $check_guest_user = 1;
                    DB::table('users')->insert(
                        [
                            'first_name' =>  $ufirst_name,
                            'last_name' =>  $ulast_name,
                            'email' =>  $uemail,
                            'user_type' => 'normal_user',
                            'contact_number' =>  $uphone,
                            'document_type' =>  $userData->document_type,
                            'document_number' =>  $userData->document_number,
                            'front_document_img' =>  $userData->front_document_img,
                            'back_document_img' =>  $userData->back_document_img,
                            'password' =>  $password,
                            'role_id' =>  2,
                            'is_verify_email' => 0,
                            'register_by' =>  'web',
                            'status' => 1,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'created_at' =>  date('Y-m-d H:i:s')
                        ]
                    );

                    $user_id = DB::getpdo()->lastInsertId();
                }
            }
        }
        $checkorder = DB::table('event_booking')->where('payment_token', '=', $result->TransactionId)->first();

        $data['payment_status'] = $result->TransactionStatus;
        if($result->TransactionStatus=="Paid")
        {
            $booking_status = "confirmed";
        }else{
            $booking_status = "pending";
        }
        
        if(empty($checkorder)) {

            DB::table('event_booking')->insert(
                [
                    'user_id' =>  $user_id,
                    'event_id' => $bookingtemp->event_id,
                    'total_amount' =>  $bookingtemp->total_amount,
                    'booking_status' => $booking_status,
                    'payment_status' => $result->TransactionStatus,
                    'payment_type' => $result->TransactionTypeId,
                    'payment_id' => $result->TransactionReferenceNumber,
                    'payment_token' => $result->TransactionId,
                    
                    // 'payment_status' => 'successful',
                    // 'payment_type' => $paymethod,
                    // 'payment_id' => $paymentId,
                    // 'payment_token' => $token,
                    // 'payer_id' => $PayerID,
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $booking_id = DB::getpdo()->lastInsertId();

            DB::table('payment_transaction')->insert(
                [
                    'booking_id' => $booking_id,
                    'user_id' =>  $user_id,
                    'vendor_id' =>  $vendor_id,
                    // 'txn_id' => $cartid,
                    'txn_id' => $result->TransactionId,
                    'txn_amount' =>  $bookingtemp->total_amount,
                    // 'payment_method' => $paymethod,
                    'payment_method' => 'ALFA',
                    'booking_type' => 'Event',
                    'txn_status' =>  'successful',
                    'txn_date' => date('Y-m-d H:i:s'),
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $check = true;

            if ($check) {
                $users = User::where('id', '=', $user_id)->first();
                $data['user_info'] = $users;
                $data['booking_id'] = $booking_id;
                $data['url'] = url('/');
                $data['order_info'] =  DB::table('event_booking')
                    ->join('users', 'users.id', '=', 'event_booking.user_id')
                    ->join('events', 'events.id', '=', 'event_booking.event_id')
                    ->where('event_booking.id', $booking_id)
                    ->where('users.status', 1)
                    ->select('event_booking.*', 'events.*','event_booking.id as booki_id', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
                    ->first();

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $users->email;
                    Mail::send('emails.event-invoice', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to($inData['email']);
                        $message->subject('roadNstays - Event Booking Confirmation Mail');
                    });
                    if($check_guest_user === 1){
                        $usr_data = array('user_id'=>$users->id,'name'=>"User",'first_name'=>$users->first_name,'last_name'=>$users->last_name,'email'=>$users->email,'password'=>"roadnstays@123");
                        Mail::send('emails.signup_template', $usr_data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'RoadNStays');
                            $message->to($inData['email']);
                            $message->subject('RoadNStays - User E-mail Verification');
                        });
                    }

                    $data['url'] = url('/admin_login');

                    $data['status'] = 'created to user';

                    $data['booking_id'] = $booking_id;

                    Mail::send('emails.event-invoice-reciever', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to('votivephppushpendra@gmail.com');
                        $message->subject('roadNstays - New Event Booking Recieved Mail');
                    });
                }

                // $tourData = DB::table('tour_list')->where('id',$bookingtemp->tour_id)->where('tour_status', 1)->first();
                // $vendor_id = $tourData->vendor_id;
                $vendors = User::where('id', '=', $vendor_id)->get();

                //print_r($vendors);die;
                $vendor_counts = count($vendors);
                if (!empty($vendors)) {
                    if ($_SERVER['SERVER_NAME'] != 'localhost') {

                        $data['first_name'] = $vendors['0']->first_name;

                        $data['status'] = 'Booking Tour';

                        $data['booking_id'] = $booking_id;

                        $fromEmail = Helper::getFromEmail();
                        $inData['from_email'] = $fromEmail;
                        $inData['email'] = $vendors['0']->email;
                        Mail::send('emails.event-invoice-reciever', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstays');
                            $message->to($inData['email']);
                            $message->subject('roadNstays - Order assigned');
                        });
                    }
                }
                Session::get('total_amt');
                if($check_guest_user === 0){
                    if(Auth::check()){
                        session::flash('message', 'Booking created Succesfully.');
                    }else{
                        session::flash('message', 'To view your booking Please! do signin into your account');
                    }
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
                }
                // session::flash('message', 'Order created Succesfully.');
                return view('front/event/confirm_booking', $data);
            } else {
                session::flash('error', 'Record not inserted.');
                return redirect('/');
            }
        } else {
            $data['booking_id'] = $checkorder->id;
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['booking_id'] =  $checkorder->id;
            $data['url'] = url('/');
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['url'] = url('/');
            $data['order_info'] =  DB::table('event_booking')
                ->join('users', 'users.id', '=', 'event_booking.user_id')
                ->join('events', 'events.id', '=', 'event_booking.event_id')
                ->where('event_booking.id', $checkorder->id)
                ->where('users.status', 1)
                ->select('event_booking.*', 'events.*','event_booking.id as booki_id', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
                ->first();

            if($check_guest_user === 0){
                if(Auth::check()){
                    session::flash('message', 'Booking created Succesfully.');
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account');
                }
            }else{
                session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
            }   
        }
        // session::flash('message', 'Booking created Succesfully.');
        return view('front/event/confirm_booking', $data);
    }

    
    // public function eventBookingOrder_old_Paypal(Request $request)
    // {
    //     //print_r($request->all());die;
    //     $event_id = $request->event_id;
    //     $user_id = $request->user_id;
    //     $price = $request->price;
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;
    //     $email = $request->email;
    //     $first_name = $request->first_name;
    //     $last_name = $request->last_name;
    //     $mobile = $request->mobile;
    //     $document_type = $request->document_type;
    //     $document_number = $request->document_number;
    //     if ($request->hasFile('front_document_img')) {
    //         $image_name = $request->file('front_document_img')->getClientOriginalName();
    //         $filename = pathinfo($image_name, PATHINFO_FILENAME);
    //         $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
    //         $front_document_img = $filename . '-' . time() . '.' . $image_ext;
    //         $path = base_path() . '/public/uploads/user_document/';
    //         $request->file('front_document_img')->move($path, $front_document_img);
    //     }
    //     if ($request->hasFile('back_document_img')) {
    //         $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
    //         $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
    //         $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
    //         $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
    //         $pat2 = base_path() . '/public/uploads/user_document';
    //         $request->file('back_document_img')->move($pat2, $back_document_img);
    //     }
    //     $status = 1;
    //     //echo "<pre>"; print_r($forminput);die;
    //     // $client="AcwBj1jBaPuIaGvVF4WCqtT8PMe8XVlNLriyqP2JVlFViJQpJbmF-CMsTnqI9TOA0Z6kWeD3uG5R0xvO";
    //     // $secret="EPZ31KCn1aSfHzEkjdV6fI_A31vdzcbhVhV-fkc0GFKvc_WVJZPoKOCAw8TNmhKQVAF4pW46iaDpmznd";

    //     $client = "AVEgpnihV9nIWSO15Cg-SWM-TcA9_nKFqH_xA_gzoRmdpRw_dQNlB65G-fzbjr6dz5tUTr-ITCLbJ2Yn";
    //     $secret = "EFB-JdeQkwgkqOf7fAf5wIIDC1ed_67MDjU_2SSySwnzTnQu4v-DciM75nirTa7qJGeXL4_cdmIK6HEh";

    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
    //     curl_setopt($ch, CURLOPT_HEADER, false);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_USERPWD, $client . ":" . $secret);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

    //     $result = curl_exec($ch);

    //     if (empty($result)) die("Error: No response.");
    //     else {
    //         $json = json_decode($result);

    //         $paccess_token = $json->access_token;
    //     }

    //     $data = '{
    //       "intent":"sale",
    //       "redirect_urls":{
    //         "return_url":"' . url('/event-payment-successful') . '",
    //         "cancel_url":"' . url('/payment-cancelled') . '"
    //       },
    //       "payer":{
    //         "payment_method":"paypal"
    //       },
    //       "transactions":[
    //         {
    //           "amount":{
    //             "total":' . round($price) . ',
    //             "currency":"USD"
    //           },
    //           "description":"This is the payment transaction description."
    //         }
    //       ]
    //     }';

    //     curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt(
    //         $ch,
    //         CURLOPT_HTTPHEADER,
    //         array(
    //             "Content-Type: application/json",
    //             "Authorization: Bearer " . $json->access_token,
    //             "Content-length: " . strlen($data)
    //         )
    //     );

    //     $result = curl_exec($ch);
    //     $json = json_decode($result);

    //     //print_r($json);die;
    //     $link = $json->links[1]->href;
    //     $tokenlink = $json->links[1]->href;
    //     $link_array = explode('&token=', $tokenlink);
    //     $token = end($link_array);

    //     $state = $json->state;

    //     $payment_id = $json->id;

    //     $guestinfo = DB::table('guestinfo')->insert(
    //         array(
    //             'event_id' =>  $event_id,
    //             'email' =>  $email,
    //             'first_name' =>  $first_name,
    //             'last_name' => $last_name,
    //             'mobile' =>  $mobile,
    //             'payment_id' =>  $payment_id,
    //             'document_type' =>  $document_type,
    //             'document_number' =>  $document_number,
    //             'front_document_img' =>  $front_document_img,
    //             'back_document_img' =>  $back_document_img,
    //             'status' =>  $status,
    //             'created_date' =>  date('Y-m-d H:i:s')
    //         )
    //     );

    //     $check = DB::table('event_booking_temp')->insert(
    //         array(
    //             'user_id' =>  $user_id,
    //             'payment_id' =>  $payment_id,
    //             'paccess_token' =>  $paccess_token,
    //             'token_id' => $token,
    //             'event_id' =>  $event_id,
    //             'start_date' =>  $start_date,
    //             'end_date' =>  $end_date,
    //             'total_amount' => round($price),
    //             'created_at' =>  date('Y-m-d H:i:s')
    //         )
    //     );

    //     return redirect($link);
    // }

    // public function event_payment_successful_old_Paypal(Request $request)
    // {
    //     if (Auth::check()) {
    //         $user_id =  Auth::id();
    //     } else {
    //         $user_id = '';
    //     }
    //     $paymentId = $_GET['paymentId'];
    //     $token = $_GET['token'];
    //     $PayerID = $_GET['PayerID'];
    //     $paccess_token = '';
    //     $bookingtemp = DB::table('event_booking_temp')->where('payment_id', '=', $paymentId)->first();
    //     $eventData = DB::table('events')->where('id', $bookingtemp->event_id)->where('status', 1)->first();
    //     $userData = DB::table('guestinfo')->where('payment_id', $paymentId)->where('status', 1)->first();
    //     $vendor_id = $eventData->vendor_id;
    //     $check_guest_user = 0;
    //     if (!empty($bookingtemp)) {
    //         $paccess_token = $bookingtemp->paccess_token;
    //         $data1 = '{
    //         "payer_id": "' . $PayerID . '"
    //         }';

    //         $ch = curl_init();

    //         curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment/" . $paymentId . "/execute");
    //         /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/payments/payment”);*/
    //         curl_setopt($ch, CURLOPT_POST, true);
    //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    //         curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $paccess_token));
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         $result = curl_exec($ch);

    //         $resulspays = json_decode($result);

    //         $cartid = $resulspays->cart;
    //         $pstatus = $resulspays->state;
    //         $paymethod = $resulspays->payer->payment_method;

    //         $pemail = $resulspays->payer->payer_info->email;
    //         $uemail = $userData->email;
    //         $pfirst_name = $resulspays->payer->payer_info->first_name;
    //         $ufirst_name = $userData->first_name;
    //         $plast_name = $resulspays->payer->payer_info->last_name;
    //         $ulast_name = $userData->last_name;
    //         $payer_id = $resulspays->payer->payer_info->payer_id;

    //         $srecipient_name = $resulspays->payer->payer_info->shipping_address->recipient_name;
    //         $sadd_line1 = $resulspays->payer->payer_info->shipping_address->line1;
    //         $sadd_line2 = !empty($resulspays->payer->payer_info->shipping_address->line2) ?  $resulspays->payer->payer_info->shipping_address->line2 : '';
    //         $scity = $resulspays->payer->payer_info->shipping_address->city;
    //         $sstate = $resulspays->payer->payer_info->shipping_address->state;
    //         $spostal_code = $resulspays->payer->payer_info->shipping_address->postal_code;
    //         $scountry_code = $resulspays->payer->payer_info->shipping_address->country_code;

    //         $phone = !empty($resulspays->payer->payer_info->phone) ?  $resulspays->payer->payer_info->phone : '';
    //         $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
    //         $country_code = $resulspays->payer->payer_info->country_code;
    //         $business_name = !empty($resulspays->payer->payer_info->business_name) ?  $resulspays->payer->payer_info->business_name : '';

    //         $total_amount = $resulspays->transactions[0]->amount->total;
    //         $currency = $resulspays->transactions[0]->amount->currency;

    //         $merchant_id = $resulspays->transactions[0]->payee->merchant_id;
    //         $merchant_email = $resulspays->transactions[0]->payee->email;
    //         $password = "roadnstays@123";
    //         $password = bcrypt($password);
    //         curl_close($ch);
    //         if (empty($user_id)) {

    //             $checkuser = DB::table('users')->where('email', $pemail)->first();

    //             if (!empty($checkuser)) {

    //                 $user_id = $checkuser->id;
    //                 $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
    //             } else {
    //                 $check_guest_user = 1;
    //                 DB::table('users')->insert(
    //                     [
    //                         'first_name' =>  $ufirst_name,
    //                         'last_name' =>  $ulast_name,
    //                         'email' =>  $uemail,
    //                         'user_type' => 'normal_user',
    //                         'contact_number' =>  $uphone,
    //                         'document_type' =>  $userData->document_type,
    //                         'document_number' =>  $userData->document_number,
    //                         'front_document_img' =>  $userData->front_document_img,
    //                         'back_document_img' =>  $userData->back_document_img,
    //                         'password' =>  $password,
    //                         'role_id' =>  2,
    //                         'is_verify_email' => 0,
    //                         'register_by' =>  'web',
    //                         'status' => 1,
    //                         'updated_at' => date('Y-m-d H:i:s'),
    //                         'created_at' =>  date('Y-m-d H:i:s')
    //                     ]
    //                 );

    //                 $user_id = DB::getpdo()->lastInsertId();
    //             }
    //         }
    //     }
    //     $checkorder = DB::table('event_booking')->where('payment_token', '=', $token)->first();

    //     if(empty($checkorder)) {

    //         DB::table('event_booking')->insert(
    //             [
    //                 'user_id' =>  $user_id,
    //                 'event_id' => $bookingtemp->event_id,
    //                 'total_amount' =>  $bookingtemp->total_amount,
    //                 'booking_status' => "pending",
    //                 'payment_status' => 'successful',
    //                 'payment_type' => $paymethod,
    //                 'payment_id' => $paymentId,
    //                 'payment_token' => $token,
    //                 'payer_id' => $PayerID,
    //                 'created_at' =>  date('Y-m-d H:i:s')
    //             ]
    //         );

    //         $booking_id = DB::getpdo()->lastInsertId();

    //         DB::table('payment_transaction')->insert(
    //             [
    //                 'booking_id' => $booking_id,
    //                 'user_id' =>  $user_id,
    //                 'vendor_id' =>  $vendor_id,
    //                 'txn_id' => $cartid,
    //                 'txn_amount' =>  $bookingtemp->total_amount,
    //                 'payment_method' => $paymethod,
    //                 'booking_type' => 'Event',
    //                 'txn_status' =>  'successful',
    //                 'txn_date' => date('Y-m-d H:i:s'),
    //                 'created_at' =>  date('Y-m-d H:i:s')
    //             ]
    //         );

    //         $check = true;

    //         if ($check) {
    //             $users = User::where('id', '=', $user_id)->first();
    //             $data['user_info'] = $users;
    //             $data['booking_id'] = $booking_id;
    //             $data['url'] = url('/');
    //             $data['order_info'] =  DB::table('event_booking')
    //                 ->join('users', 'users.id', '=', 'event_booking.user_id')
    //                 ->join('events', 'events.id', '=', 'event_booking.event_id')
    //                 ->where('event_booking.id', $booking_id)
    //                 ->where('users.status', 1)
    //                 ->select('event_booking.*', 'events.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
    //                 ->first();

    //             if ($_SERVER['SERVER_NAME'] != 'localhost') {

    //                 $fromEmail = Helper::getFromEmail();
    //                 $inData['from_email'] = $fromEmail;
    //                 $inData['email'] = $users->email;
    //                 Mail::send('emails.event-invoice', $data, function ($message) use ($inData) {
    //                     $message->from($inData['from_email'], 'roadNstays');
    //                     $message->to($inData['email']);
    //                     $message->subject('roadNstays - Event Booking Confirmation Mail');
    //                 });
    //                 if($check_guest_user === 1){
    //                     $usr_data = array('user_id'=>$users->id,'name'=>"User",'first_name'=>$users->first_name,'last_name'=>$users->last_name,'email'=>$users->email,'password'=>"roadnstays@123");
    //                     Mail::send('emails.signup_template', $usr_data, function ($message) use ($inData) {
    //                         $message->from($inData['from_email'], 'RoadNStays');
    //                         $message->to($inData['email']);
    //                         $message->subject('RoadNStays - User E-mail Verification');
    //                     });
    //                 }

    //                 $data['url'] = url('/admin_login');

    //                 $data['status'] = 'created to user';

    //                 $data['booking_id'] = $booking_id;

    //                 Mail::send('emails.event-invoice-reciever', $data, function ($message) use ($inData) {
    //                     $message->from($inData['from_email'], 'roadNstays');
    //                     $message->to('votivephppushpendra@gmail.com');
    //                     $message->subject('roadNstays - New Event Booking Recieved Mail');
    //                 });
    //             }

    //             // $tourData = DB::table('tour_list')->where('id',$bookingtemp->tour_id)->where('tour_status', 1)->first();
    //             // $vendor_id = $tourData->vendor_id;
    //             $vendors = User::where('id', '=', $vendor_id)->get();

    //             //print_r($vendors);die;
    //             $vendor_counts = count($vendors);
    //             if (!empty($vendors)) {
    //                 if ($_SERVER['SERVER_NAME'] != 'localhost') {

    //                     $data['first_name'] = $vendors['0']->first_name;

    //                     $data['status'] = 'Booking Tour';

    //                     $data['booking_id'] = $booking_id;

    //                     $fromEmail = Helper::getFromEmail();
    //                     $inData['from_email'] = $fromEmail;
    //                     $inData['email'] = $vendors['0']->email;
    //                     Mail::send('emails.event-invoice-reciever', $data, function ($message) use ($inData) {
    //                         $message->from($inData['from_email'], 'roadNstays');
    //                         $message->to($inData['email']);
    //                         $message->subject('roadNstays - Order assigned');
    //                     });
    //                 }
    //             }
    //             Session::get('total_amt');
    //             if($check_guest_user === 0){
    //             }else{
    //                 session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
    //             }
    //             // session::flash('message', 'Order created Succesfully.');
    //             return view('front/event/confirm_booking', $data);
    //         } else {
    //             session::flash('error', 'Record not inserted.');
    //             return redirect('/');
    //         }
    //     } else {
    //         $data['booking_id'] = $checkorder->id;
    //         $users = User::where('id', '=', $user_id)->first();
    //         $data['user_info'] = $users;
    //         $data['booking_id'] =  $checkorder->id;
    //         $data['url'] = url('/');
    //         $users = User::where('id', '=', $user_id)->first();
    //         $data['user_info'] = $users;
    //         $data['url'] = url('/');
    //         $data['order_info'] =  DB::table('event_booking')
    //             ->join('users', 'users.id', '=', 'event_booking.user_id')
    //             ->join('events', 'events.id', '=', 'event_booking.event_id')
    //             ->where('event_booking.id', $checkorder->id)
    //             ->where('users.status', 1)
    //             ->select('event_booking.*', 'events.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
    //             ->first();
    //     }
    //     session::flash('message', 'Booking created Succesfully.');
    //     return view('front/event/confirm_booking', $data);
    // }

    public function tour_enquiry()
    {
        return view('front/tour/tour_enquiry');
    }

    public function tour()
    {
        $data['tour_data'] = DB::table('tour_list')->orderby('id', 'DESC')->get();
        $data['tour_data_countries'] = DB::table('tour_list')
            ->select('tour_list.*', 'country.name as country_name')
            ->join('country', 'tour_list.country_id', '=', 'country.id')
            ->orderby('tour_list.tour_price', 'ASC')
            ->groupBy('tour_list.country_id')->get();
        $data['tour_city'] = DB::table('tour_list')->orderby('id', 'DESC')->groupBy('city')->get('city');
        //echo "<pre>"; print_r($data);die;
        return view('front/tour/tour')->with($data);
    }
    
    public function tour_list(Request $request)
    {
        if (count($request->all()) >= 1) {
            if (isset($request->destination)) {
                $destination = $request->destination;
            } else {
                //$destination = Session::get('destination');

                $destination = '';
            }

            if (isset($request->duration)) {
                $duration = base64_decode($request->duration);
            } else {
                //$duration = Session::get('duration');
                $duration = '';
            }

            //Session::put('destination', $destination);

            $data['tour_data'] = DB::table('tour_itinerary')
            ->join('tour_list', 'tour_list.id', '=', 'tour_itinerary.tour_id')
            ->where('tour_itinerary.place_from', $destination)
            ->orWhere('tour_itinerary.place_to', $destination)
            ->where('tour_list.status', '=', 1)
            ->where('tour_list.tour_status', '=', 'available')
            ->groupBy('tour_itinerary.tour_id')->paginate(10);

            // echo "<pre>";print_r($data);die;
            // $data['tour_data'] = DB::table('tour_list')
            //     ->where('city', 'like', '%' . $destination . '%')
            //     ->orWhere('tour_title', 'like', '%' . $destination . '%')
            //     ->where('tour_days', 'like', '%' . $duration . '%')
            //     ->where('status', '=', 1)
            //     ->where('tour_status', '=', 'available')
            //     ->orderby('id', 'DESC')
            //     ->paginate(10);
            $data['tour_city'] = DB::table('tour_list')->orderby('id', 'DESC')->groupBy('city')->get('city');
            // echo "<pre>";print_r($data['tour_data']);die;
            return view('front.tour.tour_list')->with($data);
        } else {

             // $data['tour_data'] = DB::table('tour_list')
             //    ->where('status', '=', 1)
             //    ->where('tour_status', '=', 'available')
             //    ->orderby('id', 'DESC')
             //    ->paginate(10);
            $data['tour_data'] = DB::table('tour_itinerary')
            ->join('tour_list', 'tour_list.id', '=', 'tour_itinerary.tour_id')
            //->where('tour_itinerary.place_from', $destination)
            ->where('tour_list.status', '=', 1)
            ->where('tour_list.tour_status', '=', 'available')
            ->groupBy('tour_itinerary.tour_id')->paginate(10);

            $data['tour_city'] = DB::table('tour_list')->orderby('id', 'DESC')->groupBy('city')->get('city');

            return view('front.tour.tour_list')->with($data);
        }
    }

    public function tour_list_country($id)
    {

        $data['tour_data'] = DB::table('tour_list')->where('country_id', $id)->orderby('id', 'DESC')->get();

        $data['tour_details'] = DB::table('tour_list')->where('country_id', $id)->orderby('id', 'DESC')->first();
        $data['tour_data_countries'] = DB::table('tour_list')
            ->select('tour_list.*', 'country.name as country_name')
            ->join('country', 'tour_list.country_id', '=', 'country.id')
            ->orderby('tour_list.tour_price', 'ASC')
            ->groupBy('tour_list.country_id')->get();
        $data['country_id'] = $id;
        return view('front/tour/tour_list_country')->with($data);
    }

   

    public function packages()
    {
        return view('front/packages/packages');
    }

    public function tour_details($id)
    {
        $tour_id = $id;
        $data['tour_details'] = DB::table('tour_list')->where('id', $tour_id)->first();
        $data['tour_itinerary'] = DB::table('tour_itinerary')->where('tour_id', $tour_id)->get();
        $data['tour_gallery'] = DB::table('tour_gallery')->where('tour_id', $tour_id)->get();
        $data['tour_booked_count'] = DB::table('tour_booking')->where('tour_id', $tour_id)->where('payment_status','Paid')->where('booking_status', '!=', 'canceled')->count();
        $data['tour_pickup_locations'] = DB::table('tour_pickup_locations')->where('tour_id', $tour_id)->get();

        // tour_max_capacity
        // echo "<pre>";print_r($data['tour_booked_count']); die;
        // $vendor = DB::table('users')->where('id', $data['tour_details']->vendor_id)->first();
        // echo "<pre>";print_r($data['tour_details']); die;
        return view('front/tour/tour_details')->with($data);
    }

    public function tourBooking(Request $request)
    {   
        //echo "dd";die;
        $u_id = Auth::id();
        $tour_id = $request->id;
        $data['tour_details'] = DB::table('tour_list')->where('id', $tour_id)->first();
        $checkRequest = 0;
        $tour_booking_request = [];
        if(Auth::check()){
            $data['request_data'] = DB::table('tour_booking_request')->where('tour_id', $tour_id)->get();
            foreach($data['request_data'] as $reqData){
                if($reqData->user_id ==Auth::id())
                {
                    $tour_booking_request = $reqData;
                    $checkRequest = 1; 
                }
            }
        }

        // echo "<pre>";print_r($tour_booking_request);die;
        $data['checkRequest'] = $checkRequest;
        $data['tour_booking_request'] = $tour_booking_request;

        if(!empty($tour_booking_request))
        {
            $data['details'] = DB::table('tour_booking_request')
                ->join('users', 'tour_booking_request.user_id', '=', 'users.id')
                ->join('tour_list', 'tour_booking_request.tour_id', '=', 'tour_list.id')
                ->select(
                    'tour_booking_request.*',
                    'users.user_type',
                    'users.first_name as user_first_name',
                    'users.last_name as user_last_name',
                    'users.email as user_email',
                    'users.contact_number as user_contact_num',
                    'users.role_id as user_role_id',
                    'users.is_verify_email as user_email_is_verify_email',
                    'users.is_verify_contact as user_contact_is_verify_contact',
                    'tour_list.tour_title',
                    'tour_list.vendor_id',
                    'tour_list.tour_start_date as tour_start_date',
                    'tour_list.tour_end_date',
                    'tour_list.tour_price',
                    'tour_list.tour_days',
                    'tour_list.city',
                    'tour_list.booking_option'
                )
                ->where('tour_booking_request.id', $tour_booking_request->id)
                ->first();
        }        
        $data['tour_pickup_locations'] = DB::table('tour_pickup_locations')->where('tour_id', $tour_id)->get(); 
        // $check_existing_booking = DB::table('tour_booking')->where('tour_id', $tour_id)->where('user_id', $u_id)->get();

        // echo "<pre>"; print_r(Auth::id());
        // echo "<pre>"; print_r($data['checkRequest']);
        // echo "<pre>"; print_r($data['tour_booking_request']);die;
        // echo "<pre>"; print_r($data);die;
        return view('front/tour/tour-booking')->with($data);
    }

    public function tourBookingOrder(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $tour_id = $request->tour_id;
        $user_id = $request->user_id;
        $tour_price = $request->total_amount;
        
        if(!empty($request->online_payable_amount) and $request->online_payable_amount > 0)
        {
            $online_payable_amount = $request->online_payable_amount;
            $remaining_amount_to_pay = $request->at_desk_payable_amount;
            $partial_payment_status = $request->partial_payment_status;
        }else{
            $online_payable_amount = $tour_price;
            $remaining_amount_to_pay = $request->at_desk_payable_amount;
            $partial_payment_status = $request->partial_payment_status;
        }
        // echo "<pre>";print_r($online_payable_amount);die;
        $tour_start_date = $request->tour_start_date;
        $tour_end_date = $request->tour_end_date;
        $email = $request->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $mobile = $request->mobile;
        $document_type = $request->document_type;
        $document_number = $request->document_number;
        if ($request->hasFile('front_document_img')) {
            $image_name = $request->file('front_document_img')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
            $front_document_img = $filename . '-' . time() . '.' . $image_ext;
            $path = base_path() . '/public/uploads/user_document/';
            $request->file('front_document_img')->move($path, $front_document_img);
        }
        if ($request->hasFile('back_document_img')) {
            $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
            $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/user_document';
            $request->file('back_document_img')->move($pat2, $back_document_img);
        }
        $status = 1;

        // //echo "<pre>"; print_r($forminput);die;
        // // $client="AcwBj1jBaPuIaGvVF4WCqtT8PMe8XVlNLriyqP2JVlFViJQpJbmF-CMsTnqI9TOA0Z6kWeD3uG5R0xvO";
        // // $secret="EPZ31KCn1aSfHzEkjdV6fI_A31vdzcbhVhV-fkc0GFKvc_WVJZPoKOCAw8TNmhKQVAF4pW46iaDpmznd";

        // $client = "AVEgpnihV9nIWSO15Cg-SWM-TcA9_nKFqH_xA_gzoRmdpRw_dQNlB65G-fzbjr6dz5tUTr-ITCLbJ2Yn";
        // $secret = "EFB-JdeQkwgkqOf7fAf5wIIDC1ed_67MDjU_2SSySwnzTnQu4v-DciM75nirTa7qJGeXL4_cdmIK6HEh";

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        // curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_USERPWD, $client . ":" . $secret);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        // $result = curl_exec($ch);

        // if (empty($result)) die("Error: No response.");
        // else {
        //     $json = json_decode($result);

        //     $paccess_token = $json->access_token;
        // }

        // $data = '{
        //   "intent":"sale",
        //   "redirect_urls":{
        //     "return_url":"' . url('/tour-payment-successful') . '",
        //     "cancel_url":"' . url('/payment-cancelled') . '"
        //   },
        //   "payer":{
        //     "payment_method":"paypal"
        //   },
        //   "transactions":[
        //     {
        //       "amount":{
        //         "total":' . round($tour_price) . ',
        //         "currency":"USD"
        //       },
        //       "description":"This is the payment transaction description."
        //     }
        //   ]
        // }';

        // curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt(
        //     $ch,
        //     CURLOPT_HTTPHEADER,
        //     array(
        //         "Content-Type: application/json",
        //         "Authorization: Bearer " . $json->access_token,
        //         "Content-length: " . strlen($data)
        //     )
        // );

        // $result = curl_exec($ch);
        // $json = json_decode($result);
        // $link = $json->links[1]->href;
        // $tokenlink = $json->links[1]->href;
        // $link_array = explode('&token=', $tokenlink);
        // $token = end($link_array);

        // $state = $json->state;

        // $payment_id = $json->id;

        $bankorderId   = rand(0,1786612);
        $data['bankorderId'] = $bankorderId;

        $tour_details = DB::table('tour_list')->where('id', $tour_id)->first();

        $data['title'] = $tour_details->tour_title;
        $data['address'] = $tour_details->address;
        
        $data['tour_id'] = $tour_id;
        $data['user_id']  = $user_id;
        $data['price']  = $online_payable_amount;
        $data['start_date'] = $tour_start_date;
        $data['end_date'] = $tour_end_date;
        $data['email'] = $email;
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['mobile'] = $mobile;
        $data['document_type'] = $document_type;
        $data['document_number'] = $document_number;

        $url = "https://sandbox.bankalfalah.com/HS/HS/HS";

        //$url = "https://payments.bankalfalah.com/HS/HS/HS";
            
        // $bankorderId   = $this->session->userdata('bankorderId');
        // $bankorderId   = rand(0,1786612);


        $Key1= "wgqW8C9uQG8EntcW";
        $Key2= "6620721616357136";
        $HS_ChannelId="1001";
        $HS_MerchantId="19513" ;
        $HS_StoreId="024984" ;
        $HS_IsRedirectionRequest  = 0;
        $HS_ReturnURL= url('/tour-payment-successful');
        $HS_MerchantHash="OUU362MB1upxJgeTHp3x+e9lYN3lrYJOyJIVHPA/LMyWny/BUgjHQpG8Id/C5coxbxc5OMqhewg=";
        $HS_MerchantUsername="cutowa" ;
        $HS_MerchantPassword="lHpnn0Po8FVvFzk4yqF7CA==";
        $HS_TransactionReferenceNumber= $bankorderId;
        $transactionTypeId = "3";
        $TransactionAmount = round($online_payable_amount);   
        $cipher="aes-128-cbc";
        

        $data['key1'] = $Key1;
        $data['Key2'] = $Key2;
        $data['HS_ChannelId'] = $HS_ChannelId;
        $data['HS_MerchantId'] = $HS_MerchantId;
        $data['HS_StoreId'] = $HS_StoreId;
        $data['HS_IsRedirectionRequest'] = $HS_IsRedirectionRequest;
        $data['HS_ReturnURL'] = $HS_ReturnURL;
        $data['HS_MerchantHash']  = $HS_MerchantHash;
        $data['HS_MerchantUsername'] = $HS_MerchantUsername;
        $data['HS_MerchantPassword'] = $HS_MerchantPassword;
        $data['HS_TransactionReferenceNumber'] = $HS_TransactionReferenceNumber;
        $data['transactionTypeId'] = $transactionTypeId;
        $data['TransactionAmount'] = $TransactionAmount;
        $data['cipher'] = $cipher;
        
        $mapString = 
          "HS_ChannelId=$HS_ChannelId" 
        . "&HS_IsRedirectionRequest=$HS_IsRedirectionRequest" 
        . "&HS_MerchantId=$HS_MerchantId" 
        . "&HS_StoreId=$HS_StoreId" 
        . "&HS_ReturnURL=$HS_ReturnURL"
        . "&HS_MerchantHash=$HS_MerchantHash"
        . "&HS_MerchantUsername=$HS_MerchantUsername"
        . "&HS_MerchantPassword=$HS_MerchantPassword"
        . "&HS_TransactionReferenceNumber=$HS_TransactionReferenceNumber";
        
        $cipher_text = openssl_encrypt($mapString, $cipher, $Key1,   OPENSSL_RAW_DATA , $Key2);
        $hashRequest = base64_encode($cipher_text); 
        
        //The data you want to send via POST
        $fields = [
            "HS_ChannelId"=>$HS_ChannelId,
            "HS_IsRedirectionRequest"=>$HS_IsRedirectionRequest,
            "HS_MerchantId"=> $HS_MerchantId,
            "HS_StoreId"=> $HS_StoreId,
            "HS_ReturnURL"=> $HS_ReturnURL,
            "HS_MerchantHash"=> $HS_MerchantHash,
            "HS_MerchantUsername"=> $HS_MerchantUsername,
            "HS_MerchantPassword"=> $HS_MerchantPassword,
            "HS_TransactionReferenceNumber"=> $HS_TransactionReferenceNumber,
            "HS_RequestHash"=> $hashRequest
        ];
        
        $fields_string = http_build_query($fields);
        
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        //execute post
        $result = curl_exec($ch);
        
        $handshake =  json_decode($result);
       
        $AuthToken = $handshake->AuthToken;
        
        
        // echo $result ."<br>";
        // echo $AuthToken ."<br>";
      
      
        /* ==============SSO CALL ================*/
      
        // you need Auth Token & Amount Here before Hashing
        
        $RequestHash1 = NULL;
        $Currency = "PKR";
        $IsBIN =0;

        $mapStringSSo = 
          "AuthToken=$AuthToken" 
        . "&RequestHash=$RequestHash1" 
        . "&ChannelId=$HS_ChannelId"
        . "&Currency=$Currency"
        . "&IsBIN=$IsBIN"
        . "&ReturnURL=$HS_ReturnURL"
        . "&MerchantId=$HS_MerchantId"
        . "&StoreId=$HS_StoreId" 
        . "&MerchantHash=$HS_MerchantHash"
        . "&MerchantUsername=$HS_MerchantUsername"
        . "&MerchantPassword=$HS_MerchantPassword"
        . "&TransactionTypeId=3"
        . "&TransactionReferenceNumber=$HS_TransactionReferenceNumber"
        . "&TransactionAmount=$TransactionAmount"; 

        //echo $mapStringSSo."<br>";
                
        $cipher_text = openssl_encrypt($mapStringSSo, $cipher, $Key1,   OPENSSL_RAW_DATA , $Key2);
        $hashRequest1 = base64_encode($cipher_text);

    
        $data['AuthToken'] = $AuthToken;
        $data['hashRequest1'] = $hashRequest1;


        $guestinfo = DB::table('guestinfo')->insert(
            array(
                'tour_id' =>  $tour_id,
                'email' =>  $email,
                'first_name' =>  $first_name,
                'last_name' => $last_name,
                'mobile' =>  $mobile,
                'payment_id' =>  $bankorderId,
                'document_type' =>  $document_type,
                'document_number' =>  $document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
                'status' =>  $status,
                'created_date' =>  date('Y-m-d H:i:s')
            )
        );

        $check = DB::table('tour_booking_temp')->insert(
            array(
                'user_id' =>  $user_id,
                'payment_id' =>  $bankorderId,
                //'paccess_token' =>  $paccess_token,
                //'token_id' => $token,
                'tour_id' =>  $tour_id,
                'tour_start_date' =>  $tour_start_date,
                'tour_end_date' =>  $tour_end_date,
                'total_amount' => round($tour_price),
                'online_paid_amount' => round($online_payable_amount),
                'remaining_amount_to_pay' => round($remaining_amount_to_pay),
                'partial_payment_status' => $partial_payment_status,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        return view('front/apg/apg', $data);
        //return redirect($link);
    }

    public function tour_payment_successful(Request $request)
    {   
        $order_id = $_GET['O'];
        $url = "https://sandbox.bankalfalah.com/HS/api/IPN/OrderStatus/19513/024984/".$order_id;
    
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL,  $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $result = json_decode($jsonData);

        if (Auth::check()) {
            $user_id =  Auth::id();
        } else {
            $user_id = '';
        }
        $paymentId = $_GET['O'];
        // $paymentId = $_GET['paymentId'];
        // $token = $_GET['token'];
        // $PayerID = $_GET['PayerID'];
        // $paccess_token = '';
        $bookingtemp = DB::table('tour_booking_temp')->where('payment_id', '=', $paymentId)->first();
        $tourData = DB::table('tour_list')->where('id', $bookingtemp->tour_id)->where('tour_status', 1)->first();
        $userData = DB::table('guestinfo')->where('payment_id', $paymentId)->where('status', 1)->first();
        $vendor_id = $tourData->vendor_id;
        $check_guest_user = 0;
        if (!empty($bookingtemp)) {
         //    $paccess_token = $bookingtemp->paccess_token;
         //    $data1 = '{
	       	// "payer_id": "' . $PayerID . '"
	       	// }';

         //    $ch = curl_init();

         //    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment/" . $paymentId . "/execute");
         //    /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/payments/payment”);*/
         //    curl_setopt($ch, CURLOPT_POST, true);
         //    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         //    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
         //    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $paccess_token));
         //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         //    $result = curl_exec($ch);

         //    $resulspays = json_decode($result);

         //    $cartid = $resulspays->cart;
         //    $pstatus = $resulspays->state;
         //    $paymethod = $resulspays->payer->payment_method;

         //    $pemail = $resulspays->payer->payer_info->email;
                $uemail = $userData->email;
         //    $pfirst_name = $resulspays->payer->payer_info->first_name;
                $ufirst_name = $userData->first_name;
         //    $plast_name = $resulspays->payer->payer_info->last_name;
                $ulast_name = $userData->last_name;
         //    $payer_id = $resulspays->payer->payer_info->payer_id;

         //    $srecipient_name = $resulspays->payer->payer_info->shipping_address->recipient_name;
         //    $sadd_line1 = $resulspays->payer->payer_info->shipping_address->line1;
         //    $sadd_line2 = !empty($resulspays->payer->payer_info->shipping_address->line2) ?  $resulspays->payer->payer_info->shipping_address->line2 : '';
         //    $scity = $resulspays->payer->payer_info->shipping_address->city;
         //    $sstate = $resulspays->payer->payer_info->shipping_address->state;
         //    $spostal_code = $resulspays->payer->payer_info->shipping_address->postal_code;
         //    $scountry_code = $resulspays->payer->payer_info->shipping_address->country_code;

         //    $phone = !empty($resulspays->payer->payer_info->phone) ?  $resulspays->payer->payer_info->phone : '';
                $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
         //    $country_code = $resulspays->payer->payer_info->country_code;
         //    $business_name = !empty($resulspays->payer->payer_info->business_name) ?  $resulspays->payer->payer_info->business_name : '';

         //    $total_amount = $resulspays->transactions[0]->amount->total;
         //    $currency = $resulspays->transactions[0]->amount->currency;

         //    $merchant_id = $resulspays->transactions[0]->payee->merchant_id;
         //    $merchant_email = $resulspays->transactions[0]->payee->email;
            $password = "roadnstays@123";
            $password = bcrypt($password);
            //curl_close($ch);
            if (empty($user_id)) {

                $checkuser = DB::table('users')->where('email', $uemail)->first();

                if (!empty($checkuser)) {
                    $user_id = $checkuser->id;
                    $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
                } else {
                    $check_guest_user = 1;
                    DB::table('users')->insert(
                        [
                            'first_name' =>  $ufirst_name,
                            'last_name' =>  $ulast_name,
                            'email' =>  $uemail,
                            'user_type' => 'normal_user',
                            'contact_number' =>  $uphone,
                            'document_type' =>  $userData->document_type,
                            'document_number' =>  $userData->document_number,
                            'front_document_img' =>  $userData->front_document_img,
                            'back_document_img' =>  $userData->back_document_img,
                            'password' =>  $password,
                            'role_id' =>  2,
                            'is_verify_email' => 0,
                            'register_by' =>  'web',
                            'status' => 1,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'created_at' =>  date('Y-m-d H:i:s')
                        ]
                    );

                    $user_id = DB::getpdo()->lastInsertId();
                }
            }
        }
        $checkorder = DB::table('tour_booking')->where('payment_token', '=', $result->TransactionId)->first();
        
        $data['payment_status'] = $result->TransactionStatus;

        if($result->TransactionStatus=="Paid")
        {
            $booking_status = "confirmed";
        }else{
            $booking_status = "pending";
        }

        if (empty($checkorder)) {

            DB::table('tour_booking')->insert(
                [
                    'user_id' =>  $user_id,
                    'tour_id' => $bookingtemp->tour_id,
                    'total_amount' =>  $bookingtemp->total_amount,
                    'partial_payment_status' =>  $bookingtemp->partial_payment_status,
                    'online_paid_amount' =>  $bookingtemp->online_paid_amount,
                    'remaining_amount_to_pay' =>  $bookingtemp->remaining_amount_to_pay,
                    'booking_status' => $booking_status,
                    'payment_status' => $result->TransactionStatus,
                    'payment_type' => $result->TransactionTypeId,
                    'payment_id' => $result->TransactionReferenceNumber,
                    'payment_token' => $result->TransactionId,
                    //'payer_id' => $PayerID,
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $booking_id = DB::getpdo()->lastInsertId();

            DB::table('payment_transaction')->insert(
                [
                    'booking_id' => $booking_id,
                    'user_id' =>  $user_id,
                    'vendor_id' =>  $vendor_id,
                    'txn_id' => $result->TransactionId,
                    'txn_amount' =>  $bookingtemp->total_amount,
                    'payment_method' => 'ALFA',
                    'booking_type' => 'Tour',
                    'txn_status' =>  'successful',
                    'txn_date' => date('Y-m-d H:i:s'),
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $check = true;

            if ($check) {
                $users = User::where('id', '=', $user_id)->first();
                $data['user_info'] = $users;
                $data['booking_id'] = $booking_id;
                $data['url'] = url('/');
                $data['order_info'] =  DB::table('tour_booking')
                    ->join('users', 'users.id', '=', 'tour_booking.user_id')
                    ->join('tour_list', 'tour_list.id', '=', 'tour_booking.tour_id')
                    ->where('tour_booking.id', $booking_id)
                    ->where('users.status', 1)
                    ->select('tour_booking.*', 'tour_list.*','tour_booking.id as booki_id', 'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.alternate_num', 'users.user_company_number')
                    ->first();

                $update_payment_status = DB::table('tour_booking_request')->where('user_id', $user_id)->where('tour_id', $bookingtemp->tour_id)->update(['payment_status' => 1]);    

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $users->email;
                    Mail::send('emails.tour-invoice', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to($inData['email']);
                        $message->subject('roadNstays - Tour Booking Confirmation Mail');
                    });
                    if($check_guest_user === 1){
                        $usr_data = array('user_id'=>$users->id,'name'=>"User",'first_name'=>$users->first_name,'last_name'=>$users->last_name,'email'=>$users->email,'password'=>"roadnstays@123");
                        Mail::send('emails.signup_template', $usr_data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'RoadNStays');
                            $message->to($inData['email']);
                            $message->subject('RoadNStays - User E-mail Verification');
                        });
                    }

                    $data['url'] = url('/admin_login');

                    $data['status'] = 'created to user';

                    $data['booking_id'] = $booking_id;

                    Mail::send('emails.tour-invoice-reciever', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to('votivephppushpendra@gmail.com');
                        $message->subject('roadNstays - New Booking Recieved Mail');
                    });
                }

                // $tourData = DB::table('tour_list')->where('id',$bookingtemp->tour_id)->where('tour_status', 1)->first();
                // $vendor_id = $tourData->vendor_id;
                $vendors = User::where('id', '=', $vendor_id)->get();
                $vendor_counts = count($vendors);
                if (!empty($vendors)) {
                    if ($_SERVER['SERVER_NAME'] != 'localhost') {

                        $data['first_name'] = $vendors['0']->first_name;

                        $data['status'] = 'Booking Tour';

                        $data['booking_id'] = $booking_id;

                        $fromEmail = Helper::getFromEmail();
                        $inData['from_email'] = $fromEmail;
                        $inData['email'] = $vendors['0']->email;
                        Mail::send('emails.tour-invoice-reciever', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstays');
                            $message->to($inData['email']);
                            $message->subject('roadNstays - Order assigned');
                        });
                    }
                }
                Session::get('total_amt');
                if($check_guest_user === 0){
                    if(Auth::check()){
                        session::flash('message', 'Booking created Succesfully.');
                    }else{
                        session::flash('message', 'To view your booking Please! do signin into your account');
                    }
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
                }  
                
                
                // session::flash('message', 'Order created Succesfully.');
                return view('front/tour/confirm_booking', $data);
            } else {
                session::flash('error', 'Record not inserted.');
                return redirect('/');
            }
        } else {
            $data['booking_id'] = $checkorder->id;
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['booking_id'] =  $checkorder->id;
            $data['url'] = url('/');
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['url'] = url('/');
            $data['order_info'] =  DB::table('tour_booking')
                ->join('users', 'users.id', '=', 'tour_booking.user_id')
                ->join('tour_list', 'tour_list.id', '=', 'tour_booking.tour_id')
                ->where('tour_booking.id', $checkorder->id)
                ->where('users.status', 1)
                ->select('tour_booking.*', 'tour_list.*','tour_booking.id as booki_id',  'users.first_name', 'users.last_name', 'users.email', 'users.address as user_addresss', 'users.user_city', 'users.postal_code', 'users.contact_number', 'users.user_company_number')
                ->first();

            if($check_guest_user === 0){
                if(Auth::check()){
                    session::flash('message', 'Booking created Succesfully.');
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account');
                }
            }else{
                session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
            }   
            // echo "<pre>";print_r($data['order_info']);die;
                
        }
        session::flash('message', 'Booking created Succesfully.');
        return view('front/tour/confirm_booking', $data);
    }

    public function space()
    {
        return view('front/space/space');
    }

    public function travel_details()
    {
        return view('front/travel/travel_details');
    }

    
    public function blogs()
    {
        return view('front/blog/blogs');
    }

    public function signup(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $checkUserEmail = DB::table('users')->where('email', $request->semail)->first();
        if (empty($checkUserEmail)) {
            $user = new User;
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->email = $request->semail;
            $user->contact_number = $request->phone_no;
            $user->num_dialcode_1 = $request->country_dialcode;
            $user->country_iso2_code1 = $request->countryCode;
            $user->user_country = $request->user_country;
            $user->password = bcrypt($request->spassword);
            $user->user_type = "normal_user";
            $user->role_id = 2;
            $addUser = $user->save();

            // $data['check_send_email'] = DB::table('users')->where('email', $request->semail)->first();
            $data = array('user_id'=>$user->id,'name'=>"User",'first_name'=>$user->first_name,'last_name'=>$user->last_name,'full_url'=>$request->full_url);
            if ($addUser) {
                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $request->semail;

                    Mail::send('emails.signup_template', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'RoadNStays');
                        $message->to($inData['email']);
                        $message->subject('RoadNStays - User E-mail Verification');
                    });
                }
                // Auth::guard("web")->login($user);
                return response()->json(['status' => 'success', 'msg' => 'User Created Successfully. Please Check Mail for Verification']);
            }
        } else {
            return response()->json(['status' => 'error', 'msg' => 'The email has already been taken']);
        }
    }


    public function postLogin(Request $request)
    {
        $user_obj = User::where('email', '=', $request->email)->first();
        if (!empty($user_obj->id)) {
            if ($user_obj->role_id == 2) {
                if ($user_obj->is_verify_email == 1) {
                    if ($user_obj->status == 1) {
                        $credentials = $request->only('email', 'password');
                        if (Auth::attempt($credentials)) {
                            return response()->json(['status' => 'success', 'role' => 'user', 'msg' => 'Login Successfully.']);
                        } else {
                            return response()->json(['status' => 'error', 'msg' => 'Invalid Credential.']);
                        }
                    } else {
                        return response()->json(['status' => 'error', 'msg' => 'Your account is not activated by Administrator.']);
                    }
                }else{
                    return response()->json(['status' => 'error' ,'role' => 'user','msg' => 'Please check your email for a verification link.']);
                }    
            } else {
                return response()->json(['status' => 'error', 'role' => 'other', 'msg' => 'Email address not registered.']);
            }
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Email address not registered.']);
        }
    }

    public function serviceProPostLogin(Request $request)
    {
        $user_obj = User::where('email', '=', $request->vlemail)->first();
        // print_r($request->all());
        // if (!empty($user_obj->id) and $user_obj->role_id == 2) {
        if (!empty($user_obj->id)) {

            if ($user_obj->role_id == 4) {
                if ($user_obj->is_verify_email == 1) {
                    if ($user_obj->status == 1) {
                        // $credentials = $request->only('email', 'password');
                        // auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
                        if (Auth::attempt(['email' => $request->input('vlemail'), 'password' => $request->input('vlpassword')])) {
                            // if (auth()->guard('servicepro')->attempt($credentials)) {
                            return response()->json(['status' => 'success', 'role' => 'vendor', 'msg' => 'Login Successfully.']);
                        } else {
                            return response()->json(['status' => 'error', 'msg' => 'Invalid Credential.']);
                        }
                    } else {
                        return response()->json(['status' => 'error', 'msg' => 'Your account is not activated by Administrator.']);
                    }
                }else{
                    return response()->json(['status' => 'error' ,'role' => 'user','msg' => 'Please check your email for a verification link.']);
                }    
            } else {
                return response()->json(['status' => 'error', 'role' => 'other', 'msg' => 'Email address not registered.']);
            }
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Email address not registered.']);
        }
    }

    public function vendorSignup(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $checkUserEmail = DB::table('users')->where('email', $request->vsemail)->first();
        if (empty($checkUserEmail)) {
            $user = new User;
            $user->first_name = $request->vsname;
            $user->last_name = $request->vslname;
            $user->email = $request->vsemail;
            $user->contact_number = $request->vsphone_no;
            $user->num_dialcode_1 = $request->country_dialcode1;
            $user->country_iso2_code1 = $request->countryCode1;
            $user->user_country = $request->vendor_country;
            $user->password = bcrypt($request->vspassword);
            $user->user_type = "service_provider";
            $user->role_id = 4;
            $addUser = $user->save();
            $user->id;

            // if ($addUser) {
            //     $id = DB::table('vendor_profile')->insert(['user_id' => $user->id]);
            //     return response()->json(['status' => 'success', 'msg' => 'Vendor Created Successfully']);
            // }
            $data = array('user_id'=>$user->id,'name'=>"Vendor",'first_name'=>$user->first_name,'last_name'=>$user->last_name);
            if ($addUser) {
                $id = DB::table('vendor_profile')->insert(['user_id' => $user->id]);

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $request->vsemail;

                    Mail::send('emails.signup_template', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'RoadNStays');
                        $message->to($inData['email']);
                        $message->subject('RoadNStays - Vendor E-mail Verification');
                    });
                }
                // Auth::guard("web")->login($user);
                // return response()->json(['status' => 'success', 'msg' => 'Vendor Created Successfully']);
                return response()->json(['status' => 'success', 'msg' => 'Vendor Created Successfully. Please Check Mail for Verification']);
            }
        } else {
            return response()->json(['status' => 'error', 'msg' => 'The email has already been taken']);
        }
    }

    public function userProfile(Request $request)
    {
        $data['profile_detail'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->where('users.id', Auth::user()->id)->first();
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        // echo "<pre>";print_r($data['profile_detail']);die;
        return view('front.dashboard')->with($data);
    }

    public function serviceProProfile(Request $request)
    {
        $data['page_heading_name'] = 'Profile';
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        return view('vendor.profile')->with($data);
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
        if (!empty($request->id)) {
            $updata = DB::table('users')->where('id', $request->id)->update(['name' => $request->name]);
            if (!empty($updata)) {
                return response()->json(['status' => 'success', 'msg' => 'Profile Updated Successfully']);
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Not Updated any Value']);
            }
        }

        $data['profile_detail'] = DB::table('users')->get();
        return view('front/profile')->with($data);
    }

    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($user_id) {
            DB::table('users')
                ->where('id', $user_id)
                ->update([
                    'first_name' => $request->puname,
                    'last_name' => $request->plname,
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
        if ($user_id) {
            if ($request->hasFile('imageFile')) {
                $image_name = $request->file('imageFile')->getClientOriginalName();
                $filename = pathinfo($image_name, PATHINFO_FILENAME);
                $image_ext = $request->file('imageFile')->getClientOriginalExtension();
                $fileNameToStore = $filename . '-' . time() . '.' . $image_ext;
                $path = base_path() . '/public/uploads/profile_img/';
                $request->file('imageFile')->move($path, $fileNameToStore);
            } else {
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
        if (!empty($data)) {

            if (!empty($user_obj->id) and $user_obj->id == 1) {
                // echo "<pre>";print_r($data);
                // echo "<pre>";print_r($user_obj);
                // $check_pwd = Hash::make($data['old_password']);
                // echo "<pre>";print_r($check_pwd);
                // die; 
                $user_id =  $user_obj->id;
                if (!\Hash::check($data['old_password'], $user_obj->password)) {
                    return response()->json(['status' => 'error', 'msg' => 'You have entered wrong password']);
                } else {
                    $user_id = $user_obj->id;
                    $password = bcrypt($request->input('new_password'));
                    // echo "<pre>";print_r($request->input('new_password'));die; 
                    $checkda = DB::update('update users set password = ? where id = 1', [$password]);
                    return response()->json(['status' => 'success', 'msg' => 'Password Updated Successfully']);
                }
            }
        }
        return view('front/change_password');
    }

    // public function booking_list(Request $request)
    // {
    //     return view('front/booking/booking_list');
    // }

    public function userLogout()
    {
        // Auth::guard('web')->logout();
        Auth::logout();
        return redirect()->route('home');
    }

    public function check_valid_hotel_daterange(Request $request)
    {
        $checkin_date = date('Y-m-d', strtotime($request->hotel_start_date));
        $checkout_date = date('Y-m-d', strtotime($request->hotel_end_date));
        if($checkin_date === $checkout_date){
            $request->session()->forget('checkin_date');
            $request->session()->forget('checkout_date');
            return response()->json(['status' => 'sameDateError', 'msg' => 'Chekin Date and Checkout date should not be same']);
        }   
    }

    public function hotel_list_test(Request $request)
    {
        //print_r($request->all());die;
        //if (isset($_GET)) {
        if (count($request->all()) >= 1) {
            $location = $request->location;
            $check_in = $request->check_in;
            $check_out = $request->check_out;
            $person = $request->person;
            $distance = 50;

            $new_check_in = date('Y-m-d', strtotime($check_in));
            $new_check_out = date('Y-m-d', strtotime($check_out));

            $date1_ts = strtotime($new_check_in);
            $date2_ts = strtotime($new_check_out);
            $diff = $date2_ts - $date1_ts;
            $booking_days =  round($diff / 86400);

            $hotel_city = explode(',', $location);
            $hotelcount = DB::table('hotels')->where(['hotel_status' => 1])->where('hotel_city', 'like', '%' . $hotel_city[0] . '%')->orderBy('hotel_id', 'DESC')->get();

            $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->where('hotel_city', 'like', '%' . $hotel_city[0] . '%')->orderBy('hotel_id', 'DESC')->paginate(10)->setpath('');

            $data['location'] = $hotel_city[0];
            $data['check_in'] = $check_in;
            $data['check_out'] = $check_out;
            $data['person'] = $person;
            $data['booking_days'] = $booking_days;

            //echo "<pre>";print_r($hotel_data);die;
        } else {

            $hotelcount = DB::table('hotels')->where(['hotel_status' => 1])->orderBy('hotel_id', 'DESC')->get();

            $hotel_data = DB::table('hotels')->where(['hotel_status' => 1])->orderBy('hotel_id', 'DESC')->paginate(10);


            $data['location'] = "All";
            $data['check_in'] = date('Y-m-d');
            $data['check_out'] = date('Y-m-d');
            $data['person'] = 1;
        }
        $hoteldata = array();
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

            $amenities = DB::table('hotel_amenities')
                ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('hotel_amenities.hotel_id', '=', $value->hotel_id)
                ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                ->limit('10')
                ->get();

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
                'hotel_gallery' => $value->hotel_gallery,
                'hotel_amenities' => $amenities,
                'gallary' => $Img
            );
        }

        $data['hotel_data'] = $hoteldata;
        $data['hotels'] = $hotel_data;
        $data['hotelcount'] = count($hotelcount);

        //echo "<pre>"; print_r($data);die;
        return view('front.hotel.hotel_list')->with($data);
        //}

    }

    public function hotel_list(Request $request)
    {
        //print_r($request->all());
        if (count($request->all()) >= 1) {

            if (isset($request->hotel_latitude)) {
                $hotel_latitude = $request->hotel_latitude;
            } else {

                $hotel_latitude = Session::get('hotel_latitude');
            }

            if (isset($request->hotel_longitude)) {
                $hotel_longitude = $request->hotel_longitude;
            } else {

                $hotel_longitude = Session::get('hotel_longitude');
            }

            if (isset($request->location)) {
                $location = $request->location;
            } else {

                $location = Session::get('location');
            }

            if (isset($request->hotel_name)) {
                $hotel_name = $request->hotel_name;
            } else {
                $hotel_name = Session::get('hotel_name');
            }

            if (isset($request->person)) {
                $person = $request->person;
            } else {
                $person = Session::get('person');
            }

            if (isset($request->check_in)) {
                $checkin_date = date('Y-m-d', strtotime($request->check_in));
            } else {
                $checkin_date = Session::get('checkin_date');
            }

            if (isset($request->check_out)) {
                $checkout_date = date('Y-m-d', strtotime($request->check_out));
            } else {
                $checkout_date = Session::get('checkout_date');
            }

            $hotel_city = explode(',', $location);

            Session::put('hotel_latitude', $hotel_latitude);
            Session::put('hotel_longitude', $hotel_longitude);
            Session::put('location', $location);
            Session::put('hotel_name', $hotel_name);
            Session::put('person', $person);
            Session::put('checkin_date', $checkin_date);
            Session::put('checkout_date', $checkout_date);

            // $new_check_in = date('Y-m-d', strtotime($checkin_date));
            // $new_check_out = date('Y-m-d', strtotime($checkout_date));

            $date1_ts = strtotime($checkin_date);
            $date2_ts = strtotime($checkout_date);
            $diff = $date2_ts - $date1_ts;
            $booking_days =  round($diff / 86400);

            $distance = 30;

            $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude . ') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));


            $hotelids = array();


            foreach ($results as $key => $value) {

                $booking = DB::table('booking')
                    ->where("hotel_id", $value->hotel_id)
                    ->whereBetween('check_in', [$checkin_date, $checkout_date])
                    ->orWhereBetween('check_out', [$checkin_date, $checkout_date])
                    ->get();

                $bookroomids = array();

                foreach ($booking as $key => $bookvalue) {
                    if($bookvalue->booking_status != 'canceled'){
                        $roomid = $bookvalue->room_id;
                        // $totalbookroom = $bookvalue->total_room;
                        $totalbookroom = $booking->where('room_id', $roomid)->count();
                        // echo "<pre>";print_r($totalbookroom);
                        $nofroom = DB::table('room_list')->where("id", $roomid)->value('number_of_rooms');
                        // echo "<pre>";print_r($nofroom);
                        if ($totalbookroom >= $nofroom) {
                            $bookroomids[] = $bookvalue->room_id;
                        }
                    }
                }

              
                $room_list = DB::table('room_list')->where("hotel_id", $value->hotel_id)->whereNotIn("id", $bookroomids)->get();
                // echo "<pre>";print_r($room_list);
                //$totalroom = count($room_list);

                $total_memeber = 0;

                $total_room = 0;

                foreach ($room_list as $key => $roomlvalue) {

                    $total_memeber = $total_memeber + $roomlvalue->max_adults;
                }
                // echo "<pre>";print_r($total_memeber);
                if ($person <= $total_memeber) {

                    $hotelids[] = $value->hotel_id;
                }
            }
           
            // print_r($hotelids);die;

            $hotel_data = DB::table('hotels')->whereIn("hotel_id", $hotelids)->where("hotel_status", 1)->groupBy('hotel_id')->paginate(10);
            // die;

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

                $amenities = DB::table('hotel_amenities')
                    ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                    ->where('hotel_amenities.hotel_id', '=', $value->hotel_id)
                    ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                    ->limit('10')
                    ->get();


                $hoteldata[] = array(

                    'hotel_id' => $value->hotel_id,
                    'hotel_user_id' => $value->hotel_user_id,
                    'hotel_name' => $value->hotel_name,
                    'hotel_content' => $value->hotel_content,
                    'property_contact_name' => $value->property_contact_name,
                    'property_contact_num' => $value->property_contact_num,
                    'property_alternate_num' => isset($value->property_alternate_num) ? $value->property_alternate_num : "",
                    'cat_listed_room_type' => isset($value->cat_listed_room_type) ? $value->cat_listed_room_type : 0,
                    'hotel_rating' => $value->hotel_rating,
                    'payment_mode' => $value->payment_mode,
                    'checkin_time' =>  isset($value->checkin_time) ? $value->checkin_time : "",
                    'checkout_time' =>  isset($value->checkout_time) ? $value->checkout_time : "",
                    'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                    'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                    'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                    'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                    'hotel_address' => isset($value->hotel_address) ? $value->hotel_address : "",
                    'hotel_city' => isset($value->hotel_city) ? $value->hotel_city : "",
                    'hotel_country' => isset($value->hotel_country) ? $value->hotel_country : "",
                    'hotel_latitude' => isset($value->hotel_latitude) ? $value->hotel_latitude : "",
                    'hotel_longitude' => isset($value->hotel_longitude) ? $value->hotel_longitude : "",
                    'hotel_gallery' => isset($value->hotel_gallery) ? $value->hotel_gallery : "",
                    'hotel_amenities' => $amenities,
                    'gallary' => $Img
                );
            }

            $data['hotel_data'] = $hoteldata;

            $room_wise = DB::table('room_type_categories')->where('status', '=', 1)->get();

            $emenites = DB::table('H2_Amenities')->where('status', '=', 1)->get();

            $property_type = DB::table('H1_Hotel_and_other_Stays')->where('status', '=', 1)->get();

            //echo "<pre>"; print_r($property_type); die;

            $data['hotel_data'] = $hoteldata;
            $data['hotels'] = $hotel_data;
            $data['hotelcount'] = count($hoteldata);
            $data['location'] = $hotel_city[0];
            $data['check_in'] = $checkin_date;
            $data['check_out'] = $checkout_date;
            $data['person'] = $person;
            $data['booking_days'] = $booking_days;
            $data['hotel_latitude'] = $hotel_latitude;
            $data['hotel_longitude'] = $hotel_longitude;
            $data['room_wise'] = $room_wise;
            $data['emenites'] = $emenites;
            $data['property_type'] = $property_type;

            //echo "<pre>"; print_r($data);die;
            return view('front.hotel.hotel_list')->with($data);
        } else {
            return redirect('/');
        }
    }

    public function hotel_list_ajax(Request $request)
    {

        $gdistance = $request->distance;
        $budget = $request->budget;
        $star = $request->star;
        $roomwise = $request->roomwise;
        $emenites = $request->emenites;
        $property = $request->property;

        Session::put('gdistance', $gdistance);
        Session::put('budget', $budget);
        Session::put('star', $star);
        Session::put('roomwise', $roomwise);
        Session::put('emenites', $emenites);
        Session::put('property', $property);

        if (!empty($gdistance)) {

            $distance = max($gdistance);
        } else {

            $distance = 30;
        }

        $min_price1 = '';
        $min_price2 = '';
        $min_price3 = '';
        $min_price4 = '';
        $min_price5 = '';
        $max_price1 = '';
        $max_price2 = '';
        $max_price3 = '';
        $max_price4 = '';
        $max_price5 = '';

        if (!empty($budget)) {
            foreach ($budget as $key => $price) {

                if ($price == 1) {
                    $min_price1 = 0;
                    $max_price1 = 5000;
                }

                if ($price == 2) {
                    $min_price2 = 5000;
                    $max_price2 = 10000;
                }

                if ($price == 3) {
                    $min_price3 = 10000;
                    $max_price3 = 15000;
                }

                if ($price == 4) {
                    $min_price4 = 15000;
                    $max_price4 = 20000;
                }

                if ($price == 5) {
                    $min_price5 = 20000;
                    $max_price5 = 500000;
                }
            }
        }

        $hotel_latitude = Session::get('hotel_latitude');
        $hotel_longitude = Session::get('hotel_longitude');
        $location = Session::get('location');
        $hotel_name = Session::get('hotel_name');
        $person = Session::get('person');
        $checkin_date = Session::get('checkin_date');
        $checkout_date = Session::get('checkout_date');

        $hotel_city = explode(',', $location);

        $date1_ts = strtotime($checkin_date);
        $date2_ts = strtotime($checkout_date);
        $diff = $date2_ts - $date1_ts;
        $booking_days =  round($diff / 86400);

        $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude . ') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));

        $hotelids = array();

        foreach ($results as $key => $value) {

            $booking = DB::table('booking')
                ->where("hotel_id", $value->hotel_id)
                ->whereBetween('check_in', [$checkin_date, $checkout_date])
                ->orWhereBetween('check_out', [$checkin_date, $checkout_date])
                //->whereNotBetween('check_out', [$checkin_date, $checkout_date])
                ->get();

            $bookroomids = array();

            foreach ($booking as $key => $bookvalue) {
                if($bookvalue->booking_status != 'canceled'){
                    $roomid = $bookvalue->room_id;
                    // $totalbookroom = $bookvalue->total_room;
                    $totalbookroom = $booking->where('room_id', $roomid)->count();
                    $nofroom = DB::table('room_list')->where("id", $roomid)->value('number_of_rooms');

                    if ($totalbookroom >= $nofroom) {

                        $bookroomids[] = $bookvalue->room_id;
                    }
                }
            }


            $room_list = DB::table('room_list')
                ->where("hotel_id", $value->hotel_id)
                ->where(function ($query) use ($roomwise) {
                    if (!empty($roomwise)) {
                        $query->whereIn("room_types_id", $roomwise);
                    }
                })
                ->whereNotIn("id", $bookroomids)
                ->get();

            //$totalroom = count($room_list); 

            $total_memeber = 0;

            $total_room = 0;

            foreach ($room_list as $key => $roomlvalue) {

                $total_memeber = $total_memeber + $roomlvalue->max_adults;
            }

            if ($person <= $total_memeber) {

                $hotelids[] = $value->hotel_id;
            }
        }


        // get eminites data

        $hotelamenities = '';
        $amhotelids = array();

        if (!empty($emenites)) {

            $hotelamenities = DB::table('hotel_amenities')
                ->whereIn("amenity_id", $emenites)
                ->where("status", 1)
                ->get();

            if (!empty($hotelamenities)) {

                foreach ($hotelamenities as $key => $valueam) {

                    $amhotel_ids[] = $valueam->hotel_id;
                }

                $amhotelids = array_unique($amhotel_ids);
            }
        }

        if (!empty($amhotelids)) {

            $hotelids = array_intersect($hotelids, $amhotelids);
        }

        // close table    

        $hotel_data = DB::table('hotels')
            ->whereIn("hotel_id", $hotelids)
            //->whereIn("hotel_rating",$star)
            ->where(function ($query) use ($star) {
                if (!empty($star)) {
                    $query->whereIn("hotel_rating", $star);
                }
            })
            ->where(function ($query) use ($property) {
                if (!empty($property)) {
                    $query->whereIn("property_type", $property);
                }
            })

            ->where(function ($query) use ($min_price1, $max_price1, $min_price2, $max_price2, $min_price3, $max_price3, $min_price4, $max_price4, $min_price5, $max_price5, $budget) {

                if (!empty($budget)) {

                    $query->where(function ($query) use ($min_price1, $max_price1) {
                        $query->where('stay_price', '>=', $min_price1);
                        $query->where('stay_price', '<=', $max_price1);
                    });

                    $query->orWhere(function ($query) use ($min_price2, $max_price2) {
                        $query->where('stay_price', '>=', $min_price2);
                        $query->where('stay_price', '<=', $max_price2);
                    });

                    $query->orWhere(function ($query) use ($min_price3, $max_price3) {
                        $query->where('stay_price', '>=', $min_price3);
                        $query->where('stay_price', '<=', $max_price3);
                    });

                    $query->orWhere(function ($query) use ($min_price4, $max_price4) {
                        $query->where('stay_price', '>=', $min_price4);
                        $query->where('stay_price', '<=', $max_price4);
                    });

                    $query->orWhere(function ($query) use ($min_price5, $max_price5) {
                        $query->where('stay_price', '>=', $min_price5);
                        $query->where('stay_price', '<=', $max_price5);
                    });
                }
            })
            ->where("hotel_status", 1)
            ->groupBy('hotel_id')
            ->paginate(10);
        //->get();


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

            $amenities = DB::table('hotel_amenities')
                ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('hotel_amenities.hotel_id', '=', $value->hotel_id)
                ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                ->limit('10')
                ->get();


            $hoteldata[] = array(

                'hotel_id' => $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => isset($value->property_alternate_num) ? $value->property_alternate_num : "",
                'cat_listed_room_type' => isset($value->cat_listed_room_type) ? $value->cat_listed_room_type : 0,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' =>  isset($value->checkin_time) ? $value->checkin_time : "",
                'checkout_time' =>  isset($value->checkout_time) ? $value->checkout_time : "",
                'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                'hotel_address' => isset($value->hotel_address) ? $value->hotel_address : "",
                'hotel_city' => isset($value->hotel_city) ? $value->hotel_city : "",
                'hotel_country' => isset($value->hotel_country) ? $value->hotel_country : "",
                'hotel_latitude' => isset($value->hotel_latitude) ? $value->hotel_latitude : "",
                'hotel_longitude' => isset($value->hotel_longitude) ? $value->hotel_longitude : "",
                'hotel_gallery' => isset($value->hotel_gallery) ? $value->hotel_gallery : "",
                'hotel_amenities' => $amenities,
                'gallary' => $Img
            );
        }

        $data['hotel_data'] = $hoteldata;

        $room_wise = DB::table('room_type_categories')->where('status', '=', 1)->get();

        $emenites = DB::table('H2_Amenities')->where('status', '=', 1)->get();

        $property_type = DB::table('H1_Hotel_and_other_Stays')->where('status', '=', 1)->get();

        //echo "<pre>"; print_r($property_type); die;

        $data['hotel_data'] = $hoteldata;
        $data['hotels'] = $hotel_data;
        $data['hotelcount'] = count($hoteldata);
        $data['location'] = $hotel_city[0];
        $data['check_in'] = $checkin_date;
        $data['check_out'] = $checkout_date;
        $data['person'] = $person;
        $data['booking_days'] = $booking_days;
        $data['hotel_latitude'] = $hotel_latitude;
        $data['hotel_longitude'] = $hotel_longitude;
        $data['room_wise'] = $room_wise;
        $data['emenites'] = $emenites;
        $data['property_type'] = $property_type;

        $returnHTML = view('front.hotel.hotel_list_ajax')->with($data)->render();;

        return response()->json($returnHTML);
    }

    public function hotel_list_ajax_page(Request $request)
    {
        //$page = $request->page; 
        $gdistance = Session::get('gdistance');
        $budget = Session::get('budget');
        $star = Session::get('star');
        $roomwise = Session::get('roomwise');
        $emenites = Session::get('emenites');
        $property = Session::get('property');

        if (!empty($gdistance)) {

            $distance = max($gdistance);
        } else {

            $distance = 30;
        }

        $min_price1 = '';
        $min_price2 = '';
        $min_price3 = '';
        $min_price4 = '';
        $min_price5 = '';
        $max_price1 = '';
        $max_price2 = '';
        $max_price3 = '';
        $max_price4 = '';
        $max_price5 = '';

        if (!empty($budget)) {
            foreach ($budget as $key => $price) {

                if ($price == 1) {
                    $min_price1 = 0;
                    $max_price1 = 5000;
                }

                if ($price == 2) {
                    $min_price2 = 5000;
                    $max_price2 = 10000;
                }

                if ($price == 3) {
                    $min_price3 = 10000;
                    $max_price3 = 15000;
                }

                if ($price == 4) {
                    $min_price4 = 15000;
                    $max_price4 = 20000;
                }

                if ($price == 5) {
                    $min_price5 = 20000;
                    $max_price5 = 500000;
                }
            }
        }

        $hotel_latitude = Session::get('hotel_latitude');
        $hotel_longitude = Session::get('hotel_longitude');
        $location = Session::get('location');
        $hotel_name = Session::get('hotel_name');
        $person = Session::get('person');
        $checkin_date = Session::get('checkin_date');
        $checkout_date = Session::get('checkout_date');

        $hotel_city = explode(',', $location);

        $date1_ts = strtotime($checkin_date);
        $date2_ts = strtotime($checkout_date);
        $diff = $date2_ts - $date1_ts;
        $booking_days =  round($diff / 86400);

        $results = DB::select(DB::raw('SELECT hotel_id, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude . ') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));

        $hotelids = array();

        foreach ($results as $key => $value) {

            $booking = DB::table('booking')
                ->where("hotel_id", $value->hotel_id)
                ->whereBetween('check_in', [$checkin_date, $checkout_date])
                ->orWhereBetween('check_out', [$checkin_date, $checkout_date])
                //->whereNotBetween('check_out', [$checkin_date, $checkout_date])
                ->get();

            $bookroomids = array();

            foreach ($booking as $key => $bookvalue) {
                if($bookvalue->booking_status != 'canceled'){
                    $roomid = $bookvalue->room_id;
                    // $totalbookroom = $bookvalue->total_room;
                    $totalbookroom = $booking->where('room_id', $roomid)->count();
                    $nofroom = DB::table('room_list')->where("id", $roomid)->value('number_of_rooms');

                    if ($totalbookroom >= $nofroom) {

                        $bookroomids[] = $bookvalue->room_id;
                    }
                }
            }


            $room_list = DB::table('room_list')
                ->where("hotel_id", $value->hotel_id)
                ->where(function ($query) use ($roomwise) {
                    if (!empty($roomwise)) {
                        $query->whereIn("room_types_id", $roomwise);
                    }
                })
                ->whereNotIn("id", $bookroomids)
                ->get();

            //$totalroom = count($room_list); 

            $total_memeber = 0;

            $total_room = 0;

            foreach ($room_list as $key => $roomlvalue) {

                $total_memeber = $total_memeber + $roomlvalue->max_adults;
            }

            if ($person <= $total_memeber) {

                $hotelids[] = $value->hotel_id;
            }
        }


        // get eminites data

        $hotelamenities = '';
        $amhotelids = array();

        if (!empty($emenites)) {

            $hotelamenities = DB::table('hotel_amenities')
                ->whereIn("amenity_id", $emenites)
                ->where("status", 1)
                ->get();

            if (!empty($hotelamenities)) {

                foreach ($hotelamenities as $key => $valueam) {

                    $amhotel_ids[] = $valueam->hotel_id;
                }

                $amhotelids = array_unique($amhotel_ids);
            }
        }

        if (!empty($amhotelids)) {

            $hotelids = array_intersect($hotelids, $amhotelids);
        }

        // close table    

        $hotel_data = DB::table('hotels')
            ->whereIn("hotel_id", $hotelids)
            //->whereIn("hotel_rating",$star)
            ->where(function ($query) use ($star) {
                if (!empty($star)) {
                    $query->whereIn("hotel_rating", $star);
                }
            })
            ->where(function ($query) use ($property) {
                if (!empty($property)) {
                    $query->whereIn("property_type", $property);
                }
            })

            ->where(function ($query) use ($min_price1, $max_price1, $min_price2, $max_price2, $min_price3, $max_price3, $min_price4, $max_price4, $min_price5, $max_price5, $budget) {

                if (!empty($budget)) {

                    $query->where(function ($query) use ($min_price1, $max_price1) {
                        $query->where('stay_price', '>=', $min_price1);
                        $query->where('stay_price', '<=', $max_price1);
                    });

                    $query->orWhere(function ($query) use ($min_price2, $max_price2) {
                        $query->where('stay_price', '>=', $min_price2);
                        $query->where('stay_price', '<=', $max_price2);
                    });

                    $query->orWhere(function ($query) use ($min_price3, $max_price3) {
                        $query->where('stay_price', '>=', $min_price3);
                        $query->where('stay_price', '<=', $max_price3);
                    });

                    $query->orWhere(function ($query) use ($min_price4, $max_price4) {
                        $query->where('stay_price', '>=', $min_price4);
                        $query->where('stay_price', '<=', $max_price4);
                    });

                    $query->orWhere(function ($query) use ($min_price5, $max_price5) {
                        $query->where('stay_price', '>=', $min_price5);
                        $query->where('stay_price', '<=', $max_price5);
                    });
                }
            })
            ->where("hotel_status", 1)
            ->groupBy('hotel_id')
            ->paginate(10);
        //->get();


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

            $amenities = DB::table('hotel_amenities')
                ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('hotel_amenities.hotel_id', '=', $value->hotel_id)
                ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
                ->limit('10')
                ->get();


            $hoteldata[] = array(

                'hotel_id' => $value->hotel_id,
                'hotel_user_id' => $value->hotel_user_id,
                'hotel_name' => $value->hotel_name,
                'hotel_content' => $value->hotel_content,
                'property_contact_name' => $value->property_contact_name,
                'property_contact_num' => $value->property_contact_num,
                'property_alternate_num' => isset($value->property_alternate_num) ? $value->property_alternate_num : "",
                'cat_listed_room_type' => isset($value->cat_listed_room_type) ? $value->cat_listed_room_type : 0,
                'hotel_rating' => $value->hotel_rating,
                'checkin_time' =>  isset($value->checkin_time) ? $value->checkin_time : "",
                'checkout_time' =>  isset($value->checkout_time) ? $value->checkout_time : "",
                'stay_price' => isset($value->stay_price) ? $value->stay_price : "",
                'hotel_address' => isset($value->hotel_address) ? $value->hotel_address : "",
                'hotel_city' => isset($value->hotel_city) ? $value->hotel_city : "",
                'hotel_country' => isset($value->hotel_country) ? $value->hotel_country : "",
                'hotel_latitude' => isset($value->hotel_latitude) ? $value->hotel_latitude : "",
                'hotel_longitude' => isset($value->hotel_longitude) ? $value->hotel_longitude : "",
                'hotel_gallery' => isset($value->hotel_gallery) ? $value->hotel_gallery : "",
                'hotel_amenities' => $amenities,
                'gallary' => $Img
            );
        }

        $data['hotel_data'] = $hoteldata;

        $room_wise = DB::table('room_type_categories')->where('status', '=', 1)->get();

        $emenites = DB::table('H2_Amenities')->where('status', '=', 1)->get();

        $property_type = DB::table('H1_Hotel_and_other_Stays')->where('status', '=', 1)->get();

        //echo "<pre>"; print_r($property_type); die;

        $data['hotel_data'] = $hoteldata;
        $data['hotels'] = $hotel_data;
        $data['hotelcount'] = count($hoteldata);
        $data['location'] = $hotel_city[0];
        $data['check_in'] = $checkin_date;
        $data['check_out'] = $checkout_date;
        $data['person'] = $person;
        $data['booking_days'] = $booking_days;
        $data['hotel_latitude'] = $hotel_latitude;
        $data['hotel_longitude'] = $hotel_longitude;
        $data['room_wise'] = $room_wise;
        $data['emenites'] = $emenites;
        $data['property_type'] = $property_type;

        $returnHTML = view('front.hotel.hotel_list_ajax')->with($data)->render();;

        return response()->json($returnHTML);
    }

    // Hotel list ajax close

    public function hotel_details(Request $request)
    {
        //print_r($request->all());die;
        $hotel_id = base64_decode($request->hotel_id);
        $check_in = base64_decode($request->check_in);
        $check_out = base64_decode($request->check_out);
        $person = base64_decode($request->person);
        $data['hotel_data'] = DB::table('hotels')
            ->join('country', 'hotels.hotel_country', '=', 'country.id')
            ->where(['hotels.hotel_id' => $hotel_id, 'hotels.hotel_status' => 1])->first();
        // echo "<pre>";print_r($data['hotel_data']);die;
        $data['hotel_gallery'] =  DB::table('hotel_gallery')->where(['hotel_id' => $hotel_id, 'status' => 1])->get();

        $data['amenities'] = DB::table('hotel_amenities')
            ->join('H2_Amenities', 'hotel_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
            ->where('hotel_amenities.hotel_id', '=', $hotel_id)
            ->select('H2_Amenities.*', 'hotel_amenities.amenity_id')
            ->get();

        $booking = DB::table('booking')
            ->where("hotel_id", $hotel_id)
            ->whereBetween('check_in', [$check_in, $check_out])
            ->orWhereBetween('check_out', [$check_in, $check_out])
            ->get();
        $booking = $booking->where("hotel_id", $hotel_id)->where('booking_status', '!=', 'canceled');

        // $booking - booking that are related to that perticular hotel and between the selected date
        // echo "<pre>";print_r($check_in);
        // echo "<pre>";print_r($check_out);
        // echo "<pre>";print_r($booking->count());
        // $counts = array_count_values($booking);
        // echo "<pre>";print_r($booking);
        // echo count(array_keys($booking, "blue"));
        // die;  
        $bookroomids = array();

        foreach ($booking as $key => $bookvalue) {
            $roomid = $bookvalue->room_id;
            // echo "<pre>";print_r($roomid);
            $totalbookroom = $booking->where('room_id', $roomid)->count();
            // echo "<pre>";print_r($totalbookroom);
            $nofroom = DB::table('room_list')->where("id", $roomid)->value('number_of_rooms');
            // echo "<pre>";print_r($nofroom);
            if ($totalbookroom >= $nofroom) {
                $bookroomids[] = $bookvalue->room_id;
            }
        }
        // echo "<pre>";print_r($bookroomids);
        // die;  
        $room_data = DB::table('room_list')
                    ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
                    ->whereNotIn("room_list.id", $bookroomids)
                    ->where(['room_list.hotel_id' => $hotel_id, 'room_list.status' => 1])
                    ->select('room_list.*', 'room_type_categories.title as room_type')
                    ->get();
        
        // echo "<pre>";print_r($room_data); 
        // die;

        $roomdata = array();
        foreach ($room_data as $key => $room) {

            $room_amenities = DB::table('room_amenities')
                ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('room_amenities.room_id', '=', $room->id)
                ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                ->get();

            $room_features = DB::table('room_features')
                ->join('room_others_features', 'room_features.feature_id', '=', 'room_others_features.id')
                ->where('room_features.room_id', '=', $room->id)
                ->select('room_others_features.*', 'room_features.feature_id')
                ->get();

            $room_services = DB::table('room_services')
                ->join('H3_Services', 'room_services.room_service_id', '=', 'H3_Services.id')
                ->where('room_services.room_id', '=', $room->id)
                ->select('H3_Services.*', 'room_services.room_service_id')
                ->get();

            $room_extra_option = DB::table('room_extra_option')->where('room_id', '=', $room->id)->get();

            $room_gallery = DB::table('room_gallery')->where('room_id', '=', $room->id)->get();

            $roomdata[] = array(
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
                'projected_price' => $room->projected_price,
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
        $data['check_in'] = $check_in;
        $data['check_out'] = $check_out;
        $data['person'] = $person;
        // echo "<pre>"; print_r($data['room_data']);die;

        return view('front.hotel.hotel_details')->with($data);
    }

    public function room_details_ajax(Request $request)
    {
        $room_id = $request->id;
        $room_data =  DB::table('room_list')->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')->where(['room_list.id' => $room_id, 'room_list.status' => 1])->select('room_list.*', 'room_type_categories.title as room_type')->first();

        $room_amenities = DB::table('room_amenities')
            ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
            ->where('room_amenities.room_id', '=', $room_id)
            ->select('H2_Amenities.*', 'room_amenities.amenity_id')
            ->get();

        $room_features = DB::table('room_features')
            ->join('room_others_features', 'room_features.feature_id', '=', 'room_others_features.id')
            ->where('room_features.room_id', '=', $room_id)
            ->select('room_others_features.*', 'room_features.feature_id')
            ->get();

        $room_services = DB::table('room_services')
            ->join('H3_Services', 'room_services.room_service_id', '=', 'H3_Services.id')
            ->where('room_services.room_id', '=', $room_id)
            ->select('H3_Services.*', 'room_services.room_service_id')
            ->get();

        $room_extra_option = DB::table('room_extra_option')->where('room_id', '=', $room_id)->get();

        $room_gallery = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

        //return json(array('room_data'=>$room_data,'room_amenities'=>$room_amenities,'room_features'=>$room_features,'room_services'=>$room_services,'room_gallery'=>$room_gallery));

        return response()->json(['room_data' => $room_data, 'room_amenities' => $room_amenities, 'room_features' => $room_features, 'room_services' => $room_services, 'room_gallery' => $room_gallery]);
    }

    public function checkout(Request $request)
    {
        $u_id = Auth::id();
        // print_r($u_id);
        if (isset($_GET['hotel_id']) && isset($_GET['room_id'])) {
            $hotel_id = $_GET['hotel_id'];
            $room_id = $_GET['room_id'];
            // echo "<pre>";echo "room id "; print_r($room_id);
            $check_in = $_GET['check_in'];
            // echo "<pre>";print_r($check_in);
            $check_out = $_GET['check_out'];
            // echo "<pre>";print_r($check_out);
            $person = $_GET['person'];
            $data['hotel_data'] = DB::table('hotels')
                ->join('country', 'hotels.hotel_country', '=', 'country.id')
                ->where(['hotels.hotel_id' => $hotel_id, 'hotels.hotel_status' => 1])
                ->first();

            $data['room_data'] = DB::table('room_list')
                ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
                ->where(['room_list.hotel_id' => $hotel_id, 'room_list.id' => $room_id, 'room_list.status' => 1])
                ->select('room_list.*', 'room_type_categories.title as room_type')
                ->first();

            $data['room_amenities'] = DB::table('room_amenities')
                ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('room_amenities.room_id', '=', $room_id)
                ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                ->limit(5)
                ->get();

            $new_check_in = date('Y-m-d', strtotime($check_in));
            $new_check_out = date('Y-m-d', strtotime($check_out));

            $date1_ts = strtotime($new_check_in);
            $date2_ts = strtotime($new_check_out);
            $diff = $date2_ts - $date1_ts;
            $booking_days =  round($diff / 86400);

            $max_adults_limit = $data['room_data']->max_adults;
            $max_children_limit = $data['room_data']->max_childern;
            if ($person <= $max_adults_limit) {
                $total_room_num = 1;
            } else {
                $total_room_num = ceil($person / $max_adults_limit);
            }
            // echo "<pre>";print_r($total_room_num);die;

            $checkRequest = 0;
            $room_booking_request = [];
            if(Auth::check()){
                $data['request_data'] = DB::table('room_booking_request')->where('room_id', $room_id)
                            ->whereBetween('check_in_date', [date('Y-m-d', strtotime($new_check_in)), date('Y-m-d', strtotime($new_check_in))])
                            // ->orWhereNotBetween('check_out_date', [date('Y-m-d', strtotime($new_check_in)), date('Y-m-d', strtotime($new_check_in))])
                            ->get();
                foreach($data['request_data'] as $reqData){
                    if($reqData->user_id ==Auth::id())
                    {
                        $room_booking_request = $reqData;
                        $checkRequest = 1; 
                    }
                }
            }
            // echo "<pre>";print_r($room_booking_request);die;
            if(!empty($room_booking_request))
            {
                $data['details'] = DB::table('room_booking_request')
                    ->join('users', 'room_booking_request.user_id', '=', 'users.id')
                    ->join('hotels', 'room_booking_request.hotel_id', '=', 'hotels.hotel_id')
                    ->join('room_list', 'room_booking_request.room_id', '=', 'room_list.id')
                    ->select(
                        'room_booking_request.*',
                        'users.user_type',
                        'users.first_name as user_first_name',
                        'users.last_name as user_last_name',
                        'users.email as user_email',
                        'users.contact_number as user_contact_num',
                        'users.role_id as user_role_id',
                        'users.is_verify_email as user_email_is_verify_email',
                        'users.is_verify_contact as user_contact_is_verify_contact',
                        'hotels.hotel_name',
                        'hotels.hotel_user_id',
                        'hotels.is_admin as hotel_added_is_admin',
                        'hotels.property_contact_name',
                        'hotels.property_contact_num',
                        'hotels.hotel_address',
                        'hotels.hotel_city',
                        'hotels.stay_price as hotelroom_min_stay_price',
                        'hotels.checkin_time',
                        'hotels.checkout_time',
                        'hotels.booking_option',
                        'hotels.breakfast_availability',
                        'hotels.breakfast_price_inclusion',
                        'room_list.name as room_name',
                        'room_list.price_per_night'
                    )
                    ->where('room_booking_request.id', $room_booking_request->id)
                    ->first();
            }        

            $room_booked = DB::table('booking')
                    // ->where("room_id", $room_id)
                    ->whereBetween('check_in', [date('Y-m-d', strtotime($check_in)), date('Y-m-d', strtotime($check_out))])
                    ->orWhereBetween('check_out', [date('Y-m-d', strtotime($check_in)), date('Y-m-d', strtotime($check_out))])
                    ->get();
            // echo "<pre>";print_r($room_booked);

            $booked_rooms = array();
            foreach($room_booked as $room){
                if($room->user_id == Auth::id() and $room->room_id == $room_id){
                    $booked_rooms[] = $room;
                }
            }     
            //echo "<pre>";print_r($booked_rooms);die;
            // $room_booked_count = $room_booked->where('user_id', $u_id)->count();
            $room_booked_count = count($booked_rooms);
            // echo "<pre>";print_r($room_booked_count);die;

            $data['checkRequest'] = $checkRequest;
            $data['room_booking_request'] = $room_booking_request;
            $data['room_booked_count'] = $room_booked_count;

            $timestamp = strtotime('2009-10-22');
            $start_day = date('l', $date1_ts);
            $end_day = date('l', $date2_ts);
            $data['check_in'] = $check_in;
            $data['check_out'] = $check_out;
            $data['person'] = $person;
            $data['total_room_num'] = $total_room_num;
            $data['booking_days'] = $booking_days;
            $data['start_day'] = $start_day;
            $data['end_day'] = $end_day;

            $data['before_booking_date'] = date("Y-m-d", strtotime("+ 1 day"));

            // echo "<pre>";print_r($data);
            // die;
            return view('front/hotel/checkout')->with($data);
        } else {
            return redirect()->route('home');
        }
    }

    public function roomBookingOrderOffline(Request $request)
    {
        // echo "<pre>"; print_r($request->all());die;
        $forminput = $request->all();
        // echo "<pre>";print_r($forminput);die;
        // $user_id = $forminput['user_id'];
        if (Auth::check()) {
            $user_id =  Auth::id();
        } else {
            $user_id = '';
        }
        $hotel_id = $forminput['hotel_id'];
        $room_id = $forminput['room_id'];
        $check_in = $forminput['check_in'];
        $check_out = $forminput['check_out'];
        $cleaning_fee = $forminput['cleaning_fee'];
        $city_fee = $forminput['city_fee'];
        $tax_percentage = $forminput['tax_percentage'];
        $total_days = $forminput['total_days'];
        $total_room = $forminput['total_room'];
        $total_member = $forminput['total_member'];
        $total_amount = $forminput['total_amount'];        
        
        if(!empty($request->online_payable_amount) and $request->online_payable_amount > 0)
        {
            $online_payable_amount = $request->online_payable_amount;
        }else{
            $online_payable_amount = $total_amount;
        }
        $remaining_amount_to_pay = $request->at_desk_payable_amount;
        $partial_payment_status = $request->partial_payment_status;

        $email = $forminput['email'];
        $first_name = $forminput['first_name'];
        $last_name = $forminput['last_name'];
        $mobile = $forminput['mobile'];
        $document_type = $forminput['document_type'];
        $document_number = $forminput['document_number'];
        if ($request->hasFile('front_document_img')) {
            $image_name = $request->file('front_document_img')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
            $front_document_img = $filename . '-' . time() . '.' . $image_ext;
            $path = base_path() . '/public/uploads/user_document/';
            $request->file('front_document_img')->move($path, $front_document_img);
        }
        if ($request->hasFile('back_document_img')) {
            $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
            $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/user_document';
            $request->file('back_document_img')->move($pat2, $back_document_img);
        }
        $status = 1;

        $hotel_details = DB::table('hotels')->where('hotel_id', $hotel_id)->first();

        $data['title'] = $hotel_details->hotel_name;
        $data['address'] = $hotel_details->hotel_address;
        
        $data['hotel_id'] = $hotel_id;
        $data['room_id'] = $room_id;
        $data['user_id']  = $user_id;
        $data['price']  = $online_payable_amount;
        $data['start_date'] = $check_in;
        $data['end_date'] = $check_out;
        $data['email'] = $email;
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['mobile'] = $mobile;
        $data['document_type'] = $document_type;
        $data['document_number'] = $document_number;

        $guestinfo = DB::table('guestinfo')->insert(
            array(
                'hotel_id' =>  $hotel_id,
                'room_id' =>  $room_id,
                'email' =>  $email,
                'first_name' =>  $first_name,
                'last_name' => $last_name,
                'mobile' =>  $mobile,
                // 'payment_id' =>  $bankorderId,
                'document_type' =>  $document_type,
                'document_number' =>  $document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
                'status' =>  $status,
                'created_date' =>  date('Y-m-d H:i:s')
            )
        );
        
        $checkorder = DB::table('booking')->where('user_id', $user_id)->where('room_id', $room_id)->first();
        $data['payment_status'] = 'Due';

        $check = DB::table('booking')->insert(
            array(
                'user_id' =>  $user_id,
                // 'payment_id' =>  $bankorderId,
                'hotel_id' =>  $hotel_id,
                'room_id' =>  $room_id,
                'check_in' =>  $check_in,
                'check_out' =>  $check_out,
                'cleaning_fee' => round($cleaning_fee),
                'city_fee' =>  round($city_fee),
                'tax_percentage' =>  $tax_percentage,
                'total_days' => $total_days,
                'total_room' => $total_room,
                'total_member' => $total_member,
                'total_amount' => round($total_amount),
                'online_paid_amount' => 0,
                'remaining_amount_to_pay' => round($total_amount),
                'partial_payment_status' => $partial_payment_status,
                'booking_status' => 'pending',
                'payment_status' => 'Offline',
                'payment_type' => 0,
                'payment_id' => 0,
                'payment_token' => 0,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );

        $booking_id = DB::getpdo()->lastInsertId();

        $check = true;

        if ($check) {

            $users = User::where('id', '=', $user_id)->first();
            // echo "<pre>";print_r($users);die; 
            $data['user_info'] = $users;
            $data['booking_id'] = $booking_id;
            $data['url'] = url('/');
            $data['order_info'] =  DB::table('booking')
                ->join('users', 'users.id', '=', 'booking.user_id')
                ->join('hotels', 'hotels.hotel_id', '=', 'booking.hotel_id')
                ->join('room_list', 'room_list.id', '=', 'booking.room_id')
                ->where('booking.id', $booking_id)
                ->where('users.status', 1)
                ->select('booking.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.user_city', 'users.postal_code', 'users.contact_number', 'room_list.name', 'room_list.id as room_id', 'room_list.price_per_night', 'room_list.tax_percentage', 'room_list.cleaning_fee', 'room_list.city_fee', 'room_list.bed_type', 'room_list.breakfast_availability', 'room_list.breakfast_price_inclusion', 'hotels.hotel_id', 'hotels.hotel_user_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.hotel_city', 'hotels.hotel_rating', 'hotels.hotel_gallery', 'hotels.property_alternate_num', 'hotels.property_contact_num', 'hotels.hotel_latitude', 'hotels.hotel_longitude', 'hotels.payment_mode', 'hotels.booking_option')
                ->first();

            // echo "<pre>";print_r($data['order_info']);die;     

            // $update_payment_status = DB::table('room_booking_request')->where('user_id', $user_id)->where('room_id', $bookingtemp->room_id)->where('hotel_id', $bookingtemp->hotel_id)->update(['payment_status' => 1]);    

            $data['room_amenities'] = DB::table('room_amenities')
                ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('room_amenities.room_id', '=', $room_id)
                ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                ->limit(5)
                ->get();

            if ($_SERVER['SERVER_NAME'] != 'localhost') {

                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = $users->email;
                Mail::send('emails.invoice', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'roadNstays');
                    $message->to($inData['email']);
                    $message->subject('roadNstays - Room Booking Confirmation Mail');
                });

                $data['url'] = url('/admin_login');

                $data['status'] = 'created to user';

                $data['booking_id'] = $booking_id;

                Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'roadNstays');
                    $message->to('votivephppushpendra@gmail.com');
                    $message->subject('roadNstays - New Booking Recieved Mail');
                });
            }

            $hotelData = DB::table('hotels')->where('hotel_id',$hotel_id)->where('hotel_status', 1)->first();
            $vendor_id = $hotelData->hotel_user_id;
            if ($vendor_id != 1) {
                $vendors = DB::table('users')->where('id', '=', $vendor_id)->first();
                if (!empty($vendors)) {
                    if ($_SERVER['SERVER_NAME'] != 'localhost') {
                        $data['first_name'] = $vendors->first_name;
                        $data['status'] = 'Booking Space';
                        $data['booking_id'] = $booking_id;
                        $fromEmail = Helper::getFromEmail();
                        $inData['from_email'] = $fromEmail;
                        $inData['email'] = $vendors->email;
                        Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstays');
                            $message->to($inData['email']);
                            $message->subject('roadNstays - Order assigned');
                        });
                    }
                }
            }    
            Session::get('total_amt');
            session::flash('message', 'Booking created Succesfully.');
            // session::flash('message', 'Order created Succesfully.');
            //return redirect('/category/'.$frame_detail->category_id.'');
            return view('front/hotel/confirm_booking', $data);
        } else {
            $data['booking_id'] = $checkorder->id;
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['url'] = url('/');
            $data['order_info'] =  DB::table('booking')
                ->join('users', 'users.id', '=', 'booking.user_id')
                ->join('hotels', 'hotels.hotel_id', '=', 'booking.hotel_id')
                ->join('room_list', 'room_list.id', '=', 'booking.room_id')
                ->where('booking.id',  $checkorder->id)
                ->where('users.status', 1)
                ->select('booking.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.user_city', 'users.postal_code', 'users.contact_number', 'room_list.name', 'room_list.id as room_id', 'room_list.price_per_night', 'room_list.tax_percentage', 'room_list.cleaning_fee', 'room_list.city_fee', 'room_list.bed_type', 'room_list.breakfast_availability', 'room_list.breakfast_price_inclusion', 'room_list.earlybird_discount', 'hotels.hotel_id', 'hotels.hotel_user_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.hotel_city', 'hotels.hotel_rating', 'hotels.hotel_gallery', 'hotels.property_alternate_num', 'hotels.property_contact_num', 'hotels.hotel_latitude', 'hotels.hotel_longitude', 'hotels.payment_mode', 'hotels.booking_option', 'hotels.payment_mode', 'hotels.booking_option')
                ->first();

            $data['room_amenities'] = DB::table('room_amenities')
                ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('room_amenities.room_id', '=', $room_id)
                ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                ->limit(5)
                ->get();

            session::flash('message', 'Booking created Succesfully.');
        }

        return view('front/hotel/confirm_booking', $data);
        
    }


     public function booking_room_order(Request $request)
    {
        $forminput = $request->all();
        // echo "<pre>";print_r($forminput);die;
        $user_id = $forminput['user_id'];
        $hotel_id = $forminput['hotel_id'];
        $room_id = $forminput['room_id'];
        $check_in = $forminput['check_in'];
        $check_out = $forminput['check_out'];
        $cleaning_fee = $forminput['cleaning_fee'];
        $city_fee = $forminput['city_fee'];
        $tax_percentage = $forminput['tax_percentage'];
        $total_days = $forminput['total_days'];
        $total_room = $forminput['total_room'];
        $total_member = $forminput['total_member'];
        $total_amount = $forminput['total_amount'];        
        
        if(!empty($request->online_payable_amount) and $request->online_payable_amount > 0)
        {
            $online_payable_amount = $request->online_payable_amount;
        }else{
            $online_payable_amount = $total_amount;
        }
        $remaining_amount_to_pay = $request->at_desk_payable_amount;
        $partial_payment_status = $request->partial_payment_status;

        $email = $forminput['email'];
        $first_name = $forminput['first_name'];
        $last_name = $forminput['last_name'];
        $mobile = $forminput['mobile'];
        $document_type = $forminput['document_type'];
        $document_number = $forminput['document_number'];
        if ($request->hasFile('front_document_img')) {
            $image_name = $request->file('front_document_img')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
            $front_document_img = $filename . '-' . time() . '.' . $image_ext;
            $path = base_path() . '/public/uploads/user_document/';
            $request->file('front_document_img')->move($path, $front_document_img);
        }
        if ($request->hasFile('back_document_img')) {
            $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
            $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/user_document';
            $request->file('back_document_img')->move($pat2, $back_document_img);
        }
        $status = 1;
        $bankorderId   = rand(0,1786612);
        $data['bankorderId'] = $bankorderId;

        $hotel_details = DB::table('hotels')->where('hotel_id', $hotel_id)->first();

        $data['title'] = $hotel_details->hotel_name;
        $data['address'] = $hotel_details->hotel_address;
        
        $data['hotel_id'] = $hotel_id;
        $data['room_id'] = $room_id;
        $data['user_id']  = $user_id;
        $data['price']  = $online_payable_amount;
        $data['start_date'] = $check_in;
        $data['end_date'] = $check_out;
        $data['email'] = $email;
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['mobile'] = $mobile;
        $data['document_type'] = $document_type;
        $data['document_number'] = $document_number;


        $url = "https://payments.bankalfalah.com/HS/HS/HS";

        //$url = "https://payments.bankalfalah.com/HS/HS/HS";
            
        // $bankorderId   = $this->session->userdata('bankorderId');
        // $bankorderId   = rand(0,1786612);
         
        $Key1= "t4DqnM25k5QxZ9pv";
        $Key2= "9516555630272980";
        $HS_ChannelId="1001";
        $HS_MerchantId="19513" ;
        $HS_StoreId="024984" ;
        $HS_IsRedirectionRequest  = 0;
        $HS_ReturnURL= url('/payment-successful');
        $HS_MerchantHash="OUU362MB1upxJgeTHp3x+e9lYN3lrYJOyJIVHPA/LMyWny/BUgjHQmIGguLwbMuKbxc5OMqhewg=";
        $HS_MerchantUsername="dewagu" ;
        $HS_MerchantPassword="FcXrBMe4m3NvFzk4yqF7CA==";
        $HS_TransactionReferenceNumber= $bankorderId;
        $transactionTypeId = "3";
        $TransactionAmount = round($online_payable_amount);   
        $cipher="aes-128-cbc";
        

        $data['key1'] = $Key1;
        $data['Key2'] = $Key2;
        $data['HS_ChannelId'] = $HS_ChannelId;
        $data['HS_MerchantId'] = $HS_MerchantId;
        $data['HS_StoreId'] = $HS_StoreId;
        $data['HS_IsRedirectionRequest'] = $HS_IsRedirectionRequest;
        $data['HS_ReturnURL'] = $HS_ReturnURL;
        $data['HS_MerchantHash']  = $HS_MerchantHash;
        $data['HS_MerchantUsername'] = $HS_MerchantUsername;
        $data['HS_MerchantPassword'] = $HS_MerchantPassword;
        $data['HS_TransactionReferenceNumber'] = $HS_TransactionReferenceNumber;
        $data['transactionTypeId'] = $transactionTypeId;
        $data['TransactionAmount'] = $TransactionAmount;
        $data['cipher'] = $cipher;
        
        $mapString = 
          "HS_ChannelId=$HS_ChannelId" 
        . "&HS_IsRedirectionRequest=$HS_IsRedirectionRequest" 
        . "&HS_MerchantId=$HS_MerchantId" 
        . "&HS_StoreId=$HS_StoreId" 
        . "&HS_ReturnURL=$HS_ReturnURL"
        . "&HS_MerchantHash=$HS_MerchantHash"
        . "&HS_MerchantUsername=$HS_MerchantUsername"
        . "&HS_MerchantPassword=$HS_MerchantPassword"
        . "&HS_TransactionReferenceNumber=$HS_TransactionReferenceNumber";
        
        $cipher_text = openssl_encrypt($mapString, $cipher, $Key1,   OPENSSL_RAW_DATA , $Key2);
        $hashRequest = base64_encode($cipher_text); 
        
        //The data you want to send via POST
        $fields = [
            "HS_ChannelId"=>$HS_ChannelId,
            "HS_IsRedirectionRequest"=>$HS_IsRedirectionRequest,
            "HS_MerchantId"=> $HS_MerchantId,
            "HS_StoreId"=> $HS_StoreId,
            "HS_ReturnURL"=> $HS_ReturnURL,
            "HS_MerchantHash"=> $HS_MerchantHash,
            "HS_MerchantUsername"=> $HS_MerchantUsername,
            "HS_MerchantPassword"=> $HS_MerchantPassword,
            "HS_TransactionReferenceNumber"=> $HS_TransactionReferenceNumber,
            "HS_RequestHash"=> $hashRequest
        ];
        
        $fields_string = http_build_query($fields);
        
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        //execute post
        $result = curl_exec($ch);
        
        $handshake =  json_decode($result);
       
        $AuthToken = $handshake->AuthToken;
        
        // print_r($handshake);die;   
        // echo $result ."<br>";
        // echo $AuthToken ."<br>";
      
      
        /* ==============SSO CALL ================*/
      
        // you need Auth Token & Amount Here before Hashing
        
        $RequestHash1 = NULL;
        $Currency = "PKR";
        $IsBIN =0;

        $mapStringSSo = 
          "AuthToken=$AuthToken" 
        . "&RequestHash=$RequestHash1" 
        . "&ChannelId=$HS_ChannelId"
        . "&Currency=$Currency"
        . "&IsBIN=$IsBIN"
        . "&ReturnURL=$HS_ReturnURL"
        . "&MerchantId=$HS_MerchantId"
        . "&StoreId=$HS_StoreId" 
        . "&MerchantHash=$HS_MerchantHash"
        . "&MerchantUsername=$HS_MerchantUsername"
        . "&MerchantPassword=$HS_MerchantPassword"
        . "&TransactionTypeId=3"
        . "&TransactionReferenceNumber=$HS_TransactionReferenceNumber"
        . "&TransactionAmount=$TransactionAmount"; 

        //echo $mapStringSSo."<br>";
                
        $cipher_text = openssl_encrypt($mapStringSSo, $cipher, $Key1,   OPENSSL_RAW_DATA , $Key2);
        $hashRequest1 = base64_encode($cipher_text);

    
        $data['AuthToken'] = $AuthToken;
        $data['hashRequest1'] = $hashRequest1;

        $guestinfo = DB::table('guestinfo')->insert(
            array(
                'hotel_id' =>  $hotel_id,
                'room_id' =>  $room_id,
                'email' =>  $email,
                'first_name' =>  $first_name,
                'last_name' => $last_name,
                'mobile' =>  $mobile,
                'payment_id' =>  $bankorderId,
                'document_type' =>  $document_type,
                'document_number' =>  $document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
                'status' =>  $status,
                'created_date' =>  date('Y-m-d H:i:s')
            )
        );

        $check = DB::table('booking_temp')->insert(
            array(
                'user_id' =>  $user_id,
                'payment_id' =>  $bankorderId,
                'hotel_id' =>  $hotel_id,
                'room_id' =>  $room_id,
                'check_in' =>  $check_in,
                'check_out' =>  $check_out,
                'cleaning_fee' => round($cleaning_fee),
                'city_fee' =>  round($city_fee),
                'tax_percentage' =>  $tax_percentage,
                'total_days' => $total_days,
                'total_room' => $total_room,
                'total_member' => $total_member,
                'total_amount' => round($total_amount),
                'online_paid_amount' => round($online_payable_amount),
                'remaining_amount_to_pay' => round($remaining_amount_to_pay),
                'partial_payment_status' => $partial_payment_status,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        return view('front/apg/apg', $data);

    }

    public function booking_room_order_old(Request $request)
    {

        return redirect($link);

        die;
        $forminput = $request->all();
        // echo "<pre>";print_r($forminput);die;
        $user_id = $forminput['user_id'];
        $hotel_id = $forminput['hotel_id'];
        $room_id = $forminput['room_id'];
        $check_in = $forminput['check_in'];
        $check_out = $forminput['check_out'];
        $cleaning_fee = $forminput['cleaning_fee'];
        $city_fee = $forminput['city_fee'];
        $tax_percentage = $forminput['tax_percentage'];
        $total_days = $forminput['total_days'];
        $total_room = $forminput['total_room'];
        $total_member = $forminput['total_member'];
        $total_amount = $forminput['total_amount'];
        $email = $forminput['email'];
        $first_name = $forminput['first_name'];
        $last_name = $forminput['last_name'];
        $mobile = $forminput['mobile'];
        $document_type = $forminput['document_type'];
        $document_number = $forminput['document_number'];
        if ($request->hasFile('front_document_img')) {
            $image_name = $request->file('front_document_img')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('front_document_img')->getClientOriginalExtension();
            $front_document_img = $filename . '-' . time() . '.' . $image_ext;
            $path = base_path() . '/public/uploads/user_document/';
            $request->file('front_document_img')->move($path, $front_document_img);
        }
        if ($request->hasFile('back_document_img')) {
            $image_nam2 = $request->file('back_document_img')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('back_document_img')->getClientOriginalExtension();
            $back_document_img = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/user_document';
            $request->file('back_document_img')->move($pat2, $back_document_img);
        }
        $status = 1;
        //echo "<pre>"; print_r($forminput);die;
        // $client = "AcwBj1jBaPuIaGvVF4WCqtT8PMe8XVlNLriyqP2JVlFViJQpJbmF-CMsTnqI9TOA0Z6kWeD3uG5R0xvO";
        // $secret= "EPZ31KCn1aSfHzEkjdV6fI_A31vdzcbhVhV-fkc0GFKvc_WVJZPoKOCAw8TNmhKQVAF4pW46iaDpmznd";

        $client = "AVEgpnihV9nIWSO15Cg-SWM-TcA9_nKFqH_xA_gzoRmdpRw_dQNlB65G-fzbjr6dz5tUTr-ITCLbJ2Yn";
        $secret = "EFB-JdeQkwgkqOf7fAf5wIIDC1ed_67MDjU_2SSySwnzTnQu4v-DciM75nirTa7qJGeXL4_cdmIK6HEh";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $client . ":" . $secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $result = curl_exec($ch);

        if (empty($result)) die("Error: No response.");
        else {
            $json = json_decode($result);

            $paccess_token = $json->access_token;
        }

        $data = '{
                  "intent":"sale",
                  "redirect_urls":{
                    "return_url":"' . url('/payment-successful') . '",
                    "cancel_url":"' . url('/payment-cancelled') . '"
                  },
                  "payer":{
                    "payment_method":"paypal"
                  },
                  "transactions":[
                    {
                      "amount":{
                        "total":' . round($forminput['total_amount']) . ',
                        "currency":"USD"
                      },
                      "description":"This is the payment transaction description."
                    }
                  ]
                }';

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "Content-Type: application/json",
                "Authorization: Bearer " . $json->access_token,
                "Content-length: " . strlen($data)
            )
        );

        $result = curl_exec($ch);
        $json = json_decode($result);
        $link = $json->links[1]->href;
        $tokenlink = $json->links[1]->href;
        $link_array = explode('&token=', $tokenlink);
        $token = end($link_array);

        $state = $json->state;

        $payment_id = $json->id;

        $guestinfo = DB::table('guestinfo')->insert(
            array(
                'hotel_id' =>  $hotel_id,
                'room_id' =>  $room_id,
                'email' =>  $email,
                'first_name' =>  $first_name,
                'last_name' => $last_name,
                'mobile' =>  $mobile,
                'payment_id' =>  $payment_id,
                'document_type' =>  $document_type,
                'document_number' =>  $document_number,
                'front_document_img' =>  $front_document_img,
                'back_document_img' =>  $back_document_img,
                'status' =>  $status,
                'created_date' =>  date('Y-m-d H:i:s')
            )
        );

        $check = DB::table('booking_temp')->insert(
            array(
                'user_id' =>  $user_id,
                'payment_id' =>  $payment_id,
                'paccess_token' =>  $paccess_token,
                'token_id' => $token,
                'hotel_id' =>  $hotel_id,
                'room_id' =>  $room_id,
                'check_in' =>  $check_in,
                'check_out' =>  $check_out,
                'cleaning_fee' => round($cleaning_fee),
                'city_fee' =>  round($city_fee),
                'tax_percentage' =>  $tax_percentage,
                'total_days' => $total_days,
                'total_room' => $total_room,
                'total_member' => $total_member,
                'total_amount' => round($total_amount),
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        return redirect($link);
    }

    public function ipn(Request $request)
    {
        $url = $_GET['url'];
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL,  $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $result =  json_decode($jsonData);
        //echo $jsonData."<br>";

        echo "<pre>";print_r($result);
        echo $result->TransactionStatus;
    }

    public function payment_successful(Request $request)
    {
       
        

        $order_id = $_GET['O'];
        $url = "https://payments.bankalfalah.com/HS/api/IPN/OrderStatus/19513/024984/".$order_id;
    
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL,  $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $result =  json_decode($jsonData);
        // echo $jsonData."<br>";


        // echo $result->TransactionStatus;

        // print_r($_GET['O']);die;
        // echo "test";die;

        // $data['order_id'] = $_GET['O'];
        // $data['MerchantId'] = "19513";
        // $data['StoreId'] = "024984";

        // return view('front/apg/ipn')->with($data);
        
        // die;
        if (Auth::check()) {
            $user_id =  Auth::id();
        } else {
            $user_id = '';
        }
        $paymentId = $_GET['O'];
        // $token = $_GET['token'];
        // $PayerID = $_GET['PayerID'];
        // $paccess_token = '';
        $bookingtemp = DB::table('booking_temp')->where('payment_id', '=', $paymentId)->first();
        $hotelData = DB::table('hotels')->where('hotel_id', $bookingtemp->hotel_id)->where('hotel_status', 1)->first();
        $userData = DB::table('guestinfo')->where('payment_id', $paymentId)->where('status', 1)->first();
        
        $vendor_id = $hotelData->hotel_user_id;
        $check_guest_user = 0;
        if (!empty($bookingtemp)) {
            $uemail = $userData->email;
            //$pfirst_name = $resulspays->payer->payer_info->first_name;
            $ufirst_name = $userData->first_name;
            //$plast_name = $resulspays->payer->payer_info->last_name;
            $ulast_name = $userData->last_name;
            $uphone = !empty($userData->mobile) ?  $userData->mobile : '';
            $uemail = $userData->email;
            $password = "roadnstays@123";
            $password = bcrypt($password);
            //curl_close($ch);
            if (empty($user_id)) {

                $checkuser = DB::table('users')->where('email', $uemail)->first();
                
                if (!empty($checkuser)) {
                    $user_id = $checkuser->id;
                    $user = User::where('id', $user_id)->update(['document_type' => $userData->document_type,'document_number' => $userData->document_number,'front_document_img' => $userData->front_document_img,'back_document_img' => $userData->back_document_img]);
                } else {
                    $check_guest_user = 1;
                    DB::table('users')->insert(
                        [
                            'first_name' =>  $ufirst_name,
                            'last_name' =>  $ulast_name,
                            'email' =>  $uemail,
                            'user_type' => 'normal_user',
                            'contact_number' =>  $uphone,
                            'document_type' =>  $userData->document_type,
                            'document_number' =>  $userData->document_number,
                            'front_document_img' =>  $userData->front_document_img,
                            'back_document_img' =>  $userData->back_document_img,
                            'password' =>  $password,
                            'role_id' =>  2,
                            'is_verify_email' => 0,
                            'register_by' =>  'web',
                            'status' => 1,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'created_at' =>  date('Y-m-d H:i:s')
                        ]
                    );

                    $user_id = DB::getpdo()->lastInsertId();
                }
            }
        }
        
        $checkorder = DB::table('booking')->where('payment_token', '=', $result->TransactionId)->first();
        
        //echo "<pre>"; print_r($result);die;

        $data['payment_status'] = $result->TransactionStatus;

        if($result->TransactionStatus=="Paid")
        {
            $booking_status = "confirmed";
        }else{
            $booking_status = "failed";
        }
        
        if (empty($checkorder)) {

            DB::table('booking')->insert(
                [
                    'user_id' =>  $user_id,
                    'hotel_id' => $bookingtemp->hotel_id,
                    'room_id' =>  $bookingtemp->room_id,
                    'check_in' =>  $bookingtemp->check_in,
                    'check_out' =>  $bookingtemp->check_out,
                    'total_days' =>  $bookingtemp->total_days,
                    'total_room' =>   $bookingtemp->total_room,
                    'total_member' => $bookingtemp->total_member,
                    'total_amount' => $bookingtemp->total_amount,
                    'partial_payment_status' =>  $bookingtemp->partial_payment_status,
                    'online_paid_amount' =>  $bookingtemp->online_paid_amount,
                    'remaining_amount_to_pay' =>  $bookingtemp->remaining_amount_to_pay,
                    'cleaning_fee' => $bookingtemp->cleaning_fee,
                    'city_fee' => $bookingtemp->city_fee,
                    'tax_percentage' => $bookingtemp->tax_percentage,
                    'booking_status' => $booking_status,
                    'payment_status' => $result->TransactionStatus,
                    'payment_type' => $result->TransactionTypeId,
                    'payment_id' => $result->TransactionReferenceNumber,
                    'payment_token' => $result->TransactionId,
                    //'Payer_id' => $PayerID,
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $booking_id = DB::getpdo()->lastInsertId();

            DB::table('payment_transaction')->insert(
                [
                    'booking_id' => $booking_id,
                    'user_id' =>  $user_id,
                    'vendor_id' =>  $vendor_id,
                    'txn_id' => $result->TransactionId,
                    'txn_amount' =>  $bookingtemp->total_amount,
                    'payment_method' => 'ALFA',
                    'booking_type' => 'Room',
                    'txn_status' =>  $result->TransactionStatus,
                    'txn_date' => date('Y-m-d H:i:s'),
                    'created_at' =>  date('Y-m-d H:i:s')
                ]
            );

            $check = true;

            if ($check) {

                $users = User::where('id', '=', $user_id)->first();
                $data['user_info'] = $users;
                $data['booking_id'] = $booking_id;
                $data['url'] = url('/');
                $data['order_info'] =  DB::table('booking')
                    ->join('users', 'users.id', '=', 'booking.user_id')
                    ->join('hotels', 'hotels.hotel_id', '=', 'booking.hotel_id')
                    ->join('room_list', 'room_list.id', '=', 'booking.room_id')
                    ->where('booking.id', $booking_id)
                    ->where('users.status', 1)
                    ->select('booking.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.user_city', 'users.postal_code', 'users.contact_number', 'room_list.name', 'room_list.id as room_id', 'room_list.price_per_night', 'room_list.tax_percentage', 'room_list.cleaning_fee', 'room_list.city_fee', 'room_list.bed_type', 'room_list.breakfast_availability', 'room_list.breakfast_price_inclusion', 'hotels.hotel_id', 'hotels.hotel_user_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.hotel_city', 'hotels.hotel_rating', 'hotels.hotel_gallery', 'hotels.property_alternate_num', 'hotels.property_contact_num', 'hotels.hotel_latitude', 'hotels.hotel_longitude', 'hotels.payment_mode', 'hotels.booking_option')
                    ->first();

                //echo "<pre>";print_r($data['order_info']);die;     

                $update_payment_status = DB::table('room_booking_request')->where('user_id', $user_id)->where('room_id', $bookingtemp->room_id)->where('hotel_id', $bookingtemp->hotel_id)->update(['payment_status' => 1]);    

                $data['room_amenities'] = DB::table('room_amenities')
                    ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                    ->where('room_amenities.room_id', '=', $bookingtemp->room_id)
                    ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                    ->limit(5)
                    ->get();

                if ($_SERVER['SERVER_NAME'] != 'localhost') {

                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $users->email;
                    Mail::send('emails.invoice', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to($inData['email']);
                        $message->subject('roadNstsys - Room Booking Confirmation Mail');
                    });
                    if($check_guest_user === 1){
                        $usr_data = array('user_id'=>$users->id,'name'=>"User",'first_name'=>$users->first_name,'last_name'=>$users->last_name,'email'=>$users->email,'password'=>"roadnstays@123");
                        Mail::send('emails.signup_template', $usr_data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'RoadNStays');
                            $message->to($inData['email']);
                            $message->subject('RoadNStays - User E-mail Verification');
                        });
                    }

                    $data['url'] = url('/admin_login');

                    $data['status'] = 'created to user';

                    $data['booking_id'] = $booking_id;

                    Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'roadNstays');
                        $message->to('votivephppushpendra@gmail.com');
                        $message->subject('roadNstays - New Booking Recieved Mail');
                    });
                }

                // $hotelData = DB::table('hotels')->where('hotel_id',$bookingtemp->hotel_id)->where('hotel_status', 1)->first();
                // $vendor_id = $hotelData->hotel_user_id;
                $vendors = User::where('id', '=', $vendor_id)->first();
                //$vendor_counts = count($vendors);
                if (!empty($vendors)) {
                    if ($_SERVER['SERVER_NAME'] != 'localhost') {

                        $data['first_name'] = $vendors->first_name;

                        $data['status'] = 'Booking Room';

                        $data['booking_id'] = $booking_id;

                        $fromEmail = Helper::getFromEmail();
                        $inData['from_email'] = $fromEmail;
                        $inData['email'] = $vendors->email;
                        Mail::send('emails.invoice-reciever', $data, function ($message) use ($inData) {
                            $message->from($inData['from_email'], 'roadNstays');
                            $message->to($inData['email']);
                            $message->subject('roadNstays - Order assigned');
                        });


                        //DB::table('orders')->where('id', $order_id)->update(['vendor_id' => $vendors[0]->vendor_id]);
                    }
                }
                Session::get('total_amt');
                if($check_guest_user === 0){
                    if(Auth::check()){
                        session::flash('message', 'Booking created Succesfully.');
                    }else{
                        session::flash('message', 'To view your booking Please! do signin into your account');
                    }
                }else{
                    // success_noti_rigid('To view your booking Please! do signin into your account after verify your E-mail.');
                    session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
                }
                // session::flash('message', 'Order created Succesfully.');
                //return redirect('/category/'.$frame_detail->category_id.'');
                return view('front/hotel/confirm_booking', $data);
            } else {


                session::flash('error', 'Record not inserted.');die;
                return redirect('/');
            }
        } else {
            //echo "<pre>"; print_r($checkorder);die;
            $data['booking_id'] = $checkorder->id;
            $users = User::where('id', '=', $user_id)->first();
            $data['user_info'] = $users;
            $data['booking_id'] =  $checkorder->id;
            $data['url'] = url('/');
            $data['order_info'] =  DB::table('booking')
                ->join('users', 'users.id', '=', 'booking.user_id')
                ->join('hotels', 'hotels.hotel_id', '=', 'booking.hotel_id')
                ->join('room_list', 'room_list.id', '=', 'booking.room_id')
                ->where('booking.id',  $checkorder->id)
                ->where('users.status', 1)
                ->select('booking.*', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.user_city', 'users.postal_code', 'users.contact_number', 'room_list.name', 'room_list.id as room_id', 'room_list.price_per_night', 'room_list.tax_percentage', 'room_list.cleaning_fee', 'room_list.city_fee', 'room_list.bed_type', 'room_list.breakfast_availability', 'room_list.breakfast_price_inclusion', 'hotels.hotel_id', 'hotels.hotel_user_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.hotel_city', 'hotels.hotel_rating', 'hotels.hotel_gallery', 'hotels.property_alternate_num', 'hotels.property_contact_num', 'hotels.hotel_latitude', 'hotels.hotel_longitude', 'hotels.payment_mode', 'hotels.booking_option')
                ->first();

            // echo "<pre>";print_r($data['order_info']);die;  

            $data['room_amenities'] = DB::table('room_amenities')
                ->join('H2_Amenities', 'room_amenities.amenity_id', '=', 'H2_Amenities.amenity_id')
                ->where('room_amenities.room_id', '=', $bookingtemp->room_id)
                ->select('H2_Amenities.*', 'room_amenities.amenity_id')
                ->limit(5)
                ->get();

            if($check_guest_user === 0){
                if(Auth::check()){
                    session::flash('message', 'Booking created Succesfully.');
                }else{
                    session::flash('message', 'To view your booking Please! do signin into your account');
                }
            }else{
                // success_noti_rigid('To view your booking Please! do signin into your account after verify your E-mail.');
                session::flash('message', 'To view your booking Please! do signin into your account after verify your E-mail.');
            }
        }
        // session::flash('message', 'Booking created Succesfully.');
        // session::flash('message', 'To view your booking Please! do signin, after verify your E-mail.');
        //return redirect('/category/'.$frame_detail->category_id.'');
        return view('front/hotel/confirm_booking', $data);
    }

    public function confirm_booking()
    {
        return view('front/hotel/confirm_booking');
    }

    public function serviceProDashboard(Request $request)
    {
        $data['page_heading_name'] = 'Dashboard';
        return view('vendor.dashboard')->with($data);
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

        $reseturll = url('/reset-password/');

        $checkuser = DB::table('users')->where(['email' => $email])->first();

        if (!empty($checkuser)) {
            $checkLinkExist = DB::table('password_resets')->where('email', $email)->first();
            if (!empty($checkLinkExist)) {
                DB::table('password_resets')->where(['email' => $email])->delete();
            }
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $data = array('email' => $email, 'token' => $token, 'reseturll' => $reseturll);

            $fromEmail = Helper::getFromEmail();
            $inData['from_email'] = $fromEmail;
            $inData['email'] = $email;

            Mail::send('emails.emailtemplate', $data, function ($message) use ($inData) {
                $message->from($inData['from_email'], 'RoadNStays');
                $message->to($inData['email']);
                $message->subject('RoadNStays - Reset Password');
            });

            return response()->json(['status' => 'success', 'msg' => 'Please check your email address..']);
        } else {

            return response()->json(['status' => 'error', 'msg' => 'Please enter vaild mail-id!']);
        }
    }

    public function reset_password($token)
    {

        return view("front/reset_password", ['token' => $token]);
    }

    public function resetPassword_action(Request $request)
    {
        $password = $request->reset_password;
        $confirmpassword = $request->reset_repassword;

        if ($password == $confirmpassword) {
            $updatePassword = DB::table('password_resets')->where(['token' => $request->token])->first();

            if (!$updatePassword) {
                // return back()->withInput()->with('error', 'Invalid token!');
                // return redirect('/forgotPassword')->with('error', "Password Reset link has been Expired");
                return response()->json(['status' => 'expError', 'msg' => 'Password Reset link has been Expired']);
            }

            $password = $request->reset_password;

            $user = User::where('email', $updatePassword->email)->update(['password' => bcrypt($password)]);

            DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();

            // return redirect('/login')->with('msg', "Your password has been changed!");
            return response()->json(['status' => 'success', 'msg' => 'Your password has been changed!']);
        } else {
            // return redirect('/resetPassword/{{$request->token}}')->with('error', "Password not Matched!");
            return response()->json(['status' => 'error', 'msg' => 'Password not Matched!']);
        }
    }

    public function submitMaketrip(Request $request)
    {   
        $trip_data =  array(
            'your_name' =>  $request->name,
            'email_address' =>  $request->email,
            'phone_number' =>  $request->phone,
            'adult' =>  $request->adult,
            'child' => $request->child,
            'rooms' =>  $request->rooms,
            'mattress' =>  $request->check,
            'mattress_quantity' =>  $request->matress_number,
            'transport' =>  $request->transport,
            'date' =>  $request->date,
            'departure_city' =>  $request->departure,
            'tour_duration' =>  $request->duration,
            'flexible_date' =>  $request->flex_date,
            'trip_type' => $request->type,
            'location' => $request->location,
            'details' => $request->message,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s')
        );

        // print_r($trip_data['email_address']);die;
        $makeTripWithUs = DB::table('trip_with_us')->insert($trip_data);

        $make_trip_id = DB::getpdo()->lastInsertId();

        if($make_trip_id){
            $fromEmail = Helper::getFromEmail();
            $inData['from_email'] = $trip_data['email_address'];
            $data['trip_data'] = $trip_data;
            Mail::send('emails.custom_tour_request', $data, function ($message) use ($inData) {
                $message->from($inData['from_email'], 'roadNstays');
                $message->to('votivephppushpendra@gmail.com');
                $message->subject('roadNstays - Custom Trip enquiry');
            });
        return response()->json(['status' => 'success', 'msg' => 'Make trip with us created successfully..']);
        } else {

        return response()->json(['status' => 'error', 'msg' => 'Occurred!']);
        }
    }

    public function tour_list_ajax(Request $request)
    {
       
       $star        = $request->star;
       $duration    = $request->duration;
       $location    = $request->location;
       $trip_type   = $request->trip_type;
       $trip_status = $request->trip_status;

        $data['tour_data'] = DB::table('tour_list')
        ->where(function ($query) use ($duration) {
            if (!empty($duration)) {
                $query->whereIn("tour_days", $duration);
            }
        })
        ->where(function ($query) use ($location) {
            if (!empty($location)) {
                $query->whereIn("city", $location);
            }
        })
        ->where(function ($query) use ($trip_type) {
            if (!empty($trip_type)) {
                $query->whereIn("tour_type", $trip_type);
            }
        })
        ->where(function ($query) use ($trip_status) {
            if (!empty($trip_status)) {
                $query->whereIn("tour_status", $trip_status);
            }
        })
        ->where('status', '=', 1)
        ->orderby('id', 'DESC')
        ->get();

         $returnHTML = view('front.tour.tour_list_ajax')->with($data)->render();;

        return response()->json($returnHTML);
    }

}    
