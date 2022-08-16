<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Hotel;
use App\Models\Space;
use DB;
use Session;

class EventController extends Controller
{
	public function events_list(Request $request)
	{   
        $data['page_heading_name'] = 'Events List';
        $vendor_id = Auth::id();
		$data['eventList'] = Events::where('vendor_id',$vendor_id)->where('status',1)->orderby('created_at', 'DESC')->get(); 

		return view('vendor/event/event_list')->with($data);
	}

	public function addEvent(Request $request)
	{   
        $data['page_heading_name'] = 'Add Event';
        $vendor_id = Auth::id();
        $data['hotelList'] = Hotel::where('hotel_status',1)->orderby('created_at', 'DESC')->get();
        $data['spaceList'] = Space::where('status',1)->orderby('created_at', 'DESC')->get();
		return view('vendor/event/addevent')->with($data);
	}

	public function submitEvent(Request $request)
	{   
        $vendor_id = Auth::id();

        if (!empty($_FILES["event_img"]["name"])) {
            $imgname = $_FILES["event_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["event_img"]["name"];
            move_uploaded_file($_FILES["event_img"]["tmp_name"], "public/uploads/event_gallery/". $_FILES['event_img']['name']);
        }else{ $imgname = '';}

        $adminevent = new Events; 
        $adminevent->vendor_id = $vendor_id;
        $adminevent->title = $request->title;
        $adminevent->description = $request->description;
        $adminevent->image  = $imgname;
        $adminevent->start_date = date('Y-m-d', strtotime($request->start_date));
        $adminevent->start_time = date("H:i:s",strtotime($request->start_time));
        $adminevent->end_date =   date('Y-m-d', strtotime($request->end_date));
        $adminevent->end_time =   date("H:i:s",strtotime($request->end_time));
        $adminevent->address  =    $request->address;
        $adminevent->status   =    1;
        $adminevent->save();  
        $adminevent_id = $adminevent->id;
       
        return response()->json(['status' => 'success', 'msg' => 'Event Added Successfully']);
	}

	public function change_event_status(Request $request)
    {   
        $data['page_heading_name'] = 'Events List';
        $vendor_id = Auth::id();

        $event_id = $request->event_id;

        if (!empty($event_id)) {
            DB::table('events')
                ->where('id', $event_id)
                ->update([
                    'status' => $request->status
                ]);
        }
        return response()->json(['success' => 'status change successfully.']);
    }

    public function edit_event($id)
    {   
        $data['page_heading_name'] = 'Events List';
        $vendor_id = Auth::id();
    	$id = base64_decode($id);
        $data['hotelList'] = Hotel::where('hotel_status',1)->orderby('created_at', 'DESC')->get();
        $data['spaceList'] = Space::where('status',1)->orderby('created_at', 'DESC')->get();
    	$data['event'] = Events::where('id',$id)->orderby('created_at', 'DESC')->first();
		return view('vendor/event/editevent')->with($data);
    }

    public function updateEvent(Request $request)
    {
    	if (!empty($_FILES["event_img"]["name"])) {
            $imgname = $_FILES["event_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["event_img"]["name"];
            move_uploaded_file($_FILES["event_img"]["tmp_name"], "public/uploads/event_gallery/". $_FILES['event_img']['name']);
        }else{ $imgname = $request->old_event_image;}
       
       	Events::where('id', $request->event_id)
       ->update([
           'title' => $request->title,
           'description' => $request->description,
           'image' => $imgname,
           'start_date' =>date('Y-m-d', strtotime($request->start_date)),
           'start_time' =>date("H:i:s",strtotime($request->start_time)),
           'end_date'  =>date('Y-m-d', strtotime($request->end_date)),
           'end_time' => date("H:i:s",strtotime($request->end_time)),
           'address' => $request->address
        ]);

        return response()->json(['status' => 'success', 'msg' => 'Event Updated Successfully']);
    }

    public function view_event($id)
    {
    	$id = base64_decode($id);
        $data['hotelList'] = Hotel::where('hotel_status',1)->orderby('created_at', 'DESC')->get();
        $data['spaceList'] = Space::where('status',1)->orderby('created_at', 'DESC')->get();
    	$data['event'] = Events::where('id',$id)->orderby('created_at', 'DESC')->first();
        $data['page_heading_name'] = 'View Event';
    	//echo "<pre>";print_r($data);die;
		return view('vendor/event/viewevent')->with($data);
    }

    public function delete_event(Request $request)
    {
    	$eventId = $request->id;
        $event_data = Events::where('id', $eventId)->first();
		if ($event_data) {
			$event_delete = Events::where('id', '=', $eventId)->delete();
			return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
		}
    }
}