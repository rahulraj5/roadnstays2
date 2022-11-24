@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
    .fghj {
        display: block !important;
    }

</style>
@endsection

@section('current_page_js')

@endsection

@section('content')
<main id="main" class="main-body">
    <!-- paste here html code -->
        <!-- <section class="con-sec">
            <div class="container">
                <div class="row con-row">
                    <div class="col-md-12 con-col">
                        <div class="bx">
                            <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/undraw_Travel_booking_re_6umu.png" alt="">
                            <h2>Your Booking Is confirmed, THANK YOU!</h2>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section> -->
        <section class="con2-sec">
            <div class="container">
                <div class="row con2-row">
                    <div class="col-md-12 ">
                        <a href="{{url('/')}}"><i class="bx bx-left-arrow-alt"></i>Back to Home</a>

                        @if($payment_status == 'Failed')
                        <div class="done-payment fghjdiv mb-3">
                            <img class="fghj" src="{{url('/resources/assets/img/remove.png')}}" style="width: 100px;margin: auto;">
                            <h3>Booking Failed</h3>
                            <p class="pl-5 pr-5 pt-1">We chould not acquire the payment. Please try again!
                            </p>
                        </div>
                        @else
                        <div class="done-payment fghjdiv mb-3">
                            <img class="fghj" src="{{url('/resources/assets/img/confirmpayment.gif')}}" style="width: 100px;margin: auto;">
                            <h3>Booking DONE</h3>
                            <p class="pl-5 pr-5 pt-1">We are pleased to inform you that your reservation request has been received and confirmed. your booking is confirmed. Thank you!
                            </p>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div id="loginResBox">
                            @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> {{ Session::get('message') }}</div>        
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Opps!</strong> {{ Session::get('error') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 con2-col">
                        <!-- <p class="p-con2">We are pleased to inform you that your reservation request has been recieved and confirmed.</p>
                        <p>Booking confirmed</p> -->
                        <h5>Booking Details-</h5>
                        <ul class="details">
                            <li>Booking-id <span> {{$order_info->space_booking_id}}</span></li>
                            <li>since when <span>{{date("d F, Y", strtotime($order_info->check_in_date))}}</span>  </li>
                            <li> till when <span>{{date("d F, Y", strtotime($order_info->check_out_date))}}</span> </li>
                            <li>Total <span>PKR {{ $order_info->total_amount }}</span></li>
                            <li>Status <span>{{ $order_info->booking_status }}</span></li>
                        </ul>

                        <div class="booker-d">
                            <h6>Details: <span>{{ $order_info->space_name }}</span></h6>
                            <!-- <h6>Ocassion: <span>Beach Party</span></h6> -->
                        </div>
                        <div class="booker-d">
                            <h6>Name: <span>{{ $order_info->first_name }} {{ $order_info->last_name }}</span></h6>
                            <!-- <h6>Identity Card: <span>Driving License</span></h6> -->
                        </div>
                            <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/vecteezy_tourists-with-luggage-at-the-airport-set-collection-of_3857409.jpg" alt="">
                            @php $vendor_details = DB::table('users')->where('id', $order_info->space_user_id)->first(); @endphp 
                            @php $admin_number = DB::table('admins')->where('id', 1)->value('admin_number') @endphp 
                            @php $admin_email = DB::table('admins')->where('id', 1)->value('email') @endphp
                            <ul class="contact">
                                <li><h6><i class='bx bx-phone'></i>What's up : {{$vendor_details->num_dialcode_1 ?? ''}} {{$vendor_details->contact_number ?? $admin_number}}</h6></li>
                                <li><h6><i class='bx bxs-envelope' ></i>E-mail : {{$vendor_details->email ?? $admin_email}}</h6></li>
                                <div class="down-i">
                                    <a style="text-decoration:none;" target="blank" href="{{ url('/user/spaceBookingInvoice') }}/{{ base64_encode($order_info->booki_id) }}"><i class='bx bx-download'></i>Download Invoice</a>
                                </div>
                            </ul>

                    </div>
                </div>
            </div>
        </section>
</main>
<!-- End #main -->
<!-- MODAL AREA START -->

<!-- MODAL AREA END -->


@endsection