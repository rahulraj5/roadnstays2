<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Collection;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Space;
use App\Models\Room;
use App\Models\ExtraOption;
use DB;
use Session;

class SpaceController extends Controller
{
    public function space_list()
    {
        // $data['space_list'] = DB::table('space')->orderby('id', 'DESC')->get();
        $data['space_list'] = DB::table('space')
                                ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
                                ->join('space_sub_categories', 'space.sub_category_id', '=', 'space_sub_categories.sub_cat_id')
                                ->select('space.*',
                                        'space_categories.category_name',
                                        'space_sub_categories.sub_category_name')
                                ->orderby('space.space_id', 'DESC')
                                ->where('copy_status',1)
                                ->get();
        // dd($data['space_list']);
        return view('admin/space/space_list')->with($data);
    }

    public function add_space($space_id="")
    {
        // echo "<pre>";print_r($space_id);die;
        $data['space_id'] = $space_id;
        $data['space_categories'] = DB::table('space_categories')->where('status',1)->orderby('created_at', 'ASC')->get();
        $data['space_sub_categories'] = DB::table('space_sub_categories')->where('status',1)->orderby('created_at', 'ASC')->get();
        $data['countries'] = DB::table('countries')->orderby('name', 'ASC')->get();
        
        $data['scouts'] = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get();
        $data['other_features'] = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get();
        return view('admin/space/add_space')->with($data);
    }

