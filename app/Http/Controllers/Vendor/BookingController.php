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
}
