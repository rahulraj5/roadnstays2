<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Space;
use App\Models\Room;
use DB;
use Session;
// use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SpaceController extends Controller
{
    public function space_list()
    { 
        // if (!Schema::hasTable('space')) {
        //     print_r("Code to create table");
        // }
        // $checkTable = Schema::hasTable('space');
        // $checkTable = DB::hasTable('space');
        // print_r($checkTable);die;
        // $data['space_list'] = DB::table('space')->orderby('id', 'DESC')->get();
        $user_id = Auth::user()->id;
        $data['page_heading_name'] = "Space List";
        $data['space_list'] = DB::table('space')
                                ->join('space_categories', 'space.category_id', '=', 'space_categories.scat_id')
                                ->join('space_sub_categories', 'space.sub_category_id', '=', 'space_sub_categories.sub_cat_id')
                                ->select('space.*',
                                        'space_categories.category_name',
                                        'space_sub_categories.sub_category_name')
                                ->where('space_user_id',$user_id)  
                                ->where('copy_status',1)      
                                ->orderby('space.space_id', 'DESC')
                                ->get();
        // dd($data['space_list']);
        return view('vendor/space/space_list')->with($data);
    }

    public function add_space($space_id="")
    {
        // echo "<pre>";print_r($space_id);die;
        $data['page_heading_name'] = "Add Space";
        $data['space_id'] = $space_id;
        $data['space_categories'] = DB::table('space_categories')->where('status',1)->orderby('created_at', 'ASC')->get();
        $data['space_sub_categories'] = DB::table('space_sub_categories')->where('status',1)->orderby('created_at', 'ASC')->get();
        $data['countries'] = DB::table('countries')->orderby('name', 'ASC')->get();
        
        $data['scouts'] = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get();
        $data['other_features'] = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get();
        return view('vendor/space/add_space')->with($data);
    }

    public function submit_space(Request $request)
    {
        $user_id = Auth::user()->id;
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
            
            $adminspace->space_user_id = $user_id;
            $adminspace->is_admin = 0;
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
        $data['page_heading_name'] = "Edit Space";
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
        return view('vendor/space/edit_space')->with($data);
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

            if (!empty($request->custom[0]['label'])) {
                DB::table('space_custom_details')->where('space_id', '=', $space_id)->delete();
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
        return view('vendor/space/view_space')->with($data);
    }

    public function add_copy_space(Request $request)
	{
        $user_id = Auth::user()->id;
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
                    'space_user_id' => $user_id,
                    'is_admin' => 0,
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
}