    public function submit_space(Request $request)
    {
        $adminspace = Space::firstOrNew(['space_name' =>  request('space_name')]);
        if(!$adminspace->space_id){
            $adminspace->category_id = $request->category_id;
            $adminspace->sub_category_id = $request->sub_category_id;
            
            $adminspace->space_name = $request->space_name;
            $adminspace->description = $request->description;
            $adminspace->notes = $request->notes;
    
            $adminspace->scout_id = $request->scout_id;
            $adminspace->payment_mode = $request->payment_mode;
            $adminspace->booking_option = $request->booking_option;
            $adminspace->reserv_date_change_allow = $request->reserv_date_change_allow;
            $adminspace->guest_number = $request->guest_number;
    
            $adminspace->city = $request->city;
            $adminspace->neighbor_area = $request->neighbor_area;
            $adminspace->space_country = $request->space_country;
    
            $adminspace->price_per_night = $request->price_per_night;
            $adminspace->tax_percentage = $request->tax_percentage;
            $adminspace->price_per_night_7d = $request->price_per_night_7d;
            $adminspace->price_per_night_30d = $request->price_per_night_30d;
            
            $adminspace->is_guest_allow = $request->is_guest_allow;
            $adminspace->extra_guest_per_night = $request->extra_guest_per_night;
            $adminspace->is_above_guest_cap = $request->is_above_guest_cap;
            $adminspace->is_pay_by_num_guest = $request->is_pay_by_num_guest;
    
            $adminspace->cleaning_fee = $request->cleaning_fee;
            $adminspace->cleaning_fee_type = $request->cleaning_fee_type;
            $adminspace->city_fee = $request->city_fee;
            $adminspace->city_fee_type = $request->city_fee_type;
            $adminspace->security_deposite = $request->security_deposite;
    
            $adminspace->earlybird_discount = $request->earlybird_discount;
            $adminspace->min_days_in_advance = $request->min_days_in_advance;
            
            $adminspace->room_size = $request->room_size;
            $adminspace->room_number = $request->room_number;
            $adminspace->bedroom_number = $request->bedroom_number;
            $adminspace->bathroom_number = $request->bathroom_number;
            
            $adminspace->bed_type = $request->bed_type;
            $adminspace->private_bathroom = $request->private_bathroom;
            $adminspace->private_entrance = $request->private_entrance;
            $adminspace->optional_services = $request->optional_services;
            $adminspace->family_friendly = $request->family_friendly;
            $adminspace->outdoor_facilities = $request->outdoor_facilities;
            $adminspace->extra_people = $request->extra_people;
    
            $adminspace->checkin_hr = $request->checkin_hr;
            $adminspace->checkout_hr = $request->checkout_hr;
            $adminspace->late_checkin = $request->late_checkin;
            $adminspace->cancellation = $request->cancellation;
            $adminspace->space_address = $request->space_address;
            $adminspace->zip_code = $request->zip_code;
            $adminspace->province = $request->province;
            $adminspace->space_latitude = $request->space_latitude;
            $adminspace->space_longitude = $request->space_longitude;
    
            if ($request->hasFile('space_document')) {
                $image_nam2 = $request->file('space_document')->getClientOriginalName();
                $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
                $image_ex2 = $request->file('space_document')->getClientOriginalExtension();
                $space_document = $filenam2 . '-' . time() . '.' . $image_ex2;
                $pat2 = base_path() . '/public/uploads/space_document';
                $request->file('space_document')->move($pat2, $space_document);
            } else {
                $space_document = '';
            }
    
            $adminspace->space_document = $space_document;
            
            if($request->hasFile('spaceFeaturedImg'))
            {
            $image_name1 = $request->file('spaceFeaturedImg')->getClientOriginalName();
            $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
            $image_ext1 = $request->file('spaceFeaturedImg')->getClientOriginalExtension();
            $spaceFeaturedImg = $filename1.'-'.'spaceMainImg'.'-'.time().'.'.$image_ext1;
            $path1 = base_path() . '/public/uploads/space_images';
            $request->file('spaceFeaturedImg')->move($path1,$spaceFeaturedImg);
            }else{
            $spaceFeaturedImg = 'default_space_img.jpg';
            }
            
            $adminspace->image = $spaceFeaturedImg;
            
            $adminspace->space_user_id = 1;
            $adminspace->is_admin = 1;
            // $adminspace->copy_status = 1;
            $adminspace->status = 1;
            $adminspace->created_at = date('Y-m-d H:i:s');
            $adminspace->save();
            // die;
            $space_id = $adminspace->id;
            if (!empty($_FILES["imgupload"]["name"])) {
                foreach ($_FILES["imgupload"]["name"] as $key => $error) {
                    $imgname = $_FILES["imgupload"]["name"][$key];
                    $imgurl = "public/uploads/space_images/" . time() . '_' . $imgname;
                    $name = $_FILES["imgupload"]["name"];
                    move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/space_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);
        
                    $Img = array(
                        'image' => time() . '_' . $imgname,
                        'space_id' => $space_id,
                        'is_featured' => 0,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('space_gallery')->insert($Img);
                }
            }
    
            if (!empty($request->other_features_id)) {
                foreach ($request->other_features_id as $features_id) {
                    $serv = array(
                        'space_id' => $space_id,
                        'space_feature_id' => $features_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('space_features')->insert($serv);
                }
            }
    
            // add multiple option
            // if (!empty($request->extra)) {
            if (!empty($request->extra[0]['name'])) {
                foreach ($request->extra as $extra_option) {
                    // echo "<pre>";print_r($extra_option['name']);
                    $extra_opt = array(
                        'ext_opt_name' => $extra_option['name'],
                        'ext_opt_price' => $extra_option['price'],
                        'ext_opt_type' => $extra_option['type'],
                        'space_id' => $space_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('space_extra_option')->insert($extra_opt);
                }
            }
    
            if (!empty($request->custom[0]['label'])) {
                foreach ($request->custom as $custom_detail) {
                    $custom_opt = array(
                        'custom_label' => $custom_detail['label'],
                        'custom_quantity' => $custom_detail['quantity'],
                        'space_id' => $space_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('space_custom_details')->insert($custom_opt);
                }
            }    
    
            return response()->json(['status' => 'success', 'msg' => 'Space Added Successfully']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Space Name Already Exists']);
        } 
    }

    public function edit_space(Request $request)
    {
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
        // echo "<pre>"; print_r($data['space_features']);die;
        return view('admin/space/edit_space')->with($data);
    }

    public function update_space(Request $request)
    {
        $spaceName = $request->space_name;
        $checkSpaceName = DB::table('space')->where('space_name', $spaceName)->where('space_id','!=',$request->space_id)->get();
        $spaceNameExist = count($checkSpaceName);
        // echo "<pre>";print_r($roomNameExist);die;
        if($spaceNameExist == 0){

            $space_id = $request->space_id;
            if($request->is_guest_allow==1){
                $extra_guest_per_night = $request->extra_guest_per_night;
                $is_above_guest_cap = $request->is_above_guest_cap;
                $is_pay_by_num_guest = $request->is_pay_by_num_guest;
            }else{
                $extra_guest_per_night = 0;
                $is_above_guest_cap = 0;
                $is_pay_by_num_guest = 0;
            }
            // echo "<pre>";print_r($request->old_space_image);die;
            if($request->hasFile('spaceFeaturedImg'))
            {
                if(!empty($request->old_space_image))
                {
                    $filePath = public_path('uploads/space_images/'. $request->old_space_image);
                    if(file_exists($filePath)){
                        $oldImagePath = './public/uploads/space_images/'. $request->old_space_image;
                        unlink($oldImagePath);
                    }
                }
                $image_name1 = $request->file('spaceFeaturedImg')->getClientOriginalName();
                $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
                $image_ext1 = $request->file('spaceFeaturedImg')->getClientOriginalExtension();
                $spaceFeaturedImg = $filename1.'-'.'spaceMainImg'.'-'.time().'.'.$image_ext1;
                $path1 = base_path() . '/public/uploads/space_images';
                $request->file('spaceFeaturedImg')->move($path1,$spaceFeaturedImg);
            }else{
                $spaceFeaturedImg = $request->old_space_image;
            }

            if($request->hasFile('space_document'))
            {
                if(!empty($request->old_space_document))
                {
                    $filePath = public_path('uploads/space_document/'. $request->old_space_document);
                    if(file_exists($filePath)){
                        $oldImagePath = './public/uploads/space_document/'. $request->old_space_document;
                        unlink($oldImagePath);
                    }
                }
                $image_nam2 = $request->file('space_document')->getClientOriginalName();
                $filenam2 = pathinfo($image_nam2, PATHINFO_FILENAME);
                $image_ex2 = $request->file('space_document')->getClientOriginalExtension();
                $space_document = $filenam2 . '-' . time() . '.' . $image_ex2;
                $pat2 = base_path() . '/public/uploads/space_document';
                $request->file('space_document')->move($pat2, $space_document);
            }else{
                $space_document = $request->old_space_document;
            }

            $space_data = array(
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'space_name' => $request->space_name,
                'image' => $spaceFeaturedImg,
                'space_document' => $space_document,

                'scout_id' => $request->scout_id,
                'payment_mode' => $request->payment_mode,
                'booking_option' => $request->booking_option,
                'reserv_date_change_allow' => $request->reserv_date_change_allow,
                'guest_number' => $request->guest_number,

                'description' => $request->description,
                'notes' => $request->notes,

                'city' => $request->city,
                'neighbor_area' => $request->neighbor_area,
                'space_country' => $request->space_country,                

                'price_per_night' => $request->price_per_night,
                'tax_percentage' => $request->tax_percentage,
                'price_per_night_7d' => $request->price_per_night_7d,
                'price_per_night_30d' => $request->price_per_night_30d,

                'is_guest_allow' => $request->is_guest_allow,
                'extra_guest_per_night' => $extra_guest_per_night,
                'is_above_guest_cap' => $is_above_guest_cap,
                'is_pay_by_num_guest' => $is_pay_by_num_guest,

                'cleaning_fee' => $request->cleaning_fee,
                'cleaning_fee_type' => $request->cleaning_fee_type,
                'city_fee' => $request->city_fee,
                'city_fee_type' => $request->city_fee_type,
                'security_deposite' => $request->security_deposite,

                'earlybird_discount' => $request->earlybird_discount,
                'min_days_in_advance' => $request->min_days_in_advance,

                'room_size' => $request->room_size,
                'room_number' => $request->room_number,
                'bedroom_number' => $request->bedroom_number,
                'bathroom_number' => $request->bathroom_number,

                'bed_type' => $request->bed_type,
                'private_bathroom' => $request->private_bathroom,
                'private_entrance' => $request->private_entrance,
                'optional_services' => $request->optional_services,
                'family_friendly' => $request->family_friendly,
                'outdoor_facilities' => $request->outdoor_facilities,
                'extra_people' => $request->extra_people,

                'checkin_hr' => $request->checkin_hr,
                'checkout_hr' => $request->checkout_hr,
                'late_checkin' => $request->late_checkin,
                'cancellation' => $request->cancellation,
                'space_address' => $request->space_address,
                'zip_code' => $request->zip_code,
                'province' => $request->province,
                'space_latitude' => $request->space_latitude,
                'space_longitude' => $request->space_longitude,

                'copy_status' => 1,
                'status' => 1,
            );

            $spaceData = DB::table('space')->where('space_id', $space_id)->update($space_data);

            if (!empty($_FILES["imgupload"]["name"])) {
                foreach ($_FILES["imgupload"]["name"] as $key => $error) {
                    $imgname = $_FILES["imgupload"]["name"][$key];
                    $imgurl = "public/uploads/space_images/" . time() . '_' . $imgname;
                    $name = $_FILES["imgupload"]["name"];
                    move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/space_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);

                    $Img = array(
                        'image' => time() . '_' . $imgname,
                        'space_id' => $space_id,
                        'is_featured' => 0,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('space_gallery')->insert($Img);
                }
            }

            if (!empty($request->other_features_id)) {
                DB::table('space_features')->where('space_id', '=', $space_id)->delete();
                foreach ($request->other_features_id as $features_id) {
                    $service = array(
                        'space_id' => $space_id,
                        'space_feature_id' => $features_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $up = DB::table('space_features')->insert($service);
                }
            }

            if (!empty($request->extra[0]['name'])) {
                DB::table('space_extra_option')->where('space_id', '=', $space_id)->delete();
                // echo "<pre>";print_r($request->extra);die;
                foreach ($request->extra as $extra_option) {
                    // echo "<pre>";print_r($extra_option['name']);
                    $extra_opt = array(
                        'ext_opt_name' => $extra_option['name'],
                        'ext_opt_price' => $extra_option['price'],
                        'ext_opt_type' => $extra_option['type'],
                        'space_id' => $space_id,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    //echo "<pre>";print_r($extra_opt);die;
                    $up = DB::table('space_extra_option')->insert($extra_opt);
                }
            }

            return response()->json(['status' => 'success', 'msg' => 'Space update Successfully']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Space Name Already Exist']);
        }    
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
    
    public function delete_space(Request $request)
    {
        $space_id = $request->id;  

        $getSpaceGallery = DB::table('space_gallery')->where('space_id', '=', $space_id)->get();
        // echo "<pre>";print_r($getRoomGallery);die;
        if(!empty($getSpaceGallery))
        {
            foreach($getSpaceGallery as $spaceGallery){
                $filePath = public_path('uploads/space_images/'. $spaceGallery->image);
                if(file_exists($filePath)){
                    $oldImagePath = './public/uploads/space_images/' . $spaceGallery->image;
                    unlink($oldImagePath);
                }
            }
        }
        $spaceGalleryDelete = DB::table('space_gallery')->where('space_id', '=', $space_id)->delete();

        $getSpaceDetails = DB::table('space')->where('space_id', '=', $space_id)->first();
        if(!empty($getSpaceDetails->image))
        {
            $filePath = public_path('uploads/space_images/'. $getSpaceDetails->image);
            if(file_exists($filePath)){
                $oldImagePath = './public/uploads/space_images/' . $getSpaceDetails->image;
                unlink($oldImagePath);
            }
        } 
        if(!empty($getSpaceDetails->space_document))
        {
            $filePath = public_path('uploads/space_document/'. $getSpaceDetails->space_document);
            if(file_exists($filePath)){
                $oldDocumentPath = './public/uploads/space_document/' . $getSpaceDetails->space_document;
                unlink($oldDocumentPath);
            }
        }
    
        DB::table('space_features')->where('space_id', '=', $space_id)->delete();
        DB::table('space_extra_option')->where('space_id', '=', $space_id)->delete();
        DB::table('space_custom_details')->where('space_id', '=', $space_id)->delete(); 
    
        $res = DB::table('space')->where('space_id', '=', $space_id)->delete();
    
        if ($res) {
            return json_encode(array('status' => 'success', 'msg' => 'Space has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }

    public function delete_space_single_image(Request $request)
	{
        $imageId = $request->id;
        // $hotelID = $request->hotel_id;
        $image_data = DB::table('space_gallery')->where('id', $imageId)->first();
		if ($image_data) {
            $filePath = public_path('uploads/room_images/'. $image_data->image);
                if(file_exists($filePath)){
                    $Path = './public/uploads/room_images/' . $image_data->image;
                    unlink($Path);
                }
			$image_delete = DB::table('space_gallery')->where('id', '=', $imageId)->delete();
			return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
		}
	}

    public function view_space(Request $request)
    {
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
        return view('admin/space/view_space')->with($data);
    }

    public function add_copy_space(Request $request)
	{
        $space_id = $request->space_id;
        if (empty($space_id)) {
            return json_encode(array('status' => 'error', 'msg' => 'Please Select Room to Copy.'));
		} else {
            $get_space_detail = DB::table('space')->where('space_id', '=', $space_id)->first();
            // echo $get_space_detail[0]->space_id;die;
            $get_space_gallery = DB::table('space_gallery')->where('space_id', '=', $get_space_detail->space_id)->get();
            // echo count($get_space_gallery);die;

            if (!empty($get_space_detail)) {
                // echo "<pre>";print_r($get_space_detail);die;
                $getid = DB::table('space')->insertGetId(array( 
                    'category_id'      => $get_space_detail->category_id,
                    'sub_category_id'      => $get_space_detail->sub_category_id,
                    // 'space_name'     => $get_space_detail->space_name,
                    'description'    => $get_space_detail->description,
                    'notes' => $get_space_detail->notes,
                    'scout_id'    => $get_space_detail->scout_id,
                    // 'payment_mode'    => $get_space_detail->payment_mode,
                    // 'booking_option'    => $get_space_detail->booking_option,
                    // 'reserv_date_change_allow'    => $get_space_detail->reserv_date_change_allow,
                    'guest_number'    => $get_space_detail->guest_number,
                    'city'    => $get_space_detail->city,
                    'neighbor_area'    => $get_space_detail->neighbor_area,
                    'space_country'    => $get_space_detail->space_country,
                    'guest_number'    => $get_space_detail->guest_number,

                    'price_per_night' => $get_space_detail->price_per_night,
                    'tax_percentage' => $get_space_detail->tax_percentage,
                    'price_per_night_7d' => $get_space_detail->price_per_night_7d,
                    'price_per_night_30d'    => $get_space_detail->price_per_night_30d,

                    'cleaning_fee'    => $get_space_detail->cleaning_fee,
                    'cleaning_fee_type'    => $get_space_detail->cleaning_fee_type,
                    'city_fee'    => $get_space_detail->city_fee,
                    'city_fee_type'    => $get_space_detail->city_fee_type,
                    'security_deposite'    => $get_space_detail->security_deposite,
                
                    'earlybird_discount'    => $get_space_detail->earlybird_discount,
                    'min_days_in_advance'    => $get_space_detail->min_days_in_advance,

                    // 'is_guest_allow'    => $get_space_detail->is_guest_allow,
                    // 'extra_guest_per_night'    => $get_space_detail->extra_guest_per_night,
                    // 'is_above_guest_cap'    => $get_space_detail->is_above_guest_cap,
                    // 'is_pay_by_num_guest'    => $get_space_detail->is_pay_by_num_guest,
                
                    'room_size'    => $get_space_detail->room_size,
                    'room_number'    => $get_space_detail->room_number,
                    'bedroom_number'    => $get_space_detail->bedroom_number,
                    'bathroom_number'    => $get_space_detail->bathroom_number,

                    'bed_type'    => $get_space_detail->bed_type,
                    'private_bathroom'    => $get_space_detail->private_bathroom,
                    'private_entrance'    => $get_space_detail->private_entrance,
                    // 'optional_services'    => $get_space_detail->optional_services,
                    'family_friendly'    => $get_space_detail->family_friendly,
                    'outdoor_facilities'    => $get_space_detail->outdoor_facilities,
                    'extra_people'    => $get_space_detail->extra_people,

                    // 'checkin_hr'    => $get_space_detail->checkin_hr,
                    // 'checkout_hr'    => $get_space_detail->checkout_hr,
                    // 'late_checkin'    => $get_space_detail->late_checkin,
                    // 'cancellation'    => $get_space_detail->cancellation,
                    // 'space_address'    => $get_space_detail->space_address,
                    // 'zip_code'    => $get_space_detail->zip_code,
                    // 'province'    => $get_space_detail->province,
                    // 'space_latitude'    => $get_space_detail->space_latitude,
                    // 'space_longitude'    => $get_space_detail->space_longitude,

                    'copy_status' => 0,
                    'space_user_id' => 1,
                    'is_admin' => 1,
                    'status' => 0,
                    'created_at'    => date('Y-m-d H:i:s'),
                ));

                if ($getid) {
                    return json_encode(array('status' => 'success', 'msg' => 'Space Copied Sucessfully !', 'new_space_id' => base64_encode($getid)));
                }

            } else {
                return json_encode(array('status' => 'error', 'msg' => 'Something get wrong.'));
            }
        }
	}

    // # space end here

    // # space category start here

    public function space_category_list() 
    {
        $data['space_category_list'] = DB::table('space_categories')->orderby('scat_id', 'DESC')->get();
        return view('admin/space/category/space_category_list')->with($data);
    }

    public function add_space_category(Request $request)
    {
        return view('admin/space/category/add_space_category');
    }

    public function submit_space_category(Request $request)
    {
        $data = DB::table('space_categories')->insert(['category_name' => trim($request->space_cat_name), 'details' => $request->space_cat_detail, 'created_at' => date('Y-m-d H:i:s')]);
        if ($data) {
            return response()->json(['status' => 'success', 'msg' => 'Item Added successfully.']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
        }
    }

    public function edit_space_category(Request $request){
    	$cat_id = base64_decode($request->id);
        $data['space_cat_info'] = DB::table('space_categories')->where('scat_id',$cat_id)->first();
    	return view('admin/space/category/edit_space_category')->with($data) ;
    }
    
    public function update_space_category(Request $request)
    {
        $cat_id = $request->cat_id;
    	$res = DB::table('space_categories')->where('scat_id', $cat_id)->update([
                                    'category_name' => $request->space_cat_name,
                                    'details' => $request->space_cat_detail,
                                    ]);
    	if($res){
            return response()->json(['status' => 'success', 'msg' => 'updated successfully.']);
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'You have not changed any value.']);
    	} 
    }

    public function change_space_category_status(Request $request)
    {
        $cat_id = $request->cat_id;
        if(!empty($cat_id)) { 
            DB::table('space_categories')
            ->where('scat_id', $cat_id)
            ->update([
                'status' => $request->status
            ]);
        }    
    	return response()->json(['success'=>'status change successfully.']);
    }

    public function delete_space_category(Request $request) {
        $cat_id = $request->cat_id;
        $res = DB::table('space_categories')->where('scat_id', '=', $cat_id)->delete();
        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }
    }

    public function view_space_category_list($id)
    {
        // dd($data['hotelAmenityList']);
        $data['hotelAmenityList'] = DB::table('space_categories')->where('amenity_type',$id)->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')->get(['H2_Amenities.*', 'amenities_type.name']);
        // $data['hotelAmenityList'] = DB::table('H2_Amenities')->where('amenity_type',$id)->orderby('amenity_type_name', 'ASC')->get();
        
        return view('admin/space/category/view_hotelamenities_list')->with($data);
    }


    // # space category end here

    // # space subcategory start here

    public function space_subcategory_list() 
    {
        $data['space_subcategory_list'] = DB::table('space_sub_categories')
                                            // ->join('amenities_type', 'H2_Amenities.amenity_type', '=', 'amenities_type.id')
                                            // ->get(['H2_Amenities.*', 'amenities_type.name']);
                                        ->orderby('sub_cat_id', 'DESC')
                                        ->get();    
        // echo "<pre>";print_r($users);die;
        // $data['hotelAmenityList'] = DB::table('H2_Amenities')->orderby('amenity_id', 'DESC')->get();
        return view('admin/space/subcategory/space_sub_category_list')->with($data);
    }

    public function add_space_subcategory(Request $request)
    {
        // $data['space_categories'] = DB::table('space_categories')->get();
        // return view('admin/space/subcategory/add_space_sub_category')->with($data);
        return view('admin/space/subcategory/add_space_sub_category');
    }

    public function submit_space_subcategory(Request $request)
    {
        // dd($request->all());
        $space_subcat_name = $request->space_subcat_name;
        $data = DB::table('space_sub_categories')->insert(['sub_category_name' => trim($space_subcat_name),
                                                'details' => $request->space_subcat_name,
                                                'created_at' => date('Y-m-d H:i:s')]);

        // $hotelAmenity_type_id = $request->hotelAmenity_type_id;
        // $other_featured_id = json_encode($request->otherFeaturedId); 
        // $amenity_type_name = DB::table('amenities_type')->where('id',$hotelAmenity_type_id)->value('name');

        // $amenity_type_sym = str_replace(' ', '_', $amenity_type_name);

        // $data = DB::table('H2_Amenities')->insert(['amenity_name' => trim($hotelAmenityName),
        //                                             'amenity_type' => $hotelAmenity_type_id,
        //                                             // 'room_other_featured_id' => $other_featured_id,
        //                                             'amenity_type_name' => trim($amenity_type_name),
        //                                             'amenity_type_sym' => $amenity_type_sym]);
        if ($data) {
            return response()->json(['status' => 'success', 'msg' => 'Item Added successfully.']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'OOPs! Some internal issue occured.']);
        }
    }

    public function edit_space_subcategory(Request $request){
    	$id = base64_decode($request->id);
    	// $user_id = $request->id;
        // $data['amenities_type'] = DB::table('amenities_type')->get();
        $data['space_subcategory_info'] = DB::table('space_sub_categories')->where('sub_cat_id',$id)->first();
    	return view('admin/space/subcategory/edit_space_sub_category')->with($data) ;
    }

    public function update_space_subcategory(Request $request)
    {
        $sub_cat_id = $request->sub_cat_id;
    	$res = DB::table('space_sub_categories')->where('sub_cat_id', $sub_cat_id)->update([
                                    'sub_category_name' => $request->space_subcat_name,
                                    'details' => $request->space_subcat_detail,
                                    'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
    	if($res){
            return response()->json(['status' => 'success', 'msg' => 'updated successfully.']);
    	}else{
            return response()->json(['status' => 'error', 'msg' => 'You have not changed any value.']);
    	} 
    }

    public function change_space_subcategory_status(Request $request)
    {
        $subcat_id = $request->subcat_id;
        if(!empty($subcat_id)) { 
            DB::table('space_sub_categories')
            ->where('sub_cat_id', $subcat_id)
            ->update([
                'status' => $request->status
            ]);
        }    

    	// $user = User::find($request->user_id);
    	// $user->status = $request->status;
    	// $user->save();

    	return response()->json(['success'=>'Status change successfully.']);
    }

    public function delete_space_subcategory(Request $request) {
        $subcat_id = $request->subcat_id;
        $res = DB::table('space_sub_categories')->where('sub_cat_id', '=', $subcat_id)->delete();
        if ($res) {
            return json_encode(array('status' => 'success','msg' => 'deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
        }
    }

    // public function clean($string) {
    //     $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
    //     $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     
    //     return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

    //     // $amenities = DB::table('amenities_type')->where('id',$hotelAmenity_type_id)->value('name');
    //     // // dd($amenities);
    //     // // $string = str_replace(' ', '_', $amenities);
    //     // $string = preg_replace('/[^A-Za-z0-9\-]/', '_', $amenities);
     
    //     // // return preg_replace('/-+/', '-', $string);

    //     // dd($string);
    // }


    


    // public function room_list()
    // {
    //     // $data['room_list'] = DB::table('room_list')->orderby('id', 'DESC')->get();
    //     $data['room_list'] = DB::table('room_list')
    // 	->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
    // 	->join('hotels', 'room_list.hotel_id', '=', 'hotels.hotel_id')
    // 	->select('room_list.*',
    //             'room_type_categories.id as room_type_cat_id',
    //             'room_type_categories.title as room_type_cat_title',
    //             'hotels.hotel_name')
    //     ->orderby('id', 'DESC')
    // 	->get();
    //     // dd($data['room_list']);
    //     return view('admin/space/room_list')->with($data);
    // }


    // public function room_type_categories()
    // {
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
    //     return view('admin/space/room_type_categories')->with($data);
    // }

    // public function add_room_test()
    // {

    //     $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();

    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['hotel_services'] = DB::table('H3_Services')->orderby('id', 'ASC')->where('status', 1)->get();
    //     return view('admin/space/add_room_test')->with($data);
    // }

    // public function add_room($hotel_id="")
    // // public function add_room()
    // {
    //     // echo "<pre>";print_r($hotel_id);die;
    //     $data['hotel_id'] = $hotel_id;
    //     $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();


    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['hotel_services'] = DB::table('H3_Services')->orderby('id', 'ASC')->where('status', 1)->get();
    //     return view('admin/space/add_room')->with($data);
    // }


    // public function submit_room(Request $request)
    // {

    //     $roomName = $request->room_name;
    //     $checkRoomName = DB::table('room_list')->where('name', $roomName)->where('hotel_id',$request->hotel_name)->orwhere('hotel_id',$request->hotel_id)->get();
    //     $roomNameExist = count($checkRoomName);
    //     if($roomNameExist == 0){
    //         if(!empty($request->hotel_id)){
    //             $hotel_id = $request->hotel_id;
    //             $hotel_name = $request->hotel_id;
    //         }else{
    //             $hotel_id = 0;
    //             $hotel_name = $request->hotel_name;
    //         }
    //         $adminroom = new Room;
    //         $adminroom->room_types_id = $request->room_type;
    //         $adminroom->hotel_id = $hotel_name;

    //         $adminroom->name = $request->room_name;
    //         $adminroom->max_adults = $request->max_adults;
    //         $adminroom->max_childern = $request->max_childern;
    //         $adminroom->number_of_rooms = $request->number_of_rooms;
    //         $adminroom->description   = $request->description;
    //         $adminroom->notes = $request->notes;
    //         $adminroom->price_per_night = $request->price_per_night;
    //         $adminroom->type_of_price = $request->type_of_price;
    //         $adminroom->tax_percentage = $request->tax_percentage;
    //         $adminroom->price_per_night_7d = $request->price_per_night_7d;
    //         $adminroom->price_per_night_30d = $request->price_per_night_30d;

    //         $adminroom->cleaning_fee = $request->cleaning_fee;
    //         $adminroom->cleaning_fee_type = $request->cleaning_fee_type;
    //         $adminroom->city_fee = $request->city_fee;
    //         $adminroom->city_fee_type = $request->city_fee_type;

    //         $adminroom->earlybird_discount = $request->earlybird_discount;
    //         $adminroom->min_days_in_advance = $request->min_days_in_advance;

    //         $adminroom->is_guest_allow = $request->is_guest_allow;
    //         $adminroom->extra_guest_per_night = $request->extra_guest_per_night;
    //         $adminroom->is_above_guest_cap = $request->is_above_guest_cap;
    //         $adminroom->is_pay_by_num_guest = $request->is_pay_by_num_guest;

    //         $adminroom->room_size = $request->room_size;
    //         $adminroom->bed_type = $request->bed_type;
    //         $adminroom->private_bathroom = $request->private_bathroom;
    //         $adminroom->private_entrance = $request->private_entrance;
    //         $adminroom->optional_services = $request->optional_services;
    //         $adminroom->family_friendly = $request->family_friendly;
    //         $adminroom->outdoor_facilities = $request->outdoor_facilities;
    //         $adminroom->extra_people = $request->extra_people;

    //         // if (!empty($_FILES["imgupload"]["name"][0])) {
    //         //     $roommainimgname = $_FILES["imgupload"]["name"][0];
    //         //     $hotelmainimgurl = time() . '_' . $roommainimgname;
    //         //     move_uploaded_file($_FILES["imgupload"]["tmp_name"][0], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][0]);
    //         // }

    //         if($request->hasFile('roomFeaturedImg'))
    //         {
    //             $image_name1 = $request->file('roomFeaturedImg')->getClientOriginalName();
    //             $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
    //             $image_ext1 = $request->file('roomFeaturedImg')->getClientOriginalExtension();
    //             $roomFeaturedImg = $filename1.'-'.'roomMainImg'.'-'.time().'.'.$image_ext1;
    //             $path1 = base_path() . '/public/uploads/room_images';
    //             $request->file('roomFeaturedImg')->move($path1,$roomFeaturedImg);
    //         }else{
    //             $roomFeaturedImg = 'default_room_img.jpg';
    //         }

    //         $adminroom->image = $roomFeaturedImg;

    //         $adminroom->status = 1;
    //         $adminroom->created_at = date('Y-m-d H:i:s');
    //         $adminroom->save();
    //         $room_id = $adminroom->id;
    //         if (!empty($_FILES["imgupload"]["name"])) {
    //             foreach ($_FILES["imgupload"]["name"] as $key => $error) {
    //                 $imgname = $_FILES["imgupload"]["name"][$key];
    //                 $imgurl = "public/uploads/room_images/" . time() . '_' . $imgname;
    //                 $name = $_FILES["imgupload"]["name"];
    //                 move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);

    //                 $Img = array(
    //                     'image' => time() . '_' . $imgname,
    //                     'room_id' => $room_id,
    //                     'is_featured' => 0,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_gallery')->insert($Img);
    //             }
    //         }

    //         if (!empty($request->amenity)) {
    //             foreach ($request->amenity as $amenity_id) {
    //                 $ameni = array(
    //                     'room_id' => $room_id,
    //                     'amenity_id' => $amenity_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_amenities')->insert($ameni);
    //             }
    //         }

    //         if (!empty($request->services)) {
    //             foreach ($request->services as $service_id) {
    //                 $serv = array(
    //                     'room_id' => $room_id,
    //                     'room_service_id' => $service_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_services')->insert($serv);
    //             }
    //         }

    //         if (!empty($request->other_features_id)) {
    //             foreach ($request->other_features_id as $features_id) {
    //                 $serv = array(
    //                     'room_id' => $room_id,
    //                     'feature_id' => $features_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_features')->insert($serv);
    //             }
    //         }

    //         // add multiple option
    //         // if (!empty($request->extra)) {
    //         if (!empty($request->extra[0]['name'])) {
    //             foreach ($request->extra as $extra_option) {
    //                 // echo "<pre>";print_r($extra_option['name']);
    //                 $extra_opt = array(
    //                     'ext_opt_name' => $extra_option['name'],
    //                     'ext_opt_price' => $extra_option['price'],
    //                     'ext_opt_type' => $extra_option['type'],
    //                     'room_id' => $room_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_extra_option')->insert($extra_opt);
    //             }
    //         }
    //         return response()->json(['status' => 'success', 'msg' => 'Room Added Successfully', 'hotel_id' => $hotel_id]);
    //     }else{
    //         return response()->json(['status' => 'error', 'msg' => 'Room Name Already Exist in Selected Hotel']);
    //     }
    // }

    // public function view_room(Request $request)
    // {
    //     $room_id = base64_decode($request->id);
    //     $data['room_data'] = DB::table('room_list')
    //         ->join('hotels', 'room_list.hotel_id', '=', 'hotels.hotel_id')
    //         ->join('room_type_categories', 'room_list.room_types_id', '=', 'room_type_categories.id')
    //         ->select('room_list.*', 'hotels.hotel_name', 'room_type_categories.title as room_type')
    //         ->where('room_list.id', '=', $room_id)->first();
    //     $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
    //     $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
    //     $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
    //     $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
    //     //echo "<pre>";print_r($data);die;
    //     return view('admin/space/view_room')->with($data);
    // }

    // public function edit_room(Request $request)
    // {
    //     $room_id = base64_decode($request->id);
    //     $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
    //     $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
    //     $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
    //     $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
    //     $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
    //     $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
    //     // echo "<pre>"; print_r($data['room_features']);die;
    //     return view('admin/space/edit_room')->with($data);
    // }

    // public function update_room(Request $request)
    // {
    //     $roomName = $request->room_name;
    //     $checkRoomName = DB::table('room_list')->where('name', $roomName)->where('hotel_id',$request->hotel_name)->where('id','!=',$request->room_id)->get();
    //     $roomNameExist = count($checkRoomName);
    //     // echo "<pre>";print_r($roomNameExist);die;
    //     if($roomNameExist == 0){

    //         $room_id = $request->room_id;
    //         if($request->is_guest_allow==1){
    //             $extra_guest_per_night = $request->extra_guest_per_night;
    //             $is_above_guest_cap = $request->is_above_guest_cap;
    //             $is_pay_by_num_guest = $request->is_pay_by_num_guest;
    //         }else{
    //             $extra_guest_per_night = 0;
    //             $is_above_guest_cap = 0;
    //             $is_pay_by_num_guest = 0;
    //         }
    //         // echo "<pre>";print_r($request->old_room_image);die;
    //         if($request->hasFile('roomFeaturedImg'))
    //         {
    //             if(!empty($request->old_room_image))
    //             {
    //                 $filePath = public_path('uploads/room_images/'. $request->old_room_image);
    //                 if(file_exists($filePath)){
    //                     $oldImagePath = './public/uploads/room_images/'. $request->old_room_image;
    //                     unlink($oldImagePath);
    //                 }
    //             }
    //             $image_name1 = $request->file('roomFeaturedImg')->getClientOriginalName();
    //             $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
    //             $image_ext1 = $request->file('roomFeaturedImg')->getClientOriginalExtension();
    //             $roomFeaturedImg = $filename1.'-'.'roomMainImg'.'-'.time().'.'.$image_ext1;
    //             $path1 = base_path() . '/public/uploads/room_images';
    //             $request->file('roomFeaturedImg')->move($path1,$roomFeaturedImg);
    //         }else{
    //             $roomFeaturedImg = $request->old_room_image;
    //         }

    //         $room_data = array(
    //             'hotel_id' => $request->hotel_name,
    //             'room_types_id' => $request->room_type,
    //             'name' => $request->room_name,
    //             'image' => $roomFeaturedImg,
    //             'max_adults' => $request->max_adults,
    //             'max_childern' => $request->max_childern,
    //             'number_of_rooms' => $request->number_of_rooms,
    //             'description' => $request->description,
    //             'notes' => $request->notes,
    //             'price_per_night' => $request->price_per_night,
    //             'type_of_price' => $request->type_of_price,
    //             'tax_percentage' => $request->tax_percentage,
    //             'price_per_night_7d' => $request->price_per_night_7d,
    //             'price_per_night_30d' => $request->price_per_night_30d,
    //             'cleaning_fee' => $request->cleaning_fee,
    //             'cleaning_fee_type' => $request->cleaning_fee_type,
    //             'city_fee' => $request->city_fee,
    //             'city_fee_type' => $request->city_fee_type,

    //             'earlybird_discount' => $request->earlybird_discount,
    //             'min_days_in_advance' => $request->min_days_in_advance,

    //             'is_guest_allow' => $request->is_guest_allow,
    //             'extra_guest_per_night' => $extra_guest_per_night,
    //             'is_above_guest_cap' => $is_above_guest_cap,
    //             'is_pay_by_num_guest' => $is_pay_by_num_guest,

    //             'room_size' => $request->room_size,
    //             'bed_type' => $request->bed_type,
    //             'private_bathroom' => $request->private_bathroom,
    //             'private_entrance' => $request->private_entrance,
    //             'optional_services' => $request->optional_services,
    //             'family_friendly' => $request->family_friendly,
    //             'outdoor_facilities' => $request->outdoor_facilities,
    //             'extra_people' => $request->extra_people,
    //             'status' => 1,
    //         );

    //         $roomData = DB::table('room_list')->where('id', $room_id)->update($room_data);

    //         if (!empty($_FILES["imgupload"]["name"])) {
    //             foreach ($_FILES["imgupload"]["name"] as $key => $error) {
    //                 $imgname = $_FILES["imgupload"]["name"][$key];
    //                 $imgurl = "public/uploads/room_images/" . time() . '_' . $imgname;
    //                 $name = $_FILES["imgupload"]["name"];
    //                 move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);

    //                 $Img = array(
    //                     'image' => time() . '_' . $imgname,
    //                     'room_id' => $room_id,
    //                     'is_featured' => 0,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_gallery')->insert($Img);
    //             }
    //         }

    //         if (!empty($request->amenity)) {
    //             $delPastAmenities = DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
    //             foreach ($request->amenity as $amenity_id) {
    //                 $ameni = array(
    //                     'room_id' => $room_id,
    //                     'amenity_id' => $amenity_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_amenities')->insert($ameni);
    //             }
    //         }

    //         if (!empty($request->services)) {
    //             DB::table('room_services')->where('room_id', '=', $room_id)->delete();
    //             foreach ($request->services as $service_id) {
    //                 $service = array(
    //                     'room_id' => $room_id,
    //                     'room_service_id' => $service_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_services')->insert($service);
    //             }
    //         }

    //         if (!empty($request->other_features_id)) {
    //             DB::table('room_features')->where('room_id', '=', $room_id)->delete();
    //             foreach ($request->other_features_id as $features_id) {
    //                 $service = array(
    //                     'room_id' => $room_id,
    //                     'feature_id' => $features_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_features')->insert($service);
    //             }
    //         }

    //         if (!empty($request->extra[0]['name'])) {

    //             DB::table('room_extra_option')->where('room_id', '=', $room_id)->delete();

    //             // echo "<pre>";print_r($request->extra);die;
    //             foreach ($request->extra as $extra_option) {
    //                 // echo "<pre>";print_r($extra_option['name']);
    //                 $extra_opt = array(
    //                     'ext_opt_name' => $extra_option['name'],
    //                     'ext_opt_price' => $extra_option['price'],
    //                     'ext_opt_type' => $extra_option['type'],
    //                     'room_id' => $room_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );

    //                 //echo "<pre>";print_r($extra_opt);die;
    //                 $up = DB::table('room_extra_option')->insert($extra_opt);
    //             }
    //         }

    //         return response()->json(['status' => 'success', 'msg' => 'Room update Successfully']);
    //     }else{
    //         return response()->json(['status' => 'error', 'msg' => 'Room Name Already Exist in Selected Hotel']);
    //     }    
    // }

    // public function edit_hotel_room(Request $request)
    // {
    //     $room_id = base64_decode($request->id);
    //     $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
    //     $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
    //     $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
    //     $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
    //     $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
    //     $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
    //     // echo "<pre>"; print_r($data['room_features']);die;
    //     return view('admin/space/edit_hotel_room')->with($data);
    // }

    // public function update_hotel_room(Request $request)
    // {
    //     $roomName = $request->room_name;
    //     $checkRoomName = DB::table('room_list')->where('name', $roomName)->where('hotel_id',$request->hotel_name)->where('id','!=',$request->room_id)->get();
    //     $roomNameExist = count($checkRoomName);
    //     // echo "<pre>";print_r($roomNameExist);die;
    //     // echo "<pre>";print_r($request->all);die;
    //     if($roomNameExist == 0){
    //         // $hotel_id = base64_encode($request->hotel_name);
    //         $hotel_id = $request->hotel_name;
    //         $room_id = $request->room_id;
    //         if($request->is_guest_allow==1){
    //             $extra_guest_per_night = $request->extra_guest_per_nighth;
    //             $is_above_guest_cap = $request->is_above_guest_cap;
    //             $is_pay_by_num_guest = $request->is_pay_by_num_guest;
    //         }else{
    //             $extra_guest_per_night = 0;
    //             $is_above_guest_cap = 0;
    //             $is_pay_by_num_guest = 0;
    //         }

    //         if($request->hasFile('roomFeaturedImg'))
    //         {
    //             if(!empty($request->old_room_image))
    //             {
    //                 $filePath = public_path('uploads/room_images/'. $request->old_room_image);
    //                 if(file_exists($filePath)){
    //                     $oldImagePath = './public/uploads/room_images/' . $request->old_room_image;
    //                     unlink($oldImagePath);
    //                 }
    //             }
    //             $image_name1 = $request->file('roomFeaturedImg')->getClientOriginalName();
    //             $filename1 = pathinfo($image_name1,PATHINFO_FILENAME);
    //             $image_ext1 = $request->file('roomFeaturedImg')->getClientOriginalExtension();
    //             $roomFeaturedImg = $filename1.'-'.'roomMainImg'.'-'.time().'.'.$image_ext1;
    //             $path1 = base_path() . '/public/uploads/room_images';
    //             $request->file('roomFeaturedImg')->move($path1,$roomFeaturedImg);
    //         }else{
    //             $roomFeaturedImg = $request->old_room_image;
    //         }
    //         $room_data = array(
    //             'room_types_id' => $request->room_typeh,
    //             // 'hotel_id' => $request->hotel_name,
    //             'image' => $roomFeaturedImg,
    //             'name' => $request->room_nameh,
    //             'max_adults' => $request->max_adultsh,
    //             'max_childern' => $request->max_childernh,
    //             'number_of_rooms' => $request->number_of_roomsh,
    //             'description' => $request->descriptionh,
    //             'notes' => $request->notesh,
    //             'price_per_night' => $request->price_per_nighth,
    //             'type_of_price' => $request->type_of_priceh,
    //             'tax_percentage' => $request->tax_percentage,
    //             'price_per_night_7d' => $request->price_per_night_7dh,
    //             'price_per_night_30d' => $request->price_per_night_30dh,
    //             'cleaning_fee' => $request->cleaning_fee,
    //             'cleaning_fee_type' => $request->cleaning_fee_type,
    //             'city_fee' => $request->city_fee,
    //             'city_fee_type' => $request->city_fee_type,

    //             'earlybird_discount' => $request->earlybird_discount,
    //             'min_days_in_advance' => $request->min_days_in_advance,

    //             'is_guest_allow' => $request->is_guest_allow,
    //             'extra_guest_per_night' => $extra_guest_per_night,
    //             'is_above_guest_cap' => $is_above_guest_cap,
    //             'is_pay_by_num_guest' => $is_pay_by_num_guest,

    //             'room_size' => $request->room_sizeh,
    //             'bed_type' => $request->bed_typeh,
    //             'private_bathroom' => $request->private_bathroomh,
    //             'private_entrance' => $request->private_entranceh,
    //             'optional_services' => $request->optional_services,
    //             'family_friendly' => $request->family_friendlyh,
    //             'outdoor_facilities' => $request->outdoor_facilities,
    //             'extra_people' => $request->extra_peopleh,
    //             'status' => 1,
    //         );

    //         $roomData = DB::table('room_list')->where('id', $room_id)->update($room_data);

    //         if (!empty($_FILES["imgupload"]["name"])) {
    //             foreach ($_FILES["imgupload"]["name"] as $key => $error) {
    //                 $imgname = $_FILES["imgupload"]["name"][$key];
    //                 $imgurl = "public/uploads/room_images/" . time() . '_' . $imgname;
    //                 $name = $_FILES["imgupload"]["name"];
    //                 move_uploaded_file($_FILES["imgupload"]["tmp_name"][$key], "public/uploads/room_images/" . time() . '_' . $_FILES['imgupload']['name'][$key]);

    //                 $Img = array(
    //                     'image' => time() . '_' . $imgname,
    //                     'room_id' => $room_id,
    //                     'is_featured' => 0,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_gallery')->insert($Img);
    //             }
    //         }

    //         if (!empty($request->amenity)) {
    //             $delPastAmenities = DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
    //             foreach ($request->amenity as $amenity_id) {
    //                 $ameni = array(
    //                     'room_id' => $room_id,
    //                     'amenity_id' => $amenity_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_amenities')->insert($ameni);
    //             }
    //         }


    //         if (!empty($request->services)) {
    //             DB::table('room_services')->where('room_id', '=', $room_id)->delete();
    //             foreach ($request->services as $service_id) {
    //                 $service = array(
    //                     'room_id' => $room_id,
    //                     'room_service_id' => $service_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_services')->insert($service);
    //             }
    //         }

    //         if (!empty($request->other_features_id)) {
    //             DB::table('room_features')->where('room_id', '=', $room_id)->delete();
    //             foreach ($request->other_features_id as $features_id) {
    //                 $service = array(
    //                     'room_id' => $room_id,
    //                     'feature_id' => $features_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $up = DB::table('room_features')->insert($service);
    //             }
    //         }

    //         if (!empty($request->extra[0]['name'])) {

    //             DB::table('room_extra_option')->where('room_id', '=', $room_id)->delete();

    //             // echo "<pre>";print_r($request->extra);die;
    //             foreach ($request->extra as $extra_option) {
    //                 // echo "<pre>";print_r($extra_option['name']);
    //                 $extra_opt = array(
    //                     'ext_opt_name' => $extra_option['name'],
    //                     'ext_opt_price' => $extra_option['price'],
    //                     'ext_opt_type' => $extra_option['type'],
    //                     'room_id' => $room_id,
    //                     'status' => 1,
    //                     'created_at' => date('Y-m-d H:i:s'),
    //                     'updated_at' => date('Y-m-d H:i:s')
    //                 );

    //                 //echo "<pre>";print_r($extra_opt);die;
    //                 $up = DB::table('room_extra_option')->insert($extra_opt);
    //             }
    //         }

    //         return response()->json(['status' => 'success', 'msg' => 'Room update Successfully', 'hotel_id' => $hotel_id]);
    //     }else{
    //         return response()->json(['status' => 'error', 'msg' => 'Room Name Already Exist in Selected Hotel']);
    //     }     
    // }

    // public function change_room_status(Request $request)
    // {
    //     $id = $request->id;

    //     if (!empty($id)) {
    //         DB::table('room_list')->where('id', $id)->update([
    //             'status' => $request->status
    //         ]);
    //     }
    //     return response()->json(['success' => 'status change successfully.']);
    // }

    // public function delete_room(Request $request)
    // {
    //     $room_id = $request->id;
    //     $getRoomGallery = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();
    //     // echo "<pre>";print_r($getRoomGallery);die;
    //     if(!empty($getRoomGallery))
    //     {
    //         foreach($getRoomGallery as $roomGallery){
    //             // echo "<pre>";print_r($roomGallery);
    //             $filePath = public_path('uploads/room_images/'. $roomGallery->image);
    //             if(file_exists($filePath)){
    //                 $oldImagePath = './public/uploads/room_images/' . $roomGallery->image;
    //                 unlink($oldImagePath);
    //             }
    //         }
    //     }
    //     // die;
    //     $roomGalleryDelete = DB::table('room_gallery')->where('room_id', '=', $room_id)->delete();

    //     DB::table('room_amenities')->where('room_id', '=', $room_id)->delete();
    //     DB::table('room_extra_option')->where('room_id', '=', $room_id)->delete();
    //     DB::table('room_features')->where('room_id', '=', $room_id)->delete();
    //     DB::table('room_services')->where('room_id', '=', $room_id)->delete();

    //     $res = DB::table('room_list')->where('id', '=', $room_id)->delete();

    //     if ($res) {
    //         return json_encode(array('status' => 'success', 'msg' => 'Room has been deleted successfully!'));
    //     } else {
    //         return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
    //     }
    // }


    // public function delete_hotel(Request $request)
    // {
    //     $hotel_id = $request->hotel_id;
    //     // echo "<pre>";print_r($frame_info);die;
    //     $res = DB::table('hotels')->where('hotel_id', '=', $hotel_id)->delete();

    //     if ($res) {
    //         return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
    //     } else {
    //         return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
    //     }
    // }

    // public function change_room_type_status(Request $request)
    // {
    //     $id = $request->id;

    //     if (!empty($id)) {
    //         DB::table('room_type_categories')->where('id', $id)->update([
    //             'status' => $request->status
    //         ]);
    //     }
    //     return response()->json(['success' => 'status change successfully.']);
    // }


    // public function room_name(Request $request)
    // {
    //     $room_type_id = $request->room_type_id;
    //     $data['room_name_list'] = DB::table('room_name_list')->where('room_type_id', $room_type_id)->orderby('created_at', 'ASC')->get();
    //     return response()->json($data);
    // }


    // public function delete_room_single_image(Request $request)
	// {
    //     $imageId = $request->id;
    //     // $hotelID = $request->hotel_id;
    //     $image_data = DB::table('room_gallery')->where('id', $imageId)->first();
	// 	if ($image_data) {
    //         $filePath = public_path('uploads/room_images/'. $image_data->image);
    //             if(file_exists($filePath)){
    //                 $Path = './public/uploads/room_images/' . $image_data->image;
    //                 unlink($Path);
    //             }
	// 		$image_delete = DB::table('room_gallery')->where('id', '=', $imageId)->delete();
	// 		return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
	// 	} else {
	// 		return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
	// 	}
	// }

    // public function add_copy_room(Request $request)
	// {
    //     $room_id = $request->room_id;
    //     if (empty($room_id)) {
    //         return json_encode(array('status' => 'error', 'msg' => 'Please Select Room to Copy.'));
	// 	} else {
    //         $get_room_detail = DB::table('room_list')->where('id', '=', $room_id)->first();
    //         // echo $get_room_detail[0]->id;die;
    //         $get_room_gallery = DB::table('room_gallery')->where('room_id', '=', $get_room_detail->id)->get();
    //         // echo count($get_room_gallery);die;

    //         if (!empty($get_room_detail)) {
    //             // echo "<pre>";print_r($get_room_detail);die;
    //             $getid = DB::table('room_list')->insertGetId(array( 
    //                 'hotel_id'      => $get_room_detail->hotel_id,
    //                 'max_adults'      => $get_room_detail->max_adults,
    //                 'max_childern'     => $get_room_detail->max_childern,
    //                 'number_of_rooms'    => $get_room_detail->number_of_rooms,
    //                 'description' => $get_room_detail->description,
    //                 'notes'    => $get_room_detail->notes,
    //                 'price_per_night'    => $get_room_detail->price_per_night,
    //                 'type_of_price'    => $get_room_detail->type_of_price,
    //                 'tax_percentage'    => $get_room_detail->tax_percentage,
    //                 'price_per_night_7d' => $get_room_detail->price_per_night_7d,
    //                 'price_per_night_30d'    => $get_room_detail->price_per_night_30d,
    //                 'cleaning_fee'    => $get_room_detail->cleaning_fee,
    //                 'cleaning_fee_type'    => $get_room_detail->cleaning_fee_type,
    //                 'city_fee'    => $get_room_detail->city_fee,
    //                 'city_fee_type'    => $get_room_detail->city_fee_type,

    //                 'earlybird_discount'    => $get_room_detail->earlybird_discount,
    //                 'min_days_in_advance'    => $get_room_detail->min_days_in_advance,
    //                 'is_guest_allow'    => $get_room_detail->is_guest_allow,
    //                 'extra_guest_per_night'    => $get_room_detail->extra_guest_per_night,
    //                 'is_above_guest_cap'    => $get_room_detail->is_above_guest_cap,
    //                 'is_pay_by_num_guest'    => $get_room_detail->is_pay_by_num_guest,

    //                 'room_size'    => $get_room_detail->room_size,
    //                 'bed_type'    => $get_room_detail->bed_type,
    //                 'private_bathroom'    => $get_room_detail->private_bathroom,
    //                 'private_entrance'    => $get_room_detail->private_entrance,
    //                 'optional_services'    => $get_room_detail->optional_services,
    //                 'family_friendly'    => $get_room_detail->family_friendly,
    //                 'outdoor_facilities'    => $get_room_detail->outdoor_facilities,
    //                 'extra_people'    => $get_room_detail->extra_people,
    //                 'status' => 0,
    //                 'created_at'    => date('Y-m-d H:i:s'),
    //             ));

    //             // if ($getid) {
    //             //     if(count($get_room_gallery) > 0)
    //             //     {
    //             //         foreach ($get_room_gallery as $key => $room_gallery) {
    //             //             //echo "<pre>";print_r($room_gallery->image);
    //             //             DB::table('room_gallery')->insertGetId(array(
    //             //                 'room_id'      => $getid,
    //             //                 'image'     => $room_gallery->image,
    //             //                 'created_at' => date('Y-m-d H:i:s'),
    //             //                 'updated_at' => date('Y-m-d H:i:s')
    //             //             ));
    //             //         }
    //             //     }
    //             // }
    //             if ($getid) {
    //                 return json_encode(array('status' => 'success', 'msg' => 'Room Copied Sucessfully !', 'new_room_id' => base64_encode($getid)));
    //             }

    //         } else {
    //             return json_encode(array('status' => 'error', 'msg' => 'Something get wrong.'));
    //         }
    //     }
	// }

    // public function edit_copy_room(Request $request)
    // {
    //     $room_id = base64_decode($request->id);
    //     $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
    //     $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
    //     $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
    //     $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
    //     $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
    //     $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
    //     //echo "<pre>"; print_r($data);die;
    //     // echo "<pre>"; print_r($data['room_features']);die;
    //     return view('admin/space/edit_copy_room')->with($data);
    // }

    // public function edit_copy_hotel_room(Request $request)
    // {
    //     $room_id = base64_decode($request->id);
    //     $data['room_data'] = DB::table('room_list')->where('id', '=', $room_id)->first();
    //     $data['hotels'] = DB::table('hotels')->orderby('created_at', 'ASC')->get();
    //     $data['room_type_categories'] = DB::table('room_type_categories')->orderby('created_at', 'ASC')->get();
    //     $data['room_images'] = DB::table('room_gallery')->where('room_id', '=', $room_id)->get();

    //     $data['amenity_type'] = DB::table('amenities_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['service_type'] = DB::table('services_type')->orderby('id', 'ASC')->where('status', 1)->get();
    //     $data['room_amenities'] = DB::table('room_amenities')->where('room_id', $room_id)->pluck('amenity_id')->toArray();
    //     $data['room_services'] = DB::table('room_services')->where('room_id', $room_id)->pluck('room_service_id')->toArray();
    //     $data['room_features'] = DB::table('room_features')->where('room_id', $room_id)->pluck('feature_id')->toArray();
    //     $data['room_extra_option'] = DB::table('room_extra_option')->where('room_id', $room_id)->where('status', 1)->get();
    //     //echo "<pre>"; print_r($data);die;
    //     // echo "<pre>"; print_r($data['room_features']);die;
    //     return view('admin/space/edit_copy_hotel_room')->with($data);
    // }
}
