<?php

namespace App\Http\Controllers\Admin;

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

class TourController extends Controller
{
 
    public function tour_list()
    {
        // dd(Auth::user()->id);
        $data['tourList'] = DB::table('tour_list')->orderby('created_at', 'DESC')->get();
        return view('admin/tour/tour_list')->with($data);
    }

    public function add_tour(Request $request)
    {

        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
       
        return view('admin/tour/add_tour')->with($data);
    }


    public function submit_tour(Request $request)
    { 

        if($request->hasFile('tourFeaturedImg'))
        {
            $image_name1 = $request->file('tourFeaturedImg')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('tourFeaturedImg')->getClientOriginalExtension();
            $tourFeaturedImg = $filename1.'-'.'tourMainImg'.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/tour_gallery';
            $request->file('tourFeaturedImg')->move($path1,$tourFeaturedImg);
        }else{
            $tourFeaturedImg = '';
        } 
        if($request->hasFile('tour_document')) {
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
        $admintour->vendor_id = $request->vendor_id;
        $admintour->tour_title = $request->tour_title;
        $admintour->tour_status= $request->tour_status;
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
        $admintour->tour_price_others =$request->tour_price_others;
        $admintour->tour_discount = $request->tour_discount;
        $admintour->children_policy = $request->children_policy;
        $admintour->tour_min_capacity = $request->min;
        $admintour->tour_max_capacity = $request->max;
        $admintour->scout_id = $request->scout_id;
        $admintour->tour_policy = $request->tour_policy;
        $admintour->payment_mode = $request->payment_mode;
        $admintour->online_payment_percentage = $request->online_payment_percentage;
        $admintour->at_desk_payment_percentage = $request->at_desk_payment_percentage;
        $admintour->cancellation_and_refund = $request->cancellation_and_refund;
        $admintour->min_hrs = $request->min_hrs;
        $admintour->min_hrs_percentage = $request->min_hrs_percentage;
        $admintour->max_hrs = $request->max_hrs;
        $admintour->max_hrs_percentage = $request->max_hrs_percentage;
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
            if(!empty($getTourGallery))
            {
                foreach($getTourGallery as $tourGallery){
                    $filePath = public_path('uploads/tour_gallery/'. $tourGallery->image);
                    if(file_exists($filePath)){
                        $oldImagePath = './public/uploads/tour_gallery/' . $tourGallery->image;
                        unlink($oldImagePath);
                    }
                }
            }
            DB::table('tour_gallery')->where('tour_id', '=', $tour_id)->delete();
            DB::table('tour_itinerary')->where('tour_id', '=', $tour_id)->delete();
            DB::table('tour_list')->where('id', '=', $tour_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        }else{
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function view_tour($id)
    {
        $tour_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['tour_info'] = DB::table('tour_list')->where('id', $tour_id)->first();
        $data['tour_gallery'] = DB::table('tour_gallery')->where('tour_id', $tour_id)->get();
        $data['tour_itinerary'] = DB::table('tour_itinerary')->where('tour_id', $tour_id)->get();
        return view('admin/tour/tour_view')->with($data);
    }

    public function edit_tour($id)
    {
        $tour_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['tour_info'] = DB::table('tour_list')->where('id',$tour_id)->first();
        $data['tour_gallery'] = DB::table('tour_gallery')->where('tour_id',$tour_id)->get();
        $data['tour_itinerary'] = DB::table('tour_itinerary')->where('tour_id',$tour_id)->get();
        //echo "<pre>"; print_r($data);die;
        return view('admin/tour/edit_tour')->with($data); 
    }

    public function update_tour(Request $request)
    {   

        $tour_id = $request->tour_id;
        $user_id = Auth::user()->id;

        if($request->hasFile('tourFeaturedImg'))
        {
            $image_name1 = $request->file('tourFeaturedImg')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('tourFeaturedImg')->getClientOriginalExtension();
            $tourFeaturedImg = $filename1.'-'.'tourMainImg'.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/tour_gallery';
            $request->file('tourFeaturedImg')->move($path1,$tourFeaturedImg);
        }else{
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
                    'vendor_id'=> $request->vendor_id,
                    'tour_status' => $request->tour_status,
                    'tour_title'=> $request->tour_title,
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
                    'online_payment_percentage' => $request->online_payment_percentage,
                    'at_desk_payment_percentage' => $request->at_desk_payment_percentage,
                    'cancellation_and_refund' => $request->cancellation_and_refund,
                    'min_hrs' => $request->min_hrs,
                    'min_hrs_percentage' => $request->min_hrs_percentage,
                    'max_hrs' => $request->max_hrs,
                    'max_hrs_percentage' => $request->max_hrs_percentage,
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

            //print_r($request->itinerary);die;
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
            $filePath = public_path('uploads/tour_gallery/'. $image_data->image);
            if(file_exists($filePath)){
                $Path = './public/uploads/tour_gallery/' . $image_data->image;
                unlink($Path);
            }
            $image_delete = DB::table('tour_gallery')->where('id', '=', $imageId)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }
 
    public function tourbooking_list(Request $request)
    {
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
                                ->get();
                                //echo "<pre>"; print_r($data);die;
        return view('admin/tour/booking_list')->with($data);
    }

    public function view_booking($id)
    {

        $booking_id = $id;
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
        return view('admin/tour/booking_details')->with($data);
    }
}
