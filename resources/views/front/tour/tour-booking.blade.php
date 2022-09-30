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

   .check-makr i {
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
   #roomdetails .owl-dots {
      display: none;
   }

   .roomdetails .owl-nav button {
      border: none;
      background: #126c62;
      color: #FFF;
      font-size: 26px;
   }

   .roomdetails .owl-nav .owl-next {
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

   .heig-fic-room img {
      height: 100%;
   }

   .heig-fic-room {
      height: 380px;
      background: #ccc;
      overflow: hidden;
      /* border-radius: 10px; */
      /* margin-bottom: 24px; */
      border: 3px solid #126c62;
   }

   /* margin-bottom: 24px;*/
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
   function cancelRequestBooking(id) {
      toastDelete.fire({}).then(function(e) {
         if (e.value === true) {
            // alert(id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               type: 'POST',
               url: "{{url('/user/cancelTourBookingRequest')}}",
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
            url: "{{url('/user/requestBookingTour')}}",
            data: formData,
            success: function(response) {
               console.log(response);
               if (response.status == 'success') {
                  // $("#register_form")[0].reset();
                  success_noti(response.msg);
                  // setTimeout(function() {
                  //   window.location.reload()
                  // }, 1000);
                  // setTimeout(function() {
                  //    window.location.href = site_url + "/admin/hotelList"
                  // }, 1000);
                  setTimeout(function() {
                     window.location.reload()
                  }, 2500);
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
<script type="text/javascript">
   $(function() {

      $("#handshake").click(function(e) {
         e.preventDefault();
         $("#handshake").attr('disabled', 'disabled');
         submitRequest("HandshakeForm");
         if ($("#HS_IsRedirectionRequest").val() == "1") {
            document.getElementById("HandshakeForm").submit();
         } else {
            var myData = {
               HS_MerchantId: $("#HS_MerchantId").val(),
               HS_StoreId: $("#HS_StoreId").val(),
               HS_MerchantHash: $("#HS_MerchantHash").val(),
               HS_MerchantUsername: $("#HS_MerchantUsername").val(),
               HS_MerchantPassword: $("#HS_MerchantPassword").val(),
               HS_IsRedirectionRequest: $("#HS_IsRedirectionRequest").val(),
               HS_ReturnURL: $("#HS_ReturnURL").val(),
               HS_RequestHash: $("#HS_RequestHash").val(),
               HS_ChannelId: $("#HS_ChannelId").val(),
               HS_TransactionReferenceNumber: $("#HS_TransactionReferenceNumber").val(),
            }


            $.ajax({
               type: 'POST',
               url: 'https://sandbox.bankalfalah.com/HS/HS/HS',
               contentType: "application/x-www-form-urlencoded",
               data: myData,
               dataType: "json",
               beforeSend: function() {},
               success: function(r) {
                  if (r != '') {
                     if (r.success == "true") {
                        $("#AuthToken").val(r.AuthToken);
                        $("#ReturnURL").val(r.ReturnURL);
                        alert('Success: Handshake Successful');
                     } else {
                        alert('Error: Handshake Unsuccessful');
                     }
                  } else {
                     alert('Error: Handshake Unsuccessful');
                  }
               },
               error: function(error) {
                  alert('Error: An error occurred');
               },
               complete: function(data) {
                  $("#handshake").removeAttr('disabled', 'disabled');
               }
            });
         }

      });

      $("#run").click(function(e) {
         e.preventDefault();
         submitRequest("PageRedirectionForm");
         document.getElementById("PageRedirectionForm").submit();
      });
   });

   function submitRequest(formName) {

      var mapString = '',
         hashName = 'RequestHash';
      if (formName == "HandshakeForm") {
         hashName = 'HS_' + hashName;
      }

      $("#" + formName + " :input").each(function() {
         if ($(this).attr('id') != '') {
            mapString += $(this).attr('id') + '=' + $(this).val() + '&';
         }
      });

      $("#" + hashName).val(CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(mapString.substr(0, mapString.length - 1)), CryptoJS.enc.Utf8.parse($("#Key1").val()), {
         keySize: 128 / 8,
         iv: CryptoJS.enc.Utf8.parse($("#Key2").val()),
         mode: CryptoJS.mode.CBC,
         padding: CryptoJS.pad.Pkcs7
      }));
   }
</script>

<script type="text/javascript">
   $('.portfolio-menu ul li').click(function() {
      $('.portfolio-menu ul li').removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
      $('.portfolio-item').isotope({
         filter: selector
      });
      return false;
   });
   $(document).ready(function() {
      var popup_btn = $('.popup-btn');
      popup_btn.magnificPopup({
         type: 'image',
         gallery: {
            enabled: true
         }
      });
   });
</script>
<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- Vendor JS Files -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script> -->
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
   $(function() {
      // ADDING DATA
      (function() {
         var inc = 0;
         $('.sc-sp-data-dis').each(function() {
            $(this).attr('data-scsp', "data" + inc)
            inc++;
         });
      })();
      (function() {
         var inc = 0;
         $('.sc-sp-list').each(function(ev) {
            $(this).attr('data-scsp', "data" + inc)
            inc++;
         });
      })();

      $(window).on("load scroll", function() {
         var windowScroll = $(this).scrollTop();
         $(".sc-sp-data-dis").each(function() {
            var thisOffsetTop = Math.round($(this).offset().top - 30);

            if (windowScroll >= thisOffsetTop) {
               var thisAttr = $(this).attr('data-scsp');
               $('.sc-sp-list').parent().removeClass("active");
               $('.sc-sp-list[data-scsp="' + thisAttr + '"]').parent().addClass("active");
            }
         });
      });

      $('.sc-sp-list').click(function(ev) {
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
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
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
   jQuery(document).ready(function($) {
      $(".btnrating").on('click', (function(e) {
         var previous_value = $("#selected_rating").val();
         var selected_value = $(this).attr("data-attr");
         $("#selected_rating").val(selected_value);
         $(".selected-rating").empty();
         $(".selected-rating").html(selected_value);
         for (i = 1; i <= selected_value; ++i) {
            $("#rating-star-" + i).toggleClass('btn-warning');
            $("#rating-star-" + i).toggleClass('btn-default');
         }
         for (ix = 1; ix <= previous_value; ++ix) {
            $("#rating-star-" + ix).toggleClass('btn-warning');
            $("#rating-star-" + ix).toggleClass('btn-default');
         }
      }));
   });
</script>
@endsection
@section('content')
@php $country_name = DB::table('country')->where('id', $tour_details->country_id)->first(); @endphp
<?php $nights = (int)$tour_details->tour_days - 1; ?>


<main id="main">
   <section style="padding-top: 80px; background-color: #f6f6f6;">
      <div class="container">
         <div class="row">
            <div class="col-md-12 rew-heding">
               <h3>Review your Booking</h3>
            </div>
            <div class="col-md-9">
               @if($tour_details->booking_option == 2)
                  @if($checkRequest!=0)
                     <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="{{url('/tourBookingOrder')}}" enctype="multipart/form-data">
                  @else
                     <form id="bookingRequest_form" method="post" class="form-validate form-horizontal well" action="" enctype="multipart/form-data">
                  @endif   
               @else   
               <form id="member-registration" method="post" class="form-validate form-horizontal well" action="{{url('/tourBookingOrder')}}" enctype="multipart/form-data">
               @endif   
                  @csrf
                  <input type="hidden" name="user_id" value="{{Auth::check()}}">
                  <input type="hidden" name="tour_id" value="{{$tour_details->id}}">
                  <input type="hidden" name="tour_price" value="{{$tour_details->tour_price}}">
                  <input type="hidden" name="tour_start_date" value="{!! date('Y-m-d', strtotime($tour_details->tour_start_date)) !!}">
                  <input type="hidden" name="tour_end_date" value="{!! date('Y-m-d', strtotime($tour_details->tour_end_date)) !!}">
                  <div class="infobox">
                     <div class="revie-box">
                        <div class="page-detail">
                           <h5 class="p-0 m-0 citi-omr">{{$tour_details->tour_title}}  </h5>
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
                        <h5>Tour Sub type</h5>
                        <ul>
                           <li> {{$tour_details->tour_sub_type}}</li>
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
                  @if($tour_details->booking_option == 1)
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
                                          <a class="nav-link active" data-toggle="tab" href="#home">Pay with paypal</a>
                                       </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                       <div id="home" class="container tab-pane active p-0">
                                          <br>
                                          <img src="{{url('/resources/assets/img/banke.png')}}" class="mb-3 " style="">
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
                  @endif  
                  
                  @if($tour_details->booking_option == 2)
                     @if(Auth::check())
                        @if($checkRequest == 1)
                           @if($tour_booking_request->request_status == 1 and $tour_booking_request->approve_status == 1)
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
                                                      <a class="nav-link active" data-toggle="tab" href="#home">Pay with paypal</a>
                                                   </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                   <div id="home" class="container tab-pane active p-0">
                                                      <br>
                                                      <img src="{{url('/resources/assets/img/banke.png')}}" class="mb-3 " style="">
                                                   </div>
                                                   <div id="menu1" class="tab-pane fade bankinfo">
                                                      <h3 class="mt-3">Important information about your booking</h3>
                                                      <p>Important: You will be redirected to your bank's website to securely complete your payment. You will have 30 minutes to pay for your booking.</p>
                                                      <!-- <a href="#" class="paynow-btn">Continue To Your Bank </a> -->
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 text-center d-flex">
                                                <input type="submit" name="paynow" class="paynow-btn" value="Invoice Created - Paynow" style="background-color: green;">
                                                <a href="javascript:void(0)" onclick="cancelRequestBooking('<?php echo $tour_booking_request->id; ?>');" class="paynow-btn" style="margin-left: 5px; background-color: red;">Cancel Booking Request</a>
                                             </div>
                                          </div>
                                       </div>
                                 </div>
                              </div>
                           @elseif($tour_booking_request->request_status == 1 and $tour_booking_request->approve_status == 0)
                              <div class="container">
                                 <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                                       <div class="col-md-12 p-0 mt-3">
                                          <div class="bankpay">
                                             <h5 class="mt-2">
                                                <i class='bx bxs-info-circle'></i> Waiting for Approval
                                             </h5>
                                             <div class="col-md-12 text-center d-flex p-4">
                                                <a href="javascript:void(0)" onclick="cancelRequestBooking('<?php echo $tour_booking_request->id; ?>');" class="paynow-btn" style="margin-left: 5px;">Cancel Booking Request</a>
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
                  
               </form>
               <div class="googl_map">
                  <h3>Google Map</h3>
                  <?php $address = $tour_details->address . ',' . $tour_details->city; ?>
                  <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
               </div>
            </div>
            <div class="col-md-3 pl-0">
               <div class="revie-box-boxi">
                  <div class="image-section">
                     <img src="{{url('/public/uploads/tour_gallery/')}}/{{$tour_details->tour_feature_image}}">
                     <p> {{$tour_details->tour_title}}</p>
                  </div>
                  <p><b>4.1/5</b> Very good (82 reviews)</p>
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
                  <div class="price-left">
                     <h5> <b>Total Amount to be paid </b></h5>
                     <h6><b>PKR {{$tour_details->tour_price}}</b></h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<!-- End #main -->
@endsection