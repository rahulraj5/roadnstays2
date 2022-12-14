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
        $data['eventList'] = Events::where('status', 1)->orderby('created_at', 'DESC')->get();

        return view('admin/event/event_list')->with($data);
    }

    public function addEvent(Request $request)
    {

        $data['hotelList'] = Hotel::where('hotel_status', 1)->orderby('created_at', 'DESC')->get();

        $data['spaceList'] = Space::where('status', 1)->orderby('created_at', 'DESC')->get();

        $data['scouts'] = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->where('status',1)->get();

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
        $adminevent->scout_id = $request->scout_id;
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
                'scout_id' => $request->scout_id,
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
            $event_booking = DB::table('event_booking')->where('event_id', '=', $eventId)->delete();
            $event_booking_temp = DB::table('event_booking_temp')->where('event_id', '=', $eventId)->delete();
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

    public function eventbooking_list(){
        

        $data['bookingList'] = DB::table('event_booking')
                                ->join('events', 'events.id', '=', 'event_booking.event_id')
                                ->join('users','events.scout_id', '=', 'users.id')
                                ->select(
                                    'event_booking.id',
                                    'events.title',
                                    'users.first_name as user_first_name',
                                    'users.last_name as user_last_name',
                                    'users.email as user_email',
                                    'users.contact_number as user_contact_num',
                                    'event_booking.payment_type',
                                    'event_booking.payment_status',
                                    'event_booking.booking_status')
                                
                                ->get();
                               
         
        return view("/admin/event/event_booking_list")->with($data);
    }

    public function view_eventbooking($id){
        $booking_id = base64_decode($id);

         $data['bookingList'] = DB::table('event_booking')
                                ->join('users', 'event_booking.user_id', '=', 'users.id')
                                ->join('events', 'event_booking.event_id', '=', 'events.id')
                                ->join('country', 'users.user_country', '=', 'country.id')
                                ->select('event_booking.*',
                                    'users.user_type',
                                    'users.id as user_first_name',
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
                                    'events.title',
                                    
                                    'events.address',
                                    'events.vendor_id as space_vendor_id',
                                    'events.start_date',
                                    'events.end_date',
                                    )
                                // ->orderby('created_at', 'DESC')
                                ->where('event_booking.id',$booking_id)
                                ->first();

        //print_r($data['bookingList']);die;  

        // echo "<pre>";print_r($data['bookingList']);
        $space_vendor_id = $data['bookingList']->space_vendor_id;
        // echo "<pre>";print_r($space_vendor_id);die;
        if($space_vendor_id == 1){
                $data['vendor_details'] = DB::table('admins')->where('id', $space_vendor_id)->first();
        }else{
            $data['vendor_details'] = DB::table('users')
            ->join('country', 'users.user_country', 'country.id')
            ->select('users.*','country.name as vendor_country_name')
            ->where('users.id', $space_vendor_id)->first();
        } 

        // echo "<pre>";print_r($data['vendor_details']);die;

        $data['order_details'] = DB::table('event_booking')
                        ->join('users', 'event_booking.user_id', '=', 'users.id')
                        ->join('events', 'event_booking.event_id', '=', 'events.id')
                        ->join('country', 'users.user_country', '=', 'country.id')
                        ->select('event_booking.*',
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

                            'events.title',
                            'events.vendor_id as space_vendor_id',
                            'events.address',
                            'events.start_date',
                            'events.end_date',
                            'events.price'
                            )
                            // ->orderby('created_at', 'DESC')
                            ->where('event_booking.id',$booking_id)
                            ->get();             



        return view("/admin/event/view_eventbooking")->with($data);                        
    }
}
