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
        border-bottom: 1px dotted;
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
    }

    .user-detail p {
        padding: 5px 0;
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


    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }


    /* =====================================================responsive css below 768px =======================================================*/
    @media screen and (max-width:767px) {
        .tabs {
            padding: 0;
            box-shadow: none;
        }

        .tabs__label {
            padding: 15px 15px 10px 15px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            width: 25%;
            text-align: center;
        }

        .tabs__radio:checked+.tabs__label {
            font-size: 14px;
            font-weight: 600;
            color: #009578;
            border-bottom: 5px solid #009578;
            background: aliceblue;
            border-radius: 10px;
        }

        .tabs__label i {
            padding-right: 0px;
            margin: auto;
        }

        .tabs__content {
            padding: 0;
            margin-top: 0px;
            border-bottom: none;
        }

        .icontext i {
            width: 40px;
            height: 40px;
            font-size: 16px;
            left: -15px;
        }

        .btn-detail {
            position: absolute;
            top: 25px;
            right: 5px;
        }

        .btn-detail a {
            min-width: 235px;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 500;
        }

        .text-detail {
            padding: 20px 0px 8px 0px;
        }

        .icontext .text {
            padding-left: 40px;
        }

        .text-detail ul {
            padding-left: 15px;
            display: block;
            margin: 0;
        }

        .user-detail-row .user-detail {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-detail h6 {
            font-weight: 800;
            font-size: 14px;
        }

        .upcom-row {
            width: 100%;
            padding: 0px 0;
        }

        .upcom-row h5 {
            font-weight: 800;
            font-size: 16px;
            text-transform: capitalize;
        }

        .upcom-row p {
            font-size: 14px;
            margin: 8px 0 30px 0;
        }

        .upcom-text {
            padding: 0 5px;
        }

        .tabs__content .content {
            margin-bottom: 30px;
        }

        .multi-step-bar {
            margin: 1px auto 0px;
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
        }

        .hint-text p {
            font-size: 12px;
        }

        .user-detail-row {
            padding: 7px;
        }

        .user-detail p {
            padding: 3px 0;
        }
    }


    /* =========================================responsive below 1024px css============================================== */
    /* =========================================responsive below 1024px css============================================== */

    @media screen and (max-width:1023px) and (min-width:768px) {
        .tabs {
            padding: 0;
            box-shadow: none;
        }

        .tabs__label {
            padding: 15px 15px 10px 15px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            width: 25%;
            text-align: center;
        }

        .tabs__radio:checked+.tabs__label {
            font-size: 14px;
            font-weight: 600;
            color: #009578;
            border-bottom: 5px solid #009578;
            background: aliceblue;
            border-radius: 10px;
        }

        .tabs__label i {
            padding-right: 0px;
            margin: auto;
        }

        .tabs__content {
            padding: 0;
            margin-top: 0px;
            border-bottom: none;
        }

        .icontext i {
            width: 50px;
            height: 50px;
            font-size: 20px;
            left: -27px;
        }

        .btn-detail {
            position: absolute;
            top: 25px;
            right: 25px;
        }

        .btn-detail a {
            min-width: 235px;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 500;
        }

        .text-detail {
            padding: 20px 0px 20px 0px;
        }

        .icontext .text {
            padding-left: 40px;
        }

        .text-detail ul {
            padding-left: 15px;
        }

        .user-detail-row .user-detail {
            padding: 0px 0;
            width: 50%;
        }

        .user-detail h6 {
            font-weight: 800;
            font-size: 14px;
        }

        .upcom-row {
            width: 100%;
            padding: 0px 0;
            display: flex;
            align-items: center;
        }

        .upcom-row .upcom-img {
            max-width: 30%;
            flex: 0 0 30%;
        }

        .upcom-row h5 {
            font-weight: 800;
            font-size: 16px;
            text-transform: capitalize;
        }

        .upcom-row p {
            font-size: 14px;
            margin: 8px 0 30px 0;
        }

        .upcom-row .upcom-text {
            padding: 0 5px;
            max-width: 68%;
            flex: 0 0 68%;
        }

        .tabs__content .content {
            margin-bottom: 50px;
        }

        .multi-step-bar {

            display: flex;
            justify-content: space-between;
        }


    }
</style>

@endsection

@section('current_page_js')

<script>
    $('.tab1').on('click', function() {
        $(".bread-sec").css('background-color', '#000');
    })
    $('.tab2').on('click', function() {
        $(".bread-sec").css('background-color', '#fff');
    })
    $('.tab3').on('click', function() {
        $(".bread-sec").css('background-color', '#f3f3f3');
    })
    $('.tab4').on('click', function() {
        $(".bread-sec").css('background-color', '#ccc');
    })
</script>

<!-- <script>
    var site_url = $("#baseUrl").val();
    $('#tab1').on('click', function() {
        document.location.href = site_url + "/user/spaceBookingList";
    })
    $('#tab2').on('click', function() {
        document.location.href = site_url + "/user/spaceBookingList-upcoming";
    })
    $('#tab3').on('click', function() {
        document.location.href = site_url + "/user/spaceBookingList-cancel";
    })
    $('#tab4').on('click', function() {
        document.location.href = site_url + "/user/spaceBookingList-approval";
    })
</script> -->


<script type="text/javascript">
   function cancelRequestBooking(id) {
      toastDelete.fire({}).then(function(e) {
         if (e.value === true) {
            // alert(id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               type: 'POST',
               url: "{{url('/user/cancelSpaceBookingRequest')}}",
               data: {
                  id: id,
                  _token: CSRF_TOKEN
               },
               dataType: 'JSON',
               success: function(results) {
                  // $("#row" + id).remove();
                  // console.log(results);
                  success_noti(results.msg);
                  setTimeout(function() {
                     window.location.reload()
                  }, 1000);
               }
            });
         } else {
            e.dismiss;
         }
      }, function(dismiss) {
         return false;
      })
   }
