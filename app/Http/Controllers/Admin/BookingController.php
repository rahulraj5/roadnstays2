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
                                ->orderby('id', 'DESC')
                                ->get();
        // if($data['bookingList'][0]->refund_status == 'confirmed'){
        //     echo "confirmed";
        // }else{
        //     echo "error";
        // }
        // echo "<pre>";print_r($data['bookingList'][0]->refund_status);die;
        return view('admin/booking/booking_list')->with($data);
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
        // echo "<pre>";print_r($property_owner_id);die;
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

        // echo "<pre>";print_r($data['admin_details']);die;

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
                        //echo "<pre>"; print_r($data);die;
        return view('admin/booking/view_transaction_history')->with($data);
        
    }

}
