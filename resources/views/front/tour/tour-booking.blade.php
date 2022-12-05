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

   .d-non {
      display: none;
   }

 
</style>
@endsection
@section('current_page_js')


<?php //echo "<pre>"; print_r($tour_details); ?>

 @if(!empty($details))
                        @php $expense = $details->expense_value @endphp
                     @else
                        @php $expense = 0 @endphp
                     @endif

                     @if(!empty($details))
                        @php $discount = $details->discount @endphp
                     @else
                        @php $discount = 0 @endphp
                     @endif

                     @if($tour_details->payment_mode == 2 and $tour_details->booking_option != 3)
                        @php $total_amount = $tour_details->tour_price + $expense - $discount @endphp
                        @php $online_payable_amount = round((($total_amount * $tour_details->online_payment_percentage)/100)) @endphp
                        @php $at_desk_payable_amount = $total_amount - $online_payable_amount @endphp
                     @else
                        @php $total_amount = $tour_details->tour_price + $expense - $discount @endphp
                        @php $online_payable_amount = $total_amount; @endphp
                        @php $at_desk_payable_amount = 0; @endphp
                     @endif

<script>
   $('#check_n_pay').click(function() {
      $('#invoice_n_pay').removeClass('d-non');

   });
</script>



<script>
   $(document).ready(function() {
   $('.minus1').click(function() {
     var $input = $(this).parent().find('input');
     var count = parseInt($input.val()) - 1;
     count = count < 1 ? 1 : count;
     $input.val(count);
     $("").val(count);
     $("").html(count + " ");
     $input.change();
     return false;
   });
   $('.plus1').click(function() {
     var $input = $(this).parent().find('input');
     $input.val(parseInt($input.val()) + 1);
     $("").val(parseInt($("").val()) + 1);
     var count = $("").val();
     $("").html(count.toString() + " ");
     $input.change();
     return false;
   });
   });

   $("#trip_with_us").validate({
      debug: false,
      rules: {
       name: {
           required: true,
       },
       email: {
         required: true,
         email:true,
       },
       phone: {
         required: true,
         number:true,
       },
       reason: {
           required: true
       },
       date:{
         required: true,
         date : true,
       },
       check: {
         required: true,
       },
       transport: {
         required: true,
       },
       departure: {
         required: true,
       },
       flex_date: {
         required: true,
       },
       type: {
         required: true,
       },
       location: {
         required: true,
       },
       message: {
         required: true,
       }
      },
      submitHandler: function (form) {
       var site_url = $("#baseUrl").val();
       // alert(site_url);
       var formData = $(form).serialize();

       $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });

       //alert(formData);die;
       $(form).ajaxSubmit({
         type: 'POST',
         url: site_url + '/submitMaketrip',
         data: formData,
         success: function (response) {
           if (response.status == 'success') {
             $("#trip_with_us")[0].reset();
             success_noti(response.msg);
           } else {
             error_noti(response.msg);
           }

         }
       });
      }
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
                  //    window.location.href = site_url + "/user/tourBookingList"
                  // }, 1000);
                  setTimeout(function() {
                      window.location.href = site_url + "/user/tourBookingList"
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

<!-- <script type="text/javascript">
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
</script> -->

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

	$(function(){
	    
	    $("input[type='radio']").click(function(){
	      
	       var package = $(this).attr('data-price');

	       $("#packagenum").html(package);  
	       $("#packagenumchild").html(package);

	       var expense = $("#expense").val(); 
	       var discount = $("#discount").val(); 
	       var adultval = $("#adult").val();
	       var childnum = $("#child").val();

	       var packages = package*adultval;

	       var childoff = $("#childoff").val(); 
	       var childtour_price = (package*childoff)/100;
	       var packagec1 = package*childnum;
	       var packagecd1 = childtour_price*childnum;

	       var packagecdfn = packagec1-packagecd1;

	       var location_price = $("#location_price").val(); 


	       var total_person = adultval+childnum;

	        //alert(total_person);
	      
	       var cal_locationprice = location_price*total_person;


	       //alert(location_price);

	       var totalamount = parseInt(packages)+parseFloat(packagecdfn)+parseInt(cal_locationprice)+parseInt(expense)-parseInt(discount);

	       $("#total_amount").val(totalamount);
	       
	       $("#tourpriceid").html(packages); 

	       $("#ctour_price").val(package);

	       $("#tourchildprice").text(packagec1);

	       $("#tourchildoffprice").text(packagecd1);

	       $("#totalpaid").text(totalamount); 

	    });   
	 
	    $("#myDropDown").change(function (event) {

	      var locationdd = $(this).val();
	      var locationprice = $("#myDropDown").find('option:selected').attr("data-lprice"); 

	      var adultval = $("#adult").val();

	      var adultnum = parseInt(adultval); 

	      var childval = $("#child").val();

	      var childnum = parseInt(childval);

	      var total_person = adultnum+childnum;

	      var child_online_percentage = "<?php echo $tour_details->online_payment_percentage;?>";
	      //alert(total_person);

	      
	      var cal_locationprice = locationprice*total_person;


	      //var cal_locationprice = locationprice*(adultnum+childnum);
	      //alert(cal_locationprice);

	      $("#piclocs").html(locationdd);
	      $("#locationtext").html(cal_locationprice);
	      $("#picklocation").show();


	      $("#location_price").val(locationprice*adultnum);

	      var ctour_price = $("#ctour_price").val();
	      var expense = $("#expense").val();
	      var discount = $("#discount").val();
	      var adultval = $("#adult").val();

	      var packages = ctour_price*adultval;

	      var childprice = $("#tourchildoffprice").text();
	      var tourchildbase = $("#tourchildprice").text(); 
	      if(childprice == 0){
	        var packagecdfn = 0;
	      }else{
	        var packagecdfn = tourchildbase-childprice;
	      }
	      
	      var childtour_price_per = (packagecdfn*child_online_percentage)/100;

	      //alert(childtour_price_per);

	      var totalamount = parseInt(packages)+parseInt(cal_locationprice)+parseFloat(packagecdfn)+parseInt(expense)-parseInt(discount);


	      $("#total_amount").val(totalamount);
	      $("#tourpriceid").html(packages);  

	      $("#totalpaid").text(totalamount);

	    });
	 
	    $("#adultplus").click(function(){ 
	      
	      var adultval = $("#adult").val();

	      var adultnum = parseInt(adultval)+1; 

	      $("#adult").val(adultnum);

	      $("#adultnum").text(adultnum);

	      var expense = $("#expense").val(); 
	      var discount = $("#discount").val();

	      var ctour_price = $("#ctour_price").val();

	      //var online_payable_amount = $("#online_payable_amount").val();

	      //var at_desk_payable_amount = $("#at_desk_payable_amount").val();

	      var online_payable_amount  = "<?php echo $online_payable_amount; ?>";
	      var at_desk_payable_amount = "<?php echo $at_desk_payable_amount; ?>";
	      var child_online_percentage = "<?php echo $tour_details->online_payment_percentage;?>";

	      //$("input[name*='online_payable_amount']").val();

	      var packages = ctour_price*adultnum;

	      var online_payable_amount_total = online_payable_amount*adultnum;

	      var at_desk_payable_amount_total = at_desk_payable_amount*adultnum;

	      var location_price = $("#myDropDown").find('option:selected').attr("data-lprice"); 

	      //alert(adultnum);
	      var tourchildbase = $("#tourchildprice").text();
	      var childprice = $("#tourchildoffprice").text();

	      var packagecdfn = tourchildbase-childprice;
	      
	      var childval = $("#child").val();

	      var childnum = parseInt(childval);
	      var total_person = adultnum+childnum;
	      var cal_locationprice = location_price*total_person;
	      
	      $("#locationtext").html(cal_locationprice);

	      if(childprice == 0){
	      var packagecdfn = 0;
	      }else{
	        var packagecdfn = tourchildbase-childprice;
	      }

	      var childtour_price_online = (packagecdfn*child_online_percentage)/100;

	      var childtour_price_ondesk = packagecdfn-childtour_price_online;

	      var totalamount = parseInt(packages)+parseInt(cal_locationprice)+parseFloat(packagecdfn)+parseInt(expense)-parseInt(discount);

	      $("#online_payable_amount").val(online_payable_amount_total+childtour_price_online);

	      $("#at_desk_payable_amount").val(at_desk_payable_amount_total+cal_locationprice+childtour_price_ondesk);

	      $("#total_amount").val(totalamount);
	     
	      $("#tourpriceid").html(packages);

	      $("#online_amount").text(online_payable_amount_total+childtour_price_online);

	      $("#desk_amount").text(at_desk_payable_amount_total+cal_locationprice+childtour_price_ondesk);

	      $("#totalpaid").text(totalamount);

	    }); 

		$("#adultminus").click(function(){ 
			var adultval = $("#adult").val();
			if(adultval>1){

			    var adultnum = parseInt(adultval)-1;

			    $("#adult").val(adultnum);

			    $("#adultnum").text(adultnum);

		        var expense = $("#expense").val(); 
		        var discount = $("#discount").val();

		        var ctour_price = $("#ctour_price").val();
		 
		        var online_payable_amount  = "<?php echo $online_payable_amount; ?>";
		        var at_desk_payable_amount = "<?php echo $at_desk_payable_amount; ?>";

		        var packages = ctour_price*adultnum;

		        var location_price = $("#myDropDown").find('option:selected').attr("data-lprice");

		        var tourchildbase = $("#tourchildprice").text();
		       	var childprice = $("#tourchildoffprice").text();

			    // var packagecdfn = tourchildbase-childprice;
			    var childval = $("#child").val();

			    var childnum = parseInt(childval);

			    var total_person = adultnum+childnum;
			    var cal_locationprice = location_price*total_person;
			    var online_payable_amount_total = online_payable_amount*adultnum;

			    var at_desk_payable_amount_total = at_desk_payable_amount*adultnum;

			    $("#locationtext").html(cal_locationprice);

			    if(childprice == 0){
			      var packagecdfn = 0;
			    }else{
			      var packagecdfn = tourchildbase-childprice;
			    }
		      
		        var totalamount = parseInt(packages)+parseInt(cal_locationprice)+parseFloat(packagecdfn)+parseInt(expense)-parseInt(discount);
		      
		        $("#online_payable_amount").val(online_payable_amount_total);

		        $("#at_desk_payable_amount").val(at_desk_payable_amount_total+packagecdfn+cal_locationprice);

		        $("#total_amount").val(totalamount);

		        $("#tourpriceid").html(packages); 

		       $("#online_amount").text(online_payable_amount_total);

		       $("#desk_amount").text(at_desk_payable_amount_total+packagecdfn+cal_locationprice);

		       $("#totalpaid").text(totalamount); 
		    } 
		});  

	    /******Child plus minus****/
	   
	    $("#childplus").click(function(){ 
	      
		    var childval = $("#child").val();

		    var childnum = parseInt(childval)+1;

		    $("#child").val(childnum); 

		      var childoff = $("#childoff").val(); 

		      $("#childoffpr").text(childoff);

		      $("#childpack").show();

		      /************************/

		      $("#childnum").text(childnum);

		      var expense = $("#expense").val(); 
		      var discount = $("#discount").val();
		      var ctour_price = $("#ctour_price").val();
		      var online_payable_amount  = "<?php echo $online_payable_amount; ?>";
		      var at_desk_payable_amount = "<?php echo $at_desk_payable_amount; ?>";

		      var childtour_price = (ctour_price*childoff)/100;

		      var packages = ctour_price*childnum;
		      var packages1 = childtour_price*childnum;

		      var packagecdfn = packages-packages1;

		      var location_price = $("#myDropDown").find('option:selected').attr("data-lprice"); 

		      //alert(location_price);

		      var adultprice =  $("#tourpriceid").text(); 

		      var adultnum = $("#adult").val();
		      //var childval = parseInt(childval);
		      var adultnum = parseInt(adultnum);
		      //var childnum = parseInt(childval);
		      var total_person = childnum+adultnum;
		      //alert(total_person);
		      var cal_locationprice = location_price*total_person;

		      var online_payable_amount_total = online_payable_amount*adultnum;

		      var at_desk_payable_amount_total = at_desk_payable_amount*adultnum;


		      $("#locationtext").html(cal_locationprice);

		      //alert(adultnum);


		      var totalamount = parseFloat(packagecdfn)+parseFloat(cal_locationprice)+parseFloat(adultprice)+parseFloat(expense)-parseFloat(discount);

		      $("#online_payable_amount").val(online_payable_amount_total);
		      $("#at_desk_payable_amount").val(at_desk_payable_amount_total+packagecdfn+cal_locationprice);
		      $("#total_amount").val(totalamount); 
		      $("#packagenumchild").html(ctour_price);   
		      $("#tourchildprice").html(packages); 
		      $("#tourchildoffprice").html(packages1);
		      $("#online_amount").text(online_payable_amount_total);
		      $("#desk_amount").text(at_desk_payable_amount_total+packagecdfn+cal_locationprice);
		      $("#totalpaid").text(totalamount);

	    }); 

		$("#childminus").click(function(){  
		    var childval = $("#child").val(); 
		    if(childval>=1){

			    var childnum = parseInt(childval)-1;

			    $("#child").val(childnum);

			    if(childnum==0){

			    $("#childpack").hide();
			    }

			    var childoff = $("#childoff").val(); 

			    $("#childoffpr").text(childoff);


			   /**************************/
			   
			     $("#childnum").text(childnum);

			     var expense = $("#expense").val(); 
			     var discount = $("#discount").val();
			     var ctour_price = $("#ctour_price").val();
			     var online_payable_amount  = "<?php echo $online_payable_amount; ?>";
			     var at_desk_payable_amount = "<?php echo $at_desk_payable_amount; ?>";

			     var childtour_price = (ctour_price*childoff)/100;
			     var packages = ctour_price*childnum;
			     var packages1 = childtour_price*childnum;


			     var packagecdfn = packages-packages1;

			     var location_price = $("#myDropDown").find('option:selected').attr("data-lprice");

			     var adultval = $("#adult").val();

			     var adultnum = parseInt(adultval);
			     // alert(adultnum);
			     // alert(childnum);
			     var total_person = childnum+adultnum;
			     var cal_locationprice = location_price*total_person;
			     var online_payable_amount_total = online_payable_amount*adultnum;

			     var at_desk_payable_amount_total = at_desk_payable_amount*adultnum;
			     // alert(total_person);
			     // alert(cal_locationprice);
			     // die;

			     $("#locationtext").html(cal_locationprice);

			     var adultprice =  $("#tourpriceid").text(); 

			     var totalamount = parseFloat(packagecdfn)+parseFloat(cal_locationprice)+parseFloat(adultprice)+parseFloat(expense)-parseFloat(discount);

			     $("#online_payable_amount").val(online_payable_amount_total);
			     $("#at_desk_payable_amount").val(at_desk_payable_amount_total+packagecdfn+cal_locationprice);
			     $("#total_amount").val(totalamount);
			     $("#total_amount").val(totalamount);
			     $("#tourchildprice").html(packages);
			     $("#tourchildoffprice").html(packages1);  
			     $("#online_amount").text(online_payable_amount_total);
			     $("#desk_amount").text(at_desk_payable_amount_total+packagecdfn+cal_locationprice);
			     $("#totalpaid").text(totalamount); 
		  	}
		});  
	   
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
            <div class="col-sm-12">
               <a href="javascript:history.back()"><i class="right fas fa-angle-left"></i>Back</a>
            </div>
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
                     @if(!empty($details))
                        @php $expense = $details->expense_value @endphp
                     @else
                        @php $expense = 0 @endphp
                     @endif

                     @if(!empty($details))
                        @php $discount = $details->discount @endphp
                     @else
                        @php $discount = 0 @endphp
                     @endif

                     @if($tour_details->payment_mode == 2 and $tour_details->booking_option != 3)
                        @php $total_amount = $tour_details->tour_price + $expense - $discount @endphp
                        @php $online_payable_amount = round((($total_amount * $tour_details->online_payment_percentage)/100)) @endphp
                        @php $at_desk_payable_amount = $total_amount - $online_payable_amount @endphp
                     @else
                        @php $total_amount = $tour_details->tour_price + $expense - $discount @endphp
                        @php $online_payable_amount = $total_amount; @endphp
                        @php $at_desk_payable_amount = 0; @endphp
                     @endif

                     <input type="hidden" name="user_id" value="{{Auth::check()}}">
                     <input type="hidden" name="tour_id" value="{{$tour_details->id}}">
                     <input type="hidden" name="tour_price" value="{{$tour_details->tour_price}}">
                     <input type="hidden" name="tour_start_date" value="{!! date('Y-m-d', strtotime($tour_details->tour_start_date)) !!}">
                     <input type="hidden" name="tour_end_date" value="{!! date('Y-m-d', strtotime($tour_details->tour_end_date)) !!}">

                     @if($tour_details->payment_mode == 2 and $tour_details->booking_option == 1)
                        <input type="hidden" name="online_payable_amount" value="{{$online_payable_amount}}" id="online_payable_amount">
                        <input type="hidden" name="at_desk_payable_amount" value="{{$at_desk_payable_amount}}" id="at_desk_payable_amount">
                        <input type="hidden" name="total_amount" value="{{$total_amount}}" id="total_amount" >
                        <input type="hidden" name="partial_payment_status" value="1">
                     @elseif($tour_details->payment_mode == 2 and $tour_details->booking_option == 2)
                     <input type="hidden" name="online_payable_amount" value="{{$online_payable_amount}}" id="online_payable_amount">
                        <input type="hidden" name="at_desk_payable_amount" value="{{$at_desk_payable_amount}}" id="at_desk_payable_amount">
                        <input type="hidden" name="total_amount" value="{{$total_amount}}" id="total_amount" >
                        <input type="hidden" name="partial_payment_status" value="1">
                     @else
                        <input type="hidden" name="online_payable_amount" value="{{$total_amount}}">
                        <input type="hidden" name="at_desk_payable_amount" value="{{$at_desk_payable_amount}}">
                        <input type="hidden" name="total_amount" value="{{$total_amount}}" id="total_amount">
                        <input type="hidden" name="partial_payment_status" value="0">
                     @endif

                     <div class="infobox">
                        <div class="revie-box">
                           <div class="page-detail">
                              <h5 class="p-0 m-0 citi-omr">{{$tour_details->tour_title}} </h5>
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
                           <div class="pakeges-bar"> 
                              <div class="form-group">
                                 <h5 class="mt-3">Packages </h5>
                                <div class="gold-stand">
                                  <label class="pakagees-type">Standard
                                    <input type="radio" checked="checked" name="radio" data-price="{{$tour_details->tour_price}}" value="standard" class="Packages">
                                    <span class="checkmark"></span>
                                  </label>

                                  <?php if($tour_details->tour_gold_price!=0){ ?>

                                  <label class="pakagees-type">Gold
                                    <input type="radio" name="radio" data-price="{{$tour_details->tour_gold_price}}" value="gold" class="Packages">
                                    <span class="checkmark"></span>
                                  </label>

                                 <?php } ?>

                                 <?php if($tour_details->tour_deluxe_price!=0){ ?>

                                  <label class="pakagees-type">Deluxe
                                    <input type="radio" name="radio" data-price="{{$tour_details->tour_deluxe_price}}" value="deluxe" class="Packages">
                                    <span class="checkmark"></span>
                                  </label>

                                  <?php } ?>

                                </div>
                              </div>
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
                                                <div class="form-group col-md-6">
                                                   <label for="terms"> <input type="checkbox" name="terms" value="1">
                                                      Remember this for future use
                                                   </label>
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
                              @if($tour_booking_request->payment_status == 0)
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
                                 @elseif($tour_booking_request->request_status == 0 and $tour_booking_request->approve_status == 0)
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
                        <!-- <div class="container d-non" id="invoice_n_pay">
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
                                          <td style="font-weight:600;">Tour Name:</td>
                                          <td>{{$details->tour_title ?? ''}}</td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Period:</td>
                                          <td>{{$details->tour_start_date ?? ''}} to {{$details->tour_end_date ?? ''}}</td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Price:</td>
                                          <td>PKR {{$details->tour_price ?? ''}}</td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Tour Days:</td>
                                          <td>{{$details->tour_days ?? ''}}</td>
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
                                          <td>PKR {{$details->tour_price ?? ''}}</td>
                                       </tr>
                                       @if($expense!=0)
                                       <tr>
                                          <td>Extra Charges:</td>
                                          <td>PKR {{$expense}}</td>
                                       </tr>
                                       @endif
                                       @if($discount!=0)
                                       <tr>
                                          <td>Discount:</td>
                                          <td>PKR -{{$discount}}</td>
                                       </tr>
                                       @endif
                                       @if($tour_details->payment_mode == 2)
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
                                          <td>PKR {{$details->tour_price + $expense - $discount}}</td>
                                       </tr>
                                    </table>
                                    <input type="submit" name="paynow" class="paynow-btn" value="Create Order" style="background-color: green;">
                                 </div>
                              </div>
                           </div>
                        </div> -->
                     @endif
                  </form>
               <!-- <div class="googl_map">
                
                  <h3>Google Map</h3>
                  <?php $address = $tour_details->address . ',' . $tour_details->city; ?>
                  <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                  
               </div> -->
            </div>

            @if(!empty($details))
            <div class="col-md-3 pl-0">
              <div class="container" id="invoice_n_pay">
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
                                <td style="font-weight:600;">Tour Name:</td>
                                <td>{{$details->tour_title ?? ''}}</td>
                             </tr>
                             <!-- <tr>
                                <td style="font-weight:600;">Period:</td>
                                <td>{{$details->tour_start_date ?? ''}} to {{$details->tour_end_date ?? ''}}</td>
                             </tr> -->
                             <tr>
                                <td style="font-weight:600;">Price:</td>
                                <td>PKR {{$details->tour_price ?? ''}}</td>
                             </tr>
                             <tr>
                                <td style="font-weight:600;">Tour Days:</td>
                                <td>{{$details->tour_days ?? ''}}</td>
                             </tr>
                             <!-- <tr>
                                <td style="font-weight:600;">Email:</td>
                                <td>{{$details->user_email ?? ''}}</td>
                             </tr>
                             <tr>
                                <td style="font-weight:600;">Phone:</td>
                                <td>{{$details->user_contact_num ?? ''}}</td>
                             </tr> -->
                             <tr>
                                <td>Cost:</td>
                                <td>PKR {{$details->tour_price ?? ''}}</td>
                             </tr>
                             @if($expense!=0)
                             <tr>
                                <td>Extra Charges:</td>
                                <td>PKR {{$expense}}</td>
                             </tr>
                             @endif
                             @if($discount!=0)
                             <tr>
                                <td>Discount:</td>
                                <td>PKR -{{$discount}}</td>
                             </tr>
                             @endif
                             @if($tour_details->payment_mode == 2)
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
                                <td>PKR {{$details->tour_price + $expense - $discount}}</td>
                             </tr>
                          </table>
                          <!-- <input type="submit" name="paynow" class="paynow-btn" value="Create Order" style="background-color: green;"> -->
                       </div>
                    </div>
                 </div>
              </div>
            </div>
            @else
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
                  <label>Pickup Locations</label>
                  <select name="pickup_location" class="form-control" id="myDropDown">
                     <option value="" data-lprice="0">Select Location</option>
                     <option value="{{$tour_details->city}}" data-lprice="0">{{$tour_details->city}}</option>
                     @foreach($tour_pickup_locations as $locations)
                     <option value="{{$locations->city}}" data-lprice="{{$locations->price}}">{{$locations->city}}</option>
                     @endforeach
                  </select>

                  <div class="tour-days adult-form">
                            
                 <label>Adults:</label>
                         <div class="number ault-quantiy">
                          <p id="adultminus">-</p>
                           <input type="text" name="adult" id="adult" value="1" />
                          <p id="adultplus">+</p>
                        </div>
  
                  </div>

                    <div class="tour-days adult-form">
                    
                    
                 <label>Child:</label>
                         <div class="number ault-quantiy">
                           <p id="childminus">-</p>
                           <input type="text" name="child" id="child" value="0" />
                           <p id="childplus">+</p>
                        </div>
  

                  </div>
                  <br>
               </div>
               <div class="revie-box-boxi">
                  <div class="price-bkp">
                     <h4>PRICE BREAK-UP</h4>
                  </div>
                  <div class="price-left">
                     <h5> <span id="packagenum">{{$tour_details->tour_price}}</span> x <span id="adultnum">1</span> Adults | Passenger<br> <small> Base Price</small></h5>
                     <input type="hidden" name="tourprice" id="tourprice" value="{{$tour_details->tour_price}}">
                     <h6> PKR <span id="tourpriceid">{{$tour_details->tour_price}}</span> </h6>
                  </div>

                    <div class="price-left" id="childpack" style="display: none;">
                     <h5> <span id="packagenumchild">1</span> x <span id="childnum">0</span> Child | Passenger<br> <small> Base Price (<span id="childoffpr">0</span>% off)</small></h5>
                     <input type="hidden" name="childoff" id="childoff" value="{{$tour_details->tour_child_price}}">
                     <h6> PKR <span id="tourchildprice">{{$tour_details->tour_price}}</span> <br>
                     - PKR <span id="tourchildoffprice">0</span> </h6>
                  </div>

                  @if(!empty($details->expense_name))
                  <div class="price-left">
                     <h5> {{$details->expense_name}} Charges</h5>
                     <h6>PKR {{$details->expense_value}}</h6>
                  </div>
                  @endif
                  @if(!empty($details->discount))
                  <div class="price-left">
                     <h5> Discount</h5>
                     <h6>PKR -{{$details->discount}}</h6>
                  </div>
                  @endif

                  @if($tour_details->payment_mode == 2 and $tour_details->booking_option == 1)
                  <div class="price-left">
                     <h5> <b>Online Payable Amount </b></h5>
                     <h6 id="online_amount">PKR {{$online_payable_amount}}</h6>
                  </div>
                  <div class="price-left">
                     <h5><b> At Desk Payable Amount</b></h5>
                     <h6 id="desk_amount">PKR {{$at_desk_payable_amount}}</h6>
                  </div>
                  @elseif($tour_details->payment_mode == 2 and $tour_details->booking_option == 2)
                  <div class="price-left">
                     <h5> <b>Online Payable Amount </b></h5>
                     <h6 id="online_amount">PKR {{$online_payable_amount}}</h6>
                  </div>
                  <div class="price-left">
                     <h5><b> At Desk Payable Amount</b></h5>
                     <h6 id="desk_amount">PKR {{$at_desk_payable_amount}}</h6>
                  </div>
                  @endif

                  <div class="price-left" id="picklocation" style="display: none;"><h5><b><span>Pickup Locations (<span id="piclocs"></span>) :</span></b></h5><h6><b>PKR <span id="locationtext"></span></b></h6> </div>

                  <div class="price-left">
                     <h5> <b>Total Amount to be paid </b></h5> 
                     <input type="hidden" name="location_price" id="location_price" value="0">
                     <input type="hidden" name="ctour_price" id="ctour_price" value="{{$tour_details->tour_price}}">
                     <input type="hidden" name="expense" id="expense" value="{{$expense}}">
                     <input type="hidden" name="discount" id="discount" value="{{$discount}}">
                     <h6><b>PKR <span id="totalpaid">{{$tour_details->tour_price + $expense - $discount}}</span></b></h6>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </section>
</main>

<!-- End #main -->
@endsection