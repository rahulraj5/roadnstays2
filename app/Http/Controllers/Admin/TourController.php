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
    // public function tour_list()
    // {
    //     // dd(Auth::user()->id);
    //     $data['tourList'] = DB::table('tours')->orderby('created_at', 'DESC')->get();
    //     return view('admin/tour/tour_list')->with($data);
    // }

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
        //print_r($request->all());

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

        $admintour->vendor_id = $request->vendor_id;
        $admintour->scout_id = $request->scout_id;
        $admintour->tour_code= $request->tour_code;
        $admintour->tour_start_day = $request->tour_start_day;
        $admintour->tour_start_date = date('Y-m-d', strtotime($request->start_date));
        $admintour->tour_end_date = date('Y-m-d', strtotime($request->end_date));
        $admintour->tour_feature_image = $tourFeaturedImg;
        $admintour->tour_package_name = $request->tour_package_name;
        $admintour->tour_title = $request->tour_title;
        $admintour->tour_type = $request->tour_type;
        $admintour->tour_price = $request->tour_price;
        $admintour->tour_days = $request->tour_days;
        $admintour->tour_duration =$request->tour_duration;
        $admintour->tour_price_others = $request->tour_price_others;
        $admintour->tour_locations = $request->tour_locations;
        $admintour->tour_services_includes = $request->tour_services_includes;
        $admintour->tour_services_not_includes = $request->tour_services_not_includes;
        $admintour->tour_payment_term = $request->tour_payment_term;
        $admintour->tour_description = $request->tour_description;
        $admintour->tour_term_condition = $request->tour_term_condition;
        $admintour->bank_name = $request->bank_name;
        $admintour->account_holder = $request->account_title;
        $admintour->account_number = $request->account_number;
        $admintour->branch_name = $request->branch_name;
        $admintour->tour_document = $request->tour_document;
        $admintour->easypaisa = $request->easypaisa;
        $admintour->jazz_cash = $request->jazz_cash;
        $admintour->booking_contact_no = $request->booking_contact;
        $admintour->tour_status = $request->tour_status;
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
        } else {
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

    public function room_type_categories()
    {
        $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
        return view('admin/hotel/room_type_categories')->with($data);
    }

    public function hotel_types()
    {
        $data['hotel_types'] = DB::table('hotel_types')->orderby('created_at', 'DESC')->get();
        return view('admin/hotel/hotel_types')->with($data);
    } 

    public function add_hotel(Request $request)
    {

        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['hotel_services'] = DB::table('H3_Services')->orderby('id', 'ASC')->where('status', 1)->get();

        return view('admin/hotel/add_hotel')->with($data);
    }

    // public function submit_hotel(Request $request)
    // {
    //     if ($request->hasFile('hotelVideo')) {
    //         $vfile_name = $request->file('hotelVideo')->getClientOriginalName();
    //         $filename = pathinfo($vfile_name, PATHINFO_FILENAME);
    //         $file_ext = $request->file('hotelVideo')->getClientOriginalExtension();
    //         $hotelVideo = $filename . '-' . time() . '.' . $file_ext;
    //         $path = base_path() . '/public/uploads/hotel_video';
    //         $request->file('hotelVideo')->move($path, $hotelVideo);
    //     } else {
    //         $hotelVideo = '';
    //     }
        
    //     if($request->hasFile('hotelFeaturedImg'))
    //     {
    //         $image_name1 = $request->file('hotelFeaturedImg')->getClientOriginalName();
    //         $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
    //         $image_ext1 = $request->file('hotelFeaturedImg')->getClientOriginalExtension();
    //         $hotelFeaturedImg = $filename1.'-'.'hotelMainImg'.'-'.time().'.'.$image_ext1;
    //         $path1 = base_path() . '/public/uploads/hotel_gallery';
    //         $request->file('hotelFeaturedImg')->move($path1,$hotelFeaturedImg);
    //     }else{
    //         $hotelFeaturedImg = '';
    //     }
    //     // dd($hotelFeaturedImg);
    //     // if (!empty($_FILES["hotelGallery"]["name"][0])) {
    //     //     $hotelmainimgname = $_FILES["hotelGallery"]["name"][0];
    //     //     $hotelmainimgurl = time() . '_' . $hotelmainimgname;
    //     //     move_uploaded_file($_FILES["hotelGallery"]["tmp_name"][0], "public/uploads/hotel_gallery/" . time() . '_' . $_FILES['hotelGallery']['name'][0]);
    //     // }

    //     if ($request->hasFile('hotel_document')) {
    //         $image_nam2 = $request->file('hotel_document')->getClientOriginalName();
    //         $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
    //         $image_ex2 = $request->file('hotel_document')->getClientOriginalExtension();
    //         $hotel_document = $filenam2 . '-' . time() . '.' . $image_ex2;
    //         $pat2 = base_path() . '/public/uploads/hotel_document';
    //         $request->file('hotel_document')->move($pat2, $hotel_document);
    //     } else {
    //         $hotel_document = '';
    //     }

    //     // if($request->hasFile('hotel_notes'))
    //     // {
    //     //     $image_name3 = $request->file('hotel_notes')->getClientOriginalName();
    //     //     $filename3 = pathinfo($image_name3,PATHINFO_FILENAME);
    //     //     $image_ext3 = $request->file('hotel_notes')->getClientOriginalExtension();
    //     //     $hotel_notes = $filename3.'-'.time().'.'.$image_ext3;
    //     //     $path3 = base_path() . '/public/uploads/hotel_notes';
    //     //     $request->file('hotel_notes')->move($path3,$hotel_notes);
    //     // }else{
    //     //     $hotel_notes = '';
    //     // }

    //     $adminhotel = new Hotel;

    //     // step 1 
    //     $adminhotel->hotel_user_id = Auth::user()->id;
    //     $adminhotel->is_admin = 1;
    //     $adminhotel->hotel_name = $request->hotelName;
    //     $adminhotel->hotel_content = $request->summernote;
    //     $adminhotel->property_contact_name = $request->contact_name;
    //     $adminhotel->property_contact_num = $request->contact_num;
    //     $adminhotel->property_alternate_num = $request->alternate_num;

    //     $adminhotel->cat_listed_room_type = $request->cat_listed_room_type;
    //     $adminhotel->where_property_listed = $request->where_property_listed;
    //     $adminhotel->do_you_multiple_hotel = $request->do_you_multiple_hotel;
    //     $adminhotel->hotel_rating = $request->hotel_rating;

    //     $adminhotel->scout_id = $request->scout_id;
    //     $adminhotel->checkin_time = $request->checkin_time;
    //     $adminhotel->checkout_time = $request->checkout_time;
    //     $adminhotel->min_day_before_book = $request->min_day_before_book;
    //     $adminhotel->min_day_stays = $request->min_day_stays;

    //     // $adminhotel->created_at = date('Y-m-d H:i:s');
    //     $adminhotel->hotel_video = $hotelVideo;
    //     $adminhotel->hotel_gallery = $hotelFeaturedImg;
    //     $adminhotel->hotel_document = $hotel_document;
    //     // $adminhotel->hotel_notes = $hotel_notes;
    //     $adminhotel->hotel_notes = $request->hotel_notes;

    //     // step 2
    //     $adminhotel->payment_mode = $request->payment_mode;
    //     $adminhotel->booking_option = $request->booking_option;
    //     $adminhotel->hotel_address = $request->hotel_address;
    //     $adminhotel->hotel_latitude = $request->hotel_latitude;
    //     $adminhotel->hotel_longitude = $request->hotel_longitude;
    //     $adminhotel->hotel_city = $request->hotel_city;
    //     $adminhotel->neighb_area = $request->neighb_area;
    //     $adminhotel->hotel_country = $request->hotel_country;
    //     $adminhotel->attraction_name = $request->attraction_name;
    //     $adminhotel->attraction_content = $request->attraction_content;
    //     $adminhotel->attraction_distance = $request->attraction_distance;
    //     $adminhotel->attraction_type = $request->attraction_type;
    //     $adminhotel->stay_price = $request->stay_price;
    //     $adminhotel->extra_price_name = $request->extra_price_name;
    //     $adminhotel->extra_price = $request->extra_price;
    //     $adminhotel->extra_price_type = $request->extra_price_type;
    //     $adminhotel->service_fee_name = $request->service_fee_name;
    //     $adminhotel->service_fee = $request->service_fee;
    //     $adminhotel->service_fee_type = $request->service_fee_type;
    //     $adminhotel->property_type = $request->property_type;


    //     $adminhotel->parking_option = $request->parking_option;
    //     $adminhotel->parking_price = $request->parking_price;
    //     $adminhotel->payment_interval = $request->payment_interval;
    //     $adminhotel->parking_reserv_need = $request->parking_reserv_need;
    //     $adminhotel->parking_locate = $request->parking_locate;
    //     $adminhotel->parking_type = $request->parking_type;
    //     $adminhotel->breakfast_availability = $request->breakfast_availability;
    //     $adminhotel->breakfast_price_inclusion = $request->breakfast_price_inclusion;
    //     $adminhotel->breakfast_cost = $request->breakfast_cost;
    //     $adminhotel->breakfast_type = json_encode($request->breakfast_type);

    //     $adminhotel->save();

    //     $adminhotel_id = $adminhotel->id;
    //     if (!empty($_FILES["hotelGallery"]["name"])) {
    //         foreach ($_FILES["hotelGallery"]["name"] as $key => $error) {
    //             $imgname = $_FILES["hotelGallery"]["name"][$key];
    //             $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
    //             $name = $_FILES["hotelGallery"]["name"];
    //             move_uploaded_file($_FILES["hotelGallery"]["tmp_name"][$key], "public/uploads/hotel_gallery/" . time() . '_' . $_FILES['hotelGallery']['name'][$key]);

    //             $Img = array(
    //                 'image' => time() . '_' . $imgname,
    //                 'hotel_id' => $adminhotel_id,
    //                 'is_featured' => 0,
    //                 'status' => 1,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s')
    //             );
    //             $up = DB::table('hotel_gallery')->insert($Img);
    //         }
    //     }

    //     if (!empty($request->amenity)) {
    //         foreach ($request->amenity as $amenity_id) {
    //             $ameni = array(
    //                 'hotel_id' => $adminhotel_id,
    //                 'amenity_id' => $amenity_id,
    //                 'status' => 1,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s')
    //             );
    //             $up = DB::table('hotel_amenities')->insert($ameni);
    //         }
    //     }

    //     if (!empty($request->services)) {
    //         foreach ($request->services as $service_id) {
    //             $ameni = array(
    //                 'hotel_id' => $adminhotel_id,
    //                 'hotel_service_id' => $service_id,
    //                 'status' => 1,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s')
    //             );
    //             $up = DB::table('hotel_services')->insert($ameni);
    //         }
    //     }

    //     // add multiple option
    //     if (!empty($request->extra[0]['name'])) {
    //         foreach ($request->extra as $extra_option) {
    //             // echo "<pre>";print_r($extra_option['name']);
    //             $extra_opt = array(
    //                 'ext_opt_name' => $extra_option['name'],
    //                 'ext_opt_price' => $extra_option['price'],
    //                 'ext_opt_type' => $extra_option['type'],
    //                 'hotel_id' => $adminhotel_id,
    //                 'status' => 1,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s')
    //             );
    //             $up = DB::table('hotel_extra_price')->insert($extra_opt);
    //         }
    //     }

    //     // add multiple services
    //     if (!empty($request->service[0]['name'])) {
    //         foreach ($request->service as $service_fee) {
    //             // echo "<pre>";print_r($extra_option['name']);
    //             $services_fee = array(
    //                 'serv_fee_name' => $service_fee['name'],
    //                 'serv_fee_price' => $service_fee['price'],
    //                 'serv_fee_type' => $service_fee['type'],
    //                 'hotel_id' => $adminhotel_id,
    //                 'status' => 1,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s')
    //             );
    //             $up = DB::table('hotel_service_fee')->insert($services_fee);
    //         }
    //     }

    //     return response()->json(['status' => 'success', 'msg' => 'Hotel Added Successfully']);
    // }

    public function edit_hotel($id)
    {
        $hotel_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        $data['hotel_info'] = DB::table('hotels')->where('hotel_id', $hotel_id)->first();

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['hotel_amenities'] = DB::table('hotel_amenities')->where('hotel_id', $hotel_id)->pluck('amenity_id')->toArray();
        $data['hotel_services'] = DB::table('hotel_services')->where('hotel_id', $hotel_id)->pluck('hotel_service_id')->toArray();
        $data['hotel_extra_price'] = DB::table('hotel_extra_price')->where('hotel_id', $hotel_id)->where('status', 1)->get();
        $data['hotel_service_fee'] = DB::table('hotel_service_fee')->where('hotel_id', $hotel_id)->where('status', 1)->get();
        // echo "<pre>";print_r($data['hotel_info']);die;
        return view('admin/hotel/edit_hotel')->with($data);
    }

    public function update_hotel(Request $request)
    {
        // echo "<pre>";print_r($request->amenity);die;
        $hotel_id = $request->hotel_id;
        $user_id = Auth::user()->id;

        if ($request->hasFile('hotelVideo')) {
            $vfile_name = $request->file('hotelVideo')->getClientOriginalName();
            $filename = pathinfo($vfile_name, PATHINFO_FILENAME);
            $file_ext = $request->file('hotelVideo')->getClientOriginalExtension();
            $hotelVideo = $filename . '-' . time() . '.' . $file_ext;
            $path = base_path() . '/public/uploads/hotel_video';
            $request->file('hotelVideo')->move($path, $hotelVideo);
        } else {
            $hotelVideo = '';
        }

        // if($request->hasFile('hotelFeaturedImg'))
        // {
        //     $image_name1 = $request->file('hotelFeaturedImg')->getClientOriginalName();
        //     $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
        //     $image_ext1 = $request->file('hotelFeaturedImg')->getClientOriginalExtension();
        //     $hotelFeaturedImg = $filename1.'#'.time().'.'.$image_ext1;
        //     $path1 = base_path() . '/public/uploads/hotel_gallery';
        //     $request->file('hotelFeaturedImg')->move($path1,$hotelFeaturedImg);
        // }else{
        //     $hotelFeaturedImg = $request->old_hotel_image;
        // } 

        if($request->hasFile('hotelFeaturedImg'))
        {
            if(!empty($request->old_hotel_image))
            {
                $filePath = public_path('uploads/hotel_gallery/'. $request->old_hotel_image);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/hotel_gallery/' . $request->old_hotel_image;
                    unlink($oldImagePath);
                }
            }
            $image_name1 = $request->file('hotelFeaturedImg')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('hotelFeaturedImg')->getClientOriginalExtension();
            $hotelFeaturedImg = $filename1.'-'.'hotelMainImg'.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/hotel_gallery';
            $request->file('hotelFeaturedImg')->move($path1,$hotelFeaturedImg);
        }else{
            $hotelFeaturedImg = $request->old_hotel_image;
        }
        // echo "<pre>";print_r($hotelFeaturedImg);die;

        if ($request->hasFile('hotel_document')) {
            $image_nam2 = $request->file('hotel_document')->getClientOriginalName();
            $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
            $image_ex2 = $request->file('hotel_document')->getClientOriginalExtension();
            $hotel_document = $filenam2 . '-' . time() . '.' . $image_ex2;
            $pat2 = base_path() . '/public/uploads/hotel_document';
            $request->file('hotel_document')->move($pat2, $hotel_document);
        } else {
            $hotel_document = '';
        }

        if (!empty($hotel_id)) {
            DB::table('hotels')

                ->where('hotel_id', $hotel_id)

                ->update([
                    'hotel_name' => $request->hotelName,
                    'hotel_content' => $request->summernote,
                    'property_contact_name' => $request->contact_name,
                    'property_contact_num' => $request->contact_num,
                    'property_alternate_num' => $request->alternate_num,
                    'cat_listed_room_type' => $request->cat_listed_room_type,
                    'where_property_listed' => $request->where_property_listed,
                    'do_you_multiple_hotel' => $request->do_you_multiple_hotel,
                    'hotel_rating' => $request->hotel_rating,
                    'scout_id' => $request->scout_id,
                    'checkin_time' => $request->checkin_time,
                    'checkout_time' => $request->checkout_time,
                    'min_day_before_book' => $request->min_day_before_book,
                    'min_day_stays' => $request->min_day_stays,

                    'hotel_video' => $hotelVideo,
                    'hotel_gallery' => $hotelFeaturedImg,
                    'hotel_document' => $hotel_document,
                    // 'hotel_notes' => $hotel_notes,
                    'hotel_notes' => $request->hotel_notes,

                    // step 2
                    'payment_mode' => $request->payment_mode,
                    'booking_option' => $request->booking_option,
                    'hotel_address' => $request->hotel_address,
                    'hotel_latitude' => $request->hotel_latitude,
                    'hotel_longitude' => $request->hotel_longitude,
                    'hotel_city' => $request->hotel_city,
                    'neighb_area' => $request->neighb_area,
                    'hotel_country' => $request->hotel_country,
                    'attraction_name' => $request->attraction_name,
                    'attraction_content' => $request->attraction_content,
                    'attraction_distance' => $request->attraction_distance,
                    'attraction_type' => $request->attraction_type,
                    'stay_price' => $request->stay_price,
                    'extra_price_name' => $request->extra_price_name,
                    'extra_price' => $request->extra_price,
                    'extra_price_type' => $request->extra_price_type,
                    'service_fee_name' => $request->service_fee_name,
                    'service_fee' => $request->service_fee,
                    'service_fee_type' => $request->service_fee_type,
                    'property_type' => $request->property_type,

                    'parking_option' => $request->parking_option,
                    'parking_price' => $request->parking_price,
                    'payment_interval' => $request->payment_interval,
                    'parking_reserv_need' => $request->parking_reserv_need,
                    'parking_locate' => $request->parking_locate,
                    'parking_type' => $request->parking_type,
                    'breakfast_availability' => $request->breakfast_availability,
                    'breakfast_price_inclusion' => $request->breakfast_price_inclusion,
                    'breakfast_cost' => $request->breakfast_cost,
                    'breakfast_type' => json_encode($request->breakfast_type),

                    'updated_at' => date('Y-m-d H:i:s'),

                ]);

            if (!empty($_FILES["hotelGallery"]["name"])) {
                foreach ($_FILES["hotelGallery"]["name"] as $key => $error) {
                    $imgname = $_FILES["hotelGallery"]["name"][$key];
                    $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
                    $name = $_FILES["hotelGallery"]["name"];
                    move_uploaded_file($_FILES["hotelGallery"]["tmp_name"][$key], "public/uploads/hotel_gallery/" . time() . '_' . $_FILES['hotelGallery']['name'][$key]);

                    $Img = array(
                        'image' => time() . '_' . $imgname,
                        'hotel_id' => $hotel_id,
                        'is_featured' => 0,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('hotel_gallery')->insert($Img);
                }
            }

            DB::table('hotel_amenities')->where('hotel_id', '=', $hotel_id)->delete();
            if (!empty($request->amenity)) {
                foreach ($request->amenity as $amenity_id) {
                    $ameni = array(
                        'hotel_id' => $hotel_id,
                        'amenity_id' => $amenity_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('hotel_amenities')->insert($ameni);
                }
            }

            DB::table('hotel_services')->where('hotel_id', '=', $hotel_id)->delete();
            if (!empty($request->services)) {
                foreach ($request->services as $service_id) {
                    $service = array(
                        'hotel_id' => $hotel_id,
                        'hotel_service_id' => $service_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('hotel_services')->insert($service);
                }
            }

            // add multiple option
            if (!empty($request->extra[0]['name'])) {
                DB::table('hotel_extra_price')->where('hotel_id', '=', $hotel_id)->delete();
                foreach ($request->extra as $extra_option) {
                    // echo "<pre>";print_r($extra_option['name']);
                    $extra_opt = array(
                        'ext_opt_name' => $extra_option['name'],
                        'ext_opt_price' => $extra_option['price'],
                        'ext_opt_type' => $extra_option['type'],
                        'hotel_id' => $hotel_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('hotel_extra_price')->insert($extra_opt);
                }
            }

            // add multiple services
            if (!empty($request->service[0]['name'])) {
                DB::table('hotel_service_fee')->where('hotel_id', '=', $hotel_id)->delete();
                foreach ($request->service as $service_fee) {
                    // echo "<pre>";print_r($extra_option['name']);
                    $services_fee = array(
                        'serv_fee_name' => $service_fee['name'],
                        'serv_fee_price' => $service_fee['price'],
                        'serv_fee_type' => $service_fee['type'],
                        'hotel_id' => $hotel_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('hotel_service_fee')->insert($services_fee);
                }
            }    

            return response()->json(['status' => 'success', 'msg' => 'Hotel Updated Successfully']);
        }
    }

    public function view_hotel($id)
    {
        $hotel_id = $id;
        $data['countries'] = DB::table('country')->orderby('name', 'ASC')->get();
        $data['properties'] = DB::table('H1_Hotel_and_other_Stays')->orderby('id', 'ASC')->get();
        $data['services'] = DB::table('H3_Services')->orderby('id', 'ASC')->get();
        $data['hotel_info'] = DB::table('hotels')->where('hotel_id', $hotel_id)->first();

        $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
        $data['hotel_amenities'] = DB::table('hotel_amenities')->where('hotel_id', $hotel_id)->pluck('amenity_id')->toArray();
        $data['hotel_services'] = DB::table('hotel_services')->where('hotel_id', $hotel_id)->pluck('hotel_service_id')->toArray();

        return view('admin/hotel/hotel_view')->with($data);
    }

    public function hotel_rooms_list($hotel_id)
    {
        // dd(Auth::user()->id);
        $data['hotel_id'] = $hotel_id;

        $data['hotelRoomsList'] = DB::table('room_list')

    	->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
        ->join('hotels', 'room_list.hotel_id', '=', 'hotels.hotel_id')
    	->select('room_list.*',
                'room_type_categories.id as room_type_cat_id',
                'room_type_categories.title as room_type_cat_title',
                'hotels.hotel_name')
        ->orderby('id', 'DESC')        
        ->where('room_list.hotel_id', $hotel_id)
    	->get();  
        return view('admin/hotel/hotel_rooms_list')->with($data);
    }

    public function delete_hotel(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $res = DB::table('hotels')->where('hotel_id', '=', $hotel_id)->first();
        // echo "<pre>";print_r($res);die;
        $getHotelGallery = DB::table('hotel_gallery')->where('hotel_id', '=', $hotel_id)->get();
        $getRoom = DB::table('room_list')->where('hotel_id', '=', $hotel_id)->get();

        if ($res) {
            if(!empty($getHotelGallery))
            {
                foreach($getHotelGallery as $hotelGallery){
                    // echo "<pre>";print_r($hotelGallery);
                    $filePath = public_path('uploads/hotel_gallery/'. $hotelGallery->image);
                    if(file_exists($filePath)){
                        $oldImagePath = './public/uploads/hotel_gallery/' . $hotelGallery->image;
                        unlink($oldImagePath);
                    }
                }
            }

            if(count($getRoom) > 0){
                foreach($getRoom as $room){
                    $getRoomimg = DB::table('room_gallery')->where('room_id', '=', $room->id)->get();
                    
                    if(count($getRoomimg) > 0){
                        foreach($getRoomimg as $roomImg){
                            // echo "<pre>";print_r($roomImg->image);
                            $filePath = public_path('uploads/room_images/'. $roomImg->image);
                            if(file_exists($filePath)){
                                $oldImagePath = './public/uploads/room_images/' . $roomImg->image;
                                unlink($oldImagePath);
                            }
                        }
                    }
                    DB::table('room_gallery')->where('room_id', '=', $room->id)->delete();


                    DB::table('room_amenities')->where('room_id', '=', $room->id)->delete();
                    DB::table('room_services')->where('room_id', '=', $room->id)->delete();
                    DB::table('room_extra_option')->where('room_id', '=', $room->id)->delete();
                    DB::table('room_features')->where('room_id', '=', $room->id)->delete();
                }
            }

            DB::table('hotel_gallery')->where('hotel_id', '=', $hotel_id)->delete();
            DB::table('room_list')->where('hotel_id', '=', $hotel_id)->delete();
            // DB::table('room_gallery')->where('room_id', '=', $room_id)->delete();
            DB::table('hotel_amenities')->where('hotel_id', '=', $hotel_id)->delete();
            DB::table('hotel_services')->where('hotel_id', '=', $hotel_id)->delete();

            DB::table('hotel_service_fee')->where('hotel_id', '=', $hotel_id)->delete();
            DB::table('hotel_extra_price')->where('hotel_id', '=', $hotel_id)->delete();

            DB::table('hotels')->where('hotel_id', '=', $hotel_id)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function change_hotel_status(Request $request)
    {
        $hotel_id = $request->hotel_id;

        if (!empty($hotel_id)) {
            DB::table('hotels')
                ->where('hotel_id', $hotel_id)
                ->update([
                    'hotel_status' => $request->status
                ]);
        }
        return response()->json(['success' => 'status change successfully.']);
    }

    public function delete_hotel_single_image(Request $request)
	{
        $imageId = $request->id;
        // $hotelID = $request->hotel_id;
        $image_data = DB::table('hotel_gallery')->where('id', $imageId)->first();
		if ($image_data) {
            $filePath = public_path('uploads/hotel_gallery/'. $image_data->image);
            if(file_exists($filePath)){
                $Path = './public/uploads/hotel_gallery/' . $image_data->image;
                unlink($Path);
            }
			$image_delete = DB::table('hotel_gallery')->where('id', '=', $imageId)->delete();
			return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
		}
	}
}
