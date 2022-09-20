<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Email</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:350,400,600,700,800" rel="stylesheet">
</head>

<body style="font-family: 'open Sans';font-size: 14px; line-height:20px;">
    <div class="wrapper">
        <section class="invoice">
            <div style="padding: 0 10px;max-width: 700px;margin: 0 auto;">
                <div style="max-width:700px;width:100%;padding:1px;margin:0 auto 35px;border:1px solid #126c62;background: #126c62">
                    <div style="background: #fff;padding: 12px;">
                        <h2 style="text-align: center;">{{$hotel_data->hotel_name}}</h2>
                        <div>
                            <h2 style="text-align: center;"><a href="#" style="text-decoration: none; color: #126c62;">Booking
                                    #{{$booking_data->id}}</a> <span style="font-size: 16px; vertical-align: bottom;">({{date('M d, Y', strtotime($booking_data->created_at))}})</span></h2>
                        </div>
                        <div class="" style="padding: 0px;background-image: background-repeat: no-repeat;background-position: center top;background-color: transparent">
                            <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                    <div class="" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                        <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;font-family:arial,helvetica,sans-serif;" align="left">
                                                                <h3 class="v-font-size" style="margin: 0px; color: #126c62;  text-align: left; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 16px; margin-bottom: 8px;">
                                                                    <strong>Hotel Details:</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">

                                                </table>
                                                <table id="u_content_text_6" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;font-family:arial,helvetica,sans-serif;">

                                                                <div style=" text-align: left; word-wrap: break-word; margin-bottom: 20px; line-height: 23px;">
                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">Booking
                                                                            Number: </span> <span style="font-weight: 500; font-size: 15px;">#{{$booking_data->id}}</span>
                                                                    </p>

                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">Duration:
                                                                        </span> <span style="font-weight: 500; font-size: 15px;">{{$booking_data->total_days}} Days </span>
                                                                    </p>

                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">Email:
                                                                        </span> <span style="font-weight: 500; font-size: 15px;">{{$booking_data->operator_email ?? 'info@roadnstays.com'}} </span>
                                                                    </p>

                                                                    <p style="font-size: 14px; padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">Phone:
                                                                        </span> <span style="font-weight: 500; font-size: 15px;">@if(!empty($hotel_data->operator_contact_num)) {{ $hotel_data->operator_contact_num }} @else {{ $hotel_data->property_contact_num }} @endif
                                                                        </span>
                                                                    </p>

                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">Address:
                                                                        </span> <span style="font-weight: 500; font-size: 15px;">{{$hotel_data->hotel_address}} </span>
                                                                    </p>

                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">Start
                                                                            day:</span> <span style="font-weight: 500; font-size: 15px;">
                                                                            {{date('M d, Y', strtotime($booking_data->check_in))}}</span>
                                                                    </p>

                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">
                                                                            End day:</span> <span style="font-weight: 500; font-size: 15px;">
                                                                            {{date('M d, Y', strtotime($booking_data->check_out))}}</span>
                                                                    </p>
                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">
                                                                            Room Name:</span> <span style="font-weight: 500; font-size: 15px;">
                                                                            {{$room_data->name}}</span>
                                                                    </p>
                                                                    <p style="font-size: 14px;padding: 0;margin: 0px;">
                                                                        <span style="font-size: 16px; width: 25%; float: left;  sans-serif;">
                                                                            Room Type:</span> <span style="font-weight: 500; font-size: 15px;">
                                                                            {{$room_type}}</span>
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0; vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ededed;width:100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr style="vertical-align: top">
                                    <td style="word-break: break-word;border-collapse: collapse !important; padding: 20px 4px; vertical-align: top">
                                        <div class="" style="padding: 0px;background-color: transparent">
                                            <div class="u-row no-stack" style="Margin: 0 auto; min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:40px 5px 5px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
                                                                                                <img align="center" border="0" src="{{ url('/resources/assets/img/invoice/barcode.png')}}" alt="Barcode " title="Barcode " style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 27%;max-width: 51.3px;" width="51.3" class="v-src-width v-src-max-width">
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:12px 10px 38px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                                    Invoice NO: <strong>000{{$booking_data->id}}</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="u-col u-col-35" style="max-width: 320px;min-width: 210px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_image_5" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:40px 5px 5px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
                                                                                                <img align="center" border="0" src="{{ url('/resources/assets/img/invoice/_calender.png')}}" alt="Calendar " title="Calendar " style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 17%;max-width: 34px;" width="34" class="v-src-width v-src-max-width">
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table id="u_content_heading_3" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 38px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                                    Invoice Date: <strong>{{date('M d, Y', strtotime($booking_data->created_at))}}</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="u-col u-col-31p67" style="max-width: 320px;min-width: 190px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_image_6" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:41px 5px 5px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
                                                                                                <img align="center" border="0" src="{{ url('/resources/assets/img/invoice/dallor.png')}}" alt="Dollar " title="Dollar " style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 28%;max-width: 50.4px;" width="50.4" class="v-src-width v-src-max-width">
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table id="u_content_heading_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:12px 10px 38px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                                    Total: <strong>PKR {{ $booking_data->total_amount }}</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="padding: 0px;background-color: transparent">
                                            <div class="u-row no-stack" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #126c62;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_5" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px; color: #ffffff;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 16px;">
                                                                                    <strong>Description</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #126c62;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_6" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px; color: #ffffff;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 16px;">
                                                                                    <strong>Passenger </strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #126c62;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                                <table id="u_content_heading_7" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px; color: #ffffff;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 16px;">
                                                                                    <strong>Total</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="padding: 0px;background-color: transparent">
                                            <div class="u-row no-stack" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_19" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px;  text-align: left; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                                    {{$booking_data->total_room}} Room x {{$booking_data->total_days}} Night
                                                                                    Base Price {{$room_data->price_per_night}} Per Night
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_20" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                                    <strong>{{$booking_data->total_member}}</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_21" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                                    <strong>PKR {{ $booking_data->total_amount }}</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="" style="padding: 0px;background-color: transparent">
                                    <div class="u-row no-stack"
                                        style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                        <div
                                            style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                            <div
                                                style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div
                                                style="background-color: #f6f6f6;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                
                                                <div
                                                    style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    <table style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                                        cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td class=""
                                                                style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                                                align="left">
                                                                <h1
                                                                    style="margin: 0px;  text-align: left; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                    Lorem ipsum dolor sit amet, consec.
                                                                </h1>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                            <div
                                                style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div
                                                style="background-color: #f6f6f6;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                
                                                <div
                                                    style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    
                                                    <table style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                                        cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td class=""
                                                                style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:arial,helvetica,sans-serif;"
                                                                align="left">
                                                                <h1
                                                                    style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                    <strong>1</strong>
                                                                </h1>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <div
                                                style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div
                                                style="background-color: #f6f6f6;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                
                                                <div
                                                    style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    
                                                    <table id="u_content_heading_16"
                                                        style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                                        cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td class=""
                                                                style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:arial,helvetica,sans-serif;"
                                                                align="left">
                                                                <h1
                                                                    style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                    <strong>$ 20,000</strong>
                                                                </h1>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="" style="padding: 0px;background-color: transparent">
                                    <div class="u-row no-stack"
                                        style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                        <div
                                            style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                            <div
                                                style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div
                                                style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                
                                                <div
                                                    style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    
                                                    <table style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                                        cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td class=""
                                                                style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 12px;font-family:arial,helvetica,sans-serif;"
                                                                align="left">
                                                                <h1
                                                                    style="margin: 0px;  text-align: left; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                    Lorem ipsum dolor sit amet, consec.
                                                                </h1>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <div
                                                style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div
                                                style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                
                                                <div
                                                    style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    
                                                    <table id="u_content_heading_14"
                                                        style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                                        cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td class=""
                                                                style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px 21px;font-family:arial,helvetica,sans-serif;"
                                                                align="left">
                                                                <h1
                                                                    style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                    <strong>1</strong>
                                                                </h1>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <div
                                                style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div
                                                style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                
                                                <div
                                                    style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    
                                                    <table id="u_content_heading_35"
                                                        style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                                        cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td class=""
                                                                style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:arial,helvetica,sans-serif;"
                                                                align="left">
                                                                <h1
                                                                    style="margin: 0px;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 14px;">
                                                                    <strong>$ 20,000</strong>
                                                                </h1>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> -->

                                        <div class="" style="padding: 0px;background-color: transparent">
                                            <div class="u-row no-stack" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                    <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_31" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px 20px 270px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px; color: #126c62;  text-align: left; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 20px;">
                                                                                    <strong>TOTAL</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #126c62;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table id="u_content_heading_15" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <h1 style="margin: 0px; color: #ffffff;  text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Montserrat',sans-serif; font-size: 16px;">
                                                                                    <strong>{{$booking_data->total_amount}}</strong>
                                                                                </h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="padding: 0px;background-color: transparent">
                                            <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                    <div class="" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="padding: 0px;background-color: transparent; margin-top:2px;">
                                            <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                                    <div class="" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                        <div style="background-color: #126c62;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

                                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="" style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 40px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                                <div class="v-text-align" style="color: #ffffff;  text-align: center; word-wrap: break-word;">
                                                                                    <p style="font-size: 14px; "><span style="font-family: Montserrat, sans-serif; font-size: 14px; line-height: 19.6px;">+92
                                                                                            342 4514629 &nbsp;| info@roadnstays.com</span></p>
                                                                                    <p style="font-size: 14px; "><span style="font-family: Montserrat, sans-serif; font-size: 14px; line-height: 19.6px;">{{$hotel_data->hotel_address}}</span></p>
                                                                                    <p style="font-size: 14px; "><span style="font-family: Montserrat, sans-serif; font-size: 14px; line-height: 19.6px;">©
                                                                                            Copyright RoadNstays. All Rights Reserved web</span></p>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>