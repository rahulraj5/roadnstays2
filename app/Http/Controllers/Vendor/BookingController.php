<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use DB;
use Session;
use App\Helpers\Helper;

class BookingController extends Controller
{

    public function booking_list()
    {
        $user_id = Auth::id();
        $data['page_heading_name'] = 'Booking';
        $data['bookingList'] = DB::table('booking')
                                ->join('users', 'booking.user_id', '=', 'users.id')
                                ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
                                ->join('room_list', 'booking.room_id', '=', 'room_list.id')
                                ->select('booking.*',
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
                                    'room_list.name as room_name')
                                // ->orderby('created_at', 'DESC')
                                ->where('hotel_user_id',$user_id)
                                ->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('vendor/booking/booking_list')->with($data);
    }
    
    public function view_booking($id)
    {
        $booking_id = base64_decode($id);
        $data['page_heading_name'] = 'Booking Details';
        $data['bookingList'] = DB::table('booking')
                                ->join('users', 'booking.user_id', '=', 'users.id')
                                ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
                                ->join('room_list', 'booking.room_id', '=', 'room_list.id')
                                ->join('country', 'users.user_country', '=', 'country.id')
                                ->select('booking.*',
                                    'users.user_type',
                                    'users.first_name as user_first_name',
                                    'users.last_name as user_last_name',
                                    'users.email as user_email',
                                    'users.contact_number as user_contact_num',
                                    'users.role_id as user_role_id',
                                    'users.is_verify_email as user_email_is_verify_email',
                                    'users.is_verify_contact as user_contact_is_verify_contact',

                                    'users.address as user_address',
                                    'users.state_id as user_state',
                                    'users.user_city as user_city',
                                    'users.postal_code as user_postal_code',
                                    'users.document_type',
                                    'users.document_number',
                                    'users.front_document_img',
                                    'users.back_document_img',
                                    'country.nicename as user_country',

                                    'hotels.hotel_name',
                                    'hotels.hotel_user_id',
                                    'hotels.is_admin as hotel_added_is_admin',
                                    'hotels.property_contact_name',
                                    'hotels.property_contact_num',
                                    'hotels.hotel_address',
                                    'hotels.hotel_city',
                                    'hotels.stay_price as hotelroom_min_stay_price',
                                    'room_list.name as room_name',
                                    'room_list.price_per_night')
                                // ->orderby('created_at', 'DESC')
                                ->where('booking.id',$booking_id)
                                ->first();

        $property_role = $data['bookingList']->hotel_added_is_admin;
        $property_owner_id = $data['bookingList']->hotel_user_id;
        // echo "<pre>";print_r($property_role);
        // echo "<pre>";print_r($property_owner_id);
        if($property_role == 1){
            if($property_owner_id == 1){
                $data['admin_details'] = DB::table('admins')->where('id', $property_owner_id)->first();
            }  
        }else{
            $data['vendor_details'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->select('users.*','country.name as vendor_country_name')
            ->where('users.id', $property_owner_id)->first();
        } 

        $data['order_details'] = DB::table('booking')
                        ->join('users', 'booking.user_id', '=', 'users.id')
                        ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
                        ->join('room_list', 'booking.room_id', '=', 'room_list.id')
                        ->join('country', 'users.user_country', '=', 'country.id')
                        ->select('booking.*',
                            'users.user_type',
                            'users.first_name as user_first_name',
                            'users.last_name as user_last_name',
                            'users.email as user_email',
                            'users.contact_number as user_contact_num',
                            'users.role_id as user_role_id',
                            'users.is_verify_email as user_email_is_verify_email',
                            'users.is_verify_contact as user_contact_is_verify_contact',

                            'users.address as user_address',
                            'users.state_id as user_state',
                            'users.user_city as user_city',
                            'users.postal_code as user_postal_code',
                            'country.nicename as user_country',

                            'hotels.hotel_name',
                            'hotels.hotel_user_id',
                            'hotels.is_admin as hotel_added_is_admin',
                            'hotels.property_contact_name',
                            'hotels.property_contact_num',
                            'hotels.hotel_address',
                            'hotels.hotel_city',
                            'hotels.stay_price as hotelroom_min_stay_price',
                            'room_list.name as room_name',
                            'room_list.price_per_night')
                        // ->orderby('created_at', 'DESC')
                        ->where('booking.id',$booking_id)
                        ->get();

        // echo "<pre>";print_r($data['order_details']);die;
        // return view('vendor/booking/booking_view')->with($data);
        return view('vendor/booking/booking_details')->with($data);
    }

            
    public function space_booking_list()
    {
        $user_id = Auth::id();
        $data['page_heading_name'] = 'Space Booking';
        $data['bookingList'] = DB::table('space_booking')
                                ->join('users', 'space_booking.user_id', '=', 'users.id')
                                ->join('space', 'space_booking.space_id', '=', 'space.space_id')
                                ->select('space_booking.*',
                                    'users.user_type',
                                    'users.first_name as user_first_name',
                                    'users.last_name as user_last_name',
                                    'users.email as user_email',
                                    'users.contact_number as user_contact_num',
                                    'users.role_id as user_role_id',
                                    'users.is_verify_email as user_email_is_verify_email',
                                    'users.is_verify_contact as user_contact_is_verify_contact',
                                    'space.space_name',
                                    'space.space_user_id as space_vendor_id',
                                    // 'space.is_admin as hotel_added_is_admin',
                                    // 'space.property_contact_name',
                                    // 'space.property_contact_num',
                                    'space.space_address',
                                    'space.city',
                                    // 'space.stay_price as hotelroom_min_stay_price',
                                    // 'room_list.name as room_name'
                                    )
                                ->where('space.space_user_id',$user_id)    
                                ->orderby('id', 'DESC')
                                ->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('vendor/booking/space_booking_list')->with($data);
    }
    
    public function space_booking_view($id)
    {
        $data['page_heading_name'] = 'Space Booking Details';
        //print_r($id);die;
        $booking_id = base64_decode($id);

        // echo "<pre>";print_r($data);die;
        $data['bookingList'] = DB::table('space_booking')
                                ->join('users', 'space_booking.user_id', '=', 'users.id')
                                ->join('space', 'space_booking.space_id', '=', 'space.space_id')
                                ->join('country', 'users.user_country', '=', 'country.id')
                                ->select('space_booking.*',
                                    'users.user_type',
                                    'users.first_name as user_first_name',
                                    'users.last_name as user_last_name',
                                    'users.email as user_email',
                                    'users.contact_number as user_contact_num',
                                    'users.role_id as user_role_id',
                                    'users.is_verify_email as user_email_is_verify_email',
                                    'users.is_verify_contact as user_contact_is_verify_contact',
                                    'users.address as user_address',
                                    'users.state_id as user_state',
                                    'users.user_city as user_city',
                                    'users.postal_code as user_postal_code',
                                    'users.document_type',
                                    'users.document_number',
                                    'users.front_document_img',
                                    'users.back_document_img',
                                    'country.nicename as user_country',
                                    'space.space_name',
                                    'space.space_user_id as space_vendor_id',
                                    'space.space_address',
                                    'space.city',
                                    'space.guest_number',
                                    'space.room_number',
                                    'space.checkout_hr',
                                    'space.price_per_night')
                                // ->orderby('created_at', 'DESC')
                                ->where('space_booking.id',$booking_id)
                                ->first();

        // echo "<pre>";print_r($data['bookingList']);
        $space_vendor_id = $data['bookingList']->space_vendor_id;
        // echo "<pre>";print_r($space_vendor_id);die;
        if($space_vendor_id == 1){
                $data['vendor_details'] = DB::table('admins')->where('id', $space_vendor_id)->first();
        }else{
            $data['vendor_details'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->select('users.*','country.name as vendor_country_name')
            ->where('users.id', $space_vendor_id)->first();
        } 

        // echo "<pre>";print_r($data['vendor_details']);die;

        $data['order_details'] = DB::table('space_booking')
                        ->join('users', 'space_booking.user_id', '=', 'users.id')
                        ->join('space', 'space_booking.space_id', '=', 'space.space_id')
                        ->join('country', 'users.user_country', '=', 'country.id')
                        ->select('space_booking.*',
                            'users.user_type',
                            'users.first_name as user_first_name',
                            'users.last_name as user_last_name',
                            'users.email as user_email',
                            'users.contact_number as user_contact_num',
                            'users.role_id as user_role_id',
                            'users.is_verify_email as user_email_is_verify_email',
                            'users.is_verify_contact as user_contact_is_verify_contact',

                            'users.address as user_address',
                            'users.state_id as user_state',
                            'users.user_city as user_city',
                            'users.postal_code as user_postal_code',
                            'country.nicename as user_country',

                            'space.space_name',
                            'space.space_user_id as space_vendor_id',
                            'space.space_address',
                            'space.city',
                            'space.guest_number',
                            'space.room_number',
                            'space.checkout_hr',
                            'space.price_per_night')
                            // ->orderby('created_at', 'DESC')
                            ->where('space_booking.id',$booking_id)
                            ->get();

        // echo "<pre>";print_r($data['order_details']);die;
        // return view('admin/booking/booking_view')->with($data);
        return view('vendor/booking/space_booking_details')->with($data);
    } 

    public function transaction_history(Request $request)
    {   $vendor_id = Auth::id();
        $data['page_heading_name'] = 'Transacations History';
        $data['transaction_history'] = DB::table('payment_transaction')
                        ->join('users', 'payment_transaction.user_id', '=', 'users.id')
                        ->select('payment_transaction.*','users.first_name','users.last_name')
                        ->orderby('payment_transaction.id','DESC')
                        ->where('payment_transaction.vendor_id',$vendor_id)
                        ->get();
        return view('vendor/booking/transaction_history')->with($data);
    }

    public function view_transaction_history($id)
    {   $vendor_id = Auth::id();
        $transaction_id = $id;
        $data['page_heading_name'] = 'Transacation View';
        $data['transaction_history'] = DB::table('payment_transaction')
                        ->join('users', 'payment_transaction.user_id', '=', 'users.id')
                        ->select('payment_transaction.*','users.first_name','users.last_name')
                        ->orderby('payment_transaction.id','DESC')
                        ->where('payment_transaction.id',$transaction_id)
                        ->first();
                        //echo "<pre>"; print_r($data);die;
        return view('vendor/booking/view_transaction_history')->with($data);
        
    }   

    // space approval booking start here    

    public function space_approve_booking_list(Request $request)
    {
        $data['page_heading_name'] = 'Space Approve Booking List';
        $vendor_id = Auth::id();
        $data['bookingList'] = DB::table('space_booking_request')
            ->join('users', 'space_booking_request.user_id', '=', 'users.id')
            ->join('space', 'space_booking_request.space_id', '=', 'space.space_id')
            ->select(
                'space_booking_request.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'space.space_name',
                'space.space_user_id',
                // 'space.tour_start_date as tour_start_date',
                // 'space.tour_end_date',
                'space.price_per_night',
                // 'space.tour_days',
                'space.city',
                'space.booking_option'
            )
            ->where('space_user_id', $vendor_id)
            ->orderby('id', 'DESC')
            ->get();

        $data['invoiceNum'] = DB::table('space_booking_request')->where('approve_status', 1)->get(['id','invoice_num']);
        // echo "<pre>"; print_r($data['invoiceNum']);die;
        // echo "<pre>"; print_r($data['bookingList']);die;
        return view('vendor/space/approve_booking_list')->with($data);
    }

    public function getSpaceInvoiceDetails($request_id = 0)
    {
        // $details = DB::table('space_booking_request')->find($request_id);
        $details = DB::table('space_booking_request')
            ->join('users', 'space_booking_request.user_id', '=', 'users.id')
            ->join('space', 'space_booking_request.space_id', '=', 'space.space_id')
            ->select(
                'space_booking_request.*',
                'users.user_type',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.contact_number as user_contact_num',
                'users.role_id as user_role_id',
                'users.is_verify_email as user_email_is_verify_email',
                'users.is_verify_contact as user_contact_is_verify_contact',
                'space.space_name',
                'space.space_user_id',
                'space.price_per_night',
                'space.city',
                'space.booking_option'
            )
            ->where('space_booking_request.id', $request_id)
            ->first();
        // echo "<pre>";print_r($details);die;
        $html = "";
        if(!empty($details)){
           $html = "<tr>
                <td width='30%'><b>Space Name:</b></td>
                <td width='70%'> ".$details->space_name."</td>
             </tr>
             <tr>
                <td width='30%'><b>Period:</b></td>
                <td width='70%'> ".$details->check_in_date." to ".$details->check_out_date."</td>
             </tr>
             <tr>
                <td width='30%'><b>Price:</b></td>
                <td width='70%'>PKR ".$details->price_per_night."</td>
             </tr>
             <tr>
                <td width='30%'><b>Email:</b></td>
                <td width='70%'> ".$details->user_email."</td>
             </tr>
             <tr>
                <td width='30%'><b>Phone:</b></td>
                <td width='70%'> ".$details->user_contact_num."</td>
             </tr>
             <tr>
                <td>
                    <table class='invoice-items' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td>Cost</td>
                                <td class='alignright'>PKR ".$details->price_per_night."</td>
                            </tr>
                            <tr style='display:none;'>
                                <td>Discount</td>
                                <td class='alignright'>PKR <span id='discount_val'></span></td>
                            </tr>
                            <tr class='total'>
                                <td class='alignright' width='80%'>Total</td>
                                <td class='alignright'>PKR ".$details->price_per_night."</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
             </tr>";
        }
        $response['html'] = $html;
        $response['request_id'] = $details->id;
  
        return response()->json($response);
    }

    public function sendSpaceInvoice(Request $request)
    {
        $request_id = $request->request_id;

        if (!empty($request_id)) {
            $check = DB::table('space_booking_request')->where('id', $request_id)->first();
            if($check->approve_status == 0){
                $invoiceNum = Helper::generateRandomInvoiceId(5);
                DB::table('space_booking_request')
                    ->where('id', $request_id)
                    ->update([
                        'approve_status' => 1,
                        'invoice_num' => $invoiceNum
                    ]);
                return response()->json(['status' => 'success', 'msg' => 'Invoice Send Successfully', 'invoiceNum' => $invoiceNum]);
            }else{
                return response()->json(['status' => 'error', 'msg' => 'Already Sent Invoice']);
            }
        }
    } 

    public function delete_space_booking_request(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('space_booking_request')->where('id', '=', $request_id)->first();
        if ($res){
            DB::table('space_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been Deleted Successfully!'));
        }else{
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function cancel_space_booking_request_status(Request $request)
    {
        $request_id = $request->id;
        $check = DB::table('space_booking_request')->where('id', '=', $request_id)->first();
        if($check->request_status == 1){
            DB::table('space_booking_request')
            ->where('id', $request_id)
            ->update([
                'request_status' => 0,
                'approve_status' => 0,
            ]);
            return response()->json(['status' => 'success', 'msg' => 'Request cancel successfully']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'You already cancel Request']);
        }
    }

    // room approval booking end here

        // room approval booking start here    

        public function room_approve_booking_list(Request $request)
        {
            $data['page_heading_name'] = 'Room Approve Booking List';
            $vendor_id = Auth::id();
            $data['bookingList'] = DB::table('room_booking_request')
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
                    'room_list.name as room_name',
                )
                ->where('hotel_user_id', $vendor_id)
                ->orderby('id', 'DESC')
                ->get();
    
            $data['invoiceNum'] = DB::table('room_booking_request')->where('approve_status', 1)->get(['id','invoice_num']);
            // echo "<pre>"; print_r($data['invoiceNum']);die;
            // echo "<pre>"; print_r($data['bookingList']);die;
            return view('vendor/hotel/approve_booking_list')->with($data);
        }
    
        public function getRoomInvoiceDetails($request_id = 0)
        {
            // $details = DB::table('room_booking_request')->find($request_id);
            $details = DB::table('room_booking_request')
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
                    'room_list.name as room_name',
                    'room_list.price_per_night'
                )
                ->where('room_booking_request.id', $request_id)
                ->first();
            // echo "<pre>";print_r($details);die;
            $html = "";
            if(!empty($details)){
               $html = "<tr>
                    <td width='30%'><b>Room Name:</b></td>
                    <td width='70%'> ".$details->room_name."</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Hotel Name:</b></td>
                    <td width='70%'> ".$details->hotel_name."</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Period:</b></td>
                    <td width='70%'> ".$details->check_in_date." to ".$details->check_out_date."</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Price:</b></td>
                    <td width='70%'>PKR ".$details->price_per_night."</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Email:</b></td>
                    <td width='70%'> ".$details->user_email."</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Phone:</b></td>
                    <td width='70%'> ".$details->user_contact_num."</td>
                 </tr>
                 <tr>
                    <td>
                        <table class='invoice-items' cellpadding='0' cellspacing='0'>
                            <tbody>
                                <tr>
                                    <td>Cost</td>
                                    <td class='alignright'>PKR ".$details->price_per_night."</td>
                                </tr>
                                <tr class='total'>
                                    <td class='alignright' width='80%'>Total</td>
                                    <td class='alignright'>PKR ".$details->price_per_night."</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                 </tr>";
            }
            $response['html'] = $html;
            $response['request_id'] = $details->id;
      
            return response()->json($response);
        }
    
