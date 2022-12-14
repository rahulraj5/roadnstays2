@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
    .d-non {
        display: none;
    }
</style>
@endsection
@section('current_page_js')
<script>
    $('#check_n_pay').click(function() {
        $('#invoice_n_pay').removeClass('d-non');

    });
</script>

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

<script>
    $("#request_booking").click(function() {
        var form = $("#bookingRequest_form");
        form.validate({
            rules: {
                email: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                document_type: {
                    required: true,
                },
                document_number: {
                    required: true,
                },
                front_document_img: {
                    required: true,
                },
                back_document_img: {
                    required: true,
                },
            },
        });
        if (form.valid() === true) {
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            $('#request_booking').prop('disabled', true);
            $('#request_booking').html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            );
            // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: "{{url('/user/requestBookingSpace')}}",
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        setTimeout(function() {
                           window.location.href = site_url + "/user/spaceBookingList"
                        }, 1000);
                        // setTimeout(function() {
                        //     window.location.reload()
                        // }, 2500);
                    } else {
                        error_noti(response.msg);
                        // $('#request_booking').html(
                        //    `<span class=""></span>Update`
                        // );
                        $('#request_booking').prop('disabled', false);
                    }
                }
            });
        }
    });
</script>

@endsection
@section('content')
<main id="main" class="main-body">
    <!-- paste here html code -->
    <section style="padding-top: 80px; background-color: #f6f6f6;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="javascript:history.back()"><i class="right fas fa-angle-left"></i>Back</a>
                </div>
                <div class="col-md-12 rew-heding">
                    <h3>Review your Space Booking</h3>
                </div>
                <div class="col-md-9">
                    @if(!empty($details))
                        @php $expense = $details->expense_value @endphp
                        @php $discount = $details->discount @endphp
                    @else
                        @php $expense = 0 @endphp
                        @php $discount = 0 @endphp
                    @endif

                    @php $total_amount = ($booking_days * $space_data->price_per_night) + $space_data->cleaning_fee + $space_data->city_fee + $space_data->tax_percentage + $expense - $discount @endphp
                    @if($space_data->payment_mode == 2)
                        @php $online_payable_amount = round((($total_amount * $space_data->online_payment_percentage)/100)) @endphp
                        @php $at_desk_payable_amount = $total_amount - $online_payable_amount @endphp
                    @else
                        @php $online_payable_amount = $total_amount; @endphp
                        @php $at_desk_payable_amount = 0; @endphp
                    @endif


                    @if($space_data->booking_option == 2)
                        @if($checkRequest!=0)
                            @if($space_data->payment_mode == 0)
                                <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="{{url('/spacebookingorderoffline')}}" enctype="multipart/form-data">
                            @else 
                                <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="{{url('/bookingSpaceOrder')}}" enctype="multipart/form-data">
                            @endif 
                        @else
                            <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="" enctype="multipart/form-data">
                        @endif
                    @else
                        @if($space_data->payment_mode == 0)
                            <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="{{url('/spacebookingorderoffline')}}" enctype="multipart/form-data">
                        @else
                            <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="{{url('/bookingSpaceOrder')}}" enctype="multipart/form-data">
                        @endif
                    @endif

                        @csrf

                        @if($space_data->payment_mode == 2 and $space_data->booking_option != 3)
                            <input type="hidden" name="online_payable_amount" value="{{$online_payable_amount}}">
                            <input type="hidden" name="at_desk_payable_amount" value="{{$at_desk_payable_amount}}">
                            <input type="hidden" name="total_amount" value="{{$total_amount}}">
                            <input type="hidden" name="partial_payment_status" value="1">
                        @else
                            <input type="hidden" name="online_payable_amount" value="{{$total_amount}}">
                            <input type="hidden" name="at_desk_payable_amount" value="{{$at_desk_payable_amount}}">
                            <input type="hidden" name="total_amount" value="{{$total_amount}}">
                            <input type="hidden" name="partial_payment_status" value="0">
                        @endif

                        <input type="hidden" name="user_id" value="{{Auth::check()}}">
                        <input type="hidden" name="space_id" value="{{$space_data->space_id}}">
                        <input type="hidden" name="space_price" value="{{$total_amount}}">
                        <input type="hidden" name="check_in" value="{!! date('Y-m-d', strtotime($check_in)) !!}">
                        <input type="hidden" name="check_out" value="{!! date('Y-m-d', strtotime($check_out)) !!}">
                        <input type="hidden" name="cleaning_fee" value="{{$space_data->cleaning_fee}}">
                        <input type="hidden" name="city_fee" value="{{$space_data->city_fee}}">
                        <input type="hidden" name="tax_percentage" value="{{$space_data->tax_percentage}}">
                        <input type="hidden" name="total_days" value="{{$booking_days}}">
                        <input type="hidden" name="total_room" value="{{$space_data->room_number}}">
                        <input type="hidden" name="total_member" value="{{$space_data->guest_number}}">
                        <div class="infobox">
                            <div class="revie-box">
                                <div class="page-detail">
                                    <h5 class="p-0 m-0 citi-omr">{{$space_data->space_name}}</h5>
                                    <p> {{$space_data->space_address}}, {{$space_data->city}}, {{$space_data->name}}</p>
                                </div>
                                <div class="page-detail-sid">
                                    <img class="rtnb" src="{{url('public/uploads/space_images/')}}/{{$space_data->image}}" alt="Another alt text" style="width: 100px;">
                                </div>
                            </div>
                            <div class="runs-andpay">
                                <div class="date1">
                                    <span>CHECK IN</span>
                                    <h3>{{$check_in}}</h3>
                                    <small>{{$start_day}}</small>
                                </div>
                                <div class="date3">
                                    <small>{{$booking_days}} Night</small><br>
                                    <i class='bx bx-transfer-alt'></i>
                                </div>
                                <div class="date1">
                                    <span>CHECK OUT</span>
                                    <h3> {{$check_out}}</h3>
                                    <small>{{$end_day}}</small>
                                </div>
                                <div class="date2">
                                    <h6> {{$space_data->guest_number}} Guests | {{$space_data->room_number}} Rooms | {{$space_data->bedroom_number}} BedRooms | {{$space_data->bathroom_number}} BathRooms</h6>
                                </div>
                            </div>
                            <div class="room-praci">
                                <h5>{{$space_data->space_name}} ({{$space_category->category_name}})<br><small>{{$space_data->guest_number}}(max) Guests</small></h5>
                                <div class="">
                                    <!-- <h5 class="mt-3">Price Includes </h5>
                                    <ul>
                                        <li>No meals included</li>
                                        <li>Non-Refundable | On Cancellation, You will not get any refund </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>

                        @if($space_data->booking_option == 1)
                            <div class="container">
                                <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                    <div class="col-md-12 p-0 mt-3">
                                        <div class="bankpay">
                                            <h4 class="mt-2">
                                                <i class='bx bxs-user-badge'></i><b> Space 1:</b> 2 Adults {{$space_data->bed_type}}
                                            </h4>
                                            <ul class="brekfasr">
                                                @foreach($space_features as $features)
                                                <li><i class='bx bx-check'></i>{{$features->space_feature_name}}</li>
                                                <!-- <li><i class='bx bx-check'></i> Free parking</li>
                                                    <li><i class='bx bx-check'></i> Free WiFi </li> -->
                                                @endforeach
                                            </ul>
                                            <div class="bank-bar">
                                                <fieldset>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email*</label>
                                                        <input type="text" class="form-control" id="email" name="email" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="first_name">First name*</label>
                                                        <input type="text" class="form-control" id="first_name" name="first_name" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="last_name">Last name*</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile">Mobile phone number *</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile">Choose Identity Document *</label>
                                                        <select class="form-control" name="document_type" id="document_type">
                                                            <option value="">Select Document Type</option>
                                                            <option value="Passport">Passport</option>
                                                            <option value="Voter Id">Voter Id</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile">Document Number *</label>
                                                        <input type="text" class="form-control" id="document_number" name="document_number" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile">Upload Front Image of Document *</label>
                                                        <input type="file" class="form-control" id="front_document_img" name="front_document_img" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile">Upload Back Image of Document *</label>
                                                        <input type="file" class="form-control" id="back_document_img" name="back_document_img" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="terms"> <input type="checkbox" name="terms" value="1">
                                                            Remember this for future use</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                    <div class="col-md-12 p-0 mt-3">
                                        <div class="bankpay">
                                            <h5 class="mt-2">
                                            <i class='bx bxs-info-circle'></i> We protect your personal information
                                            </h5>
                                            <div class="bank-bar">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#home">Pay with Alfalah</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div id="home" class="container tab-pane active p-0">
                                                        <br>
                                                        <!-- <img src="{{url('/resources/assets/img/banke.png')}}" class="mb-3 " style=""> -->
                                                        <img src="{{ url('/') }}/resources/dist/img/credit/alfalha.jpg" class="mb-3 " alt="Alfa" style="height: 35 !important; width: 40px !important;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center d-flex p-4">
                                                <input type="submit" name="paynow" class="paynow-btn" value="Paynow">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($space_data->booking_option == 2)
                            @if(Auth::check())
                                @if($checkRequest == 1)
                                    @if($space_booked_count == 0)
                                        @if($space_booking_request->payment_status == 0)
                                            @if($space_booking_request->request_status == 1 and $space_booking_request->approve_status == 1)
                                                <div class="container">
                                                    <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                        <div class="col-md-12 p-0 mt-3">
                                                            <div class="bankpay">
                                                                <h4 class="mt-2">
                                                                    <i class='bx bxs-user-badge'></i><b> Passenger:</b> 1 Adults
                                                                </h4>
                                                                <div class="bank-bar">
                                                                    <fieldset>
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="exampleInputEmail1">Email *</label>
                                                                                    <input type="email" class="form-control" id="email_pas" name="email" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="exampleInputEmail1">Mobile phone number *</label>
                                                                                    <input type="text" class="form-control" id="mobile_pas" name="mobile" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="exampleInputPassword1">First name*</label>
                                                                                    <input type="text" class="form-control" id="fname_pas" name="first_name" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="exampleInputEmail1">Last name*</label>
                                                                                    <input type="text" class="form-control" id="lname_pas" name="last_name" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="mobile">Choose Identity Document *</label>
                                                                                    <select class="form-control" name="document_type" id="document_type" required="">
                                                                                        <option value="">Select Document Type</option>
                                                                                        <option value="Passport">Passport</option>
                                                                                        <option value="Voter Id">Voter Id</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="mobile">Document Number *</label>
                                                                                    <input type="text" class="form-control" id="document_number" name="document_number" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="mobile">Upload Front Image of Document *</label>
                                                                                    <input type="file" class="form-control" id="front_document_img" name="front_document_img" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="mobile">Upload Back Image of Document *</label>
                                                                                    <input type="file" class="form-control" id="back_document_img" name="back_document_img" required="">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="terms"> <input type="checkbox" name="terms" value="1">
                                                                                        Remember this for future use</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                        <div class="col-md-12 p-0 mt-3">
                                                            <div class="bankpay">
                                                                <h5 class="mt-2">
                                                                <i class='bx bxs-info-circle'></i> We protect your personal information
                                                                </h5>
                                                                <div class="bank-bar">
                                                                    <ul class="nav nav-tabs" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" data-toggle="tab" href="#home">Pay with Alfalah</a>
                                                                        </li>
                                                                    </ul>
                                                                    <!-- Tab panes -->
                                                                    <div class="tab-content">
                                                                        <div id="home" class="container tab-pane active p-0">
                                                                            <br>
                                                                            <!-- <img src="{{url('/resources/assets/img/banke.png')}}" class="mb-3 " style=""> -->
                                                                            <img src="{{ url('/') }}/resources/dist/img/credit/alfalha.jpg" class="mb-3 " alt="Alfa" style="height: 35 !important; width: 40px !important;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center d-flex">
                                                                    <!-- <input type="submit" name="paynow" class="paynow-btn" value="Invoice Created - Paynow" style="background-color: green;"> -->
                                                                    <a type="button" class="paynow-btn" id="check_n_pay">Invoice Created - Check & Pay</a>
                                                                    <a href="javascript:void(0)" onclick="cancelRequestBooking('<?php echo $space_booking_request->id; ?>');" class="paynow-btn" style="margin-left: 5px; background-color: red;">Cancel Booking Request</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($space_booking_request->request_status == 1 and $space_booking_request->approve_status == 0)
                                                <div class="container">
                                                    <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                        <div class="col-md-12 p-0 mt-3">
                                                            <div class="bankpay">
                                                                <h5 class="mt-2">
                                                                    <i class='bx bxs-info-circle'></i> Waiting for Approval
                                                                </h5>
                                                                <div class="col-md-12 text-center d-flex p-4">
                                                                    <a href="javascript:void(0)" onclick="cancelRequestBooking('<?php echo $space_booking_request->id; ?>');" class="paynow-btn" style="margin-left: 5px;">Cancel Booking Request</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($space_booking_request->request_status == 0 and $space_booking_request->approve_status == 0)
                                                <div class="container">
                                                    <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                        <div class="col-md-12 p-0 mt-3">
                                                            <div class="bankpay">
                                                                <div class="col-md-12 text-center d-flex p-4">
                                                                    <button type="button" name="request_booking" id="request_booking" class="paynow-btn">Request for Booking</button>
                                                                    <button type="button" name="request_booking" id="request_booking" class="paynow-btn" style="margin-left: 5px;">Request Rejected</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            <div class="container">
                                                <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                    <div class="col-md-12 p-0 mt-3">
                                                        <div class="bankpay">
                                                            <div class="col-md-12 text-center d-flex p-4">
                                                                <button type="button" name="request_booking" id="request_booking" class="paynow-btn">Request for Booking</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            <div class="container">
                                                <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                    <div class="col-md-12 p-0 mt-3">
                                                        <div class="bankpay">
                                                            <div class="col-md-12 text-center d-flex p-4">
                                                                <button type="button" name="request_booking" id="request_booking" class="paynow-btn">Request for Booking</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    @else
                                        <div class="container">
                                            <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                                <div class="col-md-12 p-0 mt-3">
                                                    <div class="bankpay">
                                                        <div class="col-md-12 text-center d-flex p-4">
                                                            <button type="" name="" id="" class="paynow-btn" disabled>You have already Booked</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @else
                                    <div class="container">
                                        <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                            <div class="col-md-12 p-0 mt-3">
                                                <div class="bankpay">
                                                    <div class="col-md-12 text-center d-flex p-4">
                                                        <button type="button" name="request_booking" id="request_booking" class="paynow-btn">Request for Booking</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="container">
                                    <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                        <div class="col-md-12 p-0 mt-3">
                                            <div class="bankpay">
                                                <h5 class="mt-2">
                                                    <i class='bx bxs-info-circle'></i> Signin First for the Booking
                                                </h5>
                                                <div class="col-md-12 text-center d-flex p-4">
                                                    <a href="" data-toggle="modal" data-target="#exampleModal-log-in" class="get-started-btn">SIGN IN</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        @if(!empty($details))
                            <div class="container d-non" id="invoice_n_pay">
                                <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                    <div class="col-md-12 p-0 mt-3">
                                        <div class="bankpay">
                                            <h5 class="mt-2">
                                                <i class='bx bxs-check-circle'></i>Invoice - {{$details->invoice_num ?? ''}}
                                            </h5>
                                            
                                            <table id="myTable">
                                                <tr class="header">
                                                    <th style="width:40%;">Name</th>
                                                    <th style="width:60%;">Status</th>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600;">Space Name:</td>
                                                    <td>{{$details->space_name ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600;">Period:</td>
                                                    <td>{{$details->check_in_date ?? ''}} to {{$details->check_out_date ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600;">Price:</td>
                                                    <td>PKR {{$details->total_amount ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600;">Email:</td>
                                                    <td>{{$details->user_email ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600;">Phone:</td>
                                                    <td>{{$details->user_contact_num ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Cost:</td>
                                                    <td>PKR {{$details->total_amount ?? ''}}</td>
                                                </tr>
                                                @if($expense!=0)
                                                <tr>
                                                    <td>{{$details->expense_name}} Extra Charges:</td>
                                                    <td>PKR {{$expense}}</td>
                                                </tr>
                                                @endif
                                                @if($discount!=0)
                                                <tr>
                                                    <td>{{$details->discount_name}} Discount:</td>
                                                    <td>PKR -{{$discount}}</td>
                                                </tr>
                                                @endif
                                                @if($space_data->payment_mode == 2)
                                                    <tr>
                                                        <td><b>Online Payable Amount </b>:</td>
                                                        <td><b>PKR {{$online_payable_amount}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>At Desk Payable Amount:</td>
                                                        <td>PKR {{$at_desk_payable_amount}}</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td>Total:</td>
                                                    <td>PKR {{$details->total_amount + $expense - $discount}}</td>
                                                </tr>
                                            </table>
                                            <input type="submit" name="paynow" class="paynow-btn" value="Create Order" style="background-color: green;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                    <div class="googl_map">
                        <h3>Google Map</h3>
                        <?php $address = $space_data->space_address . ',' . $space_data->city; ?>
                        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                    </div>
                </div>
                <div class="col-md-3 pl-0">
                    <div class="revie-box-boxi">
                        <div class="image-section">
                            <img src="{{url('public/uploads/space_images/')}}/{{$space_data->image}}" style="width: 260px;">
                            <p>{{$space_data->space_name}}</p>
                        </div>
                        <p><b>4.1/5</b> Very good (82 reviews)</p>
                        <p class="rmn">1 Space: {{$space_data->space_name}} </p>
                        <ul>
                            <li>
                                <b>Check-in:</b> {{$check_in}}
                            </li>
                            <li>
                                <b>Check-out:</b> {{$check_out}}
                            </li>
                            <li>{{$booking_days}}-night stay</li>
                        </ul>
                    </div>
                    <div class="revie-box-boxi">
                        <div class="price-bkp">
                            <h4>PRICE BREAK-UP</h4>
                        </div>
                        <div class="price-left">
                            <h5> 1 Space x {{$booking_days}} Night<br> <small> Base Price {{$space_data->price_per_night}} Per Night</small></h5>
                            <h6>PKR <?php echo $booking_days * $space_data->price_per_night; ?> </h6>
                        </div>
                        @if($space_data->cleaning_fee > 0)
                        <div class="price-left">
                            <h5> Cleaning Charge</h5>
                            <h6>PKR {{$space_data->cleaning_fee}} </h6>
                        </div>
                        @endif
                        @if($space_data->city_fee > 0)
                        <div class="price-left">
                            <h5> City Charge</h5>
                            <h6>PKR {{$space_data->city_fee}}</h6>
                        </div>
                        @endif
                        @if($space_data->tax_percentage > 0)
                        <div class="price-left">
                            <h5> Taxes & Service Fees</h5>
                            <h6>PKR {{$space_data->tax_percentage}}</h6>
                        </div>
                        @endif
                        @if(!empty($details->expense_value))
                        <div class="price-left">
                            <h5> {{$details->expense_name}} Charges</h5>
                            <h6>PKR {{$details->expense_value}}</h6>
                        </div>
                        @endif
                        @if(!empty($details->discount))
                        <div class="price-left">
                            <h5>{{$details->discount_name}} Discount</h5>
                            <h6>PKR -{{$details->discount}}</h6>
                        </div>
                        @endif

                        @if($space_data->payment_mode == 2)
                        <div class="price-left">
                            <h5> <b>Online Payable Amount </b></h5>
                            <h6>PKR {{$online_payable_amount}}</h6>
                        </div>
                        <div class="price-left">
                            <h5> At Desk Payable Amount</h5>
                            <h6>PKR {{$at_desk_payable_amount}}</h6>
                        </div>
                        @endif
                        
                        <div class="price-left">
                            <h5> <b>Total Amount to be paid </b></h5>
                            <h6><b>PKR <?php echo ($booking_days * $space_data->price_per_night) + $space_data->cleaning_fee + $space_data->city_fee + $space_data->tax_percentage + $expense - $discount; ?></b></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->

@endsection