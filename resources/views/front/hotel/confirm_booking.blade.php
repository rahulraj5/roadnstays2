@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')
@endsection
@section('content')
<main id="main">
   <section style="padding-top: 80px; background-color: #f6f6f6;">
      <div class="container">
         <div class="row">
            <div class="col-md-12 ">
               <a href="{{url('/')}}"><i class="bx bx-left-arrow-alt"></i>Back to Home</a>

               @if($payment_status == 'Failed' || $payment_status == '')
               <div class="done-payment mb-3">
                  <img src="{{url('/resources/assets/img/remove.png')}}" style="width: 100px;">
                  <h3>Booking Failed</h3>
                  <p class="pl-5 pr-5 pt-1">We chould not acquire the payment. Please try again!
                  </p>
               </div>
               @else
               <div class="done-payment mb-3">
                  <img src="{{url('/resources/assets/img/confirmpayment.gif')}}" style="width: 100px;">
                  <h3>Booking DONE</h3>
                  <p class="pl-5 pr-5 pt-1">We are pleased to inform you that your reservation request has been received and confirmed. your booking is confirmed. Thank you!
                  </p>
               </div>
               @endif
            </div>
            @if($payment_status == 'Failed' || $payment_status == '')
            <div class="col-md-12">
               <div id="loginResBox">
                  @if(Session::has('message'))
                  <div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>failed!</strong> We chould not acquire the payment. Please try again!</div>        
                  @endif
                  @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Opps!</strong> {{ Session::get('error') }}</div>
                  @endif
               </div>
            </div>
            @else
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
            @endif
            <div class="col-md-12">
               <div class="infobox">
                  <div class="revie-box">
                     <div class="page-detail">
                        <h5 class="p-0 m-0 citi-omr">{{$order_info->hotel_name}}</h5>
                        <span>@if($order_info->hotel_rating == 5)★★★★★@elseif($order_info->hotel_rating == 4)★★★★@elseif($order_info->hotel_rating == 3)★★★@elseif($order_info->hotel_rating ==2)★★@else★@endif</span>
                        <p>{{$order_info->hotel_address}}, {{$order_info->hotel_city}}</p>
                     </div>
                     <div class="page-detail-sid">
                        <img class="rtnb" src="{{url('public/uploads/hotel_gallery/')}}/{{$order_info->hotel_gallery}}" alt="Another alt text" style="width: 100px;">
                     </div>
                  </div>
                  <?php 

                  $date1_ts = strtotime($order_info->check_in);
                  $date2_ts = strtotime($order_info->check_out);
                  $start_day = date('l', $date1_ts);
                  $end_day = date('l', $date2_ts);

                   ?>
                  <div class="runs-andpay">
                     <div class="date1">
                        <span>CHECK IN</span>
                        <h3> {{$order_info->check_in}}</h3>
                        <small>{{$start_day}}</small>
                     </div>
                     <div class="date3">
                        <small>{{$order_info->total_days}} Night</small><br>
                        <i class='bx bx-transfer-alt'></i>
                     </div>
                     <div class="date1">
                        <span>CHECK IN</span>
                        <h3> {{$order_info->check_out}}</h3>
                        <small>{{$end_day}}</small>
                     </div>


                     <div class="date2">
                        <h6>{{$order_info->total_member}} Adults | {{$order_info->total_room}} Room</h6>
                     </div>
                  </div>
                  <div class="room-praci">
                     <h4 class="mt-2">
                        <i class="bx bxs-user-badge"></i><b> Room {{$order_info->total_room}}:</b> {{$order_info->total_member}} Adults {{$order_info->bed_type}}
                     </h4>
                     <ul class="brekfasr mb-3">
                        @foreach($room_amenities as $amenities)
                           <li><i class='bx bx-check'></i>{{$amenities->amenity_name}}</li>
                           <!-- <li><i class='bx bx-check'></i> Free parking</li>
                           <li><i class='bx bx-check'></i> Free WiFi </li> -->
                        @endforeach
                     </ul>

                     
                     <h5>{{$order_info->name}} (WITH BATHTUB)<br><small>{{$order_info->total_member}} Adults</small></h5>
                     <div class="">
                        <h5 class="mt-3">Price Includes </h5>
                        <ul>
                           <li>No meals included</li>
                           <?php if($order_info->breakfast_availability == 1){
                                 if ($order_info->breakfast_price_inclusion == 0) {?>
                                    <li>Breakfast included</li>
                           <?php  }else{
                                 echo '<li>No Breakfast included</li>';
                              }
                           }else{
                           echo '<li>Not Available Breakfast</li>';
                           } ?>
                           <li>Non-Refundable | On Cancellation, You will not get any refund </li>
                        </ul>
                     </div>
                     
                  </div>
                  @php $vendor_details = DB::table('users')->where('id', $order_info->hotel_user_id)->first(); @endphp 
                  @php $admin_number = DB::table('admins')->where('id', 1)->value('admin_number') @endphp 
                  @php $admin_email = DB::table('admins')->where('id', 1)->value('email') @endphp
                  <div class="room-praci">
                     <ul class="contact">
                        <li><h6><i class='bx bx-phone'></i>What's up : {{$vendor_details->num_dialcode_1 ?? ''}} {{$vendor_details->contact_number ?? $admin_number}}</h6></li>
                        <li><h6><i class='bx bxs-envelope' ></i>E-mail : {{$vendor_details->email ?? $admin_email}}</h6></li>
                     </ul>
                     <div class="down-i">
                        <a style="text-decoration:none;" target="blank" href="{{ url('/user/bookingInvoice') }}/{{ base64_encode($order_info->id) }}"><i class='bx bx-download'></i>Download Invoice</a>
                     </div>
                  </div>
                  <div class="revie-box-boxi mt-3">
                     <div class="price-bkp">
                        <h4>Payment details</h4>
                     </div>
                     <div class="price-left">
                        <h5> Booking Number <br></h5>
                        <h6>#000<?php echo $order_info->id;?> </h6>
                     </div>
                     <div class="price-left">
                        <h5> {{$order_info->total_room}} Room x {{$order_info->total_days}} Night<br> <small> Base Price {{$order_info->price_per_night}} Per Night</small></h5>
                        <h6>PKR <?php echo $order_info->total_days*$order_info->price_per_night;?> </h6>
                     </div>
                     @if($order_info->discount>0)
                     <div class="price-left">
                        <h5> Price after Discount</h5>
                        <h6>PKR {{$order_info->discount}} </h6>
                     </div>
                     @endif
                     @if($order_info->tax_percentage>0)
                     <div class="price-left">
                        <h5> Taxes &amp; Service Fees</h5>
                        <h6>PKR {{$order_info->tax_percentage}}</h6>
                     </div>
                     @endif
                     @if($order_info->cleaning_fee>0)
                     <div class="price-left">
                        <h5>Cleaning Fees</h5>
                        <h6>PKR {{$order_info->cleaning_fee}}</h6>
                     </div>
                     @endif
                     @if($order_info->city_fee>0)
                     <div class="price-left">
                        <h5> City Fees</h5>
                        <h6>PKR {{$order_info->city_fee}}</h6>
                     </div>
                     
                     @if($order_info->earlybird_discount>0)
                        @php $early_discount = $order_info->total_room*($order_info->total_days*($order_info->price_per_night*($order_info->earlybird_discount/100))); @endphp
                     <div class="price-left">
                        <h5> Early Bird Discount</h5>
                        <h6>PKR -{{$early_discount}}</h6>
                     </div>
                     @endif

                     @if($order_info->payment_mode == 2 and $order_info->booking_option == 1)
                     <div class="price-left">
                        <h5> Online Paid Amount</h5>
                        <h6>PKR {{$order_info->online_paid_amount}}</h6>
                     </div>
                     <div class="price-left">
                        <h5> At Desk Payable Amount</h5>
                        <h6>PKR {{$order_info->remaining_amount_to_pay}}</h6>
                     </div>
                     @endif
                     
                     @endif
                     <div class="price-left">
                        <h5> <b>Total Amount to be paid </b></h5>
                        <?php if($order_info->earlybird_discount>0){ $early_discount;}else{$early_discount = 0;} ?>
                        <h6><b>PKR {{ $order_info->total_amount - $early_discount }}</b></h6>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<!-- End #main -->
@endsection