        public function sendRoomInvoice(Request $request)
        {
            $request_id = $request->request_id;
    
            if (!empty($request_id)) {
                $check = DB::table('room_booking_request')->where('id', $request_id)->first();
                if($check->approve_status == 0){
                    $invoiceNum = Helper::generateRandomInvoiceId(5);
                    DB::table('room_booking_request')
                        ->where('id', $request_id)
                        ->update([
                            'approve_status' => 1,
                            'invoice_num' => $invoiceNum
                        ]);
                    return response()->json(['status' => 'success', 'msg' => 'Invoice Send Successfully', 'invoiceNum' => $invoiceNum]);
                }else{
                    return response()->json(['status' => 'error', 'msg' => 'Already Sent Invoice']);
                }
            }
        } 
    
        public function delete_room_booking_request(Request $request)
        {
            $request_id = $request->id;
            $res = DB::table('room_booking_request')->where('id', '=', $request_id)->first();
            if ($res){
                DB::table('room_booking_request')->where('id', '=', $request_id)->delete();
                return json_encode(array('status' => 'success', 'msg' => 'Request has been Deleted Successfully!'));
            }else{
                return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
            }
        }
    
        public function cancel_room_booking_request_status(Request $request)
        {
            $request_id = $request->id;
            $check = DB::table('room_booking_request')->where('id', '=', $request_id)->first();
            if($check->request_status == 1){
                DB::table('room_booking_request')
                ->where('id', $request_id)
                ->update([
                    'request_status' => 0,
                    'approve_status' => 0,
                ]);
                return response()->json(['status' => 'success', 'msg' => 'Request cancel successfully']);
            }else{
                return response()->json(['status' => 'error', 'msg' => 'You already cancel Request']);
            }
        }
    
        // space approval booking end here
}
