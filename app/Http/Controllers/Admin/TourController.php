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

    public function custom_tour_list(Request $request)
    {
        $data['tourList'] = DB::table('trip_with_us')->orderby('id', 'DESC')->get();

        //echo "<pre>"; print_r($data);die;
        return view('admin/tour/custom_tour_list')->with($data);
    }

     public function view_custom_tour($id)
    {
        $tour_id = $id;
        //$data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['tour_info'] = DB::table('trip_with_us')->where('id', $tour_id)->first();

        //print_r($data);die();
        return view('admin/tour/custom_tour_view')->with($data);
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
        $admintour->tour_child_price = $request->tour_child_price;
        $admintour->tour_deluxe_price = $request->tour_deluxe_price;
        $admintour->tour_gold_price = $request->tour_gold_price;
        $admintour->tour_price_others =$request->tour_price_others;
        $admintour->tour_discount = $request->tour_discount;
        $admintour->children_policy = $request->children_policy;
        $admintour->tour_min_capacity = $request->min;
        $admintour->tour_max_capacity = $request->max;
        $admintour->commission = $request->commission;
        $admintour->private_note = $request->private_note;
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

        $admintour->status = 0;
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

        if (!empty($request->locations)) {
            foreach ($request->locations as $locations) {
                $trip_city = array(
                    'tour_id' => $admintour_id,
                    'city' => $locations['city'],
                    'price' => $locations['price'],
                    'transport' => $locations['transport'],
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $up = DB::table('tour_pickup_locations')->insert($trip_city);
            }
        }

        return response()->json(['status' => 'success', 'msg' => 'Tour Added Successfully']);

    }    
    
    public function add_copy_tour(Request $request)
	{
        $tour_id = $request->tour_id;
        // echo "<pre>";print_r($tour_id);die;
        if (empty($tour_id)) {
            return json_encode(array('status' => 'error', 'msg' => 'Please Select Tour to Copy.'));
		} else {
            $get_tour_detail = DB::table('tour_list')->where('id', '=', $tour_id)->first();
            $get_tour_itinerary = DB::table('tour_itinerary')->where('tour_id', '=', $tour_id)->get();
            $get_tour_locations = DB::table('tour_pickup_locations')->where('tour_id', '=', $tour_id)->get();
            // echo "<pre>";print_r($get_tour_itinerary);
            // echo "<pre>";print_r($get_tour_detail);
            // die;
            $get_tour_gallery = DB::table('tour_gallery')->where('tour_id', '=', $get_tour_detail->id)->get();
            
            // if (count($get_tour_gallery) > 0) {
            //     foreach ($get_tour_gallery as $image) {
            //         echo "<pre>";print_r($image);
            //     }
            // }
            // echo "<pre>";print_r($get_tour_gallery);
            // die;

            if (!empty($get_tour_detail)) {
                // echo "<pre>";print_r($get_tour_detail);die;
                $getid = DB::table('tour_list')->insertGetId(array( 

                    'vendor_id' => $get_tour_detail->vendor_id,
                    'tour_title' => $get_tour_detail->tour_title." copy",
                    'tour_status' => $get_tour_detail->tour_status,
                    'tour_description' => $get_tour_detail->tour_description,
                    'city' => $get_tour_detail->city,
                    'address' => $get_tour_detail->address,
                    'latitude' => $get_tour_detail->latitude,
                    'longitude' => $get_tour_detail->longitude,
                    'neighb_area' => $get_tour_detail->neighb_area,
                    'country_id' => $get_tour_detail->country_id,
                    'tour_start_date' => date('Y-m-d', strtotime($get_tour_detail->tour_start_date)),
                    'tour_end_date' => date('Y-m-d', strtotime($get_tour_detail->tour_end_date)),
                    'tour_feature_image' => $get_tour_detail->tour_feature_image,
                    'tour_type' => $get_tour_detail->tour_type,
                    'tour_sub_type' => $get_tour_detail->tour_sub_type,
                    'tour_days' => $get_tour_detail->tour_days,
                    'tour_price' => $get_tour_detail->tour_price,
                    'tour_child_price' => $get_tour_detail->tour_child_price,
                    'tour_deluxe_price' => $get_tour_detail->tour_deluxe_price,
                    'tour_gold_price' => $get_tour_detail->tour_gold_price,
                    'tour_price_others' => $get_tour_detail->tour_price_others,
                    'tour_discount' => $get_tour_detail->tour_discount,
                    'children_policy' => $get_tour_detail->children_policy,
                    'tour_min_capacity' => $get_tour_detail->tour_min_capacity,
                    'tour_max_capacity' => $get_tour_detail->tour_max_capacity,
                    'commission' => $get_tour_detail->commission,
                    'private_note' => $get_tour_detail->private_note,
                    'scout_id' => $get_tour_detail->scout_id,
                    'tour_policy' => $get_tour_detail->tour_policy,
                    'payment_mode' => $get_tour_detail->payment_mode,
                    'online_payment_percentage' => $get_tour_detail->online_payment_percentage,
                    'at_desk_payment_percentage' => $get_tour_detail->at_desk_payment_percentage,
                    'cancellation_and_refund' => $get_tour_detail->cancellation_and_refund,
                    'min_hrs' => $get_tour_detail->min_hrs,
                    'min_hrs_percentage' => $get_tour_detail->min_hrs_percentage,
                    'max_hrs' => $get_tour_detail->max_hrs,
                    'max_hrs_percentage' => $get_tour_detail->max_hrs_percentage,
                    'booking_option' => $get_tour_detail->booking_option,
                    'tour_locations' => $get_tour_detail->tour_locations,
                    'tour_activities' => $get_tour_detail->tour_activities,
                    'tour_services_includes' => $get_tour_detail->tour_services_includes,
                    'tour_services_not_includes' => $get_tour_detail->tour_services_not_includes,
                    'operator_name' => $get_tour_detail->operator_name,
                    'operator_contact_name' => $get_tour_detail->operator_contact_name,
                    'operator_contact_num' => $get_tour_detail->operator_contact_num,
                    'operator_email' => $get_tour_detail->operator_email,
                    'operator_booking_num' => $get_tour_detail->operator_booking_num,

                    'copy_status' => 0,
                    // 'tour_user_id' => 1,
                    // 'is_admin' => 1,
                    'status' => 0,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ));

                // echo "<pre>";print_r($getid);die;
                if (count($get_tour_itinerary) > 0) {
                // if (!empty($get_tour_itinerary->itinerary)) {
                    // foreach ($get_tour_itinerary->itinerary as $itinerary) {
                    foreach ($get_tour_itinerary as $itinerary) {
                        // $trip_detail = json_encode($itinerary['services']);
                        $trip_itinerary = array(
                            'tour_id' => $getid,
                            'title' => $itinerary->title,
                            'place_from' => $itinerary->place_from,
                            'place_to' => $itinerary->place_to,
                            'hotel' => $itinerary->hotel,
                            'transport' => $itinerary->transport,
                            'night_stay' => $itinerary->night_stay,
                            'trip_detail' => $itinerary->trip_detail,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        // echo "<pre>";print_r($trip_itinerary);die;
                        $up = DB::table('tour_itinerary')->insert($trip_itinerary);
                    }
                }

                if (count($get_tour_locations) > 0) {
                // if (!empty($get_tour_locations->locations)) {
                    // foreach ($get_tour_locations->locations as $locations) {
                    foreach ($get_tour_locations as $locations) {
                        $trip_city = array(
                            'tour_id' => $getid,
                            'city' => $locations->city,
                            'price' => $locations->price,
                            'transport' => $locations->transport,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $up = DB::table('tour_pickup_locations')->insert($trip_city);
                    }
                }

                if (count($get_tour_gallery) > 0) {
                    foreach ($get_tour_gallery as $image) {
                        $Img = array(
                            'image' => $image->image,
                            'tour_id' => $getid,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $up = DB::table('tour_gallery')->insert($Img);
                    }
                }

                if ($getid) {
                    return json_encode(array('status' => 'success', 'msg' => 'Tour Copied Sucessfully !', 'new_tour_id' => $getid));
                }

            } else {
                return json_encode(array('status' => 'error', 'msg' => 'Something get wrong.'));
            }
        }
	}  

    public function change_tour_status(Request $request)
    {
        $tour_id = $request->id;

        if (!empty($tour_id)) {
            DB::table('tour_list')
                ->where('id', $tour_id)
                ->update([
                    'status' => $request->status
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
            DB::table('tour_booking')->where('id', '=', $tour_id)->delete();
            DB::table('tour_booking_request')->where('id', '=', $tour_id)->delete();
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
        $data['tour_pickup_locations'] = DB::table('tour_pickup_locations')->where('tour_id',$tour_id)->get();
        return view('admin/tour/tour_view')->with($data);
    }

    public function edit_tour($id)
    {
        $tour_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['tour_info'] = DB::table('tour_list')->where('id',$tour_id)->first();
        $data['tour_gallery'] = DB::table('tour_gallery')->where('tour_id',$tour_id)->get();
        $data['tour_itinerary'] = DB::table('tour_itinerary')->where('tour_id',$tour_id)->get();
        $data['tour_pickup_locations'] = DB::table('tour_pickup_locations')->where('tour_id',$tour_id)->get();
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
                    'tour_child_price' => $request->tour_child_price,
                    'tour_deluxe_price' => $request->tour_deluxe_price,
                    'tour_gold_price' => $request->tour_gold_price,
                    'tour_price_others' => $request->tour_price_others,
                    'tour_discount' => $request->tour_discount,
                    'children_policy' => $request->children_policy,
                    'tour_min_capacity' => $request->min,
                    'tour_max_capacity' => $request->max,
                    'commission' => $request->commission,
                    'private_note' => $request->private_note,
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
            DB::table('tour_pickup_locations')->where('tour_id', '=', $tour_id)->delete();
            if (!empty($request->locations)) {
                foreach ($request->locations as $locations) {
                    $trip_city = array(
                        'tour_id' => $tour_id,
                        'city' => $locations['city'],
                        'price' => $locations['price'],
                        'transport' => $locations['transport'],
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('tour_pickup_locations')->insert($trip_city);
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
                                    'tour_list.city',
                                    'tour_list.booking_option')
                                ->orderby('id', 'DESC')
                                ->get();
                                //echo "<pre>"; print_r($data);die;
        return view('admin/tour/booking_list')->with($data);
    }
    
    public function view_tour_wise_booking_list($id)
    {
        $tour_id = $id;
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
                                    'tour_list.city',
                                    'tour_list.booking_option')
                                ->where('tour_booking.tour_id', $tour_id)
                                ->orderby('id', 'DESC')
                                ->get();
        // echo "<pre>"; print_r($data);die;
        return view('admin/tour/tour_wise_booking_list')->with($data);
    }

    public function tour_approval_booking_list(Request $request)
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
            //->where('vendor_id', $vendor_id)
            ->orderby('id', 'DESC')
            ->get();
        $data['invoiceNum'] = DB::table('tour_booking_request')->where('approve_status', 1)->get(['id','invoice_num']);
        // echo "<pre>"; print_r($data['invoiceNum']);die;
        // echo "<pre>"; print_r($data['bookingList']);die;
        return view('admin/tour/approve_booking_list')->with($data);
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
                                <td class='alignright'>PKR <span id='total_amt'>".$details->tour_price."</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
             </tr>";
        }
        $response['html'] = $html;
        $response['total_amount'] = $details->tour_price;
        $response['request_id'] = $details->id;
  
        return response()->json($response);
    }

    public function send_invoice(Request $request)
    {
        $request_id = $request->request_id;
        $disco_name = $request->disco_name;
        $disco_val = $request->disco_val;
        $exp_name = $request->exp_name;
        $exp_value = $request->exp_value;

        if (!empty($request_id)) {
            $check = DB::table('tour_booking_request')->where('id', $request_id)->first();
            // echo "<pre>";print_r($check);die;
            if($check->approve_status == 0){
                $invoiceNum = Helper::generateRandomInvoiceId(5);
                DB::table('tour_booking_request')
                    ->where('id', $request_id)
                    ->update([
                        'approve_status' => 1,
                        'invoice_num' => $invoiceNum,
                        'discount_name' => $disco_name,
                        'discount' => $disco_val,
                        'expense_name' => $exp_name,
                        'expense_value' => $exp_value,
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
        }else{
            return response()->json(['status' => 'error', 'msg' => 'You already cancel Request']);
        }
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