</script>

<!-- <script>
    $(document).ready(function() {

        // var url = document.location.toString();
        // if (url.match('#')) {
        //     $('.nav-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
        // } 

        // //To make sure that the page always goes to the top
        // setTimeout(function () {
        //     window.scrollTo(0, 0);
        // },200);

        var url = document.location.toString();
        // alert(url.match('#'));
        // alert(url.split('#')[1]);

        // alert($('.tabs__radio input[type="radio' + url.split('#')[1] + '"]')[0]);
        // $('.nav-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
        // alert($('.tabs__radio input[type="radio"]').val());
        // alert([href="#' + url.split('#')[1] + '"]);
        if (url.match('#')) {
            // console.log('checking');
            // console.log(url.split('#')[1]);
            console.log('.tabs__radio-tabs a[href="#' + url.split('#')[1] + '"]');
            $('.tabs__radio-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
        }

        //To make sure that the page always goes to the top
        setTimeout(function() {
            window.scrollTo(0, 0);
        }, 200);




    });
</script> -->

@endsection

@section('content')


<section class="bread-sec">
    <div class="container">
        <div class="row bread-row">

            <div class="col-md-12 bread-col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/user/profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Space Booking</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
</section>

<section class="tab-listsec">

    <div class="container">
        <!--  -->
        <div class="tabs">
            <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
            <label for="tab1" id="tab1" class="tabs__label"> <i class='bx bxs-receipt'></i>Completed({{(count($bookingList->where('booking_status', '!=' ,'canceled')))}})</label>
            <div class="tabs__content">

                @if (!$bookingList->isEmpty())

                @if(count($bookingList) > 0)

                @foreach ($bookingList->where('booking_status', '!=' ,'canceled') as $arr)

                <!-- @if($arr->check_in_date > Carbon\Carbon::today()->format('Y-m-d'))
                    @php echo 'upcoming' @endphp
                @else
                    @php echo 'past' @endphp
                @endif -->

                <div class="content">
                    <div class="text-detail">
                        <div class="icontext">
                            <i class='bx bxs-hotel'></i>
                            <div class="text">
                                <h3>{{ $arr->space_name }}</h3>
                                <p>{{ $arr->space_address }}, </p>
                            </div>
                        </div>

                        <ul>
                            <li>Booking ID - {{ $arr->id }}</li>
                            <li>{{ $arr->payment_status }}</li>
                            <li>@if($arr->payment_mode==2){{'Partial Payment'}}@elseif($arr->payment_mode==1){{'100% Online Payment'}}@else{{'Pay at Desk'}}@endif</li>
                        </ul>
                        <div class="btn-detail">
                            <a href="{{ url('/user/spaceBookingDetails') }}/{{ base64_encode($arr->id) }}">View Booking</a>

                        </div>
                    </div>

                    <div class="row user-detail-row ">
                        <div class="col-md-3 user-detail">
                            <p><i class='bx bxs-calendar'></i>FROM</p>
                            <h6>{{ $arr->check_in_date }} <span></span></h6>
                            <!-- <strong>new Delhi</strong> -->
                        </div>
                        <div class="col-md-3 user-detail">
                            <p><i class='bx bxs-calendar'></i>TO</p>
                            <h6>{{ $arr->check_out_date }} <span></span></h6>
                            <!-- <strong>new Delhi</strong> -->
                        </div>


                        <div class="col-md-3 user-detail">
                            <p><i class='bx bxs-store'></i>Space Type</p>
                            <h6>{{ $arr->category_name }} </h6>
                            <!-- <strong>new Delhi</strong> -->
                        </div>


                    </div>
                </div>

                @endforeach
                <!-- <div class="row gird-event" id="filterdata">
                    <div class="col-md-12">
                        <div class=""> bookingList->fragment('tab1')->links() </div>
                    </div>
                </div> -->

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
            <label for="tab2" id="tab2" class="tabs__label"> <i class='bx bxs-send'></i>Upcoming({{(count($upcomingBookingList))}})</label>
            <div class="tabs__content">

                @if (!$upcomingBookingList->isEmpty())

                @if(count($upcomingBookingList->where('check_out_date', '>=', Carbon\Carbon::today()->format('Y-m-d'))->where('booking_status', '!=' ,'canceled')) > 0)

                @foreach ($upcomingBookingList->where('check_out_date', '>=', Carbon\Carbon::today()->format('Y-m-d')) as $arr)

                <div class="content">
                    <div class="text-detail">
                        <div class="icontext">
                            <i class='bx bxs-hotel'></i>
                            <div class="text">
                                <h3>{{ $arr->space_name }}</h3>
                                <p>{{ $arr->space_address }}, </p>
                            </div>
                        </div>

                        <ul>
                            <li>Booking ID - {{ $arr->id }}</li>
                            <li>{{ $arr->payment_status }}</li>
                            <li>@if($arr->payment_mode==2){{'Partial Payment'}}@elseif($arr->payment_mode==1){{'100% Online Payment'}}@else{{'Pay at Desk'}}@endif</li>
                        </ul>
                        <div class="btn-detail">
                            <a href="{{ url('/user/spaceBookingDetails') }}/{{ base64_encode($arr->id) }}">View Booking</a>

                        </div>
                    </div>

                    <div class="row user-detail-row ">
                        <div class="col-md-3 user-detail">
                            <p><i class='bx bxs-calendar'></i>FROM</p>
                            <h6>{{ $arr->check_in_date }} <span></span></h6>
                            <!-- <strong>new Delhi</strong> -->
                        </div>
                        <div class="col-md-3 user-detail">
                            <p><i class='bx bxs-calendar'></i>TO</p>
                            <h6>{{ $arr->check_out_date }} <span></span></h6>
                            <!-- <strong>new Delhi</strong> -->
                        </div>


                        <div class="col-md-3 user-detail">
                            <p><i class='bx bxs-store'></i>Space Type</p>
                            <h6>{{ $arr->category_name }} </h6>
                            <!-- <strong>new Delhi</strong> -->
                        </div>


                    </div>
                </div>

                @endforeach
                <!-- <div class="row gird-event" id="filterdata">
                    <div class="col-md-12">
                        <div class=""> upcomingBookingList->fragment('tab2') </div>
                    </div>
                </div> -->

                @else

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

                @endif

                @else

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

                @endif

            </div>
          

            <input type="radio" class="tabs__radio" name="tabs-example" id="tab3">
            <label for="tab3" id="tab3" class="tabs__label tab-3"> <i class='bx bx-x'></i>Cancelled({{(count($cancelBookingList))}})</label>
            <div class="tabs__content">

                @if (!$cancelBookingList->isEmpty())

                @if(count($cancelBookingList->where('booking_status', 'canceled')) > 0)

                @foreach ($cancelBookingList->where('booking_status', 'canceled') as $arr)

                <div class="content cancelled-content">
                    <div class="text-detail">
                        <div class="icontext">
                            <i class='bx bxs-hotel'></i>
                            <div class="text">
                                <h3>{{ $arr->space_name }}</h3>
                                <p>{{ $arr->space_address }}, </p>
                            </div>
                        </div>

                        <ul>
                            <li>Cancelled on {{ date('d-m-Y' , strtotime($arr->canceled_at)) }}</li>
                            <li>Booking ID - {{ $arr->space_booking_id }}</li>
                            <li>{{ $arr->payment_status }}</li>
                            <li>@if($arr->payment_mode==2){{'Partial Payment'}}@elseif($arr->payment_mode==1){{'100% Online Payment'}}@else{{'Pay at Desk'}}@endif</li>
                        </ul>
                        <div class="btn-detail">
                            <a href="{{ url('/user/cancelledSpaceBooking') }}/{{ base64_encode($arr->id) }}">View Booking</a>
                        </div>
                    </div>

                </div>
                <div class="row user-detail-row ">
                    <div class="col-md-12 progress-ba">
                        <h5>You cancelled all traveler(s). Refund of PKR {{$arr->refund_amount ?? ''}} processed.</h5>
                        <ul class="multi-step-bar">
                            <li class="<? if($arr->refund_status=='pending' or $arr->refund_status=='processing' or $arr->refund_status=='confirmed'){ echo "active"; } ?>">Booking Cancelled <br>{{$arr->canceled_at}}</li>
                            <li class="<? if($arr->refund_status=='processing' or $arr->refund_status=='confirmed'){ echo "active"; } ?>">Refund Processed <br>@if($arr->refund_status=='processing' or $arr->refund_status=='confirmed'){{$arr->refund_processed_at}}@endif</li>
                            <li class="<? if($arr->refund_status=='confirmed'){ echo "active"; } ?>">Credit in Account <br>@if($arr->refund_status=='confirmed'){{$arr->refund_credited_at}}@endif</li>
                        </ul>


                    </div>
                    <ul class="hint-text">
                        <li>
                            <!-- <p>PKR 125 has been processed in Your Account - refund with RRN number WMBK08980480291 has been processed to your account.<br>It takes 5-12 working days for refunds to reflect in Account.</p> -->
                            <p>PKR {{$arr->refund_amount ?? ''}} has been processed in Your Account.<br>It takes 5-12 working days for refunds to reflect in Account.</p>
                        </li>
                    </ul>
                </div>

                @endforeach
                <!-- <div class="row gird-event"  id="filterdata">
                    <div class="col-md-12">
                        <div class=""> cancelBookingList->links() </div>
                    </div>
                </div> -->
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
                        <img src="{{ url('/resources/assets/img/booking/upcoming_booking.png') }}" alt="" width="150px">
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
            <label for="tab4" id="tab4" class="tabs__label"> <i class='bx bxs-receipt'></i>Approval({{(count($space_booking_request))}})</label>
            <div class="tabs__content">

                @if (!$space_booking_request->isEmpty())

                    @if(count($space_booking_request) > 0)

                        @foreach ($space_booking_request as $arr)

                        <!-- @if($arr->check_in_date > Carbon\Carbon::today()->format('Y-m-d'))
                            @php echo 'upcoming' @endphp
                        @else
                            @php echo 'past' @endphp
                        @endif -->

                        <div class="content">
                            <div class="text-detail">
                                <div class="icontext">
                                    <i class='bx bxs-hotel'></i>
                                    <div class="text">
                                        <h3>{{ $arr->space_name }}</h3>
                                        <p>{{ $arr->space_address }}, </p>
                                    </div>
                                </div>

                                <ul>
                                    <!-- <li>Booking ID - {{ $arr->id }}</li> -->
                                    <li>@if($arr->payment_status==0) {{ "Pending" }} @else {{ "Paid" }} @endif</li>
                                    <li>@if($arr->payment_mode==2){{'Partial Payment'}}@elseif($arr->payment_mode==1){{'100% Online Payment'}}@else{{'Pay at Desk'}}@endif</li>
                                </ul>
                                <!-- <div class="btn-detail">
                                    <a href="{{ url('/user/spaceBookingDetails') }}/{{ base64_encode($arr->id) }}">View Booking</a>

                                </div> -->
                            </div>

                            <div class="row user-detail-row ">
                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-calendar'></i>FROM</p>
                                    <h6>{{ $arr->check_in_date }} <span></span></h6>
                                    <!-- <strong>new Delhi</strong> -->
                                </div>
                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-calendar'></i>TO</p>
                                    <h6>{{ $arr->check_out_date }} <span></span></h6>
                                    <!-- <strong>new Delhi</strong> -->
                                </div>

                                <div class="col-md-3 user-detail">
                                    <p><i class='bx bxs-store'></i>Space Type</p>
                                    <h6>{{ $arr->category_name }} </h6>
                                </div>


                            </div>

                            <div class="row user-detail-row ">
                                @if($arr->payment_status == 0)
                                    @if($arr->request_status == 1 and $arr->approve_status == 1)
                                        <div class="col-md-4 user-detail">
                                            <a href="{{url('space-checkout')}}?space_id={{$arr->space_id}}&check_in={{date('d-m-Y',strtotime($arr->check_in_date))}}&check_out={{date('d-m-Y',strtotime($arr->check_out_date))}}"><i class='bx bx-spreadsheet'></i> Invoice Created - Check & Pay</a>
                                        </div>
                                    @endif    

                                    <div class="col-md-4 user-detail">
                                        <!-- <a type="button" href="#"><i class='bx bx-x-circle'></i> Cancel Booking Request</a> -->
                                        <a  href="javascript:void(0)" type="button" onclick="cancelRequestBooking('<?php echo $arr->id; ?>');"><i class='bx bx-x-circle'></i> Cancel Booking Request</a>
                                    </div>
                                @else
                                    <div class="col-md-4 user-detail">
                                        <a href="#"><i class='bx bx-check-circle'></i> Booking Completed</a>
                                    </div>
                                @endif    
                            </div>
                        </div>

                        @endforeach
                        <!-- <div class="row gird-event" id="filterdata">
                            <div class="col-md-12">
                                <div class=""> space_booking_request->fragment('tab1')->links() </div>
                            </div>
                        </div> -->

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

        </div>
    </div>

</section>


@endsection