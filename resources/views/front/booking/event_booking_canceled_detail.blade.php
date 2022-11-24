@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');

    body {
        font-family: 'Open Sans', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Open Sans', sans-serif;
    }

    .breadcrumb {
        background: none;
    }

    .bread-sec {
        padding: 100px 0 10px;
        background-image: linear-gradient(262deg, #f09819, #f3d452);
    }

    .breadcrumb li a {
        font-size: 16px;
        font-weight: 900;
        text-decoration: none;
    }

    .bread-row .id {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 66%;
    }

    .bread-row h5 {
        font-size: 24px;
        font-weight: 900;
    }

    .bread-row .id p {
        font-size: 14px;
        line-height: 22px;
        opacity: .54;
    }

    .bread-row .id p span {
        font-size: 14px;
        line-height: 22px;
        color: #000;
    }

    .user-detailc .user-det {
        border-radius: 5px;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        padding: 25px;
        overflow: hidden;
        width: 66%;
    }

    .user-detailr .user-det-2 {
        border-radius: 5px;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        padding: 25px;
        overflow: hidden;
        width: 64.9%;
        margin-top: 20px;
        margin-left: 12px;
        position: relative;
    }

    .user-detailr .user-det-3 {
        border-radius: 5px;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        padding: 25px;
        overflow: hidden;
        width: 64.9%;
        margin-top: 20px;
        margin-left: 12px;
        position: relative;
    }

    .user-detailr .user-det-3:before {
        content: "";
        width: 5px;
        height: 50px;
        background-color: #cf8100;
        position: absolute;
        top: 25px;
        left: 0;

    }

    .user-detailr .user-det-2:before {
        content: "";
        width: 5px;
        height: 50px;
        background-color: #cf8100;
        position: absolute;
        top: 25px;
        left: 0;
    }

    .hotel-name,
    .loc {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .loc {
        padding-top: 20px;
        border-top: 1px dashed #e1d5d5;
    }

    .hotel-name span {
        font-size: 14px;
        font-weight: 300;
        margin-left: 5px;
        text-transform: capitalize;
    }

    .hotel-name h5 {
        font-size: 24px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .loc h6 {
        font-size: 20px;
        font-weight: 800;
        display: grid;
        line-height: 30px;
    }

    .loc span {
        font-size: 14px;
        font-weight: 500;
        margin-left: 5px;
    }

    .ico i {
        font-size: 30px;
        width: 50px;
        margin: auto;
        display: flex;
        justify-content: center;
    }

    .user-detailc {
        display: flex;
        margin-top: -18px;
    }

    .user-detailc .box-1,
    .user-detailc .box-2 {
        border-radius: 5px;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        overflow: hidden;
    }

    .status {
        border-radius: 4px;
        background-color: #ffedd1;
        color: #cf8100;
        padding: 4px 8px;
        display: inline-block;
        font-size: 13px;
        line-height: 13px;

        font-weight: 700;
    }

    .side-b {
        margin-left: 20px;
        width: 25%;
        max-height: 400px;
    }

    .side-b .box-1 {
        border-radius: 5px;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .side-b .box-2 {
        border-radius: 5px;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        overflow: hidden;
    }

    .side-b ul {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-left: 0;
        list-style: none;
        padding: 15px 20px;
        border: 1px solid #f2f2f2;
        margin-bottom: 0;
    }

    .side-b h5 {
        padding: 15px 20px;
        border: 1px solid #f2f2f2;
        margin-bottom: 0;
        font-size: 16px;
        font-weight: 800;
    }

    .side-b ul li {
        font-size: 14px;
        line-height: 18px;
        font-weight: 700;
    }

    .side-b ul .text {
        font-weight: 400;
    }

    .cm__travelLine {
        width: 105px;
        height: 1px;
        border-bottom: 2px dotted #9b9b9b;
        position: relative;
        flex-shrink: 0;
        display: inline-block;
        margin-top: 15px;
    }

    .cm__travelLine:after,
    .cm__travelLine:before {
        position: absolute;
        content: "";
        width: 7px;
        height: 7px;
        background-color: #4a4a4a;
        border-radius: 50%;
        top: -2px;
    }

    .cm__travelLine:after {
        right: -2px;
    }

    .cm__travelLine:before {
        left: -2px;
    }

    .ico {
        display: flex;
        flex-direction: column;
    }

    .deta {
        padding-top: 40px;
    }

    .deta h5 {
        font-size: 20px;
        font-weight: 900;
        text-transform: uppercase;
        color: #126c62;
    }

    .deta p {
        font-size: 14px;
        font-weight: 500;
        text-transform: capitalize;
    }

    .deta h5 span {
        font-size: 14px;
        font-weight: 300;
        text-transform: capitalize;
    }

    .down-i i {
        font-size: 24px;

        margin-right: 5px;
    }

    .down-i {
        padding: 20px 0;
        position: relative;
        border-top: 2px dashed #e7e7e7;
        margin-top: 40px;
    }

    .down-i a {
        display: flex;
        align-items: center;

    }

    .down-i:before,
    .down-i:after {
        content: "";
        position: absolute;
        width: 16px;
        height: 16px;
        box-shadow: inset 0 0 4px 0 rgb(0 0 0 / 20%);
        background-color: #f2f2f2;
        top: -9px;
        border-radius: 50%;
    }

    .down-i:before {
        left: -7px;
    }

    .down-i:after {
        right: -7px;
    }

    .user-det-2 h4 {
        font-size: 24px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .user-det-2 h5 {
        font-size: 16px;
        font-weight: 900;
        line-height: 30px;
        padding: 5px 0;
        margin: 0;
    }

    .user-det-2 h5 span {
        font-size: 12px;
        font-weight: 500;
        margin-left: 5px;
    }

    .user-det-2 ul li {
        list-style-type: none;
        display: flex;
        align-items: center;
    }

    .user-det-2 ul li i {
        font-size: 25px;
        margin-right: 5px;
    }

    .user-det-2 ul li .bx-male {
        color: #8FB2F9;
    }

    .user-det-2 ul li .bx-female {
        color: #FFA3C8;
    }


    .user-det-3 h4 {
        font-size: 20px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .user-det-3 h5 {
        font-size: 15px;
        font-weight: 800;
        line-height: 30px;
        padding: 5px 0;
        margin: 0;
        color: #3c3b3a;
    }

    .user-det-3 h5 span {
        font-size: 12px;
        font-weight: 500;
        margin-left: 5px;
    }

    .user-det-3 ul li {
        list-style-type: none;
        display: flex;
        align-items: center;
    }

    .user-det-3 ul li i {
        font-size: 25px;
        margin-right: 5px;
        color: #8f8c8a;
    }

    .multi-step-bar {
        overflow: hidden;
        counter-reset: step;
        width: 100%;
        margin: 15px auto 30px;
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
    }

    .progress-ba li {
        text-align: center;
        list-style-type: none;
        color: #363636;
        text-transform: CAPITALIZE;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 600;
    }

    .progress-ba li:before {
        content: counter(step);
        counter-increment: step;
        width: 30px;
        line-height: 30px;
        display: block;
        font-size: 12px;
        color: green;
        background: #e6e6e6;
        border-radius: 50%;
        margin: 0 auto 5px auto;
        -webkit-box-shadow: 0 6px 20px 0 rgba(69, 90, 100, 0.15);
        -moz-box-shadow: 0 6px 20px 0 rgba(69, 90, 100, 0.15);
        box-shadow: 0 6px 20px 0 rgba(69, 90, 100, 0.15);
    }

    .progress-ba li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: #898989;
        position: absolute;
        left: -50%;
        top: 15px;
        z-index: -1;
    }

    .progress-ba li:first-child:after {
        content: none;
    }

    .progress-ba li.active:before {
        background: #cfb11d;
        color: white;
    }

    .progress-ba h5 {

        font-weight: 800;
        font-size: 20px;
    }

    .hint-text li {
        font-size: 16px;
        font-weight: 500;
    }

    .user-detailr .user-det-2 ul,
    .user-detailr .user-det-3 ul {
        padding-left: 0;
    }

    /* =========================================responsive below 768px css============================================== */
    @media screen and (max-width:767px) {
        .bread-row .id {
            width: 100%;
        }

        .user-detailc .user-det {
            padding: 15px;
            width: 100%;
        }

        .side-b {
            margin-top: 20px;
            margin-left: 0px;
            width: 100%;
            max-height: 400px;
        }

        .user-detailc {
            display: block;
            margin-top: -4px;
        }

        .user-detailr .user-det-2,
        .user-detailr .user-det-3 {
            margin-top: 20px;
            margin-left: 0px;
            width: 100%;
            padding: 15px;
        }

        .user-det-2 h4 {
            font-size: 20px;
        }

        .user-detailr .user-det-2 ul,
        .user-detailr .user-det-3 ul {
            padding-left: 0;
        }

        .user-det p {
            font-size: 12px;
        }

        .loc h6 {
            font-size: 16px;
            font-weight: 800;
            display: grid;
            line-height: 24px;
        }

        .loc span {
            font-size: 12px;
            font-weight: 500;
            margin-left: 5px;
        }

        .bread-row h5 {
            font-size: 20px;
            font-weight: 800;
        }

        .hotel-name span {
            font-size: 12px;
            font-weight: 400;
            margin-left: 0px;
            text-transform: capitalize;
        }

        .multi-step-bar {
            display: flex;
            justify-content: space-between;
            margin: 5px auto 0px;
        }

        .progress-ba li {
            font-weight: 500;
            font-size: 12px;
        }

        .status {
            position: absolute;
            right: 0;
            top: 0;
        }


    }

    /* =========================================responsive below 1024px css============================================== */
    /* =========================================responsive below 1024px css============================================== */

    @media screen and (max-width:1023px) and (min-width:768px) {
        .user-detailc .user-det {
            padding: 15px;
            width: 65%;
            position: relative;
        }

        .side-b {
            margin-left: 10px;
            width: 34%;
            max-height: 400px;
        }

        .side-b h5,
        .side-b ul {
            padding: 15px 10px;
        }

        .user-detailr .user-det-2,
        .user-detailr .user-det-3 {
            padding: 15px;
            width: 62%;
        }

        .user-det-2 h4 {
            font-size: 20px;
        }

        .user-detailr .user-det-2 ul,
        .user-detailr .user-det-3 ul {
            padding-left: 0;
        }

        .user-det p {
            font-size: 14px;
        }

        .multi-step-bar {
            margin: 15px auto 0px;
        }

        .hint-text {
            padding-left: 10px;
        }

        .status {
            position: absolute;
            right: 0;
            top: 0;
        }

        .progress-ba h5 {
            font-weight: 600;
            font-size: 16px;
        }

    }
</style>

@endsection

@section('current_page_js')

@endsection

@section('content')

<!-- paste your html code here  -->
<section class="bread-sec">
    <div class="container">
        <div class="row bread-row">
            <div class="col-md-12 bread-col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/user/profile') }}">Profile</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/user/tourBookingList') }}">Tour Booking</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Code: #{{ $bookingDetails->tour_code }}</li>
                    </ol>
                </nav>
                <h5>Your Tour booking has Cancelled</h5>
                <div class="id">
                    <div class="id-text">
                        <p>Booking Code# <span>#{{ $bookingDetails->tour_code }}</span> &nbsp; &nbsp; &nbsp;
                            <!-- Reference PNR# <span>47GZKYGM</span> -->
                        </p>

                    </div>
                    <p>Booked On <span>{{ date('d M Y' , strtotime($bookingDetails->created_at)) }}</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row user-detailr">
            <div class="col-md-12 user-detailc ">
                <div class="user-det">
                    <div class="hotel-name">
                        <h5>{{ $bookingDetails->tour_title }} <br> <span>{{ $bookingDetails->address }}</span></h5>
                        <div class="status">
                            Cancelled/Refunded
                        </div>
                    </div>
                    <!-- <div class="loc">
                            <div class="da">
                                <h6> <span>CHECK IN</span>16 Aug, Wed </h6>
                                <small>Landmark: Star Chouraha</small>
                            </div>
                            <div class="ico">
                                <i class='bx bx-buildings'></i>
                                <div class="cm__travelLine appendTop15"></div>
                            </div>
                            <div class="da">
                                <h6><span>CHECK OUT</span>22 Aug, Wed </h6>
                                <small>Landmark: Star Chouraha</small>
                            </div>
                        </div> -->
                    <div class="row user-detail-row ">
                        <div class="col-md-12 progress-ba">
                            <h5>You cancelled all traveler(s). Refund of PKR {{$bookingDetails->refund_amount ?? ''}} processed.</h5>
                            <ul class="multi-step-bar">
                                <li class="<? if($bookingDetails->refund_status=='pending' or $bookingDetails->refund_status=='processing' or $bookingDetails->refund_status=='confirmed'){ echo "active"; } ?>">Booking Cancelled <br>{{$bookingDetails->canceled_at}}</li>
                                <li class="<? if($bookingDetails->refund_status=='processing' or $bookingDetails->refund_status=='confirmed'){ echo "active"; } ?>">Refund Processed <br>@if($bookingDetails->refund_status=='processing' or $bookingDetails->refund_status=='confirmed'){{$bookingDetails->refund_processed_at}}@endif</li>
                                <li class="<? if($bookingDetails->refund_status=='confirmed'){ echo "active"; } ?>">Credit in Account <br>@if($bookingDetails->refund_status=='confirmed'){{$bookingDetails->refund_credited_at}}@endif</li>
                            </ul>


                        </div>
                        <ul class="hint-text">
                            <li>
                                <!-- <p>PKR 125 has been processed in Your Account - refund with RRN number WMBK08980480291 has been processed to your account.<br>It takes 5-12 working days for refunds to reflect in Account.</p> -->
                                <p>PKR {{$bookingDetails->refund_amount ?? ''}} has been processed in Your Account.<br>It takes 5-12 working days for refunds to reflect in Account.</p>
                            </li>
                        </ul>
                    </div>

                    <div class="deta">
                        <h5>RoadnStays & Co.</h5>
                        <p>E-mail - info@roadnstays.com</p>
                        <p>What's up - +92 342 4514629</p>
                        <!-- <p>{{ $bookingDetails->tour_title }}</p> -->

                    </div>
                    <!-- <div class="down-i">
                        <a style="text-decoration:none;" href="#"><i class='bx bx-download'></i>Download Invoice</a>
                    </div> -->

                </div>
                <!--............................................. booking cancel status......................................................... -->




                <!--............................................. booking cancel status......................................................... -->


                <div class="side-b">
                    <div class="box-1">
                        <h5>PRICING BREAKUP</h5>
                        <ul>
                            <li class="text">Room Charges</li>
                            <li>PKR {{ $bookingDetails->tour_price }}</li>
                        </ul>
                        <!-- @if(@isset($bookingDetails->tax_percentage))
                        <ul>
                            <li class="text">Taxes</li>
                            <li>PKR {{ $bookingDetails->tax_percentage }}</li>
                        </ul>
                        @endif
                        @if(isset($bookingDetails->cleaning_fee))
                        <ul>
                            <li class="text">Cleaning Fees</li>
                            <li>PKR {{ $bookingDetails->cleaning_fee }}</li>
                        </ul>
                        @endif
                        @if(isset($bookingDetails->city_fee))
                        <ul>
                            <li class="text">City Fees</li>
                            <li>PKR {{ $bookingDetails->city_fee }}</li>
                        </ul>
                        @endif -->
                    </div>

                    <div class="box-2">

                        <ul style="background-color: #f1f9ff;">
                            <li class="t-head">TOTAL AMOUNT</li>
                            <li>PKR {{ $bookingDetails->total_amount }}</li>
                        </ul>
                        <ul>
                            <li>Payment Breakup</li>
                        </ul>
                        <ul>
                            <li class="text">Payment Type</li>
                            
                            <li>
                                @if($bookingDetails->payment_type == 1)
                                {{ 'Alfa Wallet' }}
                                @elseif($bookingDetails->payment_type == 2)
                                {{ 'Alfalah Bank Account' }}
                                @elseif($bookingDetails->payment_type == 3)
                                {{ 'Credit/Debit Card' }}
                                @elseif($bookingDetails->payment_type == 4)
                                {{ 'Other Bank Accounts' }}
                                @else
                                {{ 'paypal' }}  
                                @endif
                            </li>
                        </ul>
                        <!-- <ul>
                            <li><a style="text-decoration:none;" href="#">Download Invoice</a></li>
                        </ul> -->
                    </div>
                </div>


            </div>
            <!-- <div class="user-det user-det-2">
                <h4>Guest(3)</h4>
                <ul>
                    <li>
                        <i class='bx bx-male'></i>
                        <h5>Alexender D'volvo <span>28Yrs, Male</span></h5>
                    </li>
                    <li>
                        <i class='bx bx-female'></i>
                        <h5>Princess s <span>23Yrs, Female</span></h5>
                    </li>
                    <li>
                        <i class='bx bx-male'></i>
                        <h5>Oliver <span>12Yrs, Male</span></h5>
                    </li>
                </ul>
            </div> -->

            <div class="user-det user-det-3">
                <h4>Contact Information</h4>
                <p>Hotel Staff or our service experts might connect with you on below contact details.</p>
                <ul>
                    <li>
                        <i class='bx bxs-user'></i>
                        <h5>{{ $scoutDetails->first_name }} {{ $scoutDetails->last_name }}</h5>
                    </li>
                    <li>
                        <i class='bx bxs-contact'></i>
                        <h5>{{ $scoutDetails->contact_number }} </h5>
                    </li>
                    <li>
                        <i class='bx bxs-envelope'></i>
                        <h5>{{ $scoutDetails->email }}</h5>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>


@endsection