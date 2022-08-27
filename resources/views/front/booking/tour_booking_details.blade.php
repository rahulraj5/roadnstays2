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
        background-image: linear-gradient(262deg, #afb3ba, #cfcfcf);
    }

    .user-sec {
        padding: 0 0 50px 0;
        margin-top: -2px;
        background: #F2F2F2;
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
        width: 67%;
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
        width: 64.8%;
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
        width: 64.8%;
        margin-top: 20px;
        margin-left: 12px;
        position: relative;
    }

    .user-detailr .user-det-3:before {
        content: "";
        width: 5px;
        height: 50px;
        background-color: #9b9b9b;
        position: absolute;
        top: 25px;
        left: 0;

    }

    .user-detailr .user-det-2:before {
        content: "";
        width: 5px;
        height: 50px;
        background-color: #9b9b9b;
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
        background-color: #d6f6f3;
        padding: 4px 8px;
        display: inline-block;
        font-size: 13px;
        line-height: 13px;
        color: #1a7971;
        font-weight: 700;
    }

    .side-b {
        margin-left: 20px;
        width: 30%;
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
            position: relative;
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
            font-size: 14px;
        }

        .loc h6 {
            font-size: 16px;
            font-weight: 800;
            display: grid;
            line-height: 24px;
            margin-bottom: 0;
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

        .status {
            position: absolute;
            right: 0;
            top: 0;
        }

        .cm__travelLine {
            width: 60px;
            height: 1px;
            margin-top: 10px;
        }

        .ico i {
            font-size: 20px;
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

        .status {
            position: absolute;
            right: 0;
            top: 0;
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
                <h5>Your Tour booking has completed</h5>
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
<section class="user-sec">
    <div class="container">
        <div class="row user-detailr">
            <div class="col-md-12 user-detailc ">
                <div class="user-det">
                    <div class="hotel-name">
                        <h5>{{ $bookingDetails->tour_title }} <br> <span>{{ $bookingDetails->address }}</span></h5>
                        <div class="status">
                            Completed
                        </div>
                    </div>
                    <div class="loc">
                        <div class="da">
                            <h6> <span>CHECK IN</span>{{ date('d M, D' , strtotime($bookingDetails->tour_start_date)) }} </h6>
                            <small>Landmark: {{ $bookingDetails->tour_locations }}</small>
                        </div>
                        <div class="ico">
                            <i class='bx bx-buildings'></i>
                            <div class="cm__travelLine appendTop15"></div>
                        </div>
                        <div class="da">
                            <h6><span>CHECK OUT</span>{{ date('d M, D' , strtotime($bookingDetails->tour_end_date)) }} </h6>
                            <small>Landmark: {{ $bookingDetails->tour_locations }}</small>
                        </div>
                    </div>
                    <!-- <div class="deta">
                        <h5>RoadnStays & Co.</h5>
                        <p>{{ $bookingDetails->neighb_area }}</p>

                    </div> -->
                    <div class="down-i">
                        <a style="text-decoration:none;" href="#"><i class='bx bx-download'></i>Download Invoice</a>
                    </div>

                </div>
                <div class="side-b">
                    <div class="box-1">
                        <!-- <h5>PRICING BREAKUP</h5> -->
                        <ul>
                            <li class="text">Tour Charges</li>
                            <li>PKR {{ $bookingDetails->tour_price }}</li>
                        </ul>
                        <!-- @if(@isset($bookingDetails->tour_price))
                        <ul>
                            <li class="text">Taxes</li>
                            <li>PKR {{ $bookingDetails->tour_price }}</li>
                        </ul>
                        @endif
                        @if(isset($bookingDetails->tour_price))
                        <ul>
                            <li class="text">Cleaning Fees</li>
                            <li>PKR {{ $bookingDetails->tour_price }}</li>
                        </ul>
                        @endif
                        @if(isset($bookingDetails->tour_price))
                        <ul>
                            <li class="text">City Fees</li>
                            <li>PKR {{ $bookingDetails->tour_price }}</li>
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
                            <li>{{ $bookingDetails->payment_type }}</li>
                        </ul>
                        <ul>
                            <li><a style="text-decoration:none;" href="#">Download Invoice</a></li>
                        </ul>
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