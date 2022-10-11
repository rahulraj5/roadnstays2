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
use App\Models\Events;
use DB;
use Session;

class ScoutSpaceController extends Controller
{
	public function index(Request $request){
		// $data['space_list'] = DB::table('space')->orderby('id', 'DESC')->get();
		$scout_id = Auth::user()->id;
        $data['space_list'] = DB::table('space')
                                ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
                                ->join('space_sub_categories', 'space.sub_category_id', '=', 'space_sub_categories.sub_cat_id')
                                ->where('scout_id',$scout_id)
                                ->select('space.*',
                                        'space_categories.category_name',
                                        'space_sub_categories.sub_category_name')
                                ->orderby('space.space_id', 'DESC')
                                ->where('copy_status',1)
                                
                                ->get();
		return view('/scout/space_list')->with($data);
	}

	public function spaceView(Request $request){
		
		$data['page_heading_name'] = "View Space Details";
        $space_id = base64_decode($request->id);
        $data['space_data'] = DB::table('space')->where('space_id', '=', $space_id)->first();

        $data['space_categories'] = DB::table('space_categories')->orderby('created_at', 'ASC')->get();
        $data['space_sub_categories'] = DB::table('space_sub_categories')->where('status',1)->orderby('created_at', 'ASC')->get();
        $data['space_images'] = DB::table('space_gallery')->where('space_id', '=', $space_id)->get();
        $data['countries'] = DB::table('countries')->orderby('name', 'ASC')->get();
    
        $data['scouts'] = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get();
        $data['space_other_features'] = DB::table('space_features_list')->orderby('space_feature_id', 'ASC')->where('status',1)->get();
        $data['space_features'] = DB::table('space_features')->where('space_id', $space_id)->pluck('space_feature_id')->toArray();
        $data['space_extra_option'] = DB::table('space_extra_option')->where('space_id', $space_id)->where('status', 1)->get();
        $data['space_custom_details'] = DB::table('space_custom_details')->where('space_id', $space_id)->where('status', 1)->get();
		return view('/scout/space_view_list')->with($data);
	}

	public function change_space_status(Request $request)
    {
        // print_r($request->all());die;
       $space_id = $request->space_id;

        if(!empty($space_id)) { 
            // print_r($space_id);die;
            DB::table('space')
            ->where('space_id', $space_id)
            ->update([
                'status' => $request->status
            ]);
        }   
        return response()->json(['success' => 'status change successfully.']);
    }

	public function bookingList(){
		$scout_id = Auth::user()->id;
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
                                ->where('scout_id',$scout_id)
                                ->orderby('id', 'DESC')
                                ->get();
        
        return view('/scout/booking_list')->with($data);
	}

	public function view_booking($id)
    {
        
        $booking_id = base64_decode($id);
       
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

        return view('/scout/booking_details')->with($data);
    }

    public function tourbooking_list(Request $request)
    {
        $scout_id = Auth::user()->id;
        $data['bookingList'] = DB::table('tour_booking')
                                ->join('users', 'tour_booking.user_id', '=', 'users.id')
                                ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                                ->select('tour_booking.*',
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
                                    'tour_list.city')
                                ->orderby('id', 'DESC')
                                ->where('scout_id',$scout_id)
                                ->get();
                                //echo "<pre>"; print_r($data);die;
        return view('/scout/tourbooking_list')->with($data);
    }

     public function viewTourBooking($id)
    {

        $booking_id = base64_decode($id);
        $data['bookingList'] = DB::table('tour_booking')
                                ->join('users', 'tour_booking.user_id', '=', 'users.id')
                                ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                                ->join('country', 'users.user_country', '=', 'country.id')
                                ->select('tour_booking.*',
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
                                    'tour_list.tour_title',
                                    'tour_list.vendor_id',
                                    'tour_list.tour_start_date as tour_start_date',
                                    'tour_list.tour_end_date',
                                    'tour_list.tour_price',
                                    'tour_list.tour_days',
                                    'tour_list.city')
                                ->where('tour_booking.id',$booking_id)
                                ->first();

        $property_owner_id = $data['bookingList']->vendor_id;
    
        $data['vendor_details'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->select('users.*','country.name as vendor_country_name')
            ->where('users.id', $property_owner_id)->first();
 
        $data['order_details'] = DB::table('tour_booking')
                        ->join('users', 'tour_booking.user_id', '=', 'users.id')
                        ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
                        ->join('country', 'users.user_country', '=', 'country.id')
                        ->select('tour_booking.*',
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
                            'tour_list.tour_title',
                            'tour_list.vendor_id',
                            'tour_list.tour_start_date as tour_start_date',
                            'tour_list.tour_end_date',
                            'tour_list.tour_price',
                            'tour_list.tour_days',
                            'tour_list.city')
                        ->where('tour_booking.id',$booking_id)
                        ->get();
        return view('/scout/tourbooking_details')->with($data);
    }

    public function spacebooking_list(){
        $scout_id = Auth::user()->id;

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
                                    
                                    'space.city'
                                    
                                )
                                ->where('scout_id',$scout_id)
                                ->orderby('id', 'DESC')
                                ->get();

        return view("/scout/space_booking_list")->with($data);
    }

    public function viewSpaceBooking($id)
    {
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
        return view('/scout/space_booking_details')->with($data);
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

    public function events_list(Request $request)
    {
        $data['eventList'] = Events::where('status', 1)->orderby('created_at', 'DESC')->get();

        return view('/scout/event_list')->with($data);
    }
}	