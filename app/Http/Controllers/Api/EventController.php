<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\APIBaseController as APIBaseController;

use App\Post;

use Validator,DB;

use App\Models\User;

use App\Models\Hotel;

use App\Models\Events;

use App\Helpers\Helper;

use Illuminate\Support\Facades\URL;
//use Auth;

use Illuminate\Support\Facades\Auth;

use Mail;

class EventController extends APIBaseController
{
    public function events_list(Request $request)
    {
        $eventList = Events::where('status', 1)->orderby('created_at', 'DESC')->get();

        if(count($eventList)>0){
            
            $eventListUpcoming = Events::where('start_date', '>=', date('Y-m-d'))->orderby('id', 'DESC')->get();
            foreach($eventListUpcoming as $event_upcom){
                $event_upcom->image = url('/').'/public/uploads/event_gallery/'.$event_upcom->image;
            }

            $eventListPast = Events::where('start_date', '<=', date('Y-m-d'))->orderby('id', 'DESC')->get();
            foreach($eventListPast as $event_past){
                $event_past->image = url('/').'/public/uploads/event_gallery/'.$event_past->image;
            }

            $response['message'] = "Event List";
            $response['status'] = 1;
            $response['data'] = array('event_list'=>$eventListUpcoming,'event_past_list'=>$eventListPast,'event_url'=> URL::to('').'/public/uploads/event_gallery/');

        }else{

            $response['message'] = "No data found";
            $response['status'] = 0;
            $response['data'] = array('event_list'=>$eventList,'event_url'=> URL::to('').'/public/uploads/event_gallery/');
        }
        
        return $response;
    }

    // public function event_details(Request $request)
    // {   

    //     $validator = Validator::make($request->all(), [

    //         'event_id' => 'required'

    //     ]);

    //     $event_id = $request->event_id;
    //     if ($validator->fails()) {
    //         return $this->sendError($validator->messages()->first(), array(), 200);
    //     } else {
    //         $event_data = DB::table('events')->where('id', $event_id)->first();
    //         $event_gallery = DB::table('event_gallery')->where('event_id', $event_id)->get();

    //         foreach($event_gallery as $gallery){
    //             $gallery->image = url('/').'/public/uploads/event_gallery/'.$gallery->image;
    //         }

    //         if($event_data){
    //             $hotel_ids =  json_decode($event_data->hotel_ids);
    //             $hotel_data = DB::table('hotels')->whereIn('hotel_id', array($hotel_ids))->get();

    //             $space_ids =  json_decode($event_data->space_ids);
    //             $space_data = DB::table('space')->whereIn('space_id', array($space_ids))->get();

    //             $response['message'] = "Event Detail";
    //             $response['status'] = 1;
    //             $response['data'] = array('event_data'=>$event_data,'event_gallery'=>$event_gallery, 'hotel_data'=>$hotel_data,'space_data'=>$space_data,"event_url" => URL::to('')."/public/uploads/event_gallery/");
    //         }else{

    //             $response['message'] = "No data found";
    //             $response['status'] = 0;
    //             $response['data'] = array('event_data'=>0);
    //         }
        
    //         return $response;

