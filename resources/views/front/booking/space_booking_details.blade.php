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
<script>
    $("#cancelbtn").click(function() {
        // alert('shdfsd');
        var form = $("#spaceBookingCancel_form");
        form.validate({
            rules: {
                cancel_reason: {
                    required: true,
                },
            },
            messages: {
                cancel_reason: "Please Choose One Reason for Cancel."
            },
        });
        if (form.valid() === true) {
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            $('#cancelbtn').prop('disabled', true);
            $('#cancelbtn').html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            );
            // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: site_url + '/user/cancelSpaceBooking',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        setTimeout(function() {
                            // window.location.reload()
                            window.location.href = site_url + "/user/spaceBookingList";
                        }, 1000);
                    } else {
                        error_noti(response.msg);
                        $('#cancelbtn').html(
                            `<span class=""></span>Submit`
                        );
                        $('#cancelbtn').prop('disabled', false);
                    }
                }
            });
            // event.preventDefault();
        }
    });
</script>
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
                        <li class="breadcrumb-item"><a href="{{ url('/user/spaceBookingList') }}">Space Booking</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking ID: #VXMN{{ $bookingDetails->space_booking_id }}</li>
                    </ol>
                </nav>
                <h5>Your Space booking has been completed</h5>
                <div class="id">
                    <div class="id-text">
                        <p>Booking ID# <span>#VXMN{{ $bookingDetails->space_booking_id }}</span> &nbsp; &nbsp; &nbsp;
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
                        <h5>{{ $bookingDetails->space_name }} <br> <span>{{ $bookingDetails->space_address }}</span></h5>
                        <div class="status">
                            Completed
                        </div>
                    </div>
                    <div class="loc">
                        <div class="da">
                            <h6> <span>CHECK IN</span>{{ date('d M, D' , strtotime($bookingDetails->check_in_date)) }} </h6>
                            <small>Landmark: {{ $bookingDetails->neighbor_area }}</small>
                        </div>
                        <div class="ico">
                            <i class='bx bx-buildings'></i>
                            <div class="cm__travelLine appendTop15"></div>
                        </div>
                        <div class="da">
                            <h6><span>CHECK OUT</span>{{ date('d M, D' , strtotime($bookingDetails->check_out_date)) }} </h6>
                            <small>Landmark: {{ $bookingDetails->neighbor_area }}</small>
                        </div>
                    </div>
                    <div class="deta">
                        <h5>RoadnStays & Co.</h5>
                        <p>E-mail - info@roadnstays.com</p>
                        <p>What's up - +92 342 4514629</p>
                        <!-- <p>{{ $bookingDetails->space_name }}</p> -->

                    </div>
                    <div class="down-i">
                        <a style="text-decoration:none;" target="blank" href="{{ url('/user/spaceBookingInvoice') }}/{{ base64_encode($bookingDetails->id) }}"><i class='bx bx-download'></i>Download Invoice</a>
                    </div>

                </div>
                <div class="side-b">
                    <div class="box-1">
                        <h5>PRICING BREAKUP</h5>
                        <ul>
                            <li class="text">Space Charges</li>
                            <li>PKR {{ $bookingDetails->price_per_night }}</li>
                        </ul>
                        @if(@isset($bookingDetails->tax_percentage))
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
                        @endif
                        @if($bookingDetails->partial_payment_status == 1)
                        <ul>
                            <li class="text">Online Paid</li>
                            <li>PKR {{ $bookingDetails->online_paid_amount }}</li>
                        </ul>
                        <ul>
                            <li class="text">Pay at Desk</li>
                            <li>PKR {{ $bookingDetails->remaining_amount_to_pay }}</li>
                        </ul>
                        @endif
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
                                @endif</li>
                        </ul>
                        @if(($bookingDetails->check_in_date) > date('Y-m-d'))
                            <ul>
                                <li><a style="text-decoration:none;" href="#" data-toggle="modal" data-target="#exampleModalCenter_space">Cancel your Booking</a></li>
                            </ul>
                        @endif
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
                <p>Space Staff or our service experts might connect with you on below contact details.</p>
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


<!-- modal popup text here -->

