@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style type="text/css">
   .bed-room h3 {
   font-size: 19px;
   color: #000;
   font-weight: 700;
   }
   .ami-pol-room {
   display: flex;
   align-items: center;
   vertical-align: middle;
   margin-top: 4px;
   margin-right: 3px;
   text-align: center;
   justify-content: normal;
   width: 100%;
   border-bottom: 1px solid #ccc;
   padding-bottom: 16px;
   }
   .ami-pol-detail {
   display: flex;
   align-items: center;
   vertical-align: middle;
   margin-top: 14px;
   margin-right: 20px;
   text-align: center;
   justify-content: left;
   width: 17%;
   }
   .ami-pol-detail i {
   font-size: 27px;
   border: 1px solid #126c62;
   color: #126c62;
   padding: 8px;
   margin-bottom: 8px;
   border-radius: 7px;
   margin-right: 8px;
   }
   .ami-pol-detail h5 {
   margin-bottom: 0px;
   text-align: center;
   font-size: 14px;
   font-weight: bold;
   }
   .all-detail-rom {
   border-bottom: 1px solid #ededed;
   padding: 10px 3px;
   }
   .check-makr i{
   margin-right: 6px;
   }
   .check-makr span {
   font-weight: 500;
   font-size: 14px;
   }
   .check-makr {
   display: flex;
   align-items: center;
   margin-bottom: 0px;
   margin-top: 4px;
   }
   h3.gust-rom {
   color: #3e3e3e;
   font-weight: 600;
   font-size: 17px;
   }
   /*#roomdetails .owl-nav{
   display: none;
   }*/
   #roomdetails .owl-dots{
   display: none;
   }
   .roomdetails .owl-nav button {
   border: none;
   background: #126c62;
   color: #FFF;
   font-size: 26px;
   }
   .roomdetails .owl-nav .owl-next{
   float: right;
   }
   .roomdetails .owl-nav {
   bottom: 206px;
   position: relative;
   /* background: #ccc; */
   }
   #roomdetails .owl-dot.active {
   background-color: #126c62 !important;
   }
   .heig-fic-room img{
   height: 100%;
   }
   .heig-fic-room {
   height: 380px;
   background: #ccc;
   overflow: hidden;
   /* border-radius: 10px; */
   /* margin-bottom: 24px; */
   border: 3px solid #126c62;
   }   /* margin-bottom: 24px;*/
   .side-bar-rom {
   border: 1px solid #eaeaea;
   padding: 20px 12px;
   min-height: 350px;
   border-radius: 7px;
   box-shadow: rgb(0 0 0 / 12%) 0px 6px 16px;
   background: #FFF;
   position: sticky;
   top: 96px;
   float: left;
   }
   .check-in-out h4 small {
   margin-bottom: 7px;
   float: left;
   }
</style>
@endsection
@section('current_page_js')
<script type="text/javascript">
   // $('.portfolio-item').isotope({
       //    itemSelector: '.item',
       //    layoutMode: 'fitRows'
       //  });
        $('.portfolio-menu ul li').click(function(){
         $('.portfolio-menu ul li').removeClass('active');
         $(this).addClass('active');
         
         var selector = $(this).attr('data-filter');
         $('.portfolio-item').isotope({
           filter:selector
         });
         return  false;
        });
        $(document).ready(function() {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
        type : 'image',
        gallery : {
         enabled : true
        }
        });
        });
</script>
<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
   $(function () {
     // ADDING DATA
     (function () {
         var inc = 0;
         $('.sc-sp-data-dis').each(function () {
             $(this).attr('data-scsp', "data" + inc)
             inc++;
         });
     })();
     (function () {
         var inc = 0;
         $('.sc-sp-list').each(function (ev) {
             $(this).attr('data-scsp', "data" + inc)
             inc++;
         });
     })();
   
     $(window).on("load scroll", function () {
         var windowScroll = $(this).scrollTop();
         $(".sc-sp-data-dis").each(function () {
             var thisOffsetTop = Math.round($(this).offset().top - 30);
   
             if (windowScroll >= thisOffsetTop) {
                 var thisAttr = $(this).attr('data-scsp');
                 $('.sc-sp-list').parent().removeClass("active");
                 $('.sc-sp-list[data-scsp="' + thisAttr + '"]').parent().addClass("active");
             }
         });
     });
   
     $('.sc-sp-list').click(function (ev) {
         ev.preventDefault();
         var thisAttr = $(this).attr("data-scsp");
         var scrollTo = $('.sc-sp-data-dis[data-scsp="' + thisAttr + '"]').offset().top;
   
         $(this).parent().addClass("active").siblings().removeClass("active");
   
         $(".sc-sp-data-dis").removeClass("active");
         $('.sc-sp-data-dis[data-scsp="' + thisAttr + '"]').addClass("active");
   
         $('html, body').animate({
             scrollTop: scrollTo - 5
         }, 150);
     });
   
   
   
   });
