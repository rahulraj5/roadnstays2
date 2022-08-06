<?php

namespace App\Http\Controllers\Admin;

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
		$data['eventList'] = Events::where('status',1)->orderby('created_at', 'DESC')->get();

		return view('admin/event/event_list')->with($data);
	}

	public function addEvent(Request $request)
	{    
        
        $data['hotelList'] = Hotel::where('hotel_status',1)->orderby('created_at', 'DESC')->get();

        $data['spaceList'] = Space::where('status',1)->orderby('created_at', 'DESC')->get();
		return view('admin/event/addevent')->with($data);
	}

	public function submitEvent(Request $request)
	{  
        if (!empty($_FILES["event_img"]["name"])) {
            $imgname = $_FILES["event_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["event_img"]["name"];
            move_uploaded_file($_FILES["event_img"]["tmp_name"], "public/uploads/event_gallery/" . time() . '_' . $_FILES['event_img']['name']);
        }else{ $imgname = '';}
        
        $adminevent = new Events; 
        $adminevent->title = $request->title;
        $adminevent->description = $request->description;
        $adminevent->image  = $imgname;
        $adminevent->start_date= date('Y-m-d', strtotime($request->start_date));
        $adminevent->start_time= date("H:i:s",strtotime($request->start_time));
        $adminevent->end_date  =   date('Y-m-d', strtotime($request->end_date));
        $adminevent->end_time  =   date("H:i:s",strtotime($request->end_time));
        $adminevent->address   =    $request->address;
        $adminevent->latitude  =  $request->latitude;
        $adminevent->longitude = $request->longitude;
        $adminevent->hotel_ids = json_encode($request->hotelname);
        $adminevent->space_ids = json_encode($request->spacename);
        $adminevent->status    =    1;
        $adminevent->save();  
        $adminevent_id = $adminevent->id;
       
        return response()->json(['status' => 'success', 'msg' => 'Event Added Successfully']);
	}

	public function change_event_status(Request $request)
    {
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
    	$id = base64_decode($id);
    	$data['event'] = Events::where('id',$id)->orderby('created_at', 'DESC')->first();
		return view('admin/event/editevent')->with($data);
    }

    public function updateEvent(Request $request)
    {
    	if (!empty($_FILES["event_img"]["name"])) {
            $imgname = $_FILES["event_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["event_img"]["name"];
            move_uploaded_file($_FILES["event_img"]["tmp_name"], "public/uploads/event_gallery/" . time() . '_' . $_FILES['event_img']['name']);
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
    	$data['event'] = Events::where('id',$id)->orderby('created_at', 'DESC')->first();
    	//echo "<pre>";print_r($data);die;
		return view('admin/event/viewevent')->with($data);
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