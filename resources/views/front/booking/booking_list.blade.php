@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');

    body {
        font-family: 'Open Sans', sans-serif;
    }

    .bread-sec {
        padding: 100px 0 100px;
        background-image: linear-gradient(180deg, #E0EAFC, #CFDEF3);
    }

    .breadcrumb li a {
        font-size: 16px;
        font-weight: 900;
    }

    .breadcrumb {
        background: none;
    }

    .tabs {
        display: flex;
        flex-wrap: wrap;
        padding: 20px 30px 0;
        background: #fff;
        border-radius: 8px 8px 0 0;
        box-shadow: 0 2px 20px 0 rgb(0 0 0 / 10%);
        position: relative;
        top: -100px;


    }

    .tabs__label {
        padding: 20px 50px 10px 50px;
        cursor: pointer;
        font-size: 20px;
        font-weight: 900;
    }

    .tabs__label i {
        padding-right: 5px;
    }

    .tabs__radio {
        display: none;
    }

    .tabs__content {
        order: 1;
        width: 100%;
        border-bottom: 3px solid #dddddd;
        line-height: 1.5;
        font-size: 0.9em;
        display: none;
        background-color: #fff;
        padding: 20px 50px 20px 54px;
        position: relative;
        margin-top: 20px;
    }

    .text-detail ul {
        display: flex;
    }

    .text-detail ul li {
        margin: 0 35px 0 0px;
        list-style-position: inside;
        list-style-type: disclosure-closed;
    }

    .btn-detail a {
        color: #fff;
        font-weight: 700;
        min-width: 235px;
        padding: 15px 30px;
        border-radius: 20px;
        box-shadow: 0 3px 4px 0 rgb(0 0 0 / 20%);
        background-image: linear-gradient(50deg, #2e7f7c6e, #126c62);
        text-decoration: none;
    }


    .tabs__radio:checked+.tabs__label {
        font-size: 20px;
        font-weight: 900;
        color: #009578;
        border-bottom: 5px solid #009578;
        background: aliceblue;
        border-radius: 10px;
    }

    .tabs__radio:checked+.tabs__label+.tabs__content {
        display: flex;
        margin-bottom: 20px;

        align-items: center;
        flex-wrap: wrap;
    }

    .tabs__content .content {
        width: 100%;
        margin-bottom: 50px;
        box-shadow: -4px -4px 8px #e3e3e3, 4px 4px 8px #f9f4f4, 4px 4px 8px #e3e3e3, 4px 4px 8px #f9f4f4;
    }

    .text-detail h3 {
        font-weight: 700;
        font-size: 20px;
        text-transform: uppercase;
    }

    .icontext {
        display: flex;
        align-items: flex-start;
    }

    .text-detail {
        width: 100%;
        background-color: #f7f3f3;
        padding: 20px 50px 20px 54px;
        position: relative;
    }

    .icontext i {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        font-size: 25px;
        background-color: #126c62;
        margin-right: 10px;
        ;
        border-radius: 50%;
        color: #fff;
        position: absolute;
        left: -27px;
        border: 5px solid #c5e1dd;
    }

    .user-detail-row {
        width: 100%;
        background: #fff;
        border-top: 1px dashed;
        padding: 20px;
        border-radius: 5px;
        margin: 0px;
        align-items: center;

    }

    .user-detail h6 span {
        font-size: 14px;
        color: #747474;
        margin-left: 4px;
        font-weight: 600;
    }

    .user-detail h6 {
        font-weight: 800;
    }

    .dropbtn {
        padding: 10px 0;
        font-size: 16px;
        border: none;
        background: none;
        font-weight: 500;
        color: #126c62;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
        z-index: 1;
        padding: 10px;
        width: 250px;
        border-radius: 10px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .user-detail i {
        margin-right: 5px;
        margin-left: 5px;

    }

    .user-detail a {
        display: flex;
        align-items: center;
        text-decoration: none;
        justify-content: center;
        font-size: 16px;
        font-weight: 500;
    }

    .btn-detail {
        position: relative;
        float: right;
        top: -70px;
        right: 33px;
    }

    .upcom-row {
        width: 100%;
        padding: 40px 0;
    }

    .upcom-row h5 {
        font-weight: 900;
        font-size: 24px;
        text-transform: capitalize;
    }

    .upcom-row p {
        font-size: 16px;
        margin: 20px 0 30px 0;
    }

    .upcom-row a {
        color: #fff;
        min-width: 235px;
        padding: 15px 30px;
        border-radius: 20px;
        box-shadow: 0 3px 4px 0 rgb(0 0 0 / 20%);
        background-image: linear-gradient(50deg, #2e7f7c6e, #126c62);
        text-decoration: none;
        font-weight: 700;
    }

    .multi-step-bar {
        overflow: hidden;
        counter-reset: step;
        width: 100%;
        margin: 15px auto 30px;
        padding: 20px 0;
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
        background: green;
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
</style>


@endsection



@section('current_page_js')


@endsection

@section('content')


<section class="bread-sec">
    <div class="container">
        <div class="row bread-row">
            <div class="col-md-12 bread-col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/user/profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Booking</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
</section>

<section class="tab-listsec">
    <div class="container">
        <div class="tabs">
            <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
            <label for="tab1" class="tabs__label"> <i class='bx bxs-receipt'></i> Recent</label>
            <div class="tabs__content">

            @if (!$bookingList->isEmpty())
            
                @if(count($bookingList) > 0)    
                  
                    @foreach ($bookingList as $arr)


                        <div class="content">
                            <div class="text-detail">
                                <div class="icontext">
                                    <i class='bx bxs-hotel'></i>
                                    <div class="text">
                                        <h3>{{ $arr->hotel_name }}</h3>
                                        <p>{{ $arr->hotel_city }}, {{ $arr->hotel_country }}</p>
                                    </div>
                                </div>

                                <ul>
                                    <li>{{ $arr->room_name }}</li>
                                    <li>Booking ID - VXMN{{ $arr->id }}</li>
                                    <li>{{ $arr->payment_status }}</li>
                                </ul>
                                <div class="btn-detail">
                                    <a href="{{ url('/user/bookingDetails') }}/{{ base64_encode($arr->id) }}">View Booking</a>

                                </div>
                            </div>

                            <div class="row user-detail-row ">
                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-calendar'></i>FROM</p>
                                    <h6>{{ $arr->check_in }} <span>{{ $arr->checkin_time }}</span></h6>
                                    <!-- <strong>new Delhi</strong> -->
                                </div>
                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-calendar'></i>TO</p>
                                    <h6>{{ $arr->check_out }} <span>{{ $arr->checkout_time }}</span></h6>
                                    <!-- <strong>new Delhi</strong> -->
                                </div>

                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-store'></i>Room Name</p>
                                    <h6>{{ $arr->room_name }} </h6>
                                    <!-- <strong>new Delhi</strong> -->
                                </div>
                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-store'></i>Room Type</p>
                                    <h6>{{ $arr->room_type_name }} </h6>
                                    <!-- <strong>new Delhi</strong> -->
                                </div>

                                <!-- <div class="col-md-3 user-detail">
                                    <div class="dropdown">
                                        <button class="dropbtn"><i class='bx bxs-store'></i>Room Name
                                            <i class='bx bx-caret-down'></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <p>Room Name</p>
                                            <h6>{{ $arr->room_name }}</h6>
                                            <P>Room Type</P>
                                            <h6>{{ $arr->room_type_name }}</h6>
                                        </div>
                                    </div>

                                    <p> <strong><i class='bx bxs-user-plus'></i>Neeru sharma +2</strong></p>
                                </div> -->
                                <!-- <div class="col-md-3 user-detail" style="text-align:center;">
                                    <a href="#"><i class='bx bx-download'></i> Download Invoice</a>
                                </div> -->
                            </div>
                        </div>
                        

                    @endforeach

                @else

                    <div class="row upcom-row">
                        <div class="col-md-3 upcom-img">
                            <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="200px">

                        </div>
                        <div class="col-md-9 upcom-text">
                            <h5>Looks empty, you've no bookings.</h5>
                            <p>When you book a trip, you will see your itinerary here.</p>
                            <a href="#">PLAN A TRIP</a>
                        </div>
                    </div>

                @endif

            @else

                <div class="row upcom-row">
                    <div class="col-md-3 upcom-img">
                        <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="200px">

                    </div>
                    <div class="col-md-9 upcom-text">
                        <h5>Looks empty, you've no bookings.</h5>
                        <p>When you book a trip, you will see your itinerary here.</p>
                        <a href="#">PLAN A TRIP</a>
                    </div>
                </div>    

            @endif
            </div>






            <input type="radio" class="tabs__radio" name="tabs-example" id="tab2">
            <label for="tab2" class="tabs__label"> <i class='bx bxs-send'></i>Upcoming</label>
            <div class="tabs__content">
                <div class="row upcom-row">
                    <div class="col-md-3 upcom-img">
                        <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="200px">

                    </div>
                    <div class="col-md-9 upcom-text">
                        <h5>Looks empty, you've no upcoming bookings.</h5>
                        <p>When you book a trip, you will see your itinerary here.</p>
                        <a href="#">PLAN A TRIP</a>
                    </div>
                </div>
            </div>

            <input type="radio" class="tabs__radio" name="tabs-example" id="tab3">
            <label for="tab3" class="tabs__label"> <i class='bx bx-x'></i>Cancelled</label>
            <div class="tabs__content">

            @if (!$bookingList->isEmpty())
            
                @if(count($bookingList->where('booking_status', 'canceled')) > 0)    
                  
                    @foreach ($bookingList->where('booking_status', 'canceled') as $arr)

                        <div class="content">
                            <div class="text-detail">
                                <div class="icontext">
                                    <i class='bx bxs-hotel'></i>
                                    <div class="text">
                                        <h3>{{ $arr->hotel_name }}</h3>
                                        <p>{{ $arr->hotel_city }}, {{ $arr->hotel_country }}</p>
                                    </div>
                                </div>

                                <ul>
                                    <li>Cancelled on {{ date('d-m-Y' , strtotime($arr->created_at)) }}</li>
                                    <li>Booking ID - VXMN{{ $arr->id }}</li>
                                    <li>{{ $arr->payment_status }}</li>
                                </ul>
                                <div class="btn-detail">
                                    <a href="{{ url('/user/bookingDetailCancelled') }}/{{ base64_encode($arr->id) }}">View Booking</a>
                                </div>
                            </div>

                        </div>
                        <div class="row user-detail-row ">
                            <div class="col-md-12 progress-ba">
                                <h5>You cancelled all traveler(s). Refund of PKR 255 processed.</h5>
                                <ul class="multi-step-bar">
                                    <li class="active">Booking Cancelled</li>
                                    <li>Refund Processed</li>
                                    <li>Credit in Account</li>
                                </ul>


                            </div>
                            <ul class="hint-text">
                                <li>
                                    <p>PKR 125 has been processed in Your Account - refund with RRN number WMBK08980480291 has been processed to your account.<br>It takes 5-12 working days for refunds to reflect in Account.</p>
                                </li>
                            </ul>
                        </div>

                    @endforeach

                @else

                    <div class="row upcom-row">
                        <div class="col-md-3 upcom-img">
                            <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="200px">

                        </div>
                        <div class="col-md-9 upcom-text">
                            <h5>Looks empty, you've no canceled bookings.</h5>
                            <p>When you book a trip, you will see your itinerary here.</p>
                            <a href="#">PLAN A TRIP</a>
                        </div>
                    </div>

                @endif    

            @else

                <div class="row upcom-row">
                    <div class="col-md-3 upcom-img">
                        <img src="" alt="" width="150px">

                    </div>
                    <div class="col-md-9 upcom-text">
                        <h5>Looks empty, you've no canceled bookings.</h5>
                        <p>When you book a trip, you will see your itinerary here.</p>
                        <a href="#">PLAN A TRIP</a>
                    </div>
                </div>

            @endif

            </div>


            <input type="radio" class="tabs__radio" name="tabs-example" id="tab4">
            <label for="tab4" class="tabs__label"> <i class='bx bxs-detail'></i>Failed</label>
            <div class="tabs__content">

            @if (!$bookingList->isEmpty())
            
                @if(count($bookingList->where('booking_status', 'failed')) > 0)    
                  
                    @foreach ($bookingList->where('booking_status', 'failed') as $arr)

                        
                        <div class="content">
                            <div class="text-detail">
                                <div class="icontext">
                                    <i class='bx bxs-hotel'></i>
                                    <div class="text">
                                        <h3>{{ $arr->hotel_name }}</h3>
                                        <p>{{ $arr->hotel_city }}, {{ $arr->hotel_country }}</p>
                                    </div>
                                </div>

                                <ul>
                                    <li>{{ $arr->room_name }}</li>
                                    <li>Booking ID - VXMN{{ $arr->id }}</li>
                                    <li>{{ $arr->payment_status }}</li>
                                </ul>
                                <div class="btn-detail">
                                    <a href="{{ url('/user/bookingDetails') }}/{{ base64_encode($arr->id) }}">View Booking</a>

                                </div>
                            </div>

                            <div class="row user-detail-row ">
                                <div class="col-md-12 progress-ba">
                                    <h5>You cancelled all traveler(s). Refund of PKR 255 processed.</h5>
                                    <ul class="multi-step-bar">
                                        <li class="active">Booking Cancelled</li>
                                        <li>Refund Processed</li>
                                        <li>Credit in Account</li>
                                    </ul>


                                </div>
                                <ul class="hint-text">
                                    <li>
                                        <p>PKR 125 has been processed in Your Account - refund with RRN number WMBK08980480291 has been processed to your account.<br>It takes 5-12 working days for refunds to reflect in Account.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                            
                        
                    @endforeach
                @else

                    <div class="row upcom-row">
                        <div class="col-md-3 upcom-img">
                            <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="200px">
                        </div>
                        <div class="col-md-9 upcom-text">
                            <h5>Looks empty, you've no failed bookings.</h5>
                            <p>When you book a trip, you will see your itinerary here.</p>
                            <a href="#">PLAN A TRIP</a>
                        </div>
                    </div>

                @endif

            @else

                <div class="row upcom-row">
                    <div class="col-md-3 upcom-img">
                        <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="200px">
                    </div>
                    <div class="col-md-9 upcom-text">
                        <h5>Looks empty, you've no failed bookings.</h5>
                        <p>When you book a trip, you will see your itinerary here.</p>
                        <a href="#">PLAN A TRIP</a>
                    </div>
                </div>    
            @endif

            </div>
        </div>
    </div>

</section>


@endsection