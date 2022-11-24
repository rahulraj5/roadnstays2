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
use Mail;

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
            ->select(
                'booking.*',
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
                'room_list.name as room_name'
            )
            // ->orderby('created_at', 'DESC')
            ->where('hotel_user_id', $user_id)
            ->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('vendor/booking/booking_list')->with($data);
    }    

    public function view_room_wise_booking_list()
    {
        $user_id = Auth::id();
        $data['page_heading_name'] = 'Booking';
        $data['bookingList'] = DB::table('booking')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
            ->select(
                'booking.*',
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
                'room_list.name as room_name'
            )
            // ->orderby('created_at', 'DESC')
            ->where('hotel_user_id', $user_id)
            ->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('vendor/booking/room_wise_booking_list')->with($data);
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
            ->select(
                'booking.*',
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
                'room_list.price_per_night'
            )
            // ->orderby('created_at', 'DESC')
            ->where('booking.id', $booking_id)
            ->first();

        $property_role = $data['bookingList']->hotel_added_is_admin;
        $property_owner_id = $data['bookingList']->hotel_user_id;
        // echo "<pre>";print_r($property_role);
        // echo "<pre>";print_r($property_owner_id);
        if ($property_role == 1) {
            if ($property_owner_id == 1) {
                $data['admin_details'] = DB::table('admins')->where('id', $property_owner_id)->first();
            }
        } else {
            $data['vendor_details'] = DB::table('users')
                ->join('country', 'users.user_country', 'country.id')
                ->select('users.*', 'country.name as vendor_country_name')
                ->where('users.id', $property_owner_id)->first();
        }

        $data['order_details'] = DB::table('booking')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'booking.*',
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
                'room_list.price_per_night'
            )
            // ->orderby('created_at', 'DESC')
            ->where('booking.id', $booking_id)
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
            ->select(
                'space_booking.*',
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
            ->where('space.space_user_id', $user_id)
            ->orderby('id', 'DESC')
            ->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('vendor/booking/space_booking_list')->with($data);
    }
    
    public function view_space_wise_booking_list()
    {
        $user_id = Auth::id();
        $data['page_heading_name'] = 'Space Booking';
        $data['bookingList'] = DB::table('space_booking')
            ->join('users', 'space_booking.user_id', '=', 'users.id')
            ->join('space', 'space_booking.space_id', '=', 'space.space_id')
            ->select(
                'space_booking.*',
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
            ->where('space.space_user_id', $user_id)
            ->orderby('id', 'DESC')
            ->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('vendor/booking/space_wise_booking_list')->with($data);
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
            ->select(
                'space_booking.*',
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
                'space.price_per_night',
                'space.tax_percentage',
                'space.cleaning_fee',
                'space.city_fee'
            )
            // ->orderby('created_at', 'DESC')
            ->where('space_booking.id', $booking_id)
            ->first();

        // echo "<pre>";print_r($data['bookingList']);
        $space_vendor_id = $data['bookingList']->space_vendor_id;
        // echo "<pre>";print_r($space_vendor_id);die;
        if ($space_vendor_id == 1) {
            $data['vendor_details'] = DB::table('admins')->where('id', $space_vendor_id)->first();
        } else {
            $data['vendor_details'] = DB::table('users')
                ->join('country', 'users.user_country', 'country.id')
                ->select('users.*', 'country.name as vendor_country_name')
                ->where('users.id', $space_vendor_id)->first();
        }

        // echo "<pre>";print_r($data['vendor_details']);die;

        $data['order_details'] = DB::table('space_booking')
            ->join('users', 'space_booking.user_id', '=', 'users.id')
            ->join('space', 'space_booking.space_id', '=', 'space.space_id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'space_booking.*',
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
                'space.price_per_night'
            )
            // ->orderby('created_at', 'DESC')
            ->where('space_booking.id', $booking_id)
            ->get();

        // echo "<pre>";print_r($data['order_details']);die;
        // return view('admin/booking/booking_view')->with($data);
        return view('vendor/booking/space_booking_details')->with($data);
    }

    public function transaction_history(Request $request)
    {
        $vendor_id = Auth::id();
        $data['page_heading_name'] = 'Transacations History';
        $data['transaction_history'] = DB::table('payment_transaction')
            ->join('users', 'payment_transaction.user_id', '=', 'users.id')
            ->select('payment_transaction.*', 'users.first_name', 'users.last_name')
            ->orderby('payment_transaction.id', 'DESC')
            ->where('payment_transaction.vendor_id', $vendor_id)
            ->get();
        return view('vendor/booking/transaction_history')->with($data);
    }

    public function view_transaction_history($id)
    {
        $vendor_id = Auth::id();
        $transaction_id = $id;
        $data['page_heading_name'] = 'Transacation View';
        $data['transaction_history'] = DB::table('payment_transaction')
            ->join('users', 'payment_transaction.user_id', '=', 'users.id')
            ->select('payment_transaction.*', 'users.first_name', 'users.last_name')
            ->orderby('payment_transaction.id', 'DESC')
            ->where('payment_transaction.id', $transaction_id)
            ->first();
        //echo "<pre>"; print_r($data);die;
        
        if($data['transaction_history']->booking_type==='Room')
        {
            $data['booking_details'] = DB::table('booking')->where('id',$data['transaction_history']->booking_id)->first();
            $data['property_details'] = DB::table('hotels')->where('hotel_id',$data['booking_details']->hotel_id)->first();
            // echo "<pre>"; print_r($data['property_details']);die;
        }
        if($data['transaction_history']->booking_type==='Space')
        {
            $data['booking_details'] = DB::table('space_booking')->where('id',$data['transaction_history']->booking_id)->first();
            // echo "<pre>"; print_r($data['booking_details']);die;
            $data['property_details'] = DB::table('space')->where('space_id',$data['booking_details']->space_id)->first();
        }
        if($data['transaction_history']->booking_type==='Tour')
        {
            $data['booking_details'] = DB::table('tour_booking')->where('id',$data['transaction_history']->booking_id)->first();
            $data['property_details'] = DB::table('tour_list')->where('id',$data['booking_details']->tour_id)->first();
            // echo "<pre>"; print_r($tour_booking_details);die;
        }
        if($data['transaction_history']->booking_type==='Event')
        {
            $data['booking_details'] = DB::table('event_booking')->where('id',$data['transaction_history']->booking_id)->first();
            $data['property_details'] = DB::table('events')->where('id',$data['booking_details']->event_id)->first();
            // echo "<pre>"; print_r($event_booking_details);die;
        }
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

        $data['invoiceNum'] = DB::table('space_booking_request')->where('approve_status', 1)->get(['id', 'invoice_num']);
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
        if (!empty($details)) {
            $html = "<tr>
                <td width='30%'><b>Space Name:</b></td>
                <td width='70%'> " . $details->space_name . "</td>
             </tr>
             <tr>
                <td width='30%'><b>Period:</b></td>
                <td width='70%'> " . $details->check_in_date . " to " . $details->check_out_date . "</td>
             </tr>
             <tr>
                <td width='30%'><b>Price:</b></td>
                <td width='70%'>PKR " . $details->total_amount . "</td>
             </tr>
             <tr>
                <td width='30%'><b>Email:</b></td>
                <td width='70%'> " . $details->user_email . "</td>
             </tr>
             <tr>
                <td width='30%'><b>Phone:</b></td>
                <td width='70%'> " . $details->user_contact_num . "</td>
             </tr>
             
            <tr>
                <td width='30%'><b>Cost</b></td>
                <td width='70%' class='alignright'>PKR " . $details->total_amount . "</td>
            </tr>
            <tr id='discount_tr' class='d-non'>
                <td width='30%'><b id='discount_type_name'></b></td>
                <td width='70% class='alignright'>PKR -<span id='discount_val'></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type='button' class='btn-xs btn-danger remove_discount'>X</a></td>
            </tr>
            <tr id='expense_tr' class='d-non'>
                <td width='30%'><b id='expe_name'></b></td>
                <td width='70%' class='alignright'>PKR <span id='expe_val'></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type='button' class='btn-xs btn-danger remove_expense'>X</a></td>
            </tr>
            <tr class='total'>
                <td width='30%' class='alignright' width='80%'><b>Total</b></td>
                <td width='70%' class='alignright'>PKR <span id='total_amt'>" . $details->total_amount . "</span></td>
            </tr>";
        }
        $response['html'] = $html;
        $response['total_amount'] = $details->total_amount;
        $response['request_id'] = $details->id;

        return response()->json($response);
    }

    public function sendSpaceInvoice(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $request_id = $request->request_id;
        $disco_name = $request->disco_name;
        $disco_val = $request->disco_val;
        $exp_name = $request->exp_name;
        $exp_value = $request->exp_value;
        if (!empty($request_id)) {
            $check = DB::table('space_booking_request')->where('id', $request_id)->first();
            $space_details = DB::table('space')->where('space_id', '=', $check->space_id)->first(['request_booking_valid_hr']);
            if ($check->approve_status == 0) {
                $invoiceNum = Helper::generateRandomInvoiceId(5);
                DB::table('space_booking_request')
                    ->where('id', $request_id)
                    ->update([
                        'approve_status' => 1,
                        'invoice_num' => $invoiceNum,
                        'discount_name' => $disco_name,
                        'discount' => $disco_val,
                        'expense_name' => $exp_name,
                        'expense_value' => $exp_value
                    ]);
                $user_details = DB::table('users')->where('id', $check->user_id)->first(); 
                $data = array('user_id'=>$user_details->id, 'name'=>"User",'first_name'=>$user_details->first_name ,'last_name'=>$user_details->last_name ,'last_date'=>$check->last_date ,'last_time'=>$check->last_time, 'exp_hr'=>$space_details->request_booking_valid_hr);
                if ($_SERVER['SERVER_NAME'] != 'localhost') {
                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $user_details->email;
                    Mail::send('emails.booking_request_approval_template', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'RoadNStays');
                        $message->to($inData['email']);
                        $message->subject('RoadNStays - Booking Request has been Approved Successfully');
                    });
                } 
                return response()->json(['status' => 'success', 'msg' => 'Invoice Send Successfully', 'invoiceNum' => $invoiceNum]);
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Already Sent Invoice']);
            }
        }
    }

    public function delete_space_booking_request(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('space_booking_request')->where('id', '=', $request_id)->first();
        if ($res) {
            DB::table('space_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been Deleted Successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function cancel_space_booking_request_status(Request $request)
    {
        $request_id = $request->id;
        $check = DB::table('space_booking_request')->where('id', '=', $request_id)->first();
        if ($check->request_status == 1) {
            DB::table('space_booking_request')
                ->where('id', $request_id)
                ->update([
                    'request_status' => 0,
                    'approve_status' => 0,
                ]);
            $user_details = DB::table('users')->where('id', $check->user_id)->first(); 
            $data = array('user_id'=>$user_details->id, 'name'=>"User",'first_name'=>$user_details->first_name ,'last_name'=>$user_details->last_name);
            if ($_SERVER['SERVER_NAME'] != 'localhost') {
                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = $user_details->email;
                Mail::send('emails.booking_request_rejected_template', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'RoadNStays');
                    $message->to($inData['email']);
                    $message->subject('RoadNStays - Booking Request has been Rejected!');
                });
            } 
            return response()->json(['status' => 'success', 'msg' => 'Request cancel successfully']);
        } else {
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

        $data['invoiceNum'] = DB::table('room_booking_request')->where('approve_status', 1)->get(['id', 'invoice_num']);
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
                'room_list.price_per_night',
                'room_list.earlybird_discount as eb_discount'
            )
            ->where('room_booking_request.id', $request_id)
            ->first();
        // echo "<pre>";print_r($details);die;
        if($details->earlybird_discount > 0){
            $is_earlybird_discount = 1;
            $grand_total = $details->total_amount - $details->earlybird_discount;
            $early_class = '';
            $earlybird_discount = ((int)$details->total_amount * (int)$details->earlybird_discount)/100;
        }else{
            $is_earlybird_discount = 0;
            $grand_total = $details->total_amount;
            $early_class = 'd-non';
            $earlybird_discount = 0;
        }        

        $html = "";
        if (!empty($details)){
            $html = "<tr>
                    <td width='30%'><b>Room Name:</b></td>
                    <td width='70%'> " . $details->room_name . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Hotel Name:</b></td>
                    <td width='70%'> " . $details->hotel_name . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Period:</b></td>
                    <td width='70%'> " . $details->check_in_date . " to " . $details->check_out_date . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Price:</b></td>
                    <td width='70%'>PKR " . (int)((float)$details->total_amount + (float)$earlybird_discount) ."</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Email:</b></td>
                    <td width='70%'> " . $details->user_email . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Phone:</b></td>
                    <td width='70%'> " . $details->user_contact_num . "</td>
                 </tr>
                 
                <tr>
                    <td width='30%'><b>Cost</b></td>
                    <td width='70% class='alignright'>PKR " . ((float)$details->total_amount) . "</td>
                </tr>
                <tr id='early_discount_tr' class=". $early_class .">
                    <td width='30%'><b>Early Bird Discount($details->eb_discount %)</b></td>
                    <td width='70% class='alignright'>PKR -<span id='early_discount_val'>" . $earlybird_discount ."</span></td>
                </tr>
                <tr id='discount_tr' class='d-non'>
                    <td width='30%'><b id='discount_type_name'></b></td>
                    <td width='70% class='alignright'>PKR -<span id='discount_val'></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type='button' class='btn-xs btn-danger remove_discount'>X</a></td>
                </tr>
                <tr id='expense_tr' class='d-non'>
                    <td width='30%'><b id='expe_name'></b></td>
                    <td width='70% class='alignright'>PKR <span id='expe_val'></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type='button' class='btn-xs btn-danger remove_expense'>X</a></td>
                </tr>
                <tr class='total'>
                    <td width='30%' class='alignright' width='80%'><b>Total</b></td>
                    <td width='70% class='alignright'>PKR <span id='total_amt'>" . $details->total_amount . "</span></td>
                </tr>";
        }
        $response['html'] = $html;
        $response['total_amount'] = $details->total_amount;
        $response['request_id'] = $details->id;
        $response['is_earlybird_discount'] = $is_earlybird_discount;

        return response()->json($response);
    }

    public function getRoomInvoiceDetails_old($request_id = 0)
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
                'room_list.price_per_night',
                'room_list.earlybird_discount as eb_discount'
            )
            ->where('room_booking_request.id', $request_id)
            ->first();
        // echo "<pre>";print_r($details);die;
        if($details->earlybird_discount > 0){
            $is_earlybird_discount = 1;
            $grand_total = $details->total_amount - $details->earlybird_discount;
        }else{
            $is_earlybird_discount = 0;
            $grand_total = $details->total_amount;
        }        

        $html = "";
        if (!empty($details)){
            $html = "<tr>
                    <td width='30%'><b>Room Name:</b></td>
                    <td width='70%'> " . $details->room_name . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Hotel Name:</b></td>
                    <td width='70%'> " . $details->hotel_name . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Period:</b></td>
                    <td width='70%'> " . $details->check_in_date . " to " . $details->check_out_date . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Price:</b></td>
                    <td width='70%'>PKR " . ((int)$details->total_amount + (int)$details->earlybird_discount) . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Email:</b></td>
                    <td width='70%'> " . $details->user_email . "</td>
                 </tr>
                 <tr>
                    <td width='30%'><b>Phone:</b></td>
                    <td width='70%'> " . $details->user_contact_num . "</td>
                 </tr>
                 <tr>
                    <td>
                        <table class='invoice-items' cellpadding='0' cellspacing='0'>
                            <tbody>
                                <tr>
                                    <td>Cost</td>
                                    <td class='alignright'>PKR " . ((int)$details->total_amount + (int)$details->earlybird_discount) . "</td>
                                </tr>
                                <tr id='early_discount_tr' class='d-non'>
                                    <td>Early Bird Discount($details->eb_discount %)</td>
                                    <td class='alignright'>PKR -<span id='early_discount_val'>" . $details->earlybird_discount ."</span></td>
                                </tr>
                                <tr id='discount_tr' class='d-non'>
                                    <td id='discount_type_name'></td>
                                    <td class='alignright'>PKR -<span id='discount_val'></span></td>
                                </tr>
                                <tr id='expense_tr' class='d-non'>
                                    <td id='expe_name'></td>
                                    <td class='alignright'>PKR <span id='expe_val'></span></td>
                                </tr>
                                <tr class='total'>
                                    <td class='alignright' width='80%'>Total</td>
                                    <td class='alignright'>PKR <span id='total_amt'>" . $details->total_amount . "</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                 </tr>";
        }
        $response['html'] = $html;
        $response['total_amount'] = $details->total_amount;
        $response['request_id'] = $details->id;
        $response['is_earlybird_discount'] = $is_earlybird_discount;

        return response()->json($response);
    }

    public function sendRoomInvoice(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $request_id = $request->request_id;
        $disco_name = $request->disco_name;
        $disco_val = $request->disco_val;
        $exp_name = $request->exp_name;
        $exp_value = $request->exp_value;

        if (!empty($request_id)) {
            $check = DB::table('room_booking_request')->where('id', $request_id)->first();
            $hotel_details = DB::table('hotels')->where('hotel_id', '=', $check->hotel_id)->first(['request_booking_valid_hr']);
            if ($check->approve_status == 0) {
                $invoiceNum = Helper::generateRandomInvoiceId(5);
                DB::table('room_booking_request')
                    ->where('id', $request_id)
                    ->update([
                        'approve_status' => 1,
                        'invoice_num' => $invoiceNum,
                        'discount_name' => $disco_name,
                        'discount' => $disco_val,
                        'expense_name' => $exp_name,
                        'expense_value' => $exp_value
                    ]);
                $user_details = DB::table('users')->where('id', $check->user_id)->first(); 
                $data = array('user_id'=>$user_details->id, 'name'=>"User",'first_name'=>$user_details->first_name ,'last_name'=>$user_details->last_name ,'last_date'=>$check->last_date ,'last_time'=>$check->last_time, 'exp_hr'=>$hotel_details->request_booking_valid_hr);
                if ($_SERVER['SERVER_NAME'] != 'localhost') {
                    $fromEmail = Helper::getFromEmail();
                    $inData['from_email'] = $fromEmail;
                    $inData['email'] = $user_details->email;
                    Mail::send('emails.booking_request_approval_template', $data, function ($message) use ($inData) {
                        $message->from($inData['from_email'], 'RoadNStays');
                        $message->to($inData['email']);
                        $message->subject('RoadNStays - Booking Request has been Approved Successfully');
                    });
                }
                return response()->json(['status' => 'success', 'msg' => 'Invoice Send Successfully', 'invoiceNum' => $invoiceNum]);
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Already Sent Invoice']);
            }
        }
    }

    public function delete_room_booking_request(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('room_booking_request')->where('id', '=', $request_id)->first();
        if ($res) {
            DB::table('room_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been Deleted Successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function cancel_room_booking_request_status(Request $request)
    {
        $request_id = $request->id;
        $check = DB::table('room_booking_request')->where('id', '=', $request_id)->first();
        if ($check->request_status == 1) {
            DB::table('room_booking_request')
                ->where('id', $request_id)
                ->update([
                    'request_status' => 0,
                    'approve_status' => 0,
                ]);
            $user_details = DB::table('users')->where('id', $check->user_id)->first(); 
            $data = array('user_id'=>$user_details->id, 'name'=>"User",'first_name'=>$user_details->first_name ,'last_name'=>$user_details->last_name);
            if ($_SERVER['SERVER_NAME'] != 'localhost') {
                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = $user_details->email;
                Mail::send('emails.booking_request_rejected_template', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'RoadNStays');
                    $message->to($inData['email']);
                    $message->subject('RoadNStays - Booking Request has been Rejected!');
                });
            } 
            return response()->json(['status' => 'success', 'msg' => 'Request cancel successfully']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'You already cancel Request']);
        }
    }

    // public function getRoomInvoiceDetails($request_id = 0)
    // {
    //     // $details = DB::table('room_booking_request')->find($request_id);
    //     $details = DB::table('room_booking_request')
    //         ->join('users', 'room_booking_request.user_id', '=', 'users.id')
    //         ->join('hotels', 'room_booking_request.hotel_id', '=', 'hotels.hotel_id')
    //         ->join('room_list', 'room_booking_request.room_id', '=', 'room_list.id')
    //         ->select(
    //             'room_booking_request.*',
    //             'users.user_type',
    //             'users.first_name as user_first_name',
    //             'users.last_name as user_last_name',
    //             'users.email as user_email',
    //             'users.contact_number as user_contact_num',
    //             'users.role_id as user_role_id',
    //             'users.is_verify_email as user_email_is_verify_email',
    //             'users.is_verify_contact as user_contact_is_verify_contact',
    //             'hotels.hotel_name',
    //             'hotels.hotel_user_id',
    //             'hotels.is_admin as hotel_added_is_admin',
    //             'hotels.property_contact_name',
    //             'hotels.property_contact_num',
    //             'hotels.hotel_address',
    //             'hotels.hotel_city',
    //             'hotels.stay_price as hotelroom_min_stay_price',
    //             'hotels.checkin_time',
    //             'hotels.checkout_time',
    //             'hotels.booking_option',
    //             'room_list.name as room_name',
    //             'room_list.price_per_night',
    //             'room_list.earlybird_discount as eb_discount'
    //         )
    //         ->where('room_booking_request.id', $request_id)
    //         ->first();
    //     // echo "<pre>";print_r($details);die;
    //     $html = "";
    //     if (!empty($details)) {
    //         $html = "<tr>
    //                 <td width='30%'><b>Room Name:</b></td>
    //                 <td width='70%'> " . $details->room_name . "</td>
    //              </tr>
    //              <tr>
    //                 <td width='30%'><b>Hotel Name:</b></td>
    //                 <td width='70%'> " . $details->hotel_name . "</td>
    //              </tr>
    //              <tr>
    //                 <td width='30%'><b>Period:</b></td>
    //                 <td width='70%'> " . $details->check_in_date . " to " . $details->check_out_date . "</td>
    //              </tr>
    //              <tr>
    //                 <td width='30%'><b>Price:</b></td>
    //                 <td width='70%'>PKR " . $details->total_amount . "</td>
    //              </tr>
    //              <tr>
    //                 <td width='30%'><b>Email:</b></td>
    //                 <td width='70%'> " . $details->user_email . "</td>
    //              </tr>
    //              <tr>
    //                 <td width='30%'><b>Phone:</b></td>
    //                 <td width='70%'> " . $details->user_contact_num . "</td>
    //              </tr>
    //              <tr>
    //                 <td>
    //                     <table class='invoice-items' cellpadding='0' cellspacing='0'>
    //                         <tbody>
    //                             <tr>
    //                                 <td>Cost</td>
    //                                 <td class='alignright'>PKR " . $details->total_amount . "</td>
    //                             </tr>
    //                             <tr id='early_discount_tr' class=''>
    //                                 <td>Early Bird Discount($details->eb_discount %)</td>
    //                                 <td class='alignright'>PKR -<span id='early_discount_val'></span></td>
    //                             </tr>
    //                             <tr id='discount_tr' class='d-non'>
    //                                 <td>Discount</td>
    //                                 <td class='alignright'>PKR -<span id='discount_val'></span></td>
    //                             </tr>
    //                             <tr id='expense_tr' class='d-non'>
    //                                 <td id='expe_name'></td>
    //                                 <td class='alignright'>PKR <span id='expe_val'></span></td>
    //                             </tr>
    //                             <tr class='total'>
    //                                 <td class='alignright' width='80%'>Total</td>
    //                                 <td class='alignright'>PKR <span id='total_amt'>" . $details->total_amount . "</span></td>
    //                             </tr>
    //                         </tbody>
    //                     </table>
    //                 </td>
    //              </tr>";
    //     }
    //     $response['html'] = $html;
    //     $response['total_amount'] = $details->total_amount;
    //     $response['request_id'] = $details->id;

    //     return response()->json($response);
    // }

    // space approval booking end here


    // vendor as a user - my reservation


    public function request_booking_tour(Request $request)
    {
        // $u_id = Auth::user()->id;
        // $tour_id = $request->tour_id;
        // echo "<pre>";print_r($u_id);
        // echo "<pre>";print_r($tour_id);
        // echo "<pre>";print_r($request->all());die;
        $user_id = Auth::user()->id;
        $tour_id = $request->tour_id;
        $tour_price = $request->tour_price;
        $tour_start_date = $request->tour_start_date;
        $tour_end_date = $request->tour_end_date;

        $check = DB::table('tour_booking_request')->where('tour_id', '=', $tour_id)->where('user_id', '=', $user_id)->first();
        if ($check) {
            $deleteRequest = DB::table('tour_booking_request')->where('tour_id', '=', $tour_id)->where('user_id', '=', $user_id)->delete();
        }

        $requestData = DB::table('tour_booking_request')->insert(
            array(
                'tour_id' =>  $tour_id,
                'user_id' =>  $user_id,
                'request_status' =>  1,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        if ($requestData) 
        {
            $data = array('user_id'=>$user_id, 'name'=>"User",'first_name'=>Auth::user()->first_name ,'last_name'=>Auth::user()->last_name);
            if ($_SERVER['SERVER_NAME'] != 'localhost') {
                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = Auth::user()->email;
                Mail::send('emails.booking_request_template', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'RoadNStays');
                    $message->to($inData['email']);
                    $message->subject('RoadNStays - Booking Request has been Sent Successfully');
                });
            }
            return response()->json(['status' => 'success', 'msg' => 'Booking Request sent. Please wait for owner"s Confirmation!']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        }
    }

    public function cancel_request_booking_tour(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('tour_booking_request')->where('id', '=', $request_id)->first();
        if ($res) {
            DB::table('tour_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been canceled successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function request_booking_space(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $user_id = Auth::user()->id;
        $space_id = $request->space_id;
        // $checkin_date = Session::get('space_check_in_date');
        // $checkout_date = Session::get('space_check_out_date');
        $checkin_date = $request->check_in;
        $checkout_date = $request->check_out;
        $cleaning_fee = $request->cleaning_fee;
        $city_fee = $request->city_fee;
        $tax_percentage = $request->tax_percentage;
        $total_days = $request->total_days;
        // $total_room = $request->total_room;
        // $total_member = $request->total_member;
        $total_amount = $request->space_price;
        // echo "<pre>";print_r($checkin_date);
        // echo "<pre>";print_r($checkout_date);die;

        $check = DB::table('space_booking_request')->where('space_id', '=', $space_id)->where('user_id', '=', $user_id)->first();
        if ($check) {
            $deleteRequest = DB::table('space_booking_request')->where('space_id', '=', $space_id)->where('user_id', '=', $user_id)->delete();
        }

        $requestData = DB::table('space_booking_request')->insert(
            array(
                'space_id' =>  $space_id,
                'user_id' =>  $user_id,
                'check_in_date' =>  date('Y-m-d', strtotime($checkin_date)),
                'check_out_date' =>  date('Y-m-d', strtotime($checkout_date)),
                'cleaning_fee' =>  $cleaning_fee,
                'city_fee' =>  $city_fee,
                'tax_percentage' =>  $tax_percentage,
                'total_days' =>  $total_days,
                // 'total_room' =>  $total_room,
                // 'total_member' =>  $total_member,
                'total_amount' =>  $total_amount,
                'request_status' =>  1,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        if ($requestData) 
        {
            $data = array('user_id'=>$user_id, 'name'=>"User",'first_name'=>Auth::user()->first_name ,'last_name'=>Auth::user()->last_name);
            if ($_SERVER['SERVER_NAME'] != 'localhost') {
                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = Auth::user()->email;
                Mail::send('emails.booking_request_template', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'RoadNStays');
                    $message->to($inData['email']);
                    $message->subject('RoadNStays - Booking Request has been Sent Successfully');
                });
            }
            return response()->json(['status' => 'success', 'msg' => 'Booking Request sent. Please wait for owner"s Confirmation!']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        }
    }

    public function cancel_request_booking_space(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('space_booking_request')->where('id', '=', $request_id)->first();
        if ($res) {
            DB::table('space_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been canceled successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function request_booking_room(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $user_id = Auth::user()->id;
        $room_id = $request->room_id;
        $hotel_id = $request->hotel_id;
        // $checkin_date = Session::get('checkin_date');
        // $checkout_date = Session::get('checkout_date');
        // $person = Session::get('person');
        $person = $request->total_member;
        $checkin_date = $request->check_in;
        $checkout_date = $request->check_out;
        $cleaning_fee = $request->cleaning_fee;
        $city_fee = $request->city_fee;
        $tax_percentage = $request->tax_percentage;
        $total_days = $request->total_days;
        $total_room = $request->total_room;
        $total_amount = $request->total_amount;

        $check = DB::table('room_booking_request')->where('room_id', '=', $room_id)->where('user_id', '=', $user_id)->first();
        if ($check) {
            $deleteRequest = DB::table('room_booking_request')->where('room_id', '=', $room_id)->where('user_id', '=', $user_id)->delete();
        }

        $requestData = DB::table('room_booking_request')->insert(
            array(
                'room_id' =>  $room_id,
                'hotel_id' =>  $hotel_id,
                'user_id' =>  $user_id,
                'check_in_date' =>  date('Y-m-d', strtotime($checkin_date)),
                'check_out_date' =>  date('Y-m-d', strtotime($checkout_date)),
                'cleaning_fee' =>  $cleaning_fee,
                'city_fee' =>  $city_fee,
                'tax_percentage' =>  $tax_percentage,
                'total_days' =>  $total_days,
                'total_room' =>  $total_room,
                'total_member' =>  $person,
                'total_amount' =>  $total_amount,
                'request_status' =>  1,
                'created_at' =>  date('Y-m-d H:i:s')
            )
        );
        if ($requestData) 
        {
            $data = array('user_id'=>$user_id, 'name'=>"User",'first_name'=>Auth::user()->first_name ,'last_name'=>Auth::user()->last_name);
            if ($_SERVER['SERVER_NAME'] != 'localhost') {
                $fromEmail = Helper::getFromEmail();
                $inData['from_email'] = $fromEmail;
                $inData['email'] = Auth::user()->email;
                Mail::send('emails.booking_request_template', $data, function ($message) use ($inData) {
                    $message->from($inData['from_email'], 'RoadNStays');
                    $message->to($inData['email']);
                    $message->subject('RoadNStays - Booking Request has been Sent Successfully');
                });
            }
            return response()->json(['status' => 'success', 'msg' => 'Booking Request sent. Please wait for owner"s Confirmation!']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Something get wrong.']);
        }
    }

    public function cancel_request_booking_room(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('room_booking_request')->where('id', '=', $request_id)->first();
        if ($res) {
            DB::table('room_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been canceled successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }
}
