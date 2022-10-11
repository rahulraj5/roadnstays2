<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\Tour;
use DB;
use Session;
use App\Helpers\Helper;

class TourController extends Controller
{
    // public function tour_list()
    // {
    //     // dd(Auth::user()->id);
    //     $data['tourList'] = DB::table('tours')->orderby('created_at', 'DESC')->get();
    //     return view('admin/tour/tour_list')->with($data);
    // }

    public function tour_list()
    {
        $data['page_heading_name'] = 'Tour List';
        $vendor_id = Auth::id();
        $data['tourList'] = DB::table('tour_list')->where('vendor_id', $vendor_id)->orderby('created_at', 'DESC')->get();
        //print_r($data);die;
        return view('vendor/tour/tour_list')->with($data);
    }

    public function add_tour(Request $request)
    {
        $data['page_heading_name'] = 'Add Tour';
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();

        return view('vendor/tour/add_tour')->with($data);
    }


    public function submit_tour(Request $request)
    {
        $vendor_id = Auth::user()->id;
        if ($request->hasFile('tourFeaturedImg')) {
            $image_name1 = $request->file('tourFeaturedImg')->getClientOriginalName();
            $filename1 = pathinfo($image_name1, PATHINFO_FILENAME);
            $image_ext1 = $request->file('tourFeaturedImg')->getClientOriginalExtension();
            $tourFeaturedImg = $filename1 . '-' . 'tourMainImg' . '-' . time() . '.' . $image_ext1;
            $path1 = base_path() . '/public/uploads/tour_gallery';
            $request->file('tourFeaturedImg')->move($path1, $tourFeaturedImg);
        } else {
            $tourFeaturedImg = '';
        }
        if ($request->hasFile('tour_document')) {
            $image_nam2 = $request->file('tour_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('tour_document')->getClientOriginalExtension();
            $tour_document = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/tour_document';
            $request->file('tour_document')->move($pat2, $tour_document);
        } else {
            $tour_document = '';
        }

        $admintour = new Tour;
        $admintour->vendor_id = $vendor_id;
        $admintour->tour_title = $request->tour_title;
        $admintour->tour_status = $request->tour_status;
        $admintour->tour_description = $request->tour_description;
        $admintour->city = $request->city;
        $admintour->address = $request->address;
        $admintour->latitude = $request->latitude;
        $admintour->longitude = $request->longitude;
        $admintour->neighb_area = $request->neighb_area;
        $admintour->country_id = $request->country_id;
        $admintour->tour_start_date = date('Y-m-d', strtotime($request->start_date));
        $admintour->tour_end_date = date('Y-m-d', strtotime($request->end_date));
        $admintour->tour_feature_image = $tourFeaturedImg;
        $admintour->tour_type = $request->tour_type;
        $admintour->tour_sub_type = $request->tour_sub_type;
        $admintour->tour_days = $request->tour_days;
        $admintour->tour_price = $request->tour_price;
        $admintour->tour_price_others = $request->tour_price_others;
        $admintour->tour_discount = $request->tour_discount;
        $admintour->children_policy = $request->children_policy;
        $admintour->tour_min_capacity = $request->min;
        $admintour->tour_max_capacity = $request->max;
        $admintour->scout_id = $request->scout_id;
        $admintour->tour_policy = $request->tour_policy;
        $admintour->payment_mode = $request->payment_mode;
        $admintour->cancellation_and_refund = $request->cancellation_and_refund;
        $admintour->booking_option = $request->booking_option;
        $admintour->tour_locations = $request->tour_locations;
        $admintour->tour_activities = $request->tour_activities;
        $admintour->tour_services_includes = $request->tour_services_includes;
        $admintour->tour_services_not_includes = $request->tour_services_not_includes;

        $admintour->operator_name = $request->operator_name;
        $admintour->operator_contact_name = $request->operator_contact_name;
        $admintour->operator_contact_num = $request->operator_contact_num;
        $admintour->operator_email = $request->operator_email;
        $admintour->operator_booking_num = $request->operator_booking_num;

        $admintour->status = 1;
        $admintour->save();
        $admintour_id = $admintour->id;

        if (!empty($_FILES["tourGallery"]["name"])) {
            foreach ($_FILES["tourGallery"]["name"] as $key => $error) {
                $imgname = $_FILES["tourGallery"]["name"][$key];
                $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
                $name = $_FILES["tourGallery"]["name"];
                move_uploaded_file($_FILES["tourGallery"]["tmp_name"][$key], "public/uploads/tour_gallery/" . time() . '_' . $_FILES['tourGallery']['name'][$key]);

                $Img = array(
                    'image' => time() . '_' . $imgname,
                    'tour_id' => $admintour_id,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $up = DB::table('tour_gallery')->insert($Img);
            }
        }


        if (!empty($request->itinerary)) {
            foreach ($request->itinerary as $itinerary) {
                $trip_detail = json_encode($itinerary['services']);
                $trip_itinerary = array(
                    'tour_id' => $admintour_id,
                    'title' => $itinerary['name'],
                    'place_from' => $itinerary['place_from'],
                    'place_to' => $itinerary['place_to'],
                    'hotel' => $itinerary['hotel'],
                    'transport' => $itinerary['transport'],
                    'night_stay' => $itinerary['night_stay'],
                    'trip_detail' => $trip_detail,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $up = DB::table('tour_itinerary')->insert($trip_itinerary);
            }
        }
        return response()->json(['status' => 'success', 'msg' => 'Tour Added Successfully']);
    }

    public function change_tour_status(Request $request)
    {
        $tour_id = $request->id;

        if (!empty($tour_id)) {
            DB::table('tour_list')
                ->where('id', $tour_id)
                ->update([
                    'tour_status' => $request->status
                ]);
        }
        return response()->json(['success' => 'status change successfully.']);
    }

    public function delete_tour(Request $request)
    {
        $tour_id = $request->id;
        $res = DB::table('tour_list')->where('id', '=', $tour_id)->first();
        $getTourGallery = DB::table('tour_gallery')->where('tour_id', '=', $tour_id)->get();

        if ($res) {
            if (!empty($getTourGallery)) {
                foreach ($getTourGallery as $tourGallery) {
                    $filePath = public_path('uploads/tour_gallery/' . $tourGallery->image);
                    if (file_exists($filePath)) {
                        $oldImagePath = './public/uploads/tour_gallery/' . $tourGallery->image;
                        unlink($oldImagePath);
                    }
                }
            }
            DB::table('tour_gallery')->where('tour_id', '=', $tour_id)->delete();
            DB::table('tour_itinerary')->where('tour_id', '=', $tour_id)->delete();
            DB::table('tour_list')->where('id', '=', $tour_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function view_tour($id)
    {
        $tour_id = $id;
        $data['page_heading_name'] = 'View Tour';
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['tour_info'] = DB::table('tour_list')->where('id', $tour_id)->first();
        $data['tour_gallery'] = DB::table('tour_gallery')->where('tour_id', $tour_id)->get();
        $data['tour_itinerary'] = DB::table('tour_itinerary')->where('tour_id', $tour_id)->get();
        return view('vendor/tour/tour_view')->with($data);
    }

    public function edit_tour($id)
    {
        $tour_id = $id;
        $data['page_heading_name'] = 'Edit Tour';
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['tour_info'] = DB::table('tour_list')->where('id', $tour_id)->first();
        $data['tour_gallery'] = DB::table('tour_gallery')->where('tour_id', $tour_id)->get();
        $data['tour_itinerary'] = DB::table('tour_itinerary')->where('tour_id', $tour_id)->get();
        //echo "<pre>"; print_r($data);die;
        return view('vendor/tour/edit_tour')->with($data);
    }

    public function update_tour(Request $request)
    {

        $tour_id = $request->tour_id;
        $vendor_id = Auth::user()->id;

        if ($request->hasFile('tourFeaturedImg')) {
            $image_name1 = $request->file('tourFeaturedImg')->getClientOriginalName();
            $filename1 = pathinfo($image_name1, PATHINFO_FILENAME);
            $image_ext1 = $request->file('tourFeaturedImg')->getClientOriginalExtension();
            $tourFeaturedImg = $filename1 . '-' . 'tourMainImg' . '-' . time() . '.' . $image_ext1;
            $path1 = base_path() . '/public/uploads/tour_gallery';
            $request->file('tourFeaturedImg')->move($path1, $tourFeaturedImg);
        } else {
            $tourFeaturedImg = $request->old_tour_image;
        }

        if ($request->hasFile('tour_document')) {
            $image_nam2 = $request->file('tour_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('tour_document')->getClientOriginalExtension();
            $tour_document = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/tour_document';
            $request->file('tour_document')->move($pat2, $tour_document);
        } else {
            $tour_document = $request->old_tour_document;
        }

        if (!empty($tour_id)) {
            DB::table('tour_list')
                ->where('id', $tour_id)
                ->update([
                    'vendor_id' => $vendor_id,
                    'tour_status' => $request->tour_status,
                    'tour_title' => $request->tour_title,
                    'tour_description' => $request->tour_description,
                    'city' => $request->city,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'neighb_area' => $request->neighb_area,
                    'country_id' => $request->country_id,
                    'tour_start_date' => date('Y-m-d', strtotime($request->start_date)),
                    'tour_end_date' => date('Y-m-d', strtotime($request->end_date)),
                    'tour_feature_image' => $tourFeaturedImg,
                    'tour_type' => $request->tour_type,
                    'tour_sub_type' =>  $request->tour_sub_type,
                    'tour_days' =>  $request->tour_days,
                    'tour_price' => $request->tour_price,
                    'tour_price_others' => $request->tour_price_others,
                    'tour_discount' => $request->tour_discount,
                    'children_policy' => $request->children_policy,
                    'tour_min_capacity' => $request->min,
                    'tour_max_capacity' => $request->max,
                    'scout_id' => $request->scout_id,
                    'tour_policy' => $request->tour_policy,
                    'payment_mode' => $request->payment_mode,
                    'cancellation_and_refund' => $request->cancellation_and_refund,
                    'booking_option' => $request->booking_option,
                    'tour_locations' => $request->tour_locations,
                    'tour_activities' => $request->tour_activities,
                    'tour_services_includes' => $request->tour_services_includes,
                    'tour_services_not_includes' => $request->tour_services_not_includes,

                    'operator_name' => $request->operator_name,
                    'operator_contact_name' => $request->operator_contact_name,
                    'operator_contact_num' => $request->operator_contact_num,
                    'operator_email' => $request->operator_email,
                    'operator_booking_num' => $request->operator_booking_num,
                    'status' => 1,
                ]);

            if (!empty($_FILES["tourGallery"]["name"])) {
                foreach ($_FILES["tourGallery"]["name"] as $key => $error) {
                    $imgname = $_FILES["tourGallery"]["name"][$key];
                    $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
                    $name = $_FILES["tourGallery"]["name"];
                    move_uploaded_file($_FILES["tourGallery"]["tmp_name"][$key], "public/uploads/tour_gallery/" . time() . '_' . $_FILES['tourGallery']['name'][$key]);

                    $Img = array(
                        'image' => time() . '_' . $imgname,
                        'tour_id' => $tour_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('tour_gallery')->insert($Img);
                }
            }

            DB::table('tour_itinerary')->where('tour_id', '=', $tour_id)->delete();
            if (!empty($request->itinerary)) {
                foreach ($request->itinerary as $itinerary) {
                    $trip_detail = json_encode($itinerary['services']);
                    $trip_itinerary = array(
                        'tour_id' => $tour_id,
                        'title' => $itinerary['name'],
                        'place_from' => $itinerary['place_from'],
                        'place_to' => $itinerary['place_to'],
                        'hotel' => $itinerary['hotel'],
                        'transport' => $itinerary['transport'],
                        'night_stay' => $itinerary['night_stay'],
                        'trip_detail' => $trip_detail,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('tour_itinerary')->insert($trip_itinerary);
                }
            }

            return response()->json(['status' => 'success', 'msg' => 'Tour Updated Successfully']);
        }
    }

    public function delete_tour_single_image(Request $request)
    {
        $imageId = $request->id;
        // $hotelID = $request->hotel_id;
        $image_data = DB::table('tour_gallery')->where('id', $imageId)->first();
        if ($image_data) {
            $filePath = public_path('uploads/tour_gallery/' . $image_data->image);
            if (file_exists($filePath)) {
                $Path = './public/uploads/tour_gallery/' . $image_data->image;
                unlink($Path);
            }
            $image_delete = DB::table('tour_gallery')->where('id', '=', $imageId)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }
    
    public function tour_approve_booking_list(Request $request)
    {
        $data['page_heading_name'] = 'Tour Approve Booking List';
        $vendor_id = Auth::id();
        $data['bookingList'] = DB::table('tour_booking_request')
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
            ->where('vendor_id', $vendor_id)
            ->orderby('id', 'DESC')
            ->get();
        $data['invoiceNum'] = DB::table('tour_booking_request')->where('approve_status', 1)->get(['id','invoice_num']);
        // echo "<pre>"; print_r($data['invoiceNum']);die;
        // echo "<pre>"; print_r($data['bookingList']);die;
        return view('vendor/tour/approve_booking_list')->with($data);
    }

    public function getInvoiceDetails($request_id = 0)
    {
        // $details = DB::table('tour_booking_request')->find($request_id);
        $details = DB::table('tour_booking_request')
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
            ->where('tour_booking_request.id', $request_id)
            ->first();
        // echo "<pre>";print_r($details);die;
        $html = "";
        if(!empty($details)){
           $html = "<tr>
                <td width='30%'><b>Tour Name:</b></td>
                <td width='70%'> ".$details->tour_title."</td>
             </tr>
             <tr>
                <td width='30%'><b>Period:</b></td>
                <td width='70%'> ".$details->tour_start_date." to ".$details->tour_end_date."</td>
             </tr>
             <tr>
                <td width='30%'><b>Price:</b></td>
                <td width='70%'>PKR ".$details->tour_price."</td>
             </tr>
             <tr>
                <td width='30%'><b>Tour Days:</b></td>
                <td width='70%'> ".$details->tour_days."</td>
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
                                <td class='alignright'>PKR ".$details->tour_price."</td>
                            </tr>
                            <tr class='total'>
                                <td class='alignright' width='80%'>Total</td>
                                <td class='alignright'>PKR ".$details->tour_price."</td>
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

    public function send_invoice(Request $request)
    {
        $request_id = $request->request_id;

        if (!empty($request_id)) {
            $check = DB::table('tour_booking_request')->where('id', $request_id)->first();
            if($check->approve_status == 0){
                $invoiceNum = Helper::generateRandomInvoiceId(5);
                DB::table('tour_booking_request')
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

    public function delete_booking_request(Request $request)
    {
        $request_id = $request->id;
        $res = DB::table('tour_booking_request')->where('id', '=', $request_id)->first();
        if ($res){
            DB::table('tour_booking_request')->where('id', '=', $request_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Request has been Deleted Successfully!'));
        }else{
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function cancel_tour_booking_request_status(Request $request)
    {
        $request_id = $request->id;
        $check = DB::table('tour_booking_request')->where('id', '=', $request_id)->first();
        if($check->request_status == 1){
            DB::table('tour_booking_request')
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

    public function tourbooking_list(Request $request)
    {
        $data['page_heading_name'] = 'Tour Booking List';
        $vendor_id = Auth::id();
        $data['bookingList'] = DB::table('tour_booking')
            ->join('users', 'tour_booking.user_id', '=', 'users.id')
            ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
            ->select(
                'tour_booking.*',
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
            ->where('vendor_id', $vendor_id)
            ->orderby('id', 'DESC')
            ->get();
        //echo "<pre>"; print_r($data);die;
        return view('vendor/tour/booking_list')->with($data);
    }

    public function view_booking($id)
    {
        $vendor_id = Auth::id();
        // echo "<pre>"; print_r($vendor_id);
        $booking_id = base64_decode($id);
        // echo "<pre>"; print_r($booking_id);die; 
        $data['page_heading_name'] = 'View Tour Booking';
        $data['bookingList'] = DB::table('tour_booking')
            ->join('users', 'tour_booking.user_id', '=', 'users.id')
            ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'tour_booking.*',
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
                'tour_list.city'
            )
            ->where('tour_booking.id', $booking_id)
            ->first();

        // echo "<pre>"; print_r($data['bookingList']);die;
        $property_owner_id = $data['bookingList']->vendor_id;
        // echo "<pre>"; print_r($property_owner_id);die; 

        $data['vendor_details'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->select('users.*', 'country.name as vendor_country_name')
            ->where('users.id', $property_owner_id)->first();

        $data['order_details'] = DB::table('tour_booking')
            ->join('users', 'tour_booking.user_id', '=', 'users.id')
            ->join('tour_list', 'tour_booking.tour_id', '=', 'tour_list.id')
            ->join('country', 'users.user_country', '=', 'country.id')
            ->select(
                'tour_booking.*',
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
                'tour_list.city'
            )
            ->where('tour_booking.id', $booking_id)
            ->get();
        // echo "<pre>"; print_r($data);die; 
        return view('vendor/tour/booking_details')->with($data);
    }
}