<div class="modal fade" id="exampleModalCenter_space" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-cancel">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cancel Your Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-textcancel">

                <div class="canceltop">
                    <h5>Cancellation Policy</h5>
                    @if(!empty($bookingDetails->min_hrs_percentage) && !empty($bookingDetails->max_hrs_percentage))
                    <p>Up to 24 hours before checkin, changes can be made with a {{$bookingDetails->min_hrs_percentage}}% fee and up to 48 hours before checkin, changes can be made with a {{$bookingDetails->max_hrs_percentage}}% fee.</p>
                    @endif
                    @if($bookingDetails->payment_mode == 1)
                        <ul>
                            <li>{{ $bookingDetails->space_name }}</li>
                            <li>
                                @if(!empty($bookingDetails->min_hrs))
                                    @if($remaining_hours < $bookingDetails->min_hrs)
                                        {{ $deduction_percentage = $bookingDetails->min_hrs_percentage}}% fee   
                                    @elseif($remaining_hours > $bookingDetails->min_hrs && $remaining_hours < $bookingDetails->max_hrs)
                                        {{ $deduction_percentage = $bookingDetails->max_hrs_percentage}}% fee   
                                    @elseif($remaining_hours > $bookingDetails->max_hrs)    
                                        {{ $deduction_percentage = 'Free'}} 
                                    @endif
                                @else
                                    @php $deduction_percentage = 'Free' @endphp  
                                @endif
                            </li>
                        </ul>
                        <ul>
                            <li>Total Cost</li>
                            <li>PKR {{ $bookingDetails->total_amount }}</li>
                        </ul>
                        <ul>
                            <li>Cancellation fee</li>
                            @if($deduction_percentage == 'Free')
                            <li>Free</li>
                            @else
                            <li>PKR {{ $deduction_amount = $bookingDetails->total_days*(($bookingDetails->price_per_night * $deduction_percentage)/100) }}</li>
                            @endif
                        </ul>
                        <ul>
                            <li><b>Refund amount</b></li>
                            @if($deduction_percentage == 'Free')
                            <li><b>PKR {{ $refund_amount = $bookingDetails->total_amount }}</b></li>
                            @else
                            <li><b>PKR {{ $refund_amount = $bookingDetails->total_amount - $deduction_amount }}</b></li>
                            @endif
                        </ul>
                    @elseif($bookingDetails->payment_mode == 2)
                        @if(!empty($bookingDetails->min_hrs))
                            @if($remaining_hours < $bookingDetails->min_hrs)
                                @php $deduction_percentage = $bookingDetails->min_hrs_percentage @endphp  
                            @elseif($remaining_hours > $bookingDetails->min_hrs && $remaining_hours < $bookingDetails->max_hrs)
                                @php $deduction_percentage = $bookingDetails->max_hrs_percentage @endphp   
                            @elseif($remaining_hours > $bookingDetails->max_hrs)    
                                @php $deduction_percentage = 'Free' @endphp 
                            @endif
                        @else
                            @php $deduction_percentage = 'Free' @endphp  
                        @endif

                         <!-- {{$bookingDetails->total_days}} -->
                         <!-- {{$bookingDetails->price_per_night}} -->
                         <!-- {{$deduction_percentage}} -->

                        <ul>
                            <li>{{ $bookingDetails->total_days }} x {{ $bookingDetails->space_name }}</li>
                            <li>{{$deduction_percentage}}%</li>
                        </ul>
                        <ul>
                            <li><b>Refund amount</b></li>
                            @if($deduction_percentage != 'Free')
                                @php $deduction_amount = $bookingDetails->total_days*(($bookingDetails->price_per_night * $deduction_percentage)/100) @endphp
                                @if($bookingDetails->partial_payment_status == 1)
                                    @if($bookingDetails->online_paid_amount > $deduction_amount)
                                        <li><b>PKR {{ $refund_amount = $bookingDetails->online_paid_amount - $deduction_amount }}</b></li>
                                    @else
                                        <li><b>PKR {{ $refund_amount = 0 }}</b></li>
                                    @endif
                                @else
                                    <li><b>PKR {{ $refund_amount = $bookingDetails->total_amount }}</b></li>
                                @endif
                            @else
                                <li><b>PKR {{ $refund_amount = $bookingDetails->total_amount }}</b></li>
                            @endif    
                        </ul>
                    @else($bookingDetails->payment_mode == 3)
                        <ul>
                            <li>{{ $bookingDetails->total_days }} x {{ $bookingDetails->space_name }}</li>
                            <li>Free</li>
                        </ul>
                        <!-- <ul>
                            <li><b>Refund amount</b></li>
                            <li><b>PKR {{ $refund_amount = $bookingDetails->total_amount }}</b></li>
                        </ul> -->
                    @endif
                </div>
                <div class="cancelmiddle">
                    <h6>Tell us the reason for canceling</h6>
                    <p>Please complete your Cancelation Process to choose one Option.</p>
                    <form action="" id="spaceBookingCancel_form">
                        @csrf
                        <!-- <fieldset> -->
                        <input type="hidden" name="booking_id" value="{{$bookingDetails->id}}">
                        <input type="hidden" name="refund_amount" value="{{$refund_amount}}">

                        <input type="radio" id="travelers" name="cancel_reason" value="Change in the number or needs of travelers">
                        <label for="travelers">Change in the number or needs of travelers</label><br>
                        <input type="radio" id="destination" name="cancel_reason" value="Change of dates or destination">
                        <label for="destination">Change of dates or destination</label><br>
                        <input type="radio" id="reason" name="cancel_reason" value="Unable to travel due to Personal reason">
                        <label for="reason">Unable to travel due to Personal reason</label><br>
                        <input type="radio" id="accommodation" name="cancel_reason" value="Found a different accommodation option">
                        <label for="accommodation">Found a different accommodation option</label><br>
                        <input type="radio" id="need" name="cancel_reason" value="Made bookings for same dates - canceled the ones I don't need">
                        <label for="need">Made bookings for same dates - canceled the ones I don't need</label><br>
                        <input type="radio" id="off" name="cancel_reason" value="Personal reasons/Trip called off">
                        <label for="off">Personal reasons/Trip called off</label><br>
                        <input type="radio" id="none" name="cancel_reason" value="None of the above">
                        <label for="none">None of the above</label><br>
                        <label for="cancel_reason" class="error" style="display:none;">Please choose one.</label><br>
                        <label for="detail">Please Tell us in detail-</label><br>
                        <textarea name="cancel_details" id="" cols="51" rows="4" placeholder="Write from here..."></textarea>
                        <!-- </fieldset>     -->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn cancelbtn" id="cancelbtn">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection