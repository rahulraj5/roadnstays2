<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0069)http://votivelaravel.in/designer/FrameIt/HTML/order_status_email.html -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Email Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{url('/').'/resources/views/emails/invoice/css'}}" rel="stylesheet">

    <style type="text/css">
        @media(min-width:320px) and (max-width: 767px) {
            img.logo_im {
                width: auto;
                max-width: 100%;
            }

            .bill_add span {
                width: 100% !important;
            }

            .bill_add {
                width: 92% !important;
            }

            span.fir_str {
                padding-top: 7px;
                border-top: 1px solid #e0e0e0;
                margin-top: 12px;
            }

            span.Date_s {
                width: 100% !important;
                float: left;
                line-height: 25px;
            }

            span.Date_s_on {
                width: 100% !important;
                float: left;
            }

            body.main_b_s {
                margin: 10px auto !important;
            }

            .main_h_s {
                padding: 0 0px !important;
                max-width: 900px !important;
                margin: 0 auto !important;
            }

            .main_h_ss {
                width: 90% !important;
            }

        }
    </style>
</head>

<body class="main_b_s" style="font-family:Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; overflow-x: hidden; ">
    <div class="main_h_s" style="padding: 0 10px;max-width: 800px;margin: 0 auto;">


        <div class="main_h_ss" style="max-width:800px;width:100%; background:#fff; padding:15px; background:rgba(243, 243, 243, 0.72);">
            <div style="padding:17px 15px 15px;border:1px solid #fff;background:rgba(243, 243, 243, 0.72);">
                <div style="display: flex;  border-bottom:1px solid #8a8a8a94; justify-content:space-between;">
                    <div style="float:left; width: 30%;"><img src="{{url('resources/assets/img/road-logo.png')}}" class="logo_im" width="50px;"></div>

                    <div style="width:65%; float:right;" class="book-id">
                        <p style="text-align:right; font-size: 18px; font-family:Arial,Helvetica,sans-serif;">Booking-ID: <strong style="font-weight:900;">#{{$order_info->space_booking_id}}</strong></p>
                        <p style="font-family:Arial,Helvetica,sans-serif; text-align:right;">Booked On: {{$order_info->booking_date}} IST</p>
                    </div>

                </div>
                <!-- <div style="font-family:Arial,Helvetica,sans-serif; margin:15px auto 15px;padding:10px;display:block;overflow:hidden; text-align: left; color: #fff;">
                    
                </div> -->

                <div style=" display:block; overflow:hidden">
                    <h2 style="font-family:Arial,Helvetica,sans-serif; margin-top:20px; font-size: 28px; color: #000; font-weight: 900; margin-bottom: 15px; line-height: 45px">Booking Confirmed </h2>
                    <p style="font-family:Arial,Helvetica,sans-serif;  margin:0 0 10px 0;  text-align: left; font-size: 16px; font-weight: 700; line-height: 24px;">Dear {{$order_info->first_name}} {{$order_info->last_name}}, <br>
                        Thank you for Choosing Roadnstays</p>
                    <p style="text-align: left; font-family:Arial,Helvetica,sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate maiores voluptates pariatur architecto!</p>
                </div>
                <!--  <div style="text-align: center;">
                    <a href="#" style="text-decoration:none; color:#000; padding-bottom:2px; display:inline-block; text-align: center;">Visit site : - Pix2arts</a>
                </div> -->
            </div>

            <div style="width: 100%; padding:17px 20px 20px;margin-bottom: 10px;margin-top: 14px;font-size: 20px;">
                <div style="">
                    <img src="{{url('public/uploads/space_images/')}}/{{$order_info->image}}" alt="" width="220px" height="180px" style="border-radius:10px;">
                </div>
                <div style="">
                    <td style="padding:5px" width="100%" align="left">

                        <p style="color:#129212;font-size:18px;line-height:20px;margin-top:0;margin-bottom:5px;font-weight:normal; font-family:Arial,Helvetica,sans-serif;"><a style="text-decoration: none;" href="#">{{$order_info->space_name}}</a>
                        </p>
                        <p style="font-family:Arial,Helvetica,sans-serif; font-size:14px;margin-top:7px;margin-bottom:0;margin-left:0;margin-right:0;line-height:20px">{{$order_info->space_address}}, {{$order_info->city}}</p>

                        <p style="font-family:Arial,Helvetica,sans-serif; font-size:14px;margin-top:7px;margin-bottom:0;margin-left:0;margin-right:0">Getting there: <a style="text-decoration: none;" href="https://maps.google.com?daddr={{$order_info->space_latitude}},{{$order_info->space_longitude}}" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://maps.google.com?daddr%3D{{$order_info->space_longitude}},{{$order_info->space_longitude}}&amp;source=gmail&amp;ust=1657607876278000&amp;usg=AOvVaw35ZtF9WonT9gFP-ixRdIqi">Show directions</a></p>
                    </td>
                </div>
            </div>


            <div style="display:flex; align-items: center; padding:17px 20px 20px;"><span style=" width: 100%;display: inline-block;vertical-align: top;padding:0px 0px 0px 10px;margin: 0px 0 7px;"><a style="text-decoration: none;" href="#"><strong>Manage Booking</a></strong></span></div>

            <div class="bill_add" style=" width: 100%;display: block;border-top: 1px solid #9999994d;padding:10px 20px 10px 20px;">

                <span class="" style="width: 95%; display: inline-block; vertical-align: top; padding-bottom: 0px; color: #6f6f6f;">
                    <p style="padding-bottom:0px; margin: 0; ">Guest Name:</p> <br>
                    <strong style="font-weight: 600;color: #000; font-size: 20px; padding-top: 0px;"><i style="padding-right:10px;" class='bx bxs-user'></i>{{$order_info->first_name}} {{$order_info->last_name}}</strong>
                </span>
                <!-- <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;"></span>
                    <span class="fir_str" style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 600;color: #000;">Payment Method:</strong></span>
                    <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;">Credit Card</span> -->
            </div>

            <!-- <div class="bill_add" style="width: 97%;display: block;border-top: 1px solid #9999994d;padding: 13px 10px;border-left: 1px solid #9999994d;border-right: 1px solid #9999994d;">
                    <span class="" style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 600;color: #000;">User Name:</strong></span> 
                    <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;"></span>
                    <span class="fir_str" style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 600;color: #000;">Address:</strong></span>
                    <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;">{{!empty($user_info->address) ? $user_info->address : ''}}</span>
                </div> -->

            <div class="bill_add" style="display: block;border-top: 1px solid #9999994d;padding: 22px 10px; border-bottom: 1px solid #9999994d; margin: 0px 0; padding:17px 20px 20px;">
                <span class="" style="width: 45%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 500;color: #000; font-size: 18px;">Check in:</strong><br>
                    <p style="font-family:Helvetica,arial,sans-serif;font-size:16px;color:#000000;margin:0;padding-top:12px">{{ date("d F, Y", strtotime($order_info->check_in_date)) }}<span style="font-family:Helvetica,arial,sans-serif;font-size:14px;color:#777777"> 12:00 PM</span></p>
                </span>

                <span class="fir_str" style="width: 45%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 500;color: #000; font-size: 18px;">Check-Out:</strong><br>
                    <p style="font-family:Helvetica,arial,sans-serif;font-size:16px;color:#000000;margin:0;padding-top:12px">{{ date("d F, Y", strtotime($order_info->check_out_date)) }}<span style="font-family:Helvetica,arial,sans-serif;font-size:14px;color:#777777"> 12:00 PM</span></p>
                </span>

            </div>

            <!-- <div class="bill_add" style="width: 97%;display: block;border: 1px solid #9999994d;padding: 13px 10px;">
                   <span class="" style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 600;color: #000;">Delivery Type:</strong></span> 
                    <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;">012345</span>
                    <span class="fir_str" style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                    <strong style="font-weight: 600;color: #000;">Delivery Date:</strong></span>
                    <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;">{{!empty($order_info->delivery_date) ? $order_info->delivery_date : ''}}</span>
                </div> -->
            <div class="bill_add" style="display: block; padding: 22px 10px; border-bottom: 1px solid #9999994d; margin: 0px 0; padding:17px 20px 20px;">
                <span class="" style="width: 45%; display: inline-block; vertical-align: top; padding-bottom: 0px; color: #9d9595;">

                    Space Booking Id<br>
                    <p style="font-family:Helvetica,arial,sans-serif;font-size:16px;color:#000000;margin:0;padding-top:12px">{{$order_info->space_booking_id}}</p>
                </span>

                <span class="" style="width: 45%; display: inline-block; vertical-align: top; padding-bottom: 0px; color: #9d9595;">

                    Total Amount<br>
                    <p style="font-family:Helvetica,arial,sans-serif;font-size:16px;color:#000000;margin:0;padding-top:12px">PKR {{$order_info->total_amount}}/-</p>
                </span>

            </div>


            <span style="width: 100%;display: inline-block;vertical-align: top;padding:10px 20px 10px 0px;margin: 25px 0 15px; font-size: 18px; font-weight: 600; ">
                Space Type: {{$order_info->category_name}}</span>

            <!-- <div class="bill_add" style=" width: 97%;display: block;border-top: 1px solid #9999994d;padding: 13px 10px;border-left: 1px solid #9999994d;border-right: 1px solid #9999994d;">

                <span style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                <strong style="font-weight: 600;color: #000;">User Name:</strong></span> 
                <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;"></span>
                <span class="fir_str" style="width: 28%; display: inline-block; vertical-align: top; padding-bottom: 0px;">
                <strong style="font-weight: 600;color: #000;">Contact Number:</strong></span>
                <span style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 0px;font-weight: 100;"></span>
                </div> -->

            <div class="bill_add" style=" display: block; border-top: 1px solid #9999994d;padding:17px 20px 20px; width: 100%;">

                <span style="width: 100%; display: inline-block; vertical-align: top; padding-bottom: 10px; padding-top:10px ">
                    <strong style="font-weight: 600;color: #000; ">Space Details:</strong></span>

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td style=" border-bottom: 1px solid #9999994d; padding:15px 0" width="100%">

                                <table width="170" cellspacing="0" cellpadding="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td style="padding:5px 0" width="170" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%">
                                                                <span style="font-family:Helvetica,arial,sans-serif;font-weight:bold;font-size:15px;display:inline-block;color:#4a4a4a;padding-right:10px ">Number of Guests:</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <table width="370" cellspacing="0" cellpadding="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td style="padding:5px 10px 5px 0" width="370" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span style="font-family:Helvetica,arial,sans-serif;font-size:15px;display:inline-block;color:#4a4a4a;padding-top:2px">Room {{$order_info->room_number}}: Adult - {{$order_info->guest_number}} </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </td>

                        </tr>
                    </tbody>
                </table>

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td style=" border-bottom: 1px solid #9999994d; padding:15px 0" width="100%">

                                <table width="170" cellspacing="0" cellpadding="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td style="padding:5px 0" width="170" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%">
                                                                <span style="font-family:Helvetica,arial,sans-serif;font-weight:bold;font-size:15px;display:inline-block;color:#4a4a4a;padding-right:10px ">
                                                                    Additional Information:</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <table width="370" cellspacing="0" cellpadding="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td style="padding:5px 10px 5px 0" width="370" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span style="font-family:Helvetica,arial,sans-serif;font-size:15px;display:inline-block;color:#4a4a4a;padding-top:2px">
                                                                    Space Policy</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </td>

                        </tr>
                    </tbody>
                </table>

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td style=" border-bottom: 1px solid #9999994d; padding:15px 0" width="100%">

                                <table width="170" cellspacing="0" cellpadding="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td style="padding:5px 0" width="170" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%">
                                                                <span style="font-family:Helvetica,arial,sans-serif;font-weight:bold;font-size:15px;display:inline-block;color:#4a4a4a;padding-right:10px ">

                                                                    Cancellation Policy:</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <table width="65%" cellspacing="0" cellpadding="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td style="padding:5px 10px 5px 0" width="65%" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>


                                                                <p style="font-family:Helvetica,arial,sans-serif;font-size:15px;margin:0;padding-top:3px;padding-bottom:3px;color:#4a4a4a">Booking is Non-Refundable.</p><br>

                                                                <p style="font-family:Helvetica,arial,sans-serif;font-size:15px;margin:0;padding-top:3px;padding-bottom:3px;color:#4a4a4a">Travel Cash used in the booking will be Non-Refundable..</p>

                                                                <p style="font-family:Helvetica,arial,sans-serif;font-size:15px;margin:0;padding-top:3px;padding-bottom:3px;color:#4a4a4a">Any Add On charges arenon-refundable.</p>

                                                                <p style="font-family:Helvetica,arial,sans-serif;font-size:15px;margin:0;padding-top:3px;padding-bottom:3px;color:#4a4a4a">You can not change the check-in or check-out date.</p>


                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </td>

                        </tr>
                        <td style="border-bottom:1px solid #d8d8d8;padding:20px 0px" width="100%">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
                                <tbody>
                                    <tr>
                                        <td style="font-family:Helvetica,arial,sans-serif;font-weight:bold;font-size:15px;color:#5c5c5c" width="100%" valign="top">***NOTE***: Any increase in the price due to taxes will be borne by you and payable at the Space.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>

                        <tr>
                            <td style="padding:20px 0px" width="100%">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td style="padding:20px 0" width="100%">
                                                <p style="font-family:Helvetica,arial,sans-serif;font-weight:bold;font-size:16px;color:#4a4a4a;font-weight:bold;line-height:25px;text-align:left;margin-top:15px;font-weight:bold;margin-bottom:0;display:inline-block;padding:0">Need Help?</p>



                                                <p style="color:#4a4a4a;font-family:Helvetica,arial,sans-serif;font-size:15px;line-height:25px;margin-top:0;padding:0">
                                                    For any questions related to the property, you can contact Space directly at: <a href="#" style="text-decoration:underline!important" target="_blank">+124-3654287</a>


                                                    / <a href="#" style="text-decoration:underline!important" target="_blank">+124-3654287</a>



                                                    or <a href="#" style="text-decoration:underline!important" target="_blank">admin@gmail.com</a>

                                                </p>


                                                <p style="color:#4a4a4a;font-family:Helvetica,arial,sans-serif;font-size:15px;line-height:15px;margin-top:0;padding:0">
                                                    If you would like to change or upgrade your reservation, visit
                                                    <a href="{{url('/')}}" style="text-decoration:underline!important" target="_blank" data-saferedirecturl="#">roadnstays.com</a>
                                                </p>
                                                <p style="color:#4a4a4a;font-family:Helvetica,arial,sans-serif;font-size:15px;line-height:15px;margin-top:0;padding:0">
                                                    <a href="{{url('/')}}" style="text-decoration:underline!important" target="_blank" data-saferedirecturl="#">Click here</a> to see booking policies.
                                                </p>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>


                    </tbody>
                </table>

            </div>

        </div>

    </div>

    </div>


</body>

</html>