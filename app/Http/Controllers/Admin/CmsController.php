<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Cms;
use App\Models\Staticpages;
use App\Models\Aboutbanner;
use App\Models\Aboutcontent;
use App\Models\Chooseus;
use App\Models\Hotel;
use App\Models\Space;
use DB;
use Session;

class CmsController extends Controller{

	public function index(Request $request){
		$data['home_content'] = Cms::orderby('created_at', 'ASC')->get();
		return view("admin/page/home_page")->with($data);		
	}

	public function addBanner(Request $request){
		return view('admin/banner/add_banner');
	}

	public function submitBanner(Request $request)
	{ 
		if (!empty($_FILES["banner_img"]["name"])) {
            $imgname = time() . '_' .$_FILES["banner_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["banner_img"]["name"];
            move_uploaded_file($_FILES["banner_img"]["tmp_name"], "public/uploads/home_banner/".time() . '_' . $_FILES['banner_img']['name']);
        }else{ $imgname = '';}
        $adminbanner = new Cms; 

        $adminbanner->image     =  $imgname;
        $adminbanner->save();  

        return response()->json(['status' => 'success', 'msg' => 'Image Added Successfully']);
	}
	
    public function change_banner_status(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $user = Cms::find($request->banner_id);
        // echo "<pre>";print_r($user);die;
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Banner status change successfully.']);
    }

    public function editBanner(Request $request){
        $id = base64_decode($request->id);
        $data['home_content'] = Cms::where('id',$id)->get();
        return view('admin/page/edit_home_content')->with($data);
    }

    public function updateBanner(Request $request){
        
        if (!empty($_FILES["banner_img"]["name"])) {
            $imgname = $_FILES["banner_img"]["name"];
            
            $file = $request->file('banner_img');
            $destinationPath = "resources/assets/img/";
            $file->move($destinationPath,$file->getClientOriginalName());
        }else{ $imgname = $request->old_images;}

        Cms::where('id', $request->banner_id)
       ->update([
            'images' => $imgname,
            'heading' => $request->heading,
            'subheading' => $request->sub_heading,
       ]);

       return response()->json(['status' => 'success', 'msg' => 'Content Updated Successfully']);

    }

    public function addHeadingSubheading(Request $request){

        return view('admin/heading_subHeading/addHeadingSubheading');        
    }

    public function submitHeadingSubheading(Request $request){
        $heading_subHeading = new HeadingSubheading; 

        $heading_subHeading->heading     =  $request->heading;
        $heading_subHeading->subheading     =  $request->sub_heading;
        $heading_subHeading->save();  

        return response()->json(['status' => 'success', 'msg' => 'Heading Subheading Added Successfully']);
    }

    public function showHeadingSubheading(Request $request){
        $data['HeadingSubheadingList'] = HeadingSubheading::get();
        return view("admin/heading_subHeading/HeadingSubheading")->with($data);
    }

    public function showStaticData(Request $request){
        $data['static_content'] = Staticpages::orderby('created_at', 'ASC')->get();
        return view("admin/page/showStaticData")->with($data);
    }

    public function editStaticData(Request $request){
        $id = base64_decode($request->id);
        $data['static_content'] = Staticpages::where('id',$id)->get();

        return view("admin/page/editStaticData")->with($data);
    }

    public function updateStaticData(Request $request){
        
        if (!empty($_FILES["banner_img"]["name"])) {
            $imgname = $_FILES["banner_img"]["name"];
            
            $file = $request->file('banner_img');
            $destinationPath = "resources/assets/img/";
            $file->move($destinationPath,$file->getClientOriginalName());
        }else{ $imgname = $request->old_images;}
        

        Staticpages::where('id', $request->banner_id)
       ->update([
            'banner' => $imgname,
            'heading' => $request->heading,
            'content' => $request->content2,
       ]);

       return response()->json(['status' => 'success', 'msg' => 'Content Updated Successfully']);
    }

    public function showAboutBanner(Request $request){
        $data['about_banner'] = Aboutbanner::orderby('created_at', 'ASC')->get();
        return view("admin/about_us/about_banner")->with($data);
    }

    public function showAboutContent(Request $request){
        $data['about_content'] = Aboutcontent::orderby('created_at', 'ASC')->get();
        return view("admin/about_us/about_conent")->with($data);
    }

    public function showChooseUs(Request $request){
        $data['chooseus_content'] = Chooseus::orderby('created_at', 'ASC')->get();
        return view("admin/about_us/about_chooseus")->with($data);
    }

    public function editAboutBanner(Request $request){
        $id = base64_decode($request->id);
        $data['banner_images'] = Aboutbanner::where('id',$id)->get();
        return view("admin/about_us/edit_about_banner")->with($data);
    }

    public function updateAboutBanner(Request $request){
        if (!empty($_FILES["banner_img"]["name"])) {
            $imgname = $_FILES["banner_img"]["name"];
            
            $file = $request->file('banner_img');
            $destinationPath = "resources/assets/img/";
            $file->move($destinationPath,$file->getClientOriginalName());
        }else{ $imgname = $request->old_images;}
        

        Aboutbanner::where('id', $request->banner_id)
       ->update([
            'images' => $imgname,
            'heading' => $request->heading,
            'sub_heading' => $request->content1,
       ]);

       return response()->json(['status' => 'success', 'msg' => 'Banner Images Updated Successfully']);
    }

    public function editAboutContent(Request $request){
        $id = base64_decode($request->id);
        $data['about_content'] = Aboutcontent::where('id',$id)->get();

        return view("admin/about_us/edit_about_content")->with($data);
    }

    public function updateAboutContent(Request $request){
        if (!empty($_FILES["banner_img"]["name"])) {
            $imgname = $_FILES["banner_img"]["name"];
            
            $file = $request->file('banner_img');
            $destinationPath = "resources/assets/img/";
            $file->move($destinationPath,$file->getClientOriginalName());
        }else{ $imgname = $request->old_images;}
        

        Aboutcontent::where('id', $request->banner_id)
       ->update([
            'content_image' => $imgname,
            'image_heading' => $request->heading,
            'image_subheading' => $request->content1,
            'content_heading' => $request->content_heading,
            'content_subheading' => $request->content_subheading,
            'about_content' => $request->about_content,
            'button_name' => $request->button_name,
            'button_url' => $request->button_url,
       ]);

       return response()->json(['status' => 'success', 'msg' => 'Content Updated Successfully']);
    }

    public function editChooseUs(Request $request){
        $id = base64_decode($request->id);
        $data['about_chooseus'] = Chooseus::where('id',$id)->get();

        return view("admin/about_us/edit_choose_us")->with($data);
    }

    public function updateChooseUs(Request $request){
        Chooseus::where('id', $request->banner_id)
       ->update([
            'heading' => $request->heading,
            'subheading' => $request->content1,
            
       ]);

       return response()->json(['status' => 'success', 'msg' => 'Content Updated Successfully']);
    }
}