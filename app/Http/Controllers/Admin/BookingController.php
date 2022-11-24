<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use DB;
use Session;

class BookingController extends Controller
{
    // public function booking_list()
    // {
    //     $data['bookingList'] = DB::table('booking')
    //                             ->join('users', 'booking.user_id', '=', 'users.id')
    //                             ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //                             ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //                             // ->orderby('created_at', 'DESC')
    //                             ->get();
    //     echo "<pre>";print_r($data['bookingList'][0]);die;
    //     return view('admin/booking/booking_list')->with($data);
    // }
    
    public function booking_list()
    {
        $data['bookingList'] = DB::table('booking')
                                ->join('users', 'booking.user_id', '=', 'users.id')
                                ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
                                ->join('room_list', 'booking.room_id', '=', 'room_list.id')
                                ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
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
                                    'room_list.name as room_name',
                                    'room_list.room_types_id',
                                    'room_type_categories.title')
                                ->orderby('id', 'DESC')
                                ->get();
        // if($data['bookingList'][0]->refund_status == 'confirmed'){
        //     echo "confirmed";
        // }else{
        //     echo "error";
        // }
        // echo "<pre>";print_r($data['bookingList'][0]->refund_status);die;
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('admin/booking/booking_list')->with($data);
    }

    public function view_room_wise_booking_list($id)
    {
        $room_id = $id;
        $data['bookingList'] = DB::table('booking')
                            ->join('users', 'booking.user_id', '=', 'users.id')
                            ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
                            ->join('room_list', 'booking.room_id', '=', 'room_list.id')
                            ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
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
                                'room_list.name as room_name',
                                'room_list.room_types_id',
                                'room_type_categories.title')
                            ->orderby('id', 'DESC')
                            ->where('booking.room_id', $room_id)
                            ->get();
        // $room_bookings = DB::table('booking')->where('room_id', $room_id)->get();
        // echo "<pre>";print_r($data['bookingList']);die;
        return view('admin/booking/room_wise_booking_list')->with($data);
    }

    
    public function change_booking_status(Request $request)
    {
        if($request->status=='processing'){
            $booking_info = DB::table('booking')
            ->where('id', $request->booking_id)
            ->update([
                'refund_status' => $request->status,
                'refund_processed_at' => date('Y-m-d H:i:s')
            ]);
        }
        if($request->status=='confirmed'){
            $booking_info = DB::table('booking')
            ->where('id', $request->booking_id)
            ->update([
                'refund_status' => $request->status,
                'refund_credited_at' => date('Y-m-d H:i:s')
            ]);
        }
        
        return response()->json(['status' => 'success', 'msg' => 'Status has been changed']);

        // ->find($request->booking_id);
        // echo "<pre>";print_r($booking_info);die;
        // $date = $booking_info->created_at;
        // $booking_info->booking_status = $request->status;

        // $res = $booking_info->save();
        // if ($res) {
        //     $users = DB::table('users')->where('id','=',$order_info->user_id)->first(); 
        //     $username = $users->first_name." ".$users->last_name;
        //     $title ="Hey ". $username ." your order status is ". $request->status;
        //     //$device_token ="ftkpkxjW37Q:APA91bE_27LnEi3ziGsQpVbZnvh6MlNxovsEVVQSGPDMlnTYt47IiQP25JuSwC0AqiGeGwHa3LAFZ9mw8IKmRkMD1lzKRSeMEBPNCpvsIkKA4AcNAieLbQ-OFlXq74jiCUo2xfPy2fi8";
        //     $this->notification($users->device_token, $title, $request->order_id, $date);
        //     if ($_SERVER['SERVER_NAME'] != 'localhost') {
        //         $data['url'] = url('/');
        //         $data['status'] = $request->status;
        //         $data['first_name'] = $users->first_name;
        //         $data['last_name'] = $users->last_name;
        //         $data['status'] = $request->status;
        //         $data['order_id'] = $request->order_id;
        //         $fromEmail = Helper::getFromEmail();
        //         $inData['from_email'] = $fromEmail;
        //         $inData['email'] = $users->email;
        //         Mail::send('emails.invoice.order_status_template',$data, function ($message) use ($inData) {
        //             $message->from($inData['from_email'],'PIX2ARTS');
        //             $message->to($inData['email']);
        //             $message->subject('PIX2ARTS - Order Status Mail');
        //         });
        //     }
        //     return response()->json(['success'=>'Order status change successfully.']);
        // }   
    }

    public function change_offline_booking_status(Request $request)
    {
        if($request->status=='confirmed'){
            $booking_info = DB::table('booking')
            ->where('id', $request->booking_id)
            ->update([
                'booking_status' => $request->status,
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Status has been changed']);
    }

    public function change_tour_booking_status(Request $request)
    {
        if($request->status=='processing'){
            $booking_info = DB::table('tour_booking')
            ->where('id', $request->booking_id)
            ->update([
                'refund_status' => $request->status,
                'refund_processed_at' => date('Y-m-d H:i:s')
            ]);
        }
        if($request->status=='confirmed'){
            $booking_info = DB::table('tour_booking')
            ->where('id', $request->booking_id)
            ->update([
                'refund_status' => $request->status,
                'refund_credited_at' => date('Y-m-d H:i:s')
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Status has been changed']);
    }

    public function change_offline_tour_booking_status(Request $request)
    {
        if($request->status=='confirmed'){
            $booking_info = DB::table('tour_booking')
            ->where('id', $request->booking_id)
            ->update([
                'booking_status' => $request->status,
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Status has been changed']);
    }

    public function change_space_booking_status(Request $request)
    {
        if($request->status=='processing'){
            $booking_info = DB::table('space_booking')
            ->where('id', $request->booking_id)
            ->update([
                'refund_status' => $request->status,
                'refund_processed_at' => date('Y-m-d H:i:s')
            ]);
        }
        if($request->status=='confirmed'){
            $booking_info = DB::table('space_booking')
            ->where('id', $request->booking_id)
            ->update([
                'refund_status' => $request->status,
                'refund_credited_at' => date('Y-m-d H:i:s')
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Status has been changed']);
    }

    public function change_offline_space_booking_status(Request $request)
    {
        if($request->status=='confirmed'){
            $booking_info = DB::table('space_booking')
            ->where('id', $request->booking_id)
            ->update([
                'booking_status' => $request->status,
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Status has been changed']);
    }

    // public function booking_list()
    // {
    //     $data['bookingList'] = DB::table('booking')
    //                             ->join('users', 'booking.user_id', '=', 'users.id')
    //                             ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //                             ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //                             // ->orderby('created_at', 'DESC')
    //                             ->get();
    //     echo "<pre>";print_r($data['bookingList'][1]);die;
    //     return view('admin/booking/booking_list')->with($data);
    // }
    
    public function view_booking($id)
    {
        //print_r($id);die;
        $booking_id = $id;
        // $data['bookingList'] = DB::table('booking')
        // ->join('users', 'booking.user_id', '=', 'users.id')
        // ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
        // ->join('room_list', 'booking.room_id', '=', 'room_list.id')
        // ->join('country', 'users.user_country', '=', 'country.id')
        // ->where('booking.id',$booking_id)
        // ->first();

        // echo "<pre>";print_r($data);die;
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

                                //print_r($data['bookingList']);die;
        $property_role = $data['bookingList']->hotel_added_is_admin;
        $property_owner_id = $data['bookingList']->hotel_user_id;
        // echo "<pre>";print_r($property_role);
        // echo "<pre>";print_r($data['bookingList']);die;
        if($property_role == 1){
            if($property_owner_id == 1){
                $data['admin_details'] = DB::table('admins')->where('id', $property_owner_id)->first();
            }else{
                $data['vendor_details'] = DB::table('users')
                ->join('country', 'users.user_country', 'country.id')
                ->select('users.*','country.name as vendor_country_name')
                ->where('users.id', $property_owner_id)->first();
            }  
        }else{
            $data['vendor_details'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->select('users.*','country.name as vendor_country_name')
            ->where('users.id', $property_owner_id)->first();
        } 

        // echo "<pre>";print_r($data['vendor_details']);die;

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

        //echo "<pre>";print_r($data['bookingList']);die;
        // return view('admin/booking/booking_view')->with($data);
        return view('admin/booking/booking_details')->with($data);
    }

    
    // room approval booking start here    

    public function rooms_approval_booking_list(Request $request)
    {
        $data['page_heading_name'] = 'Room Approval Booking List';
        // $vendor_id = Auth::id();
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
            // ->where('hotel_user_id', $vendor_id)
            ->orderby('id', 'DESC')
            ->get();

        $data['invoiceNum'] = DB::table('room_booking_request')->where('approve_status', 1)->get(['id', 'invoice_num']);
        // echo "<pre>"; print_r($data['invoiceNum']);die;
        // echo "<pre>"; print_r($data['bookingList']);die;
        return view('admin/hotel/approve_booking_list')->with($data);
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
                $data = array('user_id'=>$user_details->id, 'name'=>"User",'first_name'=>$user_details->first_name ,'last_name'=>$user_details->last_name);
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

    // public function booking_details($id)
    // {
    //     $booking_id = $id;
    //     $data['bookingList'] = DB::table('booking')
    //                             ->join('users', 'booking.user_id', '=', 'users.id')
    //                             ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //                             ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //                             ->join('country', 'users.user_country', '=', 'country.id')
    //                             ->select('booking.*',
    //                                 'users.user_type',
    //                                 'users.first_name as user_first_name',
    //                                 'users.last_name as user_last_name',
    //                                 'users.email as user_email',
    //                                 'users.contact_number as user_contact_num',
    //                                 'users.role_id as user_role_id',
    //                                 'users.is_verify_email as user_email_is_verify_email',
    //                                 'users.is_verify_contact as user_contact_is_verify_contact',

    //                                 'users.address as user_address',
    //                                 'users.state_id as user_state',
    //                                 'users.user_city as user_city',
    //                                 'users.postal_code as user_postal_code',
    //                                 'country.nicename as user_country',

    //                                 'hotels.hotel_name',
    //                                 'hotels.hotel_user_id',
    //                                 'hotels.is_admin as hotel_added_is_admin',
    //                                 'hotels.property_contact_name',
    //                                 'hotels.property_contact_num',
    //                                 'hotels.hotel_address',
    //                                 'hotels.hotel_city',
    //                                 'hotels.stay_price as hotelroom_min_stay_price',
    //                                 'room_list.*')
    //                             // ->orderby('created_at', 'DESC')
    //                             ->where('booking.id',$booking_id)
    //                             ->first();

    //     $property_role = $data['bookingList']->hotel_added_is_admin;
    //     $property_owner_id = $data['bookingList']->hotel_user_id;
    //     // echo "<pre>";print_r($property_role);
    //     // echo "<pre>";print_r($property_owner_id);
    //     if($property_role == 1){
    //         if($property_owner_id == 1){
    //             $data['admin_details'] = DB::table('admins')->where('id', $property_owner_id)->first();
    //         }  
    //     }else{
    //         $data['vendor_details'] = DB::table('users')
    //         ->join('country', 'users.user_country', 'country.id')
    //         ->select('users.*','country.name as vendor_country_name')
    //         ->where('users.id', $property_owner_id)->first();
    //     } 

    //     $data['order_details'] = DB::table('booking')
    //                     ->join('users', 'booking.user_id', '=', 'users.id')
    //                     ->join('hotels', 'booking.hotel_id', '=', 'hotels.hotel_id')
    //                     ->join('room_list', 'booking.room_id', '=', 'room_list.id')
    //                     ->join('country', 'users.user_country', '=', 'country.id')
    //                     ->select('booking.*',
    //                         'users.user_type',
    //                         'users.first_name as user_first_name',
    //                         'users.last_name as user_last_name',
    //                         'users.email as user_email',
    //                         'users.contact_number as user_contact_num',
    //                         'users.role_id as user_role_id',
    //                         'users.is_verify_email as user_email_is_verify_email',
    //                         'users.is_verify_contact as user_contact_is_verify_contact',

    //                         'users.address as user_address',
    //                         'users.state_id as user_state',
    //                         'users.user_city as user_city',
    //                         'users.postal_code as user_postal_code',
    //                         'country.nicename as user_country',

    //                         'hotels.hotel_name',
    //                         'hotels.hotel_user_id',
    //                         'hotels.is_admin as hotel_added_is_admin',
    //                         'hotels.property_contact_name',
    //                         'hotels.property_contact_num',
    //                         'hotels.hotel_address',
    //                         'hotels.hotel_city',
    //                         'hotels.stay_price as hotelroom_min_stay_price',
    //                         'room_list.*')
    //                     // ->orderby('created_at', 'DESC')
    //                     ->where('booking.id',$booking_id)
    //                     ->get();

    //     // echo "<pre>";print_r($data['bookingList']);die;
    //     return view('admin/booking/booking_details')->with($data);
    // }


    public function transaction_history(Request $request)
    {
        $data['transaction_history'] = DB::table('payment_transaction')
                        ->join('users', 'payment_transaction.user_id', '=', 'users.id')
                        ->select('payment_transaction.*','users.first_name','users.last_name')
                        ->orderby('payment_transaction.id','DESC')
                        ->get();
        return view('admin/booking/transaction_history')->with($data);
    }

    public function view_transaction_history($id)
    {
        $transaction_id = $id;
        $data['transaction_history'] = DB::table('payment_transaction')
                        ->join('users', 'payment_transaction.user_id', '=', 'users.id')
                        ->select('payment_transaction.*','users.first_name','users.last_name')
                        ->orderby('payment_transaction.id','DESC')
                        ->where('payment_transaction.id',$transaction_id)
                        ->first();
                        // echo "<pre>"; print_r($data['transaction_history']);die;
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
        return view('admin/booking/view_transaction_history')->with($data);
        
    }

    public function global_time(Request $request)
    {
        $id = 1;
        $data['global_time'] = DB::table('global_time')->where('id',$id)->first();
        return view('admin/booking/edit_global_time')->with($data);
    }

    public function global_time_update(Request $request)
    {
        DB::table('global_time')
        ->where('id', 1)
        ->update([
            'hotel' => $request->hotel_global_time,
            'tour' => $request->tour_global_time,
            'space' => $request->space_global_time,
            'event' => $request->event_global_time,
        ]);
        return response()->json(['status' => 'success', 'msg' => 'Updated Successfully']);
    }
}
