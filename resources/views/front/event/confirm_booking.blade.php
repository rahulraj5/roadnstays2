@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')
@endsection
@section('content')
<?php $days = 1; $nights = 1; ?>
<main id="main">
   <section style="padding-top: 80px; background-color: #f6f6f6;">
      <div class="container">
         <div class="row">
            <div class="col-md-12 ">
               <a href="{{url('/')}}"><i class="bx bx-left-arrow-alt"></i>Back to Home</a>
               @if($payment_status == 'Failed')
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
            <div class="col-md-12">
               <div class="infobox">
                  <div class="revie-box">
                     <div class="page-detail">
                        <h5 class="p-0 m-0 citi-omr">{{$order_info->title}}</h5>
                        <span>★★★★★</span>
                        <p>{{$order_info->address}}</p>
                     </div>
                     <div class="page-detail-sid">
                        <img class="rtnb" src="{{url('/public/uploads/event_gallery/')}}/{{$order_info->image}}" alt="Another alt text" style="width: 100px;">
                     </div>
                  </div>
                  <?php 

                  $date1_ts = strtotime($order_info->start_date);
                  $date2_ts = strtotime($order_info->end_date);
                  $start_day = date('l', $date1_ts);
                  $end_day = date('l', $date2_ts);
                  ?>
                  <div class="runs-andpay">
                     <div class="date1">
                        <span>Start Date</span>
                        <h3> {{$order_info->start_date}}</h3>
                        <small>{{$start_day}}</small>
                     </div>
                     <div class="date3">
                        <small>{{$days}} Days-{{$nights}} Night</small><br>
                        <i class='bx bx-transfer-alt'></i>
                     </div>
                     <div class="date1">
                        <span>End Date</span>
                        <h3> {{$order_info->end_date}}</h3>
                        <small>{{$end_day}}</small>
                     </div>
                     <!-- <div class="date2">
                        <h6>1 </h6>
                     </div> -->
                  </div> 
                  @php $vendor_details = DB::table('users')->where('id', $order_info->vendor_id)->first(); @endphp 
                  @php $admin_number = DB::table('admins')->where('id', 1)->value('admin_number') @endphp 
                  @php $admin_email = DB::table('admins')->where('id', 1)->value('email') @endphp
                  <div class="revie-box">
                     <ul class="contact">
                        <li><h6><i class='bx bx-phone'></i>What's up : {{$vendor_details->num_dialcode_1 ?? ''}} {{$vendor_details->contact_number ?? $admin_number}}</h6></li>
                        <li><h6><i class='bx bxs-envelope' ></i>E-mail : {{$vendor_details->email ?? $admin_email}}</h6></li>
                     </ul>
                     <div class="down-i">
                        <a style="text-decoration:none;" target="blank" href="{{ url('/user/eventBookingInvoice') }}/{{ base64_encode($order_info->booki_id) }}"><i class='bx bx-download'></i>Download Invoice</a>
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
                        <h5> {{$order_info->price}} <br> <small> Base Price {{$order_info->price}} Per Person</small></h5>
                        <h6>PKR <?php echo $order_info->price;?> </h6>
                     </div>
                     <div class="price-left">
                        <h5> <b>Total Amount to be paid </b></h5>
                        <h6><b>PKR {{$order_info->price}}</b></h6>
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