    //     }
    // } 

    
    public function event_details(Request $request)
    {   

        $validator = Validator::make($request->all(), [

            'event_id' => 'required'

        ]);

        $event_id = $request->event_id;
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), array(), 200);
        } else {
            $event_data = DB::table('events')->where('id', $event_id)->first();
            $event_data->image = url('/').'/public/uploads/event_gallery/'.$event_data->image;

            $event_gallery = DB::table('event_gallery')->where('event_id', $event_id)->get();
            foreach($event_gallery as $gallery){
                $gallery->image = url('/').'/public/uploads/event_gallery/'.$gallery->image;
            }


            if($event_data){
                $hotel_ids =  json_decode($event_data->hotel_ids);
                $hotel_data = DB::table('hotels')->whereIn('hotel_id', $hotel_ids)->get();
                foreach($hotel_data as $hotel){
                    $hotel->hotel_gallery = url('/').'/public/uploads/hotel_gallery/'.$hotel->hotel_gallery;
                }

                $space_ids =  json_decode($event_data->space_ids);
                $space_data = DB::table('space')->whereIn('space_id', $space_ids)->get();
                foreach($space_data as $space){
                    $space->image = url('/').'/public/uploads/space_images/'.$space->image;
                }

                $response['message'] = "Event Detail";
                $response['status'] = 1;
                $response['data'] = array('event_data'=>$event_data,'event_gallery'=>$event_gallery, 'hotel_data'=>$hotel_data,'space_data'=>$space_data,"event_url" => URL::to('')."/public/uploads/event_gallery/");
            }else{

                $response['message'] = "No data found";
                $response['status'] = 0;
                $response['data'] = array('event_data'=>0);
            }
        
            return $response;

        }
    } 

    public function addEvent(Request $request)
    {

        $data['hotelList'] = Hotel::where('hotel_status', 1)->orderby('created_at', 'DESC')->get(); 
        $data['spaceList'] = Space::where('status', 1)->orderby('created_at', 'DESC')->get();
        return view('admin/event/addevent')->with($data);
    }

    public function submitEvent(Request $request)
    {
        if (!empty($_FILES["event_img"]["name"])) {
            $imgname = time() . '_' . $_FILES["event_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["event_img"]["name"];
            move_uploaded_file($_FILES["event_img"]["tmp_name"], "public/uploads/event_gallery/" . time() . '_' . $_FILES['event_img']['name']);
        } else {
            $imgname = '';
        }
        if ($request->type == 'paid') {
            $event_price = $request->price;
        } else {
            $event_price = 0;
        }
        $adminevent = new Events;
        $adminevent->title = $request->title;
        $adminevent->vendor_id = $request->vendor_id;
        $adminevent->type = $request->type;
        $adminevent->description = $request->description;
        $adminevent->price  =  $event_price;
        $adminevent->ticket_qty =  $request->ticket_qty;
        $adminevent->image     =  $imgname;
        $adminevent->start_date =  date('Y-m-d', strtotime($request->start_date));
        $adminevent->start_time =  date("H:i:s", strtotime($request->start_time));
        $adminevent->end_date  =  date('Y-m-d', strtotime($request->end_date));
        $adminevent->end_time  =  date("H:i:s", strtotime($request->end_time));
        $adminevent->address   =  $request->address;
        $adminevent->latitude  =  $request->latitude;
        $adminevent->longitude =  $request->longitude;

        $adminevent->operator_name = $request->operator_name;
        $adminevent->operator_contact_name = $request->operator_contact_name;
        $adminevent->operator_contact_num = $request->operator_contact_num;
        $adminevent->operator_email = $request->operator_email;
        $adminevent->operator_booking_num = $request->operator_booking_num;

        $adminevent->hotel_ids =  json_encode($request->hotelname);
        $adminevent->space_ids =  json_encode($request->spacename);
        $adminevent->status    =  1;
        $adminevent->save();
        $adminevent_id = $adminevent->id;
        if (!empty($_FILES["eventGallery"]["name"])) {
            foreach ($_FILES["eventGallery"]["name"] as $key => $error) {
                $imgname = $_FILES["eventGallery"]["name"][$key];
                $imgurl = "public/uploads/event_gallery/" . time() . '_' . $imgname;
                $name = $_FILES["eventGallery"]["name"];
                move_uploaded_file($_FILES["eventGallery"]["tmp_name"][$key], "public/uploads/event_gallery/" . time() . '_' . $_FILES['eventGallery']['name'][$key]);

                $Img = array(
                    'image' => time() . '_' . $imgname,
                    'event_id' => $adminevent_id,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $up = DB::table('event_gallery')->insert($Img);
            }
        }

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
        $data['hotelList'] = Hotel::where('hotel_status', 1)->orderby('created_at', 'DESC')->get();
        $data['spaceList'] = Space::where('status', 1)->orderby('created_at', 'DESC')->get();

        $data['event'] = Events::where('id', $id)->orderby('created_at', 'DESC')->first();

        //echo "<pre>";print_r($data['event']);die;
        return view('admin/event/editevent')->with($data);
    }

    public function updateEvent(Request $request)
    {
        if (!empty($_FILES["event_img"]["name"])) {
            $imgname = time() . '_' . $_FILES["event_img"]["name"];
            $imgurl = "public/uploads/hotel_gallery/" . time() . '_' . $imgname;
            $name = $_FILES["event_img"]["name"];
            move_uploaded_file($_FILES["event_img"]["tmp_name"], "public/uploads/event_gallery/" . time() . '_' . $_FILES['event_img']['name']);
        } else {
            $imgname = $request->old_event_image;
        }

        Events::where('id', $request->event_id)
            ->update([
                'title' => $request->title,
                'vendor_id' => $request->vendor_id,
                'type' => $request->type,
                'description' => $request->description,
                'price' => $request->price,
                'ticket_qty' => $request->ticket_qty,
                'image' => $imgname,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'start_time' => date("H:i:s", strtotime($request->start_time)),
                'end_date'  => date('Y-m-d', strtotime($request->end_date)),
                'end_time' => date("H:i:s", strtotime($request->end_time)),
                'latitude' =>  $request->latitude,
                'longitude' => $request->longitude,

                'operator_name' => $request->operator_name,
                'operator_contact_name' => $request->operator_contact_name,
                'operator_contact_num' => $request->operator_contact_num,
                'operator_email' => $request->operator_email,
                'operator_booking_num' => $request->operator_booking_num,

                'hotel_ids' => json_encode($request->hotelname),
                'space_ids' => json_encode($request->spacename),
                'address' => $request->address
            ]);

        $adminevent_id = $request->event_id;
        if (!empty($_FILES["eventGallery"]["name"])) {
            $event_delete = DB::table('event_gallery')->where('event_id', '=', $request->event_id)->delete();
            foreach ($_FILES["eventGallery"]["name"] as $key => $error) {
                $imgname = $_FILES["eventGallery"]["name"][$key];
                $imgurl = "public/uploads/event_gallery/" . time() . '_' . $imgname;
                $name = $_FILES["eventGallery"]["name"];
                move_uploaded_file($_FILES["eventGallery"]["tmp_name"][$key], "public/uploads/event_gallery/" . time() . '_' . $_FILES['eventGallery']['name'][$key]);

                $Img = array(
                    'image' => time() . '_' . $imgname,
                    'event_id' => $request->event_id,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $up = DB::table('event_gallery')->insert($Img);
            }
        }

        return response()->json(['status' => 'success', 'msg' => 'Event Updated Successfully']);
    }

    public function view_event($id)
    {
        $id = base64_decode($id);
        $data['hotelList'] = Hotel::where('hotel_status', 1)->orderby('created_at', 'DESC')->get();

        $data['spaceList'] = Space::where('status', 1)->orderby('created_at', 'DESC')->get();
        $data['event'] = Events::where('id', $id)->orderby('created_at', 'DESC')->first();
        //echo "<pre>";print_r($data);die;
        return view('admin/event/viewevent')->with($data);
    }

    public function event_mile_data(Request $request)
    {

        $distance = $request->mile;
        $hotel_latitude = $request->latitude;
        $hotel_longitude = $request->longitude;
        $data['hotelList'] = DB::select(DB::raw('SELECT hotel_id,hotel_name, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude . ') ) * sin( radians(hotel_latitude) ) ) ) AS distance FROM hotels HAVING distance < ' . $distance . ' ORDER BY distance ASC'));

        $data['spaceList'] = DB::select(DB::raw('SELECT space_id,space_name, ( 3959 * acos( cos( radians(' . $hotel_latitude . ') ) * cos( radians( space_latitude ) ) * cos( radians( space_longitude ) - radians(' . $hotel_longitude . ') ) + sin( radians(' . $hotel_latitude . ') ) * sin( radians(space_latitude) ) ) ) AS distance FROM space HAVING distance < ' . $distance . ' ORDER BY distance ASC'));

        return response()->json($data);
    }

    public function delete_event(Request $request)
    {
        $eventId = $request->id;
        $event_data = Events::where('id', $eventId)->first();
        $image_data = DB::table('event_gallery')->where('event_id', $eventId)->get();
        foreach ($image_data as $key => $value) {
            $filePath = public_path('uploads/event_gallery/' . $value->image);
            if (file_exists($filePath)) {
                $Path = './public/uploads/event_gallery/' . $value->image;
                unlink($Path);
            }
            $image_delete = DB::table('event_gallery')->where('id', '=', $value->id)->delete();
        }
        if ($event_data) {
            $event_delete = Events::where('id', '=', $eventId)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }
 
    public function delete_event_single_image(Request $request)
    {

        $imageId = $request->id;
        // $hotelID = $request->hotel_id;
        $image_data = DB::table('event_gallery')->where('id', $imageId)->first();
        if ($image_data) {
            $filePath = public_path('uploads/event_gallery/' . $image_data->image);
            if (file_exists($filePath)) {
                $Path = './public/uploads/event_gallery/' . $image_data->image;
                unlink($Path);
            }
            $image_delete = DB::table('event_gallery')->where('id', '=', $imageId)->delete();
            return json_encode(array('status' => 'success', 'msg' => 'Item has been deleted successfully!'));
        } else {
            return json_encode(array('status' => 'error', 'msg' => 'Some internal issue occured.'));
        }
    }
}