</script>
<script type="text/javascript">
   function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
             $('#imagePreview').css('background-image', 'url('+e.target.result +')');
             $('#imagePreview').hide();
             $('#imagePreview').fadeIn(650);
         }
         reader.readAsDataURL(input.files[0]);
     }
   }
   $("#imageUpload").change(function() {
     readURL(this);
   });
</script>
<script type="text/javascript">
   jQuery(document).ready(function($){
     
   $(".btnrating").on('click',(function(e) {
   
   var previous_value = $("#selected_rating").val();
   
   var selected_value = $(this).attr("data-attr");
   $("#selected_rating").val(selected_value);
   
   $(".selected-rating").empty();
   $(".selected-rating").html(selected_value);
   
   for (i = 1; i <= selected_value; ++i) {
   $("#rating-star-"+i).toggleClass('btn-warning');
   $("#rating-star-"+i).toggleClass('btn-default');
   }
   
   for (ix = 1; ix <= previous_value; ++ix) {
   $("#rating-star-"+ix).toggleClass('btn-warning');
   $("#rating-star-"+ix).toggleClass('btn-default');
   }
   
   }));
   
   
   });
   
</script>
@endsection
@section('content')
@php $country_name = DB::table('country')->where('id', $tour_details->country_id)->first(); @endphp
<?php  $nights = $tour_details->tour_days-1; ?>
<main id="main">
   <section style="padding-top: 80px; background-color: #f6f6f6;">
      <div class="container">
      <div class="row">
      <div class="col-md-12 rew-heding">
         <h3>Review your Booking</h3>
      </div>
      <div class="col-md-9">
         <form id="member-registration" method="post" class="form-validate form-horizontal well" action="{{url('/tourBookingOrder')}}">
          @csrf
            <input type="hidden" name="user_id" value="{{Auth::check()}}">
            <input type="hidden" name="tour_id" value="{{$tour_details->id}}">
            <input type="hidden" name="tour_price" value="{{$tour_details->tour_price}}">
            <input type="hidden" name="tour_start_date" value="{!! date('Y-m-d', strtotime($tour_details->tour_start_date)) !!}">
            <input type="hidden" name="tour_end_date" value="{!! date('Y-m-d', strtotime($tour_details->tour_end_date)) !!}">
            <div class="infobox">
               <div class="revie-box">
                  <div class="page-detail">
                     <h5 class="p-0 m-0 citi-omr">{{$tour_details->tour_title}}</h5>
                     <span>★★★★★</span>
                     <p> {{$tour_details->address}},{{$tour_details->city}},{{$country_name->name}}</p>
                  </div>
               </div>
               <div class="runs-andpay">
                  <div class="date1">
                     <span>Start day</span>
                     <h3> {{ date('j F Y', strtotime($tour_details->tour_start_date)) }}</h3>
                  </div>
                  <div class="date3">
                     <small>{{$tour_details->tour_days}} Days-{{$nights}} Night</small><br>
                     <i class='bx bx-transfer-alt'></i>
                  </div>
                  <div class="date1">
                     <span>End day</span>
                     <h3> {{ date('j F Y', strtotime($tour_details->tour_end_date)) }}</h3>
                  </div>
                  <div class="date2">
                     <h6> 1 Passenger </h6>
                  </div>
               </div>
               <div class="room-praci">
                  <h5>Tour type</h5>
                  <ul>
                     <li> {{$tour_details->tour_type}}</li>
                  </ul>
                  <div class="">
                     <h5 class="mt-3">Activities </h5>
                     <ul>
                        <li> {{$tour_details->tour_activities}}</li>
                     </ul>
                  </div>
                  <div class="">
                     <h5 class="mt-3">Duration </h5>
                     <ul>
                        <li>{{$tour_details->tour_days}} days</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                  <div class="col-md-12 p-0 mt-3">
                     <div class="bankpay">
                        <h4 class="mt-2">
                           <i class='bx bxs-user-badge'></i><b> Passenger:</b>  1 Adults 
                        </h4>
                        <div class="bank-bar">
                           <!-- <form id="member-registration" method="post" class="form-validate form-horizontal well" > -->
                           <fieldset>
                              <div class="container">
                                 <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="exampleInputPassword1">First name*</label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="first_name" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="exampleInputEmail1">Last name*</label>
                                       <input type="text" class="form-control" id="exampleInputEmail1" name="last_name" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="exampleInputEmail1">Mobile phone number *</label>
                                       <input type="text" class="form-control" id="exampleInputEmail1" name="mobile" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="exampleInputEmail1">Email *</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" name="email" required="">
                                    </div>
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="vehicle1">  <input type="checkbox" name="vehicle1" value="Bike">
                                    Remember this card for future use</label>
                                 </div> -->
                           </fieldset>
                           <!--     </form> -->
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
                                    <a class="nav-link active" data-toggle="tab" href="#home">Pay with paypal</a>
                                 </li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                 <div id="home" class="container tab-pane active p-0">
                                    <br>
                                    <img src="{{url('/resources/assets/img/banke.png')}}" class="mb-3 " style="">
                                    <!--  <form id="member-registration" method="post" class="form-validate form-horizontal well" > -->
                                    <!-- <fieldset>
                                       <div class="row">
                                       <div class="form-group col-md-6 pl-0">
                                       <label for="exampleInputPassword1">Name on Card*</label>
                                       <input type="text" class="form-control" id="exampleInputPassword1">
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label for="exampleInputPassword1">Debit/Credit card number*</label>
                                       <input type="text" class="form-control" id="exampleInputPassword1">
                                       </div>
                                       </div>
                                       
                                       <div class="form-group">
                                       <label for="exampleInputEmail1">Expiry date</label>
                                       <div class="row">
                                           <div class="col-md-6 pl-0">
                                       <select class="form-control">
                                       <optgroup>
                                       <option value="volvo">Month</option>
                                       <option value="saab">01-jan</option>
                                       <option value="saab">02-jan</option>
                                       </optgroup>
                                       </select>
                                       </div>
                                       
                                       <div class="col-md-6">
                                       
                                       <select class="form-control">
                                       <optgroup>
                                       <option value="volvo">Year</option>
                                       <option value="saab">01-jan</option>
                                       <option value="saab">02-jan</option>
                                       </optgroup>
                                       </select>
                                       </div>
                                       </div>
                                       </div>
                                       <div class="row">
                                       <div class="form-group col-md-6 pl-0">
                                       <label for="exampleInputEmail1">Security code</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1">
                                       </div>
                                       
                                       <div class="form-group col-md-6">
                                       <label for="exampleInputPassword1">Billing country/territory*</label>
                                       <select class="form-control">
                                       <optgroup>
                                       <option value="volvo">India</option>
                                       <option value="saab">Pakistan</option>
                                       <option value="saab">Iceland</option>
                                       </optgroup>
                                       
                                       </select>
                                       
                                       </div>
                                       </div>
                                       
                                       <div class="form-group col-md-6 pl-0">
                                       <label for="exampleInputPassword1">PAN*</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1">
                                       
                                       </div>
                                       <label for="vehicle1"> <input type="checkbox" name="vehicle1" value="Bike">
                                       Remember this card for future use</label>
                                       
                                       </fieldset> -->
                                    <!--  </form>
                                       -->
                                 </div>
                                 <div id="menu1" class="tab-pane fade bankinfo">
                                    <h3 class="mt-3">Important information about your booking</h3>
                                    <p>Important: You will be redirected to your bank's website to securely complete your payment. You will have 30 minutes to pay for your booking.</p>
                                    <!-- <a href="#" class="paynow-btn">Continue To Your Bank </a> -->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 text-center d-flex">
                              <input type="submit" name="paynow" class="paynow-btn" value="Paynow">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </form>
         </div>
         <div class="col-md-3 pl-0">
            <div class="revie-box-boxi">
               <div class="image-section">
                  <img src="{{url('/public/uploads/tour_gallery/')}}/{{$tour_details->tour_feature_image}}">
                  <p> {{$tour_details->tour_title}}</p>
               </div>
               <p><b>4.1/5</b> Very good (82 reviews)</p>
               <!--         <p class="rmn">51000 PKR / per person
                  For twin sharing extra charges per person</p>
                  -->         
               <ul>
                  <li><b>Start day:</b> {{ date('j F Y', strtotime($tour_details->tour_start_date)) }}</li>
                  <li><b>End day:</b> {{ date('j F Y', strtotime($tour_details->tour_end_date)) }}</li>
                  <li>Duration: {{$tour_details->tour_days}} Days</li>
               </ul>
            </div>
            <div class="revie-box-boxi">
               <div class="price-bkp">
                  <h4>PRICE BREAK-UP</h4>
               </div>
               <div class="price-left">
                  <h5> 1 x 1 Adults | Passenger<br> <small> Base Price</small></h5>
                  <h6> PKR {{$tour_details->tour_price}} </h6>
               </div>
               <!-- <div class="price-left">
                  <h5> Price after Discount</h5>
                  <h6>₹ 1,950 </h6>
                  </div>
                  <div class="price-left">
                  <h5> Taxes & Service Fees</h5>
                  <h6>₹ 1,706</h6>
                  </div> -->
               <div class="price-left">
                  <h5> <b>Total Amount to be paid </b></h5>
                  <h6><b>PKR {{$tour_details->tour_price}}</b></h6>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<!-- End #main -->
@endsection